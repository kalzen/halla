<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $currentDate = date('Y-m-d');
        $schedule = Schedule::where('date', $currentDate)->orderBy('id', 'desc')->first();
        if (!$schedule) {
            Log::error('No schedule found for the current date');
            return view('error', ['message' => 'No schedule found for the current date. Please add a new schedule.']);
        }
        $stages = $schedule->stages;
        $input = 0;
        $defect = 0;
        //dd($stages);
        foreach ($stages as $stage) {
            $input += $stage->input;
            $defect += $stage->defect;
        }

        return view('index', compact('schedule', 'input', 'defect'));
    }
    public function stage(Request $request)
    {
        $currentDate = date('Y-m-d');
        $schedule = Schedule::where('date', $currentDate)->orderBy('id', 'desc')->first();

        //$stages = $schedule->stages();
        $input = 0;
        $defect = 0;
        //dd($stages);
        foreach ($schedule->stages as $stage) {
            $input += $stage->input;
            $defect += $stage->defect;
        }
        //return response()->json($schedule->stages);
        if (isset($request->stage)) {
            $stage = Stage::where('schedule_id', $schedule->id)->where('name', $request->stage);
        }
        return view('stage', compact('schedule', 'input', 'defect', 'stage'));
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
    public function getModel(Request $request)
    {
        // try {
        //     $stage = $request->input('stage');
        //     $modelName = $request->input('model');

        //     $model = Model::where('stage', $stage)
        //                  ->where('name', $modelName)
        //                  ->first();

        //     if ($model) {
        //         // Update the stage of the model
        //         $model->stage = 'Stage2';
        //         $model->save();

        //         return response()->json($model);
        //     } else {
        //         return response()->json(['error' => 'Model not found'], 404);
        //     }
        // } catch (\Exception $e) {
        //     Log::error('Error in getModel: ' . $e->getMessage());
        //     return response()->json(['error' => 'An error occurred while retrieving the model'], 500);
        // }
        return response()->json($request);
    }
    public function getData(Request $request)
    {
        $currentDate = date('Y-m-d');
        $schedule = Schedule::where('date', $currentDate)->first();
        for ($i = 0; $i++; $i<7)
        {
            if ($request[$i])
            {
                $stage = Stage::where('name', 'Stage'.$i)->where('schedule_id', $schedule->id);
                $stage->defect = $stage->defect+1;
                $stage->save();
            }
        }
        for ($i=7; $i++; $i<10)
        {
            if ($request[$i])
            {
                $stage = Stage::where('name', 'Stage'.$i)->where('schedule_id', $schedule->id);
                $stage->input = $stage->input+1;
                $stage->save();
            }
        }
        for ($i=10; $i++; $i<17)
        {
            $stage = Stage::where('name', 'Stage'.$i)->where('schedule_id', $schedule->id);
            $stage->status = $request[$i];
            $stage->save();
            
        }
        // try {
        //     $stage = $request->input('stage');
        //     $modelName = $request->input('model');

        //     $model = Model::where('stage', $stage)
        //                  ->where('name', $modelName)
        //                  ->first();

        //     if ($model) {
        //         // Update the stage of the model
        //         $model->stage = 'Stage2';
        //         $model->save();

        //         return response()->json($model);
        //     } else {
        //         return response()->json(['error' => 'Model not found'], 404);
        //     }
        // } catch (\Exception $e) {
        //     Log::error('Error in getModel: ' . $e->getMessage());
        //     return response()->json(['error' => 'An error occurred while retrieving the model'], 500);
        // }
        return response()->json($request);
    }
}

