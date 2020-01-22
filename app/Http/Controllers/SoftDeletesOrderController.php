<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Role;

class SoftDeletesOrderController extends Controller
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
     * Get Soft Deleted Order.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public static function getDeletedOrder($id)
    {
        $order = Order::onlyTrashed()->where('id', $id)->get();
        if (count($order) != 1) {
            return redirect('/orders/deleted/')->with('error', trans('ordersmanagement.errorOrderNotFound'));
        }

        return $order[0];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::onlyTrashed()->get();
        $roles = Role::all();

        return View('ordersmanagement.show-deleted-orders', compact('orders', 'roles'));
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
        $order = self::getDeletedOrder($id);

        return view('ordersmanagement.show-deleted-user')->withOrder($order);
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
        $order = self::getDeletedOrder($id);
        $order->restore();

        return redirect('/orders/')->with('success', trans('ordersmanagement.successRestore'));
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
        $order = self::getDeletedOrder($id);
        $order->forceDelete();

        return redirect('/orders/deleted/')->with('success', trans('ordersmanagement.successDestroy'));
    }
}

