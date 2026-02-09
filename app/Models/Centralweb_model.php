<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class Centralweb_model extends Model
{
    private $cocktails;
    public function __construct()
    {
        $this->db = new DB;
        $this->cocktails = 'tbl_cocktails';
    }

    public function get_random_cocktails($limit){
        $builder = DB::table($this->cocktails) ;
        $builder->select('*');
        $builder->where('status', 1);
        $builder->inRandomOrder();
        $builder->limit($limit);
        $result = $builder->get();
        return $result;
    }
    public function get_devil_hour(){
        $builder = DB::table('tbl_cocktail_club') ;
        $builder->select('*');
        $builder->where('status', 1);
        $builder->where('is_devil_hour', 1);
        $builder->limit(3);
        $result = $builder->get();
        return $result;
    }
    public function get_cocktails(Request $request){
        $q = $request->q;

        $cocktails = DB::table('tbl_cocktails')
            ->where('status', 1)
            ->when($q, function ($query, $q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('cocktail_name', 'like', "%$q%")
                        ->orWhere('ingredients', 'like', "%$q%");
                });
            })
            ->get();
        return $cocktails;
    }
}