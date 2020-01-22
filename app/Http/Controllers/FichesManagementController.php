<?php

namespace App\Http\Controllers;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;
use App\Models\Profile;
use App\Models\Product;
use App\Models\User;
use App\Models\Fiche;
use App\Traits\CaptureIpTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use jeremykenedy\LaravelRoles\Models\Role;
use Validator;

class FichesManagementController extends Controller
{
  use ActivityLogger;

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
        $pagintaionEnabled = config('fichesmanagement.enablePagination');
        if ($pagintaionEnabled) {
            $fiches = Fiche::paginate(config('fichesmanagement.paginateListSize'));
        } else {
            $fiches = Fiche::all();
        }

        return View('fichesmanagement.show-fiches', compact('fiches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('fichesmanagement.create-fiche');
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
              'name'     => 'required|max:255',
              'slug'     => 'required|max:255|unique:fiches',
              'description'     => 'required|max:255',
              'description_short'     => 'required|max:255',
              'content'     => 'required',
              'arrosage_info'     => 'required|max:255',
              'entretien_info'     => 'required|max:255',
              'lumiere_info'     => 'required|max:255',
              'color_code'     => 'nullable|max:32',
              'meta_title'     => 'nullable|max:255',
              'meta_desc'     => 'nullable|max:255',
              'is_public'     => 'nullable|boolean',
              'thumbnail' => 'nullable',

            ],
            [
                'name.unique'         => trans('auth.userNameTaken'),
                'name.required'       => trans('auth.userNameRequired'),
                'content.required' => "Merci de mettre du contenu.",
                'description.required'  => "Les infos d'entretien sont obligatoire.",
                'arrosage_info.required'      => "Les infos d'entretien sont obligatoire.",
                'entretien_info.email'         => "Les infos d'entretien sont obligatoire.",
                'lumiere_info.required'   => "Les infos d'entretien sont obligatoire.",

            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }



        $fiche = Fiche::create([
            'slug'             => $request->input('slug'),
            'name'       => $request->input('name'),
            'description'        => $request->input('description'),
            'description_short'            => $request->input('description_short'),
            'content'         => $request->input('content'),
            'arrosage_info'            => $request->input('arrosage_info'),
            'entretien_info' => $request->input('entretien_info'),
            'lumiere_info'        => $request->input('lumiere_info'),
            'color_code'        => $request->input('color_code'),

        ]);

        if(!is_null($request->input('meta_title'))){
          $fiche->meta_title = $request->input('meta_title');
        }

        if(!is_null($request->input('meta_desc'))){
          $fiche->meta_desc = $request->input('meta_desc');
        }

        if(!is_null($request->input('thumbnail'))){
          $fiche->thumbnail = $request->input('thumbnail');
        }

               
        $fiche->save();

        return redirect('manager/fiches')->with('success', trans('fichesmanagement.createSuccess'));
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
        $fiche = Fiche::find($id);

        return view('fichesmanagement.show-fiche')->withFiche($fiche);
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
        $fiche = Fiche::findOrFail($id);
        $products = Product::all();



        $data = [
            'fiche'        => $fiche,
            'products'        => $products,

        ];

        return view('fichesmanagement.edit-fiche')->with($data);
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

        $fiche = Fiche::find($id);


            $validator = Validator::make($request->all(), [
                'slug'     => 'required',
                'name'     => 'required|max:255',
                'description'    => 'required',
                'description_short' => 'present',
                'content' => 'present',
                'arrosage_info' => 'present',
                'entretien_info' => 'present',
                'lumiere_info' => 'present',
                'color_code' => 'nullable',
                'meta_title' => 'nullable',
                'meta_desc' => 'nullable',
                'thumbnail' => 'nullable',

            ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $fiche->name = $request->input('name');
        $fiche->slug = $request->input('slug');
        $fiche->description = $request->input('description');
        $fiche->description_short = $request->input('description_short');
        $fiche->content = $request->input('content');
        $fiche->arrosage_info = $request->input('arrosage_info');
        $fiche->entretien_info = $request->input('entretien_info');
        $fiche->lumiere_info = $request->input('lumiere_info');


        if ($request->input('meta_title') != null) {
            $fiche->meta_title = $request->input('meta_title');
        }

        if ($request->input('meta_desc') != null) {
            $fiche->meta_desc = $request->input('meta_desc');
        }

        if ($request->input('color_code') != null) {
            $fiche->color_code = $request->input('color_code');
        }

        // if ($request->hasFile('thumbnail')) {
        //     $image = $request->file('thumbnail');
        //     $name = str_slug($fiche->slug).'.'.$image->getClientOriginalExtension();

        //     $destinationPath = public_path('fiches');
        //     $imagePath = $destinationPath. "/".  $name;
        //     $uploadedFile = $image->storeAs('fiches', $name, 'public' );

        //     $fiche->thumbnail = $uploadedFile ;
        //   }

         if ($request->input('thumbnail') != null) {

            $fiche->thumbnail = $request->input('thumbnail');
           
        }


                  if (!empty($request->input('products') or $request->input('products') != null)) {
                    $fiche->products()->detach();
                    foreach($request->input('products') as $relatedProduct){
                      // if selected product is already link
                      $fiche->products()->attach($relatedProduct);

                    }
                  } else {
                    $fiche->products()->detach();
                  }
        $fiche->save();

        return back()->with('success', trans('fichesmanagement.updateSuccess'));
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
        $fiche = Fiche::findOrFail($id);
        $fiche->delete();

        return redirect('manager/fiches')->with('success', trans('fichesmanagement.deleteSuccess'));


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

    public function clone($id){

        $fiche = Fiche::findOrFail($id);

        $clone = Fiche::create([
          'slug' => $fiche->slug . '-clone-' . rand(1,100000),
          'name' => $fiche->name . ' - Clone',
          'description' => $fiche->description,
          'content' => $fiche->content,
          'color_code' => $fiche->color_code,
          'thumbnail' => $fiche->thumbnail,
          'arrosage_info' => $fiche->arrosage_info,
          'entretien_info' => $fiche->entretien_info,
          'lumiere_info' => $fiche->lumiere_info,
          'meta_title' => $fiche->meta_title,
          'meta_desc' => $fiche->meta_desc,

        ]);

        return back()->with('success', 'Fiche cloné!');
    }
}

