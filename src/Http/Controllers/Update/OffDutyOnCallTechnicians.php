<?php

namespace Jazer\Oncalls\Http\Controllers\Update;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class OffDutyOnCallTechnicians extends Controller
{
   public function offduty(Request $request) {
        
        $request->validate([
        'technician_refid'   => 'required'           
        ]);
    
       $updated = DB::connection("conn_oncalls")->table("oncall_technicians")
            ->where([
                "project_refid"  => config('jtoncallsconfig.project_refid'),
                "technician_refid"   => $request['technician_refid']
            ])
            ->update([
                "current_status"       => 'off_duty',
                "updated_by"            => $request['updated_by']

            ]);

        if($updated) {
            return [
                "success"   => true,
                "message"   => "Successfully set to off duty status the on call technicians."
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Failed to set off duty the on call technicians."
            ];
        }
    }
}