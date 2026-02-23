<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Common_model;

class Dashboard extends Controller
{
    private $commonmodel;
    public function __construct(){
        $this->commonmodel = new Common_model;
    }
    public function index(){
        $data['Products'] = $this->commonmodel->getCountRecord('tbl_product', [['status','=',1]]);
        $data['newOrdersCount'] = $this->commonmodel->get_all_new_product_order(1)->count();
        $data['prOrdersCount'] = $this->commonmodel->get_all_new_product_order(2)->count();
        $data['paidOrdersCount'] = $this->commonmodel->get_all_new_product_order(3)->count();
        $data['shippedOrdersCount'] = $this->commonmodel->get_all_new_product_order(4)->count();
        $data['deliveredOrdersCount'] = $this->commonmodel->get_all_new_product_order(5)->count();
        $data['canceledOrdersCount'] = $this->commonmodel->get_all_new_product_order(6)->count();
        // $data['Services'] = $this->commonmodel->getCountRecord('tbl_services', [['status','=',1]]);
        // $data['Courses'] = $this->commonmodel->getCountRecord('tbl_courses', [['status','=',1]]);
        // $data['Booking'] = $this->commonmodel->getCountRecord('tbl_service_book_online', [['status','!=',3]]);

        // $data['BookingDeclined'] = $this->commonmodel->getCountRecord('tbl_service_book_online', [['status','=',3]]);
        // $data['salesCourses'] = $this->commonmodel->getCountRecord('tbl_purchased_course');
        // $data['orderReceived'] = $this->commonmodel->getCountRecord('tbl_product_order', [['status','!=',3],['status','!=',4]]);
        // $data['orderDelivered'] = $this->commonmodel->getCountRecord('tbl_product_order', [['status','=',3]]);

        // $data['business'] = $this->commonmodel->total_business();

        return view('admin.dashboard', $data);
    }
}
