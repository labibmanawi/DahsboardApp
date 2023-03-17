<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Order;
use Symfony\Component\HttpFoundation\Response;



class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = OrderItem::with('product')->where('order_id', $id)->get();


        return response()->json(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'product_id' => 'required|integer',
            'qty' => 'required|integer'

        ]);

        $data = $request->all();
        OrderItem::create($data);
        $orderItem = OrderItem::where('order_id', $data['order_id'])->get();

        return response()->json(['data' => $orderItem ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $findout = OrderItem::findOrFail($id);
        $request->validate([
            'order_id' => 'required|integer|exists:orders,id',
            'product_id' => 'required|integer|exists:products,id',
            'qty' => 'required|integer'

        ]);
        
        
       $datafind = $request->all();
       $findout->update($datafind);
       $order_item = OrderItem::where('order_id', $findout)->get();
       return response()->json(['data' => $order_item]);
        
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($order_id, $id)
    {
        OrderItem::where('order_id',$order_id)->where('id', $id)->delete();
        $order_item = OrderItem::with('product')->where('order_id', $order_id)->get();
        return response()->json(['data' => $order_item]);
    }
}
