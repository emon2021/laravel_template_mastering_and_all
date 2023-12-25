@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Edit Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @foreach($category as $row)
                        <form action="{{route('categories.update',$row->category_id)}}" method="post"> 
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="addCategory">Category Name</label>
                              <input type="text" name="category_name" value="{{$row->category_name}}" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Category Name">
                              @error('category_name')
                                <strong>
                                    <font color='#DC3545'>{{$message}}</font>
                                </strong>
                              @enderror
                            </div>
                          </div>
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </form>
                        @endforeach
                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection