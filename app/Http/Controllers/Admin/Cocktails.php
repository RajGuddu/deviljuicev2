<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Common_model;
// use App\Models\ServiceVariantsModel;

class Cocktails extends Controller
{
    private $commonmodel;
    public function __construct(){
        $this->commonmodel = new Common_model;
    }
    public function index(Request $request){
        
        $data['records'] = $this->commonmodel->crudOperation('RA','tbl_cocktails','','',['id','DESC']);
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
        
        return view('admin.cocktail.cocktailIndex', $data);
    }
    public function add_edit_cocktail(Request $request, $id=null){
        $data = $post = [];
        if($request->isMethod('POST')){
            $rules = [
                'created_by' => 'required',
                'insta_user_name' => 'required',
                'cocktail_name' => 'required',
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
                            $exists = $this->commonmodel->isExists('tbl_cocktails',['image'=>$webpFilename]);
                        } while ($exists);
                        $image = Image::make($file)->encode('webp', 80);
                        $path = Storage::disk('public_root')->put('images/'. $webpFilename, (string) $image);
                        if($path){
                            if (isset($_POST['image2']) && !empty($_POST['image2'])) {
                                Storage::disk('public_root')->delete('images/' . $_POST['image2']);
                            }
                            $post['image'] = $webpFilename;
                        }
                    }
                }
                $post['created_by'] = $request->input('created_by');
                $post['insta_user_name'] = $request->input('insta_user_name');
                $post['cocktail_name'] = $request->input('cocktail_name');
                $post['slug'] = $request->input('slug');
                $post['short_desc'] = $request->input('short_desc');
                $post['ingredients'] = $request->input('ingredients');
                $post['instructions'] = $request->input('instructions');

                $post['featured'] = $request->input('featured');
                $post['status'] = $request->input('status');
                if(!$id){
                    $post['added_at'] = date('Y-m-d H:i:s');
                    $inserted = $this->commonmodel->crudOperation('C','tbl_cocktails',$post);

                }else{
                    $post['update_at'] = date('Y-m-d H:i:s');
                    $updated = $this->commonmodel->crudOperation('U','tbl_cocktails',$post,['id'=>$id]);
                }
                if(isset($inserted)){
                    $request->session()->flash('message',['msg'=>'Record added successfully!','type'=>'success']);
                }elseif(isset($updated)){
                    $request->session()->flash('message',['msg'=>'Record updated successfully!','type'=>'success']);
                }else{
                    $request->session()->flash('message',['msg'=>'Please Try After Sometimes...','type'=>'danger']);
                }

                return redirect()->to('admin/cocktails');
            }
        }
        if($id){
            $data['record'] = $this->commonmodel->crudOperation('R1','tbl_cocktails','',['id'=>$id]);
        }
        return view('admin.cocktail.add_edit_cocktail', $data);
    }
    public function delete_cocktail(Request $request, $id=null){
        if($id){
            $record = $this->commonmodel->crudOperation('R1','tbl_cocktails','',['id'=>$id]);
            if(!empty($record)){
                $imagePath = public_path('assets/uploads/images/' . $record->image);
                if (!empty($record->image) && File::exists($imagePath)) {
                    File::delete($imagePath);
                }
                // $image2Path = public_path('assets/uploads/images/' . $record->thumb_image);
                // if (!empty($record->thumb_image) && File::exists($image2Path)) {
                //     File::delete($image2Path);
                // }
                if($this->commonmodel->crudOperation('D','tbl_cocktails','',['id'=>$id])){
                    $request->session()->flash('message',['msg'=>'Record Deleted.','type'=>'success']);
                }else{
                    $request->session()->flash('message',['msg'=>'Please Try After Sometimes...','type'=>'danger']);
                }
            }
        }
        return redirect()->to('admin/cocktails');
    }
    
}
