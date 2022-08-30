@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@lang('main.show client_review') {{$client_review->name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('client_reviews.index')}}" class="btn btn-primary">@lang('main.show all client_reviews')</a></li>
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
                <label for="name"> @lang('main.name')</label>
                <input type="text" name="name" value="{{$client_review->name}}" class="form-control" id="name" readonly>
              </div>
              <div class="form-group col-sm-10">
                <label for="review"> @lang('main.review')</label>
                <input type="text" name="review" value="{{$client_review->review}}" class="form-control" id="review" readonly>
              </div>
              <div class="form-group col-sm-10">
                <label for="user_image">@lang('main.user_image')</label>
                <img src="{{$client_review->getFirstMediaUrl('user_image', 'thumb')}}" width="30%">
              </div>
              <div class="form-group col-sm-10">
                <label for="no_star">@lang('main.no_star')</label>
                <select name="no_star" class="form-control">
                  <option value="1" @if($client_review->no_star == 1) selected @endif>1</option>
                  <option value="2" @if($client_review->no_star == 2) selected @endif>2</option>
                  <option value="3" @if($client_review->no_star == 3) selected @endif>3</option>
                  <option value="4" @if($client_review->no_star == 4) selected @endif>4</option>
                  <option value="5" @if($client_review->no_star == 5) selected @endif>5</option>
                </select>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection