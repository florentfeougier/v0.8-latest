<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Post;
use App\Models\Fiche;
use App\Models\PostCategorie;
use App\Traits\CaptureIpTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use jeremykenedy\LaravelRoles\Models\Role;
use Validator;

class PostsManagementController extends Controller
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
        $pagintaionEnabled = config('postsmanagement.enablePagination');
        if ($pagintaionEnabled) {
            $posts = Post::paginate(config('postsmanagement.paginateListSize'));
        } else {
            $posts = Post::all();
        }

        return View('postsmanagement.show-posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $postcategories = PostCategorie::all();

      $data = [
          'postcategories'        => $postcategories,
      ];
        return view('postsmanagement.create-post',
        [
          'postcategories' => $postcategories,
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
               
                'slug'                  => 'required|max:255',
                'name'                  => 'required|max:255',
                'description'            => 'required',
                'content'            => 'required',
                'productcategorie_id'             => 'nullable',
                'meta_title'             => 'nullable',
                'meta_desc'             => 'nullable',


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




        $post = Post::create([
            'slug'       => $request->input('slug'),
            'name'        => $request->input('name'),
            'description'            => $request->input('description'),
            'content'            => $request->input('content'),

        ]);


        //$post->profile()->save($profile);
        //$post->attachRole($request->input('role'));
        $post->save();

        return redirect("manager/posts/$post->id")->with('success', trans('usersmanagement.createSuccess'));
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
        $post = Post::find($id);

        return view('postsmanagement.show-post')->withPost($post);
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
        $post = Post::findOrFail($id);
        $postcategories = PostCategorie::all();

        $fiches = Fiche::all();



        $data = [
            'post'        => $post,
            'postcategories'        => $postcategories,
            'fiches'        => $fiches,
        ];

        return view('postsmanagement.edit-post')->with($data);
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
        $post = Post::find($id);


            $validator = Validator::make($request->all(), [
                'name'     => 'required|max:255',
                'slug'     => 'required|max:255|unique:posts,id,'.$id,
                'description'     => 'required|max:255',
                'content'     => 'required',
                'difficulty'     => 'nullable|integer|between:1,5',
                'duration'     => 'nullable|integer',
                'thumbnail' => 'nullable',
                'meta_title' => 'nullable',
                'meta_desc' => 'nullable',
                'postcategorie_id' => 'nullable',
                'postlabel_id' => 'nullable',
                'color_code' => 'nullable',
            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }



        $post->name = $request->input('name');
        $post->slug = $request->input('slug');
        $post->description = $request->input('description');
        $post->content = $request->input('content');

        if ($request->input('postcategorie_id') != null) {
            $post->postcategorie_id = $request->input('postcategorie_id');
        }


        if ($request->input('duration') != null) {
                  $post->duration = $request->input('duration');
        }

        if ($request->input('difficulty') != null) {
                    $post->difficulty = $request->input('difficulty');
        }
        if ($request->input('meta_title') != null) {
                    $post->meta_title = $request->input('meta_title');
        }
        if ($request->input('meta_desc') != null) {
                    $post->meta_desc = $request->input('meta_desc');
        }
        if ($request->input('thumbnail') != null) {
            $post->thumbnail = $request->input('thumbnail');
        }

        $post->save();

        return back()->with('success', "Article modifié avec succès.");
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
        $post = Post::findOrFail($id);
        //$ipAddress = new CaptureIpTrait();

        
           // $post->deleted_ip_address = $ipAddress->getClientIp();
          //  $post->save();
            $post->delete();

            return redirect('manager/posts')->with('success', "Article supprimé.");
        

        //return back()->with('error', trans('postsmanagement.deleteSelfError'));
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

        $post = Post::findOrFail($id);

        $clone = Post::create([
          'slug' => $post->slug . '-clone-' . rand(1,100000),
          'name' => $post->name . ' - Clone',
          'description' => $post->description,
          'content' => $post->content,
          'color_code' => $post->color_code,
          'thumbnail' => $post->thumbnail,
          'meta_title' => $post->meta_title,
          'meta_desc' => $post->meta_desc,

        ]);

        return back()->with('success', 'Article cloné!');
    }
}


