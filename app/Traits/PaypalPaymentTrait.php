<?php

namespace App\Traits;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;

use Exception;

trait PaypalPaymentTrait
{
    
    public function createPaypalCheckout(array $data = null)
    {
        
        $amount      = number_format($data['amount'], 2, '.', '');
        $reference_id        = $data['reference_id'];
        // $description = $data['description'];
        $success_url = $data['success_url'];
        $cancel_url  = $data['cancel_url'];

        try{
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $token = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => $success_url,
                    "cancel_url" => $cancel_url,
                ],
                "purchase_units" => [
                    [
                        "reference_id" => $reference_id,
                        "amount" => [
                            "currency_code" => PAYPAL_CURRENCY,
                            "value" => $amount
                        ]
                    ]
                ]
            ]);

            if (isset($response['links'])) {
                foreach ($response['links'] as $link) {
                    if ($link['rel'] === 'approve') {
                        return $link['href'];
                    }
                }
            }
        }

        catch (Exception $e) {
            // Other errors
            return back()->with('error', 'Unexpected error! Please try later.');
        }
    }

    public function verifyPaypalSuccess($token){

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($token);

        if ($response['status'] === 'COMPLETED') {
            $reference_id = explode('|', $response['purchase_units'][0]['reference_id']);
            return ([
                'success' => true,
                'status' => $response['status'],
                'txnId' => $response['id'],
                'payment_mode' => 'Paypal',
                'temp_id' => $reference_id[0] ?? '',
                'order_id' => $reference_id[1] ?? '',
                
            ]);
            
        }else{
            return ([
                'success' => false,
                'status' => $response['status'],
            ]);
        }
       
    }
}
