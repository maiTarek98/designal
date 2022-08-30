@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@lang('main.show service') {{$service->title}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('services.index')}}" class="btn btn-primary">@lang('main.show all services')</a></li>
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
        <div class="card">
          <div class="card-body">
              <div class="form-group col-sm-10">
                <label for="title"> @lang('main.title')</label>
                <input type="text" name="title" value="{{$service->title}}" class="form-control" id="title" readonly>
              </div>
              <div class="form-group col-sm-10">
                <label for="description"> @lang('main.description')</label>
                <input type="text" name="description" value="{{$service->description}}" class="form-control" id="description" readonly>
              </div>
              <div class="form-group col-sm-10">
                <label for="service_image">@lang('main.service_image')</label>
                <img src="{{$service->getFirstMediaUrl('service_image', 'thumb')}}" width="30%">
              </div>
              <div class="form-group col-sm-10">
                <label for="status">@lang('main.status')</label>
                <input type="text" name="status" class="form-control" value="{{$service->status}}" readonly>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection