@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@lang('main.edit client_review') {{$client_review->name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('client_reviews.index')}}" class="btn btn-primary">@lang('main.show all client_reviews') </a></li>
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
            <form method="post" action="{{route('client_reviews.update', $client_review->id)}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row">
              <div class="form-group col-sm-6">
                <label for="name"> @lang('main.name')</label>
                <input type="text" name="name" value="{{$client_review->name}}" class="form-control" id="name" placeholder="@lang('main.enter name')">
              </div>
              <div class="form-group col-sm-6">
                <label for="review"> @lang('main.review')</label>
                <input type="text" name="review" value="{{$client_review->review}}" class="form-control" id="review" placeholder="@lang('main.enter review')">
              </div>
               <div class="form-group col-sm-6">
                <label for="user_image">@lang('main.user_image')</label>
                <input type="file" name="user_image" class="form-control" id="user_image">
                <img src="{{$client_review->getFirstMediaUrl('user_image', 'thumb')}}" width="30%">
              </div>

              <div class="form-group col-sm-6">
                <label for="no_star">@lang('main.no_star')</label>
                <select name="no_star" class="form-control">
                  <option value="1" @if($client_review->no_star == 1) selected @endif>1</option>
                  <option value="2" @if($client_review->no_star == 2) selected @endif>2</option>
                  <option value="3" @if($client_review->no_star == 3) selected @endif>3</option>
                  <option value="4" @if($client_review->no_star == 4) selected @endif>4</option>
                  <option value="5" @if($client_review->no_star == 5) selected @endif>5</option>
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