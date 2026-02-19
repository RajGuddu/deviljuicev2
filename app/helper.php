<?php
    use App\Services\CartService;

    if(!function_exists('alertBS')){
        function alertBS($message, $type){
            return '<div class="alert alert-'.$type.' alert-dismissible">
                        <strong class="text-primary">'.$message.'</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        }
    }

    if (!function_exists('cart')) {
        function cart()
        {
            return app(CartService::class);
        }
    }

    if (!function_exists('get_product_order_status')) {
        function get_product_order_status($value)
        {
            $status = '<span class="badge rounded-pill bg-primary">Pre-order Placed</span>';
            if($value == 2)
                $status = '<span class="badge rounded-pill bg-warning">Payment Requested</span>';
            elseif($value == 3)
                $status = '<span class="badge rounded-pill bg-success">Paid</span>';
            elseif($value == 4)
                $status = '<span class="badge rounded-pill bg-primary">Shipped</span>';
            elseif($value == 5)
                $status = '<span class="badge rounded-pill bg-success">Delivered</span>';
            elseif($value == 6)
                $status = '<span class="badge rounded-pill bg-danger">Pre-Order Canceled</span>';
            return $status;
        }
    }