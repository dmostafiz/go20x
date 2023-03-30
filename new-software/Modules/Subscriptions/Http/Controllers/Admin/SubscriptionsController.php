<?php

namespace Modules\Subscriptions\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\UserSubscriptionDetails;
 


class SubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('subscriptions::index');
    }

    public function userSubscriptions(Request $request)
    {

        $search = $request->search;
        
        $date_search = $request->date;
        $date = explode('-', $date_search);
        $start = @$date[0];
        $end = @$date[1];

        $start = \Carbon\Carbon::parse($start);
        $end = \Carbon\Carbon::parse($end);

        

  
        $subscriptions = UserSubscriptionDetails::select('user_subscriptions_details.*');


        if(trim($search) !== ''){

            $subscriptions->join('users', 'users.id', '=', 'user_subscriptions_details.user_id');
            $subscriptions->where('users.username', 'Like' , '%' .trim($search). '%');
        }

        if (isset($date_search)) {
           
            if ($end) {
                $subscriptions->whereDate('user_subscriptions_details.plan_period_end', '>=', $start)
                    ->whereDate('user_subscriptions_details.plan_period_end', '<=', $end);
            }
            elseif ($start) {
                $subscriptions->whereDate('user_subscriptions_details.plan_period_end', $start);
            }
            
        }
        
        if($request->has('subscriptions_status') && $request->subscriptions_status != "" ){
            $status = $request->subscriptions_status;
            
            if($status == 'active'){
                $subscriptions->where('user_subscriptions_details.status' , 'active');
            }
            if($status == 'canceled'){
                $subscriptions->where('user_subscriptions_details.status' , 'canceled');
            }
            if($status == 'past_due'){
                $subscriptions->where('user_subscriptions_details.status' , 'past_due');
            }
        }
        
        if($request->has('subscriptions_types') && $request->subscriptions_types != "" ){
            $subscriptions_type = $request->subscriptions_types;
            
            if($subscriptions_type == 'newest'){
                $subscriptions->orderBy('user_subscriptions_details.plan_period_start', 'desc');
            }
            if($subscriptions_type == 'upcoming'){
                $subscriptions->orderBy('user_subscriptions_details.plan_period_end', 'asc');
            }
            if($subscriptions_type == 'oldest'){
                $subscriptions->orderBy('user_subscriptions_details.plan_period_end', 'desc');
            }
        }
        
        if($request->has('subscription_id') && $request->subscription_id != "" ){
            $subscription_id = $request->subscription_id;
            $subscriptions->where('user_subscriptions_details.stripe_subscription_id' , $subscription_id)->first();
        }
        
        if($request->has('stripe_invoice_id') && $request->stripe_invoice_id != "" ){
            $stripe_invoice_id = $request->stripe_invoice_id;
            $subscriptions->where('user_subscriptions_details.stripe_invoice_id' , $stripe_invoice_id);
        }
        
        if(!$request->has('subscriptions_types') || $request->subscriptions_types == ""){
            $subscriptions->orderBy('id','desc');
        }
        
        $subscriptions = $subscriptions->paginate(40);
        $pageTitle = "Subscriptions";
        $emptyMessage = "No data found";
        return view('subscriptions::admin.user-subscriptions',compact('pageTitle', 'emptyMessage', 'subscriptions'));
         
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('subscriptions::create');
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
        return view('subscriptions::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('subscriptions::edit');
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
