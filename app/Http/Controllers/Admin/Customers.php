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
use App\Models\Common_model;
// use App\Models\ServiceVariantsModel;

class Customers extends Controller
{
    private $commonmodel;
    public function __construct(){
        $this->commonmodel = new Common_model;
    }
    public function index(Request $request){
        
        $data['customers'] = $this->commonmodel->crudOperation('RA','tbl_member','','',['m_id','DESC']);
        if ($request->isMethod('POST') && isset($_POST['search'])){
            // $data['contactList'] = $this->commonmodel->crudOperation('RA','tbl_contact','','',['id','DESC']);
            // print_r($_POST);exit;
            // $id = $_POST['id'];
            // $post['status'] = $_POST['status'];
            // $updated = $this->commonmodel->crudOperation('U','tbl_contact_us', $post, ['id'=>$id]);
            // if($updated){
            //     $request->session()->flash('message', ['msg'=>'Record Updated Successfully', 'type'=>'success']);
            // }else{
            //     $request->session()->flash('message', ['msg'=>'Record Not Update. Please try again...', 'type'=>'danger']);
            // }
            // return redirect()->to(url(ADMIN.'-contact_us'));
        }
        
        return view('admin.customers.cIndex', $data);
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
            if($order && $customer){
                $mailData = [
                            'client_name'   => ucwords($customer->name),
                            'client_email'   => $customer->email,
                            'order_id'  => $order->order_id,
                            'amount'  => $order->net_total,
                            // 'payment_link'  => $paymentLink,
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
            if($status == 6){
                $mailData['cancel_date'] = date('Y-m-d H:i:s');
                if($order && $customer){
                    Mail::send('emailer.order_cancelled', $mailData, function ($message) use ($mailTo){
                            $message->to($mailTo)
                                    ->subject('Order Cancelled');
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
    public function all_orders(Request $request){
        $data['pageTitle'] = 'All Pre-Orders';
        // $data['customer'] = $this->commonmodel->crudOperation('R1','tbl_member','',['m_id'=>$id]);
        $search = $request->search ?? null;
        $data['orders'] = $this->commonmodel->get_all_new_product_order(null, $search);
        // echo '<pre>'; print_r($data['orders']); exit;
        return view('admin.customers.new_orders', $data);
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
     /*public function variants(Request $request, $id=null,$vid=null){
        $data = [];
        if($request->isMethod('POST')){
            $validated = $this->validate($request, [
                'v_name' => 'required',
                'v_url' => 'required',
                'mrp' => 'required|integer',
                'sp' => 'required|integer|lte:mrp',
            ],
            [
                'v_url.required' => 'Url is required',
            ]);
            if($validated){
                // print_r($_POST); exit;
                    if($request->hasFile('photo')){
                        if ($request->file('photo')->isValid()) {

                            $file = $request->file('photo');
                            do {
                                $webpFilename = 'svariant-'. Str::random(8) .'.webp';
                                $exists = ServiceVariantsModel::where('photo', $webpFilename)->exists();
                            } while ($exists);
                            $image = Image::make($file)->encode('webp', 80);
                            $path = Storage::disk('public_root')->put('images/'. $webpFilename, (string) $image);
                            if($path){
                                if (isset($_POST['photo2']) && !empty($_POST['photo2'])) {
                                    Storage::disk('public_root')->delete('images/' . $_POST['photo2']);
                                }
                                $post['photo'] = $webpFilename;
                            }
                        }
                    }
                    $post['sv_id'] = $id;
                    $post['v_name'] = $request->input('v_name');
                    $post['v_url'] = $request->input('v_url');
                    $post['mrp'] = $request->input('mrp');
                    $post['sp'] = $request->input('sp');
                    $post['details'] = $request->input('details');
                    $post['status'] = $request->input('status');
                    if(!$vid){
                        $post['added_at'] = date('Y-m-d H:i:s');
                        $inserted = ServiceVariantsModel::create($post);

                    }else{
                        $post['update_at'] = date('Y-m-d H:i:s');
                        $updated = ServiceVariantsModel::where('vid',$vid)->update($post);
                    }
                    if(isset($inserted)){
                        $request->session()->flash('message',['msg'=>'Variants added successfully!','type'=>'success']);
                    }elseif(isset($updated)){
                        $request->session()->flash('message',['msg'=>'Variants updated successfully!','type'=>'success']);
                    }else{
                        $request->session()->flash('message',['msg'=>'Please Try After Sometimes...','type'=>'danger']);
                    }

                    return redirect()->to('admin/variants/'.$id);
            }
        }
        if($vid){
            $data['variant'] = ServiceVariantsModel::where('vid', $vid)->first();
        }
        $data['service'] = ServiceModel::where('sv_id', $id)->first();
        $data['variants'] = ServiceVariantsModel::where('sv_id', $id)->orderBy('vid','desc')->get();
        return view('admin.services.variantsIndex', $data);
    }
    public function delete_variants(Request $request, $id=null, $vid=null){
        if($id){
            $record = ServiceVariantsModel::where([['vid','=',$vid],['sv_id','=',$id]])->first();
            if($record){
                $imagePath = public_path('assets/uploads/images/' . $record->photo);
                if (!empty($record->photo) && File::exists($imagePath)) {
                    File::delete($imagePath);
                }
                if(ServiceVariantsModel::where('vid', $vid)->delete()){

                    $request->session()->flash('message',['msg'=>'Record Deleted.','type'=>'success']);
                }else{
                    $request->session()->flash('message',['msg'=>'Please Try After Sometimes...','type'=>'danger']);
                }
            }
        }
        return redirect()->to('admin/variants/'.$id);
    }*/
}
