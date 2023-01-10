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
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(): View
    {
        if(Auth::user()->hasRole('admin')){
            $orders = DB::table('orders')
            ->select('orders.*','order_images.image_url')
            ->leftjoin('order_images', 'orders.id', '=', 'order_images.order_id')
            ->orderBy('created_at','desc')
            ->get();
        }else{
            $orders = DB::table('orders')
            ->select('orders.*','order_images.image_url')
            ->leftjoin('order_images', 'orders.id', '=', 'order_images.order_id')
            ->where('user_id',Auth::user()->id)
            ->orderBy('created_at','desc')
            ->get();
        }
        
       
        return view('backend.orders.index', compact('orders'));
    }

    public function searchOrder(Request $request){
        //dd($request);
        $titleId = $request->input('search_by_title');
        $fileNumber = $request->input('search_by_fileNumber');
        $search_by_date_range_from = $request->input('search_by_date_range_from');
        $search_by_date_range_to = $request->input('search_by_date_range_to');
        // $formatDateFrom = Carbon::createFromFormat('Y-m-d', $search_by_date_range_from)->format('Y-m-d H:i:s');
        // $formatDateTo = Carbon::createFromFormat('Y-m-d', $search_by_date_range_to)->format('Y-m-d H:i:s');
        //dd($formatDateTo);
        if(Auth::user()->hasRole('admin')){
            $orders = DB::table('orders')
            ->select('orders.*','order_images.image_url')
            ->leftjoin('order_images', 'orders.id', '=', 'order_images.order_id')
            ->orderBy('created_at','desc');
            if(!empty($titleId)){
                $orders->where('orders.title_id', '=', $titleId);
            }
           
            if(!empty($fileNumber)){
                $orders->where('orders.file_number', '=', $fileNumber);
            }
            if(!empty($search_by_date_range_from) && !empty($search_by_date_range_to)){
                $orders->whereBetween('created_on', [$search_by_date_range_from, $search_by_date_range_to]);
            }
            $orders = $orders->get();
            
        }else{
            $orders = DB::table('orders')
            ->select('orders.*','order_images.image_url')
            ->leftjoin('order_images', 'orders.id', '=', 'order_images.order_id')
            ->where('user_id',Auth::user()->id)
            ->orderBy('created_at','desc');
            if(!empty($titleId)){
                $orders->where('orders.title_id', '=', $titleId);
            }
            if(!empty($fileNumber)){
                $orders->where('orders.file_number', '=', $fileNumber);
            }
            if(!empty($search_by_date_range_from) && !empty($search_by_date_range_to)){
                $orders->whereBetween('created_on', [$search_by_date_range_from, $search_by_date_range_to]);
            }
            $orders = $orders->get();
            
        }
        return view('backend.orders.index', compact('orders'));
    }

    public function advanceSearch(Request $request){
        //dd($request);
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
        $due_date = $request->input('due_date');

        // $formatDateFrom = Carbon::createFromFormat('Y-m-d', $search_by_date_range_from)->format('Y-m-d H:i:s');
        // $formatDateTo = Carbon::createFromFormat('Y-m-d', $search_by_date_range_to)->format('Y-m-d H:i:s');
        //dd($formatDateTo);
        if(Auth::user()->hasRole('admin')){
            $orders = DB::table('orders')
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
            if(!empty($due_date)){
                $orders->where('orders.due_date','=',$due_date);
            }
           // dd($request);
            $orders = $orders->get();
        }else{
            $orders = DB::table('orders')
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
            if(!empty($due_date)){
                $orders->where('orders.due_date','=',$due_date);
            }
           // dd($request);
            $orders = $orders->get();
            
        }
        return view('backend.orders.index', compact('orders','request'));
    }
    public function createOrder(Request $request){

       
        $titleId =  'FRH-'.rand(0,100000);
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'title_id' => $titleId,
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
            try {

                $orderData = [
                    'orderid' => $order->id,
                    'titleid' => $titleId,
                    'user' => Auth::user(),
                    'msg' => 'Your order has been succesfully created.',
                    'admin' => false
                ];
                
                Mail::to(Auth::user()->email)->send(new OrderEmail($orderData));
    
                $adminData = [
                    'orderid' => $order->id,
                    'titleid' => $titleId,
                    'user' => Auth::user(),
                    'msg' => 'New order recieved.',
                    'admin' => true
                ];
                
                Mail::to('admin@admin.com')->send(new OrderEmail($adminData));
              
              } catch (\Exception $e) {
              
              }
            
        }
        return redirect()->route('admin.systemorder.index')->with('success','Order Created Successfully!');
    }

    public function orderImage( Request $request){
        // dd($request);
        if($request->hasFile('titlefile')){
            $uploadedFile = $request->file('titlefile');
            $filename = time().$uploadedFile->getClientOriginalName();
            
            Storage::disk('local')->put('/public/titlefiles/'.$request->orderid.'/' . $filename, File::get($uploadedFile));
            
            $exist = DB::table('order_images')->where('order_id',$request->orderid)->first();
            if(!empty($exist->id)){
                 DB::table('order_images')->where('order_id',$request->orderid)->update([
                    'image_url' => $filename
                 ]);
            }else{
                $image = DB::table('order_images')->insert([
                    'order_id' => $request->orderid,
                    'image_url' => $filename
                ]);
            }
            

            return redirect()->back()->with('success','File Uploaded Successfully');
        }else{
            return redirect()->back()->with('error','Failed to upload file!');
        }
        
    }
    // public function show(Order $order): View
    // {
    //     $this->authorize('show_order');

    //     $orderStatusArray = [
    //         '0' => 'New order',
    //         '1' => 'Paid',
    //         '2' => 'Under process',
    //         '3' => 'Finished',
    //         '4' => 'Rejected',
    //         '5' => 'Canceled',
    //         '6' => 'Refund requested',
    //         '7' => 'Returned order',
    //         '8' => 'Refunded',
    //     ];

    //     $key = array_search($order->order_status, array_keys($orderStatusArray));
    //     foreach ($orderStatusArray as $k => $v) {
    //         if ($k <= $key) {
    //             unset($orderStatusArray[$k]);
    //         }
    //     }

    //     return view('backend.orders.show', compact('order', 'orderStatusArray'));
    // }

    // public function update(Request $request, Order $order): RedirectResponse
    // {
    //     $this->authorize('edit_order');

    //     $user = User::find($order->user_id);

    //     if ($request->order_status == Order::REFUNDED){
    //         $omniPay = new OmnipayService('PayPal_Express');
    //         $response = $omniPay->refund([
    //             'amount' => $order->total,
    //             'transactionReference' => $order->transactions()->where('transaction_status', OrderTransaction::PAID)
    //                 ->first()->transaction_number,
    //             'cancelUrl' => $omniPay->getCancelUrl($order->id),
    //             'returnUrl' => $omniPay->getReturnUrl($order->id),
    //             'notifyUrl' => $omniPay->getNotifyUrl($order->id),
    //         ]);

    //         if ($response->isSuccessful()) {
    //             $order->update(['order_status' => Order::REFUNDED]);
    //             $order->transactions()->create([
    //                 'transaction_status' => OrderTransaction::REFUNDED,
    //                 'transaction_number' => $response->getTransactionReference(), // coming from PayPal
    //                 'payment_result' => 'success'
    //             ]);

    //             $user->notify(new OrderStatusNotification($order));

    //             return back()->with([
    //                 'message' => 'Refunded successfully',
    //                 'alert-type' => 'success',
    //             ]);
    //         }

    //     } else {

    //         $order->update(['order_status'=> $request->order_status]);

    //         $order->transactions()->create([
    //             'transaction_status' => $request->order_status,
    //             'transaction_number'=> null,
    //             'payment_result'=> null,
    //         ]);

    //         $user->notify(new OrderStatusNotification($order));

    //         return back()->with([
    //             'message' => 'updated successfully',
    //             'alert-type' => 'success',
    //         ]);

    //     }
    // }

    // public function destroy(Order $order): RedirectResponse
    // {
    //     $this->authorize('delete_order');

    //     $order->delete();

    //     return redirect()->route('admin.orders.index')->with([
    //         'message' => 'Deleted successfully',
    //         'alert-type' => 'success'
    //     ]);
    // }
}
