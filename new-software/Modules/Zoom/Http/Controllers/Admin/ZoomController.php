<?php

namespace Modules\Zoom\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Zoom;
use App\Rules\FileTypeValidate;
use ValidatesRequests;
class ZoomController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {   
         $pageTitle = "Zoom";
        $emptyMessage = "Not Found";
        $items = array();
        $items = Zoom::orderBy('id','DESc')->paginate(20);
      
        return view('zoom::admin.index',compact('pageTitle', 'items', 'emptyMessage'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function storezoom(Request $request)
    {
        
        // $this->validate($request, [
        //     'title' => 'required',
        //     'url1' => 'required',
        //     'url2' => 'required',
        //     'code' => 'required',
        // ]);

         $request->validate([
            'title' => 'required',
            'url1' => 'required',
            'url2' => 'required',
            'code' => 'required',
        ]);

        if (isset($request->id)) {
            $update = Zoom::where('id', $request->id)->update([
                'title' => $request->title,
                'url1' => $request->url1,
                'url2' => $request->url2,
                'code' => $request->code,
            ]);
            if ($update) {

                 return redirect()->back()->with('success','Zoom Updated Successfully');
                 
            }else{

                 return redirect()->back()->with('error','Something Went Wrong');
                 
            }
            
        }

        $zoom = new Zoom();
        $zoom->title = $request->title;
        $zoom->url1 = $request->url1;
        $zoom->url2 = $request->url2;
        $zoom->code = $request->code;
        $zoom->save();
        return redirect()->back()->with('success','Zoom Added Successfully');
        // $notify[] = ['success', 'Zoom Added Successfully'];
        // return redirect()->route('admin.zoom')->withNotify($notify);

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    
 
    public function show($id)
    {
        return view('zoom::admin.show');
    }

    
   
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
         $res = Zoom::where('id', $id)->delete();
        if ($res) {
             
            return redirect()->back()->with('success','Zoom Deleted successfully');
             
        }
    }
}
