@extends('admin.master')

@section('content')
    <hr>
    @if($message= Session::get('message'))
    <h1>{{ $message }}</h1>
    @endif
    <div class="container-fluid" style="border-radius: 20px; background: rgba(1,0,0,0.5); color: white;">
        <hr>
        <div class="row">

            <div class="col-sm-12">
                <div class="well">
                    <form action="{{ '/new-product' }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <label class="col-sm-3">Category Name</label>
                                    <div class="col-sm-9">
                                        <select name="category_id" class="form-control">
                                            <option>-- Select Category Name--</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <label class="col-sm-3">Brand Name</label>
                                    <div class="col-sm-9">
                                        <select name="brand_id" class="form-control">
                                            <option>-- Select Brand Name--</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <label class="control-label col-sm-3">Product Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="product_name" required/>
                                        <span style="color: red;">{{ $errors->has('product_name') ? $errors->first('product_name') : '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <label class="control-label col-sm-3">Product Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="product_code" required/>
                                        <span style="color: red;">{{ $errors->has('product_code') ? $errors->first('product_code') : '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <label class="control-label col-sm-3">Regular Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="regular_price" required/>
                                        <span style="color: red;">{{ $errors->has('regular_price') ? $errors->first('regular_price') : '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <label class="control-label col-sm-3">Selling Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="selling_price" required/>
                                        <span style="color: red;">{{ $errors->has('selling_price') ? $errors->first('selling_price') : '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <label class="control-label col-sm-3">Product Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="product_quantity" required/>
                                        <span style="color: red;">{{ $errors->has('product_quantity') ? $errors->first('product_quantity') : '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <label class="control-label col-sm-3">Product Discount</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="product_discount" required/>
                                        <span style="color: red;">{{ $errors->has('product_discount') ? $errors->first('product_discount') : '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <label class="col-sm-3">Product Short Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="5" name="product_short_description" required></textarea>
                                        <span style="color: red;">{{ $errors->has('product_short_description') ? $errors->first('product_short_description') : '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <label class="col-sm-3">Product Long Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="15" name="product_long_description" required></textarea>
                                        <span style="color: red;">{{ $errors->has('product_long_description') ? $errors->first('product_long_description') : '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <label class="col-sm-3">Publication Status</label>
                                    <div class="col-sm-9">
                                        <select name="publication_status" class="form-control">
                                            <option>-- Select Publish Status--</option>
                                            <option value="1">Published</option>
                                            <option value="0">Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <label class="control-label col-sm-3">Product Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="product_image" accept="image/*" required/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-3">

                                    </div>
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <input type="submit" class="btn btn-success btn-block" name="btn" value="Save Product Info"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection