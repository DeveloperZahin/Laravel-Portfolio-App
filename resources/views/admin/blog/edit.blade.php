@extends('admin.admin_master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style type="text/css">
  .bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: #b70000;
    font-weight: 700px;
  }
</style>

<div class="page-content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title">Edit Blog Page</h4>

            <form method="post" action="{{ route('blog.update', $blog->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                <div class="col-sm-10">
                  <select name="blog_category_id" class="form-select" aria-label="Default select example">
                    <option value="{{ $blog->blog_category_id }}" selected>{{ $blog->category->blog_category }}</option>
                    @foreach($categories as $cat)
                      @if ($cat->id != $blog->blog_category_id)
                        <option value="{{ $cat->id }}">{{ $cat->blog_category }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input name="title" value="{{ old('title', $blog->title) }}" class="form-control" type="text" id="example-text-input" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags</label>
                <div class="col-sm-10">
                  <input name="tags" value="{{ old('tags', $blog->tags) }}" class="form-control-lg" type="text" data-role="tagsinput">
                </div>
              </div>

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                <div class="col-sm-10">
                  <input name="short_description" value="{{ $blog->short_description }}" class="form-control" type="text" id="example-text-input" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description</label>
                <div class="col-sm-10">
                  <textarea id="elm1" name="description">{{ old('description', $blog->description) }}</textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image</label>
                <div class="col-sm-10">
                  <div class="custom-file">
                    <input name="image" type="file" class="custom-file-input" id="image">
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <img id="showImage" class="rounded avatar-lg" src="{{ asset('upload/blog/' . $blog->image) }}" alt="Image">
                </div>
              </div>

              <div class="row mb-3" style="text-align: right;">
                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Blog Data">
                </div>
              </div>

            </form>
          </div>
        </div>
      </div> <!-- end col -->
    </div>
  </div>
</div>


<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection
