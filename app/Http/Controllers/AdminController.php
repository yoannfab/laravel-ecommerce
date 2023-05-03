<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\Order;

use App\Models\User;

use App\Models\Contact;

use Illuminate\Support\Facades\Auth;

use PDF;

use Notification;

use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function view_category()
    {   
        if(Auth::id())
        {

             $usertype=Auth::user()->usertype;

                if($usertype=='1')
                {

                     $data=category::orderby('id','desc')->get();

                    return view('admin.category',compact('data'));

                }

                     else

                     {

                          return redirect('login');
                     }

        }

        else
        {

            return redirect('login');
        }

       
    }


     public function add_category(Request $request)
    {   

        if(Auth::id())
        {

             $usertype=Auth::user()->usertype;

                if($usertype=='1')
                {

            	$data=new category;

            	$data->category_name=$request->category;


            	$data->save();

            	return redirect()->back()->with('message','Category Added Successfully');

                }

                else
                {
                    return redirect('login');
                }


        }


        else
                {
                    return redirect('login');
                }


    	
    }



    public function delete_category($id)
    {

        if(Auth::id())
        {

             $usertype=Auth::user()->usertype;

                if($usertype=='1')
                {

                $data=category::find($id);

                $data->delete();

                return redirect()->back()->with('message','Category Deleted Successfully');

                }

                else
                {
                    return redirect('login');
                }

            }

             else
                {
                    return redirect('login');
                }




    }


    public function view_product()
    {

         if(Auth::id())
        {

             $usertype=Auth::user()->usertype;

                if($usertype=='1')
                {
                    $category=category::orderby('id','desc')->get();

                    return view('admin.product',compact('category'));

                }

                else
                {
                    return redirect('login');
                }


            }


            else
                {
                    return redirect('login');
                }

    }


    public function add_product(Request $request)
    {

          if(Auth::id())
        {

             $usertype=Auth::user()->usertype;

                if($usertype=='1')
                {

                $product=new product;

                 $product->title=$request->title;

                 $product->description=$request->description;

                 $product->price=$request->price;

                 $product->quantity=$request->quantity;

                 $product->discount_price=$request->dis_price;

                 $product->category=$request->category;



                 $image=$request->image;

                 $imagename=time().'.'.$image->getClientOriginalExtension();

                 $request->image->move('product',$imagename);


                 $product->image=$imagename;




                 $product->save();


                 return redirect()->back()->with('message','Product Added Successfullly');

             }

             else
             {
                return redirect('login');
             }



            }

              else
             {
                return redirect('login');
             }


    }


    public function show_product()
    {   

         if(Auth::id())
        {

             $usertype=Auth::user()->usertype;

                if($usertype=='1')
                {

                    $product=product::orderby('id','desc')->get();
                    return view('admin.show_product',compact('product'));

                }

                    else
                 {
                    return redirect('login');
                 }

         }


         else
             {
                return redirect('login');
             }
    }


    public function delete_product($id)
    {

        if(Auth::id())
        {

             $usertype=Auth::user()->usertype;

                if($usertype=='1')
                {

                $product=product::find($id);



                $product->delete();

                return redirect()->back()->with('message','Product Deleted Successfully');

                }

            else
             {
                return redirect('login');
             }

        }

            else
             {
                return redirect('login');
             }





    }


    public function update_product($id)
    {

        if(Auth::id())
        {

             $usertype=Auth::user()->usertype;

                if($usertype=='1')
                {

                    $product=product::find($id);

                    $category=category::all();

                    return view('admin.update_product',compact('product','category'));

                }

                else

                    {
                        return redirect('login');
                     }

         }


                else

                    {
                        return redirect('login');
                     }



    }



    public function update_product_confirm(Request $request,$id)
    {

        if(Auth::id())

        {


            $usertype=Auth::user()->usertype;

                if($usertype=='1')
                {

                    $product=product::find($id);


                $product->title=$request->title;

                $product->description=$request->description;

                $product->price=$request->price;

                $product->discount_price=$request->dis_price;

                $product->category=$request->category;

                $product->quantity=$request->quantity;



                $image=$request->image;

                if($image)

                {


                $imagename=time().'.'.$image->getClientOriginalExtension();

                $request->image->move('product',$imagename);

                 $product->image=$imagename;


                }

                


                 $product->save();


                 return redirect()->back()->with('message','Product Updated Successfully');


             }


        }


        else

        {

            return redirect('login');
        }

        


    }


    public function order()
    {


        if(Auth::id())

        {


            $usertype=Auth::user()->usertype;

                if($usertype=='1')
                {
                    $order=order::orderby('id','desc')->get();


                    return view('admin.order',compact('order'));

                }

                else
                {
                    return redirect('login');
                }

        }

        else
                {
                    return redirect('login');
                }


    }


    public function delivered($id)
    {


         if(Auth::id())

        {


            $usertype=Auth::user()->usertype;

                if($usertype=='1')
                {



                $order=order::find($id);

                $order->delivery_status="delivered";

                $order->payment_status='Paid';


                $order->save();


                return redirect()->back();

                 }

                 else
                 {
                    return redirect('login');


                 }

        }

        else
                 {
                    
                    return redirect('login');
                 }
    }

        public function print_pdf($id)
        {
              if(Auth::id())

        {


            $usertype=Auth::user()->usertype;

                if($usertype=='1')
                {

                    $order=order::find($id);

               
                    return view('admin.pdf',compact('order'));

                 }


                 else
                 {
                    
                    return redirect('login');
                 }

        }

        else
                 {
                    
                    return redirect('login');
                 }


        }


        public function send_email($id)
        {

             if(Auth::id())

        {


            $usertype=Auth::user()->usertype;

                if($usertype=='1')
                {

                $order=order::find($id);

                return view('admin.email_info',compact('order'));

             }

             else
             {
                 return redirect('login');
             }


            }


             else
             {
                 return redirect('login');
             }

        }


        public function send_user_email(Request $request , $id)
        {


             if(Auth::id())

        {


            $usertype=Auth::user()->usertype;

                if($usertype=='1')
                {

                    $order=order::find($id);


                    $details = [

                        'greeting' => $request->greeting,

                        'firstline' => $request->firstline,

                        'body' => $request->body,

                        'button' => $request->button,

                        'url' => $request->url,

                        'lastline' => $request->lastline,

                    ];

                    Notification::send($order,new SendEmailNotification($details));

                    return redirect()->back()->with('message',"Email is send to the Customer Successfully");

                }

                else
                {
                    return redirect('login');
                }

        }


 else
                {
                    return redirect('login');
                }


        }



        public function searchdata(Request $request)


        {


             if(Auth::id())

        {


            $usertype=Auth::user()->usertype;

                if($usertype=='1')
                {

                    $searchText=$request->search;

                    $order=order::where('name','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")->orWhere('email','LIKE',"%$searchText%")->get();


                    return view('admin.order',compact('order'));

                }

                else

                {
                    return redirect('login');
                }


            }

            else

                {
                    return redirect('login');
                }



        }

        public function message()
        {


             if(Auth::id())

        {


            $usertype=Auth::user()->usertype;

                if($usertype=='1')
                {

                    $message=contact::orderby('id','desc')->get();

                    return view('admin.message',compact('message'));

                }


                 else

                {
                    return redirect('login');
                }


        }

            else

                {
                    return redirect('login');
                }

        }

        public function customer()
        {

             if(Auth::id())

        {


            $usertype=Auth::user()->usertype;

                if($usertype=='1')
                {

                    $user=user::where('usertype','=','0')->get();

                    return view('admin.user',compact('user'));

                }


                else

                {
                    return redirect('login');
                }


        }

            else

                {
                    return redirect('login');
                }
        }

   
}
