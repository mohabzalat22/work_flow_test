<?php

namespace Modules\Workflows\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Workflows\Models\Workflow;
use Modules\Users\Models\User;
use Modules\Departments\Models\Department;

use Modules\Workflows\Notifications\WorkflowsNotification;


class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('workflows::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('workflows::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => ['required','file'],
            'comment'=> ['required','string', 'max:255'],
            'order'=> ['required','integer'],
        ]);
        // save file to public
        $file = $request->file('file');

        $fileName = time() . '_' . $file->getClientOriginalName();

        $destinationPath = public_path('uploads');

        $file->move($destinationPath, $fileName);
  

        //agree
        $workflow = Workflow::where('order',$request->order)->first();
        $workflow->file = $request->file;
        $workflow->comment = $request->comment;
        $workflow->save();

        //notificaiton for the (----------next----------) user in workflow order
        $maxWorkflowSteps=Workflow::count();
        if($maxWorkflowSteps == ((int) $request->order) ){
            dd('exceeded last user for last workflow step here maybe i will make middleware here to avoid it');
        }
        else{
            $nextWorkflow = Workflow::where('order', ((int) $request->order) + 1 )->first();
            
            $department_id = $nextWorkflow->department_id; // get first user in next workflow
            $department = Department::find($department_id);

            $user = User::find($department->user_id);
            // send notification
            if($user && !$user->notified){
                $user->notify(new WorkflowsNotification($fileName, $request->comment , ( (int) $request->order) + 1 ));
                $user->notified = 1;
                $user->save();

                dd('DONE');
            } 
        }

    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        // return view('workflows::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // return view('workflows::edit');
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
