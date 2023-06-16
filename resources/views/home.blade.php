@extends('master')
@section("content")
<div class="container-fluid" style="background-color: #1b191c; margin-top: -20px;">
    <div class="row ">        
        <div class="col-lg-6" style="color: #fff; padding: 10%">

            <h1 style="font-size: 50px;"><strong>Find the right</strong> <i>training service</i>,<strong>right away.</strong></h1>
            <br><br>
            <button type="button" class="btn btn-secondary btn-lg btn-block" style="color: black" onclick="window.location.href = '{{ url('/toExplore') }}'"><strong>Explore</strong></button>
            {{-- <div class="text-left"><a class="btn btn-outline-dark" href="{{url('/toExplore')}}" >View options</a></div> --}}
            
        </div>
        <div class="col-lg-6 d-flex justify-content-end" style="position: flex; right: 0; bottom: 0; max-width: 100%; height: auto;"><img class="img-set2" style=" right: 0;" src="/img.png" /></div> 
    </div>     
</div>
<div class="trusted-by max-width-container" style="background-color: rgb(248, 248, 248); padding-top: 5px;">
    <ul>
      <li><picture><source media="(max-width: 899px)" srcset="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/meta.99a0dda.png 1x, https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/meta2x.d8d5bc3.png 2x"><source media="(min-width: 900px)" srcset="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/meta.12b5e5c.png 1x, https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/meta2x.b364aec.png 2x"><img src="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/meta.12b5e5c.png" alt="facebook"></picture></li>
      <li><picture><source media="(max-width: 899px)" srcset="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/google.9d71a37.png 1x, https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/google2x.0053d08.png 2x"><source media="(min-width: 900px)" srcset="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/google.61e78c8.png 1x, https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/google2x.4fa6c20.png 2x"><img src="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/google.61e78c8.png" alt="Google"></picture></li>
      <li><picture><source media="(max-width: 899px)" srcset="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/netflix.35dc5cd.png 1x, https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/netflix2x.9022712.png 2x"><source media="(min-width: 900px)" srcset="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/netflix.96c5e3f.png 1x, https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/netflix2x.6b36ad6.png 2x"><img src="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/netflix.96c5e3f.png" alt="NETFLIX"></picture></li>
      <li><picture><source media="(max-width: 899px)" srcset="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/pandg.967b1ad.png 1x, https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/pandg2x.6665fbe.png 2x"><source media="(min-width: 900px)" srcset="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/pandg.0f4cfc2.png 1x, https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/pandg2x.0d06f7b.png 2x"><img src="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/pandg.0f4cfc2.png" alt="P&amp;G"></picture></li>
      <li class="display-from-sm"><picture><source media="(max-width: 899px)" srcset="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/paypal.910e738.png 1x, https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/paypal2x.bd199ac.png 2x"><source media="(min-width: 900px)" srcset="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/paypal.305e264.png 1x, https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/paypal2x.d2fa54d.png 2x"><img src="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/paypal.305e264.png" alt="PayPal"></picture></li>
    </ul>
</div>

<br>
<div class="homepage-container">
  <h1 class="homepage-heading">Categories</h1>
  <div class="owl-carousel categories_carousel owl-theme">

      @foreach ($categories as $category)
          <div class="item">
            <a href="#" class="category-button">
              <div class="category-card" style="background-image: url('{{ $category->image }}');">
                  <div class="category-overlay">
                      <h2 class="category-name">{{ $category->name }}</h2>
                  </div>
              </div>
            </a>
          </div>
      @endforeach

  </div>
</div>
<br><br><br>
<div class="homepage-container-2">
    <div class="fluid-container">
        <div class="container-fluid left-section">
            <h1><strong>Professional</strong><i> Mentoring</i> <strong> and Training </strong><i>Services</i></h1>
            <br>
            <ul class="bullet-points">
              <li>
                <h3>Personalized Mentoring Programs</h3>
                <p>Our experienced mentors provide personalized guidance and support tailored to your specific needs and goals.</p>
              </li>
              <li>
                <h3>Comprehensive Training Workshops</h3>
                <p>Join our interactive training workshops conducted by industry experts.</p>
              </li>
              <li>
                <h3>Flexible Scheduling</h3>
                <p>We understand your busy lifestyle, so we offer flexible scheduling options to accommodate your availability.</p>
              </li>
              <li>
                <h3>Affordable Prices</h3>
                <p>We believe that professional mentoring and training should be accessible to everyone.</p>
              </li>
            </ul>
        </div>
    </div>
</div>
<br>
<div class="homepage-container">
    <h1 class="homepage-heading">Popular Services</h1>
    <div class="owl-carousel service_carousel owl-theme">
  
        @foreach($services as $item)
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{$item['picture']}}" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-left">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{$item['name']}}</h5>
                            <!-- Product price-->
                            ${{$item['price']}}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark" href="detail/{{$item['id']}}" >View options</a></div>
                    </div>
                </div>
        @endforeach
  
    </div>
</div>
<br><br>

<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script>
  $('.categories_carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

$('.service_carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>


@endsection
