<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Vente;
use App\Traits\CaptureIpTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use jeremykenedy\LaravelRoles\Models\Role;
use Validator;

class VentesManagementController extends Controller
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
        $pagintaionEnabled = config('ventesmanagement.enablePagination');
        if ($pagintaionEnabled) {
            $ventes = Vente::orderBy('date', 'desc')->paginate(config('ventesmanagement.paginateListSize'));
        } else {
            $ventes = Vente::all()->sortByDesc("date");
        }

        return View('ventesmanagement.show-ventes', compact('ventes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('ventesmanagement.create-vente');
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
                'name'                  => 'required|max:255|unique:ventes',
                'slug'            => 'required',
                'description'             => "required",
                'date'                 => 'required',
                'horaires'              => 'required',
                'location_address' => 'required',
                'location_postalcode'                  => 'required|numeric',
                'location_city'                  => 'required',
                'is_public'                  => 'boolean',
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



        $vente = Vente::create([
            'name'             => $request->input('name'),
            'slug'       => $request->input('slug'),
            'description'        => $request->input('description'),
            'date'            => $request->input('date'),
            'horaires'         => $request->input('horaires'),
            'location_address'         => $request->input('location_address'),
            'location_postalcode'         => $request->input('location_postalcode'),
            'location_city'         => $request->input('location_city'),
            'is_public'         => false,

        ]);

         if ($request->input('meta_title') != null) {
            $vente->meta_title = $request->input('meta_title');
        }
        if ($request->input('meta_desc') != null) {
            $vente->meta_desc = $request->input('meta_desc');
        }
         if ($request->input('fb_event_url') != null) {
            $vente->fb_event_url = $request->input('fb_event_url');
        }
        
        if ($request->input('color_code') != null) {
            $vente->color_code = $request->input('color_code');
        }



        $vente->save();

        return redirect('manager/ventes')->with('success', trans('ventesmanagement.createSuccess'));
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
        
         $vente = Vente::where('slug', $id)->first();
      if(empty($vente)){
        $vente = Vente::findOrFail($id);

      }

        return view('ventesmanagement.show-vente')->withVente($vente);
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
        $vente = Vente::findOrFail($id);
        $products = Product::all();

        $data = [
            'vente'        => $vente,
            'products'        => $products,

        ];

        return view('ventesmanagement.edit-vente')->with($data);
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
        $vente = Vente::find($id);

        $validator = Validator::make($request->all(), [
          'name'     => 'required|max:255',
          'slug' => 'required|max:255|unique:ventes,slug,'.$id,
          'content' => 'nullable|min:6',
          'description' => 'nullable',
          'date' => 'required|date',
          'horaires' => 'nullable|min:6',
          'products' => 'nullable',
          'location_address' => 'required|min:6',
          'location_address_info' => 'nullable|min:2',
          'location_postalcode' => 'nullable|integer|min:2',
          'location_state' => 'nullable|min:2',
          'location_country' => 'nullable|min:2',
          'color_code' => 'nullable|min:6',
          'fb_event_url' => 'nullable|min:6',
          'thumbnail' => 'nullable',
          'meta_title' => 'nullable|string',
          'meta_desc' => 'nullable|string',
          'is_public' => 'boolean',
          'show_date' => 'boolean',
          'show_location' => 'boolean',
          'status' => 'required',
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $vente->name = $request->input('name');
        $vente->slug = $request->input('slug');
        $vente->description = $request->input('description');
        $vente->date = $request->input('date');
        $vente->horaires = $request->input('horaires');
        $vente->location_address = $request->input('location_address');
        $vente->location_city = $request->input('location_city');
        $vente->location_address_info = $request->input('location_address_info');
        $vente->location_postalcode = $request->input('location_postalcode');
        $vente->location_state = $request->input('location_state');

        //$vente->show_location = false;
        if ($request->input('show_location') != null) {
            $vente->show_location = $request->input('show_location');
        }

        if ($request->input('show_date') != null) {
            $vente->show_date = $request->input('show_date');
        }

        if ($request->input('is_public') != null) {
            $vente->is_public = $request->input('is_public');
        }
        if ($request->input('status') != null) {
            $vente->status = $request->input('status');
        }
        if ($request->input('fb_event_url') != null) {
            $vente->fb_event_url = $request->input('fb_event_url');
        }

        if ($request->input('color_code') != null) {
            $vente->color_code = $request->input('color_code');
        }
        if ($request->input('meta_title') != null) {
            $vente->meta_title = $request->input('meta_title');
        }
        if ($request->input('meta_desc') != null) {
            $vente->meta_desc = $request->input('meta_desc');
        }
        if ($request->input('status') != null) {
            $vente->status = $request->input('status');
        }

        if ($request->input('thumbnail') != null) {
            $vente->thumbnail = $request->input('thumbnail');
          } else {
            $vente->thumbnail = null;
          }
      
        //dd($request->input('products'));
        if($request->input('products') != null){
          $vente->products()->detach();
          foreach($request->input('products') as $selectedProduct){
          // if selected product is already link
          $vente->products()->attach($selectedProduct);

          }
      }
        else {
          $vente->products()->detach();
        }


        $vente->save();


        return back()->with('success', "La vente a été modifié.");
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

        $vente = Vente::findOrFail($id);
        $vente->delete();

        return redirect('manager/ventes')->with('success', trans('ventesmanagement.deleteSuccess'));

    }

    /**
     * Method to search the users.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $searchTerm = $request->input('user_search_box');
        $searchRules = [
            'user_search_box' => 'required|string|max:255',
        ];
        $searchMessages = [
            'user_search_box.required' => 'Search term is required',
            'user_search_box.string'   => 'Search term has invalid characters',
            'user_search_box.max'      => 'Search term has too many characters - 255 allowed',
        ];

        $validator = Validator::make($request->all(), $searchRules, $searchMessages);

        if ($validator->fails()) {
            return response()->json([
                json_encode($validator),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $results = User::where('id', 'like', $searchTerm.'%')
                            ->orWhere('name', 'like', $searchTerm.'%')
                            ->orWhere('email', 'like', $searchTerm.'%')->get();

        // Attach roles to results
        foreach ($results as $result) {
            $roles = [
                'roles' => $result->roles,
            ];
            $result->push($roles);
        }

        return response()->json([
            json_encode($results),
        ], Response::HTTP_OK);
    }


        public function exportVenteOrders($id){
          $vente = Vente::findOrFail($id);
          $orders = Order::where('cart', $vente->slug)->where('payment_status', true)->get();

          foreach($orders as $order){
            echo('Commande: ' .$order->order_id . ", </br> ");
            echo('Montant: ' .$order->amount . "€, </br> ");
            echo('Email: ' .$order->user->email . ", </br>");
            echo('Paiement: ' .$order->payment_id . ', </br>');
            $products = [];
            foreach($order->products as $product){
              $products[] = [$product->name => $product->pivot->quantity];
            }
            echo('Détails: ' . json_encode($products));
            echo("</br>");
            echo("</br>");
          }
        }

        public function exportVenteOrdersMailingList($id){
          $vente = Vente::findOrFail($id);
          $orders = Order::where('cart', $vente->slug)->where('payment_status', true)->get();
          foreach($orders as $order){
            echo($order->user->email . ', ');
          }
        }

        public function exportSoldProducts($id){
          $vente = Vente::findOrFail($id);
          $orders = Order::where('cart', $vente->slug)->where('payment_status', true)->get();
          foreach($orders as $order){
            echo($order->user->email . ', ');
          }
        }

}

