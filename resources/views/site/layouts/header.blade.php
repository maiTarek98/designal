<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{url('/storage/'.app(App\Models\GeneralSettings::class)->logo)}}" type="">

  <title> {{app(App\Models\GeneralSettings::class)->site_name}} </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{url('site')}}/css/bootstrap.css" />
    <link href="{{url('/dashboard/')}}/dist/css/toastr.css" rel="stylesheet" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="{{url('site')}}/css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{url('site')}}/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{url('site')}}/css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

