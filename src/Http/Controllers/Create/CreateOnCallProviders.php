<?php

namespace Jazer\Oncalls\Http\Controllers\Create;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateOnCallProviders extends Controller
{
    public static function create(Request $request) {

       $request->validate([
        'business_name'             => 'required',
        'business_type'             => 'required|in:individual,company,agency,freelancer',
        'contact_person'            => 'required',
        'email'                     => 'required|email',
        'phone_primary'             => 'required',
        'address'                   => 'required',
        'city'                      => 'required',
        'years_experience'          => 'integer|min:0|max:999',
        'employee_count'            => 'integer|min:0|max:99999',
        'response_time_guarantee'   => 'integer|min:0|max:9999',
        'availability_247'          => 'in:0,1',

         ], [
            'business_type.in'      => 'The business_type field must be one of: individual, company, agency, freelancer.',
            'availability_247.in'   => 'The availability_247 field must be one of: 0, 1.',
    ]);
        
            $submitted = DB::connection("conn_oncalls")->table("oncall_providers")->insert([
                "project_refid"             => config('jtoncallsconfig.project_refid'),
                "provider_refid"            => \Jazer\Oncalls\Http\Controllers\Utility\ReferenceID::create('OCP'),
                "business_name"             => $request['business_name'],
                "business_type"             => $request['business_type'],
                "contact_person"            => $request['contact_person'],
                "email"                     => $request['email'],
                "phone_primary"             => $request['phone_primary'],
                "phone_secondary"           => $request['phone_secondary'], 
                "address"                   => $request['address'],
                "city"                      => $request['city'],
                "state_province"            => $request['state_province'],
                "postal_code"               => $request['postal_code'],
                "country"                   => $request['country'],
                "website"                   => $request['website'],
                "business_license"          => $request['business_license'],
                "insurance_details"         => json_encode($request['insurance_details']),
                "coverage_areas"            => json_encode($request['coverage_areas']),
                "languages_spoken"          => json_encode($request['languages_spoken']),
                "certifications"            => json_encode($request['certifications']),
                "years_experience"          => $request['years_experience'],
                "employee_count"            => $request['employee_count'],
                "response_time_guarantee"   => $request['response_time_guarantee'],
                "availability_247"          => $request['availability_247'],
                "emergency_contact"         => $request['emergency_contact'],
                "rating_average"            => 0,
                "total_reviews"             => 0,
                "total_completed_jobs"      => 0,
                "profile_description"       => $request['profile_description'],
                "profile_image"             => $request['profile_image'],
                "verification_status"       => 'pending',
             //   "verification_date"         => $request['verification_date'],
             //   "verification_notes"        => $request['verification_notes'],
                "public"                    => '1',
                "active"                    => '1',
                "created_at"                => Carbon::now(),
                "created_by"                => $request['created_by']
              //  "updated_at"                => $request['updated_at'],
              //  "updated_by"                => $request['updated_by']
               
                                            
            ]);

            if($submitted) {
                return [
                    "success"   => true,
                    "message"   => "Successfully oncall providers created."
                ];
            }
            else {
                return [
                    "success"   => false,
                    "message"   => "Failed to create oncall providers."
                ];
            }
        
    }
}