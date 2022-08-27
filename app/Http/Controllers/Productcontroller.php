<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class Productcontroller extends Controller
{
    public function index(){
       $products=Product::all();
       return view('product',compact('products'));
    }
    public function detail($id){
        $product= Product::find($id);
        return view('detail',compact('product'));
    }
    public function add_to_cart(Request $req){
        if($req->session()->has('user')){
            $cart=new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            return redirect('/');
        }
        else{
            return redirect('/login');
        }
        
    }
    public function cartitem(){
        $user_id=Session()->get('user')['id'];
        return Cart::where('user_id',$user_id)->count();




    }
    public function search(Request $req){
        $data= Product::
        where('name', 'like', '%'.$req->input('query').'%')
        ->get();
        return view('search',['products'=>$data]);
    }
    public function cartlist(){
        $user_id=Session()->get('user')['id'];
        $products=DB::table('cart')
        ->join('product','cart.product_id','=','product.id')
        ->where('cart.user_id',$user_id)
        ->select('product.*','cart.id as cart_id')
        ->get();

        return view('cartlist',compact('products'));
    }
    public function deletecart($id){
        DB::table('cart')->where('id',$id)->delete();
        return back();
    }
    public function ordernow(){
        $user_id=Session()->get('user')['id'];
        $total=DB::table('cart')
        ->join('product','cart.product_id','=','product.id')
        ->where('cart.user_id',$user_id)
        ->sum('product.price');

        return view('ordernow',compact('total'));
    }
    public function orderplace(Request $req){
        $user_id=Session()->get('user')['id'];
        $allorder=Cart::where('user_id',$user_id)->get();
        foreach($allorder as $orders){
            $order=new order();
            $order->product_id=$orders['product_id'];
            $order->user_id=$orders['user_id'];
            $order->status="pending";
            $order->payment_method=$req->payment;
            $order->payment_status="pending";
            $order->Address=$req->address;
            $order->save();
            Cart::where('user_id',$user_id)->delete();
        }
        $req->input();
        return redirect('/');
    }
    public function myorders(){
        $user_id=Session()->get('user')['id'];
        $orders=DB::table('order')
        ->join('product','order.product_id','=','product.id')
        ->where('order.user_id',$user_id)
        ->get();
        return view('myorders',compact('orders'));
    }
}
