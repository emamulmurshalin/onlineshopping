<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function addBrand(){
        return view('admin.brand.add-brand');
    }
    public function saveBrand(Request $request){
        $this->validate($request,[
            'brand_name' => 'required|alpha',
            'brand_description' => 'required|alpha'
        ]);

        $brand= new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();
        //return 'success';
        return redirect('add-brand')->with('message', 'Brand Added Successfully');
    }
    public function manageBrand(){
        $brands= Brand::all();

        return view('admin.brand.manage-brand', ['brands'=>$brands]);
    }
    public function unpublishBrand($id){
        $brandById= Brand::find($id);
        $brandById->publication_status= 0;
        $brandById->save();
        return redirect('/manage-brand')->with('message', 'Brand Unpublished');
    }
    public function publishBrand($id){
        $brandById= Brand::find($id);
        $brandById->publication_status= 1;
        $brandById->save();
        return redirect('/manage-brand')->with('message', 'Brand Published');
    }
    public function editBrand($id){
        $brandById= Brand::where('id', $id)->first();

        return view('admin.brand.edit', ['brand'=>$brandById]);
    }
    public function updateBrand(Request $request){
        $brandById= Brand::where('id', $request->brand_id)->first();
        $brandById->brand_name= $request->brand_name;
        $brandById->brand_description= $request->brand_description;
        $brandById->publication_status= $request->publication_status;
        $brandById->save();
        return redirect('/manage-brand')->with('message', 'Brand Update Successfully');
    }
    public function deleteBrand($id){
        $brandById= Brand::where('id', $id)->first();
        $brandById->delete();
        return redirect('/manage-brand')->with('message', 'Brand Deleted Successfully');
    }
}
