@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@lang('main.show portfolio') {{$portfolio->url_link}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('portfolios.index')}}" class="btn btn-primary">@lang('main.show all portfolios')</a></li>
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
                <label for="url_link"> @lang('main.url_link')</label>
                <input type="text" name="url_link" value="{{$portfolio->url_link}}" class="form-control" id="url_link" readonly>
              </div>
              <div class="form-group col-sm-10">
                <label for="portfolio_image">@lang('main.portfolio_image')</label>
                <img src="{{$portfolio->getFirstMediaUrl('portfolio_image', 'thumb')}}" width="30%">
              </div>
              <div class="form-group col-sm-10">
                <label for="status">@lang('main.status')</label>
                <input type="text" name="status" class="form-control" value="{{$portfolio->status}}" readonly>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection