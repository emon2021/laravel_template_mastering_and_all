@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                        <form action="{{route('post.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Select Category</label>
                                    <select class="form-control @error('category') is-invalid @enderror" name="category" id="">
                                        <option>Select Category</option>
                                        @foreach ($category as $info)
                                            <option  value="{{$info->category_id}}" @if($posts->cat_id == $info->category_id) selected @endif>
                                                {{$info->category_name}}
                                            </option>
                                        @endforeach
                                        
                                    </select>
                                    @error('category')
                                    <font color='#DC3545'>{{$message}}</font>
                                    @enderror
                                </div>
                                <input type="hidden" value="{{$posts->id}}" name="hidden_id">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" value="{{$posts->title}}" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"
                                        placeholder="Enter Post Title">
                                    @error('title')
                                        <font color='#DC3545'>{{$message}}</font>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description"  @error('description') is-invalid @enderror id="summernote">
                                        {{$posts->description}}
                                    </textarea>
                                    @error('description')
                                    <font color='#DC3545'>{{$message}}</font>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <div class="">
                                        <div class="">
                                            <input type="file" name="old_image" value="{{$posts->image}}" class=" form-control @error('image') is-invalid @enderror" id="exampleInputFile">
                                           
                                            @error('image')
                                            <font color='#DC3545'>{{$message}}</font>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <input type="text" value="{{$posts->tags}}"  class="form-control @error('tags') is-invalid @enderror" name="tags" id="">
                                    @error('tags')
                                    <font color='#DC3545'>{{$message}}</font>
                                @enderror
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" @if($posts->status =='1') checked @endif value="1" name="status" class="form-check-input @error('status') is-invalid @enderror" id="exampleCheck1">
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
