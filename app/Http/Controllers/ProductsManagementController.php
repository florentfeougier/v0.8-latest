<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Vente;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Fiche;
use App\Models\ProductLabel;
use App\Models\ProductCategorie;
use App\Traits\CaptureIpTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use jeremykenedy\LaravelRoles\Models\Role;
use Validator;

class ProductsManagementController extends Controller
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
    public function index(Request $request)
    {
        $pagintaionEnabled = config('productsmanagement.enablePagination');
        if ($pagintaionEnabled) {

          if($request->q == "orderbyasc_price"){
            $products = Product::orderBy('price', 'asc')->paginate(200);
          }
          elseif($request->q == "orderbydesc_price"){
            $products = Product::orderBy('price', 'desc')->paginate(200);

          }

          elseif($request->q == "orderbyasc_stock"){
            $products = Product::orderBy('stock', 'asc')->paginate(200);

          }
          elseif($request->q == "orderbydesc_stock"){
            $products = Product::orderBy('stock', 'desc')->paginate(200);

          }
          else {
            $products = Product::paginate(200);

          }

        } else {
            $products = Product::all();
        }

        return View('productsmanagement.show-products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $productcategories = ProductCategorie::all();
      $productlabels = ProductLabel::all();

      $data = [
          'productcategories'        => $productcategories,
      ];
        return view('productsmanagement.create-product',
        [
          'productlabels' => $productlabels,
          'productcategories' => $productcategories,
      ]);
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
                'sku'                  => 'required|max:255|unique:products,sku,'.$request->sku,
                'slug'                  => 'required|max:255|unique:products,slug,'.$request->slug,
                'name'                  => 'required|max:255',
                'description'            => 'required',
                'specs'             => 'nullable',
                'price'                 => 'required|between:0,9999,99',
                'old_price'              => 'nullable',
                'tax' => 'required',
                'weight' => 'nullable',
                'height' => 'nullable',
                'tax' => 'required',
                'meta_desc' => 'nullable',
                'meta_title' => 'nullable',
                'productcategorie' => 'nullable|integer',
                'productlabel' => 'nullable|integer',
                'thumbnail' => 'nullable|file|mimes:jpeg,jpg,png|max:1500',


            ],
            [
                'sku.unique'         => 'Le numéro de produit (SKU) doit être unique!',
                'slug.unique'         => 'Le slug doit être unique!',
                'name.required'       => 'Le nom de la vente est obligatoire.',
                'tax.required'       => 'Le pourcentage de TVA est obligatoire.',
                'description.required' => trans('auth.descriptionRequired'),
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }




        $product = Product::create([
            'sku'             => $request->input('sku'),
            'slug'       => $request->input('slug'),
            'name'        => $request->input('name'),
            'description'            => $request->input('description'),
            'price'         => $request->input('price'),
            'tax'         => $request->input('price'),
            'stock'        => $request->input('stock'),
            'productcategorie_id'    => $request->input('productcategorie_id'),
        ]);

        if(!is_null($request->input('productlabel_id'))){
          $product->productlabel_id = $request->input('productlabel_id');
        }
        //$product->profile()->save($profile);
        //$product->attachRole($request->input('role'));
        $product->save();

        return redirect("manager/products/$product->id")->with('success', trans('usersmanagement.createSuccess'));
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
        $product = Product::where('slug',$id)->first();

        $orders = Order::all();
        foreach($orders as $order){
          //dd($order->products->where('id', $product->id)->exists());
        }
        if(empty($product)){
          $product = Product::findOrFail($id);

        }
        return view('productsmanagement.show-product',['product' => $product]);
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
        $product = Product::findOrFail($id);
        $productcategories = ProductCategorie::all();
        $productlabels = ProductLabel::all();
        $fiches = Fiche::all();
        $ventes = Vente::all();



        $data = [
            'product'        => $product,
            'productcategories'        => $productcategories,
            'productlabels'        => $productlabels,
            'fiches'        => $fiches,
            'ventes'        => $ventes,
        ];

        return view('productsmanagement.edit-product')->with($data);
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
        $product = Product::find($id);

            $validator = Validator::make($request->all(), [
                'name'     => 'required|max:255',
                'slug'     => 'required|max:255|unique:ventes,id,'.$id,
                'description'     => 'required|max:255',
                'specs'     => 'nullable|max:255',
                'price' => 'required|numeric',
                'old_price' => 'nullable|numeric',
                'tax' => 'nullable',
                'stock' => 'nullable',
                'weight' => 'nullable|numeric',
                'height' => 'nullable',
                'store_enabled' => 'boolean',
                'thumbnail' => 'nullable',
                'picture_one' => 'nullable',
                'video' => 'nullable',
                'meta_title' => 'nullable',
                'meta_desc' => 'nullable',
                'productcategorie_id' => 'nullable',
                'productlabel_id' => 'nullable',
            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }



        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');

        if ($request->input('productcategorie_id') != null) {
            $product->productcategorie_id = $request->input('productcategorie_id');
        }
        if ($request->input('store_enabled') == false) {
            $product->store_enabled = false;
        } elseif($request->input('store_enabled') == true) {
            $product->store_enabled = true;
        }

        if ($request->input('productlabel_id') != 'null') {
            $product->productlabel_id = $request->input('productlabel_id');
        }
        else {
          $product->productlabel_id = null;

        }


        if ($request->input('specs') != null) {
            $product->specs = $request->input('specs');
        }

        if ($request->input('weight') != null) {
            $product->weight = $request->input('weight');
        }

        if ($request->input('height') != null) {
            $product->height = $request->input('height');
        }
        if ($request->input('tax') != null) {
            $product->tax = $request->input('tax');
        }
        if ($request->input('old_price') != null) {
            $product->old_price = $request->input('old_price');
        }

        if ($request->input('meta_title') != null) {
            $product->meta_title = $request->input('meta_title');
        }

        if ($request->input('meta_desc') != null) {
            $product->meta_desc = $request->input('meta_desc');
        }

        if ($request->input('color_code') != null) {
            $product->color_code = $request->input('color_code');
        }

         if ($request->input('thumbnail') != null) {
            $product->thumbnail = $request->input('thumbnail');
        }

         if ($request->input('picture_one') != null) {
            $product->picture_one = $request->input('picture_one');
        } else {
            $product->picture_one = null;

        }

         if ($request->input('video') != null) {
            $product->video = $request->input('video');
        } else {
            $product->video = null;

        }


        if ($request->input('fiches') != null) {
          $product->fiches()->detach();
          foreach($request->input('fiches') as $relatedFiche){
            // if selected product is already link
            $product->fiches()->attach($relatedFiche);

          }

        }else {
          $product->fiches()->detach();
        }

        if ($request->input('ventes') != null) {
          $product->ventes()->detach();
          foreach($request->input('ventes') as $relatedFiche){
            // if selected product is already link
            $product->ventes()->attach($relatedFiche);

          }

        } else {
          $product->ventes()->detach();
        }




        

        $product->save();

 
        return back()->with('success', "Produit modifié avec succès");
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
         $fiche = Product::findOrFail($id);
         $fiche->delete();

         return redirect('manager/products')->with('success', trans('fichesmanagement.deleteSuccess'));


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
        $searchTerm = $request->input('product_search_box');
        $searchRules = [
            'product_search_box' => 'required|string|max:255',
        ];
        $searchMessages = [
            'product_search_box.required' => 'Search term is required',
            'product_search_box.string'   => 'Search term has invalid characters',
            'product_search_box.max'      => 'Search term has too many characters - 255 allowed',
        ];

        $validator = Validator::make($request->all(), $searchRules, $searchMessages);

        if ($validator->fails()) {
            return response()->json([
                json_encode($validator),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $results = Product::where('name', 'like', $searchTerm.'%')
                            ->orWhere('sku', 'like', $searchTerm.'%')
                            ->orWhere('price', 'like', $searchTerm.'%')->get();
                          //  ->orWhere('name', 'like', $searchTerm.'%')
                          //  ->orWhere('price', 'like', $searchTerm.'%')
                          //  ->orWhere('tax', 'like', $searchTerm.'%')
                          //  ->orWhere('description', 'like', $searchTerm.'%')->get();



        return response()->json([
            json_encode($results),
        ], Response::HTTP_OK);
    }
}

