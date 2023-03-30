<?php
  
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\UserShippingAddress; 
use Auth;
  
class ProductController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $products = Product::paginate(10);
        
        return view('backend.user.products', compact('products'));
    }
    public function order_placed(Request $request)
    {
        dd($request->all());
        // code...
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        return view('backend.user.shopping_cart');
    }
    
    public function checkout(){

        $addresses = UserShippingAddress::where('user_id',Auth::user()->id)->get();
        
        $user = Auth::user();
        $intent = $user->createSetupIntent();
        return view('backend.user.checkout', compact('addresses', 'intent'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect('user/shopping-cart')->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}