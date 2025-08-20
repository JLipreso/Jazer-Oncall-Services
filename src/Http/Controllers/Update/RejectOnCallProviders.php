<?php

namespace Jazer\Oncalls\Http\Controllers\Update;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class RejectOnCallProviders extends Controller
{
   public function reject(Request $request) {
        
        $request->validate([
        'provider_refid'   => 'required'           
        ]);
    
       $updated = DB::connection("conn_oncalls")->table("oncall_providers")
            ->where([
                "project_refid"  => config('jtoncallsconfig.project_refid'),
                "provider_refid"   => $request['provider_refid']
            ])
            ->update([
                "verification_date"          => Carbon::now(),
                "verification_notes"         => $request['verification_notes'],
                "verification_status"       => 'rejected',
                "updated_by"                => $request['updated_by']

            ]);

        if($updated) {
            return [
                "success"   => true,
                "message"   => "Successfully rejected the on call providers."
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Failed to reject the on call providers."
            ];
        }
    }
}