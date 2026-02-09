<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

use App\Models\Admin\SettingsModel; 
use App\Mail\ThankYou;
use App\Models\ContactModel;
use App\Models\Common_model;
use App\Models\Centralweb_model;
// use App\Services\CartService;
use App\Traits\StripePaymentTrait;
class Home extends Controller
{
    use StripePaymentTrait;
    private $commonmodel;
    private $centralwebmodel;
    public function __construct(){
        $this->commonmodel = new Common_model;
        $this->centralwebmodel = new Centralweb_model;
        
    }
    public function age_verify(Request $request){
        if($request->isMethod('POST')){
            // print_r($_POST); exit;
            $request->validate([
                'dd' => 'required|numeric|min:1|max:31',
                'mm' => 'required|numeric|min:1|max:12',
                'yy' => 'required|numeric|min:1900|max:' . date('Y'),
                'country' => 'required|string',
            ]);

            $dob = Carbon::createFromDate(
                $request->yy,
                $request->mm,
                $request->dd
            );

            $age = $dob->age;

            if ($age >= 21) {

                // Create session
                session([
                    'age_verified' => true,
                    'verified_country' => $request->country,
                    'verified_at' => now(),
                ]);

                return redirect()->intended('/'); 
            }

            // Age below 18
            return back()->withErrors([
                'age' => 'You must be at least 21 years old to enter this site.'
            ])->withInput();
        }
        return view('age-verify');
    }
    public function index(Request $request){ //home page
        $data = [];
        // $data['testimonials'] = $this->commonmodel->get_custom_testimonials();
        // $data['services'] = $this->commonmodel->getAllRecord('tbl_services',['status'=>1,'show_front'=>1],['sv_id','DESC'],4);
        
        $data['featuredcockt'] = $this->commonmodel->getOneRecord('tbl_cocktails',['status'=>1,'featured'=>1]);
        $data['cockSlides'] = $this->centralwebmodel->get_random_cocktails(3);
        $data['cockRows'] = $this->centralwebmodel->get_random_cocktails(9);
        $data['products'] = $this->commonmodel->getAllRecord('tbl_product',['status'=>1,'show_front'=>1],['pro_id','DESC']);
        $data['banner'] = $this->commonmodel->getOneRecord('tbl_banner',['status'=>1,'page'=>1]);
        $data['content'] = $this->commonmodel->getOneRecord('tbl_home_content',['id'=>1]);
        // echo '<pre>'; print_r($data['proCategory']); exit;
        return view('home', $data);
    }
    public function our_vodka(Request $request){
        $data = [];
        $data['banner'] = $this->commonmodel->getOneRecord('tbl_banner',['status'=>1,'page'=>7]);
        $data['products'] = $this->commonmodel->getAllRecord('tbl_product',['status'=>1],['pro_id','DESC']);
        return view('our-vodka', $data);
    }
    public function product_details(Request $request, $url){ // vodka details
        $product = $this->commonmodel->getOneRecord('tbl_product',['status'=>1,'pro_url'=>$url]);
        
        if(empty($product)){
            return redirect()->to('/404');
        }
        $data['product'] = $product;
        $data['featuredcockt'] = $this->commonmodel->getOneRecord('tbl_cocktails',['status'=>1,'featured'=>1]);
        $data['simiProduct'] = $this->commonmodel->crudOperation('RA','tbl_product','',[['pro_url','!=',$url],['status','=',1]]);
        return view('product_detail', $data);
    }
    public function story(Request $request){
        $data = [];
        $data['banner'] = $this->commonmodel->getOneRecord('tbl_banner',['status'=>1,'page'=>4]);
        $data['content'] = $this->commonmodel->getOneRecord('tbl_story_content',['id'=>1]);
        return view('the-story', $data);
    }
    public function cocktails(Request $request){
        $data = [];
        // $data['cocktails'] = $this->commonmodel->crudOperation('RA','tbl_cocktails','',['status'=>1],['id','DESC']);
        $data['cocktails'] = $this->centralwebmodel->get_cocktails($request);
        $data['banner'] = $this->commonmodel->getOneRecord('tbl_banner',['status'=>1,'page'=>5]);

        return view('cocktails', $data);
    }
    public function cocktails_details(Request $request, $url){ // cocktail details
        $data = [];
        $cocktail = $this->commonmodel->crudOperation('R1','tbl_cocktails','',[['slug','=',$url],['status','=',1]]);
        
        if(empty($cocktail)){
            return redirect()->to('/404');
        }
        $data['cocktail'] = $cocktail;
        $data['simiCocktail'] = $this->commonmodel->crudOperation('RA','tbl_cocktails','',[['slug','!=',$url],['status','=',1]]);
        $data['banner'] = $this->commonmodel->getOneRecord('tbl_banner',['status'=>1,'page'=>6]);
        // echo '<pre>'; print_r($data['simiCocktail']); exit;
        return view('cocktails_detail', $data);
    }
    public function cocktail_creation(Request $request){

        $data = [];
        if($request->isMethod('POST')){
            $validated = $this->validate($request, [
                'cocktail_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'user_name'      => 'required|string|max:255',
                'cocktail_name'  => 'required|string|max:255',
                'ingredients'    => 'required',
                'instructions'   => 'required',
            ]);
            if($validated){
                // print_r($_POST);print_r($_FILES);exit;
                if($request->hasFile('cocktail_image')){
                    if ($request->file('cocktail_image')->isValid()) {

                        $file = $request->file('cocktail_image');
                        do {
                            $webpFilename = 'cimg-'. Str::random(8) .'.webp';
                            $exists = $this->commonmodel->isExists('tbl_cocktails',['image'=>$webpFilename]);
                        } while ($exists);
                        $image = Image::make($file)->encode('webp', 80);
                        $path = Storage::disk('public_root')->put('images/'. $webpFilename, (string) $image);
                        if($path){
                            /* if (isset($_POST['image2']) && !empty($_POST['image2'])) {
                                Storage::disk('public_root')->delete('images/' . $_POST['image2']);
                            } */
                            $post['image'] = $webpFilename;
                        }
                    }
                }
                $post['created_by'] = $request->input('user_name');
                $post['insta_user_name'] = $request->input('instagram');
                $post['cocktail_name'] = $request->input('cocktail_name');
                $slug = '';
                do {
                    if($slug != '')
                        $slug = Str::slug($request->cocktail_name);
                    else
                        $slug = Str::slug($request->cocktail_name).Str::random(8);
                    $slugExists = $this->commonmodel->isExists('tbl_cocktails',['slug'=>$slug]);
                } while ($slugExists);

                $post['slug'] = $slug;
                $post['short_desc'] = $request->input('description');
                $post['ingredients'] = $request->input('ingredients');
                $post['instructions'] = $request->input('instructions');

                // $post['featured'] = $request->input('featured');
                // $post['status'] = 0;
                
                $post['added_at'] = date('Y-m-d H:i:s');
                $inserted = $this->commonmodel->crudOperation('C','tbl_cocktails',$post);
                
                if(isset($inserted)){
                    $request->session()->flash('message',['msg'=>'Cocktail added successfully!','type'=>'success']);
                }else{
                    $request->session()->flash('message',['msg'=>'Please Try After Sometimes...','type'=>'danger']);
                }

                return redirect()->to('cocktail-creation');

            }
        }
        
        return view('cocktail-creation', $data);
    }
    public function cocktails_club(){
        $data = [];
        $data['cockClub'] = $this->commonmodel->getAllRecord('tbl_cocktail_club',['status'=>1,'is_devil_hour'=>0],['c_id','DESC']);
        $data['products'] = $this->commonmodel->getAllRecord('tbl_product',['status'=>1,'show_front'=>1],['pro_id','DESC']);
        $data['banner'] = $this->commonmodel->getOneRecord('tbl_banner',['status'=>1,'page'=>3]);
        return view('cocktails-club', $data);
    }
    
    public function contact(){
        
        // $data['countries'] = $this->commonmodel->crudOperation('RA','tbl_countries','',['status'=>1],['countries_iso_code','ASC']);
        $data['content'] = $this->commonmodel->getOneRecord('tbl_home_content',['id'=>1]);
        $data['settings'] = SettingsModel::where(['id'=>1])->first();
        return view('contact_us', $data);
    }
    public function save_contact_us(Request $request){
        if($request->isMethod('POST')){
            $post = array();
            $validator = Validator::make($request->all(), [
                'uname' => 'required|string',
                // 'phone' => 'required', 'regex:/^[0-9]+$/', 'digits_between:10,10',
                'email' => 'required|email',
                // 'time' => 'required',
            ]);
            if ($validator->fails()) {
                $formattedErrors = [];
                foreach ($validator->errors()->messages() as $field => $messages) {
                    $formattedErrors[$field] = $messages[0];
                }
                return response()->json([
                    'errors' => $formattedErrors
                ], 422);
            }elseif($validator->passes()){
                // $post['submit_from'] = 'CU'; // contact us
                $post['name'] = trim($_POST['uname']);
                $post['email'] = $_POST['email'];
                // $post['country'] = $_POST['country'];
                $post['subject'] = $_POST['subject'];
                $post['message'] = $_POST['message'];
                $post['status'] = 0;
                $post['added_at'] = date('Y-m-d H:i:s');
                if(ContactModel::create($post)){
                    $post['msg'] = $post['message'];
                    unset($post['message']); // laravel does not accept message key, it gives error
                    Mail::to($post['email'])->send(new ThankYou($post));
                }
                return response()->json([
                    'message' => 'success'
                ]);
            }
        }
    }
    public function cms(Request $request){
        $segment1 = $request->segment(1);
        $cms = $this->commonmodel->getOneRecord('tbl_cms',['status'=>1,'page'=>$segment1]);
        if(!empty($cms)){
           $data['cms'] = $cms;
           return view('cms', $data);
           exit;
        }else{
           return redirect()->to('/404');
        }
    }
    public function faq(){
        return view('faq');
    }
    public function thank_you(){
        return view('thank_you');
    }
    
    public function payment_success(Request $request){
        return view('payment_success');
    }
    public function payment_cancel(Request $request){
        return view('payment_cancel');
    }
    /************************END OF DEVIL***************** */
    public function viewmail(){
        $data = [
            'client_name'   => 'MD Raj Guddu',
            'client_email'  => 'raj@yopmail.com',
            'client_phone'  => '1234567890',
            'service_name'  => 'Waxing',
            'selected_date' => '12-11-2025',
            'selected_time' => '9:00 AM',
        ];
        $mailto = 'test152@yopmail.com';
        // Mail::to($mailto)->send(new ClientBookingMail($data));
        Mail::to($mailto)->send(new AdminBookingMail($data));
        echo "Basic Email Sent. Check your inbox.";
        // return view('emailer.admin-booking', $data);
        // return view('emailer.client-booking', $data);
    }
    public function testmail(){
        // var_dump(openssl_get_cert_locations());
        // phpinfo();
        // exit;
        // Mail::raw('Laravel mail working', function ($m) {
        //     $m->to('raj@yopmail.com')->subject('SMTP Test');
        // });
        // exit;
        $data = array(
            'name'=>"Raj",
            // 'phone' => "1234567890",
            'email' => "raj@yopmail.com",
            'subject' => "Test subject",
            'msg' => "This is new test mail",
        );
        // $mailto = 'rajgudduara18@gmail.com';
        $mailto = 'test152@yopmail.com';
        $from = 'xyz@gmail.com';
        /*Mail::send('email.thankyou', $data, function($message) {
            $message->to($email, 'BALAJI Tour Package')->subject
                ('Thank You for Choosing Us!');
            $message->from($from,'BALAJI Tour Package');
        });*/
        Mail::to($mailto)->send(new ThankYou($data));
        echo "Basic Email Sent. Check your inbox.";
        //return view('email.thankyou');
    }
    public function testcart(){
        echo 'hi';
        $cart = new CartService;
        $cart->clear();
        $cart->add([
            'id'      => 1,
            'name'    => 'mango',
            'quantity'     => 1,
            'price'   => 100,
            'attributes' => ['size' => 'L', 'color' => 'Red']
        ]);
        $cart->update(1,2);
        $items = $cart->getItems();
        echo '<pre>';print_r($items);
        echo $items[1]['name'];
        echo $cart->getSubTotal();
    }
    
    
}
