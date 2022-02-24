<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ClassifyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\AccountController;

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

Route::get('/', [HomeController::class, 'index']) -> name('home');
Route::get('/blog',[HomeController::class,'blog'])-> name('blog');
Route::get('/blogdetail/{id}',[HomeController::class,'blogdetail']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/contact',[HomeController::class,'contact']);
Route::get('/product',[HomeController::class,'product'])->name('home.pro');
Route::get('/productdetail/{id}',[HomeController::class,'productdetail']);
Route::get('/list/{id}',[HomeController::class,'listByCategory']);

Route::get('/add-wishlist/{id}',[HomeController::class,'add_wishlist'])->middleware('customer');
Route::get('/wishlist',[HomeController::class,'wishlist'])->name('home.wishlist')->middleware('customer');
Route::get('/wishlist/delete/{id}',[HomeController::class,'delete_wishlist'])->middleware('customer');

Route::get('/product/add-wishlist/{id}',[HomeController::class,'add_wishlist'])->middleware('customer');
Route::get('/productdetail/add-wishlist/{id}',[HomeController::class,'add_wishlist'])->middleware('customer');


Route::group(['prefix' => 'cart'],function(){
    Route::post('add/{product}', [CartController::class,'add'])-> name('cart.add');
    Route::get('update/{id}', [CartController::class,'update'])-> name('cart.update');
    Route::get('remove/{id}', [CartController::class,'remove'])-> name('cart.remove');
    Route::get('removeAll', [CartController::class,'removeAll'])-> name('cart.removeAll');
    Route::get('view', [CartController::class,'view'])-> name('cart.view');
});
Route::group(['prefix' => 'customer'],function(){

    Route::get('login', [CustomerController::class,'index'])-> name('customer.login');
    Route::post('login', [CustomerController::class,'login']);
    Route::post('register', [CustomerController::class,'register']);
    Route::get('logout', [CustomerController::class,'logout'])-> name('customer.logout');

    Route::get('change-pass', [CustomerController::class,'change_pass'])-> name('customer.change_pass')->middleware('customer');
    Route::post('change-pass', [CustomerController::class,'postchange_pass'])->middleware('customer');

    Route::get('forget-pass', [CustomerController::class,'forget_pass'])-> name('customer.forget_pass');
    Route::post('forget-pass', [CustomerController::class,'postforget_pass']);

    Route::get('get-pass/{email}/{token}', [CustomerController::class,'get_pass'])-> name('customer.get_pass');
    Route::post('get-pass/{email}/{token}', [CustomerController::class,'postget_pass']);

    Route::get('activated/{email}/{token}', [CustomerController::class,'activated'])-> name('customer.activated');
    Route::post('activated/{email}/{token}', [CustomerController::class,'postactivated']);

    Route::post('rating/{customer}/{product}',[CustomerController::class,'rating']);
    Route::get('profile', [CustomerController::class, 'profile'])->name('customer.profile');
    Route::post('updateprofile/{id}', [CustomerController::class, 'updateprofile']);

});
Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    Route::get('', [BackendController::class, 'index']) -> name('admin');
    Route::get('user', [UserController::class, 'user'])->name('admin.user');
    Route::post('update/{id}', [UserController::class, 'update']);
    Route::get('signup', [LoginController::class, 'signup'])->name('admin.signup');
    Route::post('signup', [LoginController::class, 'register']);
    Route::get('profile', [UserController::class, 'profile'])->name('admin.profile');
    Route::post('save', [UserController::class, 'save']);
    Route::post('change', [UserController::class, 'change']);

    Route::group(['prefix' => 'category'], function () {
        Route::get('', [CategoryController::class, 'index']);
        Route::post('addnew', [CategoryController::class, 'addnew']);
        Route::get('edit/{id}', [CategoryController::class, 'edit']);
        Route::post('update/{id}', [CategoryController::class, 'update']);
        Route::get('delete/{id}', [CategoryController::class, 'delete']);
        Route::get('get-subcategory/{id}', [CategoryController::class, 'categorysub'])->name('category.sub');
        Route::get('get-classify/{id}', [SubCategoryController::class, 'classify'])->name('subcategory.cla');
        Route::group(['prefix' => 'subcategory'], function () {
            Route::get('/{id}', [SubCategoryController::class, 'index']);
            Route::post('addnew/{id}', [SubCategoryController::class, 'addnew']);
            Route::get('edit/{id}/{subid}', [SubCategoryController::class, 'edit']);
            Route::post('update/{id}/{subid}', [SubCategoryController::class, 'update']);
            Route::get('delete/{id}', [SubCategoryController::class, 'delete']);
        
            Route::group(['prefix' => 'classify'], function () {
                Route::get('/{id}', [ClassifyController::class, 'index']);
                Route::post('addnew/{id}', [ClassifyController::class, 'addnew']);
                Route::get('edit/{id}/{claid}', [ClassifyController::class, 'edit']);
                Route::post('update/{id}/{claid}', [ClassifyController::class, 'update']);
                Route::get('delete/{id}', [ClassifyController::class, 'delete']);
            });
        });
    });
    Route::group(['prefix' => 'banner'], function () {
        Route::get('', [BannerController::class, 'index']);
        Route::post('addnew', [BannerController::class, 'addnew']);
        Route::get('edit/{id}', [BannerController::class, 'edit']);
        Route::post('update/{id}', [BannerController::class, 'update']);
        Route::get('delete/{id}', [BannerController::class, 'delete']);

    });
   
    Route::group(['prefix' => 'blog'], function () {
        Route::get('', [BlogController::class, 'index']);
        Route::post('addnew', [BlogController::class, 'addnew']);
        Route::get('edit/{id}', [BlogController::class, 'edit']);
        Route::post('update/{id}', [BlogController::class, 'update']);
        Route::get('delete/{id}', [BlogController::class, 'delete']);

    });

    Route::group(['prefix' => 'promotion'], function () {
        Route::get('', [PromotionController::class, 'index']);
        Route::post('addnew', [PromotionController::class, 'addnew']);
        Route::get('edit/{id}', [PromotionController::class, 'edit']);
        Route::post('update/{id}', [PromotionController::class, 'update']);
        Route::get('delete/{id}', [PromotionController::class, 'delete']);

    });

    Route::group(['prefix' => 'size'], function () {
        Route::get('', [SizeController::class, 'index']);
        Route::post('addnew', [SizeController::class, 'addnew']);
        Route::get('edit/{id}', [SizeController::class, 'edit']);
        Route::post('update/{id}', [SizeController::class, 'update']);
        Route::get('delete/{id}', [SizeController::class, 'delete']);
    });

    Route::group(['prefix' => 'color'], function () {
        Route::get('', [ColorController::class, 'index']);
        Route::post('addnew', [ColorController::class, 'addnew']);
        Route::get('edit/{id}', [ColorController::class, 'edit']);
        Route::post('update/{id}', [ColorController::class, 'update']);
        Route::get('delete/{id}', [ColorController::class, 'delete']);
    });

    Route::group(['prefix' => 'coupon'], function () {
        Route::get('', [CouponController::class, 'index']);
        Route::post('addnew', [CouponController::class, 'addnew']);
        Route::get('edit/{id}', [CouponController::class, 'edit']);
        Route::post('update/{id}', [CouponController::class, 'update']);
        Route::get('delete/{id}', [CouponController::class, 'delete']);
    });

    Route::group(['prefix' => 'payment'], function () {
        Route::get('', [PaymentController::class, 'index']);
        Route::post('addnew', [PaymentController::class, 'addnew']);
        Route::get('edit/{id}', [PaymentController::class, 'edit']);
        Route::post('update/{id}', [PaymentController::class, 'update']);
        Route::get('delete/{id}', [PaymentController::class, 'delete']);
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('', [ProductController::class, 'index']);
        Route::get('create', [ProductController::class, 'create']);
        Route::post('addnew', [ProductController::class, 'addnew']);
        Route::get('edit/{id}', [ProductController::class, 'edit']);
        Route::post('update/{id}', [ProductController::class, 'update']);
        Route::get('delete/{id}', [ProductController::class, 'delete']);
        Route::get('viewimage/{id}', [ProductImageController::class, 'viewimg']);
        Route::post('viewimage/addimage/{id}', [ProductImageController::class, 'addimg']);
        Route::get('viewimage/delete/{id}/{idimg}', [ProductImageController::class, 'deleteimg']);
        
        Route::get('viewdetail/{id}', [ProductDetailController::class, 'viewdetail']);
        Route::get('viewdetail/sizetype/{id}/{sizetype}',[ProductDetailController::class, 'sizetype']);
        Route::post('viewdetail/submitdetail/{id}', [ProductDetailController::class, 'submitdetail']);
        Route::post('viewdetail/edit/{id}', [ProductDetailController::class, 'edit']);
        Route::get('viewdetail/delete/{id}', [ProductDetailController::class, 'delete']);
    });
    Route::group(['prefix' => 'order'], function () {
        Route::get('', [OrderController::class,'index'])-> name('admin.order');
        Route::get('detail/{order}', [OrderController::class,'detail'])-> name('admin.order.detail');
        Route::put('status/{order}', [OrderController::class,'status'])-> name('admin.order.status');
    });
    Route::group(['prefix' => 'account'], function () {
        Route::get('', [AccountController::class,'account'])-> name('admin.account');
        Route::get('detail/{id}', [AccountController::class,'detail']);
        Route::post('update/{id}', [AccountController::class,'update']);
    });
});
Route::group(['prefix' => 'order','middleware'=>'customer'],function(){
    Route::get('checkout', [CartController::class,'checkout'])-> name('order.checkout');
    Route::post('addcoupon', [CartController::class,'addcoupon'])-> name('order.addcoupon');
    Route::get('success', [CartController::class,'success'])-> name('order.success');
    Route::post('placeorder', [CartController::class,'placeorder'])-> name('order.placeorder');
    Route::get('history', [CartController::class,'history'])-> name('order.history');
    Route::get('detail/{order}', [CartController::class,'detail'])-> name('order.detail');
    Route::get('detailpdf/{order}', [CartController::class,'detailpdf']);
});

Route::get('/ajax-search-quickview',[HomeController::class,'ajaxSearchProduct'])->name('ajax-search-quickview');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
?>