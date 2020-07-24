<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderList;
use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function index(){
        $products=Product::latest('id')->take(6)->get();
        //dd($products);
        return view('shop.index',compact('products'));
    }

    public function show(Product $product){
      
        $data=Product::firstWhere('id',$product->id);

        return view('shop.product',compact('data'));
    }

    public function cart(){
        $sum=0;
        $product=Wishlist::where('user_id',Auth::user()->id)->get();
        foreach ($product as $p){ 
            $sum+=($p->products->prod_price)*($p->count);
            }
     
            
        return view('shop.cart',compact('product','sum'));
    }

    public function cartAdd(Product $product){
        $true=Wishlist::where('user_id',Auth::user()->id)->where('product_id',$product->id)->exists();
     
     
        if ($true) {
            return redirect(route('product',$product))->with('error','Already in the Cart');  
         }
         else{

            $data['product_id']=$product->id;   
            $data['user_id']=Auth::user()->id;    
            $data=Wishlist::create($data);
            return redirect(route('product',$product))->with('success','Added to Cart');  
         }
   
    }

    public function createOrder($sum){
        $product=Wishlist::with('products')->where('user_id',Auth::user()->id)->get();
        $order = new Order;
        $order->total=$sum+4;
        $order->user_id=Auth::user()->id;
        $order->save();

        foreach ($product as $p){ 
            $orderlist = new OrderList();
            $orderlist->order_id=$order->id;
            $orderlist->product_id=$p->products->id;
            $orderlist->count=$p->count;
            $orderlist->save();
        }
        Wishlist::where('user_id', Auth::user()->id)->delete();
        
      
        return redirect(route('order'))->with('success','Successful Order');
    }

    public function order(){
        $orders=Order::where('user_id',Auth::user()->id)->get();
        return view('shop.order',compact('orders'));
    }

    public function orderlist(Order $order){
        $orders=Orderlist::where('order_id',$order->id)->get();
        // dd($orders->first()->orderlists);
        return view('shop.orderlist',compact('orders'));
    }
    public function cartDestroy(Wishlist $wishlist){
        Wishlist::find($wishlist->id)->delete();
       
        return redirect(route('cartShow'))->with('success','Successfully Deleted');
    }
  

}
