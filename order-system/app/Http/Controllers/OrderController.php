<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Order::query();

        $query->orderBy('created_at', 'desc');
        $orders = $query->paginate(10);
        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = new Order;
        $customers = Customer::orderBy('id')->get();
        $products = Product::with('category')->orderBy('id')->get();
        return view('orders.create', [
            'order' => $order,
            'customers' => $customers,
            'products' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1|max:999',
        ]);

        $product = Product::findOrFail($request->product_id);
        $order = new Order([
            'customer_id' => $request->customer_id,
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'unit_price' => $product->price,
        ]);
        $order->save();
        return redirect(route('orders.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {        
        $customers = Customer::orderBy('id')->get();
        $products = Product::with('category')->orderBy('id')->get();
        return view('orders.edit', [
            'order' => $order,
            'customers' => $customers,
            'products' => $products,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1|max:999',
            'unit_price' => 'required|integer|min:1',
            'shipped_on' => 'nullable|date',
        ]);
        $order->update($request->all());
        return redirect(route('orders.show', $order->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect(route('orders.index'));
    }

    // Step7オプション課題：発送済みにする処理
    public function ship(Order $order)
    {
        $order->update(['shipped_on' => now()]);
        return back();
    }
}
