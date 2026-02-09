<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;


// use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

use App\Models\Common_model;
use App\Models\Admin\SettingsModel;


class CocktailClub extends Controller
{
    private $commonmodel;
    public function __construct(){
        $this->commonmodel = new Common_model;
    }
    public function index(Request $request, $id=null){
        $data = [];
        if($request->isMethod('POST')){
            $rules = [
                'cocktail_name' => 'required',
                'insta_username' => 'required',
                
                'status' => 'required',
            ];
            $validated = $this->validate($request, $rules);
            
            // print_r($_POST); exit;
            if($validated){
                if($request->hasFile('image')){
                    if ($request->file('image')->isValid()) {

                        $file = $request->file('image');
                        do {
                            $webpFilename = 'cimg-'. Str::random(8) .'.webp';
                            $exists = $this->commonmodel->isExists('tbl_cocktail_club',['image'=>$webpFilename]);
                        } while ($exists);
                        $image = Image::make($file)->encode('webp', 80);
                        $path = Storage::disk('public_root')->put('images/'. $webpFilename, (string) $image);
                        if($path){
                            if (isset($_POST['old_image']) && !empty($_POST['old_image'])) {
                                Storage::disk('public_root')->delete('images/' . $_POST['old_image']);
                            }
                            $post['image'] = $webpFilename;
                        }
                    }
                }
                //pdf
                /*if($request->hasFile('c_pdf')){
                    if ($request->file('c_pdf')->isValid()) {

                        $file = $request->file('c_pdf');
                        do {
                            $pdfFilename  = 'cpdf-'. Str::random(8) .'.pdf';
                            $exists = $this->commonmodel->isExists('tbl_courses',['c_pdf'=>$pdfFilename]);
                        } while ($exists);
                        // $image = Image::make($file)->encode('webp', 80);
                        $path = Storage::disk('local')->putFileAs('pdf', $file, $pdfFilename);
                        if($path){
                            if (isset($_POST['old_c_pdf']) && !empty($_POST['old_c_pdf'])) {
                                Storage::disk('local')->delete('pdf/' . $_POST['old_c_pdf']);
                            }
                            $post['c_pdf'] = $pdfFilename;
                        }
                    }
                }*/
                $post['cocktail_name'] = $request->input('cocktail_name');
                $post['insta_username'] = $request->input('insta_username');
                $post['insta_link'] = "https://www.instagram.com/".Str::of($post['insta_username'])->ltrim('@');

                $post['is_devil_hour'] = $request->input('is_devil_hour');
                $post['status'] = $request->input('status');
                if(!$id){
                    $post['added_at'] = date('Y-m-d H:i:s');
                    $inserted = $this->commonmodel->crudOperation('C','tbl_cocktail_club',$post);

                }else{
                    $post['update_at'] = date('Y-m-d H:i:s');
                    $updated = $this->commonmodel->crudOperation('U','tbl_cocktail_club',$post,['c_id'=>$id]);
                }
                if(isset($inserted)){
                    $request->session()->flash('message',['msg'=>'Record added successfully!','type'=>'success']);
                }elseif(isset($updated)){
                    $request->session()->flash('message',['msg'=>'Record updated successfully!','type'=>'success']);
                }else{
                    $request->session()->flash('message',['msg'=>'Please Try After Sometimes...','type'=>'danger']);
                }

                return redirect()->to('admin/cocktail-club');
            }
        }
        if($id){
            $data['record'] = $this->commonmodel->crudOperation('R1','tbl_cocktail_club','',['c_id'=>$id]);
        }
        $data['listData'] = $this->commonmodel->get_cocktail_club();
        return view('admin.cocktail_club.club_index', $data);
    }
    public function delete_cocktail_club(Request $request, $id=null){
        if($id){
            $record = $this->commonmodel->crudOperation('R1','tbl_cocktail_club','',['c_id'=>$id]);
            if(!empty($record)){
                if (Storage::disk('public_root')->exists('images/' . $record->image)) {
                    Storage::disk('public_root')->delete('images/' . $record->image);
                }
                if($this->commonmodel->crudOperation('D','tbl_cocktail_club','',['c_id'=>$id])){
                    $request->session()->flash('message',['msg'=>'Record Deleted.','type'=>'success']);
                }else{
                    $request->session()->flash('message',['msg'=>'Please Try After Sometimes...','type'=>'danger']);
                }
            }
        }
        return redirect()->to('admin/cocktail-club');
    }
    public function search_cock_club(Request $request){
        if($request->isMethod('POST')){
            session([
                'search' => $request->search,
                // 'search_email' => $request->email,
            ]);
        }
        return redirect()->to('admin/cocktail-club');
    }
    public function search_reset(Request $request){
        if(session()->has('search')){
            session()->remove('search');
        }
        return redirect()->to('admin/cocktail-club');
    }
    
   
}