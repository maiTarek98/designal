@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@lang('main.edit portfolio') {{$portfolio->url_link}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('portfolios.index')}}" class="btn btn-primary">@lang('main.show all portfolios') </a></li>
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
            <form method="post" action="{{route('portfolios.update', $portfolio->id)}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row">
              <div class="form-group col-sm-6">
                <label for="url_link"> @lang('main.url_link')</label>
                <input type="url" name="url_link" value="{{$portfolio->url_link}}" class="form-control" id="url_link" placeholder="@lang('main.enter url_link')">
              </div>
               <div class="form-group col-sm-6">
                <label for="portfolio_image">@lang('main.portfolio_image')</label>
                <input type="file" name="portfolio_image" class="form-control" id="portfolio_image">
                <img src="{{$portfolio->getFirstMediaUrl('portfolio_image', 'thumb')}}" width="30%">
              </div>

              <div class="form-group col-sm-6">
                <label for="status">@lang('main.status')</label>
                <select name="status" id="status" class="form-control">
                  <option value="show" {{ ($portfolio->status == 'show') ? 'selected': ''}}>@lang('main.show')</option>
                  <option value="hide" {{ ($portfolio->status == 'hide') ? 'selected': ''}}>@lang('main.hide')</option>
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