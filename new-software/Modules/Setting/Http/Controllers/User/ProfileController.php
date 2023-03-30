<?php

namespace Modules\Setting\Http\Controllers\User;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Models\GeneralSetting;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {   
       
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        //return view('setting::create');
    }

    

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        //return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        //return view('setting::edit');
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
    public function submitProfile(Request $request)
    {

        $user = Auth::user();
        $request->validate([
            'email' => 'required|email|max:90|unique:users,email,' . $user->id,
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'address' => 'sometimes|required|max:80',
            'country' => 'sometimes|required|max:80',
            'state' => 'sometimes|required|max:80',
            'zip' => 'sometimes|required|max:40',
            'city' => 'sometimes|required|max:50',
            'image' => ['image', 'mimes:jpeg,png,jpg']
        ], [
            'firstname.required' => 'First name field is required',
            'lastname.required' => 'Last name field is required'
        ]);



        $in['firstname'] = $request->firstname;
        $in['lastname'] = $request->lastname;
        $in['mobile'] = $request->mobile;
        $in['email'] = $request->email;
        $in['country_code'] = $request->country;


        $in['address'] = [
            'address' => $request->address,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => $request->country,
            'city' => $request->city,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('static/assets/img/userprofile');
            $image->move($destinationPath, $name);
            $in['image'] = $name;
        }


        //$user->fill($in)->save();
        $user->where('id', $user->id)->update($in);
        //$notify[] = ['success', 'Profile updated successfully.'];
        return back()->with('success', 'Profile updated successfully.');
    }

    public function submitPassword(Request $request)
    {

        $password_validation = Password::min(6);
        $general = GeneralSetting::first();
        if ($general->secure_password) {
            $password_validation = $password_validation->mixedCase()->numbers()->symbols()->uncompromised();
        }
        
        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed', $password_validation]
        ]);

        try {
            $user = auth()->user();
            if (Hash::check($request->current_password, $user->password)) {
                $password = Hash::make($request->password);
                $user->password = $password;
                // $user->depassword = $request->password;
                $user->save();

                return back()->with('success', 'Password changes successfully.');
            } else {
                return back()->with('error', 'The password doesn\'t match!');
            }
        } catch (\PDOException $e) {
            
            return back()->with('error', $e->getMessage());
        }
    }
}
