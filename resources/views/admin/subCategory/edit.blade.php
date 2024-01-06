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
                      @foreach($sub_cat as $data)
                        <form action="{{route('subCategories.update',$data->id)}}" method="post"> 
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="addCategory">Category Name</label>
                              <select name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="">
                                <option value="">Select Sub Category</option>
                                @foreach($category as $row)
                                    <option value="{{$row->category_id}}" @if($data->cat_id === $row->category_id) selected @endif >{{$row->category_name}}</option>
                                @endforeach
                              </select>
                              @error('category_name')
                                <strong>
                                    <font color='#DC3545'>{{$message}}</font>
                                </strong>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="addCategory">Sub Category Name</label>
                              <input type="text" name="subcategory_name" value="{{$data->subcategory_name}}" class="form-control @error('subcategory_name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Category Name">
                              @error('subcategory_name')
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