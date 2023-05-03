<!DOCTYPE html>
<html>
   <head>
    

     <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    @include('home.css')

      <style type="text/css">
         

         .center
         {

            margin: 20px auto;
            /* width: 70%; */
            padding: 25px;
            text-align: center;
         }


         table,th,td
         {
            border: 1px solid black;
         }

         .th_deg

         {

            padding: 10px;
            font-size: 20px;
            font-weight: bold;

         }
      </style>


   </head>
   <body>

      @include('sweetalert::alert')
   <div class="hero_area">
         <!-- header section strats -->
       @include('home.header')
         

         <div class="center" style="overflow-x:auto;">
            

            <table>
               
               <tr>
                  <th class="th_deg">Product Title</th>

                  <th class="th_deg">Quantity</th>

                  <th class="th_deg">Price</th>

                  <th class="th_deg">Payment Status</th>

                  <th class="th_deg">Delivery Status</th>

                  <th class="th_deg">Image</th>

                  <th class="th_deg">Cancel Order</th>

               </tr>


               @foreach($order as $order)
               <tr>

                  <td>{{$order->product_title}}</td>

                  <td>{{$order->quantity}}</td>

                  <td>{{$order->price}}</td>

                  <td>{{$order->payment_status}}</td>

                  <td>{{$order->delivery_status}}</td>

                  <td>
                     
                     <img height="100" width="100%" src="product/{{$order->image}}">

                  </td>

 
                  <td>

                     @if($order->delivery_status=='processing')

                     <a onclick="confirmation(event)" class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">Cancel Order</a>


                     @else

                     <p>Not Allowed</p>

                     @endif

                  </td>

               </tr>

               @endforeach


            </table>

         </div>
   



<script>
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
        console.log(urlToRedirect); // verify if this is the right URL
        swal({
            title: "Are you sure to cancel this product",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true, 
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {


                 
                window.location.href = urlToRedirect;
               
            }  
        });
    }
</script>
      
      <!-- jQery -->
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