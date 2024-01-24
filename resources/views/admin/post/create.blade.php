@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Select Category</label>
                                    <select class="form-control" name="category" id="">
                                        <option>Select Category</option>
                                        @foreach ($category as $info)
                                            <option value="{{$info->category_id}}">
                                                {{$info->category_name}}
                                                {{-- <select class="form-control" name="" id="">
                                                    @foreach($sub_cat as $row)
                                                        @if($info->category_id == $row->cat_id)
                                                            <option value="{{$row->id}}">{{$row->subcategory_name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select> --}}
                                            </option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Post Title">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="summernote">
                                       
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="post_date">Post Date</label>
                                    <input type="text"  class="form-control" id="datepicker" name="post_date" id="">
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="publish" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Published</label>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
