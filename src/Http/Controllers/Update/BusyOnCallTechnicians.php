<?php

namespace Jazer\Oncalls\Http\Controllers\Update;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class BusyOnCallTechnicians extends Controller
{
   public function busy(Request $request) {
        
        $request->validate([
        'technician_refid'   => 'required'           
        ]);
    
       $updated = DB::connection("conn_oncalls")->table("oncall_technicians")
            ->where([
                "project_refid"  => config('jtoncallsconfig.project_refid'),
                "technician_refid"   => $request['technician_refid']
            ])
            ->update([
                "current_status"       => 'busy',
                "updated_by"            => $request['updated_by']

            ]);

        if($updated) {
            return [
                "success"   => true,
                "message"   => "Successfully set to busy status the on call technicians."
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Failed to set busy the on call technicians."
            ];
        }
    }
}