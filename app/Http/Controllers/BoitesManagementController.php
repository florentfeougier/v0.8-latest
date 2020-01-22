<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Boite;
use App\Traits\CaptureIpTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use jeremykenedy\LaravelRoles\Models\Role;
use Validator;

class BoitesManagementController extends Controller
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
        $pagintaionEnabled = config('boitesmanagement.enablePagination');
        if ($pagintaionEnabled) {
            $boites = Boite::orderBy('date', 'desc')->paginate(config('boitesmanagement.paginateListSize'));
        } else {
            $boites = Boite::all()->sortByDesc("date");
        }

        return View('boitesmanagement.show-boites', compact('boites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('boitesmanagement.create-boite');
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
                'name'                  => 'required|max:255|unique:boites',
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



        $boite = Boite::create([
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
            $boite->meta_title = $request->input('meta_title');
        }
        if ($request->input('meta_desc') != null) {
            $boite->meta_desc = $request->input('meta_desc');
        }
         if ($request->input('fb_event_url') != null) {
            $boite->fb_event_url = $request->input('fb_event_url');
        }
        
        if ($request->input('color_code') != null) {
            $boite->color_code = $request->input('color_code');
        }



        $boite->save();

        return redirect('manager/boites')->with('success', trans('boitesmanagement.createSuccess'));
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
        
         $boite = Boite::where('slug', $id)->first();
      if(empty($boite)){
        $boite = Boite::findOrFail($id);

      }

        return view('boitesmanagement.show-boite')->withboite($boite);
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
        $boite = Boite::findOrFail($id);
        $products = Product::all();

        $data = [
            'boite'        => $boite,
            'products'        => $products,

        ];

        return view('boitesmanagement.edit-boite')->with($data);
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
        $boite = Boite::find($id);

        $validator = Validator::make($request->all(), [
          'name'     => 'required|max:255',
          'slug' => 'required|max:255|unique:boites,slug,'.$id,
          'content' => 'nullable|min:6',
          'description' => 'nullable',
          'product_quantity' => 'required|integer',

          'products' => 'nullable',
         
          'color_code' => 'nullable|min:6',
          'fb_event_url' => 'nullable|min:6',
          'thumbnail' => 'nullable',
          'meta_title' => 'nullable|string',
          'meta_desc' => 'nullable|string',
          'is_public' => 'boolean',
          
          'status' => 'required',
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $boite->name = $request->input('name');
        $boite->slug = $request->input('slug');
        $boite->description = $request->input('description');
        $boite->product_quantity = $request->input('product_quantity');

    
        if ($request->input('is_public') != null) {
            //$boite->is_public = $request->input('is_public');
        }
        if ($request->input('status') != null) {
            //$boite->status = $request->input('status');
        }
        if ($request->input('fb_event_url') != null) {
            $boite->fb_event_url = $request->input('fb_event_url');
        }

        if ($request->input('color_code') != null) {
            $boite->color_code = $request->input('color_code');
        }
        if ($request->input('meta_title') != null) {
            $boite->meta_title = $request->input('meta_title');
        }
        if ($request->input('meta_desc') != null) {
            $boite->meta_desc = $request->input('meta_desc');
        }


        if ($request->input('thumbnail') != null) {
            $boite->thumbnail = $request->input('thumbnail');
          } else {
            $boite->thumbnail = null;
          }
      
        //dd($request->input('products'));
        if($request->input('products') != null){
          $boite->products()->detach();
          foreach($request->input('products') as $selectedProduct){
          // if selected product is already link
          $boite->products()->attach($selectedProduct);

          }
      }
        else {
          $boite->products()->detach();
        }


        $boite->save();


        return back()->with('success', "La boite a été modifié.");
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

        $boite = Boite::findOrFail($id);
        $boite->delete();

        return redirect('manager/boites')->with('success', trans('boitesmanagement.deleteSuccess'));

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

        $results = Boite::where('id', 'like', $searchTerm.'%')
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


        public function exportboiteOrders($id){
          $boite = Boite::findOrFail($id);
          $orders = Order::where('cart', $boite->slug)->where('payment_status', true)->get();

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

        public function exportboiteOrdersMailingList($id){
          $boite = Boite::findOrFail($id);
          $orders = Order::where('cart', $boite->slug)->where('payment_status', true)->get();
          foreach($orders as $order){
            echo($order->user->email . ', ');
          }
        }

        public function exportSoldProducts($id){
          $boite = Boite::findOrFail($id);
          $orders = Order::where('cart', $boite->slug)->where('payment_status', true)->get();
          foreach($orders as $order){
            echo($order->user->email . ', ');
          }
        }

}

