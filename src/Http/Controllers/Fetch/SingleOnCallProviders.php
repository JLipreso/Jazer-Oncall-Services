<?php

namespace Jazer\Oncalls\Http\Controllers\Fetch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SingleOnCallProviders extends Controller
{
    public static function singlefetch(Request $request) {
        $source = DB::connection("conn_oncalls")
        ->table("oncall_providers")
        ->select("provider_refid",
         "business_name",
         "business_type",
         "contact_person",
         "email", 
         "phone_primary",
         "phone_secondary",
         "address",
         "city",
         "state_province",
         "postal_code",
         "country",
         "website",
         "business_license", 
         "insurance_details",
         "coverage_areas",
         "languages_spoken",
         "certifications",
         "years_experience",
         "employee_count",
         "response_time_guarantee",
         "availability_247",
         "emergency_contact",
         "rating_average",
         "total_reviews",
         "total_completed_jobs",
         "profile_description",
         "profile_image",
         "verification_status",
         "verification_date",
         "verification_notes",
         "public",
         "active",
         "created_at",
         "created_by",
         "updated_at",
         "updated_by")
        ->where([
            "project_refid"     => config('jtoncallsconfig.project_refid'),
            "provider_refid"      => $request['provider_refid']
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


