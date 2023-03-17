<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index() {
        $products = Product::count();
        $orders = Order::count();
        $orders_item = OrderItem::count();
        $users = User::where('is_admin','0')->count();
        $admin = User::where('is_admin','1')->count();
        
        //donut graphic
        $data_donut = Product::select(DB::raw('count(category_id) as total'))->groupBy('category_id')->orderBy('category_id','asc')->pluck('total');
        $label_donut = Category::orderBy('categories.id', 'asc')->join('products','products.category_id','=','categories.id')->groupBy('nama')->pluck('nama');

        //bar graphic
        $label_bar = ['Order Data'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = 'rgba(60,141,188,0.9)';
            $data_month = [];

            foreach (range(1,12) as $month) {
                $data_month[] = OrderItem::select(DB::raw("COUNT(*) as total"))->whereMonth('created_at', $month)->first()->total; 
            }
            $data_bar[$key]['data'] = $data_month;
        }

        // return $data_month;
        

        return view('admin.dashboard.admDash', compact('products','orders','users','admin','orders_item','data_donut','label_donut','data_bar'));
    }


   

} 
