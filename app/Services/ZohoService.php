<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ZohoService
{
    public function getAccessToken()
    {
        $response = Http::asForm()->post('https://accounts.zoho.com/oauth/v2/token', [
            'refresh_token' => env('ZOHO_REFRESH_TOKEN'),
            'client_id' => env('ZOHO_CLIENT_ID'),
            'client_secret' => env('ZOHO_CLIENT_SECRET'),
            'grant_type' => 'refresh_token',
        ]);

        return $response->json()['access_token'];
    }

    public function createLead($data)
    {
        $token = $this->getAccessToken();

        return Http::withToken($token)
            ->post(env('ZOHO_API_DOMAIN') . '/crm/v2/Leads', [
                'data' => [$data]
            ])
            ->json();
    }

    public function createContact($data)
    {
        $token = $this->getAccessToken();

        return Http::withToken($token)
            ->post(env('ZOHO_API_DOMAIN') . '/crm/v2/Contacts', [
                'data' => [$data]
            ])
            ->json();
    }

    /********************************************Sales Order************************************** */
    public function createSalesOrder($data){
        $token = $this->getAccessToken();

        $response = Http::withToken($token)
            ->post(env('ZOHO_API_DOMAIN') . '/crm/v2/Sales_Orders', [
                'data' => [
                    [
                        'Subject' => $data['subject'],
                        'Account_Name' => $data['Account_Name'],
                        'Product_Details' => $data['Product_Details'],
                        'Total' => $data['total'],
                        'Status' => $data['status'] ?? 'Created'
                    ]
                ]
            ])
            ->json();
        return $response['data'][0]['details']['id'] ?? null;
    }
    public function changeStatusSalesOrder($salesOrderId, $data){
        $token = $this->getAccessToken();

        $response = Http::withToken($token)
            ->put(env('ZOHO_API_DOMAIN') . '/crm/v2/Sales_Orders/'.$salesOrderId, [
                'data' => [
                    [
                        'Status' => $data['status'] ?? ''
                    ]
                ]
            ])
            ->json();
        return $response['data'][0]['details']['id'] ?? null;
    }
/********************************************************************************************** */
/*********************************Account****************************************************** */
    public function createAccount($data){
        $token = $this->getAccessToken();

        $payload = [
            'data' => [
                [
                    'Account_Name' => $data['name'],
                    'Website' => $data['website'] ?? null,
                    'Phone' => $data['phone'] ?? null,
                    'Billing_Street' => $data['street'] ?? null,
                    'Billing_City' => $data['city'] ?? null,
                    'Billing_State' => $data['state'] ?? null,
                    'Billing_Country' => $data['country'] ?? null,
                    'Industry' => $data['industry'] ?? null,
                ]
            ]
        ];

        $response = Http::withToken($token)
            ->post(env('ZOHO_API_DOMAIN') . '/crm/v2/Accounts', $payload)
            ->json();

        // Return new Account ID
        return $response['data'][0]['details']['id'] ?? null;
    } 
    public function updateAccount($accountId, $data){
        $token = $this->getAccessToken();

        $payload = [
            'data' => [
                [
                    'Account_Name' => $data['name'],
                    'Website' => $data['website'] ?? null,
                    'Phone' => $data['phone'] ?? null,
                    'Billing_Street' => $data['street'] ?? null,
                    'Billing_City' => $data['city'] ?? null,
                    'Billing_State' => $data['state'] ?? null,
                    'Billing_Country' => $data['country'] ?? null,
                    'Industry' => $data['industry'] ?? null,
                ]
            ]
        ];

        $response = Http::withToken($token)
            ->put(env('ZOHO_API_DOMAIN') . '/crm/v2/Accounts/'.$accountId, $payload)
            ->json();

        // Return Account ID
        return $response['data'][0]['details']['id'] ?? null;
    } 
    /******************************************************************************************* */
    /****************************************Products******************************************* */
    public function addProduct($data){
        $token = $this->getAccessToken();

        $payload = [
            'data' => [
                [
                    'Product_Name' => $data['product_name'],
                    'Product_Code' => $data['product_code'] ?? null,
                    'Unit_Price' => $data['unit_price'] ?? null,
                    'Product_Active' => $data['product_active'] ?? false,
                ]
            ]
        ];

        $response = Http::withToken($token)
            ->post(env('ZOHO_API_DOMAIN') . '/crm/v2/Products', $payload)
            ->json();

        // Return new Account ID
        return $response['data'][0]['details']['id'] ?? null;
        // print_r($response); exit;
    }
    public function updateProduct($productId, $data){
        $token = $this->getAccessToken();

        $payload = [
            'data' => [
                [
                    'Product_Name' => $data['product_name'],
                    'Product_Code' => $data['product_code'] ?? null,
                    'Unit_Price' => $data['unit_price'] ?? null,
                    'Product_Active' => $data['product_active'] ?? false,
                ]
            ]
        ];

        $response = Http::withToken($token)
            ->put(env('ZOHO_API_DOMAIN') . '/crm/v2/Products/'.$productId, $payload)
            ->json();

        // Return new Account ID
        return $response['data'][0]['details']['id'] ?? null;
        // return $response;
    }
    /******************************************************************************************* */
}