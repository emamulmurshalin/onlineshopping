<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class ProductController extends Controller
{
    public function addProduct(){
        $categories= Category::where('publication_status', 1)->get();
        $brands= Brand::where('publication_status', 1)->get();
        return view('admin.product.add-product', [
            'categories'=>$categories,
            'brands'=>$brands
        ]);
    }
    public function saveProduct(Request $request){
        /* Image Upload Without Package */
        /*$productImage= $request->file('product_image');*/
        /*echo '<pre>';
        print_r($productImage);
        exit();*/

        /*$imageName= $productImage->getClientOriginalName();
        $directory= 'product-images/';
        $productImage->move($directory, $imageName);
        $imgUrl= $directory.$imageName;*/
        /* Image Upload Without Package */

        /* Image Upload With Package */
        $productImage= $request->file('product_image');
        $imageName= $productImage->getClientOriginalName();
        $directory= 'product-images/';
        Image::make($productImage)->resize(200, 200)->save($directory.$imageName);
        $imgUrl= $directory.$imageName;

        $this->validate($request, [
            'product_name' => 'required|alpha',
            'product_code' => 'required',
            'regular_price' => 'required',
            'selling_price' => 'required',
            'product_quantity' => 'required',
            'product_discount' => 'required',
            'product_short_description' => 'required',
            'product_long_description' => 'required'
        ]);
        //return $imgUrl;

        $product= new Product();
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->product_name=$request->product_name;
        $product->product_code=$request->product_code;
        $product->regular_price=$request->regular_price;
        $product->selling_price=$request->selling_price;
        $product->product_quantity=$request->product_quantity;
        $product->product_discount=$request->product_discount;
        $product->product_short_description=$request->product_short_description;
        $product->product_long_description=$request->product_long_description;
        $product->product_image=$imgUrl;
        $product->publication_status=$request->publication_status;
        $product->save();
        return redirect('/add-product')->with('message', 'Product Info Saved Successfully');
    }
    public function manageProduct(){
        $products= DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name')
            ->get();
        //return $products;
        return view('admin.product.manage-product', ['products'=> $products]);
    }
    public function viewProduct($id){
        $products= DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name')
            ->get();
        //return $products;
        return view('admin.product.view', ['products'=> $products]);
    }
    public function unpublishedProduct($id){
        $productById= Product::find($id);
        $productById->publication_status= 0;
        $productById->save();
        return redirect('/manage-product')->with('message', 'Product Unpublished');
    }
    public function publishedProduct($id){
        $productById= Product::find($id);
        $productById->publication_status= 1;
        $productById->save();
        return redirect('/manage-product')->with('message', 'Product Published');
    }
    public function editProduct($id){
        $categories= Category::where('publication_status', 1)->get();
        $brands= Brand::where('publication_status', 1)->get();
        $product= Product::find($id);
        return view('admin.product.edit', [
            'categories'=>$categories,
            'brands'=>$brands,
            'product'=>$product
        ]);
    }
    public function updateProduct(Request $request){
        $product_image= $request->file('product_image');
        $product= Product::find($request->product_id);

        if ($product_image){
            if ($product->product_image){
                unlink($product->product_image);
            }
            $productImage= $request->file('product_image');
            /*echo '<pre>';
            print_r($productImage);
            exit();*/

            $imageName= $productImage->getClientOriginalName();
            $directory= 'product-images/';
            $productImage->move($directory, $imageName);
            $imgUrl= $directory.$imageName;

            $product->category_id=$request->category_id;
            $product->brand_id=$request->brand_id;
            $product->product_name=$request->product_name;
            $product->product_code=$request->product_code;
            $product->regular_price=$request->regular_price;
            $product->selling_price=$request->selling_price;
            $product->product_quantity=$request->product_quantity;
            $product->product_discount=$request->product_discount;
            $product->product_short_description=$request->product_short_description;
            $product->product_long_description=$request->product_long_description;
            $product->product_image=$imgUrl;
            $product->publication_status=$request->publication_status;
            $product->save();
        }
        else{
            $product->category_id=$request->category_id;
            $product->brand_id=$request->brand_id;
            $product->product_name=$request->product_name;
            $product->product_code=$request->product_code;
            $product->regular_price=$request->regular_price;
            $product->selling_price=$request->selling_price;
            $product->product_quantity=$request->product_quantity;
            $product->product_discount=$request->product_discount;
            $product->product_short_description=$request->product_short_description;
            $product->product_long_description=$request->product_long_description;
            $product->publication_status=$request->publication_status;
            $product->save();
        }
        return redirect('/manage-product')->with('message', 'Product Info Updated');
    }
    public function deleteProduct($id){
        $productById= Product::find($id);
        $productById->delete();
        unlink($productById->product_image);
        return redirect('/manage-product')->with('message', 'Product Info Deleted');
    }
}
