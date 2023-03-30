<?php

namespace Modules\Resources\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Resource;
use App\Models\ResourceCategory;
use Auth;

class ResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
         $pageTitle = "Resources";
        $emptyMessage = "";
        $items = array();
        $items = Resource::orderBy('id', 'DESC')->paginate(15);
      
        $parentCategories = ResourceCategory::whereNull('parent_id')->get();
        $childCategories = ResourceCategory::whereNotNull('parent_id')->get();

        return view('resources::admin.index',compact('pageTitle', 'items', 'emptyMessage', 'parentCategories', 'childCategories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('resources::admin.create');
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
        return view('resources::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('resources::edit');
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
    public function delete($id)
    {
         $res = Resource::where('id', $id)->delete();
        if ($res) {
          
            return redirect()->back()->with('success','Resource delete Successfully');
        }
    }


     public function add_resources(Request $request)
    {

        $resource_type = $request->resource_type;
        $file_name = '';

        if ($request->file('file')) {
            $file = $request->file;
            $destinationPath = 'public/images/resources/';

            $file_name = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $file_name);

            $create_resource = Resource::create([
                'file' => $file_name,
                'title' => $request->title,
                'category_id' => $request->category_id,
                'res_type' => $resource_type
            ]); 

            if ($create_resource) {
                $result = array('success' => 'Resource created successfully');
                echo json_encode($result);
            } else {
                $result = array('error' => 'Resource not created');
                echo json_encode($result);
            }
        } else {
            $result = array('error' => 'Resource file not selected');
            echo json_encode($result);
        }
    }


       public function save_resource_category(Request $request)
    {

        $parent_id = $request->parent_id;
        $cat_title = $request->cat_title;

        $ResourceCategory = new ResourceCategory();
        $ResourceCategory->title = $cat_title;
        if ($parent_id != "") {
            $ResourceCategory->parent_id = $parent_id;
        }
        $ResourceCategory->save();

        if ($ResourceCategory) {

            $parentCategories = ResourceCategory::whereNull('parent_id')->get();
            $childCategories = ResourceCategory::whereNotNull('parent_id')->get();
            $parent_cat = '<option value="">None</option>';


            if (count($parentCategories) > 0) {
                foreach ($parentCategories as $category) {
                    $parent_cat .= '<optgroup label="' . $category->title . '">';
                    $parent_cat .= '<option value="' . $category->id . '">' . $category->title . '</option>';
                    if (count($childCategories) > 0) {
                        foreach ($childCategories as $child) {
                            if ($category->id == $child->parent_id) {
                                $parent_cat .= '<option value="' . $child->id . '">' . $child->title . '</option>';
                            }
                        }
                    }
                    $parent_cat .= '</optgroup>';
                }
            }

            $result = array('success' => 'Category created successfully', 'parent_cat' => $parent_cat);
            echo json_encode($result);
        } else {
            $result = array('error' => 'Category not created');
            echo json_encode($result);
        }
    }

    
    
}
