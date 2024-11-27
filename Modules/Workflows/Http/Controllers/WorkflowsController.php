<?php

namespace Modules\Workflows\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Courses\Models\Course;
use Modules\Departments\Models\Department;
use Modules\Workflows\Models\Workflow;
use Modules\Users\Models\User;

class WorkflowsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        return view('workflows::index',[
            'courses' => Course::all(),
            'workflows' => Workflow::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('workflows::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('workflows::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('workflows::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
