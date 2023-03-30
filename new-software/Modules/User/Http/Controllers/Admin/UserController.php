<?php

namespace Modules\User\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Mail\EmailtoUser;
use Auth;
use DB;
use Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {  


        $search = $request->search;
        $current_month_start = (date('m/01/Y'));
        $current_month_end = (date('m/t/Y'));
        $pageTitle = 'Manage Users';
        $emptyMessage = 'No user found';
        
        \DB::enableQueryLog();
        $users = User::select('users.*');
        
        
        if($request->has('search') && $request->search != "" ){
            $users->where(function ($user) use ($search) {


                $user->Where(DB::raw("concat(name)"), 'LIKE', "%" . $search . "%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('name', 'like', "%$search%");

                // $user->Where(DB::raw("concat(firstname, ' ', lastname)"), 'LIKE', "%" . $search . "%")
                //     ->orWhere('email', 'like', "%$search%")
                //     ->orWhere('username', 'like', "%$search%");
            });
        } 
        if($request->has('date') && $request->date != ""){

            $date_search = $request->date;
            $date = explode('-',$date_search);
            
            $start =  trim(@$date[0]);
            $end =  trim(@$date[1]);
            
            
            if($start && $end){
                
                $start_date = date("Y-m-d", strtotime($start));
                $end_date = date("Y-m-d", strtotime($end));
                
                $orders = Order::select('orders.user_id')
                ->where('created_at', '>=', $start_date)->
                where('created_at', '<=', $end_date)->groupBy('orders.user_id')->get();
                $orders = json_decode(json_encode($orders), TRUE);
                
                $user_id = array_column($orders, 'user_id');
                $users->whereIn('id', $user_id); 
                
                 
                //$users->whereDate('users.created_at','>=',Carbon::parse($start))->whereDate('users.created_at','<=',Carbon::parse($end));                    
            }

        }
        
        $start = '';
        $end = '';
        if($request->has('days') && $request->days != ""){

            
            $end = \Carbon\Carbon::now()->format("Y-m-d");
            $start = \Carbon\Carbon::today()->subDays($request->days)->format("Y-m-d");
            $orders = Order::select('orders.user_id')->where('created_at', '>=', $start)->
            where('created_at', '<=', $end)->groupBy('orders.user_id')->get();
            $orders = json_decode(json_encode($orders), TRUE);
            $user_id = array_column($orders, 'user_id');
           
            $users->whereNotIn('id', $user_id);    
        }



        $all_users = $users->orderBy('id', 'desc')->paginate(50);
        return view('user::admin.index',compact('all_users'));
    }


    public function retailUser()
    {
        $current_month_start = (date('m/01/Y'));
        $current_month_end = (date('m/t/Y'));

        $pageTitle = 'Retail Users';
        $emptyMessage = 'No user found';
        $all_users = User::where("is_retailer", 1)->orderBy('id', 'desc')->paginate(getPaginate());

        return view('user::admin.retail_user_list', compact('all_users'));
    }


    public function userDetail($id)
    {    
        $users_detail = User::find($id);
       
        return view('user::admin.userDetail',compact('users_detail'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function order_detail($id)
    {   
         
        $order = get_orders_single($id);
       
        $order_detail = OrderDetail::where('order_id',$id)->get();
        return view('user::admin.order_detail',compact('order_detail','order'));
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
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('user::edit');
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
    public function delete_user($id)
    {
        $users_delete = User::where('id',$id)->delete();
         if ($users_delete) {
          
            return redirect()->back()->with('success','User delete Successfully');
        }
    }



    public function showEmailSingleForm($id)
    {    
        $user = User::findOrFail($id);
        $pageTitle = 'Send Email To: ' . $user->name;
         return view('user::admin.email_single',compact('user','pageTitle'));
        
    }

    public function showEmailAllForm()
    {
        $pageTitle = 'Send Email To All Users';

        return view('user::admin.email_all',compact('pageTitle'));
        
    }



    public function sendEmailSingle(Request $request, $id)
    {   
        
        $request->validate([
            'message' => 'required|string|max:65000',
            'subject' => 'required|string|max:190',
        ]);

        $user = User::findOrFail($id);

        $data = [
            'body' => $request->message,
            'subject' => $request->subject,
        ];
        Mail::to($user->email)->send(new EmailtoUser($data));
        return redirect()->back()->with('success','"'. $user->username.'" will receive an email shortly');
        
    }


     public function sendEmailAll(Request $request)
    {
        

        $request->validate([
            'message' => 'required|string|min:10|max:65000',
            'subject' => 'required|string|max:190',
        ]);
        $data = [
            'body' => $request->message,
            'subject' => $request->subject,
        ];

        if (isset($request->user) && count($request->user) > 0) {
            foreach ($request->user as $user) {
                if ($user == 'all') {
                    foreach (User::where('status', 1)->cursor() as $user) {
                        Mail::to($user->email)->send(new EmailtoUser($data));
                    }
                    $notify[] = ['success', 'All users will receive an email shortly.'];
                    return back()->withNotify($notify);
                } else {
                    $user = User::where('id', $user)->first();
                    Mail::to($user->email)->send(new EmailtoUser($data));
                    $notify[] = ['success', $user->username . ' will receive an email shortly.'];
                    return back()->withNotify($notify);
                }
            }
        } else {
            $notify[] = ['error', 'Please Select Users to Email.'];
            return back()->withNotify($notify);
        }
    }
}
