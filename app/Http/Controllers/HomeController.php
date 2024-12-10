<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\User;

use App\Models\Cart;

use App\Models\Order;

use Stripe;

use Session;

use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('usertype','user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $deliverd = Order::where('status','Entregado')->get()->count();
        return view('admin.index',compact('user','product','order','deliverd'));
    }


    public function home()
    {
        $product = Product::orderBy('created_at', 'desc')->take(4)->get();

        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else
        {
            $count= '';
        }

        return view('home.index',compact('product','count'));
    }

    public function login_home()
    {
        $product = Product::all();

        if(Auth::id())
        {

        $user = Auth::user();

        $userid = $user->id;
    
        $count = Cart::where('user_id',$userid)->count();

        }

        else
        {
            $count= '';
        }

        return view('home.index',compact('product','count'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);

        if(Auth::id())
        {

        $user = Auth::user();

        $userid = $user->id;
    
        $count = Cart::where('user_id',$userid)->count();

        }

        else
        {
            $count= '';
        }


        return view('home.product_details', compact('data','count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;

        $user = Auth::user();

        $user_id = $user->id;

        $data = new Cart;

        $data->user_id = $user_id;

        $data->product_id = $product_id;

        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Producto agregado al carrito exitosamente');

        return redirect()->back();

    }

    public function mycart()
    {
        if(Auth::id())
        {

            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();

            $cart = Cart::where('user_id',$userid)->get();

        }

        return view('home.mycart',compact('count','cart'));


    }

    public function comfirm_order(Request $request)
    {
        $name = $request->name;

        $address = $request->address;

        $phone = $request->phone;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id',$userid)->get();

        foreach($cart as $carts)
        {
            $order = new Order;

            $order->name = $name;

            $order->rec_address = $address;

            $order->phone = $phone;

            $order->user_id = $userid;

            $order->product_id = $carts->product_id;

            $order->save();

            

        }

        $cart_remove = Cart::where('user_id',$userid)->get();

        foreach($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);

            $data->delete();
        }
        toastr()->timeOut(10000)->closeButton()->addSuccess('Pedido hecho');
        return redirect()->back();    

    }

    public function myorders()
    {
        $user = Auth::user()->id;

        $count = Cart::where('user_id',$user)->get()->count();

        $order = Order::where('user_id',$user)->get();

        return view('home.order',compact('count','order'));
    }

    public function stripe($value)

    {

        return view('home.stripe', compact('value'));

    }

    public function stripePost(Request $request, $value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $value * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);

        $name = Auth::user()->name;
        $phone = Auth::user()->phone;
        $address = Auth::user()->address;
        $userid = Auth::user()->id;

        $cart = Cart::where('user_id',$userid)->get();

        foreach($cart as $carts)
        {
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->payment_status = 'Pago exitoso';
            $order->save();
        }

        $cart_remove = Cart::where('user_id',$userid)->get();

        foreach($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);
            $data->delete();
        }
        toastr()->timeOut(10000)->closeButton()->addSuccess('Pedido hecho');
        return redirect('mycart');    
    }

    public function shop()
    {
        $product = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else
        {
            $count= '';
        }

        return view('home.shop',compact('product','count'));
    }

    public function why()
    {


        if(Auth::id())
        {

        $user = Auth::user();

        $userid = $user->id;
    
        $count = Cart::where('user_id',$userid)->count();

        }

        else
        {
            $count= '';
        }

        

        return view('home.why',compact('count'));
    }

    public function product_search(Request $request)
    {
        $search = $request->search;
        $product = Product::where('title', 'LIKE', "%$search%")
                          ->orWhere('category', 'LIKE', "%$search%")
                          ->get();

        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else
        {
            $count= '';
        }

        return view('home.shop',compact('product','count'));
    }

}

