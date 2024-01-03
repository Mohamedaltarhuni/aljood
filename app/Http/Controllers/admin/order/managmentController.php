<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class crudController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // Add validation rules for the order data
        ]);

        $order = Order::findOrFail($id);
        // Set the values of the order attributes based on the request data
        // For example:
        $order->customer_id = $request->user()->id;
        $order->timestamps = false; // Disable updating the timestamps for the update
        $order->save();

        return response()->json($order);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}
