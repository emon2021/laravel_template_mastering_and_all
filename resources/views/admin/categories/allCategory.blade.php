@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container" style="float: right;width:1120px;">
            <div class="row">
                <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Categories Table</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    @if(session()->has('delete_success'))
                      <div class="alert alert-success">{{session()->get('delete_success')}}</div>
                    @endif
                    @if(session()->has('updated'))
                      <div class="alert alert-success">{{session()->get('updated')}}</div>
                    @endif
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>S.L</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($cat_info as $key => $info)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$info->category_name}}</td>
                                <td>{{$info->category_slug}}</td>
                                <td>
                                  <a href="{{route('categories.edit',$info->category_id)}}" class="btn btn-primary " style="float:left">Edit</a>
                                  <form action="{{route('categories.destroy')}}" method="post" >
                                    @csrf
                                    <input type="hidden" name="cat_id" value="{{$info->category_id}}">
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                      
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection