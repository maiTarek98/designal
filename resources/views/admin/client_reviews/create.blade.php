@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@lang('main.add new client_review')</h1>
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
            <form method="post" action="{{route('client_reviews.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <div class="form-group col-sm-6">
                <label for="name"> @lang('main.name')</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="@lang('main.enter name')">
              </div>
              <div class="form-group col-sm-6">
                <label for="review"> @lang('main.review')</label>
                <input type="text" name="review" value="{{old('review')}}" class="form-control" id="review" placeholder="@lang('main.enter review')">
              </div>
              <div class="form-group col-sm-6">
                <label for="user_image">@lang('main.user_image')</label>
                <input type="file" name="user_image" class="form-control" id="user_image">
              </div>
              <div class="form-group col-sm-6">
                <label for="status">@lang('main.status')</label>
                <select name="no_star" class="form-control">
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                  <option value="3" >3</option>
                  <option value="4" >4</option>
                  <option value="5" >5</option>
                </select>
              </div>
              

              <div class="form-group col-sm-10">
                <button type="submit" class="btn btn-success">@lang('main.create')</button>
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