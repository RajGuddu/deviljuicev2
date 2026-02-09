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

class HomeContent extends Controller
{
    private $commonmodel;
    public function __construct(){
        $this->commonmodel = new Common_model;
    }

    public function update_content(Request $request){
        $data = [];
        if($request->isMethod('POST')){
            $post = [];
            if($request->input('submit') == 'about'){
                // echo '<pre>'; print_r($_FILES); print_r($_POST); exit;
                if ($request->hasFile('bg_video')) {
                    $file = $request->file('bg_video');
                    $allowedMimeTypes = [
                        'video/mp4',
                        'video/quicktime',   // mov
                        'video/x-msvideo',   // avi
                        'video/x-ms-wmv',    // wmv
                        'video/webm',
                        'image/gif'          // gif 
                    ];
                    if ($file->isValid() && in_array($file->getMimeType(), $allowedMimeTypes)) {
                        $extension = $file->getClientOriginalExtension();
                        do {
                            $videoFilename = 'home-video-' . Str::random(8) . '.' . $extension;
                            $exists = $this->commonmodel->isExists('tbl_home_content', ['bg_video' => $videoFilename]);
                        } while ($exists);
                        $path = Storage::disk('public_root')
                            ->putFileAs('videos', $file, $videoFilename);
                        if ($path) {

                            if (isset($_POST['bg_video2']) && !empty($_POST['bg_video2'])) {
                                Storage::disk('public_root')->delete('videos/' . $_POST['bg_video2']);
                            }
                            $post['bg_video'] = $videoFilename;
                        }
                    }else{
                        $request->session()->flash('message',['msg'=>'Upload only video file. ','type'=>'danger']);
                        return redirect()->to('admin/homeContent');
                    }
                }
                if($request->hasFile('about_image')){
                    $file = $request->file('about_image');
                    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
                    if ($file->isValid() && in_array($file->getMimeType(), $allowedMimeTypes)) {

                        do {
                            $webpFilename = 'about-'. Str::random(8) .'.webp';
                            $exists = $this->commonmodel->isExists('tbl_home_content',['about_image'=>$webpFilename]);
                        } while ($exists);
                        $image = Image::make($file)->encode('webp', 80);
                        $path = Storage::disk('public_root')->put('images/'. $webpFilename, (string) $image);
                        if($path){
                            if (isset($_POST['about_image2']) && !empty($_POST['about_image2'])) {
                                Storage::disk('public_root')->delete('images/' . $_POST['about_image2']);
                            }
                            $post['about_image'] = $webpFilename;
                        }
                        
                    }else{
                        $request->session()->flash('message',['msg'=>'Upload only image file. ','type'=>'danger']);
                        return redirect()->to('admin/homeContent');
                    }
                }
                $post['about_title'] = $request->input('about_title');
                $post['about_details'] = $request->input('about_details');
                
            } // about end
            if($request->input('submit') == 'sec-5'){
                // echo '<pre>'; print_r($_FILES); print_r($_POST); exit;
                /*if($request->hasFile('sec5_content_image1')){
                    $file = $request->file('sec5_content_image1');
                    if ($file->isValid()) {

                        do {
                            $webpFilename = 'sec-5-'. Str::random(8) .'.webp';
                            $exists = $this->commonmodel->isExists('tbl_home_content',['sec5_content_image1'=>$webpFilename]);
                        } while ($exists);
                        $image = Image::make($file)->encode('webp', 80);
                        $path = Storage::disk('public_root')->put('images/'. $webpFilename, (string) $image);
                        if($path){
                            if (isset($_POST['sec5_content_image1_2']) && !empty($_POST['sec5_content_image1_2'])) {
                                Storage::disk('public_root')->delete('images/' . $_POST['sec5_content_image1_2']);
                            }
                            $post['sec5_content_image1'] = $webpFilename;
                        }
                        
                    }
                }*/
                $post['sec5_title'] = $request->input('sec5_title');
                $post['sec5_description'] = $request->input('sec5_description');
                
            } // sec-5 end
           
            if($request->input('submit') == 'contact-page'){
                $post['sec6_title'] = $request->input('sec6_title');
                $post['sec6_description'] = $request->input('sec6_description');
            }
            if(!empty($post)){
                $post['update_at'] = date('Y-m-d H:i:s');
                $updated = $this->commonmodel->crudOperation('U','tbl_home_content',$post,['id'=>1]);
            } 
            if(isset($updated)){
                $request->session()->flash('message',['msg'=>'Record updated successfully!','type'=>'success']);
            }else{
                $request->session()->flash('message',['msg'=>'Something went wrong. Please Try After Sometimes...','type'=>'danger']);
            }

            return redirect()->to('admin/homeContent');
        }
        
        $data['settings'] = $this->commonmodel->crudOperation('R1','tbl_home_content', '', ['id'=>1]);
        return view('admin.homeContent.homeContent', $data);
    }
    
}
