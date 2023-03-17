<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\Rule;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;


class AdminLTEController extends Controller
{

    

    public function dashboard() {
        return view('admin.adminLTE-dashboard');
    }

    public function dashboard2() {
        return view('admin.adminLTE-dashboard2');
    }

    


    //---------------------------PRODUCT CONTTROLLER AREA START---------------------------------  

    public function product_list() {
        $product_list = Product::with('category')->paginate(10);
        // return $product_list;
            return view('admin.products.list', compact('product_list'));
    }

        //insert product

        public function insert() {
            $category = Category::get();
            $last_productid = Product::orderBy('id','desc')->first()->code;
            $last_code = $last_productid + 1;
            
            return view('admin.products.insert', compact('category', 'last_code'));
        }
    
        public function insertAction(Request $request) {
    
            $validated = $request->validate([
                'code' => 'required|unique:products',
                'name' => 'required',
                'category_id' => 'required',
                'stock' => 'required',
                'varian' => 'required',
                'description' => 'required'
    
            ]);
    
    
            $product = new Product;
            
            $product->code = $request->input('code');
            $product->name = $request->input('name');
            $product->category_id = $request->input('category_id');
            $product->stock = $request->input('stock');
            $product->varian = $request->input('varian');
            $product->description = $request->input('description');
    
    
            $product->save();
            
            return back()->with('message','berhasil');
    
        }

         //edit product

    public function edit(Request $request, $id) {
        $prodEdit = Product::find($id);
        $category = Category::get();
        return view('admin.products.edit', compact('category','prodEdit','id'));

    }

    public function edit_product(Request $request, $id) {

        $prodEdit = Product::find($id);

        $validated = $request->validate([

            'name'=>'required',
            'category_id'=>'required',
            'stock'=>'required',
            'varian'=>'required',
            'description'=>'required'

        ]);

        // return $request;
        
        $prodEdit->name = $request->name;
        $prodEdit->category_id = $request->category_id;
        $prodEdit->stock = $request->stock;
        $prodEdit->varian = $request->varian;
        $prodEdit->description = $request->description;
        $prodEdit->save();

        return back()->with('message', 'berhasil');

    }

    //delete product

    public function delete_product($id) {
        
        $prodDelete = Product::find($id);

        $prodDelete->delete();

        return back()->with('message', 'Data berhasil dihapus sob');

    }
    

//---------------------------PRODUCT CONTTROLLER AREA END---------------------------------    


//---------------------------user controller area start-----------------------------------

    public function user_list() {
        $user_list = DB::table('users')->paginate(10);
            return view('admin.user.list2', compact('user_list'));
    }

      //insert user

      public function insert2() {
        $last_userId = User::orderBy('id','desc')->first()->id;
        $last_id = $last_userId + 1;
        
        return view('admin.user.insert2', compact('last_id'));
    }


    public function insertUser(Request $request) {

        $validated = $request->validate([
            'id'=> 'required|unique:users',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'

        ]);

        $user = new User;
        $user->id = $request->input('id');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return back()->with('message','berhasil');


    } 
    
    //edit user

    public function editUser(Request $request, $id) {
        $userEdit = User::find($id);
        return view('admin.user.edit2', compact('userEdit','id'));

    }

    public function edit_user(Request $request, $id) {

        $userEdit = User::find($id);

        $validated = $request->validate([

            'id'=> 'required',
            'name' => 'required',
            'email' => 'required'

        ]);

        // return $request;
        
        $userEdit->id = $request->id;
        $userEdit->name = $request->name;
        $userEdit->email = $request->email;
        $userEdit->save();

        return back()->with('message', 'berhasil');

    }

      //delete user
    public function delete_user($id) {
        $userDelete = User::find($id);
        $userDelete->delete();
        return back()->with('message', 'Data berhasil dihapus sob');
    }

//---------------------------user controller area end-----------------------------------    




//--------------------ORDER CONTROLLER AREA START----------------------------   
    public function order_list() {
        $order_list = Order::with('users')->paginate(10);
        // return $order_list;
        return view('admin.orders.listOrder', compact('order_list'));
    }

    public function orderItem() {
        
        return view('admin.orders.order_item');

    }

    //insert order
    public function insert_order() {
        $users = User::all();
        $userSelect = DB::table('orders')
            ->join('users','orders.user_id','=','users.id')
            ->select('orders.user_id','users.name')
            ->get();
        
        // return $userSelect;
        return view('admin.orders.insertOrder', compact('userSelect','users'));

    }
    
    //insert order validation
    public function insertAction_order(Request $request) {


        $validated = $request->validate([
            'user_id' => 'required',
            'tanggal_order' => 'date'

        ]);


        $order = new Order;
        $order->user_id = $request->input('user_id');
        $order->tanggal_order = $request->input('tanggal_order');
       

        $order->save();
        
        return back()->with('message','succsess');
        // return redirect('listOrder');
    }

    

    public function order_itemName(Request $request,$id) {

        
        $detail_order = DB::table('order_items')
        ->join('products','products.id','=','order_items.product_id')
        ->join('orders','orders.id','=','order_items.order_id')
        ->join('users','users.id','=','orders.user_id')
        ->select('order_items.id','users.name','order_items.product_id','products.name as product_name','order_items.qty')
        ->where('order_id','=',$id)
        ->get();

        $oiName = Product::all();

        // return $detail_order;
        // return $oiName;
        // return view('admin.orders.order_item', compact('oiName'));
        return view('admin.orders.order_item', compact('oiName','detail_order','id'));

    }


    
    public function insertOrder_ItemAction(Request $request) {
        
        $validated = $request->validate([
            'product_id' => 'required',
            'qty' => 'required'

        ]);

        $orderItem = new OrderItem;
        $orderItem->order_id = $request->order_id;
        $orderItem->product_id = $request->input('product_id');
        $orderItem->qty = $request->input('qty');
    
        $orderItem->save();

        // return $orderItem;

        return back()->with('message','berhasil');

    }

    public function edit_orderItem(Request $request, $id) {

        $oiProduct = Product::all();
        $oiDetail = OrderItem::find($id);

        // return $oiProduct;
        // return $oiDetail;
        
        return view('admin.orders.editOrder', compact('oiProduct','oiDetail'));

    }


    public function editOrder_itemAction(Request $request, $id) {   
        $oiProduct = Product::all();
        $orderItem = OrderItem::find($id);
        
        $validated = $request->validate([
            'product_id' => 'required',
            'qty' => 'required'

        ]);

        //return update
        $orderItem->product_id = $request->product_id;
        $orderItem->qty = $request->qty;
    
        $orderItem->save();

        // return $orderItem;
        // return redirect()->route(get('/editOrder/{id}',[AdminLTEController::class, 'edit_orderItem']));
        // return redirect()->route('editOrder.{id}')->with('message','berhasil');
        return back()->with('message','berhasil');
    }


    //delete listorder
    public function delete_listorder($id) {

        $list_orderDB = DB::table('order_items')->where('order_id','=',$id);
        $list_orderDB->delete();
        $listDelete = Order::find($id);
        $listDelete->delete();
        return back()->with('message','Data berhasil dihapus sob');
    }

    //delete orderitem
    public function delete_oi($id) {
        $oiDelete = OrderItem::find($id);
        $oiDelete->delete();
        return back()->with('message', 'Data berhasil dihapus sob');
    }

//--------------------ORDER CONTROLLER AREA END----------------------------      
    

}
