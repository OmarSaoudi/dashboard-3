@extends('layouts.master')

@section('title')
    Users
@stop

@section('css')

@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Users
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Users</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Users List <small>{{ $users->count() }}</small></h3>
            <br><br>
            <a class="btn btn-success" data-toggle="modal" data-target="#AddUser"><i class="fa fa-plus"></i> Add</a>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td><img src="{{ URL::asset('attachments/users_images/'.$user->users_images) }}" height="50px" width="60px"></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{ $user->id }}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#show{{ $user->id }}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $user->id }}"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <!-- Edit -->
               <div class="modal fade" id="edit{{ $user->id }}">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title">User Update</h4>
                     </div>
                    <div class="modal-body">
                     <form action="{{ route('users.update', 'test') }}" method="post" enctype="multipart/form-data">
                      {{ method_field('patch') }}
                      @csrf

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                          <div class="col-md-12">
                            <label>Images <span class="text-danger">*</span></label>
                            <input type="file" accept="image/*" name="users_images"><br>
                            <img src="{{ URL::asset('attachments/users_images/'.$user->users_images) }}" type="image/*" height="100px" width="100px"><br>
                          </div>
                      </div>

                      <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Save changes</button>
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      </div>
                     </form>
                    </div>
                   </div>
                 </div>
               </div>
              <!-- Edit End -->

              <!-- Show -->
               <div class="modal fade" id="show{{ $user->id }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">User Show</h4>
                    </div>
                   <div class="modal-body">

                     <div class="row">
                       <div class="col-md-12">
                         <div class="form-group">
                           <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                           <label>Name</label>
                           <input type="text" name="name" value="{{ $user->name }}" class="form-control" readonly>
                         </div>
                       </div>
                     </div>

                     <div class="row">
                       <div class="col-md-12">
                         <div class="form-group">
                           <label>Email</label>
                           <input type="email" name="email" value="{{ $user->email }}" class="form-control" readonly>
                         </div>
                       </div>
                     </div>

                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Image</label><br>
                              <img src="{{ URL::asset('attachments/users_images/'.$user->users_images) }}" height="100px" width="100px">
                           </div>
                        </div>
                     </div>

                     <div class="modal-footer">
                         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                     </div>
                    </form>
                   </div>
                  </div>
                </div>
               </div>
              <!-- Show End -->

              <!-- Delete -->
                <div class="modal fade" id="delete{{ $user->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Delete User</h4>
                        </div>
                       <div class="modal-body">
                        <form action="{{ route('users.destroy', 'test') }}" method="POST">
                            {{ method_field('Delete') }}
                            @csrf
                            <div class="modal-body">
                                <p>Are sure of the deleting process ?</p><br>
                                <input id="id" type="hidden" name="id" class="form-control" value="{{ $user->id }}">
                                <input type="hidden" name="users_images" value="{{ $user->users_images }}">
                                <input class="form-control" name="name" value="{{ $user->name }}" type="text" readonly>
                            </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-danger">Save changes</button>
                             <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                           </div>
                        </form>
                       </div>
                      </div>
                    </div>
                </div>
              <!-- Delete End -->
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Operation</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<!-- Add User -->
  <div class="modal fade" id="AddUser">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
              <h4 class="modal-title">Add User</h4>
        </div>
        <div class="modal-body">
          <form action="{{ route('users.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
              @csrf

              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" id="name" class="form-control" required>
                      <span class="help-block with-errors"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" id="email" class="form-control" required>
                      <span class="help-block with-errors"></span>
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" id="password" class="form-control" required>
                      <span class="help-block with-errors"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label>Password Confirmation</label>
                      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                      <span class="help-block with-errors"></span>
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <label>Images <span class="text-danger">*</span></label>
                  <input type="file" accept="image/*" name="users_images" onchange="preview('.tampil-logo', this.files[0])" required><br>
                  <div class="tampil-logo"></div>
                </div>
              </div>

              <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save changes</button>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- End Add User -->


@endsection




@section('scripts')

@endsection
