<?php

namespace Modules\BankInformation\Http\Controllers\User;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\BankInformation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class BankInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {   
       
        $user = BankInformation::where('user_id',Auth::user()->id)->orderBy('id','desc')->first();
        $countries = \DB::table('countries')->whereIn('id', array(
            14,
            39,
            233,
            232,
            174,
            158
        ))->get();
        //$banking_information = BankInformation::where('user_id',$user->id)->orderBy('id','desc')->get(); 
        return view('bankinformation::index' , compact('countries','user'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {   
        return view('bankinformation::create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
     {
        $in = [];
        $user = Auth::user();

        if (isset($request->bank_country)) {

            $bank_details = BankInformation::where('user_id',$user->id)->update(['bank_country' => $request->bank_country]);
            //DB::table('users')->where('id', Auth::user()->id)->update(['bank_country' => $request->bank_country]);
        }


        if (isset($request->bank_country) && $request->bank_country == 'us') {

            $request->validate([
                'bank_country' => 'required|string',
                'bank_legal_name_us' => 'max:100',
                'bank_account_number_us' => 'required',
                'bank_route_number_us' => 'required',
            ]);

            $in['bank_country']              = $request->bank_country;
            $in['bank_legal_name_us']        = $request->bank_legal_name_us;
            $in['bank_account_number_us']    = $request->bank_account_number_us;
            $in['bank_route_number_us']      = $request->bank_route_number_us;
            $in['bank_email_us']             = $request->bank_email_us;
            $in['bank_phone_us']             = $request->bank_phone_us;
        } elseif ($request->bank_country == 'au') {

            $request->validate([
                'bank_country' => 'required|string',
                'bank_legal_name_au' => 'max:100',
                'bank_account_number_au' => 'required',
                'au_bsb' => 'required',
            ]);

            $in['bank_country']           = $request->bank_country;
            $in['bank_legal_name_au']        = $request->bank_legal_name_au;
            $in['bank_account_number_au']    = $request->bank_account_number_au;
            $in['au_bsb']                 = $request->au_bsb;
            $in['bank_add1_au']              = $request->bank_add1_au;
            $in['bank_postal_code_au']       = $request->bank_postal_code_au;
            $in['bank_city_au']              = $request->bank_city_au;
        } elseif ($request->bank_country == 'gb') {
            $request->validate([
                'bank_country' => 'required|string',
                'bank_legal_name_uk' => 'max:100',
                'bank_account_number_uk' => 'required',
                'uk_short_code' => 'required',

            ]);

            $in['bank_country']           = $request->bank_country;
            $in['bank_legal_name_uk']        = $request->bank_legal_name_uk;
            $in['bank_account_number_uk']    = $request->bank_account_number_uk;
            $in['uk_short_code']          = $request->uk_short_code;
            $in['bank_add1_uk']              = $request->bank_add1;
            $in['bank_postal_code_uk']       = $request->bank_postal_code;
            $in['bank_city_uk']              = $request->bank_city;
        } elseif ($request->bank_country == 'ca') {
            //dd($request->all());
            $request->validate([

                'bank_legal_name_ca' => 'max:100',
                'bank_account_number_ca' => 'required|string',

            ]);


            $in['bank_country']           = $request->bank_country;
            $in['bank_legal_name']        = $request->bank_legal_name_ca;
            $in['bank_account_number']    = $request->bank_account_number_ca;
            $in['bank_email']             = $request->bank_email_ca ?? '';
            $in['bank_institution_number'] = $request->bank_institution_number;
            $in['bank_transit_number']    = $request->bank_transit_number;
            $in['bank_add1_ca']              = $request->bank_add1_ca;
            $in['bank_add2_ca']              = $request->bank_add2_ca;
            $in['bank_postal_code_ca']       = $request->bank_postal_code_ca;
            $in['bank_city_ca']              = $request->bank_city_ca;
            $in['bank_province_ca']          = $request->bank_province_ca;
        } elseif ($request->bank_country == 'ph') {

            $request->validate([
                'bank_legal_name_ph' => 'max:100',
                'bank_account_number_ph' => 'required|string',

            ]);

            $in['bank_country']           = $request->bank_country;
            $in['bank_legal_name_ph']        = $request->bank_legal_name_ph;
            $in['bank_account_number_ph']    = $request->bank_account_number_ph;
            $in['bank_iban_ph']              = $request->bank_iban_ph;
            $in['bank_add1_ph']              = $request->bank_add1_ph;
            $in['bank_postal_code_ph']       = $request->bank_postal_code_ph;
            $in['bank_city_ph']              = $request->bank_city_ph;
        } elseif ($request->bank_country == 'nz') {

            $request->validate([
                'bank_legal_name_nz' => 'max:100',
                'bank_account_number_nz' => 'required|string',
            ]);

            $in['bank_country']           = $request->bank_country;
            $in['bank_legal_name_nz']        = $request->bank_legal_name_nz;
            $in['bank_account_number_nz']    = $request->bank_account_number_nz;
            $in['bank_add1_nz']              = $request->bank_add1_nz;
            $in['bank_postal_code_nz']       = $request->bank_postal_code_nz;
            $in['bank_city_nz']              = $request->bank_city_nz;
        }

        
       
        $bank_details = BankInformation::where('user_id',$user->id)->first();

        if (is_null($bank_details)) {

            $in['user_id'] = $user->id;

            $result = BankInformation::insert($in);
            if ($result) {
                return redirect()->back()->with('success','Bank information added.');
            }else{
                return redirect()->back()->with('error','Somthing went wrong.');
            }
            
        }else{

            $result = BankInformation::where('user_id', $user->id)
                        ->where('bank_country',$request->bank_country)
                        ->update($in);
            if ($result) {
                return redirect()->back()->with('success','Bank information updated.');
            }else{
                return redirect()->back()->with('error','Somthing went wrong.');
            }
            
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('bankinformation::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('bankinformation::edit');
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
