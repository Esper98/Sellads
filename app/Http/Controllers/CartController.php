<?php
/*
 * Project: Sellads
 * File: app/Http/Controllers/CartController.php
 * Author: Adam el Hassan & Esper van den Heuvel
 */
namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use App\Product;
use App\Order;



class CartController extends Controller
{
    public function index()
    {
        $products = array();
        $totalPrice = 0;
        if(isset($_SESSION['cart'])){
            $products = $_SESSION['cart'];
            foreach($_SESSION['cart'] as $price){
                $totalPrice = $totalPrice + $price['totalPrice'];
            }
        }
        return view('pages.cart')->with('products',$products)->with('totalPrice',$totalPrice);        
    }


    public function store(Request $request, $name)
    {
        if($request['amount'] < 1){
            return redirect()->back();
        }
        $edit = false;
        $products = array();
        if (empty($_SESSION['cart']))   {
            $_SESSION['cart'] = array();
        }

        foreach($_SESSION['cart'] as $product){
            if ($product['name'] == $name){
                $product['amount'] = $product['amount'] + $request['amount'];
                $product['totalPrice'] = $product['amount'] * $product['price'];
                $edit = true;
            }
        }
        if ($edit == false){
            $temp = Product::where('name', $name)->first();
            $temp['amount'] = $request['amount'];
            $temp['totalPrice'] = $temp['amount'] * $temp['price'];
            array_push($_SESSION['cart'], $temp);
        }
        $totalPrice = 0;
        foreach($_SESSION['cart'] as $price){
            $totalPrice = $totalPrice + $price['totalPrice'];
        }

        $products = $_SESSION['cart'];

        return view('pages.cart')->with('totalPrice',$totalPrice)->with('products',$products);
    }

    public function update(Request $request, $name)
    {
        if($request['amount'] < 1){
            return redirect()->back();
        }
        foreach($_SESSION['cart'] as $productKey => $product){
            if ($product['name'] == $name){
                $product['amount'] = $request['amount'];
                $product['totalPrice'] = $product['amount'] * $product['price'];
                if($product['amount'] == 0){
                    unset($_SESSION['cart'], $productKey);
                    if(!isset($_SESSION['cart'])){
                        $_SESSION['cart'] = array();
                    }
                }
            }
        }

        $totalPrice = 0;
        foreach($_SESSION['cart'] as $price){
            $totalPrice = $totalPrice + $price['totalPrice'];
        }
        $products = $_SESSION['cart'];

        return view('pages.cart')->with('totalPrice',$totalPrice)->with('products',$products);
    }


    public function destroy($name)
    {
        foreach($_SESSION['cart'] as $productKey => $product){
            if ($product['name'] == $name){
                unset($_SESSION['cart'][$productKey]);
            }
        }        
        return redirect('/winkelwagen')->with('success', 'Product is met succes Verwijderd.');
    }


    public function order()
    {
        if(empty($_SESSION['cart'])){
            return view('pages.cart')->with('totalPrice',0)->with('products',array());;
        }
        if  (\Auth::user() != null) {
            foreach($_SESSION['cart'] as $productKey => $product)
            {
                $order = new Order();
                $order->product_id = $product['id'];
                $order->amount = $product['amount'];
                $order->user_id = \Auth::user()->id;      
                $order->id = Order::All()->max('id') + 1;
            }
            $order->save();
            $_SESSION['cart'] = null;
            return redirect('/winkelwagen')->with('totalPrice',0)->with('products',array())->with('success', 'Je bestelling is geplaatst, je zult het zo snel mogelijk ontvangen.');
        }
        else{
            return redirect('login');
        }
    }
}
