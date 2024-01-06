@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Add Sub Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('subCategories.store')}}" method="post"> 
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="selectCategory">Select Category</label>
                              <select name="cat_name" id="" class="form-control @error('cat_name') is-invalid @enderror">
                                <option>Select Category</option>
                                @foreach($cats_all as $row)
                                    <option value="{{$row->category_id}}">{{$row->category_name}}</option>
                                @endforeach
                              </select>
                              @error('cat_name')
                                <strong>
                                    <font color='#DC3545'>{{$message}}</font>
                                </strong>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="addSubCategory">Add Sub Category</label>
                              <input type="text" name="subcategory_name" class="form-control @error('subcategory_name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Sub Category Name">
                              @error('subcategory_name')
                                <strong>
                                    <font color='#DC3545'>{{$message}}</font>
                                </strong>
                              @enderror
                            </div>
                          </div>
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                          </div>
                        </form>
                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection