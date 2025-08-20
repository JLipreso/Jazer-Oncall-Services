<?php

namespace Jazer\Oncalls\Http\Controllers\Fetch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SingleOnCallTechnicians extends Controller
{
    public static function singlefetch(Request $request) {
        $source = DB::connection("conn_oncalls")
        ->table("oncall_technicians")
        ->select("technician_refid",
         "provider_refid",
         "employee_id",
         "first_name",
         "last_name", 
         "email",
         "phone",
         "emergency_contact",
         "specializations",
         "certifications",
         "license_numbers",
         "years_experience",
         "hourly_rate",
         "availability_schedule", 
         "current_status",
         "last_location",
         "last_location_update",
         "total_jobs_completed",
         "average_rating",
         "total_reviews",
         "background_check_status",
         "background_check_date",
         "drug_test_status",
         "drug_test_date",
         "profile_photo",
         "active",
         "created_at",
         "created_by",
         "updated_at",
         "updated_by")
        ->where([
            "project_refid"     => config('jtoncallsconfig.project_refid'),
            "technician_refid"      => $request['technician_refid']
        ])
        ->get();

        if(count($source) > 0) {
            return $source[0];
        }
        else {
            return [];
        }
    }
}


