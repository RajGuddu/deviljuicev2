<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

use App\Models\Common_model;
use Barryvdh\DomPDF\Facade\Pdf;

class Test extends Controller
{
    private $commonmodel;
    public function __construct(){
        $this->commonmodel = new Common_model;
    }
    

    public function certificate(){
        $data = [
            'name' => 'Robin Kumar',
            'roll_no' => 'GD10289765456',
            'date' => now()->format('d M Y'),
        ];

        $pdf = Pdf::loadView('pdf.certificate', $data);

        // $fileName = 'certificate_' . time() . '.pdf';
        // $path = public_path('assets/pdf/' . $fileName);
        // $pdf->save($path); 

        return $pdf->stream('certificate.pdf'); 
    }
    public function showAssignment($studentId){
        
        $data = [
            'name' => 'Rahul Sharma',
            'roll_no' => 'DM101',
            'course' => 'Digital Marketing',
            'date' => now()->format('d M Y')
        ];

        return Pdf::loadView('pdf.certificate', $data)->stream("assignment_{$data['roll_no']}.pdf"); 
    }
    public function assignment(){
        return view('pdf.assignment');
    }
    public function book48(){
        $upcommingAppointment = $this->commonmodel->get_upcomming_appointment_list();
        if($upcommingAppointment->isNotEmpty()){
            foreach($upcommingAppointment as $record){
                $mailData['bookings'][] = [
                    'client_name' => $record->name,
                    'service_name' => $record->service_name.' ('.$record->variant.')',
                    'selected_date' => Carbon::parse($record->service_date . ' ' . $record->serv_time)->format('d F Y \a\t h:i a'),
                ];
                
            }
            $send = Mail::send('emailer.upcomming_booking_reminder', $mailData, function ($message){
                $message->to(ADMIN_MAIL_TO)
                        ->subject('Upcoming Booking Reminder');
            });
            if($send){
                echo 'Mail Send<br>';
            }
        }
        echo '<pre>'; print_r($upcommingAppointment);
    }
}