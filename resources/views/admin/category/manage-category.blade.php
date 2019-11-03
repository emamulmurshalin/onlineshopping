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
                            <th>Category Id</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>SL No</th>
                            <th>Category Id</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->category_description }}</td>
                            <td>{{ $category->publication_status==1 ? 'Published':'Unpublished' }}</td>
                            <td class="center">
                                @if($category->publication_status==1)
                                    <a href="{{ '/unpublished-category/'.$category->id }}" class="btn btn-success btn-xs" title="Unpublished Category">
                                        <span><i class="fas fa-arrow-up"></i></span>
                                    </a>
                                @else
                                    <a href="{{ '/published-category/'.$category->id }}" class="btn btn-warning btn-xs" title="Published Category">
                                        <span><i class="fas fa-arrow-down"></i></span>
                                    </a>
                                @endif

                                <a href="{{ '/edit-category/'.$category->id }}" class="btn btn-dark btn-xs" title="Edit Category">
                                    <span><i class="fas fa-edit"></i></span>
                                </a>
                                <a href="{{ '/delete-category/'.$category->id }}" class="btn btn-danger btn-xs" title="Delete Category">
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