<?php

// Testing github collaboration with Dan

// Another commit 

use App\Models\Announcement;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth', 'isUser'])
->prefix('user')
->group(function(){

    Route::get('/dashboard', function (Request $request) {
        $leads = Contact::where('user_id', $request->user()->id)->latest()->paginate(8);

        $myLeads = Contact::whereYear('created_at', date('Y', strtotime('0 year')))
        ->where('user_id', $request->user()->id)
        ->selectRaw(' monthname(created_at) month, count(*) data')
        ->groupBy('month')
        ->orderBy('month', 'desc')
        ->get()->toArray();

        // dd( $request->user() );


        $leadsMonth = [];
        $leadsDataCount = [];

        foreach($myLeads as $lds){
            $leadsMonth[] = $lds['month'];
            $leadsDataCount[] = $lds['data'];
        }

        // dd($leadsMonth, $leadsDataCount);

        return Inertia::render('User/Dashboard', [
            'leads' => $leads,
            'leadsMonth' => $leadsMonth,
            'leadsDataCount' => $leadsDataCount,
        ]);
    
    })->name('user.dashboard');
    
    
    Route::get('announcements', function () {
        $date = \Carbon\Carbon::today()->subDays(7);
        $announcements = Announcement::where('created_at', '>=', $date)
                                      ->latest()
                                      ->paginate(10);

        return Inertia::render('User/Announcments', [
            'announcements' => $announcements
        ]);

    })->name('user.one');
    
    Route::get('leads', function (Request $request) {

        $leads = Contact::where('user_id', $request->user()->id)->latest()->paginate(8);
        return Inertia::render('User/Leads', [
            'leads' => $leads 
        ]);
    })->name('user.leads');

    Route::post('delete_lead', function(Request $request){

        $lead = Contact::findOrFail($request->leadId);
        $lead->delete();

        session()->flash('success', 'Contact deleted successfully!');

        return redirect()->back();
    })->name('user.delete.lead');
    
    
    Route::get('profile', function (Request $request) {
    
        // dd($request->mode);
        return Inertia::render('User/Profile', [
            'mode' => $request->mode
        ]);
        
    })->name('user.profile');
    
    Route::get('announecement/{ancId}', function (Request $request) {
        $announcement = Announcement::findOrFail($request->ancId);
        return Inertia::render('User/AnnouncementDetails', [
            'announcement' => $announcement
        ]);
    })->name('user.announecement');

});