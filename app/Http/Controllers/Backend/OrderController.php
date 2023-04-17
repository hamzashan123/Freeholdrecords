<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderTransaction;
use App\Models\User;
use App\Notifications\Frontend\User\OrderStatusNotification;
use App\Services\OmnipayService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderEmail;
use App\Mail\DocumentUploadEmail;
use App\Models\OrderProduct;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Models\SubOrder;
use Illuminate\Support\Str;
use Response;

class OrderController extends Controller
{
    public function index(): View
    {
        if(Auth::user()->hasRole('admin')){
            $orders = Order::orderBy('created_at','desc')
            ->get();
        }else{
            $orders = Order::with('user')->with('orderProduct')->where('user_id',Auth::user()->id)
            ->orderBy('created_at','desc')
            ->get();
        }

        // dd($orders[0]->orderProduct->sum('price'));
        return view('backend.orders.index', compact('orders'));
    }

    public function submitOrder(Request $request){
        
       
        
        $orderId = DB::table('orders')->insertGetId([
            'user_id' => Auth::user()->id,
            'amount' => $request->amount,
            'status' => 'pending',
            'created_at' => Carbon::now()->format('Y-m-d')
        ]);
        
       

        if(!empty($request->product_ids)){
            foreach($request->product_ids as $key => $product_id){
                $order = DB::table('order_products')->insertGetId([
                    'order_id' => $orderId,
                    'product_id' => $product_id,
                    'quantity' => $request->product_quantities[$key]
                ]);
    
                $selectedQuantity = $request->product_quantities[$key];
                $product = DB::table('products')->where('id',$product_id)->first();
                // $updateQuantity = $product->quantity - $selectedQuantity;
                // DB::table('products')->where('id',$product_id)->update([
                //     'quantity' => $updateQuantity
                // ]);

            }
            
            
            
           $purchasedProducts = Product::whereIn('id',$request->product_ids)->orderBy('id','desc')->get();
            

            $adminData = [
                'orderid' => $orderId,
                'user' => Auth::user(),
                'orderHtml' => $request->orderHtml,
                'msg' => 'New order recieved.',
                'amount' => $request->amount,
                'admin' => true,
                'purchasedProducts' => $purchasedProducts,
                'productquantities' => $request->product_quantities
            ];
           
            $admin = User::role('admin')->first();
    
            Mail::to($admin->email)->send(new OrderEmail($adminData));
            
            $userData = [
                'orderid' => $orderId,
                'user' => Auth::user(),
                'orderHtml' => $request->orderHtml,
                'amount' => $request->amount,
                'msg' => 'Your order has been placed. Thank you',
                'admin' => false,
                'purchasedProducts' => $purchasedProducts,
                'productquantities' => $request->product_quantities
            ];

            Mail::to(Auth::user()->email)->send(new OrderEmail($userData));

            return response()->json([
                'status' => 'success',
                'msg' => 'Order Placed Successfully' 
            ]);
        }else{
            return response()->json([
                'status' => 'failure',
                'msg' => 'Something went wrong!' 
            ]);
        }
        
    }

    public function searchOrder(Request $request){
        //dd($request);
        $titleId = $request->input('search_by_title');
        $fileNumber = $request->input('search_by_fileNumber');
        $search_by_date_range_from = $request->input('search_by_date_range_from');
        $search_by_date_range_to = $request->input('search_by_date_range_to');
        
        if(Auth::user()->hasRole('admin')){
            $orders = Order::with('children')->where('parent_id',null)
            ->select('orders.*','order_images.image_url')
            ->leftjoin('order_images', 'orders.id', '=', 'order_images.order_id')
            ->orderBy('created_at','desc');
            if(!empty($titleId)){
                $orders->where('orders.title_id', 'LIKE', "%{$titleId}%");
            }
            if(!empty($fileNumber)){
                $orders->where('orders.file_number', 'LIKE', "%{$fileNumber}%");
            }
            if(!empty($search_by_date_range_from) && !empty($search_by_date_range_to)){
                $orders->whereBetween('created_on', [$search_by_date_range_from, $search_by_date_range_to]);
            }
            $orders = $orders->get();
            
        }else{
            $orders = Order::with('children')->where('parent_id',null)
            ->select('orders.*','order_images.image_url')
            ->leftjoin('order_images', 'orders.id', '=', 'order_images.order_id')
            ->where('user_id',Auth::user()->id)
            ->orderBy('created_at','desc');
            if(!empty($titleId)){
                $orders->where('orders.title_id', 'LIKE', "%{$titleId}%");
            }
            if(!empty($fileNumber)){
                $orders->where('orders.file_number', 'LIKE', "%{$fileNumber}%");
            }
            if(!empty($search_by_date_range_from) && !empty($search_by_date_range_to)){
                $orders->whereBetween('created_on', [$search_by_date_range_from, $search_by_date_range_to]);
            }
            $orders = $orders->get();
            
        }
        return view('backend.orders.index', compact('orders'));
    }


    public function advanceSearch(Request $request){
        
        $customer = $request->input('customer');
        $file_number = $request->input('file_number');
        $requested_by = $request->input('requested_by');
        $county = $request->input('county');
        $block = $request->input('block');
        $lot = $request->input('lot');
        $building_number = $request->input('building_number');
        $street_name = $request->input('street_name');
        $unit = $request->input('unit');
        $record_owners = $request->input('record_owners');
        $additional_info = $request->input('additional_info');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if(Auth::user()->hasRole('admin')){
            $orders = Order::with('children')->where('parent_id',null)
            ->select('orders.*','order_images.image_url')
            ->leftjoin('order_images', 'orders.id', '=', 'order_images.order_id')
            ->orderBy('created_at','desc');
            if(!empty($customer)){
                $orders->where('orders.customer','=',$customer);
            }
            if(!empty($file_number)){
                $orders->where('orders.file_number','=',$file_number);
            }
            if(!empty($requested_by)){
                $orders->where('orders.requested_by','=',$requested_by);
            }
            if(!empty($county)){
                $orders->where('orders.county','=',$county);
            }
            if(!empty($block)){
                $orders->where('orders.block','=',$block);
            }
            if(!empty($lot)){
                $orders->where('orders.lot','=',$lot);
            }
            if(!empty($building_number)){
                $orders->where('orders.building_number','=',$building_number);
            }
            if(!empty($street_name)){
                $orders->where('orders.street_name','=',$street_name);
            }
            if(!empty($unit)){
                $orders->where('orders.unit_number','=',$unit);
            }
            if(!empty($record_owners)){
                $orders->where('orders.record_owners','=',$record_owners);
            }
            if(!empty($additional_info)){
                $orders->where('orders.additional_info','=',$additional_info);
            }
            //dd($request);
            if(!empty($start_date) && !empty($end_date)){
                $orders->whereBetween('created_on', [$start_date, $end_date]);
            }
           
            $orders = $orders->get();
        }else{
            $orders = Order::with('children')->where('parent_id',null)
            ->select('orders.*','order_images.image_url')
            ->leftjoin('order_images', 'orders.id', '=', 'order_images.order_id')
            ->where('user_id',Auth::user()->id)
            ->orderBy('created_at','desc');

            if(!empty($customer)){
                $orders->where('orders.customer','=',$customer);
            }
            if(!empty($file_number)){
                $orders->where('orders.file_number','=',$file_number);
            }
            if(!empty($requested_by)){
                $orders->where('orders.requested_by','=',$requested_by);
            }
            if(!empty($county)){
                $orders->where('orders.county','=',$county);
            }
            if(!empty($block)){
                $orders->where('orders.block','=',$block);
            }
            if(!empty($lot)){
                $orders->where('orders.lot','=',$lot);
            }
            if(!empty($building_number)){
                $orders->where('orders.building_number','=',$building_number);
            }
            if(!empty($street_name)){
                $orders->where('orders.street_name','=',$street_name);
            }
            if(!empty($unit)){
                $orders->where('orders.unit_number','=',$unit);
            }
            if(!empty($record_owners)){
                $orders->where('orders.record_owners','=',$record_owners);
            }
            if(!empty($additional_info)){
                $orders->where('orders.additional_info','=',$additional_info);
            }
            
            if(!empty($start_date) && !empty($end_date)){
                $orders->whereBetween('created_on', [$start_date, $end_date]);
            }

            $orders = $orders->get();
            
        }
        return view('backend.orders.index', compact('orders','request'));
    }
    public function createOrder(Request $request){
        
        $searches = "";
        if(!empty($request->searches)){
            $searches = $request->searches;
        }
        if(!empty($request->searchesnew)){
            $searches = $request->searchesnew;
        } 
        $admin = User::role('admin')->first();
        $order = Order::orderBy('created_at','desc')->first();
        if(!empty($order->title_id)){
            $orderTitleId = Str::remove('FRH-', $order->title_id); 
            $updatedNumber = $orderTitleId + 1;
            $titleId =  'FRH-'.$updatedNumber;
        }else{
            $startingOrderId = 1001;
            $titleId =  'FRH-'.$startingOrderId;
        }
        
        
        $order = Order::create([
            'parent_id' => !empty($request->parent_id) ? $request->parent_id : null,
            'user_id' => Auth::user()->id,
            'title_id' => $titleId,
            'searches' => json_encode($searches),
            'customer' => $request->customer,
            'file_number' => $request->file_number,
            'requested_by' => $request->requested_by,
            'county' => $request->county,
            'block' => $request->block,
            'lot' => $request->lot,
            'building_number' => $request->building_number,
            'street_name' => $request->street_name,
            'unit_number' => $request->unit,
            'record_owners' => $request->record_owners,
            'additional_info' => $request->additional_info,
            'due_date' => $request->due_date,
            'created_on' => Carbon::now()->format('Y-m-d')
            
        ]);

        if($order){
            // try {

                // $orderData = [
                //     'orderid' => $order->id,
                //     'titleid' => $titleId,
                //     'user' => Auth::user(),
                //     'msg' => 'Your order has been succesfully created.',
                //     'admin' => false
                // ];
                
                // Mail::to(Auth::user()->email)->send(new OrderEmail($orderData));
                        
                $adminData = [
                    'orderid' => $order->id,
                    'titleid' => $titleId,
                    'user' => Auth::user(),
                    'msg' => 'New order recieved.',
                    'admin' => true
                ];
               
                Mail::to($admin->email)->send(new OrderEmail($adminData));
                Mail::to('hamzashan123@gmail.com')->send(new OrderEmail($adminData));
                Mail::to('info@freeholdrecords.com')->send(new OrderEmail($adminData));
                
              
            //   } catch (\Exception $e) {
              
            //   }
            
        }
        return redirect()->route('admin.systemorder.index')->with('success','Order Created Successfully!');
    }

    public function editOrder(int $id){

        $order = Order::where('id',$id)->first();
        return view('backend.orders.edit',compact('order'));
    }

    public function updateOrder(Request $request){

        Order::where('id',$request->order_id)->update([
            'status' => $request->status
        ]);
        
        return redirect()->back()->with([
            'message' => 'Order updated successfully',
            'alert-type' => 'success'
        ]);
    }

    public function getOrderdetails(int $id){

        $orders = OrderProduct::with('orderproducts')->where('order_id',$id)->get()->toArray();
        $orderUser = Order::with('user')->where('id',$id)->first();

        // dd($orderUser->user->discount);
        return response()->json([
            'data' => $orders,
            'orderUser' => $orderUser,
            'msg' => 'items list found',
            'status' => 'success'
        ]);
    }

    public function getOrderCsv(int $id){

        $orders = OrderProduct::with('orderproducts')->where('order_id',$id)->get()->toArray();
        $orderUser = Order::with('user')->where('id',$id)->first();


        $users = User::get();

        // these are the headers for the csv file. Not required but good to have one incase of system didn't recongize it properly
        $headers = array(
          'Content-Type' => 'text/csv'
        );


        //I am storing the csv file in public >> files folder. So that why I am creating files folder
        if (!File::exists(public_path()."/files")) {
            File::makeDirectory(public_path() . "/files");
        }

        //creating the download file
        $filename =  public_path("files/order.csv");
        $handle = fopen($filename, 'w');

        //adding the first row
        fputcsv($handle, [
            "Sku",
            "Item Name",
            "Price",
            "Your Price",
            "Quantity",
            "Total"
        ]);

        //adding the data from the array
        foreach ($orders as $order) {
           
            $orderUser = Order::with('user')->where('id',$order['order_id'])->first();
           
            $yourPrice = number_format( $order['orderproducts']['price'] - ($orderUser->user->discount / 100) * $order['orderproducts']['price'] , 2 );
                
            // dd($order->quantity);
            fputcsv($handle, [
                $order['orderproducts']['sku'],
                $order['orderproducts']['name'],
                $order['orderproducts']['price'],
                $yourPrice,
                $order['quantity'],
                $yourPrice * $order['quantity'],
            ]);

        }
        fclose($handle);

        //download command
        return Response::download($filename, "order.csv", $headers);
    
       
    }

    
    public function orderImage( Request $request){
        // dd($request);
        if($request->hasFile('titlefile')){
            $uploadedFile = $request->file('titlefile');
            $filename = time().$uploadedFile->getClientOriginalName();
            
            Storage::disk('local')->put('/public/titlefiles/'.$request->orderid.'/' . $filename, File::get($uploadedFile));
            
            DB::table('order_images')->insert([
                'order_id' => $request->orderid,
                'image_url' => $filename
            ]);

            
            try {
                $order = DB::table('orders')->where('id',$request->orderid)->first();
                $user = User::where('id',$order->user_id)->first();
                $orderData = [
                    'orderid' => $order->id,
                    'titleid' => $order->title_id,
                    'user' => $user,
                    'msg' => 'A new document has been added on your document.',
                    'link' => $filename,
                    'admin' => true
                ];
                
                Mail::to($user->email)->send(new DocumentUploadEmail($orderData));
    
               
              
              } catch (\Exception $e) {
              
              }
                

            return redirect()->back()->with('success','File Uploaded Successfully');
        }else{
            return redirect()->back()->with('error','Failed to upload file!');
        }
        
    }

    public function orderDocuments(Request $request, $id= null){
        
        $data = DB::table('order_images')->where('order_id',$id)->get();
        
        $headers = [
            'Content-type' => 'application/json'
        ];
        return response()->json($data, 200, $headers);
    }

    public function searches(){
        $searches = DB::table('searches')->get();
        return view('backend.searches.index',compact('searches'));
    }

    public function createSearch(Request $request){
        if(!empty($request->searchname)){
            DB::table('searches')->insert([
                'name' => $request->searchname
            ]);
            return redirect()->back()->with('success','Search added Successfully');
        }else{
            return redirect()->back();
        }
    }

    public function deleteSearch(int $id){
        if(!empty($id)){
            DB::table('searches')->where('id',$id)->delete();
            return redirect()->back()->with('success','Search Deleted Successfully');
        }else{
            return redirect()->back();
        }
        
    }

    public function updateSearch(Request $request){
        
        if(!empty($request->searchnameupdate)){
            DB::table('searches')->where('id',$request->searchid)->update([
                'name' => $request->searchnameupdate
            ]);
            return redirect()->back()->with('success','Search updated Successfully');
        }else{
            return redirect()->back();
        }
    }

    public function deleteOrder(int $id){
        if($id){
            DB::table('orders')->where('id',$id)->delete();
            return redirect()->back()->with('success','Order deleted Successfully');
        }
       
    }
    public function deleteOrderDocument(int $id){
        
        if($id){
            DB::table('order_images')->where('id',$id)->delete();
            return redirect()->back()->with('success','Document deleted Successfully');
        }
       
    }
    
    public function destroy(Order $order): RedirectResponse
    {
        $this->authorize('delete_order');

        $order->delete();

        if(!empty($order->id)){
            OrderProduct::where('order_id',$order->id)->delete();
        }
        

        return redirect()->route('admin.orders.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
