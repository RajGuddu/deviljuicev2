<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Common_model extends Model
{
    
    public function __construct()
    {
        $this->db = new DB;
        $this->adminTbl = 'tbl_admin';
        $this->settingTbl = 'tbl_setting';
        $this->bannerTbl = 'tbl_banner';
        $this->pageTbl = 'tbl_page';
        $this->productTbl = 'tbl_product';
        $this->productAttrTbl = 'tbl_product_attributes';
        $this->productCategoryTbl = 'tbl_product_category';
        $this->productOrderTbl = 'tbl_product_order';
        $this->memberAddressTbl = 'tbl_member_address';
        $this->purchasedCourseTbl = 'tbl_purchased_course';
        $this->coursesTbl = 'tbl_courses';
        $this->memberTbl = 'tbl_member';

    }
    /*public function isvalidate($email){
        $value = $this->db::table($this->adminTbl)
        ->where('email', $email)
        //->orderBy('id','asc')
        ->first();
        return $value;

    }*/
    public function getAllRecord($table, $whereArr=null, $orderBy=null, $limit=null){
        $builder = DB::table($table);
        if($whereArr != null){
            $builder->where($whereArr);
        }
        if($limit != null){
            $builder->inRandomOrder();
            $builder->limit($limit);
        }
        if($orderBy != null){
            $builder->orderBy($orderBy[0],$orderBy[1]);
        }
        $result = $builder->get();
        return $result;
    }
    public function updateRecord($table, $data, $whereArr){
        $result = DB::table($table)
            ->where($whereArr)
            ->update($data);
        return $result;
    }
    public function insertRecord($table, $data){
        $builder = DB::table($table);
        $builder->insertOrIgnore($data);
        return DB::getPdo()->lastInsertId();
    }
    public function getOneRecord($table, $whereArr = null){
        $builder = DB::table($table);
        $builder->where($whereArr);
        $result = $builder->first();
        return $result;
    }
    public function getOneRecordArray($table, $whereArr = null){
        $builder = DB::table($table);
        $builder->where($whereArr);
        $row = $builder->first();
        return $row ? (array) $row : [];
    }
    public function isExists($table, $whereArr = null){
        $builder = DB::table($table);
        $builder->where($whereArr);
        $result = $builder->exists();
        return $result;
    }
    public function getCountRecord($table, $whereArr = null){
        $builder = DB::table($table);
        $builder->where($whereArr);
        $result = $builder->count();
        return $result;
    }
    public function crudOperation($type, $table, $data=null, $where=null, $order=null){
        $result = null;
        if($data != null){
            $data = array_filter($data, fn($v) => $v !== '' && $v !== null);
        }
        $builder = DB::table($table);
        if($where != null){
            $builder->where($where);
        }
        
        if($order != null){
            $builder->orderBy($order[0],$order[1]);
        }
        if($type == 'C'){
            $builder->insertOrIgnore($data);
            $result = DB::getPdo()->lastInsertId();
        }elseif($type == 'R1'){
            $result = $builder->first();
        }elseif($type == 'RA'){
            $result = $builder->get();
        }elseif($type == 'U'){
            $result = $builder->update($data);
        }elseif($type == 'D'){
            $result = $builder->delete();
        }
        return $result;
    }
    
    //----------------------------Admin & Front Cocktail club---------------------------
    
    public function get_cocktail_club($status = null){
        $builder = DB::table('tbl_cocktail_club');

        if (session()->has('search')) {
            $search = session('search');

            $builder->where(function ($q) use ($search) {
                $q->where('cocktail_name', 'LIKE', "%{$search}%")
                ->orWhere('insta_username', 'LIKE', "%{$search}%");
            });
        }

        if (!is_null($status)) {
            $builder->where('status', $status);
        }

        return $builder->orderBy('c_id', 'desc')->get();
    }

    //---------------------------------------------------------------------------
    public function total_business(){
        $totalPaidAmount = DB::table('tbl_payment_transaction')
            ->sum('paid_amount');

        return $totalPaidAmount;
    }
    
    public function get_purchased_courses_by_customers($m_id){
        $builder = DB::table($this->purchasedCourseTbl.' AS pc') ;
        $builder->select('pc.*',DB::raw('c.course_name,c.short_desc,c.c_image,c.c_pdf,c.youtube_link'));
        $builder->leftJoin($this->coursesTbl.' AS c','pc.c_id','=','c.c_id');
        $builder->where('pc.m_id', $m_id);
        $builder->orderBy('pc.id','DESC');
        $value = $builder->get();
        return $value;
    }
    public function get_custom_testimonials(){
        $photoRecord = $this->getAllRecord('tbl_testimonial',[['name', '!=', NULL], ['post', '!=', NULL],['status','=',1]]);
        $videoRecord = $this->getAllRecord('tbl_testimonial',[['video', '!=', NULL],['status','=',1]]);
        $finalList = [];
        $maxCount = max(count($photoRecord), count($videoRecord));
        for ($i = 0; $i < $maxCount; $i++) {
            if (isset($photoRecord[$i])) {
                $finalList[] = $photoRecord[$i];
            }
            if (isset($videoRecord[$i])) {
                $finalList[] = $videoRecord[$i];
            }
        }
        // echo '<pre>'; print_r($finalList); exit;
        return $finalList;

    }
    public function get_service_name($sv_id){
        $serviceName = [];
        foreach(explode(',', $sv_id) as $val){
            $serviceName[] = $this->getOneRecord('tbl_services', ['sv_id'=>$val])->service_name ?? '';
        }
        if(!empty($serviceName))
            return implode(', ', array_filter($serviceName));
        else
            return 'N/A';
    }
    public function get_variants_name($vid){
        $variantName = [];
        foreach(explode(',', $vid) as $val){
            $variantName[] = $this->getOneRecord('tbl_services_variants', ['vid'=>$val])->v_name ?? '';
        }
        if(!empty($variantName))
            return implode(', ', array_filter($variantName));
        else
            return 'N/A';
    }
    public function get_banner_list(){
        $builder = DB::table($this->bannerTbl.' AS b') ;
        $builder->select('b.*',DB::raw('p.page_name'));
        $builder->leftJoin($this->pageTbl.' AS p','b.page','=','p.id');
        // $builder->where('c.id', $id);
        $builder->orderBy('b.id','DESC');
        $value = $builder->get();
        return $value;
    }
    /* public function get_min_value_products($cat_id=null, $limit=null, $pro_url=null)
    {
        // Subquery for min value and its unit
        $sub = DB::table($this->productAttrTbl . ' AS at')
            ->select(
                'at.pro_id',
                DB::raw('MIN(at.value) as min_value'),
                DB::raw('SUBSTRING_INDEX(GROUP_CONCAT(at.unit ORDER BY at.value ASC), ",", 1) as min_unit'),
                DB::raw('SUBSTRING_INDEX(GROUP_CONCAT(at.sp ORDER BY at.value ASC), ",", 1) as min_sp'),
                DB::raw('SUBSTRING_INDEX(GROUP_CONCAT(at.attrId ORDER BY at.value ASC), ",", 1) as attrId')
            )
            ->where('at.status', 1)
            ->groupBy('at.pro_id');

        // Main query
        $builder = DB::table($this->productTbl . ' AS p');
        $builder->leftJoinSub($sub, 'a', function ($join) {
                $join->on('a.pro_id', '=', 'p.pro_id');
            });
        $builder->leftJoin($this->productCategoryTbl . ' AS c', 'c.id', '=', 'p.cat_id');
        $builder->select(
                'p.*',
                'a.attrId',
                'a.min_value as value',
                'a.min_unit as unit',
                'a.min_sp as sp',
                'c.category_name'
        );
        $builder->where('p.status', 1);
        if($pro_url != null){
            $builder->where('p.pro_url', $pro_url);
        }
        
        if($cat_id != null){
            $builder->where('p.cat_id', $cat_id);
        }
        if($limit != null){
            $builder->where('p.show_front', 1);
            $builder->limit($limit);
            $builder->inRandomOrder();
        }
        // ->orderByDesc('p.pro_id');
        if($pro_url != null){
            return $builder->first();
        }else{
            return $builder->get();
        }
    } */
    public function get_min_value_similar_products($pro_url,$cat_id)
    {
        // Subquery for min value and its unit
        $sub = DB::table($this->productAttrTbl . ' AS at')
            ->select(
                'at.pro_id',
                DB::raw('MIN(at.value) as min_value'),
                DB::raw('SUBSTRING_INDEX(GROUP_CONCAT(at.unit ORDER BY at.value ASC), ",", 1) as min_unit'),
                DB::raw('SUBSTRING_INDEX(GROUP_CONCAT(at.sp ORDER BY at.value ASC), ",", 1) as min_sp'),
                DB::raw('SUBSTRING_INDEX(GROUP_CONCAT(at.attrId ORDER BY at.value ASC), ",", 1) as attrId')
            )
            ->where('at.status', 1)
            ->groupBy('at.pro_id');

        // Main query
        $builder = DB::table($this->productTbl . ' AS p');
        $builder->leftJoinSub($sub, 'a', function ($join) {
                $join->on('a.pro_id', '=', 'p.pro_id');
            });
        $builder->leftJoin($this->productCategoryTbl . ' AS c', 'c.id', '=', 'p.cat_id');
        $builder->select(
                'p.*',
                'a.attrId',
                'a.min_value as value',
                'a.min_unit as unit',
                'a.min_sp as sp',
                'c.category_name'
        );
        $builder->where('p.status', 1);
        $builder->where('p.cat_id', $cat_id);
        $builder->where('p.pro_url', '!=', $pro_url);
        return $builder->get();
    }
    public function get_product_for_cart($pro_id,$attrid){
        $builder = DB::table($this->productTbl.' AS p') ;
        $builder->select('p.pro_id','p.pro_name','p.image1','at.unit','at.value','at.sp');
        $builder->leftJoin($this->productAttrTbl.' AS at','at.pro_id','=','p.pro_id');
        $builder->where('p.pro_id', $pro_id);
        $builder->where('at.attrId', $attrid);
        $result = $builder->first();
        return $result;
    }
    public function get_all_new_product_order($status=null, $search=null){
        $builder = DB::table($this->productOrderTbl.' AS po') ;
        $builder->select('po.*','m.name AS member_name','m.email AS member_email','ma.name','ma.last_name','ma.email','ma.code','ma.phone','ma.city','ma.state','ma.zipcode','ma.address','ma.landmark','ma.alt_code','ma.alt_phone');
        $builder->leftJoin($this->memberTbl.' AS m','po.m_id','=','m.m_id');
        $builder->leftJoin($this->memberAddressTbl.' AS ma','po.add_id','=','ma.add_id');
        if($status != null){
            $builder->where('po.status', $status);
        }
        if (!empty($search)) {
            $builder->where(function($query) use ($search) {
                $query->where('po.order_id', 'like', "%{$search}%")
                    ->orWhere('m.name', 'like', "%{$search}%")
                    ->orWhere('m.email', 'like', "%{$search}%")
                    ->orWhere('ma.name', 'like', "%{$search}%")
                    ->orWhere('ma.last_name', 'like', "%{$search}%")
                    ->orWhere('ma.email', 'like', "%{$search}%")
                    ->orWhere('ma.phone', 'like', "%{$search}%");
            });
        }
        $builder->orderBy('po.id','DESC');
        // $builder->where('at.attrId', $attrid);
        $result = $builder->get();
        return $result;
    }

    public function get_all_fully_booked_date_array(){
        // Step 1: Get total service time count
        $totalServiceTimes = DB::table('tbl_service_time')
            ->where('status', 1)
            ->count();

        // Step 2: Get dates where all time slots are booked
        $bookedDate = DB::table('tbl_service_book_online')
            ->select('service_date')
            ->groupBy('service_date')
            ->havingRaw('COUNT(DISTINCT st_id) = ?', [$totalServiceTimes])
            ->pluck('service_date')
            ->toArray();

        return $bookedDate;

    }
    public function get_booking_service(){
        $record = DB::table('tbl_services_variants as v')
            ->join('tbl_services as s', 's.sv_id', '=', 'v.sv_id')
            ->select(
                's.sv_id',
                's.service_name',
                'v.vid',
                'v.v_name',
                'v.mrp',
                'v.sp',
                'v.details'
            )
            ->where('v.vid', session('vid'))
            ->where('v.sv_id', session('sv_id'))
            ->first();

        return $record;
    }
    public function get_appointments_data(){
        $appointments = DB::table('tbl_service_book_online as b')
            ->join('tbl_services as s', 's.sv_id', '=', 'b.sv_id')
            ->join('tbl_services_variants as v', 'v.vid', '=', 'b.vid')
            ->join('tbl_service_time as t', 't.st_id', '=', 'b.st_id')
            ->select(
                DB::raw("CONCAT(b.first_name, ' ', b.last_name) AS name"),
                'b.id as book_id',
                'b.status',
                'b.total_amount',
                'b.paid_amount',
                'b.dues_amount',
                's.service_name as service',
                'b.service_date as date',
                't.serv_time as start',
                'v.v_name as variant',
                'v.duration as duration',
                'v.sp as price'
            )
            ->orderBy('b.service_date', 'ASC')
            ->get();

        $formatted = $appointments->map(function ($row) {
    
            // convert "10:00 am" → "10:00"
            $start24 = date("H:i", strtotime($row->start));
            $duration = intval($row->duration);
            if ($duration == 0) {
                $duration = 1;
            }

            return [
                'name'     => $row->name,
                'book_id'  => $row->book_id,
                'status'   => $row->status,
                'service'  => $row->service,
                'date'     => $row->date,
                'start'    => $start24,
                'variant'  => $row->variant,
                'duration' => $duration,
                'price'    => $row->price,
                'total_amount'    => $row->total_amount,
                'paid_amount'    => $row->paid_amount,
                'dues_amount'    => $row->dues_amount,
            ];
        });
        return json_encode($formatted);

    }
    public function get_available_times($st_id, $service_date){

        $availableTimes = DB::table('tbl_service_time')
            ->where('st_id', $st_id)
            ->orWhereNotIn('st_id', function ($query) use ($service_date) {
                $query->select('st_id')
                    ->from('tbl_service_book_online')
                    ->where('service_date', $service_date);
            })
            ->get();

        return $availableTimes;

    }
    public function get_times_by_date($service_date){ // ajax

        $availableTimes = DB::table('tbl_service_time')
            ->whereNotIn('st_id', function ($query) use ($service_date) {
                $query->select('st_id')
                    ->from('tbl_service_book_online')
                    ->where('service_date', $service_date);
            })
            ->get();

        return $availableTimes;

    }
    public function get_one_appointment_data($id){
        $appointments = DB::table('tbl_service_book_online as b')
            ->join('tbl_services as s', 's.sv_id', '=', 'b.sv_id')
            ->join('tbl_services_variants as v', 'v.vid', '=', 'b.vid')
            ->join('tbl_service_time as t', 't.st_id', '=', 'b.st_id')

            ->select(
                DB::raw("b.*, CONCAT(b.first_name, ' ', b.last_name) AS name"),
                's.service_name',
                't.serv_time',
                'v.v_name as variant',
                'v.duration',
                'v.sp as price'
            )
            ->where('b.id', $id)
            ->first();
        return $appointments;
    }
    public function get_appointment_list(){
        $builder = DB::table('tbl_service_book_online as b')
            ->join('tbl_services as s', 's.sv_id', '=', 'b.sv_id')
            ->join('tbl_services_variants as v', 'v.vid', '=', 'b.vid')
            ->join('tbl_service_time as t', 't.st_id', '=', 'b.st_id');

        $builder->select(
                DB::raw("b.*, CONCAT(b.first_name, ' ', b.last_name) AS name"),
                's.service_name',
                'v.v_name as variant',
                'v.duration',
                'v.sp as price',
                't.serv_time',
            );
        if(session()->has('search')){
            $search = session('search');
            $builder->where('first_name', 'like', '%'.$search.'%');
            $builder->orWhere('last_name', 'like', '%'.$search.'%');
        }
        $builder->orderBy('b.id', 'DESC');
        $result = $builder->get();
        return $result;
    }
    public function get_upcomming_appointment_list(){
        $builder = DB::table('tbl_service_book_online as b')
            ->join('tbl_services as s', 's.sv_id', '=', 'b.sv_id')
            ->join('tbl_services_variants as v', 'v.vid', '=', 'b.vid')
            ->join('tbl_service_time as t', 't.st_id', '=', 'b.st_id');

        $builder->select(
                DB::raw("b.*, CONCAT(b.first_name, ' ', b.last_name) AS name"),
                's.service_name',
                'v.v_name as variant',
                'v.duration',
                'v.sp as price',
                't.serv_time',
            );
        $builder->where('b.remind', '<', 1);
        $builder->whereDate('b.service_date', '=', now()->addDays(2)->toDateString());
        $result = $builder->get();
        return $result;
    }

    /**************************settings********************** */
    /*public function get_setting(){
        $builder = DB::table($this->settingTbl);
        $builder->where('id',1);
        $result = $builder->first();
        return $result;
    }
    public function update_setting($data=''){
        $builder = DB::table($this->settingTbl);
        $builder->where('id',1);
        $result = $builder->update($data);
        return $result;
    }*/
}