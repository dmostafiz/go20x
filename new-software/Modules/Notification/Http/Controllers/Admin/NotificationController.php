<?php

namespace Modules\Notification\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\AdminMessage;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {    

         $pageTitle = "Notifications";
        $emptyMessage = "Not Found";
        $items = array();
        
        $items = AdminMessage::orderBy('id','DESC')->paginate(20);
      
        return view('notification::admin.index',compact('pageTitle','items','emptyMessage'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('notification::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
          $start = date('Y-m-d', strtotime($request->start_date));
        $end = date('Y-m-d', strtotime($request->end_date));
        if (isset($request->id)) {
            $update = AdminMessage::where('id', $request->id)->update([
                'title' => $request->title,
                'start_date' => $start,
                'end_date' => $end,
                'message' => $request->message,
            ]);
            if ($update) {
                 
                return redirect()->back()->with('success','Message Updated Successfully');
            }else{
               
                 return redirect()->back()->with('error','Something Went Wrong');
            }
            
        }

        $message = new AdminMessage();
        $message->title = $request->title;
        $message->start_date = $start;
        $message->end_date = $end;
        $message->message = $request->message;
        $message->save();
         
        return redirect()->back()->with('success','Message Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('notification::admin.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('notification::admin.edit');
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
         $res = AdminMessage::where('id', $id)->delete();
        if ($res) {
          
             return redirect()->back()->with('success','Message Deleted successfully.');
        }
    }
}
