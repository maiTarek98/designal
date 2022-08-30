@extends('admin.index')
@push('custom-css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@lang('main.setting')</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 card">
          <div class="card-body">
           @if(count($errors))
           <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form method="post" action="{{route('updateSetting')}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
              <li class="nav-item active">
                <a class="nav-link" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="false">@lang('main.main setting')</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">@lang('main.social links')</a>
              </li>
              
            </ul>
            <div class="tab-content" id="custom-content-above-tabContent">
              <div class="tab-pane fade active show" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                <div class="form-group col-sm-10">
                  <label for="site_name">@lang('main.site name')</label>
                  <input type="text" name="site_name" value="{{$settings->site_name}}" class="form-control" id="site_name" placeholder="Enter Site name">
                </div>

                <div class="form-group col-sm-10">
                  <label for="email">@lang('main.email')</label>
                  <input type="email" name="email" value="{{$settings->email}}" class="form-control" id="email" placeholder="@lang('main.email')">
                </div>
                <div class="form-group col-sm-10">
                  <label for="phone">@lang('main.phone')</label>
                  <input type="text" name="phone" value="{{$settings->phone}}" class="form-control" id="phone" placeholder="@lang('main.phone')">
                </div>
                <div class="form-group col-sm-10">
                  <label for="address">@lang('main.address')</label>
                  <input type="text" name="address" value="{{$settings->address}}" class="form-control" id="address" placeholder="Enter address">
                </div>
                <div class="form-group col-sm-10">
                  <label for="about_us">@lang('main.about_us')</label>
                  <textarea type="text" name="about_us" class="form-control about_us" id="about_us" placeholder="Enter about_us">{{$settings->about_us}} </textarea> 
                </div>
                <div class="form-group col-sm-10">
                  <label for="logo">@lang('main.logo')</label>
                  <input type="file" name="logo"  class="form-control" id="logo" >
                  <img src="{{url('/storage/'.$settings->logo)}}" width="10%">
                </div>
              </div>
              <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                <div class="form-group col-sm-10">
                  <label for="twitter_link">@lang('main.twitter_link')</label>
                  <input type="url" name="twitter_link" value="{{$settings->twitter_link}}" class="form-control" id="twitter_link" placeholder="@lang('main.twitter_link')">
                </div>
                <div class="form-group col-sm-10">
                  <label for="google_link">@lang('main.google_link')</label>
                  <input type="url" name="google_link" value="{{$settings->google_link}}" class="form-control" id="google_link" placeholder="@lang('main.google_link')">
                </div>
                <div class="form-group col-sm-10">
                  <label for="facebook_link">@lang('main.facebook_link')</label>
                  <input type="url" name="facebook_link" value="{{$settings->facebook_link}}" class="form-control" id="facebook_link" placeholder="@lang('main.facebook_link')">
                </div>
                <div class="form-group col-sm-10">
                  <label for="instagram_link">@lang('main.instagram_link')</label>
                  <input type="url" name="instagram_link" value="{{$settings->instagram_link}}" class="form-control" id="instagram_link" placeholder="@lang('main.instagram_link')">
                </div>
             </div>

           </div>
           <button type="submit" class="btn btn-success">@lang('main.save')</button>
         </form>
       </div>
     </div>
   </div>
 </div>
</section>
</div>
@endsection
@push('custom-js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

  $('.about_us').summernote({
 placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]  });
});
</script>
@endpush