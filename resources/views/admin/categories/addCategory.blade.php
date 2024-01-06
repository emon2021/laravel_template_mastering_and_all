@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Add Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('categories.store')}}" method="post"> 
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="addCategory">Add Category</label>
                              <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Category Name">
                              @error('category_name')
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