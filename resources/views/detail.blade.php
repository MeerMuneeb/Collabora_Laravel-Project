@extends('master')
@section("content")




{{-- <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Purchase Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Are You Sure you want to Purchase this service in <strong>${{$service['price']}}</strong>?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
            <form action="/purchased" method="POST">
                @csrf
                <input type="hidden" name="service_id" value={{$service['id']}}>
                <button type="submit" class="btn btn-primary">YES</button>
            </form>
            </div>
        </div>
    </div>
</div> --}}
<section class="py-5" style="margin-top:-50px;">
    
    <div class="jumbotron jb">
        <div class="container-fluid" style="max-width:1600px; padding:0 40px;">
            <h2 class="display-4"><strong style="font-weight: bold; font-size: 50px;"><center>{{$service['name']}}</center></strong></h2>            
        </div>
    </div>
    <div class="container-fluid serv_details" >
        <div class="row">
            <div class="col-12">
                <div class="col-lg-8" style="background-color: aqua; height:600px; border:2px solid; border-radius: 20px; overflow:hidden;">
                    <img class="img-set" src="{{$service['picture']}}" />
                </div>
                <div class="col-lg-4" style="padding-top: 4%; background-color: rgb(255, 255, 255); height:600px; border-radius:20px; border: 1px solid; overflow:hidden;">
                    
                    <a href="/">
                        <i class="glyphicon glyphicon-arrow-left"></i> Go Back
                    </a>
                    <h3><i class="glyphicon glyphicon-user"></i>  COLLABORA</h3>
                    <h1 style="font-weight: bold; font-size: 50px;">PRICE: ${{$service['price']}}</h1>
                    <h3><strong>CATEGORY:</strong> {{$service['category']}}</h3>
                    <br>
                    <h4>{{$service['description']}}</h4>
                    <br>
                    <div class="text-center"><a class="btn btn-dark purchase_button" data-toggle="modal" data-target="#addCategoryModal"><h2>Purchase</h2></a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="addCategoryModalLabel">Add Category</h3>
                </div>
                <div class="modal-body">
                    Are You Sure you want to Purchase this service in 
                    <h4><center><strong>${{$service['price']}}</strong>?</center></h4>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                    <form action="/purchased" method="POST">
                        @csrf
                        <input type="hidden" name="service_id" value={{$service['id']}}>
                        <button type="submit" class="btn btn-success">YES</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br><br><hr><br>
    <div class="homepage-container">
        <h1 class="homepage-heading">More Services</h1>
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
                            <div class="text-center"><a class="btn btn-outline-dark" href="/detail/{{$item['id']}}" >View options</a></div>
                        </div>
                    </div>
            @endforeach
    
        </div>
    </div>
    <br><br>

    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script>
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
                    items:5.5
                }
            }
        })
    </script>

    <!-- Include necessary JavaScript files -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    {{-- <div class="container-fluid detail-service">
        <center>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach($services as $item)
            <div class="col mb-5">
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
            </div>
            @endforeach
        </div>
        </center>
        
    </div> --}}
</section>
@endsection

