<?php

namespace Jazer\Oncalls\Http\Controllers\Update;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PassDTStatusOnCallTechnicians extends Controller
{
   public function passdrugteststatus(Request $request) {
        
        $request->validate([
        'technician_refid'   => 'required'           
        ]);
    
       $updated = DB::connection("conn_oncalls")->table("oncall_technicians")
            ->where([
                "project_refid"  => config('jtoncallsconfig.project_refid'),
                "technician_refid"   => $request['technician_refid']
            ])
            ->update([
                "drug_test_status"   => 'passed',
                "drug_test_date"     => Carbon::now(),
                "updated_by"         => $request['updated_by']

            ]);

        if($updated) {
            return [
                "success"   => true,
                "message"   => "Successfully set to passed drug test status the on call technicians."
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Failed to set passed drug test status to the on call technicians."
            ];
        }
    }
}