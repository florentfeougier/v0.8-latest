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

class ProductLabelsManagementController extends Controller
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

            $productlabels = ProductLabel::paginate(25);


        return View('productlabelsmanagement.show-productlabels', compact('productlabels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $productlabels = ProductLabel::all();

        return view('productlabelsmanagement.create-productlabel',
        [
          'productlabels' => $productlabels,
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
                'name'                  => 'required|max:255',
                'slug'                  => 'required|max:255|unique:productlabels,slug,'.$request->slug,
                'color_code'                  => 'required|max:32',
            ],
            [
                'slug.unique'         => 'Le numéro de produit (SKU) doit être unique!',
                'name.unique'         => 'Le slug doit être unique!',
                'color_code.required'       => 'Le nom de la vente est obligatoire.',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $productlabel = ProductLabel::create([
            'slug'             => $request->input('slug'),
            'name'       => $request->input('name'),
            'color_code'        => $request->input('color_code'),

        ]);

        $productlabel->save();

        return redirect("manager/products/labels/$productlabel->id")->with('success', "Label ajouté avec succès.");
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
        $productlabel = ProductLabel::find($id);

        return view('productlabelsmanagement.show-productlabel', ["productlabel"=>$productlabel]);
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
        //$productcategorie = ProductLabel::findOrFail($id);
        //$productlabels = ProductLabel::all();
        $productlabel = ProductLabel::find($id);




        $data = [
          //  'productcategorie'        => $productcategorie,
            'productlabel'        => $productlabel,

        ];

        return view('productlabelsmanagement.edit-productlabel')->with($data);
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
        $label = ProductLabel::find($id);


            $validator = Validator::make($request->all(), [
                'name'     => 'required|max:255',
                'slug'     => 'required|max:255',
                'color_code'     => 'required|max:255',

            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        $label->name = $request->input('name');
        $label->slug = $request->input('slug');
        $label->color_code = $request->input('color_code');

        $label->save();

        return back()->with('success', trans('productlabelsmanagement.updateSuccess'));
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
        $label = ProductLabel::findOrFail($id);
        // $ipAddress = new CaptureIpTrait();
        //
        // if ($user->id != $currentUser->id) {
        //     $user->deleted_ip_address = $ipAddress->getClientIp();
        //     $user->save();
        $label->delete();
        //
        return redirect('manager/products/labels')->with('success',"Label supprimée.");
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

