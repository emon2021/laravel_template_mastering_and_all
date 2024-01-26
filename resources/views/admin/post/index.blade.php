@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container" style="float: right;width:1120px;">
            <div class="row">
                <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Post Table</h3>
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
                        <th>Sub Category Name</th>
                        <th>User Name</th>
                        <th>Tile</th>
                        <th>Description</th>
                        <th>Slug</th>
                        <th>Post Date</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($post as $key => $info)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$info->category->category_name}}</td>
                                <td>{{$info->subcategory->subcategory_name}}</td>
                                <td>{{$info->user->name}}</td>
                                <td>{{$info->title}}</td>
                                <td>{{$info->description}}</td>
                                <td>{{$info->slug}}</td>
                                <td>{{$info->post_date}}</td>
                                <td>
                                  <img width="100" src="{{url($info->image)}}" alt="">
                                </td>
                                <td>
                                  <a href="#" class="btn btn-primary " style="float:left">Edit</a>
                                  <form action="{{route('post.destroy')}}" method="post" >
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{$info->post_id}}">
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