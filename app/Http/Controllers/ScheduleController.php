<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        foreach ($schedules as $schedule)
        {
            $stages = $schedule->stages;
            $schedule->input = 0;
            $schedule->defect = 0;
            //dd($stages);
            foreach ($stages as $stage) {
            $schedule->input += $stage->input;
            $schedule->defect += $stage->defect;
        }

        }
        return view('admin.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.schedule.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
            $schedule = Schedule::create($request->all());

            for ($i = 1; $i <= 7; $i++) {
                $stage = Stage::create([
                    'schedule_id' => $schedule->id,
                    'name' => 'Stage' . $i
                ]);
            }

            return redirect()->route('schedule.index')->with('success', 'Schedule created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
