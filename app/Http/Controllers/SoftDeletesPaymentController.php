<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Role;

class SoftDeletesPaymentController extends Controller
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
     * Get Soft Deleted Payment.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public static function getDeletedPayment($id)
    {
        $payment = Payment::onlyTrashed()->where('id', $id)->get();
        if (count($payment) != 1) {
            return redirect('/users/deleted/')->with('error', trans('usersmanagement.errorPaymentNotFound'));
        }

        return $payment[0];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::onlyTrashed()->get();
        $roles = Role::all();

        return View('usersmanagement.show-deleted-users', compact('users', 'roles'));
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
        $payment = self::getDeletedPayment($id);

        return view('usersmanagement.show-deleted-user')->withPayment($payment);
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
        $payment = self::getDeletedPayment($id);
        $payment->restore();

        return redirect('/users/')->with('success', trans('usersmanagement.successRestore'));
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
        $payment = self::getDeletedPayment($id);
        $payment->forceDelete();

        return redirect('/users/deleted/')->with('success', trans('usersmanagement.successDestroy'));
    }
}
