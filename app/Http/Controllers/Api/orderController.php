<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    public function todayOrder()
    {
        $date = date('d/m/Y');
        $order = DB::table('orders')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->where('order_date', '=', $date)
            ->select('customers.name', 'orders.*')
            ->orderBy('orders.id', 'DESC')
            ->get();
        return response()->json($order);
    }
}
