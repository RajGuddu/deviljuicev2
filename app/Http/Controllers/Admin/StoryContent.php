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

class StoryContent extends Controller
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
                            $videoFilename = 'story-video-' . Str::random(8) . '.' . $extension;
                            $exists = $this->commonmodel->isExists('tbl_story_content', ['bg_video' => $videoFilename]);
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
                        return redirect()->to('admin/story-content');
                    }
                }
                $post['about_title'] = $request->input('about_title');
                $post['about_details'] = $request->input('about_details');
                
            } // about end
            if($request->input('submit') == 'sec-2'){
                // echo '<pre>'; print_r($_FILES); print_r($_POST); exit;
                if($request->hasFile('sec2_image1')){
                    $file = $request->file('sec2_image1');
                    if ($file->isValid()) {

                        do {
                            $webpFilename = 'story-'. Str::random(8) .'.webp';
                            $exists = $this->commonmodel->isExists('tbl_story_content',['sec2_image1'=>$webpFilename]);
                        } while ($exists);
                        $image = Image::make($file)->encode('webp', 80);
                        $path = Storage::disk('public_root')->put('images/'. $webpFilename, (string) $image);
                        if($path){
                            if (isset($_POST['sec2_image1_2']) && !empty($_POST['sec2_image1_2'])) {
                                Storage::disk('public_root')->delete('images/' . $_POST['sec2_image1_2']);
                            }
                            $post['sec2_image1'] = $webpFilename;
                        }
                        
                    }
                }
                if($request->hasFile('sec2_image2')){
                    $file = $request->file('sec2_image2');
                    if ($file->isValid()) {

                        do {
                            $webpFilename = 'story-'. Str::random(8) .'.webp';
                            $exists = $this->commonmodel->isExists('tbl_story_content',['sec2_image2'=>$webpFilename]);
                        } while ($exists);
                        $image = Image::make($file)->encode('webp', 80);
                        $path = Storage::disk('public_root')->put('images/'. $webpFilename, (string) $image);
                        if($path){
                            if (isset($_POST['sec2_image2_2']) && !empty($_POST['sec2_image2_2'])) {
                                Storage::disk('public_root')->delete('images/' . $_POST['sec2_image2_2']);
                            }
                            $post['sec2_image2'] = $webpFilename;
                        }
                        
                    }
                }
                $post['sec2_title'] = $request->input('sec2_title');
                $post['sec2_description'] = $request->input('sec2_description');
                
            } // sec-2 end
            if($request->input('submit') == 'sec-3'){
                // echo '<pre>'; print_r($_FILES); print_r($_POST); exit;
                if ($request->hasFile('sec3_bg_video')) {
                    $file = $request->file('sec3_bg_video');
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
                            $videoFilename = 'story-video-' . Str::random(8) . '.' . $extension;
                            $exists = $this->commonmodel->isExists('tbl_story_content', ['sec3_bg_video' => $videoFilename]);
                        } while ($exists);
                        $path = Storage::disk('public_root')
                            ->putFileAs('videos', $file, $videoFilename);
                        if ($path) {

                            if (isset($_POST['sec3_bg_video_2']) && !empty($_POST['sec3_bg_video_2'])) {
                                Storage::disk('public_root')->delete('videos/' . $_POST['sec3_bg_video']);
                            }
                            $post['sec3_bg_video'] = $videoFilename;
                        }
                    }else{
                        $request->session()->flash('message',['msg'=>'Upload only video file. ','type'=>'danger']);
                        return redirect()->to('admin/story-content');
                    }
                }
                
            }
            
            if(!empty($post)){
                $post['update_at'] = date('Y-m-d H:i:s');
                $updated = $this->commonmodel->crudOperation('U','tbl_story_content',$post,['id'=>1]);
            } 
            if(isset($updated)){
                $request->session()->flash('message',['msg'=>'Record updated successfully!','type'=>'success']);
            }else{
                $request->session()->flash('message',['msg'=>'Something went wrong. Please Try After Sometimes...','type'=>'danger']);
            }

            return redirect()->to('admin/story-content');
        }
        
        $data['settings'] = $this->commonmodel->crudOperation('R1','tbl_story_content', '', ['id'=>1]);
        return view('admin.storyContent.storyContent', $data);
    }
    
}
