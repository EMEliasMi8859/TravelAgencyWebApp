



<div class="col-lg-4">

    <div class="sidebar">

      <h3 class="sidebar-title">Search</h3>
      <div class="sidebar-item search-form">
        <form action="">
          <input type="text">
          <button type="submit"><i class="bi bi-search"></i></button>
        </form>
      </div><!-- End sidebar search formn-->

      <h3 class="sidebar-title">Categories</h3>
      <div class="sidebar-item categories">
        <ul>
          @foreach($blogCategories as $bCategory)
          <script>

          </script>
          @php
             $postCount=App\Models\Blog::where('b_category_id',$bCategory->id)->count('id');
          @endphp
          <li><a href="#">{{$bCategory->category_name}} <span>({{$postCount}})</span></a></li>
          @endforeach
        
        </ul>
      </div><!-- End sidebar categories-->

      <h3 class="sidebar-title">Recent Posts</h3>
      <div class="sidebar-item recent-posts">
        @foreach($blogPosts as $blogPost)
        <div class="post-item clearfix">
          <img src="{{ asset($blogPost->blog_pic) }}" alt="">
          <h4><a href="{{route('blog.detail', $blogPost->id)}}">{{$blogPost->title}}</a></h4>
          <time datetime="2020-01-01">{{$blogPost->created_at}}</time>
        </div>
        @endforeach


      </div><!-- End sidebar recent posts-->

      <h3 class="sidebar-title">Tags</h3>
      <div class="sidebar-item tags">
        <ul>
          <li><a href="#">App</a></li>
          <li><a href="#">IT</a></li>
          <li><a href="#">Business</a></li>
          <li><a href="#">Mac</a></li>
          <li><a href="#">Design</a></li>
          <li><a href="#">Office</a></li>
          <li><a href="#">Creative</a></li>
          <li><a href="#">Studio</a></li>
          <li><a href="#">Smart</a></li>
          <li><a href="#">Tips</a></li>
          <li><a href="#">Marketing</a></li>
        </ul>
      </div><!-- End sidebar tags-->

    </div><!-- End sidebar -->

  </div>