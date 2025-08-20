<?php

namespace Jazer\Oncalls\Http\Controllers\Update;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DeactivateOnCallProviders extends Controller
{
   public function deactivate(Request $request) {
        
        $request->validate([
        'provider_refid'   => 'required'           
        ]);
    
       $updated = DB::connection("conn_oncalls")->table("oncall_providers")
            ->where([
                "project_refid"  => config('jtoncallsconfig.project_refid'),
                "provider_refid"   => $request['provider_refid']
            ])
            ->update([
                "active"       => '0',
                "updated_by"   => $request['updated_by']

            ]);

        if($updated) {
            return [
                "success"   => true,
                "message"   => "Successfully deactivate the on call providers."
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Failed to deactivate the on call providers."
            ];
        }
    }
}