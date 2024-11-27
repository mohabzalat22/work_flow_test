<?php

namespace Modules\Workflows\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Departments\Models\Department;
use Modules\Workflows\Models\Workflow;
use Modules\Users\Models\User;
use Modules\Workflows\Notifications\WorkflowsNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class StartController extends Controller
{
    public function index(){//start function
        $Workflows = Workflow::orderBy('order')->get();
        if(!$Workflows->isEmpty()){
            $department_id = $Workflows->first()->department_id; // get first user in workflow
            $department = Department::find($department_id);
            
            $user = User::find($department->user_id);
            // send notification
            if($user && !$user->notified){
                $user->notify(new WorkflowsNotification('no file', 'no comment', 1));
                $user->notified = 1;
                $user->save();
            } 
            dd("DONE");
        }
    }

    public function notification(){
        return view('workflows::notifications',[
            'notification' => Auth::user()->notifications->first()
        ]);
    }

    public function decline($order){
        if($order==1){
            dd('first step maybe i will make middleware here');
        }
        // get previous workflow
        $workflow = Workflow::where('order', $order - 1)->first();
        $department = Department::find($workflow->department_id);
        $user = User::find($department->user_id);
        // delete notification for previous
        $user->notifications()->first()->delete();
        
        // make new one  for previous
        $user->notify(new WorkflowsNotification( 'FILE FOR REDO NEW FEATURE', 'REDO' , $order - 1));

        // delete notification for auth user to get new one from the next agreed step
        $authUser = User::find(Auth::user()->id);

        $authUser->notifications()->first()->delete();
        $authUser->notified = 0;
        $authUser->save();
        

        // dd($user);

        dd("DONE");
    }

}
