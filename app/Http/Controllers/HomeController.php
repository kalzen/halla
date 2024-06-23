<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use DB;

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
    function getDataStage($id)
    {
        $currentDate = date('Y-m-d');
        $schedule = Schedule::where('date', $currentDate)->orderBy('id', 'desc')->first();
        $current = Stage::find($id);

        //$stages = $schedule->stages();
        $input = 0;
        $defect = 0;
        //dd($stages);
        foreach ($schedule->stages as $stage) {
            $input += $stage->input;
            $defect += $stage->defect;
        }


        $defect_rate = number_format(($current->input / $current->input+$current->input->defect) * 100, 2, '.', '') ;

        $progress = number_format(($input/$schedule->dayplan)*100, 2, ',', '') ;
        $achive = (number_format(($input / $schedule->target) * 100, 2, '.', '')) ;
        return response()->json([
            'input' => $current->input,
            'defect' => $current->defect,
            'progress' => $progress,
            'defect_rate' => $defect_rate,
            'achive' => $achive
        ]);
    }
    function getDataSchedule()
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

        $defect_rate = number_format(($defect / $input+$defect) * 100, 2, '.', '') ;

        $progress = number_format(($input/$schedule->dayplan)*100, 2, ',', '') ;
        $achive = (number_format(($input / $schedule->target) * 100, 2, '.', '')) ;
        return response()->json([
            'input' => $input,
            'defect' => $defect,
            'progress' => $progress,
            'defect_rate' => $defect_rate,
            'achive' => $achive
        ]);
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
        try {
            $currentDate = date('Y-m-d');
            $schedule = Schedule::where('date', $currentDate)->first();

            if (!$schedule) {
                Log::error('No schedule found for the current date.');
                return response()->json(['error' => 'No schedule found for the current date.'], 404);
            }
            
            foreach ($request->all() as $index => $item) {
                if ($index < 7) {
                    if($item)
                    {
                    $stage = DB::table('stages')
                        ->where('schedule_id', $schedule->id)
                        ->where('name', 'Stage' . $index)
                        ->increment('defect');
                     //   return response()->json(['index' => $index, 'item'=> $item, 'schedule_id' => $schedule->id]);
                    }
                } elseif ($index < 10) {
                    if($item)
                    {
                    $stage = DB::table('stages')
                        ->where('schedule_id', $schedule->id)
                        ->where('name', 'Stage' . $index)
                        ->increment('input');
                    }
                } else {
                    if ($item)
                    {
                    $stage = DB::table('stages')
                        ->where('schedule_id', $schedule->id)
                        ->where('name', 'Stage' . $index)
                        ->update(['status' =>  1]);
                    }
                    else
                    {
                        $stage = DB::table('stages')
                        ->where('schedule_id', $schedule->id)
                        ->where('name', 'Stage' . $index)
                        ->update(['status' =>  2]);
                    }
                        
                }
            }

            return response()->json($request->all());
        } catch (\Exception $e) {
            Log::error('Error in getData function: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while processing the request.'], 500);
        }
    }

}

