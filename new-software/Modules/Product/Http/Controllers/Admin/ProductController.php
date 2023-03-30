<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\Products;
use App\Models\Country;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {   
       
        if (isset($_GET['search']) && $_GET['search'] !== '') {
            $search = trim($_GET['search']);

             $products = Product::where('product_name', 'like', "%$search%")->paginate(10);

        }else{
            
             $products = Product::paginate(10);
        }
        
         
        return view('product::admin.index', compact('products'));
    }

     public function addproduct()
    {
        $pageTitle = 'Add Product';
        $countries = Country::all();
        //return view('admin.password', compact('pageTitle', 'admin'));
        return view('product::admin.addproduct', compact('pageTitle', 'countries'));
    }

    public function storeproduct(Request $request)
    {   

        if (isset($request->product_id)) {
            $request->validate([
                'title' => 'required',
                'price' => 'required',
                'length' => 'required',
                'width' => 'required',
                'height' => 'required',
                'distance_unit' => 'required',
                'weight' => 'required',
                'mass_unit' => 'required',
                'description' => 'required',
                'country' => 'required',
                'cv' => 'required',
            ]);
        } else {
            $request->validate([
                'title' => 'required',
                'price' => 'required',
                'length' => 'required',
                'width' => 'required',
                'height' => 'required',
                'distance_unit' => 'required',
                'weight' => 'required',
                'mass_unit' => 'required',
                'description' => 'required',
                'image' => 'required',
                'country' => 'required',
                'cv' => 'required',
            ]);
        }
        $input = $request->all();

        if (isset($request->product_id)) {

            if ($image = $request->file('image')) {
               $destinationPath = 'public/images/product_images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $in['image'] = $profileImage;
            } else {
                $profileImage = $request->image_name;
            }
            if (count($request->country) > 0) {
                $str = implode(",", $request->country);
            }
            $res = Products::where('id', $request->product_id)->update([
                'product_name' => $request->title,
                'price' => $request->price,
                'length' => $request->length,
                'width' => $request->width,
                'height' => $request->height,
                'distance_unit' => $request->distance_unit,
                'weight' => $request->weight,
                'mass_unit' => $request->mass_unit,
                'description' => $request->description,
                'image' => $profileImage,
                'country' => $str,
                'cv' => $request->cv
            ]);
            if ($res) {
                // $notify[] = ['success', 'Product updated successfully.'];
                // return redirect()->route('admin.product')->withNotify($notify);

                return redirect(url('admin/product'))->with('success','Product updated successfully');
            }
        }
        if (count($request->country) > 0) {
            $str = implode(",", $request->country);
        }

        $in['product_name'] = $request->title;
        $in['price'] = $request->price;
        $in['length'] = $request->length;
        $in['width'] = $request->width;
        $in['height'] = $request->height;
        $in['distance_unit'] = $request->distance_unit;
        $in['weight'] = $request->weight;
        $in['mass_unit'] = $request->mass_unit;
        $in['description'] = $request->description;
        $in['country'] = $str;
        $in['cv'] = $request->cv;

        if ($image = $request->file('image')) {
            $destinationPath = 'public/images/product_images/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $in['image'] = $profileImage;
        }

        //$path = $request->file('image')->store('public/images');
        $item = new Products;
        $item->fill($in)->save();


          return redirect(url('admin/product'))->with('success','Product Add successfully');
        // $notify[] = ['success', 'Product Add successfully.'];
        // return redirect()->route('admin.product')->withNotify($notify);
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::create');
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
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
         $pageTitle = 'Edit Product';
        $res = Products::where('id', $id)->first();
        $countries = Country::all();
        if (!is_null($res)) {

            return view('product::admin.editproduct', compact('pageTitle', 'countries','res'));
              
        }
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
         $res = Products::where('id', $id)->delete();
        if ($res) {
            
           return redirect()->back()->with('success','Product Deleted successfully');
        }
    }
}
