<?php

namespace App\Http\Middleware;

use App\Models\Announcement;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    // protected $rootView = 'app';

    public function rootView(Request $request)
    {
        $pathArr = explode('/', $request->path());

        if($pathArr[0] && $pathArr[0] == 'user')
        {
            return 'app-root';
        }
        elseif($pathArr[0] && $pathArr[0] == 'admin'){
            
            return 'app-root';

        }else{

            return 'home-root';

        }
    }


    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    // public function register(Request $request)
    // {
 
    // }

    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {



        // dd($this->rootView);

        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'flash' => [
                'success' => fn () => $request->session()->get('success'),
                'info' => fn () => $request->session()->get('info'),
                'error' => fn () => $request->session()->get('error'),
                'warning' => fn () => $request->session()->get('warning'),
            ],
            'ziggy' => function () {
                return (new Ziggy)->toArray();
            },

            'totalLeads' => function() {
                return Contact::all()->count();
            },

            // 'newUsers' => function() {
            //     $date = \Carbon\Carbon::today()->subDays(7);
            //     return User::where('user_type', 'user')
            //                 ->where('created_at', '>=', $date) 
            //                 ->count();
            // }, 

            // 'verifiedUsers' => function() {
            //     return User::where('user_type', 'user')
            //                 ->where('email_verified_at', '!=', null)
            //                 ->count();
            // }, 

            'announcementsCount' => function() {
                return Announcement::all()->count();
            },

            'myAnnouncementsCount' => function() {
                $date = \Carbon\Carbon::today()->subDays(7);
                return Announcement::where('created_at', '>=', $date)->count();
            },

            
            'myTotalLeads' => function(Request $request) {
                if($request->user()){
                    return Contact::where('user_id', $request->user()->id)->count();
                }
           
            },

            // 'mySponsors' => function(Request $request) {
            //     if($request->user()){
            //         return User::where('parent_id', $request->user()->id)->count();
            //     }
            // },

        ]);
    }

    
    // public function handle(Request $request, Closure $next)
    // {
    //    $pathArr = explode('/', $request->path());

    //    if($pathArr[0] && $pathArr[0] == 'dashboard')
    //    {
    //        $this->rootView = 'app';
    //    }
    //    elseif($pathArr[0] && $pathArr[0] == 'admin'){
    //     $this->rootView = 'app';

    //    }else{
    //     $this->rootView = 'welcome';

    //    }


    //    return $next($request);

    // //    dd($this->rootView);
    // }
}
