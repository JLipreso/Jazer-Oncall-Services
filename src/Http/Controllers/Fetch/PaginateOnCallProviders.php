<?php

namespace Jazer\Oncalls\Http\Controllers\Fetch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PaginateOnCallProviders extends Controller
{
    public static function paginate(Request $request) {
        $query = DB::connection("conn_oncalls")->table("oncall_providers")
        ->where("project_refid", config('jtoncallsconfig.project_refid'));

    if (!empty($request['search'])) {
        $search = $request['search'];
        $query->where(function ($q) use ($search) {
            $q->where('business_name', 'like', "%{$search}%")
            ->orWhere('business_type', 'like', "%{$search}%")
            ->orWhere('contact_person', 'like', "%{$search}%");
        });
    }
    return $query
        ->orderBy("dataid", "desc")
        ->paginate(config('jtoncallsconfig.fetch_paginate_max'));
    }
}