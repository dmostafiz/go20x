<?php

use App\Jobs\JobEmailWelcomeNewUser;
use App\Jobs\JobInformNewLead;
use App\Mail\LeadCreated;
use App\Mail\ContactCreated;
use App\Mail\InformNewLead;
use App\Mail\WelcomeNewUser;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
//use Request;

// Route::get('/mail', function (Request $request) {

//     $user = new stdClass();
//     $user->name = "Mostafiz Rahama";
//     $user->email = "dev.mostaf@gmail.com";

//     dispatch(new JobEmailWelcomeNewUser($user));
//     dispatch(new JobInformNewLead($user));

//     return "Mail job created";
// });


// Route::get('/landing/{uname?}', function (Request $request) {

//     if (!$request->uname) {
//         return redirect()->to('/landing/admin');
//     }
//     return view('landing', [
//         'sponsor' => $request->uname
//     ]);
// });

Route::post('/save_contact', function (Request $request) {

    // dd($request->all());

    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'sponsor_username' => 'required',
    ]);

    if ($request->sponsor_username) {

        $sponsor = User::where('username', $request->sponsor_username)->first();

        if (!$sponsor) {
            return redirect()->back()->with('error', 'Invalid sponsor id.');
        }
        // dd($sponsor);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->user_id = $sponsor->id;
        $contact->sponsor_id = $sponsor->id;
        $contact->save();

        // dd($contact);

        // $newContact = Contact::where('id', $contact->id)->with('sponsor')

        Mail::to($contact->email)->send(new WelcomeNewUser($contact, $sponsor));
        Mail::to($sponsor->email)->send(new InformNewLead($sponsor, $contact));



        // dispatch(new JobEmailWelcomeNewUser($contact, $sponsor));
        // dispatch(new JobInformNewLead($sponsor, $contact));

        // return response()->json(["success" => true, "message" => 'Thank you for submitting your information.']);
        return redirect('https://xceleratefueltabs.com/'.$sponsor->username);
    }

    // foreach ([$sponsor->email, $contact->email] as $recipient) {
    //     
    // }

    //session()->flash('success', 'Thank you for submitting your information.');
    return redirect()->back()->with('success', 'Thank you for submitting your information.');
    //return redirect()->to('/');

})->name('save_contact');

// Route::post('/save_contact', function (Request $request){

//     // dd($request->all());

//     $validated = $request->validate([
//         'first_name' => 'required',
//         'last_name' => 'required',
//         'email' => 'required',
//     ]);

//     if($request->sponsor){
//         $sponsor = User::where('username', $request->sponsor)->first();

//         // dd( $sponsor );

//         if($sponsor){

//             $contact = new Contact();
//             $contact->user_id = $sponsor->id;
//             $contact->first_name = $request->first_name;
//             $contact->last_name = $request->last_name;
//             $contact->email = $request->email;
//             $contact->phone = $request->phone;
//             $contact->country = $request->country;
//             $contact->ip = $request->ip();

//             $contact->save();


//             foreach ([$sponsor->email, $contact->email] as $recipient) {
//                 Mail::to($recipient)->send(new LeadCreated($contact));
//             }

//             session()->flash('success', 'Thank you for submitting your information.');

//         }

//     }

//     return redirect()->to('/'.$request->sponsor);

// })->name('save_contact');

// Route::get('/ordernow/{uname?}', function (Request $request) {

//     if (!$request->uname) {
//         return redirect()->to('/ordernow/admin');
//     }

//     return view('ordernow', [
//         'sponsor' => $request->uname
//     ]);
// });

// Route::get('/start/{uname?}', function (Request $request) {
//     if (!$request->uname) {
//         return redirect()->to('/start/admin');
//     }
//     return Inertia::render('Home/Landing', [
//         'sponsor' => $request->uname
//     ]);
// });

Route::get('/get_user_data/{uid?}', function (Request $request) {
    if (!$request->uid) {
        return;
    }

    $user = User::where('id', $request->uid)->with('parent')->with('contacts')->first();
    return $user;
});

Route::post('/update_profile_image', function (Request $request) {


    $request->validate([
        // 'title' => 'required', 
        'image' => 'required|mimes:jpeg,png,jpg|max:2048',
        // 'description' => 'required', 
    ]);


    if (!Storage::disk('public')->exists('profile')) {
        Storage::disk('public')->makeDirectory('profile');
    }

    $user = User::where('id', $request->user()->id)->first();

    if ($user) {

        if (Storage::disk('public')->exists('profile/' . $user->avatar)) {
            Storage::disk('public')->delete('profile/' . $user->avatar);
        }

        $file = $request->file('image');

        $file_ext = $file->getClientOriginalExtension();

        $image = 'image_' . time() . '.' . $file_ext;

        $save = 'storage/profile/' . $image;

        Image::make($file)->save($save);

        $user->avatar = $image;

        $user->save();

        session()->flash('success', 'Profile image updated successfully!');

        return redirect()->back();
    }
})->name('profile_image');


Route::post('/update_account', function (Request $request) {

    $user = User::findOrFail($request->user()->id);

    if ($request->update == 'profile') {

        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip' => 'required',
        ]);

        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->zip = $request->zip;

    } elseif ($request->update == 'email') {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);
        $user->email = $request->email;

    } elseif ($request->update == 'password') {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user->password = Hash::make($request->password);
    }

    $user->save();

    session()->flash('success', 'Account has been updated!');

    return redirect()->back();
})->name('update.account');


require __DIR__ . '/AdminRoutes.php';
require __DIR__ . '/UserRoutes.php';
require __DIR__ . '/auth.php';


Route::get('/{uname?}', function (Request $request) {

    // if (!$request->uname) {
    //     return redirect()->to('/admin');
    // }

    if($request->uname){
        session()->put('sponsor', $request->uname);
    }

    return view('app-root-main', [
        'sponsor' => session()->get('sponsor')
    ]);
});

Route::post('/valid_sponsor', function (Request $request) {

    $username = $request->username;

    session()->put('sponsor', $username);

    return redirect()->back();

})->name('valid.sponsor');



// Route::get('/{uname?}', function (Request $request) {

//     $username = \Request::segment(1);

//     if (isset($username) && $username != 'master') {
//         $sponsor_id = 0;
//         $sponsor = User::where('username', $username)->first();
//         if (!is_null($sponsor)) {
//             $sponsor_id = $sponsor->id;
//         }
//         return view('index', compact(['sponsor_id', 'username']));
//     }
//     // if(isset($username) && $username == 'master'){
//     //     return view('index');
//     // }

//     // if(!isset($username)){
//     //     return view('underconstruction');
//     // }

//     return view('index');


//     // $admin = User::where('user_type')
//     //if(!$request->uname){
//     //return redirect()->to('/master');
//     //}
//     //return view('index');
//     // return Inertia::render('Home/Landing', [
//     //     'sponsor' => $request->uname
//     // ]);
// });


// Route::get('master/{uname?}', function (Request $request) {
//     $username = \Request::segment(2);
//     if (isset($username)) {
//         $sponsor_id = 0;
//         $sponsor = User::where('username', $username)->first();
//         if (!is_null($sponsor)) {
//             $sponsor_id = $sponsor->id;
//         }

//         return view('index', compact(['sponsor_id', 'username']));
//     }
//     return redirect()->to('/');
// });


Route::post('get_user', function (Request $request) {

    $username = $request->name;
    $user = User::where('username', $username)->first();
    if (!is_null($user)) {
        return response()->json(["success" => true, "user_id" => $user->id, 'username' => $username]);
    } else {
        return response()->json(["error" => true]);
    }
})->name('get_user');
