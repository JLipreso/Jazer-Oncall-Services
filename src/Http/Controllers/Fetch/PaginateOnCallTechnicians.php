<?php

namespace Jazer\Oncalls\Http\Controllers\Fetch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PaginateOnCallTechnicians extends Controller
{
    public static function paginate(Request $request) {
        $query = DB::connection("conn_oncalls")->table("oncall_technicians")
        ->where("project_refid", config('jtoncallsconfig.project_refid'));

    if (!empty($request['search'])) {
        $search = $request['search'];
        $query->where(function ($q) use ($search) {
            $q->where('employee_id', 'like', "%{$search}%")
            ->orWhere('first_name', 'like', "%{$search}%")
            ->orWhere('last_name', 'like', "%{$search}%");
        });
    }
    return $query
        ->orderBy("dataid", "desc")
        ->paginate(config('jtoncallsconfig.fetch_paginate_max'));
    }
}