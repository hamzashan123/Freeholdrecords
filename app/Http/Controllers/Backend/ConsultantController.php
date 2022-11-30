<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ConsultantUser;
use DB;
use App\Mail\AssignUserToConsultant;
use Illuminate\Support\Facades\Mail;

class ConsultantController extends Controller
{
    public function index(){

        $Assignedconsultants = DB::table('users')
                 ->join('consultant_users', 'users.id', '=', 'consultant_users.consultant_id')
                 ->select('users.*', 'consultant_users.id as consultant_id',DB::raw('count(*) as total'))
                 ->groupBy('consultant_users.consultant_id')
                 ->get();

        $consultants = User::role('consultant')->get();
        $users = User::role('user')->get();
        
       // dd($Assignedconsultants);
        return view('backend.consultants.index',compact('consultants','users','Assignedconsultants'));
    }

    public function assignUserToConsultant(Request $request){
  
        foreach($request->user_ids as  $user){   
            $exist = ConsultantUser::where(['consultant_id' => $request->consultant_id,'client_id'  => $user])->exists();
              
            if($exist == false){
                $data = ConsultantUser::create([
                    'consultant_id' => $request->consultant_id,
                    'client_id'  => $user,
                    'comments' => 'assigned to consultant',
                    'assigned_by_id' => auth()->user()->id
                ]);
                $userdetail = User::find($request->consultant_id);
                
                $userData = [
                    'surname' => $userdetail->surname,
                    'username' => $userdetail->username,
                    'email' => $userdetail->email,
                    'usertype' => 'consultant',
                    'messagetype' => '<p>You have been assigned a new client. Please make sure to login to to Auslegal Info/Docs system.Once inside your dashboard, go to the left side column and click on “My clients”.Once the my clients page opens, you will see the list of clients assigned to you. 
                        Search for the client you need to refer to and then click on view form. The online form completed by client will open </p>. <h4>FORM EVALUATION </h4> 
                        <p>At this point you will need to evaluate the form completed by the client. You will need to make sure to check each information indicated on the online form.
                        About the documents provided by the client, you will need to download them in order to view the content.
                        </p> <h4>HOW TO EVALUATE AND COMMENT THE CLIENT’S FORM </h4> <p>
                        For any information or document that is either missing, not correct or for which you as the consultant need clarification on, you will need to click on the left column (where the question is). 
                        That specific line will become red PLUS an additional column on the right side will appear. You will need insert your comments into that right side column. 
                        Make sure to only select the lines and/or the documents that need to be commented on. 
                        Do not select the lines for which the information and/or the documents are correct and do not need any comments from your side. </p>
                        <h4>HOW TO SEND THE CORRECTION EMAIL TO THE CLIETN </h4>
                        <p>Once your evaluation has been completed, you will be required to click on “Send correction email” that you can find on the top right side of the page.
                        Once you have clicked on that link the client will receive an email with your comments on the information and documents the client has provided. 
                        Once the client has corrected the online information you will be able to continue the evaluation. 
                        </p>
                        '
                   
                ];
    
                Mail::to($userdetail->email)->send(new AssignUserToConsultant($userData));
            }
        }
        
        
        return redirect()->back()->with('success','User Assigned successfully');
    }

    public function viewUsers(int $id){
       
        $data = ConsultantUser::where('consultant_id' ,$id);
        $customers = $data->pluck('client_id');
        $users = DB::table('users')->whereIn('id',$customers->toArray())->get();
        
        return view('backend.consultants.users',compact('users','id'));
    }

    public function deleteConsultantUser(int $userid,int $consultant_id){
        
        $data = ConsultantUser::where(['consultant_id' => $consultant_id, 'client_id' => $userid])->delete();
    
        return redirect()->back();

    }

}
