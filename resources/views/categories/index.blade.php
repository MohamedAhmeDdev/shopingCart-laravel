@extends('admin_layout.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All categories</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Num.</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($categories as $id=>$category)
                  <tr>
                    <td>{{$id+1}}</td>
                    <td>{{$category->category_name}}
                    </td>
                    <td>
                      <a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                      <form action="{{route('categories.destroy', $category->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                       <button type="submit" id="delete" class="btn btn-danger"><i class="nav-icon fas fa-trash"></i></button>
                      </form>
                    </td>
                  </tr>

                  @endforeach
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
