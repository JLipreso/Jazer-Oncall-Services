<?php

namespace Jazer\Oncalls\Http\Controllers\Create;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateOncallBooking extends Controller
{
    public static function create(Request $request) {

       $request->validate([
        'service_refid'    => 'required',
        'provider_refid'   => 'required',
        'customer_refid'   => 'required'
    ]);
        
            $submitted = DB::connection("conn_oncalls")->table("oncall_booking")->insert([
                "project_refid"             => config('jtoncallsconfig.project_refid'),
                "booking_refid"             => \Jazer\Oncalls\Http\Controllers\Utility\ReferenceID::create('OCB'),
                "service_refid"             => $request['service_refid'],
                "provider_refid"            => $request['provider_refid'],
                "customer_refid"            => $request['customer_refid'],
                "customer_name"             => $request['customer_name'],
                "customer_phone"            => $request['customer_phone'],
                "customer_email"            => $request['customer_email'], 
                "customer_address"          => $request['customer_address'],
                "customer_geolocation"      => $request['customer_geolocation'],
                "emergency_contact_name"    => $request['emergency_contact_name'],
                "emergency_contact_phone"   => $request['emergency_contact_phone'],
                "problem_description"       => $request['problem_description'],
                "problem_category"          => $request['problem_category'],
                "urgency_level"             => 'medium',
                "preferred_datetime"        => $request['preferred_datetime'],
                "flexible_timing"           => '1',
                "access_instructions"       => $request['access_instructions'],
                "special_notes"             => $request['special_notes'],
                "photos_references"         => $request['photos_references'],
                "estimated_cost"            => $request['estimated_cost'],
                "quoted_price"              => 0,
                "final_amount"              => 0,
                "payment_method"            => 'cash',
                "payment_status"            => 'pending',
                "booking_datetime"          => Carbon::now(),
                "accepted_datetime"         => $request['accepted_datetime'],
                "scheduled_datetime"        => $request['scheduled_datetime'],
                "started_datetime"          => $request['started_datetime'],
                "completed_datetime"        => $request['completed_datetime'],
                "cancelled_datetime"        => $request['cancelled_datetime'],
                "response_time_actual"      => $request['response_time_actual'],
                "service_duration"          => $request['service_duration'],
                "technician_refid"          => $request['technician_refid'],
                "technician_name"           => $request['technician_name'],
                "technician_phone"          => $request['technician_phone'],
                "work_performed"            => $request['work_performed'],
                "materials_used"            => $request['materials_used'],
                "additional_charges"        => $request['additional_charges'],
                "before_photos"             => $request['before_photos'],
                "after_photos"              => $request['after_photos'],
                "warranty_details"          => $request['warranty_details'],
                "follow_up_required"        => $request['follow_up_required'],
                "follow_up_date"            => $request['follow_up_date'],
                "cancellation_reason"       => $request['cancellation_reason'],
                "cancelled_by"              => $request['cancelled_by'],
                "refund_amount"             => $request['refund_amount'],
                "rating_by_customer"        => $request['rating_by_customer'],
                "review_by_customer"        => $request['review_by_customer'],
                "rating_by_provider"        => $request['rating_by_provider'],
                "review_by_provider"        => $request['review_by_provider'],
                "communication_log"         => $request['communication_log'],
                "status"                    => 'pending',
                "created_at"                => Carbon::now(),
                "created_by"                => $request['created_by']
              //  "updated_at"                => $request['updated_at'],
             //   "updated_by"                => $request['updated_by']
               
                                            
            ]);

            if($submitted) {
                return [
                    "success"   => true,
                    "message"   => "Successfully oncall booking created."
                ];
            }
            else {
                return [
                    "success"   => false,
                    "message"   => "Failed to create oncall booking."
                ];
            }
        
    }
}