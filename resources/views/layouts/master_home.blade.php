<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HighDreams</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/main.css') }}">
  <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  
  <!-- Vendor CSS Files -->
  <link href="{{asset('frontend/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/aos/aos.css" rel="stylesheet')}}">
  <link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Company - v4.7.0
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>

  :root {
    --gradient: linear-gradient(to left top, #DD2476 10%, #FF512F 90%) !important;
  }
  
  main.dash {
    background: #111 !important;
  }
  
  .card {
    background: #222;
    border: 1px solid #dd2476;
    color: rgba(250, 250, 250, 0.8);
    margin-bottom: 2rem;
  }
  .table.hightable td{
    padding: 0;
    margin: 0;
  }
  .table {
      border-collapse: collapse;
    }

    .table td,
    .table th {
      border: none;
    }
  .btn {
    border: 1px solid;
    border-image-slice: 1;
    background: var(--gradient) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
    border-image-source:  var(--gradient) !important; 
    text-decoration: none;
    transition: all .4s ease;
  }
  
  .btn:hover, .btn:focus {
        background: var(--gradient) !important;
    -webkit-background-clip: none !important;
    -webkit-text-fill-color: #fff !important;
    border: 1px solid #fff !important; 
    box-shadow: #222 1px 0 10px;
    text-decoration: underline;
  }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts.body.header')
 <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  
  <!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    @yield('home_content')
   <!-- End Our Clients Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layouts.body.footer')

  <!-- end footer-->

  
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('admin/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <script src="{{ asset('admin/js/plugins/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- Page specific javascripts-->
    <script>
        $('.data-table').DataTable();
    </script>
     <script src="https://cdn.tiny.cloud/1/kf6s23ij5cgl91fvku4sp024gntblx112kw4aa2r7bp96kie/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <!-- Vendor JS Files -->
  <script src="{{asset('frontend/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('frontend/assets/js/main.js')}}"></script>

</body>

</html>