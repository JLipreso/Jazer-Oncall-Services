<?php

namespace Jazer\Oncalls\Http\Controllers\Delete;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/**
 * Task: Create a function that will delete job post
 */

class DeleteOnCallProviders extends Controller
{
    public static function delete(Request $request) {

        $request->validate([
        'provider_refid'         => 'required'
        ]);
        $deleted = DB::connection("conn_oncalls")->table("oncall_providers")
            ->where([
                "project_refid"  => config('jtoncallsconfig.project_refid'),
                "provider_refid" => $request['provider_refid']
            ])
            ->delete();

        if($deleted) {
            return [
                "success"   => true,
                "message"   => "Successfully on call providers deleted."
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Failed to delete on call providers."
            ];
        }
    }
}