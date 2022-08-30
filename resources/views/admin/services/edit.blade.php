@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@lang('main.edit service') {{$service->title}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('services.index')}}" class="btn btn-primary">@lang('main.show all services') </a></li>
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
            <form method="post" action="{{route('services.update', $service->id)}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row">
              <div class="form-group col-sm-6">
                <label for="title"> @lang('main.title')</label>
                <input type="text" name="title" value="{{$service->title}}" class="form-control" id="title" placeholder="@lang('main.enter title')">
              </div>
              <div class="form-group col-sm-6">
                <label for="description"> @lang('main.description')</label>
                <input type="text" name="description" value="{{$service->description}}" class="form-control" id="description" placeholder="@lang('main.enter description')">
              </div>
               <div class="form-group col-sm-6">
                <label for="service_image">@lang('main.service_image')</label>
                <input type="file" name="service_image" class="form-control" id="service_image">
                <img src="{{$service->getFirstMediaUrl('service_image', 'thumb')}}" width="30%">
              </div>

              <div class="form-group col-sm-6">
                <label for="status">@lang('main.status')</label>
                <select name="status" id="status" class="form-control">
                  <option value="show" {{ ($service->status == 'show') ? 'selected': ''}}>@lang('main.show')</option>
                  <option value="hide" {{ ($service->status == 'hide') ? 'selected': ''}}>@lang('main.hide')</option>
                </select>
              </div>
              <div class="form-group col-sm-10">
                <button type="submit" class="btn btn-success">@lang('main.save')</button>
              </div>
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