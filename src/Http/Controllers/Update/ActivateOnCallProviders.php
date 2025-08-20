<?php

namespace Jazer\Oncalls\Http\Controllers\Update;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ActivateOnCallProviders extends Controller
{
   public function activate(Request $request) {
        
        $request->validate([
        'provider_refid'   => 'required'           
        ]);
    
       $updated = DB::connection("conn_oncalls")->table("oncall_providers")
            ->where([
                "project_refid"  => config('jtoncallsconfig.project_refid'),
                "provider_refid"   => $request['provider_refid']
            ])
            ->update([
                "active"       => '1',
                "updated_by"   => $request['updated_by']

            ]);

        if($updated) {
            return [
                "success"   => true,
                "message"   => "Successfully activate the on call providers."
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Failed to activate the on call providers."
            ];
        }
    }
}