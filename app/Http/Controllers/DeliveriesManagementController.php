<?php

namespace App\Http\Controllers;

require_once(dirname(dirname(__FILE__)) . '/Classes/MondialRelay.API.Class.php');

use App\Models\Profile;
use App\Models\User;
use App\Models\Deliverie;
use App\Traits\CaptureIpTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use jeremykenedy\LaravelRoles\Models\Role;
use Validator;

class DeliveriesManagementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagintaionEnabled = config('deliveriesmanagement.enablePagination');
        
            $deliveries = Deliverie::all()->sortByDesc("created_at");
      


        return View('deliveriesmanagement.show-deliveries', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('deliveriesmanagement.create-deliverie');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name'                  => 'required|max:255|unique:deliveries',
                'first_name'            => '',
                'last_name'             => '',
                'email'                 => 'required|email|max:255|unique:deliveries',
                'password'              => 'required|min:6|max:20|confirmed',
                'password_confirmation' => 'required|same:password',
                'role'                  => 'required',
            ],
            [
                'name.unique'         => trans('auth.userNameTaken'),
                'name.required'       => trans('auth.userNameRequired'),
                'first_name.required' => trans('auth.fNameRequired'),
                'last_name.required'  => trans('auth.lNameRequired'),
                'email.required'      => trans('auth.emailRequired'),
                'email.email'         => trans('auth.emailInvalid'),
                'password.required'   => trans('auth.passwordRequired'),
                'password.min'        => trans('auth.PasswordMin'),
                'password.max'        => trans('auth.PasswordMax'),
                'role.required'       => trans('auth.roleRequired'),
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $ipAddress = new CaptureIpTrait();
        $profile = new Profile();

        $user = User::create([
            'name'             => $request->input('name'),
            'first_name'       => $request->input('first_name'),
            'last_name'        => $request->input('last_name'),
            'email'            => $request->input('email'),
            'password'         => bcrypt($request->input('password')),
            'token'            => str_random(64),
            'admin_ip_address' => $ipAddress->getClientIp(),
            'activated'        => 1,
        ]);

        $user->profile()->save($profile);
        $user->attachRole($request->input('role'));
        $user->save();

        return redirect('manager/deliveries')->with('success', trans('deliveriesmanagement.createSuccess'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deliverie = Deliverie::where('deliverie_id', $id)->first();
        if(empty($deliverie)){
          $deliverie = Deliverie::findOrFail($id);

        }

        return view('deliveriesmanagement.show-deliverie')->withDeliverie($deliverie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deliverie = Deliverie::findOrFail($id);



        $data = [
            'deliverie'        => $deliverie,

        ];

        return view('deliveriesmanagement.edit-deliverie')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $deliverie = Deliverie::find($id);


            $validator = Validator::make($request->all(), [
                'pickup_id'     => 'nullable',
                'status'     => 'nullable',
                'tracking_id'    => 'nullable',
                'shipment_sticker_url'    => 'nullable',
                'shipment_tracking_url'    => 'nullable',



            ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        if ($request->input('shipment_sticker_url') != null) {
            $deliverie->shipment_sticker_url = $request->input('shipment_sticker_url');
        }


        if ($request->input('shipment_tracking_url') != null) {
            $deliverie->shipment_tracking_url = $request->input('shipment_tracking_url');
        }

        if ($request->input('tracking_id') != null) {
            $deliverie->tracking_id = $request->input('tracking_id');
        }

        $deliverie->save();

        return back()->with('success', "Les informations de votre livraison ont bien été modifié!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$currentUser = Auth::user();
        $deliverie = Deliverie::findOrFail($id);
        //$ipAddress = new CaptureIpTrait();

        //if ($deliverie->id != $currentUser->id) {
          //  $deliverie->deleted_ip_address = $ipAddress->getClientIp();
          //  $deliverie->save();
            $deliverie->delete();

            return redirect('manager/deliveries')->with('success', trans('deliveriesmanagement.deleteSuccess'));
      //  }

      //  return back()->with('error', trans('deliveriesmanagement.deleteSelfError'));
    }

    /**
     * Method to search the deliveries.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $searchTerm = $request->input('deliverie_search_box');
        $searchRules = [
            'deliverie_search_box' => 'required|string|max:255',
        ];
        $searchMessages = [
            'deliverie_search_box.required' => 'Search term is required',
            'deliverie_search_box.string'   => 'Search term has invalid characters',
            'deliverie_search_box.max'      => 'Search term has too many characters - 255 allowed',
        ];

        $validator = Validator::make($request->all(), $searchRules, $searchMessages);

        if ($validator->fails()) {
            return response()->json([
                json_encode($validator),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $results = Deliverie::where('id', 'like', $searchTerm.'%')
                            ->orWhere('deliverie_id', 'like', $searchTerm.'%')
                            ->orWhere('cart', 'like', $searchTerm.'%')->get()
                            ->orWhere('date', 'like', $searchTerm.'%')->get()
                            ->orWhere('user_id', 'like', $searchTerm.'%')->get();



        return response()->json([
            json_encode($results),
        ], Response::HTTP_OK);

}

  public function cancel($id){

      $deliverie = Deliverie::findOrFail($id);
      if($deliverie->status == "doing" && $deliverie->shipment_sticker_url != null){
        $deliverie->shipment_tracking_url = null;
        $deliverie->shipment_sticker_url = null;
        $deliverie->status = "doing";
        $deliverie->order->status = "doing";
        $deliverie->save();
        $deliverie->order->save();
        return redirect('manager/deliveries/' . $deliverie->id)->with('error', "Votre étiquette a été supprimé. Vous pouvez en générer une nouvelle.");

      } else {

        return redirect('manager/deliveries/' . $deliverie->id)->with('error', "Impossible de faire un retour pour le moment.");

      }


  }
        public function generateSticker($id){

          $deliverie = Deliverie::findOrFail($id);

          if($deliverie->order->payment_status != true)
          {
             return redirect('manager/deliveries/' . $deliverie->id)->with('error', "La commande associée à cette livraison n'a pas encore été payé, vous ne pouvez donc pas encore imprimer l'étiquette de livraison!");
          }

          if($deliverie->order->user->profile->location_address == null)
          {
             return redirect('manager/deliveries/' . $deliverie->id)->with('error', "Aucune adresse de facturation client");
          }


          if($deliverie->order->user->profile->location_postalcode == null)
          {
             return redirect('manager/deliveries/' . $deliverie->id)->with('error', "Aucune adresse de facturation client");
          }


          if($deliverie->order->user->profile->location_city == null)
          {
             return redirect('manager/deliveries/' . $deliverie->id)->with('error', "Aucune adresse de facturation client");
          }


          if($deliverie->order->user->profile->phone_number== null)
          {
             return redirect('manager/deliveries/' . $deliverie->id)->with('error', "Aucune adresse de facturation client");
          }



	//We declare the client
	$MRService = new \MondialRelayWebAPI();



	//set the credentials
	$MRService->_Api_CustomerCode 	= "BDTEST13";
	$MRService->_Api_BrandId 		= "11";
	$MRService->_Api_SecretKey  	= "PrivateK";
	$MRService->_Api_User 	    	= "BDTEST13@business-api.mondialrelay.com";
	$MRService->_Api_Password 		= "PrivateK";
	$MRService->_Api_Version 		= "1.0";

  //set the credentials
  // $MRService->_Api_CustomerCode   = "CC21BY2Y";
  // $MRService->_Api_BrandId    = "41";
  // $MRService->_Api_SecretKey    = "eo1Rzeep";
  // $MRService->_Api_User         = "CC21BY2Y@business-api.mondialrelay.com";
  // $MRService->_Api_Password     = "mh@D@MJk8587qgp";
  // $MRService->_Api_Version    = "1.0";

	$MRService->_Debug = false;

	//set the merchant adress
	//sender adress
	$merchantAdress = new \Adress();
  $merchantAdress->Adress1 = "Plantes Addict";
  $merchantAdress->Adress2 = " ";
  $merchantAdress->Adress3 = "3 chemin de printegarde";
  $merchantAdress->Adress4 = "";
  $merchantAdress->PostCode = "07800";
  $merchantAdress->City = "La Voulte sur Rhone";
  $merchantAdress->CountryCode = "FR";
  $merchantAdress->PhoneNumber = "0665029279";
  $merchantAdress->PhoneNumber2 ="";
  $merchantAdress->Email = "shop@plantesaddict.fr";
  $merchantAdress->Language = "FR";
  

  //dd($deliverie);

	//-------------------------------------------------
	//Shipment Creation Sample
	//-------------------------------------------------
	//Create a new shipment object
		$myShipment = new \ShipmentData();

	//set the delivery options
	$myShipment->DeliveryMode = new \ShipmentInfo()  ;
	$myShipment->DeliveryMode->Mode = "24R";
	//parcel Shop ID when required
	$myShipment->DeliveryMode->ParcelShopId = $deliverie->pickup_id;
	$myShipment->DeliveryMode->ParcelShopContryCode = "FR";

	//set the pickup options
	$myShipment->CollectMode = new \ShipmentInfo() ;
	$myShipment->CollectMode->Mode = "CCC";
	//parcel Shop ID when required
	//$myShipment->CollectMode->ParcelShopId = "066974";
	//$myShipment->CollectMode->ParcelShopContryCode = "FR";

	$myShipment->InternalOrderReference = $deliverie->order->order_id;
	$myShipment->InternalCustomerReference = $deliverie->order->user->id;

	//sender adress with the previsously declarated adress
	$myShipment->Sender = $merchantAdress;

	//recipient adress
	$myShipment->Recipient = new \Adress()  ;
		$myShipment->Recipient->Adress1 = $deliverie->order->user->first_name . " " . $deliverie->order->user->last_name;
		$myShipment->Recipient->Adress2 = substr($deliverie->order->user->profile->location_address, 0, 31);


		$myShipment->Recipient->Adress3 = "Aucun complément d'adresse";
		$myShipment->Recipient->Adress4 = "";
		$myShipment->Recipient->PostCode = $deliverie->order->user->profile->location_postalcode;
		$myShipment->Recipient->City = $deliverie->order->user->profile->location_city;
		$myShipment->Recipient->CountryCode = "FR";
		$myShipment->Recipient->PhoneNumber = $deliverie->order->user->profile->phone_number;

		$myShipment->Recipient->Email = $deliverie->order->user->email;
		$myShipment->Recipient->Language = "FR";

	//shipment datas
	$myShipment->DeliveryInstruction= "www.plantesaddict.fr" ;
	$myShipment->CommentOnLabel= "" ;

	//parcel declaration (one item per parcel)
	$myShipment->Parcels[0] = new \Parcel();
	$myShipment->Parcels[0]->WeightInGr = 2000;
	$myShipment->Parcels[0]->Content = "Box de plantes";

	// $myShipment->Parcels[1] = new Parcel();
	// $myShipment->Parcels[1]->WeightInGr = 2000;
	// $myShipment->Parcels[1]->Content = "pencils and paints ";

	$myShipment->InsuranceLevel="";
	$myShipment->CostOnDelivery= 0;
	$myShipment->CostOnDeliveryCurrency= "EUR" ;
	$myShipment->Value= $deliverie->order->amount;
	$myShipment->ValueCurrency= "EUR";

	//Create the shipment
	//this will return the stickers URL and Shipment number to track the parcel

	//creation with Internationnal API
	$ShipmentDatas = $MRService->CreateShipment($myShipment);

if($ShipmentDatas->Success == true){

  if($deliverie->tracking_id == null && $deliverie->shipment_sticker_url == null){
  $deliverie->tracking_id = $ShipmentDatas->ShipmentNumber;
  $deliverie->shipment_tracking_url = $ShipmentDatas->TrackingLink;
  $deliverie->shipment_sticker_url = $ShipmentDatas->LabelLink;
  $deliverie->save();
    print_r($ShipmentDatas);

  echo '<a href="'.$ShipmentDatas->LabelLink.'" >Télécharger le bon en pdf</a>';

  return back()->with('success', "L'étiquette a bien été généré, vous pouvez la récupérer dans la section 'traitement de la commande'" ); 
} else{
  return back()->with('success', "Vous avez déjà généré une étiquette pour cette commande<a href=" . $deliverie->shipment_sticker_url .">Télécharger l'étiquette</a>" ); 
}
} else{
  echo("Erreur!");
     print_r($ShipmentDatas);

}





    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function send($id){

        $deliverie = Deliverie::findOrFail($id);

        // First we make sure this deliverie has been sent
        if($deliverie->completed != true && $deliverie->status == "done"){
            $deliverie->completed = true;
            $deliverie->status = "sent";
            $deliverie->order->status = "sent";
            $deliverie->order->closed = true;
            $deliverie->save();
            $deliverie->order->save();
                      return back()->with('success', "Votre livraison vient d'être passé en expédiée. La commande associée a été passé en terminé."); 
        }
        else{
                    return back()->with('success', "La livraison doit avoir été préparer avant de pouvoir l'envoyer.");  
        }
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function unsend($id){

        $deliverie = Deliverie::findOrFail($id);

        // First we make sure this deliverie has been sent
        if($deliverie->status == "sent"){
            $deliverie->completed = false;
            $deliverie->status = "done";
            $deliverie->order->status = "done";
            $deliverie->order->closed = false;
            $deliverie->save();

            $deliverie->order->save();
            return back()->with('error', "L'expédition a été annulée, votre livraison est prête mais pas encore envoyée."); 
        }
        else{
           
          return back()->with('error', "Vous devez d'abord préparer le colis avant de pouvoir l'envoyer.");  

        }
    }


    public function doing($id){

        $deliverie = Deliverie::findOrFail($id);
    
          if($deliverie->status == "todo" && $deliverie->completed == false){

            $deliverie->completed = false;
            $deliverie->order->closed = false;
            $deliverie->status = "doing";
            $deliverie->order->status = "doing";
            $deliverie->save();
            $deliverie->order->save();
            return back()->with('success', "Cette commande est en préparation!");

          } else {
            $deliverie->status = "todo";
            $deliverie->completed = false;
            $deliverie->order->closed = false;
            $deliverie->order->status = "todo";
            $deliverie->order->save();
            $deliverie->shipment_tracking_url = null;
            $deliverie->shipment_sticker_url = null;
            $deliverie->tracking_id = null;
            $deliverie->save();
            return back()->with('error', "La préparation de la commande a été annulé, la livraison est désormais: à préparer.");

          }
    }
        
  

    public function undoing($id){

        $deliverie = Deliverie::findOrFail($id);
        
            if($deliverie->status == "doing"){

            $deliverie->completed = false;
            $deliverie->status = "todo";
            $deliverie->order->status = "todo";
            $deliverie->save();
            $deliverie->order->save();
            return back()->with('success', "Cette livraison est à préparer!");

          } else {
          
            return back()->with('error', "Votre livraison doit être à préparer pour pouvoir la penser en préparation");

          }
    }

    public function done($id){

        $deliverie = Deliverie::findOrFail($id);
        
            if($deliverie->status == "doing"){

            $deliverie->completed = false;
            $deliverie->status = "done";
            $deliverie->order->status = "done";
            $deliverie->save();
            $deliverie->order->save();
            return back()->with('success', "Cette livraison est prete à etre envoyé!");

          } else {
          
            return back()->with('error', "Votre livraison doit être en préparation pour etre finaliser.");

          }
    }


    public function undo($id){

        $deliverie = Deliverie::findOrFail($id);
        
            if($deliverie->status == "done"){

            $deliverie->completed = false;
            $deliverie->status = "todo";
            $deliverie->order->status = "todo";
            $deliverie->save();
            $deliverie->order->save();
            return back()->with('success', "La préparation de la livraison a été annulé. Vous devez la repréparer.");

          } else {
          
            return back()->with('error', "Votre livraison doit être en préparation pour etre finaliser.");

          }
    }
        


}

