@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@lang('main.edit user') {{$user->name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('users.index')}}" class="btn btn-primary">@lang('main.show all users') </a></li>
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
        <div class="col-lg-12 col-md-12">
         @if(count($errors))
         <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <div class="card">
          <div class="card-body">
            <form method="post" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group col-sm-10">
                <label for="name"> @lang('main.name')</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control" id="name" placeholder="@lang('main.enter name')">
              </div>

              <div class="form-group col-sm-10">
                <label for="email">@lang('main.email')</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control" id="email" placeholder="@lang('main.enter email')">
              </div>

              <div class="form-group col-sm-10">
                <label for="password">@lang('main.password')</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="@lang('main.enter password')">
              </div>

              <div class="form-group col-sm-10">
                <label for="birthdate">@lang('main.birthdate')</label>
                <input type="date" name="birthdate" value="{{$user->birthdate}}" class="form-control" id="birthdate" placeholder="@lang('main.enter birthdate')">
              </div>

              <div class="form-group col-sm-10">
                <label for="type">@lang('main.type')</label>
                <select name="type" class="form-control">
                  <option value="user" {{ ($user->type == 'user') ? 'selected': ''}}>@lang('main.user')</option>
                  <option value="vendor" {{ ($user->type == 'vendor') ? 'selected': ''}}>@lang('main.vendor')</option>
                  <option value="shopper" {{ ($user->type == 'shopper') ? 'selected': ''}}>@lang('main.shopper')</option>
                </select>
              </div>
              <div class="form-group col-sm-10">
                <label for="gender">@lang('main.gender')</label>
                <select name="gender" class="form-control">
                  <option value="male" {{ ($user->gender == 'male') ? 'selected': ''}}>@lang('main.male')</option>
                  <option value="female" {{ ($user->gender == 'female') ? 'selected': ''}}>@lang('main.female')</option>
                </select>
              </div>
              <div class="form-group col-sm-10">
                <button type="submit" class="btn btn-success">@lang('main.save')</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection