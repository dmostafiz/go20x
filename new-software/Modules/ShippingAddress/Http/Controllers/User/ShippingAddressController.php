<?php

namespace Modules\ShippingAddress\Http\Controllers\User;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\UserShippingAddress;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class ShippingAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {   
        $user = auth()->user();
        $shipping_address = UserShippingAddress::where('user_id',$user->id)->orderBy('id','desc')->get(); 
        return view('shippingaddress::index', compact('shipping_address'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {   
        $countries = \DB::table('countries')->whereIn('id', array(
            14,
            39,
            233,
            232,
            174,
            158
        ))->get();
        return view('shippingaddress::create', compact('countries'));
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('shippingaddress::show');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
    */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => ['required'],
            'lname' => ['required'],
            'street' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'zipcode' => ['required'],
            'phone' => ['required'], 
        ]);

        $user_id = Auth::user()->id;

        $shippo_api = '';
        $address_validation = '';
        $is_default = 1;

        if ($request->country == 'US')
        {
            $shippo_api = $this->shippo_api_curl($request);
            
            

            if ($shippo_api != '')
            {
                $data['is_validate'] = 0;
            }

            $data = ['country' => $request->country, 'user_id' => $user_id, 'first_name' => $request->fname, 'last_name' => $request->lname, 'address' => $request->street, 'address_line_1' => $request->street2, 'city' => $request->city, 'state' => $request->state, 'zipcode' => $request->zipcode, 'phone_number' => $request->phone, 'is_default' => $is_default, 'is_validate' => 1];

            $address = UserShippingAddress::insert($data);
            if ($address) {
               return redirect()->route('shipping.index')->with('success','Shipping address added');
            }

            //dd($request, $data );
            
        }

        $ShipmentLabelLink = null;
        $TrackingNumber = null;

        if ($request->country != 'US')
        {

            $cart_total = \Cart::getTotal();
            $cartItems = \Cart::getContent();

            //$address_validation = $this->landmark_api_curl_sandbox($request, $cartItems, $cart_total);

            // if ($address_validation['error'] != '')
            // {   
               
            //     $data['is_validate'] = 0;
            // }

            $data = ['country' => $request->country, 'user_id' => $user_id, 'first_name' => $request->fname, 'last_name' => $request->lname, 'address' => $request->street, 'address_line_1' => $request->street2, 'city' => $request->city, 'state' => $request->state, 'zipcode' => $request->zipcode, 'phone_number' => $request->phone, 'is_default' => $is_default, 'is_validate' => 1];

            $address = UserShippingAddress::insert($data);
            if ($address) {
              return redirect()->route('shipping.index')->with('success','Shipping address Added');
            }
        }

    }
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fname' => ['required'],
            'lname' => ['required'],
            'street' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'zipcode' => ['required'],
            'phone' => ['required'], 
        ]);

        $user_id = Auth::user()->id;

        $shippo_api = '';
        $address_validation = '';
        $is_default = 1;

        if ($request->country == 'US')
        {
            $shippo_api = $this->shippo_api_curl($request);
            
            if ($shippo_api != '')
            {
                $data['is_validate'] = 0;
            }

            $data = ['country' => $request->country, 'user_id' => $user_id, 'first_name' => $request->fname, 'last_name' => $request->lname, 'address' => $request->street, 'address_line_1' => $request->street2, 'city' => $request->city, 'state' => $request->state, 'zipcode' => $request->zipcode, 'phone_number' => $request->phone, 'is_default' => $is_default, 'is_validate' => 1];

            $address = UserShippingAddress::where('id', $id)->update($data);
            if ($address) {
               return redirect()->route('shipping.index')->with('success','Shipping address updated.');
            }

            //dd($request, $data );
            
        }

        $ShipmentLabelLink = null;
        $TrackingNumber = null;

        if ($request->country != 'US')
        {

            $cart_total = \Cart::getTotal();
            $cartItems = \Cart::getContent();

            //$address_validation = $this->landmark_api_curl_sandbox($request, $cartItems, $cart_total);

            // if ($address_validation['error'] != '')
            // {   
               
            //     $data['is_validate'] = 0;
            // }

            $data = ['country' => $request->country, 'user_id' => $user_id, 'first_name' => $request->fname, 'last_name' => $request->lname, 'address' => $request->street, 'address_line_1' => $request->street2, 'city' => $request->city, 'state' => $request->state, 'zipcode' => $request->zipcode, 'phone_number' => $request->phone, 'is_default' => $is_default, 'is_validate' => 1];

            $address = UserShippingAddress::where('id', $id)->update($data);
            if ($address) {
              return redirect()->route('shipping.index')->with('success','Shipping address updated.');
            }
        }
    }
     /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {   
        $countries = \DB::table('countries')->whereIn('id', array(
            14,
            39,
            233,
            232,
            174,
            158
        ))->get();
        $address = UserShippingAddress::where('id',$id)->first();
        return view('shippingaddress::edit',compact('address','countries'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {   
        $delete = UserShippingAddress::where('id',$id)->delete();
        return redirect()->route('shipping.index')->with('success','Shipping address deleted.');
    }
     

    /*
     * Shippo Address Validation
    */
    public function shippo_api_curl($request)
    {

        if($request->has('street')){

            array_merge($request->all(), ['street1' => $request->street]);
        }

        $apiToken = env('SHIPPO_API_LIVE_KEY');
        $checkAddress = array(
            'name' => $request->fname . ' ' . $request->lname,
            'street1' => $request->street,
            'street2' => $request->street2,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zipcode,
            'country' => $request->country,
            'validate' => true

        );

        //dd($checkAddress );
        $encode_addres = json_encode($checkAddress);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.goshippo.com/addresses/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $encode_addres,
            CURLOPT_HTTPHEADER => array(
                'Authorization: ShippoToken ' . $apiToken,
                'Content-Type: application/json'
            ) ,
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $decode = json_decode($response, true);

        $error = '';
        if (isset($decode['validation_results']))
        {
            if ($decode['validation_results']['is_valid'] == false || count($decode['validation_results']['messages']) > 0)
            {
                foreach ($decode['validation_results']['messages'] as $value)
                {
                    $error .= $value['text'];
                }

            }
        }
        else
        {
            $error = $response;
        }

        return $error;
    }

   /*
     * Landmark Address Validation sandbox api
    */
    public function landmark_api_curl_sandbox($request, $cartItems, $cart_total)
    {   

        
     
        if ($request->country == 'US')
        {
            return true;
        }
 
        $landmark_api_mode = env('LANDMARK_SANDBOX_API_TEST_MODE');
        $landmark_api_uname = env('LANDMARK_SANDBOX_API_UNAME');
        $landmark_api_passw = env('LANDMARK_SANDBOX_API_PASSW');
        $landmark_ClientID = env('LANDMARK_SANDBOX_CLIENTID');
        $landmark_AccountNumber = env('LANDMARK_SANDBOX_ACCOUNTNUMBER');
        // $last_order_id = Order::orderBy('id', 'desc')->first();
        // if (is_null($last_order_id))
        // {
        //     $orderReference = 1;
        // }
        // else
        // {
        //     $orderReference = $last_order_id->id + 1;
        // }
        $orderReference = hexdec(uniqid());

        $ShippingLane = '';
        if ($request->country == 'CA' || $request->country == 'US')
        {
            $ShippingLane = 'US FL';
        }
        else
        {
            $ShippingLane = 'Utah Socal';
        }

        $items = '';
        foreach ($cartItems as $cart_item)
        {

            $product = Product::where('id', 1)
                ->first();

            $items .= '
                    <Item>
                    <Sku>' . $product->sku . '</Sku>
                    <!-- <DangerousGoodsInformation> -->
                        <!-- All fields in this element are required if item contains dangerous goods -->
                    <!--    <ContainsDangerousGoods>1</ContainsDangerousGoods>
                        <UNCode>UN3481</UNCode>
                        <ItemWeightUnit>kg</ItemWeightUnit>
                        <PackagingInstructions>PS967S1</PackagingInstructions>
                        <ItemWeight>10</ItemWeight>
                    </DangerousGoodsInformation> -->
                    <Quantity>' . $cart_item->quantity . '</Quantity>
                    <UnitPrice>' . ($cart_item->price * $cart_item->quantity) . '</UnitPrice>
                    <Description>' . $product->landmark_description . '</Description>
                    <HSCode></HSCode>
                    <!-- Optional -->
                    <CountryOfOrigin>CN</CountryOfOrigin>
                    <!-- 2 character ISO code -->
                    <URL></URL>
                    <!-- Optional, web address of the item from your storefront -->
                    </Item>';
        }

        $post_data = '<?xml version="1.0" encoding="UTF-8"?>
<ImportRequest>
    <Login>
        <Username>' . $landmark_api_uname . '</Username>
        <Password>' . $landmark_api_passw . '</Password>
    </Login>
    <Test>' . $landmark_api_mode . '</Test>
    <!-- Optional. Defaults to true before account activation, false afterwards -->
    <ClientID>' . $landmark_ClientID . '</ClientID>
    <AccountNumber>' . $landmark_AccountNumber . '</AccountNumber>
    <!--Optional. Only used by clients with multiple account numbers. See integration manager for relevant account numbers -->
    <Reference>' . $orderReference . '</Reference> <!-- that will be our system order ID number -->
    <!-- Customer Reference, or Order Number. Primary shipment identifier -->
    <ShipTo>

        <Name>' . $request->fname . ' ' . $request->lname . '</Name>
        <!-- Max 50 characters -->
        <Attention>' . $request->fname . ' ' . $request->lname . '</Attention>
        <!-- Optional. Max 50 characters -->
        <Address1>' . $request->street1 . '</Address1>
        <!-- Max 60 characters -->
        <Address2>' . $request->street2 . '</Address2>
        <!-- Optional. Max 60 characters -->
        <Address3></Address3>
        <!-- Optional. Max 60 characters -->
        <City>' . $request->city . '</City>
        <!-- Max 40 characters -->
        <State>' . $request->state . '</State>
        <!-- ISO-3166-2 code -->
        <PostalCode>' . $request->zipcode . '</PostalCode>
        <!-- Max 10 characters -->
        <Country>' . $request->country . '</Country>
        <!-- Use ISO-3166-2 standard -->
        <Phone>' . $request->phone . '</Phone>
        <!-- Optional, but encouraged. Max 20 characters -->
        <Email>' . $request->email . '</Email>
        <!-- Optional. Max 80 characters -->
        <ConsigneeTaxID></ConsigneeTaxID>
        <!-- Optional, for countries that require an individual is tax id to import as DDP. -->

    </ShipTo> 
    <ShippingLane>
        <!-- The Region field links the shipment to a Landmark facility combination and is determined on a case-by-case basis. Please contact your Integration Manager for details per shipping facility.-->
        <Region>US FL</Region> <!-- that will be static value -->
        <!-- Origin Facility fields are OPTIONAL, for fine-grained control over the routing of a shipment.-->

        <!-- Update the origin client facility for a shipment. Useful primarily for clients with many origin facilities. For a list of OriginFacilityCodes, contact your Integration Manager -->
    </ShippingLane>

    <!-- 
                LGINTSTD - DDP // duty paid
                LGINTSTDU    - DDU // duty unpaid
                Duty Taxes
                Dan need to verify this with sale department  
                 -->
    <ShipMethod>LGINTSTD</ShipMethod>
    <OrderTotal>' . $cart_total . '</OrderTotal> <!-- it is conditional not required -->
    <!-- Conditional. Amount paid by the customer for all the items in their order. Must be passed in instances where the shipment information represents a partial shipment of products comprising a larger order-->
    <OrderInsuranceFreightTotal>20.65</OrderInsuranceFreightTotal> <!-- it is conditional not required -->
    <!-- Conditional. Amount paid by the customer for shipping their entire order. Must be passed in instances where the shipment information represents a partial shipment of products comprising a larger order-->
    <ShipmentInsuranceFreight>20.65</ShipmentInsuranceFreight>
    <!-- this upto us, we are going to add insurance or it will be zero -->
    <!-- Amount charged for shipping and any insurance for the shipment. This value does not include the amount charged for purchased items (i.e. Item Unit Value).-->
    <ItemsCurrency>USD</ItemsCurrency>
    <!-- Optional, and only used when client uses multiple currencies. If used, pass the 3 character ISO 4217 code to represent the currency (i.e. USD, CAD) -->
    <IsCommercialShipment>0</IsCommercialShipment> <!-- it is conditional not required -->
    <!-- Optional boolean, and only used in cases when client requires shipments to be commercially cleared (i.e. B2B clearance) -->
    <!-- Optional, Whether or not to return a generic label even though the shipment will not be processed. -->
    <ProduceLabel>true</ProduceLabel>
    <!-- Optional, only used if ProduceLabel = true. Default is PDF. Also supports JPG, GIF, BMP, ZPL and PNG -->
    <LabelFormat>PDF</LabelFormat>
    <!-- Optional, only used if ProduceLabel = true. Default is "LINKS" (if LabelFormat = ZPL, default is "ZPL").

                            LINKS - returns links to all labels which must be retrieved in <LabelLink> tag.

                            ZPL - label image returned as ZPL in <LabelImage> tag. This type automatically chosen if LabelFormat = ZPL.

                            BASE64 - Base64 encoded label image is returned directly in the XML response in <LabelImage> tag.

                            BASE64COMPRESSED - GZcompressed and Base64 encoded label image is returned directly in the XML response in <LabelImage> tag.

                         -->
    <LabelEncoding>LINKS</LabelEncoding>

    <!-- it is conditional not required if we have sig from custom -->
    <AdditionalFields>
        <!-- Optional. Used to store any other additional information the client wants to pass. Up to 5 additional fields may be passed. -->
        <Field1>Any type of data</Field1>
        <!-- Optional -->
        <Field2>Purchased with Credit Card</Field2>
        <!-- Optional -->
        <Field3>99000029327172321</Field3>
        <!-- Optional -->
        <Field4>123198012</Field4>
        <!-- Optional -->
        <Field5>Stored information</Field5>
        <!-- Optional -->
    </AdditionalFields>
    <Items>
        <!-- Required for customs if the shipment will be crossing the border -->
        ' . $items . '
    </Items>
</ImportRequest>';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.landmarkglobal.com/v2/Import.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $post_data,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/xml'
            ) ,
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $arr = json_decode($json, true);

        \Log::info(['Landmark response stripeController 2456' => $arr]);

        $resp = array();
        foreach ($arr as $k => $v)
        {
            foreach ($v as $k1 => $v1)
            {
                $resp[$k][$k1] = $v1;
            }
        }

        $error = '';
        $ShipmentLabelLink = '';
        $TrackingNumber = '';
        if (isset($resp['Errors']))
        {

            if (isset($resp['Errors']['Error']['ErrorMessage']))
            {
                $error = $resp['Errors']['Error']['ErrorMessage'];
            }
            else
            {
                $errors = array_column($resp['Errors']['Error'], 'ErrorMessage');
                foreach ($errors as $error)
                {
                    $error .= $error . '<br>';
                }
            }
        }
        else
        {
            $ShipmentLabelLink = $resp['Result']['ShipmentLabelLink'];
            $TrackingNumber = $resp['Result']['Packages']['Package']['TrackingNumber'];
        }

        return array(
            'error' => $error,
            'ShipmentLabelLink' => $ShipmentLabelLink,
            'TrackingNumber' => $TrackingNumber
        );
    }



    public function getStateByCountryId($country_id, Request $request)
    {
        $address  = null;
        if(Auth::user()){

            $user_id = Auth::user()->id;

        }else{ 

            $check_email = User::where('username', trim($request->user))->first();
            if (is_null($check_email)) {
                $user_id = 1;
            }else{
                $user_id = $check_email->id;
            }
            
        }

        $address = UserShippingAddress::where('user_id',$user_id)
        ->where('is_default', 1)
        ->first();
        
        $states = \DB::table('states')->where('country_code', $country_id)->where('active', 1)->orderBy('name','asc')->get();

        $data = '<option value="">State</option>';
        foreach ($states as $state) {

            $attr = '';
            if(!is_null($address)){
                if($address->state == $state->iso2){ $attr = 'selected'; }
            }
            $data .= '<option '.$attr.'  value="' . $state->iso2 . '">' . $state->name . '</option>';
        }
        echo $data;
    }

}
