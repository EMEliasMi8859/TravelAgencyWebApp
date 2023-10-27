@extends('layouts.master_home')
<main id="main">
 
    <!-- ======= About Us Section ======= -->
    @section('home_content')
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
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
        </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">
        
          <div class="col-lg-8 entries">
            @foreach($blogPosts as $blogPost)
            <article class="entry">

              
              <div class="entry-img">
                <img src="{{ asset($blogPost->blog_pic) }}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">{{$blogPost->title}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">{{$blogPost->user->name}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{$blogPost->created_at->format('d-m-y')}}</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                
                  {{-- {!!$blogPost->content!!} --}}
               
                <div class="read-more">
                  <a href="{{ route('blog.detail', $blogPost->id) }}">Read More</a>
                </div>
              </div>

           
            </article>
            @endforeach
            
            <!-- End blog entry -->

            
            <div class="blog-pagination">
              <ul class="justify-content-center">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
              </ul>
            </div>

          </div><!-- End blog entries list -->

          @include('fontend.blogSidebar')
         <!-- End blog sidebar -->

        </div>

      </div>
 

  </main>
</section><!-- End Blog Section -->

  @endsection