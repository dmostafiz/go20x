<?php

use App\Models\Announcement;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

Route::middleware(['auth', 'isAdmin'])
->prefix('admin')
->group(function(){

    Route::get('/dashboard', function () {
        $users = User::where('user_type', 'user')
                        ->where('email_verified_at', '!=', null)
                        ->paginate(5);
        $leads = Contact::latest()->paginate(5);

        $myLeads = Contact::whereYear('created_at', date('Y', strtotime('0 year')))
        ->selectRaw(' monthname(created_at) month, count(*) data')
        ->groupBy('month')
        ->orderBy('month', 'desc')
        ->get()->toArray();


        $leadsMonth = [];
        $leadsDataCount = [];

        foreach($myLeads as $lds){
            $leadsMonth[] = $lds['month'];
            $leadsDataCount[] = $lds['data'];
        }


        return Inertia::render('Admin/Dashboard', [
            'users' => $users,
            'leads' => $leads,
            'leadsMonth' => $leadsMonth,
            'leadsDataCount' => $leadsDataCount,
        ]);
    
    })->name('admin.dashboard');
    
    
    Route::get('announcements', function () {

        $announcements = Announcement::latest()->paginate(10);

        return Inertia::render('Admin/Announcements', [
            'announcements' => $announcements
        ]);
    
    })->name('admin.announcements');

    Route::post('create_announcement', function (Request $request) {
        
        $request->validate([
            'title' => 'required', 
            'image' => 'required|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required', 
        ]);

        if(!Storage::disk('public')->exists('anc'))
        {
            Storage::disk('public')->makeDirectory('anc');
        } 

        $file = $request->file('image');
        $file_ext = $file->getClientOriginalExtension();
        $image = 'image_'.time().'.'.$file_ext;

        $save = 'storage/anc/'. $image;
        
        Image::make($file)->save($save);

        $anc = new Announcement();
        $anc->title = $request->title;
        $anc->image = $save;
        $anc->description = $request->description;
        $anc->save();

        session()->flash('success', 'Announcement created successfully!');

        return redirect()->back();

    })->name('create_announcement');

    Route::post('delete_announcement', function(Request $request){

        $anc = Announcement::findOrFail($request->announcementId);
        $anc->delete();

        session()->flash('success', 'Announcement deleted successfully!');

        return redirect()->back();
    })->name('delete.announcement');
    
    
    Route::get('leads', function (Request $request) {

        $leads = Contact::latest()->paginate(8);

        return Inertia::render('Admin/Leads', [
            'leads' => $leads
        ]);

    })->name('admin.leads');

    Route::post('delete_lead', function(Request $request){

        $lead = Contact::findOrFail($request->leadId);
        $lead->delete();

        session()->flash('success', 'Contact deleted successfully!');

        return redirect()->back();
    })->name('admin.delete.lead');
    
    Route::get('users', function () {
        $users = User::where('user_type', 'user')
                       ->where('email_verified_at', '!=', null)
                       ->paginate(10);

        return Inertia::render('Admin/Members', [
            'users' => $users
        ]);
    
    })->name('admin.users');


    Route::get('user_details/{userId}', function (Request $request) {
        $user = User::where('username',$request->userId)->with('parent')->with('contacts')->first();

        return Inertia::render('Admin/UserDetails', [
            'mode' => '',
            'user' => $user
        ]);
    
    })->name('admin.users');
    
    
    Route::get('profile', function (Request $request) {
    
        return Inertia::render('Admin/Profile', [
            'mode' => $request->mode
        ]);
        
    })->name('admin.profile');


    Route::post('block_user', function(Request $request){

        $user = User::findOrFail($request->userId);

        $blk = 'blocked';
        if($request->do == 'block'){ 
            $user->status = 'blocked';
        }elseif($request->do == 'unblock'){
            $blk = 'unblocked';
            $user->status = 'active';
        }

        $user->save();
    
        session()->flash('success', 'User status has been '. $blk . '!');

        return redirect()->back();
    })->name('admin.block');


    Route::post('delete_user', function (Request $request){

        $user = User::findOrFail($request->userId);
        $user->delete();
    
        session()->flash('success', 'User has been deleted!');

        return redirect()->back();
    })->name('admin.delete');

    

});
