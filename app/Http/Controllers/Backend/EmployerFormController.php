<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Mail\NewFormSubmitted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\ConsultantUser;

class EmployerFormController extends Controller
{
    public function index()
    {
        if (!empty($_GET['userid']) && !empty($_GET['form_id'])) {
            $userid = $_GET['userid'];
        } else {
            $userid = Auth::user()->id;
        }


        $data  =  DB::table('employerform')
            ->join('employerform_job', 'employerform.id', '=', 'employerform_job.employerform_id')
            ->join('employerform_labour', 'employerform.id', '=', 'employerform_labour.employerform_id')
            ->join('employerform_nomination', 'employerform.id', '=', 'employerform_nomination.employerform_id')
            ->join('employerform_sbs', 'employerform.id', '=', 'employerform_sbs.employerform_id')
            ->where('employerform.user_id', $userid)->select(
                'employerform.*',
                'employerform_job.*',
                'employerform_labour.*',
                'employerform_nomination.*',
                'employerform_sbs.*'
            )->get();



        if (!empty($data[0])) {
            $data = $data[0];
        }
        if (!empty($data->user_id)) {
            $data->documents  =  DB::table('employerform_documents')->where(['user_id' => $data->user_id])->get();
        }

        $docdataemployerform = [];

        if (!empty($data->documents)) {
            foreach ($data->documents as $key =>  $doc) {
                $docdataemployerform[$doc->doc_field] = $doc->doc_name;
            }
        }
        return view('backend.forms.employerform.index', compact('data', 'docdataemployerform'));
    }

    public function save(Request $request)
    {

        $formExist = DB::table('employerform')->where('user_id', Auth::user()->id)->first();

        if (empty($formExist->id)) {

            $formid = DB::table('employerform')->insertGetId([
                'user_id' => auth()->user()->id,
                'created_at' => date('m/d/Y h:i:s a'),
                'updated_at' => date('m/d/Y h:i:s a')
            ]);

            $fieldsets = $this->getFieldsetsData($formid, $request);

            DB::table('employerform_sbs')->insert([
                $fieldsets['sbsData']
            ]);

            DB::table('employerform_labour')->insert([
                $fieldsets['labourData']
            ]);

            DB::table('employerform_job')->insert([
                $fieldsets['jobData']
            ]);

            DB::table('employerform_nomination')->insert([
                $fieldsets['nominationData']
            ]);


            $this->saveDocuments($formid, $request);
            
                $formdata = DB::table('employerform')->where('user_id', Auth::user()->id)->first();

                if ($request->has('formsubmit') && $formdata->is_email_sent == false) {
                    
                    DB::table('employerform')->where('user_id', Auth::user()->id)->update(['is_email_sent' => true]);
                    $admindata = [
                        'admin' => true,
                        'consultant' => false,
                        'surname' => Auth::user()->surname,
                        'username' => Auth::user()->username,
                        'email' => Auth::user()->email,
                        'messagetype' => 'A new application has been recieved!'
                    ];
                    Mail::to('riccardo@australialegal.it')->send(new NewFormSubmitted($admindata));
    
                    $userdata = [
                        'admin' => false,
                        'consultant' => false,
                        'surname' => Auth::user()->surname,
                        'username' => Auth::user()->username,
                        'email' => Auth::user()->email,
                        'messagetype' => ' 
                            Your application has been correctly submitted and received on the Auslegal Info/Docs system.
                            What will happen next
                            Australia Legal Admin Team will review the form and then assign it to an internal consultant.
                            Once the consultant is assigned, he/she will check the information and documents you have provided and will either:
                            ⦁	Inform you that the application will be lodged as no other information is needed
                            Or 
                            2) 
                            You will receive an email from the consultant with a request of more information and/or specific comments about the information and documents you will have provided on the online form.
                            '
                    ];
                    Mail::to(Auth::user()->email)->send(new NewFormSubmitted($userdata));

                     // if this user has any consultant then email also be sent to consultant
                    $consultants = ConsultantUser::where(['client_id'  => Auth::user()->id])->pluck('consultant_id');
                    if(count($consultants) > 0){
                        foreach($consultants as $consultant){
                            $consultantUser = DB::table('users')->where('id',$consultant)->first();
                            $consultantdata = [
                                'admin' => false,
                                'consultant' => true,
                                'surname' => $consultantUser->surname,
                                'username' => $consultantUser->username,
                                'email' => $consultantUser->email,
                                'messagetype' => 'A new application is submitted by your assigned user please check and make correction if you find any problem in the submitted application.'
                            ];
                            Mail::to($consultantUser->email)->send(new NewFormSubmitted($consultantdata));
                        }
                    }
                    
                    return redirect()->back()->with('success', 'Application Submitted !');
                }
            
        } else {
            $existingForm =  DB::table('employerform')->where('user_id', Auth::user()->id)->first();

            $fieldsets = $this->getFieldsetsData($existingForm->id, $request);
            DB::table('employerform_sbs')->where('employerform_id', $existingForm->id)->update(
                $fieldsets['sbsData']
            );

            DB::table('employerform_labour')->where('employerform_id', $existingForm->id)->update(
                $fieldsets['labourData']
            );

            DB::table('employerform_job')->where('employerform_id', $existingForm->id)->update(
                $fieldsets['jobData']
            );

            DB::table('employerform_nomination')->where('employerform_id', $existingForm->id)->update(
                $fieldsets['nominationData']
            );

            $this->saveDocuments($existingForm->id, $request);
                //send email after everytime client saves the form
                $saveEmail = [
                    'admin' => false,
                    'consultant' => false,
                    'surname' => Auth::user()->surname,
                    'username' => Auth::user()->username,
                    'email' => Auth::user()->email,
                    'messagetype' => ' 
                    Your application has been saved.You can login again and resume your application when needed.
                    Please note that until your form is not submitted for the first time, the application will not show as submitted. 
                    To submit your form you must get to the last page of the form and click on submit.'
                ];
                Mail::to(Auth::user()->email)->send(new NewFormSubmitted($saveEmail));
            //check if is_email_sent is false
            
            if ($request->has('formsubmit') && !empty($existingForm) && $existingForm->is_email_sent == false) {
                //dd($request);
                DB::table('employerform')->where('user_id', Auth::user()->id)->update(['is_email_sent' => true]);
                $admindata = [
                    'admin' => true,
                    'consultant' => false,
                    'surname' => Auth::user()->surname,
                    'username' => Auth::user()->username,
                    'email' => Auth::user()->email,
                    'messagetype' => 'A new application has been recieved!'
                ];
                Mail::to('riccardo@australialegal.it')->send(new NewFormSubmitted($admindata));

                $userdata = [
                    'admin' => false,
                    'consultant' => false,
                    'surname' => Auth::user()->surname,
                    'username' => Auth::user()->username,
                    'email' => Auth::user()->email,
                    'messagetype' => ' 
                        Your application has been correctly submitted and received on the Auslegal Info/Docs system.
                        What will happen next
                        Australia Legal Admin Team will review the form and then assign it to an internal consultant.
                        Once the consultant is assigned, he/she will check the information and documents you have provided and will either:
                        ⦁	Inform you that the application will be lodged as no other information is needed
                        Or 
                        2) 
                        You will receive an email from the consultant with a request of more information and/or specific comments about the information and documents you will have provided on the online form.
                        '
                ];
                Mail::to(Auth::user()->email)->send(new NewFormSubmitted($userdata));
                
                 // if this user has any consultant then email also be sent to consultant
                 $consultants = ConsultantUser::where(['client_id'  => Auth::user()->id])->pluck('consultant_id');
                 if(count($consultants) > 0){
                     foreach($consultants as $consultant){
                         $consultantUser = DB::table('users')->where('id',$consultant)->first();
                         $consultantdata = [
                             'admin' => false,
                             'consultant' => true,
                             'surname' => $consultantUser->surname,
                             'username' => $consultantUser->username,
                             'email' => $consultantUser->email,
                             'messagetype' => 'A new application is submitted by your assigned user please check and make correction if you find any problem in the submitted application.'
                         ];
                         Mail::to($consultantUser->email)->send(new NewFormSubmitted($consultantdata));
                     }
                 }
             
                 return redirect()->back()->with('success', 'Application Submitted !');
            }
        }

       
        return redirect()->back()->with('success', 'Application Saved !');
    }

    private function saveDocuments($form_id, $request)
    {
        $documents = [

            //sbs

            'sbs_upload_previous_sponsorship' => $request->file('sbs_upload_previous_sponsorship'),
            'sbs_upload_asic_historical' => $request->file('sbs_upload_asic_historical'),
            'sbs_upload_trust' => $request->file('sbs_upload_trust'),
            'sbs_upload_lease' => $request->file('sbs_upload_lease'),
            'sbs_upload_bank_statement' => $request->file('sbs_upload_bank_statement'),
            'sbs_upload_bas' => $request->file('sbs_upload_bas'),
            'sbs_upload_profit_loss' => $request->file('sbs_upload_profit_loss'),
            'sbs_upload_recent_payroll' => $request->file('sbs_upload_recent_payroll'),
            'sbs_upload_chart' => $request->file('sbs_upload_chart'),
            'sbs_upload_bill1' => $request->file('sbs_upload_bill1'),
            'sbs_upload_bill2' => $request->file('sbs_upload_bill2'),
            'sbs_upload_invoice1' => $request->file('sbs_upload_invoice1'),
            'sbs_upload_invoice2' => $request->file('sbs_upload_invoice2'),

            //nomination

            'nomination_job_description' => $request->file('nomination_job_description'),
            'nomination_period_of_job' => $request->file('nomination_period_of_job'),
            'nomination_name_and_surname' => $request->file('nomination_name_and_surname'),
            'nomination_start_date_doc' => $request->file('nomination_start_date_doc'),
            'nomination_gross_annual_salary' => $request->file('nomination_gross_annual_salary'),
            'nomination_super_annuation' => $request->file('nomination_super_annuation'),
            'nomination_separate_figure' => $request->file('nomination_separate_figure'),

            //LABOUR 

            'labour_market_different' => $request->file('labour_market_different'),
            'workforce_1_copyandpaste' => $request->file('workforce_1_copyandpaste'),
            'workforce_1_invoice' => $request->file('workforce_1_invoice'),
            'workforce_1_screenshot' => $request->file('workforce_1_screenshot'),
            'workforce_1_evidence' => $request->file('workforce_1_evidence'),
            'workforce_2_copyandpaste' => $request->file('workforce_2_copyandpaste'),
            'workforce_2_invoice' => $request->file('workforce_2_invoice'),
            'workforce_2_screenshot' => $request->file('workforce_2_screenshot'),
            'workforce_2_evidence' => $request->file('workforce_2_evidence'),
            'workforce_3_copyandpaste' => $request->file('workforce_3_copyandpaste'),
            'workforce_3_invoice' => $request->file('workforce_3_invoice'),
            'workforce_3_screenshot' => $request->file('workforce_3_screenshot'),
            'workforce_3_evidence' => $request->file('workforce_3_evidence'),

        ];

        foreach ($documents as $key =>  $doc) {

            if ($key) {
                $uploadedFile = $doc;
                $filetype = '';
                $filename = '';
                if (!empty($doc)) {
                    $fileMimeType = $doc->getMimeType();

                    if ($fileMimeType == 'image/png' || $fileMimeType == 'image/jpg' || $fileMimeType == 'image/jpeg' || $fileMimeType == 'image/eps' || $fileMimeType == 'image/gif') {

                        $filetype = 'png';
                    }
                    if ($fileMimeType == 'application/pdf') {

                        $filetype = 'pdf';
                    }
                }


                if (!empty($uploadedFile)) {
                    $filename = time() . $uploadedFile->getClientOriginalName();
                    Storage::disk('local')->put('/public/employerform/' . Auth::user()->id . '/' . $key . '/' . $filename, File::get($uploadedFile));

                    $docData = [
                        'user_id' => Auth::user()->id,
                        'employerform_id' => $form_id,
                        'doc_name' => $filename,
                        'doc_field' => $key,
                        'file_type' => $filetype,
                    ];
                    $documetExist = DB::table('employerform_documents')
                        ->where([
                            'user_id' => Auth::user()->id,
                            'employerform_id' => $form_id,
                            'doc_field' => $key,
                        ])
                        ->exists();
                    if ($documetExist == true) {
                        $documetExist = DB::table('employerform_documents')
                            ->where([
                                'user_id' => Auth::user()->id,
                                'employerform_id' => $form_id,
                                'doc_field' => $key,
                            ])
                            ->update($docData);
                    } else {
                        $documetUploaded = DB::table('employerform_documents')->insert($docData);
                    }
                }
            }
        }
    }

    private function getFieldsetsData($form_id, $request)
    {
        //dd($request);
        $sbsData =  [
            'employerform_id' => $form_id,
            'sbs_business_required_aus' => $request->sbs_business_required_aus,
            'sbs_business_country' => $request->sbs_business_country,
            'sbs_business_legal_registered' => $request->sbs_business_legal_registered,
            'sbs_business_trading' => $request->sbs_business_trading,
            'sbs_business_abn' => $request->sbs_business_abn,
            'sbs_business_acn' => $request->sbs_business_acn,
            'sbs_business_type' => $request->sbs_business_type,
            'sbs_business_subsidiary' => $request->sbs_business_subsidiary,
            'sbs_business_branch' => $request->sbs_business_branch,
            'sbs_business_franchise' => $request->sbs_business_franchise,
            'sbs_business_trustee' => $request->sbs_business_trustee,
            'sbs_business_trustee_specify' => $request->sbs_business_trustee_specify,
            'sbs_business_trustee_name' => $request->sbs_business_trustee_name,
            'sbs_business_trustee_abn' => $request->sbs_business_trustee_abn,
            'sbs_business_sponsor_migration' => $request->sbs_business_sponsor_migration,
            'sbs_business_ato' => $request->sbs_business_ato,
            'sbs_business_stock_exchange' => $request->sbs_business_stock_exchange,
            'sbs_trading_established' => $request->sbs_trading_established,
            'sbs_trading_business' => $request->sbs_trading_business,
            'sbs_trading_structure' => $request->sbs_trading_structure,
            'sbs_trading_address' => $request->sbs_trading_address,
            'sbs_trading_sector' => $request->sbs_trading_sector,
            'sbs_trading_activity' => $request->sbs_trading_activity,
            'sbs_trading_willing' => $request->sbs_trading_willing,
            'sbs_trading_outlining' => $request->sbs_trading_outlining,
            'sbs_trading_webpage' => $request->sbs_trading_webpage,
            'annual_turnover_year' => $request->annual_turnover_year,
            'annual_turnover_payroll_figure' => $request->annual_turnover_payroll_figure,
            'annual_turnover_operating' => $request->annual_turnover_operating,

        ];

        $labourData =  [
            'employerform_id' => $form_id,
            'labour_job_n1_people' => $request->labour_job_n1_people,
            'labour_job_n1_exact_date' => $request->labour_job_n1_exact_date,
            'labour_job_n1_online' => $request->labour_job_n1_online,
            'labour_job_n1_indicate' => $request->labour_job_n1_indicate,
            'labour_job_n1_payment' => $request->labour_job_n1_payment,
            'labour_job_n1_after_people' => $request->labour_job_n1_after_people,
            'labour_job_n1_after_people_shortlisted' => $request->labour_job_n1_after_people_shortlisted,
            'labour_job_n1_after_people_suitable' => $request->labour_job_n1_after_people_suitable,
            'labour_job_n2_people' => $request->labour_job_n2_people,
            'labour_job_n2_exact_date' => $request->labour_job_n2_exact_date,
            'labour_job_n2_online' => $request->labour_job_n2_online,
            'labour_job_n2_indicate' => $request->labour_job_n2_indicate,
            'labour_job_n2_payment' => $request->labour_job_n2_payment

        ];

        $jobData =  [
            'employerform_id' => $form_id,
            'job_n2_people' => $request->job_n2_people,
            'job_n2_people_shortlisted' => $request->job_n2_people_shortlisted,
            'job_n2_people_suitable' => $request->job_n2_people_suitable,
            'job_n3_people' => $request->job_n3_people,
            'job_n3_exact_date' => $request->job_n3_exact_date,
            'job_n3_online' => $request->job_n3_online,
            'job_n3_indicate' => $request->job_n3_indicate,
            'job_n3_payment' => $request->job_n3_payment,
            'job_n3_after_people' => $request->job_n3_after_people,
            'job_n3_after_people_shortlisted' => $request->job_n3_after_people_shortlisted,
            'job_n3_after_people_suitable' => $request->job_n3_after_people_suitable

        ];

        $nominationData =  [
            'employerform_id' => $form_id,
            'nomination_visa_appliciant' => $request->nomination_visa_appliciant,
            'nomination_intra_company_transfer' => $request->nomination_intra_company_transfer,
            'nomination_financial_year' => $request->nomination_financial_year,
            'nomination_job_offering' => $request->nomination_job_offering,
            'nomination_job_occupation' => $request->nomination_job_occupation,
            'nomination_responsibilities' => $request->nomination_responsibilities,
            'nomination_performed' => $request->nomination_performed,
            'nomination_position' => $request->nomination_position,
            'qua_and_exp_relevant' => $request->qua_and_exp_relevant,
            'qua_and_exp_skills' => $request->qua_and_exp_skills,
            'qua_and_exp_license' => $request->qua_and_exp_license,
            'qua_and_exp_four_month' => $request->qua_and_exp_four_month,
            'qua_and_exp_agriculture' => $request->qua_and_exp_agriculture,
            'salary_offering_visa_applicant' => $request->salary_offering_visa_applicant,
            'salary_non_monetary' => $request->salary_non_monetary,
            'salary_offering_visa_applicant_specify' => $request->salary_offering_visa_applicant_specify,
            'salary_year_of_contract' => $request->salary_year_of_contract,
            'salary_annual' => $request->salary_annual,
            'salary_hours_per_week' => $request->salary_hours_per_week,
            'salary_eloborate_annual_salary' => $request->salary_eloborate_annual_salary,
            'salary_permanent_resident' => $request->salary_permanent_resident,
            'salary_permanent_resident_indicate' => $request->salary_permanent_resident_indicate,
            'salary_citizen' => $request->salary_citizen,

        ];

        $fieldsetsData = [
            'sbsData' => $sbsData,
            'labourData' => $labourData,
            'jobData' => $jobData,
            'nominationData' => $nominationData
        ];
        return $fieldsetsData;
    }
}
