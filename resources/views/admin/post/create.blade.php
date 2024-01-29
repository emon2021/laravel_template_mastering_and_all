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
                        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Select Category</label>
                                    <select class="form-control @error('category') is-invalid @enderror" name="category" id="">
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
                                    @error('category')
                                    <font color='#DC3545'>{{$message}}</font>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"
                                        placeholder="Enter Post Title">
                                    @error('title')
                                        <font color='#DC3545'>{{$message}}</font>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" @error('description') is-invalid @enderror id="summernote">
                                       
                                    </textarea>
                                    @error('description')
                                    <font color='#DC3545'>{{$message}}</font>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class=" form-control @error('image') is-invalid @enderror" id="exampleInputFile">
                                           
                                            @error('image')
                                            <font color='#DC3545'>{{$message}}</font>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="post_date">Post Date</label>
                                    <input type="text"  class="form-control @error('post_date') is-invalid @enderror" id="datepicker" name="post_date" id="">
                                    @error('post_date')
                                    <font color='#DC3545'>{{$message}}</font>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="post_date">Tags</label>
                                    <input type="text"  class="form-control @error('tags') is-invalid @enderror" id="datepicker" name="tags" id="">
                                    @error('tags')
                                    <font color='#DC3545'>{{$message}}</font>
                                @enderror
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" value="1" name="status" class="form-check-input @error('status') is-invalid @enderror" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Publish</label>
                                    @error('status')
                                    <font color='#DC3545'>{{$message}}</font>
                                @enderror
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
