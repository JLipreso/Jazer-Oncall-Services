<?php

namespace Jazer\Oncalls\Http\Controllers\Delete;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/**
 * Task: Create a function that will delete job post
 */

class DeleteOnCallTechnicians extends Controller
{
    public static function delete(Request $request) {

        $request->validate([
        'technician_refid'         => 'required'
        ]);
        $deleted = DB::connection("conn_oncalls")->table("oncall_technicians")
            ->where([
                "project_refid"  => config('jtoncallsconfig.project_refid'),
                "technician_refid" => $request['technician_refid']
            ])
            ->delete();

        if($deleted) {
            return [
                "success"   => true,
                "message"   => "Successfully on call technicians deleted."
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Failed to delete on call technicians."
            ];
        }
    }
}