<!DOCTYPE html>
<html>
   <head>
      

      @include('home.css')

   </head>
   <body>
      @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
       @include('home.header')
         <!-- end header section -->

   


       <div class="product_details_section">
                 
                     <div class="product-details-img" style="padding: 20px">
                        <img src="{{asset('product/'.$product->image)}}" alt="">
                     </div>
                     <div class="product-details">
                     <div class="detail-box">
                        <h2 style="font-weight:600">
                           {{$product->title}}
                        </h2>

                        <h5>Product Category : {{$product->category}}</h5>

                        <h5>Product Details :</h5> <p style="max-width:350px">{{$product->description}}</p>

                        <h5>Available Quantity: {{$product->quantity}}</h5>

                        @if($product->discount_price!=null)

                        
                         <span>
                           €{{$product->discount_price}}
                        </span>


                        <span style="text-decoration:line-through">
                           €{{$product->price}}
                        </span>


                        @else

                        <span>
                           €{{$product->price}}
                        </span>



                        @endif


                        <form action="{{url('add_cart',$product->id)}}" method="Post">

                              @csrf

                              <div>



                                    <input type="number" name="quantity" value="1" min="1" max="{{$product->quantity}}">



                                    <input type="submit" value="Add To Cart">


                                 
                                 

                              </div>

                           </form>


                        
                     </div>
                  </div>
               </div>
               </div>



      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      
           <!-- jQery -->
      <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('home/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('home/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('home/js/custom.js')}}"></script>
   </body>
</html>