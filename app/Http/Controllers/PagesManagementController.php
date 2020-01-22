<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Page;
use App\Models\Fiche;
use App\Traits\CaptureIpTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use jeremykenedy\LaravelRoles\Models\Role;
use Validator;

class PagesManagementController extends Controller
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
        $pagintaionEnabled = config('pagesmanagement.enablePagination');
        if ($pagintaionEnabled) {
            $pages = Page::paginate(config('pagesmanagement.paginateListSize'));
        } else {
            $pages = Page::all();
        }

        return View('pagesmanagement.show-pages', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pagesmanagement.create-page');
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
                'sku'                  => 'required|max:255|unique:pages,sku,'.$request->sku,
                'slug'                  => 'required|max:255|unique:pages,slug,'.$request->slug,
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
                'pagecategorie' => 'nullable|integer',
                'pagelabel' => 'nullable|integer',

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




        $page = Page::create([
            'sku'             => $request->input('sku'),
            'slug'       => $request->input('slug'),
            'name'        => $request->input('name'),
            'description'            => $request->input('description'),
            'price'         => $request->input('price'),
            'tax'         => $request->input('price'),
            'stock'        => $request->input('stock'),
            //'pagecategorie_id'    => $request->input('pagecategorie_id'),
        ]);

        if(!is_null($request->input('pagelabel_id'))){
          $page->pagelabel_id = $request->input('pagelabel_id');
        }
        //$page->profile()->save($profile);
        //$page->attachRole($request->input('role'));
        $page->save();

        return redirect("manager/pages/$page->id")->with('success', trans('usersmanagement.createSuccess'));
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
        $page = Page::find($id);

        return view('pagesmanagement.show-page')->withPage($page);
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
        $page = Page::findOrFail($id);


        $fiches = Fiche::all();

        

        $data = [
            'page'        => $page,
            //'pagecategories'        => $pagecategories,
          //  'pagelabels'        => $pagelabels,
            'fiches'        => $fiches,
        ];

        return view('pagesmanagement.edit-page')->with($data);
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
        $page = Page::find($id);


            $validator = Validator::make($request->all(), [
                'name'     => 'required|max:255',
                'slug'     => 'required|max:255|unique:pages,id,'.$id,
                'description'     => 'required|max:255',
                'content'     => 'required',
                'is_public' => 'boolean',
                'thumbnail' => 'nullable|file',
                'meta_title' => 'nullable',
                'meta_desc' => 'nullable',

            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }



        $page->name = $request->input('name');
        $page->slug = $request->input('slug');
        $page->description = $request->input('description');
        $page->content = $request->input('content');


        if ($request->input('pagecategorie_id') != null) {
            $page->pagecategorie_id = $request->input('pagecategorie_id');
        }
        if ($request->input('is_public') == false) {
            $page->is_public = false;
        } elseif($request->input('is_public') == true) {
            $page->is_public = true;
        }


        if ($request->input('meta_title') != null) {
            $page->meta_title = $request->input('meta_title');
        }

        if ($request->input('meta_desc') != null) {
            $page->meta_desc = $request->input('meta_desc');
        }

        if ($request->input('color_code') != null) {
            $page->color_code = $request->input('color_code');
        }

        $page->save();

        return back()->with('success', trans('pagesmanagement.updateSuccess'));
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
        $currentUser = Auth::user();
        $user = User::findOrFail($id);
        $ipAddress = new CaptureIpTrait();

        if ($user->id != $currentUser->id) {
            $user->deleted_ip_address = $ipAddress->getClientIp();
            $user->save();
            $user->delete();

            return redirect('users')->with('success', trans('usersmanagement.deleteSuccess'));
        }

        return back()->with('error', trans('usersmanagement.deleteSelfError'));
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


    public function sitemap(){
        return View('sitemap');

    }
}
