@extends('master')
@section("content")
<section class="py-5" style="margin-top:-50px;">
    <div class="jumbotron jb">
        <div class="container-fluid" style="max-width:1600px; padding:0 40px;">
            <h2 class="display-4"><strong><center>EXPLORE</center></strong></h2>            
        </div>
    </div>
    <div class="container-fluid explore-services">
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
        
    </div>

    
</section>
@endsection