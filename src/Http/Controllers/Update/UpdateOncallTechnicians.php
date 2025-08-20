<?php

namespace Jazer\Oncalls\Http\Controllers\Update;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UpdateOnCallTechnicians extends Controller
{
    public static function update(Request $request) {

       $request->validate([
        'technician_refid'           => 'required',
        'provider_refid'             => 'required',
        'employee_id'                => 'required',
        'first_name'                 => 'required',
        'last_name'                  => 'required',
        'email'                      => 'required|email',
        'phone'                      => 'required',
        'years_experience'           => 'integer|min:0|max:999',
        'hourly_rate'                => 'required|numeric|min:0|max:99999999.99',
        'last_location_update'       => 'nullable|date_format:Y-m-d H:i:s',
        'total_jobs_completed'       => 'integer|min:0|max:999999',
        'average_rating'             => 'numeric|min:0|max:9.99',
        'total_reviews'              => 'integer|min:0|max:99999',
    ]);

     $updated = DB::connection("conn_oncalls")->table("oncall_technicians")
            ->where([
                "project_refid"  => config('jtoncallsconfig.project_refid'),
                "technician_refid"   => $request['technician_refid']
            ])
            ->update([
                "provider_refid"               => $request['provider_refid'],
                "employee_id"                  => $request['employee_id'],
                "first_name"                   => $request['first_name'],
                "last_name"                    => $request['last_name'],
                "email"                        => $request['email'],
                "phone"                        => $request['phone'], 
                "emergency_contact"            => $request['emergency_contact'],
                "specializations"              => json_encode($request['specializations']),
                "certifications"               => json_encode($request['certifications']),
                "license_numbers"              => json_encode($request['license_numbers']),
                "years_experience"             => $request['years_experience'],
                "hourly_rate"                  => $request['hourly_rate'],
                "availability_schedule"        => json_encode($request['availability_schedule']),
             // "current_status"               => json_encode($request['current_status']),
                "last_location"                => json_encode($request['last_location']),
                "last_location_update"         => $request['last_location_update'],
                "total_jobs_completed"         => $request['total_jobs_completed'],
                "average_rating"               => $request['average_rating'],
                "total_reviews"                => $request['total_reviews'],
             // "background_check_status"      => 'pending',
             // "background_check_date"        => $request['background_check_date'],
             // "drug_test_status"             => 'pending',
             // "drug_test_date"               => $request['drug_test_date'],
                "profile_photo"                => $request['profile_photo'],
             //  "active"                       => '1',
             // "created_at"                   => $request['created_at'],
             //   "created_by"                   => $request['created_by'],
            //  "updated_at"                   => 'pending',
                "updated_by"                   => $request['updated_by'],

            ]);

        if($updated) {
            return [
                "success"   => true,
                "message"   => "Successfully oncall technicians updated."
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Failed to update the oncall technicians."
            ];
        }
        
    }
}