@extends('layouts.master_home')
<!-- ======= About Us Section ======= -->
@section('home_content')
    <!-- ======= Breadcrumbs ======= -->
    {{-- <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Portfolio Details</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                    <li>Portfolio Details</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs --> --}}

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details mt-5">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-8">
                   
                        <div class=" align-items-center">

                            <div class="">
                                <img style="width:100%" src="{{asset($post->post_pic)}}" alt="">
                            </div>

                         

                        </div>
                      
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>{{$post->title}}</h3>
                        <ul>
                            <li><strong>Category</strong>: {{$post->category->category_name}}</li>
                            <li><strong>Created By</strong>: {{$post->user->name}}</li>
                            <li><strong>Created date</strong>: {{$post->created_at->diffForHumans()}}</li>
                            <li><strong>Project URL</strong>: <a href="/">www.hd.com</a></li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>{{$post->title}}</h2>
                        <p>
                            {{$post->content}}
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->
@endsection
