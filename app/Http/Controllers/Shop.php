<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

use App\Services\CartService;
use App\Models\Common_model;
// use App\Traits\StripePaymentTrait;
use App\Traits\PaypalPaymentTrait;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\DB;

class Shop extends Controller
{
    // use StripePaymentTrait;
    use PaypalPaymentTrait;

    private $commonmodel;
    private $cart;
    public function __construct(CartService $cart){
        $this->commonmodel = new Common_model;
        $this->cart = $cart;
    }

    public function add_to_cart(Request $request){
        if($request->isMethod('POST')){
           $pro_id = $request->input('pro_id') ;
           $qty = $request->input('qty');

           $product =  $this->commonmodel->getOneRecord('tbl_product',['status'=>1,'pro_id'=>$pro_id]);
           $insert = 0;
           $isAddCart = 1;
           if($product){
            if(MAINTAIN_STOCK == 'Yes'){
                $cartItem = $this->cart->get($pro_id);
                if(!empty($cartItem)){
                    $stock = $cartItem['attributes']['stock'];
                    $oldqty = $cartItem['quantity'];
                }else{
                    $stock = $product->stock;
                    $oldqty = 0;
                }
                $newQty = $qty + $oldqty;
                if($newQty > $stock){
                    $isAddCart = 0;
                    $response['stockerr'] = true;
                    $response['message'] = 'Sorry, only '.$stock.' items are left. You have already added this to your cart.';
                }
            }
            if($isAddCart){
                $insert = $this->cart->add([
                    'id'      => $product->pro_id,
                    'name'    => $product->pro_name,
                    'quantity'     => $qty,
                    'price'   => $product->sp,
                    'attributes' => ['pro_id'=>$pro_id,
                                    'stock'=>$product->stock,
                                    'image' => $product->image1, 
                                    ]
                ]);
            }
           }
            $cart_count = $this->cart->getTotalQuantity();
            $checkoutUrl = 'javascript:void(0)';
            if($cart_count){    
                $checkoutUrl = url('checkout');
            }
            if($insert){
                $response['success'] = true;
            }else{
                $response['success'] = false;
            }
            $response['cart_count'] = $cart_count;
            $response['checkoutUrl'] = $checkoutUrl;
            echo json_encode($response); exit;
        }
        return redirect()->to('/');
    }
    public function updateQty(Request $request) {
        $response['success'] = false;
        $item = $this->cart->get($request->item_id);
        $stock = $item['attributes']['stock'];
        if($item) {
            $newQty = $item['quantity'] + $request->change;
            $updateQty = 1;
            if($newQty > 0) {
                if(MAINTAIN_STOCK == 'Yes'){
                    if($newQty > $stock){
                        $updateQty = 0;
                        $response = [
                            'success' => false,
                            'nostock' => true,
                            'message' => 'Sorry, only '.$stock.' items are currently available, and you’ve already added this item.',
                        ];
                    }
                }
                if($updateQty){
                    $update = $this->cart->update($request->item_id, $request->change);
                    if($update){
                        $updatedItem = $this->cart->get($request->item_id);
                        $response = [
                            'success' => true,
                            'cart_count' => $this->cart->getTotalQuantity(),
                            'newQty' => $updatedItem['quantity'],
                            'newSubtotal' => number_format($updatedItem->getPriceSum(),2),
                            'newTotal' => number_format($this->cart->getTotal(),2)
                        ];
                    }else{
                        $response = [
                            'success' => false,
                        ];
                    }
                }
            }
        }

        echo json_encode($response); exit;
    }
    /*public function checkout(Request $request){ // COD
        
        $data=[];
        if($request->isMethod('POST')){
            $m_id = session('m_id');
            if($request->input('address_option') == 'new'){
                $rules = [
                        'name'=>'required',
                        'phone'=>'required|numeric',
                        'address'=>'required',
                ];
                $errorMessage = [
                    'name.required'=>'Your full name is required',
                    'phone.required'=>'Phone is required',
                    'phone.numeric'=> 'You must enter numeric value',
                    'address.required'=>'Address is required'
                ];
                    
                $validation = $this->validate($request, $rules, $errorMessage);
                if($validation){
                    $post['m_id'] = $m_id;
                    $post['name'] = $request->input('name');
                    $post['phone'] = $request->input('phone');
                    $post['address'] = $request->input('address');
                    $post['status'] = 1;
                    $post['added_at'] = date('Y-m-d H:i:s');

                    $add_id = $this->commonmodel->crudOperation('C','tbl_member_address',$post);
                    // print_r($_POST); exit;
                    
                }
            }else{
                $add_id = $request->input('address_option');
            }

            $orderId = 'OD'.time().mt_rand(1000, 9999);
            $cart = cart();
            $totalitems = $cart->getTotalQuantity();
            $cartdata = $cart->getItems();
            $total = $cart->getTotal();
            if($totalitems < 1){
                $request->session()->flash('message',['msg'=> 'Something went wrong. Please Try Again...','type'=>'danger']);
                return redirect()->to(url('checkout'));
            }else{
                $k = 0;
                $product_details = array();
                foreach($cartdata as $data){
                    $product_details[$k]['id'] = $data['id'];
                    $product_details[$k]['name'] = $data['name'];
                    $product_details[$k]['price'] = $data['price'];
                    $product_details[$k]['quantity'] = $data['quantity'];
                    $product_details[$k]['subtotal'] = $data->getPriceSum();
                    $product_details[$k]['attributes'] = $data['attributes'];
                    $k++;
                }
                $orderData = array(
                    'm_id'=> $m_id,
                    'order_id' => $orderId,
                    'add_id' => $add_id,
                    
                    'product_details' => json_encode($product_details),
                    'total_qty' => $totalitems,
                    'net_total' => $total,
                    'status' => 1,
                    'orderdate' => date('Y-m-d H:i:s'),
                );
                $insertId = $this->commonmodel->crudOperation('C','tbl_product_order',$orderData);
                if($insertId){
                    /*$session = $this->createStripeCheckout([
                        'amount'      => $total * 100, // (in paise)
                        'name'        => 'Skin Canberra',
                        'description' => 'Product Payment',
                        'images'      => [],
                        'metadata'    => [
                                            'log_id' => $insertId,
                                            'txnId'  => 'TXN' . time() . rand(1000, 9999),
                                        ],
                        'success_url' => url('product-payment-success') . '?sid={CHECKOUT_SESSION_ID}',
                        'cancel_url'  => url('payment-cancel'),
                    ]);
                    return redirect($session->url); *
                    $cart->clear();
                    /*$member_info = $this->commonmodel->crudOperation('R1','tbl_member','',['m_id'=>$m_id]);
                    $sessionData = array(
                        'm_id' => $member_info->m_id,
                        'name' => $member_info->name,
                        'email' => $member_info->email,
                        'phone' => $member_info->phone,
                        'address' => $member_info->address,
                        'image' => $member_info->image,
                        'privilege_id' => $member_info->privilege_id,
                        'status' => $member_info->status,
                        'memberLogin' => true,
                    );
                    $request->session()->put($sessionData); *
                    $request->session()->flash('message',['msg'=> 'Your Items placed successfully','type'=>'success']);
                    
                }else{
                    $request->session()->flash('message',['msg'=> 'Something went wrong. Please Try Again...','type'=>'danger']);
                }
                return redirect()->to(url('member-orders'));

            }
        }
        if(session()->has('memberLogin')){
            $data['addresses'] = $this->commonmodel->crudOperation('RA','tbl_member_address','',[['m_id','=',session('m_id')],['status','=',1]]);
        }
        return view('checkout',$data);
    }*/

    /*public function checkout(Request $request){ // Paypal Payment redirect another page
        
        $data=[];
        if($request->isMethod('POST')){
            $m_id = session('m_id');
            if($request->input('address_option') == 'new'){
                $rules = [
                        'name'=>'required',
                        'phone'=>'required|numeric',
                        'address'=>'required',
                ];
                $errorMessage = [
                    'name.required'=>'Your full name is required',
                    'phone.required'=>'Phone is required',
                    'phone.numeric'=> 'You must enter numeric value',
                    'address.required'=>'Address is required'
                ];
                    
                $validation = $this->validate($request, $rules, $errorMessage);
                if($validation){
                    $post['m_id'] = $m_id;
                    $post['name'] = $request->input('name');
                    $post['address'] = $request->input('address');
                    $post['phone'] = $request->input('phone');
                    $post['zipcode'] = $request->input('zipcode');
                    $post['city'] = $request->input('city');
                    $post['state'] = $request->input('state');
                    $post['landmark'] = $request->input('landmark');
                    $post['alt_phone'] = $request->input('alt_phone');
                    $post['status'] = 1;
                    $post['added_at'] = date('Y-m-d H:i:s');

                    $add_id = $this->commonmodel->crudOperation('C','tbl_member_address',$post);
                    // print_r($_POST); exit;
                    
                }
            }else{
                $add_id = $request->input('address_option');
            }

            $orderId = 'OD'.time().mt_rand(1000, 9999);
            $cart = cart();
            $totalitems = $cart->getTotalQuantity();
            $cartdata = $cart->getItems();
            $total = $cart->getTotal();
            if($totalitems < 1){
                $request->session()->flash('message',['msg'=> 'Something went wrong. Please Try Again...','type'=>'danger']);
                return redirect()->to(url('checkout'));
            }else{
                $k = 0;
                $product_details = array();
                foreach($cartdata as $data){
                    $product_details[$k]['id'] = $data['id'];
                    $product_details[$k]['name'] = $data['name'];
                    $product_details[$k]['price'] = $data['price'];
                    $product_details[$k]['quantity'] = $data['quantity'];
                    $product_details[$k]['subtotal'] = $data->getPriceSum();
                    $product_details[$k]['attributes'] = $data['attributes'];
                    $k++;
                }
                $orderData = array(
                    'm_id'=> $m_id,
                    'order_id' => $orderId,
                    'add_id' => $add_id,
                    
                    'product_details' => json_encode($product_details),
                    'total_qty' => $totalitems,
                    'net_total' => $total,
                    'status' => 1,
                    'orderdate' => date('Y-m-d H:i:s'),
                );
                $this->commonmodel->crudOperation('D','tbl_product_order_temp');
                $insertId = $this->commonmodel->crudOperation('C','tbl_product_order_temp',$orderData);
                if($insertId){
                    $cart->clear();
                    return redirect($this->createPaypalCheckout([
                        'amount'      => $total,
                        'reference_id' => $insertId.'|'.$orderId,
                        'success_url' => url('product-payment-success'),
                        'cancel_url'  => url('payment-cancel'),
                    ]));
                    
                }else{
                    $request->session()->flash('message',['msg'=> 'Something went wrong. Please Try Again...','type'=>'danger']);
                }
                return redirect()->to(url('member-orders'));

            }
        }
        if(session()->has('memberLogin')){
            $data['addresses'] = $this->commonmodel->crudOperation('RA','tbl_member_address','',[['m_id','=',session('m_id')],['status','=',1]]);
        }
        return view('checkout',$data);
    }*/
    public function save_address(Request $request){
        if($request->isMethod('POST')){
            $m_id = session('m_id');
            if($request->input('address_option') == 'new'){
                $rules = [
                        'name'=>'required',
                        'last_name'=>'required',
                        'email'=>'required|email',
                        'phone'=>'required|numeric',
                        'city'=>'required',
                        'state'=>'required',
                        'zipcode'=>'required',
                        'address'=>'required',
                ];
                $errorMessage = [
                    'name.required'=>'Your first name is required',
                    'last_name.required'=>'Your Last name is required',
                    'phone.required'=>'Phone is required',
                    'phone.numeric'=> 'You must enter numeric value',
                    'address.required'=>'Address is required'
                ];
                    
                $validation = $this->validate($request, $rules, $errorMessage);
                if($validation){
                    $post['m_id'] = $m_id;
                    $post['name'] = $request->input('name');
                    $post['last_name'] = $request->input('last_name');
                    $post['email'] = $request->input('email');
                    $post['code'] = $request->input('code');
                    $post['phone'] = $request->input('phone');
                    $post['city'] = $request->input('city');
                    $post['state'] = $request->input('state');
                    $post['zipcode'] = $request->input('zipcode');
                    $post['address'] = $request->input('address');
                    $post['landmark'] = $request->input('landmark');
                    $post['alt_code'] = $request->input('alt_code');
                    $post['alt_phone'] = $request->input('alt_phone');
                    $post['status'] = 1;
                    $post['added_at'] = date('Y-m-d H:i:s');

                    $add_id = $this->commonmodel->crudOperation('C','tbl_member_address',$post);
                    // print_r($_POST); exit;
                    if($add_id){
                        $request->session()->flash('message',['msg'=> 'Address saved successfully. Please proceed to checkout.','type'=>'success']);
                        return redirect()->to(url('checkout'));
                    }
                    
                }
            }
        }
        return redirect()->back();
    }
    public function get_cart_amount(Request $request){
        if (!$request->ajax()) {
            return redirect()->back();
        }
        $cart = cart();
        // $totalitems = $cart->getTotalQuantity();
        // $cartdata = $cart->getItems();
        $total = $cart->getTotal();
        $amount = number_format($total, 2, '.', ''); 
        // $order_id = 'ORD'.time(); 

        return response()->json([
            'amount' => $amount,
            // 'order_id' => $order_id
        ]);
    }
    public function checkout(Request $request){ // checkout without payment
        
        $data=[];
        if($request->isMethod('POST')){
            // $details = $request->all();
            if($request->input('pre_order')){
                $m_id = session('m_id');
                
                $add_id = $request->input('address');

                $orderId = 'OD'.time().mt_rand(1000, 9999);
                $cart = cart();
                $totalitems = $cart->getTotalQuantity();
                $cartdata = $cart->getItems();
                $total = $cart->getTotal();
                
                $k = 0;
                $product_details = array();
                foreach($cartdata as $data){
                    $product_details[$k]['id'] = $data['id'];
                    $product_details[$k]['name'] = $data['name'];
                    $product_details[$k]['price'] = $data['price'];
                    $product_details[$k]['quantity'] = $data['quantity'];
                    $product_details[$k]['subtotal'] = $data->getPriceSum();
                    $product_details[$k]['attributes'] = $data['attributes'];
                    $k++;
                }
                $orderData = array(
                    'm_id'=> $m_id,
                    'order_id' => $orderId,
                    'add_id' => $add_id,
                    
                    'product_details' => json_encode($product_details),
                    'total_qty' => $totalitems,
                    'net_total' => $total,
                    'status' => 1,
                    'orderdate' => date('Y-m-d H:i:s'),

                    /*'payment_mode' => 'Paypal',
                    'payment_status' => $details['status'],
                    'txnId' => $details['id'],*/
                );
                // $this->commonmodel->crudOperation('D','tbl_product_order_temp');
                $insertId = $this->commonmodel->crudOperation('C','tbl_product_order',$orderData);

                if($insertId){
                    $cart->clear();
                    //store payment log
                    /*$ptData['pay_from'] = 'Product';
                    $ptData['order_id'] = $orderId;
                    $ptData['paid_amount'] = $total;
                    $ptData['payment_mode'] ='Paypal';
                    $ptData['payment_status'] = $details['status'];
                    // $ptData['paymentIntentId'] = $tempData['paymentIntentId'];
                    $ptData['txnId'] = $details['id'];
                    $ptData['added_at'] = date('Y-m-d H:i:s');
                    $this->commonmodel->crudOperation('C','tbl_payment_transaction',$ptData);*/

                    //update product stock
                    // $product_details = json_decode($product_details);
                    /*foreach($product_details as $pro){
                        $pro_id = $pro['id'];
                        $qty = $pro['quantity'];
                        DB::table('tbl_product')
                            ->where('pro_id', $pro_id)
                            ->decrement('stock', $qty);
                    }*/


                    $mailData = [
                        'client_name'   => session('m_name'),
                        'client_email'   => session('m_email'),
                        'order_id'  => $orderId,
                        'amount'  => $total,
                        // 'payment_mode'  => 'Paypal',
                        'order_date' => date('Y-m-d H:i:s'),
                    ];
                    $mailTo = session('m_email');
                    Mail::send('emailer.pre_order_confirm', $mailData, function ($message) use ($mailTo){
                        $message->to($mailTo)
                                ->subject('Pre Order Confirmation');
                    });
                    sleep(1);
                    Mail::send('emailer.pre_order_received', $mailData, function ($message) use ($mailData){
                        $message->to(ADMIN_MAIL_TO)
                                ->subject('New Pre-Order Received –'.$mailData['order_id']);
                    });

                }
                $request->session()->flash('message',['msg'=>'Pre-order placed successfully!','type'=>'success']);
                return response()->json(['status' => 'success']);

            }
        }
        if(session()->has('memberLogin')){
            $data['addresses'] = $this->commonmodel->crudOperation('RA','tbl_member_address','',[['m_id','=',session('m_id')],['status','=',1]],['add_id','DESC']);
        }
        return view('new_checkout',$data);
    }
    public function preorder_payment(Request $request, $token){
        $order = $this->commonmodel->crudOperation('R1','tbl_product_order','',[['status','=',2],['payment_token','=',$token]]);
        $data['order'] = $order;
        if($order){
            $m_id = $order->m_id ?? '';
            $data['customer'] = $this->commonmodel->crudOperation('R1','tbl_member','',['m_id'=>$m_id]);
        }
        return view('preorder_payment', $data);
    }
    public function createPaypalOrder(Request $request){
        $request->validate([
            'order_id' => 'required|integer'
        ]);
        $order_id = $request->order_id;

        $order = $this->commonmodel->crudOperation('R1','tbl_product_order','',[['id','=',$order_id]]);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        // Create PayPal order (amount from DB)
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => (string) $order->id,
                "amount" => [
                    "currency_code" => "USD",
                    "value" => number_format($order->net_total, 2, '.', '')
                ]
            ]]
        ]);

        // Save PayPal order ID in DB
        if (isset($response['id'])) {
            
            $this->commonmodel->crudOperation('U','tbl_product_order',['paypal_order_id'=>$response['id']],[['id','=',$order_id]]);

            return response()->json([
                'id' => $response['id']
            ]);
        }

        return response()->json([
            'error' => 'Unable to create PayPal order'
        ], 500);
    }
    public function capturePaypalOrder(Request $request){
        
        // Validate request
        $request->validate([
            'orderID' => 'required|string'
        ]);

        $order = $this->commonmodel->crudOperation('R1','tbl_product_order','',[['paypal_order_id','=',$request->orderID]]);
        $m_id = $order->m_id ?? '';
        $customer = $this->commonmodel->crudOperation('R1','tbl_member','',['m_id'=>$m_id]);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->orderID);

        if (
            isset($response['status']) &&
            $response['status'] === 'COMPLETED' &&
            isset($response['purchase_units'][0]['payments']['captures'][0]['amount']['value']) &&
            $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'] == $order->net_total
        ) {

            $payData = array(
                'status' => 3,
                'payment_mode' => 'Paypal',
                'payment_status' => $response['status'],
                'payment_details' => json_encode($response),
            );
            $this->commonmodel->crudOperation('U','tbl_product_order',$payData,[['paypal_order_id','=',$request->orderID]]);

            $mailData = [
                'client_name'   => ucwords($customer->name),
                'order_id'  => $order->order_id,
                'amount'  => $order->net_total,
                'payment_mode'  => 'Paypal',
                'date_time' => date('Y-m-d H:i:s'),
            ];
            
            /*$mailTo = $customer->email;
            Mail::send('emailer.payment_received_user', $mailData, function ($message) use ($mailTo){
                $message->to($mailTo)
                        ->subject('Payment Confirmation');
            });
            sleep(1);*/
            Mail::send('emailer.payment_received_admin', $mailData, function ($message) use ($mailData){
                $message->to(ADMIN_MAIL_TO)
                        ->subject('Payment Received –'.$mailData['order_id']);
            });

            return response()->json([
                'status' => 'success'
            ]);
        }

        return response()->json([
            'status' => 'failed'
        ], 400);
    }
    
    /*public function product_payment_success(Request $request){
        $result = $this->verifyPaypalSuccess($request->token);
        // echo '<pre>'; print_r($result); 
        if($result['success'] && $result['status'] == 'COMPLETED'){
            // echo '<pre>'; print_r($result);
            $order_id = $result['order_id'];
            $order_idExists = $this->commonmodel->isExists('tbl_product_order', ['order_id'=>$order_id]);
            if($order_idExists){
                return redirect()->to(url('/'));
            }
            $paymentMode = $result['payment_mode'];
            $temp_id = $result['temp_id'];
            $txnId = $result['txnId'];

            $tempData = $this->commonmodel->getOneRecordArray('tbl_product_order_temp',['temp_id'=>$temp_id]);
            if($tempData){
                unset($tempData['temp_id']);
                $tempData['payment_mode'] = $paymentMode;
                $tempData['payment_status'] = 'COMPLETED';
                // $tempData['paymentIntentId'] = $paymentIntentId;
                $tempData['txnId'] = $txnId;

                $insertId = $this->commonmodel->crudOperation('C','tbl_product_order',$tempData);
                if($insertId){
                    cart()->clear();
                    //store payment log
                    $ptData['pay_from'] = 'Product';
                    $ptData['order_id'] = $tempData['order_id'];
                    $ptData['paid_amount'] = $tempData['net_total'];
                    $ptData['payment_mode'] = $tempData['payment_mode'];
                    $ptData['payment_status'] = $tempData['payment_status'];
                    // $ptData['paymentIntentId'] = $tempData['paymentIntentId'];
                    $ptData['txnId'] = $tempData['txnId'];
                    $ptData['added_at'] = date('Y-m-d H:i:s');
                    $this->commonmodel->crudOperation('C','tbl_payment_transaction',$ptData);

                    //update product stock
                    $product_details = json_decode($tempData['product_details']);
                    foreach($product_details as $pro){
                        $pro_id = $pro->id;
                        $qty = $pro->quantity;
                        DB::table('tbl_product')
                            ->where('pro_id', $pro_id)
                            ->decrement('stock', $qty);
                    }


                    $mailData = [
                        'client_name'   => session('name'),
                        'order_id'  => $tempData['order_id'],
                        'amount'  => $tempData['net_total'],
                        'payment_mode'  => $tempData['payment_mode'],
                        'date_time' => date('Y-m-d H:i:s'),
                    ];
                    $mailTo = session('email');
                    Mail::send('emailer.order_confirm', $mailData, function ($message) use ($mailTo){
                        $message->to($mailTo)
                                ->subject('Your Order Confirmation');
                    });
                    sleep(1);
                    Mail::send('emailer.order_received', $mailData, function ($message) use ($mailData){
                        $message->to(ADMIN_MAIL_TO)
                                ->subject('New Order Received –'.$mailData['order_id']);
                    });
                    
                }

            }
            return redirect()->to(url('payment-success'));

        }else{
            return redirect()->to(url('payment-cancel'));
        }
    }*/
    public function remove_item(Request $request, $id){
        if($this->cart->remove($id)){
            $request->session()->flash('message',['msg'=>'Item removed successfully!','type'=>'success']);
        }else{
            $request->session()->flash('message',['msg'=>'Something went wrong!','type'=>'danger']);
        }
        return redirect()->to('/checkout');
    }
    /*********************teting****************************** */
    
    public function new_checkout(){
        return view('new_checkout');
    }
    // test1
    public function paypal_pay_pop(){
        $data['intent'] = json_decode('{"id":"72F258092V155761Y","status":"COMPLETED","payment_source":{"paypal":{"email_address":"test152@yopmail.com","account_id":"KJVXBJ9LA2VH4","account_status":"UNVERIFIED","name":{"given_name":"John","surname":"Doe"},"address":{"country_code":"US"}}},"purchase_units":[{"reference_id":"10","shipping":{"name":{"full_name":"John Doe"},"address":{"address_line_1":"San Jose","admin_area_2":"san jose","admin_area_1":"CA","postal_code":"95131","country_code":"US"}},"payments":{"captures":[{"id":"2EJ576032L264964D","status":"COMPLETED","amount":{"currency_code":"USD","value":"369.97"},"final_capture":true,"seller_protection":{"status":"ELIGIBLE","dispute_categories":["ITEM_NOT_RECEIVED","UNAUTHORIZED_TRANSACTION"]},"seller_receivable_breakdown":{"gross_amount":{"currency_code":"USD","value":"369.97"},"paypal_fee":{"currency_code":"USD","value":"13.40"},"net_amount":{"currency_code":"USD","value":"356.57"}},"links":[{"href":"https:\/\/api.sandbox.paypal.com\/v2\/payments\/captures\/2EJ576032L264964D","rel":"self","method":"GET"},{"href":"https:\/\/api.sandbox.paypal.com\/v2\/payments\/captures\/2EJ576032L264964D\/refund","rel":"refund","method":"POST"},{"href":"https:\/\/api.sandbox.paypal.com\/v2\/checkout\/orders\/72F258092V155761Y","rel":"up","method":"GET"}],"create_time":"2026-02-14T13:20:13Z","update_time":"2026-02-14T13:20:13Z"}]}}],"payer":{"name":{"given_name":"John","surname":"Doe"},"email_address":"test152@yopmail.com","payer_id":"KJVXBJ9LA2VH4","address":{"country_code":"US"}},"links":[{"href":"https:\/\/api.sandbox.paypal.com\/v2\/checkout\/orders\/72F258092V155761Y","rel":"self","method":"GET"}]}');
        return view('test_card_popup_pay', $data);
    }
    public function createOrder1(Request $request){
        $amount = Session::get('cart_amount', 0); 
        $order_id = 'ORD'.time(); 

        return response()->json([
            'amount' => $amount,
            'order_id' => $order_id
        ]);
    }
    public function savePayment(Request $request){
        $details = json_encode($request->all());
        $this->commonmodel->crudOperation('C','paypal_test',['details'=>$details]);
        return response()->json(['status' => 'success']);
    }
    public function set_cart(Request $request){
        $amount = $request->input('amount');

        Session::put('cart_amount', $amount);
        // Session::put('cart_amount', 0);
        session()->save();

        return response()->json(['status' => 'success']);
    }

    //test2
    public function card_checkout(){
        return view('test_card_payment');
    }
    public function createOrder(){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $order = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "50.00"
                    ]
                ]
            ]
        ]);

        return response()->json([
            'order_id' => $order['id']
        ]);
    }
    public function captureOrder(Request $request){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->orderID);

        if ($response['status'] === 'COMPLETED') {
            return response()->json([
                'success' => true,
                'transaction_id' => $response['id']
            ]);
        }

        return response()->json([
            'success' => false
        ], 400);
    }

    

    public function paypal_pay(){

        return redirect($this->createPaypalCheckout([
            'amount'      => 50,
            'reference_id' => '102|ORD102',
            'success_url' => url('paypal-success'),
            'cancel_url'  => url('paypal-cancel'),
        ]));
        /*$provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel'),
            ],
            "purchase_units" => [
                [
                    // "custom_id"    => '102|ord102',
                    "reference_id" => '101|ord101',
                    // "description" => "Order payment",
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "10.00"
                    ]
                ]
            ]
        ]);

        if (isset($response['links'])) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect($link['href']);
                }
            }
        }

        return "Something went wrong";*/
    }
    public function paypal_success(Request $request)
    {
        $response = $this->verifyPaypalSuccess($request->token);
        print_r($response);
        exit;
    }

    public function paypal_cancel()
    {
        return "Payment Cancelled";
    }
    public function paypal_notify()
    {
        return "Payment Notify";
    }

    public function pay(){
        return view('stripe_payment_test');
    }
    public function payment(Request $request)
    {
        $session = $this->createStripeCheckout([
            'amount'      => 5000, // 50 INR (in paise)
            'name'        => 'Service Charge',
            'description' => 'Waxing (Side Locks)',
            'images'      => [url('assets/uploads/images/svariant-qMcBCv49.webp')],
            'metadata'    => [
                                'order_id' => 1234,
                                'user_id'  => 56,
                                'my_note'  => "This is demo note",
                            ],
            'success_url' => url('/stripe-success') . '?sid={CHECKOUT_SESSION_ID}',
            'cancel_url'  => url('/stripe-cancel'),
        ]);
        /*\Stripe\Stripe::setApiKey(STRIPE_SECRET);
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'inr',
                    'product_data' => [
                        'name' => 'Service Charge',
                        'description' => 'Waxing (Side Locks)',
                        'images' => ['http://localhost/laravel/skincanberra/assets/uploads/images/svariant-AoeDN62a.webp'],
                    ],
                    'unit_amount' => 5000, // 50 INR (5000 paise)
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'metadata' => [
                'order_id' => 1234,
                'user_id'  => 56,
                'my_note'  => "This is demo note",
            ],
            'success_url' => url('/stripe-success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => url('/stripe-cancel'),
        ]); */
        // echo '<pre>'; var_dump($session); exit;

        return redirect($session->url);
    }
    public function _success(Request $request){
        $sessionId = $request->get('sid');
        
        $result = $this->verifyStripeSuccess($sessionId);

        if($result['success'] && $result['status'] == 'succeeded'){
            echo '<pre>'; print_r($result);
            // return redirect()->to(url('thank-you'));

        }else{
            echo 'Payment fail';
        }


        /*\Stripe\Stripe::setApiKey(STRIPE_SECRET);

        $session = \Stripe\Checkout\Session::retrieve($sessionId);

        if ($session->payment_status !== 'paid') {
            return redirect('/'); // refresh रोक दिया
        }

        $paymentIntent = \Stripe\PaymentIntent::retrieve($session->payment_intent);
        echo '<pre>'; var_dump($paymentIntent); 

        $order_id = $session->metadata->order_id;
        $user_id  = $session->metadata->user_id;
        $note     = $session->metadata->my_note;
        echo $order_id.' '.$user_id.' '.$note;
        return $paymentIntent->status;*/
    }
    // public function success(){
    //     echo 'Payment Successful';
    // }
    public function cancel(){
        echo 'payment cancel';
    }
    public function testcart1(){
        // $product =  $this->commonmodel->get_product_for_cart(2, 3);
        // echo '<pre>';
        // print_r($product); exit;
        // $this->cart->clear();
        $this->cart->add([
            'id'      => 4,
            'name'    => 'mango',
            'quantity'     => 1,
            'price'   => 100,
            'attributes' => ['size' => 'L', 'color' => 'Red']
        ]);
        // $cart->update(1,2);
        $items = $this->cart->getItems();
        echo '<pre>';print_r($items);
        // echo $items[1]['name'];
        echo $this->cart->getSubTotal();
    }
    public function view_cart(){
        // $this->cart->clear();
        $items = $this->cart->getItems();
        echo '<pre>';print_r($items);
    }
}