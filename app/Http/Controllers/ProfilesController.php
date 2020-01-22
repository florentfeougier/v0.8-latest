<?php

namespace App\Http\Controllers;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

use App\Http\Requests\DeleteUserAccount;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserProfile;
use App\Models\Profile;
use App\Models\Theme;
use App\Models\User;
use App\Models\Order;
use App\Notifications\SendGoodbyeEmail;
use App\Traits\CaptureIpTrait;
use File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;
use App\Notifications\SendOrderReceipt;
use jeremykenedy\Uuid\Uuid;
use Validator;
use View;
use Auth;

class ProfilesController extends Controller
{
  use ActivityLogger;

    protected $idMultiKey = '618423'; //int
    protected $seperationKey = '****';

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
     * Fetch user
     * (You can extract this to repository method).
     *
     * @param $username
     *
     * @return mixed
     */
    public function getUserByUsername($username)
    {
        return User::with('profile')->wherename($username)->firstOrFail();
    }

    /**
     * Display the specified resource.
     *
     * @param string $username
     *
     * @return Response
     */
    public function show($username)
    {


      $ipAddress = new CaptureIpTrait();

        try {
            $user = $this->getUserByUsername($username);
            if($user->name == Auth::user()->name){

              $profile = new Profile();

              $user->signup_confirmation_ip_address = $ipAddress->getClientIp();
              // $user->profile()->save($profile);
              // $user->save();
            //  dd($user->profile());
              //$currentTheme = Theme::findOrFail($user->profile->theme_id);

              $data = [
                  'user'         => $user,
                  //'currentTheme' => $currentTheme,
              ];
            } else {
              return response('Unauthorized.', 401);
            }
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }




return view('profiles.show')->with($data);


    }

    /**
     * /profiles/username/edit.
     *
     * @param $username
     *
     * @return mixed
     */
    public function edit($username)
    {
        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            return view('pages.status')
                ->with('error', trans('profile.notYourProfile'))
                ->with('error_title', trans('profile.notYourProfileTitle'));
        }

        $profile = new Profile();
        if(!$user->profile()->exists()){
           $user->profile()->save($profile);
           $user->activated = true;
           $user->save();
           //dd($user->profile()->get());
           return redirect("profile/$user->name/edit")->with('warning', 'Votre numéro de téléphone est obligatoire pour les livraisons !');


        }

        //$user->signup_confirmation_ip_address = $ipAddress->getClientIp();
        // $user->profile()->save($profile);
        // $user->save();

        //$currentTheme = Theme::findOrFail($user->profile->theme_id);

       // $themes = Theme::where('status', 1)
       //                 ->orderBy('name', 'asc')
       //                 ->get();
       //
       //  $currentTheme = Theme::find($user->profile->theme_id);

        $data = [
            'user'         => $user,
          //  'themes'       => $themes,
          //  'currentTheme' => $currentTheme,

        ];

        return view('profiles.edit')->with($data);
    }

    /**
     * Update a user's profile.
     *
     * @param \App\Http\Requests\UpdateUserProfile $request
     * @param $username
     *
     * @throws Laracasts\Validation\FormValidationException
     *
     * @return mixed
     */
    public function update(UpdateUserProfile $request, $username)
    {
        $user = $this->getUserByUsername($username);

        $input = $request->only('phone_number', 'theme_id', 'location','location_address', 'location_postalcode', 'location_city', 'bio', 'twitter_username', 'github_username', 'avatar_status');

        $ipAddress = new CaptureIpTrait();

        if ($user->profile == null) {
            $profile = new Profile();
            $profile->fill($input);
            $user->profile()->save($profile);
        } else {
            $user->profile->fill($input)->save();
        }


        $user->profile->phone_number = $request->input('phone_number');
        $user->updated_ip_address = $ipAddress->getClientIp();
        $user->save();
        //$user->profile()->save();


        return redirect('profile/'.$user->name.'/edit')->with('success', trans('profile.updateSuccess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function updateUserAccount(Request $request, $id)
    {
        $currentUser = \Auth::user();
        $user = User::findOrFail($id);
        $emailCheck = ($request->input('email') != '') && ($request->input('email') != $user->email);
        $ipAddress = new CaptureIpTrait();
        $rules = [];

        if ($user->name != $request->input('name')) {
            $usernameRules = [
                'name' => 'required|max:255|unique:users',
            ];
        } else {
            $usernameRules = [
                'name' => 'required|max:255',
            ];
        }
        if ($emailCheck) {
            $emailRules = [
                'email' => 'email|max:255|unique:users',
            ];
        } else {
            $emailRules = [
                'email' => 'email|max:255',
            ];
        }
        $additionalRules = [
            'first_name' => 'nullable|string|max:255',
            'last_name'  => 'nullable|string|max:255',
        ];

        $rules = array_merge($usernameRules, $emailRules, $additionalRules);
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user->name = $request->input('name');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');

        if ($emailCheck) {
            $user->email = $request->input('email');
        }

        $user->updated_ip_address = $ipAddress->getClientIp();

        $user->save();

        return redirect('profile/'.$user->name.'/edit')->with('success', trans('profile.updateAccountSuccess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateUserPasswordRequest $request
     * @param int                                          $id
     *
     * @return \Illuminate\Http\Response
     */
    public function updateUserPassword(UpdateUserPasswordRequest $request, $id)
    {
        $currentUser = \Auth::user();
        $user = User::findOrFail($id);
        $ipAddress = new CaptureIpTrait();

        if ($request->input('password') != null) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->updated_ip_address = $ipAddress->getClientIp();
        $user->save();

        return redirect('profile/'.$user->name.'/edit')->with('success', trans('profile.updatePWSuccess'));
    }

    /**
     * Upload and Update user avatar.
     *
     * @param $file
     *
     * @return mixed
     */
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $currentUser = \Auth::user();
            $avatar = $request->file('file');
            $filename = 'avatar.'.$avatar->getClientOriginalExtension();
            $save_path = storage_path().'/users/id/'.$currentUser->id.'/uploads/images/avatar/';
            $path = $save_path.$filename;
            $public_path = '/images/profile/'.$currentUser->id.'/avatar/'.$filename;

            // Make the user a folder and set permissions
            File::makeDirectory($save_path, $mode = 0755, true, true);

            // Save the file to the server
            Image::make($avatar)->resize(300, 300)->save($save_path.$filename);

            // Save the public image path
            $currentUser->profile->avatar = $public_path;
            $currentUser->profile->save();

            return response()->json(['path' => $path], 200);
        } else {
            return response()->json(false, 200);
        }
    }

    /**
     * Show user avatar.
     *
     * @param $id
     * @param $image
     *
     * @return string
     */
    public function userProfileAvatar($id, $image)
    {
        return Image::make(storage_path().'/users/id/'.$id.'/uploads/images/avatar/'.$image)->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\DeleteUserAccount $request
     * @param int                                  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteUserAccount(DeleteUserAccount $request, $id)
    {
        $currentUser = \Auth::user();
        $user = User::findOrFail($id);
        $ipAddress = new CaptureIpTrait();

        if ($user->id != $currentUser->id) {
            return redirect('profile/'.$user->name.'/edit')->with('error', trans('profile.errorDeleteNotYour'));
        }

        // Create and encrypt user account restore token
        $sepKey = $this->getSeperationKey();
        $userIdKey = $this->getIdMultiKey();
        $restoreKey = config('settings.restoreKey');
        $encrypter = config('settings.restoreUserEncType');
        $level1 = $user->id * $userIdKey;
        $level2 = urlencode(Uuid::generate(4).$sepKey.$level1);
        $level3 = base64_encode($level2);
        $level4 = openssl_encrypt($level3, $encrypter, $restoreKey);
        $level5 = base64_encode($level4);

        // Save Restore Token and Ip Address
        $user->token = $level5;
        $user->deleted_ip_address = $ipAddress->getClientIp();
        $user->save();

        // Send Goodbye email notification
        $this->sendGoodbyEmail($user, $user->token);

        // Soft Delete User
        $user->delete();

        // Clear out the session
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/login/')->with('success', trans('profile.successUserAccountDeleted'));
    }

    /**
     * Send GoodBye Email Function via Notify.
     *
     * @param array  $user
     * @param string $token
     *
     * @return void
     */
    public static function sendGoodbyEmail(User $user, $token)
    {
        $user->notify(new SendGoodbyeEmail($token));
    }

    /**
     * Get User Restore ID Multiplication Key.
     *
     * @return string
     */
    public function getIdMultiKey()
    {
        return $this->idMultiKey;
    }

    /**
     * Get User Restore Seperation Key.
     *
     * @return string
     */
    public function getSeperationKey()
    {
        return $this->seperationKey;
    }

    /**
     * Get User Restore Seperation Key.
     *
     * @return string
     */
    public function orders($username)
    {

        $user = Auth::user();
        if($username == Auth::user()->name){
          return View('pages.user.orders', ['user' => $user]);

        } else {
          return response('Unauthorized.', 401);
        }
    }

    /**
     * Get User Restore Seperation Key.
     *
     * @return string
     */
    public function payments()
    {
        $user = Auth::user();
        return View('pages.user.payments', ['user' => $user]);
    }

    /**
     * Get User Restore Seperation Key.
     *
     * @return string
     */
    public function products()
    {
        $user = Auth::user();
        return View('pages.user.products', ['user' => $user]);
    }

    /**
     * Get User Restore Seperation Key.
     *
     * @return string
     */
    public function order($username, $id)
    {
      $user = Auth::user();
      if($username == Auth::user()->name){
        $order = Order::where('order_id', $id)->firstOrFail();
        return View('pages.user.order', ['user' => $user, 'order' => $order]);

      } else {
        return response('Unauthorized.', 401);
      }


    }

    /**
     * Get User Restore Seperation Key.
     *
     * @return string
     */
    public function sendOrderReceipt($username, $id)
    {
        $user = Auth::user();
        $order = Order::where('order_id', $id)->firstOrFail();
        $user->notify(new SendOrderReceipt($order));
        ActivityLogger::activity("$user->email a demandé une facture pour la commande: $order->order_id. Envoyé via email. ");
        return redirect("profile/$user->name/commandes/$order->order_id")->with('success', 'Facture envoyé par email.');
      }


          /**
           * Get User Restore Seperation Key.
           *
           * @return string
           */
          public function deleteUnpaidOrder($username, $id)
          {
              $user = Auth::user();
              if($username == Auth::user()->name){
                $order = Order::where('order_id', $id)->firstOrFail();
                //$user->notify(new SendOrderReceipt($order));
                ActivityLogger::activity("$user->email a supprimé sa commande impayé: $order->order_id");
                if($order->payment_status == false && $order->payment_id == null){
                  $order->delete();
                  return redirect("profile/$user->name/commandes")->with('success', 'Votre commande a bien été supprimé!');

                }

              } else {
                return response('Unauthorized.', 401);
              }


            }
}

