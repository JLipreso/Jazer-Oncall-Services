<?php

namespace Jazer\Oncalls\Http\Controllers\Update;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class OnBreakOnCallTechnicians extends Controller
{
   public function onbreak(Request $request) {
        
        $request->validate([
        'technician_refid'   => 'required'           
        ]);
    
       $updated = DB::connection("conn_oncalls")->table("oncall_technicians")
            ->where([
                "project_refid"  => config('jtoncallsconfig.project_refid'),
                "technician_refid"   => $request['technician_refid']
            ])
            ->update([
                "current_status"       => 'on_break',
                "updated_by"            => $request['updated_by']

            ]);

        if($updated) {
            return [
                "success"   => true,
                "message"   => "Successfully set to on break status the on call technicians."
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Failed to set on break the on call technicians."
            ];
        }
    }
}