@extends('admin.master')

@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @if($message= Session::get('message'))
                    <h6 class="m-0 font-weight-bold text-primary">{{ $message }}</h6>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Brand Name</th>
                            <th>Product Code</th>
                            <th>Selling Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>SL No</th>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Brand Name</th>
                            <th>Product Code</th>
                            <th>Selling Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->category_name }}</td>
                                <td>{{ $product->brand_name }}</td>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td><img style="height: 100px; width: 100px;" src="{{ asset($product->product_image) }}"></td>
                                <td>{{ $product->publication_status==1 ? 'Published':'Unpublished' }}</td>
                                <td class="center">
                                    <a href="{{ '/view-product/'.$product->id }}" class="btn btn-dark btn-xs" title="View Product">
                                        <span><i class="far fa-eye"></i></span>
                                    </a>
                                    @if($product->publication_status==1)
                                        <a href="{{ '/unpublished-product/'.$product->id }}" class="btn btn-success btn-xs" title="Unpublished Product">
                                            <span><i class="fas fa-arrow-up"></i></span>
                                        </a>
                                    @else
                                        <a href="{{ '/published-product/'.$product->id }}" class="btn btn-warning btn-xs" title="Published Product">
                                            <span><i class="fas fa-arrow-down"></i></span>
                                        </a>
                                    @endif

                                    <a href="{{ '/edit-product/'.$product->id }}" class="btn btn-dark btn-xs" title="Edit Product">
                                        <span><i class="fas fa-edit"></i></span>
                                    </a>
                                    <a href="{{ '/delete-product/'.$product->id }}" class="btn btn-danger btn-xs" title="Delete Product">
                                        <span><i class="far fa-trash-alt"></i></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection