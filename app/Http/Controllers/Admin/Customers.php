<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Admin\SettingsModel;
use App\Models\Common_model;
use App\Services\ZohoService;

class Customers extends Controller
{
    private $commonmodel;
    private $zohoService;
    public function __construct(){
        $this->commonmodel = new Common_model;
        $this->zohoService = new ZohoService;
    }
    public function index(Request $request){
        
        $data['customers'] = $this->commonmodel->crudOperation('RA','tbl_member','','',['m_id','DESC']);
        return view('admin.customers.cIndex', $data);
    }
    public function edit_customer(Request $request, $id=null){
        $data = $post = [];
        if($request->isMethod('POST')){
            $rules = [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ];
            if($request->input('email') != $request->input('email2')){
                $rules['email'] = 'required|email|unique:tbl_member,email';
            }
            $validated = $this->validate($request, $rules);
            
            if($validated){
                /*if($request->hasFile('cms_banner')){
                    if ($request->file('cms_banner')->isValid()) {

                        $file = $request->file('cms_banner');
                        do {
                            $webpFilename = 'banner-'. Str::random(8) .'.webp';
                            $exists = $this->commonmodel->isExists('tbl_cms',['cms_banner'=>$webpFilename]);
                        } while ($exists);
                        $image = Image::make($file)->encode('webp', 80);
                        $path = Storage::disk('public_root')->put('images/'. $webpFilename, (string) $image);
                        if($path){
                            if (isset($_POST['cms_banner2']) && !empty($_POST['cms_banner2'])) {
                                Storage::disk('public_root')->delete('images/' . $_POST['cms_banner2']);
                            }
                            $post['cms_banner'] = $webpFilename;
                        }
                    }
                }*/
                $post['name'] = $request->input('name');
                $post['email'] = $request->input('email');
                $post['phone'] = $request->input('phone');

                /***********************or************** */
                /*if($request->hasFile('thumb_image')){
                    if ($request->file('thumb_image')->isValid()) {

                        $file = $request->file('thumb_image');
                        do {
                            $webpFilename = 'testimonial-'. Str::random(8) .'.webp';
                            $exists = $this->commonmodel->isExists('tbl_testimonial',['thumb_image'=>$webpFilename]);
                        } while ($exists);
                        $image = Image::make($file)->encode('webp', 80);
                        $path = Storage::disk('public_root')->put('images/'. $webpFilename, (string) $image);
                        if($path){
                            if (isset($_POST['thumb_image2']) && !empty($_POST['thumb_image2'])) {
                                Storage::disk('public_root')->delete('images/' . $_POST['thumb_image2']);
                            }
                            $post['thumb_image'] = $webpFilename;
                        }
                    }
                }
                /*if($request->hasFile('video')){
                    $fileContent = $request->file('video');
                    $ext = $fileContent->extension();
                    do {
                        $videoFilename = 'testimonial-'. Str::random(8).'.'.$ext;
                        $exists = $this->commonmodel->isExists('tbl_testimonial',['video'=>$videoFilename]);
                    } while ($exists);
                    // $newfilename = $this->uploadImage($fileContent, $_POST['old_image5']);
                    $path = Storage::disk('public_root')->putFileAs('images/', $fileContent, $videoFilename);
                    if($path){
                        if (isset($_POST['video2']) && !empty($_POST['video2'])) {
                            Storage::disk('public_root')->delete('images/' . $_POST['video2']);
                        }
                        $post['video'] = $videoFilename;
                    }
                }*/
                // $post['video'] = $request->input('video');

                $post['status'] = $request->input('status');
                
                $post['updated'] = date('Y-m-d H:i:s');
                $updated = $this->commonmodel->crudOperation('U','tbl_member',$post,['m_id'=>$id]);
                if(isset($updated)){
                    //Zoho CRM
                    $record = $this->commonmodel->crudOperation('R1','tbl_member','',['m_id'=>$id]);
                    $zohoAccountId = $record->zoho_account_id;
                    if($zohoAccountId != null){
                        $accountId = $this->zohoService->updateAccount($zohoAccountId, [
                            'name' => $record->name,
                            'website' => '',
                            'phone' => $record->phone,
                            'street' => '',
                            'city' => '',
                            'state' => '',
                            'country' => '',
                            'industry' => '',
                        ]);
                    }else{
                        $zohoAccountId = $this->zohoService->createAccount([
                            'name' => $post['name'],
                            'website' => '',
                            'phone' => $post['phone'],
                            'street' => '',
                            'city' => '',
                            'state' => '',
                            'country' => '',
                            'industry' => '',
                        ]);
                        if($zohoAccountId){
                            $this->commonmodel->crudOperation('U','tbl_member',['zoho_account_id'=>$zohoAccountId],['m_id'=>$id]);
                        }
                    }
                    $request->session()->flash('message',['msg'=>'Record updated successfully!','type'=>'success']);
                }else{
                    $request->session()->flash('message',['msg'=>'Please Try After Sometimes...','type'=>'danger']);
                }

                return redirect()->to('admin/customers');
            }
        }
        if($id){
            $data['record'] = $this->commonmodel->crudOperation('R1','tbl_member','',['m_id'=>$id]);
        }
        return view('admin.customers.edit_customer', $data);
    }
    public function customer_orders(Request $request, $id){
        $data = [];
        $data['customer'] = $this->commonmodel->crudOperation('R1','tbl_member','',['m_id'=>$id]);
        $data['orders'] = $this->commonmodel->crudOperation('RA','tbl_product_order','',[['m_id','=',$id]],['id','DESC']);
        // echo '<pre>'; print_r($data['orders']); exit;
        return view('admin.customers.customer_orders', $data);
    }
    public function purchased_courses(Request $request, $id){
        $data = [];
        $data['customer'] = $this->commonmodel->crudOperation('R1','tbl_member','',['m_id'=>$id]);
        $data['Pcourses'] = $this->commonmodel->get_purchased_courses_by_customers($id);
        return view('admin.customers.purchased_courses', $data);
    }
    public function new_orders(Request $request){
        $data['pageTitle'] = 'All New Pre-Orders';
        // $data['customer'] = $this->commonmodel->crudOperation('R1','tbl_member','',['m_id'=>$id]);
        $search = $request->search ?? null;
        $data['orders'] = $this->commonmodel->get_all_new_product_order(1, $search);
        // echo '<pre>'; print_r($data['orders']); exit;
        return view('admin.customers.new_orders', $data);
    }
    public function pr_orders(Request $request){
        $data['pageTitle'] = 'Payment Requested Orders';
        // $data['customer'] = $this->commonmodel->crudOperation('R1','tbl_member','',['m_id'=>$id]);
        $search = $request->search ?? null;
        $data['orders'] = $this->commonmodel->get_all_new_product_order(2, $search);
        // echo '<pre>'; print_r($data['orders']); exit;
        return view('admin.customers.new_orders', $data);
    }
    public function paid_orders(Request $request){
        $data['pageTitle'] = 'Paid Orders';
        // $data['customer'] = $this->commonmodel->crudOperation('R1','tbl_member','',['m_id'=>$id]);
        $search = $request->search ?? null;
        $data['orders'] = $this->commonmodel->get_all_new_product_order(3, $search);
        // echo '<pre>'; print_r($data['orders']); exit;
        return view('admin.customers.new_orders', $data);
    }
    public function shipped_orders(Request $request){
        $data['pageTitle'] = 'Shipped Orders';
        // $data['customer'] = $this->commonmodel->crudOperation('R1','tbl_member','',['m_id'=>$id]);
        $search = $request->search ?? null;
        $data['orders'] = $this->commonmodel->get_all_new_product_order(4, $search);
        // echo '<pre>'; print_r($data['orders']); exit;
        return view('admin.customers.new_orders', $data);
    }
    public function delivered_orders(Request $request){
        $data['pageTitle'] = 'Delivered Orders';
        // $data['customer'] = $this->commonmodel->crudOperation('R1','tbl_member','',['m_id'=>$id]);
        $search = $request->search ?? null;
        $data['orders'] = $this->commonmodel->get_all_new_product_order(5, $search);
        // echo '<pre>'; print_r($data['orders']); exit;
        return view('admin.customers.new_orders', $data);
    }
    public function canceled_orders(Request $request){
        $data['pageTitle'] = 'Canceled Orders';
        // $data['customer'] = $this->commonmodel->crudOperation('R1','tbl_member','',['m_id'=>$id]);
        $search = $request->search ?? null;
        $data['orders'] = $this->commonmodel->get_all_new_product_order(6, $search);
        // echo '<pre>'; print_r($data['orders']); exit;
        return view('admin.customers.new_orders', $data);
    }
    public function change_order_status(Request $request){
        $data = $post = [];
        if($request->isMethod('POST')){
            $id = $request->input('orderid');
            $status = $request->input('status');
            if($status == 6){
                $post['cancel_reason'] = $request->input('cancel_reason');
            }
            $post['status'] = $status;
            $post['update_at'] = date('Y-m-d H:i:s');
            $updated = $this->commonmodel->crudOperation('U','tbl_product_order',$post,['id'=>$id]);

            $order = $this->commonmodel->crudOperation('R1','tbl_product_order','',['id'=>$id]);
            $m_id = $order->m_id ?? '';
            $customer = $this->commonmodel->crudOperation('R1','tbl_member','',['m_id'=>$m_id]);
            $settings = SettingsModel::where(['id'=>1])->first();
            if($order && $customer){
                // update ZOHO CRM Sales Orders
                $salesOrderId = $order->zoho_sales_order_id;
                if($salesOrderId){
                    $zoho_response = $this->zohoService->changeStatusSalesOrder($salesOrderId, [
                        'status' => get_zoho_sales_order_status($status)
                    ]);
                }
                /************************************************************ */
                $mailData = [
                            'client_name'   => ucwords($customer->name),
                            'client_email'   => $customer->email,
                            'order_id'  => $order->order_id,
                            'amount'  => $order->net_total,
                            'settings'  => $settings,
                            // 'sent_at' => date('Y-m-d H:i:s'),
                        ];
                $mailTo = $customer->email;
            }
            if($status == 2){
                $payment_token = Str::random(40);
                $this->commonmodel->crudOperation('U','tbl_product_order',['payment_token'=>$payment_token],['id'=>$id]);

                $paymentLink = url('/preorder-payment/' . $payment_token);

                $mailData['payment_link'] = $paymentLink;
                $mailData['sent_at'] =  date('Y-m-d H:i:s');

                if($order && $customer){
                    
                    Mail::send('emailer.payment_link_user', $mailData, function ($message) use ($mailTo){
                        $message->to($mailTo)
                                ->subject('Payment Link');
                    });
                    sleep(1);
                    Mail::send('emailer.payment_link_admin', $mailData, function ($message) use ($mailData){
                        $message->to(ADMIN_MAIL_TO)
                                ->subject('Payment Link Sent –'.$mailData['order_id']);
                    });
                }
            }
            if($status == 4){
                if($order && $customer){
                    Mail::send('emailer.order_shipped', $mailData, function ($message) use ($mailTo){
                            $message->to($mailTo)
                                    ->subject('Order Shipped');
                    });
                }
            }
            if($status == 5){
                if($order && $customer){
                    Mail::send('emailer.order_delivered_user', $mailData, function ($message) use ($mailTo){
                            $message->to($mailTo)
                                    ->subject('Order Delivered');
                    });
                    sleep(1);
                    Mail::send('emailer.order_delivered_admin', $mailData, function ($message) use ($mailData){
                        $message->to(ADMIN_MAIL_TO)
                                ->subject('Order Delivered –'.$mailData['order_id']);
                    });
                }
            }
            if($status == 6){
                $mailData['cancel_date'] = date('Y-m-d H:i:s');
                if($order && $customer){
                    Mail::send('emailer.order_cancelled', $mailData, function ($message) use ($mailTo){
                            $message->to($mailTo)
                                    ->subject('Order Cancelled');
                    });
                    sleep(1);
                    Mail::send('emailer.order_cancelled_by_admin', $mailData, function ($message) use ($mailData){
                        $message->to(ADMIN_MAIL_TO)
                                ->subject('Order Cancelled –'.$mailData['order_id']);
                    });
                }
            }
            if($updated){
                $request->session()->flash('message',['msg'=>'Status changed successfully!','type'=>'success']);
            }else{
                $request->session()->flash('message',['msg'=>'Something went wrong! Please Try After Sometimes...','type'=>'danger']);
            }
            return redirect()->back();

        }
        return redirect()->to('admin/all_orders');
        
    }
    
    public function delete_pre_order(Request $request, $id=null){
        if($id){
            if($this->commonmodel->crudOperation('D','tbl_product_order','',['id'=>$id])){
                $request->session()->flash('message',['msg'=>'Record Deleted.','type'=>'success']);
            }else{
                $request->session()->flash('message',['msg'=>'Please Try After Sometimes...','type'=>'danger']);
            }
        }
        return redirect()->to('admin/all_orders');
    }
     
}
