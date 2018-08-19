<?php

namespace App\Http\Controllers\Api\Web;

use App\Models\StepRun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CallbackController extends Controller
{
    /**
     * 发起待办的回调
     * @param Request $request
     */
    public function todo(Request $request){
        $recordId = $request->record_id;
        $stepRunId = $request->step_run_id;
        $stepRunData = StepRun::find($stepRunId);
        $stepRunData->record_id = $recordId;
        $stepRunData->save();
    }
}
