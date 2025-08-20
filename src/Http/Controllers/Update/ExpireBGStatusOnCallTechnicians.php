<?php

namespace Jazer\Oncalls\Http\Controllers\Update;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ExpireBGStatusOnCallTechnicians extends Controller
{
   public function expirebackgroundstatus(Request $request) {
        
        $request->validate([
        'technician_refid'   => 'required'           
        ]);
    
       $updated = DB::connection("conn_oncalls")->table("oncall_technicians")
            ->where([
                "project_refid"  => config('jtoncallsconfig.project_refid'),
                "technician_refid"   => $request['technician_refid']
            ])
            ->update([
                "background_check_status"   => 'expired',
                "background_check_date"     => Carbon::now(),
                "updated_by"                => $request['updated_by']

            ]);

        if($updated) {
            return [
                "success"   => true,
                "message"   => "Successfully set to expired background status the on call technicians."
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Failed to set expired background status to the on call technicians."
            ];
        }
    }
}