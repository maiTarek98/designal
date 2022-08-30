<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{app(App\Models\GeneralSettings::class)->site_name}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="icon" type="image/x-icon" href="{{url('/storage/'.app(App\Models\GeneralSettings::class)->logo)}}">

  <link rel="stylesheet" href="{{url('/dashboard')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('/dashboard')}}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('/dashboard')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="{{url('/dashboard')}}/plugins/summernote/summernote-bs4.css">
  <!-- Bootstrap 4 RTL -->
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
  <!-- Custom style for RTL -->
    <link href="{{url('/dashboard/')}}/dist/css/toastr.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{url('/dashboard')}}/dist/css/custom.css">
      @stack('custom-css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap" rel="stylesheet">
<style type="text/css">
  body{
    font-family: 'Almarai', sans-serif;

  }
  [class*=sidebar-dark-] {
    background-color: #593FB7;
}
aside .nav-item a{
  color: #fff !important;
}
.sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
    background-color: #8563fd !important;
}
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
