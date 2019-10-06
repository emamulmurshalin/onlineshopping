@extends('admin.master')

@section('content')
    <hr>
    <h1>{{ Session::get('message') }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="well">
                    <form name="editForm" action="{{ '/update-brand' }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-sm-3">Brand Name</label>
                            <div class="col-sm-9">
                                <input value="{{ $brand->brand_name }}" type="text" class="form-control" name="brand_name" required/>
                                <input value="{{ $brand->id }}" type="hidden" class="form-control" name="brand_id"/>
                                <span style="color: red;">{{ $errors->has('brand_name') ? $errors->first('brand_name') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3">Brand Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="brand_description" required>{{ $brand->brand_description }}</textarea>
                                <span style="color: red;">{{ $errors->has('brand_description') ? $errors->first('brand_description') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3">Publication Status</label>
                            <div class="col-sm-9">
                                <select name="publication_status" class="form-control">
                                    <option>-- Select Publish Status--</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <input type="submit" class="btn btn-success btn-block" name="btn" value="Update Brand Info"/>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.forms['editForm'].elements['publication_status'].value= '{{ $brand->publication_status }}';
    </script>
@endsection