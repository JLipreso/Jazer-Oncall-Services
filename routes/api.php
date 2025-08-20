<?php

use Illuminate\Support\Facades\Route;
use Jazer\Oncalls\Http\Controllers\Create\CreateOncallBooking;
use Jazer\Oncalls\Http\Controllers\Create\CreateOncallProviders;
use Jazer\Oncalls\Http\Controllers\Update\UpdateOnCallProviders;
use Jazer\Oncalls\Http\Controllers\Update\VerifyOnCallProviders;
use Jazer\Oncalls\Http\Controllers\Update\SuspendOnCallProviders;
use Jazer\Oncalls\Http\Controllers\Update\RejectOnCallProviders;
use Jazer\Oncalls\Http\Controllers\Update\PublicOnCallProviders;
use Jazer\Oncalls\Http\Controllers\Update\PrivateOnCallProviders;
use Jazer\Oncalls\Http\Controllers\Update\ActivateOnCallProviders;
use Jazer\Oncalls\Http\Controllers\Update\DeactivateOnCallProviders;
use Jazer\Oncalls\Http\Controllers\Delete\DeleteOnCallProviders;
use Jazer\Oncalls\Http\Controllers\Fetch\PaginateOnCallProviders;
use Jazer\Oncalls\Http\Controllers\Fetch\SingleOnCallProviders;
use Jazer\Oncalls\Http\Controllers\Create\CreateOnCallTechnicians;
use Jazer\Oncalls\Http\Controllers\Update\UpdateOnCallTechnicians;
use Jazer\Oncalls\Http\Controllers\Update\BusyOnCallTechnicians;
use Jazer\Oncalls\Http\Controllers\Update\OffDutyOnCallTechnicians;
use Jazer\Oncalls\Http\Controllers\Update\OnBreakOnCallTechnicians;
use Jazer\Oncalls\Http\Controllers\Update\ClearBGStatusOnCallTechnicians;
use Jazer\Oncalls\Http\Controllers\Update\FailBGStatusOnCallTechnicians;
use Jazer\Oncalls\Http\Controllers\Update\ExpireBGStatusOnCallTechnicians;
use Jazer\Oncalls\Http\Controllers\Update\PassDTStatusOnCallTechnicians;
use Jazer\Oncalls\Http\Controllers\Update\FailDTStatusOnCallTechnicians;
use Jazer\Oncalls\Http\Controllers\Update\ExpireDTStatusOnCallTechnicians;
use Jazer\Oncalls\Http\Controllers\Update\ActivateOnCallTechnicians;
use Jazer\Oncalls\Http\Controllers\Update\DeactivateOnCallTechnicians;
use Jazer\Oncalls\Http\Controllers\Delete\DeleteOnCallTechnicians;
use Jazer\Oncalls\Http\Controllers\Fetch\PaginateOnCallTechnicians;
use Jazer\Oncalls\Http\Controllers\Fetch\SingleOnCallTechnicians;

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'oncall-booking'], function () {     
        Route::post('create', [CreateOncallBooking::class, 'create']);
    });
    Route::group(['prefix' => 'oncall-providers'], function () {     
        Route::post('create', [CreateOncallProviders::class, 'create']);
        Route::put('update', [UpdateOnCallProviders::class, 'update']);
        Route::put('verify', [VerifyOnCallProviders::class, 'verify']);
        Route::put('suspend', [SuspendOnCallProviders::class, 'suspend']);
        Route::put('reject', [RejectOnCallProviders::class, 'reject']);
        Route::put('set-public', [PublicOnCallProviders::class, 'setpublic']);
        Route::put('set-private', [PrivateOnCallProviders::class, 'setprivate']);
        Route::put('activate', [ActivateOnCallProviders::class, 'activate']);
        Route::put('deactivate', [DeactivateOnCallProviders::class, 'deactivate']);
        Route::delete('delete', [DeleteOnCallProviders::class, 'delete']);
        Route::get('paginate', [PaginateOnCallProviders::class, 'paginate']);
        Route::get('singlefetch', [SingleOnCallProviders::class, 'singlefetch']);
    });
    Route::group(['prefix' => 'oncall-technicians'], function () {     
        Route::post('create', [CreateOnCallTechnicians::class, 'create']);
        Route::put('update', [UpdateOnCallTechnicians::class, 'update']);
        Route::put('busy', [BusyOnCallTechnicians::class, 'busy']);
        Route::put('off-duty', [OffDutyOnCallTechnicians::class, 'offduty']);
        Route::put('on-break', [OnBreakOnCallTechnicians::class, 'onbreak']);
        Route::put('clear-background-status', [ClearBGStatusOnCallTechnicians::class, 'clearbackgroundstatus']);
        Route::put('fail-background-status', [FailBGStatusOnCallTechnicians::class, 'failbackgroundstatus']);
        Route::put('expire-background-status', [ExpireBGStatusOnCallTechnicians::class, 'expirebackgroundstatus']);
        Route::put('pass-drug-test', [PassDTStatusOnCallTechnicians::class, 'passdrugteststatus']);
        Route::put('fail-drug-test', [FailDTStatusOnCallTechnicians::class, 'faildrugteststatus']);
        Route::put('expire-drug-test', [ExpireDTStatusOnCallTechnicians::class, 'expiredrugteststatus']);
        Route::put('activate', [ActivateOnCallTechnicians::class, 'activate']);
        Route::put('deactivate', [DeactivateOnCallTechnicians::class, 'deactivate']);
        Route::delete('delete', [DeleteOnCallTechnicians::class, 'delete']);
        Route::get('paginate', [PaginateOnCallTechnicians::class, 'paginate']);
        Route::get('singlefetch', [SingleOnCallTechnicians::class, 'singlefetch']);
    });
    
});

