<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\OlshopController;
use App\Http\Controllers\UserLTEController;
use App\Http\Controllers\AdminLTEController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/home', function () {
    return view('home');
});


Route:: get('/product', function () {
    return view('product');
});

Route:: get('/detail-product', function () {
    return view('detail-product');
});

Route:: get('/cart', function () {
    return view('cart');
});

Route:: get('/checkout', function() {
    return view('checkout');
});

Route:: get('/checkout-success', function () {
    return view('checkout-success');
});



// DIVISIMA  AREA START //


Route:: get('/olshop' , [OlshopController::class, 'olshop']);

Route:: get('/' , [OlshopController::class, 'index']);

Route:: get('/olshop-cart' , [OlshopController::class, 'cart']);

Route:: get('/olshop-category', [OlshopController::class, 'category']);

Route:: get('/olshop-checkout' , [OlshopController::class, 'checkout']);

Route:: get('/olshop-contact' , [OlshopController::class, 'contact']);

Route:: get('/olshop-product' , [OlshopController::class, 'product']);


// DIVISIMA AREA END //



//ADMIN-LTE AREA START



Route::prefix('admin')->group(function () 
{
    Route:: get('/adminLTE-dashboard', [AdminLTEController::class, 'dashboard']);
    Route:: get('/adminLTE-dashboard2', [AdminLTEController::class, 'dashboard2']);

    // Route:: get('/products/list', [AdminLTEController::class, 'product_list']);

    Route:: prefix('products')->group(function () 
    {
        Route:: get('/list', [AdminLTEController::class, 'product_list']);
        Route:: get('/insert', [AdminLTEController::class, 'insert']);
        Route:: post('/insert-post', [AdminLTEController::class, 'insertAction']);
        Route:: get('/edit/{id}' , [AdminLTEController::class, 'edit']);
        Route:: post('/editProduct-post/{id}', [AdminLTEController::class, 'edit_product']);
        Route:: get('/delete/{id}', [AdminLTEController::class, 'delete_product']);
    });

    Route::prefix('user')->group(function () 
    {

        Route:: get('/list2' , [AdminLTEController::class, 'user_list']);
        Route:: get('/insert2', [AdminLTEController::class, 'insert2']);
        Route:: post('/insertUser-post', [AdminLTEController::class, 'insertUser']);
        Route:: get('/edit2/{id}', [AdminLTEController::class, 'editUser']);
        Route:: post('/editUser-post/{id}', [AdminLTEController::class, 'edit_user']);
        Route:: get('/delete/{id}', [AdminLTEController::class, 'delete_user']);

    });

    Route::prefix('orders')->group(function () {

        Route:: get('/listOrder', [AdminLTEController::class, 'order_list']);
        Route:: get('/insertOrder', [AdminLTEController::class, 'insert_order']);
        Route:: post('/insertOrder', [AdminLTEController::class, 'insertAction_order']);
        Route:: get('/deletelist/{id}',[AdminLTEController::class, 'delete_listorder']);
        Route:: get('/order_item/{id}',[AdminLTEController::class, 'order_itemName']);
        Route:: post('/order_item/{id}',[AdminLTEController::class, 'insertOrder_ItemAction']);
        Route:: get('/editOrder/{id}',[AdminLTEController::class, 'edit_orderItem']);
        Route:: post('/editOrder-post/{id}',[AdminLTEController::class, 'editOrder_itemAction']);
        Route:: get('/delete/{id}', [AdminLTEController::class,'delete_oi']);
         
    });

  
    

});



//register route
Route::get('/register', [RegisterController::class,'register_view'])->middleware('guest');
Route::post('/register', [RegisterController::class,'store']);

//login route 
Route::get('/login', [LoginController::class,'login_view'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);

//dashboard route
Route::get('/dashboard', [DashboardController::class,'index'])->middleware('admin');


//logout route
Route::post('/logout', [LoginController::class, 'logout']);


//user dsahboard route
//Route::resource('/admin/adminLTE-dashboardUser', UserLTEController::class)->except('show')->middleware('admin');

//export PDF
Route::get('/exportpdf', [ExportController::class, 'exportpdf'])->name('exportpdf');

//export EXCEL
Route::get('/exportexcel', [ExportController::class, 'exportexcel'])->name('exportexcel');

//import EXCEL
Route::post('/importexcel', [ExportController::class, 'importexcel'])->name('importexcel');

//export CSV
Route::get('/exportcsv', [ExportController::class, 'exportcsv'])->name('exportcsv');