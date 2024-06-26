<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $codes = Code::all();
        return view('admin.code.index', compact('codes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.code.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $code = Code::create($request->all());
        return redirect()->route('code.index')->with('success', 'Schedule created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Code $code)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Code $code)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Code $code)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Code $code)
    {
        //
    }
}
