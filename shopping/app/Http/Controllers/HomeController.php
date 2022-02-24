<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Color;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Banner;
use Auth;
use App\Models\Wishlist;
use App\Models\Feedback;
use App\Models\Customer;
use App\Models\ProductImage;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index(Cart $cart){
        //echo "Hello World";
        $carts = $cart->getCarts();
        $datacat = new Category;
        $categories = $datacat -> getselectcat() ->where('parent_id',0);
        $cats = $datacat -> getselectcat() ->where('parent_id',0);
        $databanner = new Banner;
        $banners = $databanner -> getallbanners();
        $datapromotion = new Promotion;
        $promotions = $datapromotion->getallpromotion();
        $datablog = new Blog;
        $blogs = $datablog->limit(3)->orderby('created_at','desc')->get();
        $data = Product::search()->paginate(20);
        $totalqtt = $cart->getTotal();
        $totalprice = $cart->getTotal(true);
        
        return view('home.index', compact('data','categories','blogs','totalqtt','carts','totalprice','banners','promotions','cats'));
    }

    function about(){
        // echo "About";
        return view('home.about');
    }
    function blogdetail($id){
        $blogdetail = Blog::findOrFail($id);
        $blogdetail['view'] = $blogdetail['view'] + 1;
        Blog::where('id', $id)->update([ 'view' => $blogdetail['view'] ]);
        return view('home.blogdetail', compact('blogdetail'));
    }
    function blog(){
        $datablog = new Blog();
        $blogs = $datablog->getallblog();
        return view('home.blog', compact('blogs'));
    }

    function product(Cart $cart)
    {
        $carts = $cart->getCarts();
        $datacat = new Category;
        $categorys = $datacat -> getselectcat();
        $catId = request('cat_id');
        $data = Product::search()->paginate(10);
        $toprateds = DB::table('product')
        ->select('product.pro_name', 'product.price', 'product.image','product.saleprice')->distinct()->limit(4)->join('feedback as f','product.id', '=', 'f.product_id')->orderBy('f.rating','desc')->get();
        $totalqtt = $cart->getTotal();
        $totalprice = $cart->getTotal(true);
        return view('home.product', compact('data','categorys','totalqtt','carts','totalprice','catId','toprateds'));
    }
    function productdetail($id,Cart $cart){
        $auth1 =  Auth::guard('cus')->check();
        if($auth1){
            $auth =  Auth::guard('cus')->user();
            $wishlist = DB::table('wishlist')
                ->join('product', 'product.id', '=', 'wishlist.product_id')
                ->join('customer', 'wishlist.customer_id', '=', 'customer.id')
                ->select( 'wishlist.id')
                ->where('product.id',$id)
                ->where('wishlist.customer_id',$auth->id)
                ->get();
        if(isset($wishlist['0'])){
        $wishlist0 = $wishlist['0']->id;

        }else{
            $wishlist0 = null;
        }
        }else{
            $wishlist0 = null;
        }
        $carts = $cart->getCarts();
        $datacat = new Category;
        $categorys = $datacat -> getselectcat();
        $prodetail = new ProductDetail;
        $prodetails = $prodetail -> getDetail();
        $product = Product::findOrFail($id);
        $product['view'] = $product['view'] + 1;
        Product::where('id', $id)->update([ 'view' => $product['view'] ]);
        $data = Product::search()->where('cat_id',$product['cat_id'])->paginate(10);
        $dataproimg = Productimage::all()-> where('pro_id','=',$id);
        $productimgs = $dataproimg ;
        $totalqtt = $cart->getTotal();
        $totalprice = $cart->getTotal(true);
        $feedbacks = Feedback::where('product_id',$id)->paginate(4);
        $countfeedback = $feedbacks->count();
        $cus = Customer::all();
        $data1 = ProductDetail::SearchDetail()->distinct()->get('size_id');
        $datasize = new Size();
        $sizes = $datasize -> getselectsize();
        $data2 = ProductDetail::SearchDetail()->distinct()->get('color_id');
        $datacolor = new Color();
        $colors = $datacolor -> getselectcolor();
        
        
        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        return view('home.productdetail', compact('data','prodetails','product','categorys','productimgs','totalqtt','carts','totalprice','data1','sizes','data2','colors','feedbacks','cus','countfeedback','wishlist0'));
    }
    
    function ajaxSearchProduct(){
        
        $data = Product::detail()->get();
        // $data["view"] = $data["view"] + 1;
        // Product::where('id', $id)->update([ 'view' => $data['view'] ]);
        $dataproimg = Productimage::DetailImage()->get();
        $data1 = ProductDetail::SearchDetail()->distinct()->get('size_id');
        $datasize = new Size();
        $sizes = $datasize -> getselectsize();
        $data2 = ProductDetail::SearchDetail()->distinct()->get('color_id');
        $datacolor = new Color();
        $colors = $datacolor -> getselectcolor();
        return view('home.quikview',compact('data','dataproimg','data1','sizes','data2','colors'));
    }
    function contact(){
        return view('home.contact');
    }
    function add_wishlist($id){

        $auth =  Auth::guard('cus')->user();
        $wishlist = Wishlist::where('product_id', $id)->where('customer_id',$auth->id)->get();

        $data['product_id'] = $id;
        $data['customer_id'] = $auth->id;

        if(isset($wishlist['0'])){
            Wishlist::where('product_id',$id)->where('customer_id',$auth->id)->delete();
        }else{
            Wishlist::create($data);
        }
        return redirect()->back(); 
    }
    function wishlist(){
        $auth =  Auth::guard('cus')->user();
        $wishlists = Wishlist::where('customer_id',$auth->id)->get();

        return view('home.wishlist', compact('wishlists'));
    }
    function delete_wishlist($id){
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();
        return back();
    }
}