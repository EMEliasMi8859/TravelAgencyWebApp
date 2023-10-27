<!DOCTYPE html>
<html lang="en">

<head>
    <title>HighDreams</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    
    @include('layouts.body.header')
    
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        
        <a class="app-sidebar__toggle bg-dark d-flex justify-content-end pt-3" href="#" data-toggle="sidebar"
        aria-label="Hide Sidebar" ></a>
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
                src="{{ Auth::user()->profile_photo_url }}" height="60" alt="User Image">
            <div>
                <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
                {{-- <p class="app-sidebar__user-designation">Frontend Developer</p> --}}
            </div>
        </div>
        <ul class="app-menu">
            <li><a class="{{ Route::is('dashboard') ? 'app-menu__item active' : 'app-menu__item'}}" href="{{ route('dashboard') }}"><i
                        class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
            </li>
            <li><a class="{{ Route::is('all.post') ? 'app-menu__item active' : 'app-menu__item'}}" href="{{ route('all.post') }}"><i
                        class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Posts</span></a>
            </li>
            <li><a class="{{ Route::is('all.category') ? 'app-menu__item active' : 'app-menu__item'}}" href="{{ route('all.category') }}"><i
                        class="app-menu__icon fa fa-cubes"></i><span class="app-menu__label">Categories</span></a>
            </li>
        
            <li><a class="{{ Route::is('registrations.umrah.get') ? 'app-menu__item active' : 'app-menu__item'}}" href="{{ route('registrations.umrah.get') }}">
            <i class="app-menu__icon fa fa-save"></i><span class="app-menu__label">Umrah Registration</span></a></li>
            <li><a class="{{ Route::is('registrations.visa.get') ? 'app-menu__item active' : 'app-menu__item'}}" href="{{ route('registrations.visa.get') }}">
            <i class="app-menu__icon fa fa-save"></i><span class="app-menu__label">Visa Registration</span></a></li>
        </ul>
    </aside>

    @section('main')


    @show
    

    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('admin/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('admin/js/plugins/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- Page specific javascripts-->
    <script>
        $('.data-table').DataTable();
    </script>
     <script src="https://cdn.tiny.cloud/1/kf6s23ij5cgl91fvku4sp024gntblx112kw4aa2r7bp96kie/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    @section('pageJs')
    @show
    @section('pageJsDate')
    @show

    
  <script src="{{asset('frontend/assets/js/main.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>

</body>

</html>
