<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Vente;
use App\Models\User;
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

class ProductCategoriesManagementController extends Controller
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
        $pagintaionEnabled = config('productsmanagement.enablePagination');
        if ($pagintaionEnabled) {
            $productcategories = ProductCategorie::paginate(config('productsmanagement.paginateListSize'));
        } else {
            $productcategories = ProductCategorie::all();
        }

        return View('productcategoriesmanagement.show-productcategories', compact('productcategories'));
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
        return view('productcategoriesmanagement.create-productcategorie',
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
                'slug'                  => 'required|max:255|unique:productcategories,slug,'.$request->slug,
                'name'                  => 'required|max:255',
                'description'            => 'required',



            ],
            [
                'description.required'         => 'Le numéro de produit (SKU) doit être unique!',
                'slug.unique'         => 'Le slug doit être unique!',
                'name.required'       => 'Le nom de la vente est obligatoire.',

            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }




        $productcategorie = ProductCategorie::create([
            'slug'       => $request->input('slug'),
            'name'        => $request->input('name'),
            'description'             => $request->input('description'),


        ]);


        $productcategorie->save();

        return redirect("manager/products/categories/$productcategorie->id")->with('success', "Catégorie produit ajoutée.");
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
        $productcategorie = ProductCategorie::find($id);

        return view('productcategoriesmanagement.show-productcategorie', ["productcategorie" =>$productcategorie]);
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
        $productcategorie = ProductCategorie::findOrFail($id);
        $productcategories = ProductCategorie::all();

        $data = [
            'productcategorie'        => $productcategorie,
            'productcategories'        => $productcategories,

        ];

        return view('productcategoriesmanagement.edit-productcategorie')->with($data);
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
        $productcategorie = ProductCategorie::find($id);

        $validator = Validator::make($request->all(), [
          'name'     => 'required|max:255',
          'slug'     => 'nullable',
          'description'     => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $productcategorie->name = $request->input('name');
        //$productcategorie->slug = $request->input('slug');
        $productcategorie->description = $request->input('description');

        $productcategorie->save();

        return back()->with('success', "Catégorie modifiée avec succès.");
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
        // $currentUser = Auth::user();
        $categorie = ProductCategorie::findOrFail($id);
        // $ipAddress = new CaptureIpTrait();
        //
        // if ($categorie->id != $currentUser->id) {
        //     $categorie->deleted_ip_address = $ipAddress->getClientIp();
        //     $categorie->save();
        $categorie->delete();
        //
         return redirect('manager/products/categories')->with('success',"Catégorie supprimée.");
        // }

        //return back()->with('error', trans('usersmanagement.deleteSelfError'));
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

        $results = Product::where('id', 'like', $searchTerm.'%')
                            ->orWhere('name', 'like', $searchTerm.'%')
                            ->orWhere('slug', 'like', $searchTerm.'%')
                            ->orWhere('price', 'like', $searchTerm.'%')
                            ->orWhere('description', 'like', $searchTerm.'%')->get();



        return response()->json([
            json_encode($results),
        ], Response::HTTP_OK);
    }
}

