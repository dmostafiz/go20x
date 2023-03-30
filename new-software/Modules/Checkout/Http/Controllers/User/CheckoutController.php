<?php

namespace Modules\Checkout\Http\Controllers\User;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\UserShippingAddress;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function stripePost(Request $request)
    {


        $cart_total = \Cart::getTotal();
        if ((int)$cart_total == 0)
        {
            return back()->with('error', 'Your Cart is Empty.');
        }

        $user_address = UserShippingAddress::where('id',$request->clientAddress)->first();
        if (is_null($user_address)) {

            return back()->with('error', 'Please select shipping address first.');

        }
        $cartItems = \Cart::getContent();
        $cart_qty_total = 0;
        foreach ($cartItems as $cart_item)
        {
            $cart_qty_total += (int)$cart_item->quantity;
        }

        $ShipTaxSet = ShippingTaxSettings();

        $shipping_charges = 0;
        $vat_tax = 0;

        $getVatTax = getTaxByState($user_address->country, $user_address->state, 1); 

        if ($user_address->country == 'US')
        {
            $shipping_charges = $ShipTaxSet->usa_shipping;
            $vat_tax = $cart_total * $getVatTax / 100;
            $cart_total += $shipping_charges + $vat_tax;
        }

        if ($user_address->country == 'CA')
        {
            $shipping_charges = $ShipTaxSet->ca_shipping;
            $vat_tax = $cart_total * $getVatTax / 100;
            $cart_total += $shipping_charges + $vat_tax;
        }

        if ($user_address->country == 'PH')
        {
            $shipping_charges = $ShipTaxSet->ph_shipping;
            $vat_tax = $cart_total * $getVatTax / 100;
            $cart_total += $shipping_charges + $vat_tax;
        }

        if ($user_address->country == 'AU')
        {
            $shipping_charges = $ShipTaxSet->au_shipping;
            $vat_tax = $cart_total * $getVatTax / 100;
            $cart_total += $shipping_charges + $vat_tax;
        }

        if ($user_address->country == 'GB')
        {
            $shipping_charges = $ShipTaxSet->uk_shipping;
            $vat_tax = $cart_total * $getVatTax / 100;
            $cart_total += $shipping_charges + $vat_tax;
        }

        if ($user_address->country == 'NZ')
        {
            $shipping_charges = $ShipTaxSet->nz_shipping;
            $vat_tax = $cart_total * $getVatTax / 100;
            $cart_total += $shipping_charges + $vat_tax;
        }

        $cents = bcmul($cart_total, 100);
        $amount = (int)$cents;
        
        $paymentMethod = $request->input('payment_method');
        $user          = $request->user();
        

        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
            $user->charge($amount, $paymentMethod, ['metadata' => [
                'cart' => $cartItems,
                'shippingaddress' => $user_address,
                'shipping_charges' => $shipping_charges,
                'vat_tax' => $vat_tax,
            ]]);

        \Cart::clear();
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
        return redirect('/user/orders')->with('success', 'Product purchased successfully!');
 
    }

    public function get_tax_by_state(Request $request)
    {

        $result = getTaxByState($request->country, $request->state);
        return $result;
    }

    
    public function index()
    {   

        $cartItems = \Cart::getContent();
        $shipping_address = UserShippingAddress::orderBy('id','desc')->take(2)->get();
        $intent = auth()->user()->createSetupIntent();
        return view('checkout::index' , compact('cartItems','shipping_address','intent'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('checkout::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('checkout::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('checkout::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
