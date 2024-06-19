<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Schedule;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $currentDate = date('Y-m-d');
        $schedule = Schedule::where('date', $currentDate)->first();

        $stages = $schedule->stages();
        $input = 0;
        $defect = 0;
        //dd($stages);
        foreach ($stages as $stage)
        {
            $input += $stage->input;
            $defect += $stage->defect;
        }

        return view('index', compact('schedule','input', 'defect'));
    }
    public function stage(Request $request)
    {
        $currentDate = date('Y-m-d');
        $schedule = Schedule::where('date', $currentDate)->first();

        //$stages = $schedule->stages();
        $input = 0;
        $defect = 0;
        //dd($stages);
        foreach ($schedule->stages as $stage)
        {
            $input += $stage->input;
            $defect += $stage->defect;
        }
        //return response()->json($schedule->stages);
        if (isset($request->stage))
        {
            $stage = Stage::where('schedule_id', $schedule->id)->where('name', $request->stage);
        }
        return view('stage', compact('schedule','input', 'defect', 'stage'));
    }
    public function getRandomData()
    {
        $currentDate = date('Y-m-d');
        $schedule = Schedule::where('date', $currentDate)->first();

        if (!$schedule) {
            Log::error('No schedule found for the current date');
            return response()->json(['error' => 'No schedule found for the current date'], 404);
        }

        
        $input = 0;
        $defect = 0;

        foreach ($schedule->stages as $stage) {
            $rand = rand(0, 1);
            if ($rand == 0) {
                $stage->defect++;
            } 
            $stage->input++;
            $stage->status = $input;
            $stage->save();
            $input += $stage->input;
            $defect += $stage->defect;
        }

        $data = [
            'input' => $input,
            'defect' => $defect,
            'stages' => $schedule->stages,
            'defect_rate' => $input > 0 ? number_format(($defect / $input) * 100, 2, '.', '') : 0,
            'achieve' => number_format(($input / $schedule->target) * 100, 2, '.', ''),
        ];

        return response()->json($data);
    }

}

=======
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
}
>>>>>>> 0be400494de6b3677e925c5080b2fd63275149e6
