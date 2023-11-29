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
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>S.L</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($cat_info as $key => $info)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$info->category_name}}</td>
                                <td>{{$info->category_slug}}</td>
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