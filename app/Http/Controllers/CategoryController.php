<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('admin.category.add-category');
    }

    public function saveCategory(Request $request){
        $this->validate($request,[
            'category_name' => 'required|alpha',
            'category_description' => 'required'
        ]);
        $category=new Category();

        $category->category_name=$request->category_name;
        $category->category_description=$request->category_description;
        $category->publication_status=$request->publication_status;
        $category->save();
        return redirect('/add-category')->with('message', 'Category Added Successfully');
    }

    public function manageCategory(){
        $categoris=Category::all();
        //return $allCategory;
        return view('admin.category.manage-category', ['categories'=>$categoris]);
    }
    public function unpublishCategory($id){
        $categoryId= Category::find($id);
        $categoryId->publication_status = 0;
        $categoryId->save();
        return redirect('manage-category')->with('message', 'Category Info Updated');
    }
    public function publishCategory($id){
        $categoryId= Category::find($id);
        $categoryId->publication_status = 1;
        $categoryId->save();
        return redirect('manage-category')->with('message', 'Category Info Updated');
    }
    public function editCategory($id){
        $categoryInfo= Category::where('id', $id)->first();
        return view('admin.category.edit', ['categoryInfo'=>$categoryInfo]);
    }
    public function updateCategory(Request $request){
        $categoryById= Category::find($request->category_id);

        $categoryById->category_name= $request->category_name;
        $categoryById->category_description= $request->category_description;
        $categoryById->publication_status= $request->publication_status;
        $categoryById->save();

        return redirect('/manage-category')->with('message', 'Update Category Successfully');
    }
    public function deleteCategory($id){
        $categoryById= Category::find($id);
        $categoryById->delete();
        return redirect('/manage-category')->with('message', 'Category Deleted Successfully');
    }
}
