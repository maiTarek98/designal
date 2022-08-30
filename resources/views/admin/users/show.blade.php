@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@lang('main.show user') {{$user->name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('users.index')}}" class="btn btn-primary">@lang('main.show all users')</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> @lang('main.user wishlists')</span>
                <span class="info-box-number">{{$user->wishlists->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> @lang('main.user likes')</span>
                <span class="info-box-number">{{$user->likes->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa fa-thumbs-down"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> @lang('main.user dislikes')</span>
                <span class="info-box-number">{{$user->dislikes->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-body">
              <div class="form-group col-sm-10">
                <label for="name"> @lang('main.name')</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control" id="name" readonly>
              </div>

              <div class="form-group col-sm-10">
                <label for="email">@lang('main.email')</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control" id="email" readonly>
              </div>
              
              <div class="form-group col-sm-10">
                <label for="birthdate">@lang('main.birthdate')</label>
                <input type="birthdate" name="birthdate" value="{{$user->birthdate}}" class="form-control" id="birthdate" readonly>
              </div>

              <div class="form-group col-sm-10">
                <label for="gender">@lang('main.gender')</label>
                <input type="gender" name="gender" value="{{trans('main.'.$user->gender)}}" class="form-control" id="gender" readonly>
              </div>

              <div class="form-group col-sm-10">
                <label for="type">@lang('main.type')</label>
                <input type="type" name="type" value="{{trans('main.'.$user->type)}}" class="form-control" id="type" readonly>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection