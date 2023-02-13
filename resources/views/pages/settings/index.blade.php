@extends('layouts.master')

@section('title')
    Settings
@stop

@section('css')
@endsection

@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
        Settings
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li class="active">Settings</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Settings</h3>
          </div>
            <div class="box-body">
                    <form action="{{ route('settings.update','test') }}" method="post" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                     @foreach ($settings as $setting)
                        {{-- 1 --}}
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Company Title <span class="text-danger">*</span></label>
                                 <input type="hidden" value="{{ $setting->id }}" name="id">
                                 <input type="text" name="title" value="{{ $setting->title }}" required class="form-control" placeholder="Name of Company">
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                        </div>
                        {{-- End 1 --}}

                        {{-- 1 --}}
                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                  <label>Company Name <span class="text-danger">*</span></label>
                                  <input name="name" value="{{ $setting->name }}" required type="text" class="form-control" placeholder="Name of Company">
                                  <span class="help-block with-errors"></span>
                               </div>
                             </div>
                        </div>
                        {{-- End 1 --}}

                        {{-- 5 --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Company Email <span class="text-danger">*</span></label>
                                    <input type="text" name="email" value="{{ $setting->email }}" required class="form-control" placeholder="Email of Company">
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        {{-- End 5 --}}

                        {{-- 4 --}}
                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                  <label>Company Phone <span class="text-danger">*</span></label>
                                  <input type="text" name="phone" value="{{ $setting->phone }}" required class="form-control" placeholder="Phone of Company">
                                  <span class="help-block with-errors"></span>
                               </div>
                             </div>
                         </div>
                        {{-- End 4 --}}

                        {{-- 6 --}}
                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                  <label>Company Address <span class="text-danger">*</span></label>
                                  <input type="text" name="address" value="{{ $setting->address }}" required class="form-control" placeholder="Address of Company">
                                  <span class="help-block with-errors"></span>
                               </div>
                             </div>
                         </div>
                        {{-- End 6 --}}

                        <div class="row">
                            <div class="col-md-6">
                              <label>Images <span class="text-danger">*</span></label>
                              <input type="file" accept="image/*" name="settings_images"><br>
                              <img src="{{ URL::asset('attachments/settings_images/'.$setting->settings_images) }}" type="image/*" height="100px" width="100px"><br>
                            </div>
                        </div>

                        <br><br>
                        <div class="form-group" style="text-align:center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Saving Data</button>
                        </div>
                     @endforeach
                    </form>
            </div>
        </div>
   </section>
</div>

@endsection

@section('js')
@endsection
