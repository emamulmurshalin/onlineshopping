@extends('admin.master')

@section('content')
    <hr>
    <h1>{{ Session::get('message') }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="well">
                    <form name="editCategoryForm" action="{{ '/update-category' }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <label class="control-label col-sm-3">Category Name</label>
                                    <div class="col-sm-9">
                                        <input value="{{ $categoryInfo->category_name }}" type="text" class="form-control" name="category_name"/>
                                        <input value="{{ $categoryInfo->id }}" type="hidden" class="form-control" name="category_id"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <label class="col-sm-3">Category Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="category_description">{{ $categoryInfo->category_description }}</textarea>
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
                                    <div class="col-sm-3">

                                    </div>
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <input type="submit" class="btn btn-success btn-block" name="btn" value="Update Category Info"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.forms['editCategoryForm'].elements['publication_status'].value= '{{ $categoryInfo->publication_status }}';
    </script>
@endsection