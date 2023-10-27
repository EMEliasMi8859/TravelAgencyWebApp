 @extends('layouts.master_home')
 <!-- ======= About Us Section ======= -->
 @section('home_content')
     @include('layouts.body.slider')
     
     <!-- ======= Our Clients Section ======= -->
     <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Clients</h2>
            </div>
        
                <div class="container mx-auto mt-4">
                    <div class="row">
                        @foreach ($customers as $customer)
                      <div class="col-md-4">
                        <div class="card w-100" style=";">
                          <img src="{{ asset($customer->Picture)}}" class="card-img-top" style="object-fit: cover; width: 100%; height: 150px;" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">ID: {{ $customer->id }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Customer details</h6>

                            <p class="card-text display-5">
                                <div class="row mx-1 my-2">
                                    <table class="table hightable text-light p-0 m-0">
                                      <tbody>
                                        <tr>
                                          <td class="col-4 m-0 p-0">Name</td>
                                          <td class="col-8">{{ $customer->Name }}</td>
                                        </tr>
                                        <tr>
                                          <td class="col-4">Last Name</td>
                                          <td class="col-8">{{ $customer->LastName }}</td>
                                        </tr>
                                        <tr>
                                          <td class="col-4">Father Name</td>
                                          <td class="col-8">{{ $customer->FatherName }}</td>
                                        </tr>
                                        <tr>
                                          <td class="col-4">Phone</td>
                                          <td class="col-8">{{ $customer->Phone }}</td>
                                        </tr>
                                        <tr>
                                          <td class="col-4">Email</td>
                                          <td class="col-8">{{ $customer->Email }}</td>
                                        </tr>
                                        <tr>
                                          <td class="col-4">Province</td>
                                          <td class="col-8">{{ $customer->Province }}</td>
                                        </tr>
                                        <tr>
                                          <td class="col-4">District</td>
                                          <td class="col-8">{{ $customer->District }}</td>
                                        </tr>
                                        <tr>
                                          <td class="col-4">Date</td>
                                          <td class="col-8">{{ $customer->Date }}</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                </div>
                            </p>

                            <div class="row">
                            <div class="col-6">Passport
                                <img src="{{ asset($customer->Passport)}}" class="square-img card-img-bottom" style="object-fit: cover; width: 100%; height: 100px;" alt="Additional Picture 1" onclick="openImageModal(this.src)">
                            </div>
                            <div class="col-6">
                                IDCard
                                <img src="{{ asset($customer->IDCard)}}" class="square-img card-img-bottom" style="object-fit: cover; width: 100%; height: 100px;" alt="Additional Picture 2" onclick="openImageModal(this.src)">
                            </div>
                            </div>
                            <div class="text-end">

                                
                            <a class="btn btn-primary mx-3 mt-4 px-4" href="{{ route("Cusotmer.Update", ['id' => $customer->id])}}" >Edit</a>
                            <!-- Button to trigger the modal -->
                            <button type="button" class="btn mx-3 mt-4 btn-danger px-3" data-toggle="modal" data-target="#confirmationModal">
                                Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-dark text-start" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmationModalLabel">Confirmation Dialog</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this record?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <a class="btn btn-danger" href="{{ route("Customer.Delete", ['id' => $customer->id])}}" id="confirmAction">Confirm</a>
                                            {{-- <button type="button" class="btn btn-primary" id="confirmAction">Yes</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    @endforeach
                    </div>
                  </div>
                  
            </div>
            

        </div>
    </section>
     <section id="about-us" class="about-us">
         <div class="container" data-aos="fade-up">

             <div class="row content">
                 <div class="col-lg-6" data-aos="fade-right">
                     <h2 class=""><span class="half_name"> High Dream </span> Travel & Tourist Agency </h2>
                     <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee trave</h3>
                 </div>
                 <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                     <p>
                         Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                         voluptate
                         velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                         sunt in
                         culpa qui officia deserunt mollit anim id est laborum
                     </p>
                     <ul>
                         <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>
                         <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit
                         </li>
                         <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                             Duis aute irure dolor in reprehenderit in</li>
                     </ul>
                     <p class="fst-italic">
                         Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                         et dolore
                         magna aliqua.
                     </p>
                 </div>
             </div>

         </div>
     </section><!-- End About Us Section -->

     <!-- ======= Services Section ======= -->

     <section id="services" class="services section-bg">

         <div class="container" data-aos="fade-up">



             <div class="row">
                 @foreach ($categories as $category)
                 


                     <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                         <div class="icon-box iconbox-teal">
                             <div class="icon">
                                 <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                     <path stroke="none" stroke-width="0" fill="#f5f5f5"
                                         d="M300,566.797414625762C385.7384707136149,576.1784315230908,478.7894351017131,552.8928747891023,531.9192734346935,484.94944893311C584.6109503024035,417.5663521118492,582.489472248146,322.67544863468447,553.9536738515405,242.03673114598146C529.1557734026468,171.96086150256528,465.24506316201064,127.66468636344209,395.9583748389544,100.7403814666027C334.2173773831606,76.7482773500951,269.4350130405921,84.62216499799875,207.1952322260088,107.2889140133804C132.92018162631612,134.33871894543012,41.79353780512637,160.00259165414826,22.644507872594943,236.69541883565114C3.319112789854554,314.0945973066697,72.72355303640163,379.243833228382,124.04198916343866,440.3218312028393C172.9286146004772,498.5055451809895,224.45579914871206,558.5317968840102,300,566.797414625762">
                                     </path>
                                 </svg>
                                 <i class="bx bx-arch"></i>
                             </div>
                             <h4 style="width: 300px"><a href="">{{ $category->category_name }}</a></h4>
                             <p>{{ substr($category->category_info, 0, 40) }} ...</p>
                         </div>
                     </div>
                 @endforeach
             </div>

         </div>

     </section><!-- End Services Section -->

     <!-- ======= Portfolio Section ======= -->
     <section id="portfolio" class="portfolio">
         <div class="container">

             <div class="row" data-aos="fade-up">
                 <div class="col-lg-12 d-flex justify-content-center">
                     <ul id="portfolio-flters">
                         <li data-filter="*" class="filter-active">All</li>
                         @foreach ($categories as $category)
                             <li data-filter=".category_{{ $category->id }}">{{ $category->category_name }}</li>
                         @endforeach
                       
                     </ul>
                 </div>
             </div>

             <div class="row portfolio-container" data-aos="fade-up">

                 @foreach ($posts as $post)
                     <div class="col-lg-4 col-md-6 portfolio-item category_{{ $post->category_id }}">
                         <img src="{{ asset($post->post_pic) }}" class="img-fluid" alt="">
                         <div class="portfolio-info">
                             <h4>App 1</h4>
                             <p>App</p>
                             <a href="{{ asset($post->post_pic) }}" data-gallery="portfolioGallery"
                                 class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                             <a href="{{ route('post.detail', $post->id) }}" class="details-link" title="More Details"><i
                                     class="bx bx-link"></i></a>
                         </div>
                     </div>
                 @endforeach


             </div>

         </div>
     </section><!-- End Portfolio Section -->

<script>
  function openImageModal(src) {
    document.getElementById('modalImage').src = src;
    document.getElementById('imageModal').style.display = 'block';
  }

  function closeImageModal() {
    document.getElementById('imageModal').style.display = 'none';
  }
</script>
 @endsection
