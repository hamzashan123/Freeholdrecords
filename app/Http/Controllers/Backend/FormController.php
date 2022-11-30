<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ConsultantUser;
use App\Models\UserForms;
use DB;
use App\Mail\AssignFormToUser;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    
    public function index(){

        $users = User::role('user')->get();
       
       
        
        return view('backend.forms.index',compact('users'));
    }

    public function assignFormsToUser(Request $request){

        foreach($request->form_ids as  $formid){
            $exist = UserForms::where(['user_id' => $request->user_id,'form_id'  => $formid])->exists();

            if($exist == false){
                $data = UserForms::create([
                    'user_id' => $request->user_id,
                    'form_id'  => $formid,
                ]);
                
            }
        }
        if(!empty($request->user_id)){
            $userdetail = User::find($request->user_id);
                
                $userData = [
                    'username' => $userdetail->username,
                    'surname' => $userdetail->surname,
                    'email' => $userdetail->email,
                    'usertype' => 'consultant',
                    'messagetype' => 'Australia Legal has assigned you a new form for your application. 
                        <h4>What you need to do </h4>
                        Please make sure to login to the Auslegal Info/Docs system page by following this link:
                        <a href="' . url('admin') . '">Login now</a>
                        <h4> What to do and what you can do</h4> 
                        <p>Once you are logged in, on the left side column you will see the name of the form that has been assigned to you. 
                        Please make sure to click on it and start filling it out. 
                        You can SAVE your application and resume it at a second stagge. 
                        Please note that saving your application does not mean you have submitted the online form.
                        Once your application is submitted you will receive another email with further instructions</p>.
                    '
                   
                ];
    
                Mail::to($userdetail->email)->send(new AssignFormToUser($userData));
        }
       
        
        return redirect()->back()->with('success','User Assigned successfully');
    }

    public function getUserForms(int $id){
        $data = UserForms::where('user_id' ,$id);
        $forms = $data->pluck('form_id');
        $userassignforms = DB::table('forms')->whereIn('id',$forms)->get();
       
        return view('backend.forms.forms',compact('userassignforms','id'));
    }

    public function deleteUserForm(int $user_id,int $form_id){
        
        
        $data = UserForms::where(['user_id' => $user_id, 'form_id' => $form_id])->delete();
        DB::table('form360')->where(['user_id' => $user_id])->delete();
        DB::table('employerform')->where(['user_id' => $user_id])->delete();
            
        return redirect()->back();

    }

    public function getFormDetails(int $user_id, int $form_id){
           if($form_id == 1){

            $data  =  DB::table('form360')
                        ->join('form360_matrix', 'form360.id', '=', 'form360_matrix.form360_id')     
                        ->where('user_id',$user_id)->select('form360.*','form360_matrix.*')->get();
            //dd($data);            
            return redirect()->route('admin.form360.index',compact('data'));
            }elseif($form_id == 2){

            $data  =  DB::table('employerform')
                ->join('employerform_sbs', 'employerform.id', '=', 'employerform_sbs.employerform_id')     
                ->where('user_id',$user_id)->select('employerform.*','employerform_sbs.*')->get();   
           // dd($data);    
            return redirect()->route('admin.employerform.index',compact('data'));   
            }else{

           }
         
          // dd($data);
    }



    public function form1(){

        return view('backend.forms.form1');
    }
    public function form2(){

        return view('backend.forms.form2');
    }
    public function form3(){

        return view('backend.forms.form3');
    }

}

