<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
              <h2>Products</h2>


               <div>
                  

                  <form action="{{url('search_product')}}" method="GET">

                     @csrf
                     
                     <input class="search_box" type="text" name="search" placeholder="Search a Product">

                     <input type="submit" value="search">

                  </form>

               </div>
               
            </div>

            
            <div class="row">

               @foreach($product as $products)

               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$products->id)}}" class="option1">
                           View Product
                           </a>

                           <!-- <form action="{{url('add_cart',$products->id)}}" method="Post">

                              @csrf

                              <input type="submit" class="option2" value="Add To Cart">


                           </form> -->

                           </div>
                     </div>

                     <div class="img-box">
                        <img src="product/{{$products->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$products->title}}
                        </h5>

                        @if($products->discount_price!=null)

                        <h6 style="text-decoration: line-through; font-size: 11px">
                           €{{$products->price}}
                        </h6>
                         <h6>
                           €{{$products->discount_price}}
                        </h6>


                        @else

                        <h6>
                           €{{$products->price}}
                        </h6>



                        @endif


                        
                     </div>
                  </div>
               </div>


               @endforeach
            <div class="row-pagination">
             <div class="pagination" style="margin-bottom:25px">

               {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}

            </div>
            </div>
            
         </div>
      </section> 