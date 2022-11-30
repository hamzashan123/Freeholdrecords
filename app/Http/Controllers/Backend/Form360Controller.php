<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CorrectionMail;
use App\Mail\NewFormSubmitted;
use App\Mail\CorrectionEmailAdmin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\ConsultantUser;

class Form360Controller extends Controller
{
    public function index(Request $request){

        if(!empty($_GET['userid']) && !empty($_GET['form_id'])){
            $userid = $_GET['userid'];
        }else{
            $userid = Auth::user()->id;
        }
        
        

            $data  =  DB::table('form360')
                        ->join('form360_matrix', 'form360.id', '=', 'form360_matrix.form360_id')
                        ->join('form360_personal', 'form360.id', '=', 'form360_personal.form360_id')
                        ->join('form360_first_education', 'form360.id', '=', 'form360_first_education.form360_id')
                        ->join('form360_high_education', 'form360.id', '=', 'form360_high_education.form360_id')
                        ->join('form360_apprenticeship', 'form360.id', '=', 'form360_apprenticeship.form360_id')
                        ->join('form360_work_experience', 'form360.id', '=', 'form360_work_experience.form360_id') 
                        ->join('form360_work_experience_intra_companies', 'form360.id', '=', 'form360_work_experience_intra_companies.form360_id')     
                        ->join('form360_visa_history', 'form360.id', '=', 'form360_visa_history.form360_id')
                        ->join('form360_travel_history', 'form360.id', '=', 'form360_travel_history.form360_id')
                        ->join('form360_countries_of_residence', 'form360.id', '=', 'form360_countries_of_residence.form360_id')
                        ->join('form360_health_declaration', 'form360.id', '=', 'form360_health_declaration.form360_id')
                        ->join('form360_health_questions', 'form360.id', '=', 'form360_health_questions.form360_id')
                        ->join('form360_character', 'form360.id', '=', 'form360_character.form360_id')
                        ->join('form360_family_members', 'form360.id', '=', 'form360_family_members.form360_id')
                        
                        ->where('form360.user_id',$userid)->select(
                            'form360.*',
                            'form360_matrix.*',
                            'form360_personal.*',
                            'form360_first_education.*',
                            'form360_high_education.*',
                            'form360_apprenticeship.*',
                            'form360_work_experience.*',
                            'form360_work_experience_intra_companies.*',
                            'form360_visa_history.*',
                            'form360_travel_history.*',
                            'form360_countries_of_residence.*',
                            'form360_health_declaration.*',
                            'form360_health_questions.*',
                            'form360_character.*',
                            'form360_family_members.*'
                            )->get();
         
        
        if(!empty($data[0])){
            $data = $data[0];
        }   
        if(!empty($data->user_id)){
           $data->documents  =  DB::table('form360_documents')->where(['user_id' => $data->user_id ])->get();
        }    
        
        $docdataForm360 = [];
      
        if(!empty($data->documents)){
            foreach ($data->documents as $key =>  $doc) {
                $docdataForm360[$doc->doc_field] = $doc->doc_name;
             
            }
        }
  
        
        // dd($data);
        return view('backend.forms.form360.index',compact('data','docdataForm360'));
               
        
        
    }

    public function save(Request $request){
        
        $formExist = DB::table('form360')->where('user_id', Auth::user()->id)->first();
        
        if(empty($formExist->id)){
        
            $formid = DB::table('form360')->insertGetId([
                'user_id' => auth()->user()->id,
                'created_at' => date('m/d/Y h:i:s a'),
                'updated_at' => date('m/d/Y h:i:s a')
            ]);
            
            $fieldsets = $this->getFieldsetsData($formid,$request);
    
            DB::table('form360_matrix')->insert([
                $fieldsets['matrixdata']
            ]);
    
            DB::table('form360_personal')->insert([
                $fieldsets['personaldata']
            ]);
    
            DB::table('form360_first_education')->insert([
                $fieldsets['firsteducationdata']
            ]);
    
            DB::table('form360_high_education')->insert([
                $fieldsets['higheducationdata']
            ]);
    
            DB::table('form360_apprenticeship')->insert([
                $fieldsets['apprenticeship']
            ]);
    
            DB::table('form360_work_experience')->insert([
                $fieldsets['workExperienceData']
            ]);
    
            DB::table('form360_work_experience_intra_companies')->insert([
                $fieldsets['workExperienceIntraData']
            ]);
    
            DB::table('form360_visa_history')->insert([
                $fieldsets['visahistoryData']
            ]);
    
            DB::table('form360_travel_history')->insert([
                $fieldsets['travelhistoryData']
            ]);
    
            
            DB::table('form360_countries_of_residence')->insert([
                $fieldsets['countryofresidenceData']
            ]);
    
            DB::table('form360_health_declaration')->insert([
                $fieldsets['healthdeclaration']
            ]);
    
            DB::table('form360_health_questions')->insert([
                $fieldsets['healthQuestion']
            ]);
    
            DB::table('form360_character')->insert([
                $fieldsets['character']
            ]);
    
            DB::table('form360_family_members')->insert([
                $fieldsets['familymember']
            ]);

            $this->saveDocuments($formid,$request);
            
                
           
                $formdata = DB::table('form360')->where('user_id', Auth::user()->id)->first();
                
                $data = [
                    'username' => Auth::user()->username,
                    'email' => Auth::user()->email,
                    'messagetype' => 'A new application has been recieved!'
                ];
                
                if($request->has('formsubmit') && $formdata->is_email_sent == false){
                    DB::table('form360')->where('user_id', Auth::user()->id)->update(['is_email_sent' => true]);

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
           
                
        }else{
           $existingForm =  DB::table('form360')->where('user_id', Auth::user()->id)->first();

            $fieldsets = $this->getFieldsetsData($existingForm->id,$request);
           
            DB::table('form360_matrix')->where('form360_id',$existingForm->id)->update(
                $fieldsets['matrixdata']
            );

            DB::table('form360_personal')->where('form360_id',$existingForm->id)->update(
                $fieldsets['personaldata']
            );

            DB::table('form360_first_education')->where('form360_id',$existingForm->id)->update(
                $fieldsets['firsteducationdata']
            );

            DB::table('form360_high_education')->where('form360_id',$existingForm->id)->update(
                $fieldsets['higheducationdata']
            );

            DB::table('form360_apprenticeship')->where('form360_id',$existingForm->id)->update(
                $fieldsets['apprenticeship']
            );

            DB::table('form360_work_experience')->where('form360_id',$existingForm->id)->update(
                $fieldsets['workExperienceData']
            );

            DB::table('form360_work_experience_intra_companies')->where('form360_id',$existingForm->id)->update(
                $fieldsets['workExperienceIntraData']
            );

            DB::table('form360_visa_history')->where('form360_id',$existingForm->id)->update(
                $fieldsets['visahistoryData']
            );

            DB::table('form360_travel_history')->where('form360_id',$existingForm->id)->update(
                $fieldsets['travelhistoryData']
            );

            
            DB::table('form360_countries_of_residence')->where('form360_id',$existingForm->id)->update(
                $fieldsets['countryofresidenceData']
            );

            DB::table('form360_health_declaration')->where('form360_id',$existingForm->id)->update(
                $fieldsets['healthdeclaration']
            );

            DB::table('form360_health_questions')->where('form360_id',$existingForm->id)->update(
                $fieldsets['healthQuestion']
            );

            DB::table('form360_character')->where('form360_id',$existingForm->id)->update(
                $fieldsets['character']
            );

            DB::table('form360_family_members')->where('form360_id',$existingForm->id)->update(
                $fieldsets['familymember']
            );

            $this->saveDocuments($existingForm->id,$request);
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
              if($request->has('formsubmit') && !empty($existingForm) && $existingForm->is_email_sent == false){
                DB::table('form360')->where('user_id', Auth::user()->id)->update(['is_email_sent' => true]);
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
        
        return redirect()->back()->with('success','Application Saved !');
        
        
    }


    private function saveDocuments($form_id,$request){
        $documents = [
            //personal docs
         'personal_passport_biodata_page' => $request->file('personal_passport_biodata_page'),
         'personal_id_card_driving_license' => $request->file('personal_id_card_driving_license'),
         'personal_update_resume' => $request->file('personal_update_resume'),

         'personal_skills_assessment_outcome_letter' => $request->file('personal_skills_assessment_outcome_letter'),
         'personal_languages_english_test_document' => $request->file('personal_languages_english_test_document'),
         'personal_license_and_registration_document' => $request->file('personal_license_and_registration_document'),

         'higher_level_qualification1_diploma_award' => $request->file('higher_level_qualification1_diploma_award'),
         'higher_level_qualification1_listofexams' => $request->file('higher_level_qualification1_listofexams'),
         'higher_level_qualification1_diploma_supplement' => $request->file('higher_level_qualification1_diploma_supplement'),

         'higher_level_qualification2_diploma_award' => $request->file('higher_level_qualification2_diploma_award'),
         'higher_level_qualification2_listofexams' => $request->file('higher_level_qualification2_listofexams'),
         'higher_level_qualification2_diploma_supplement' => $request->file('higher_level_qualification2_diploma_supplement'),


         'higher_level_qualification3_diploma_award' => $request->file('higher_level_qualification3_diploma_award'),
         'higher_level_qualification3_listofexams' => $request->file('higher_level_qualification3_listofexams'),
         'higher_level_qualification3_diploma_supplement' => $request->file('higher_level_qualification3_diploma_supplement'),



         
         'apprenticeship_contract_doc' => $request->file('apprenticeship_contract_doc'),
         'apprenticeship_completion_letter' => $request->file('apprenticeship_completion_letter'),
         'apprenticeship_payslip_current_year' => $request->file('apprenticeship_payslip_current_year'),
         'apprenticeship_previous_year' => $request->file('apprenticeship_previous_year'),
         'apprenticeship_tax_return' => $request->file('apprenticeship_tax_return'),
         'apprenticeship_social_security' => $request->file('apprenticeship_social_security'),

         'workexp1_employment_contract' => $request->file('workexp1_employment_contract'),
         'workexp1_current_year_of_experience' => $request->file('workexp1_current_year_of_experience'),
         'workexp1_previous_year_of_experience1' => $request->file('workexp1_previous_year_of_experience1'),
         'workexp1_previous_year_of_experience2' => $request->file('workexp1_previous_year_of_experience2'),
         'workexp1_previous_year_of_experience3' => $request->file('workexp1_previous_year_of_experience3'),

         'workexp1_income_tax_return1' => $request->file('workexp1_income_tax_return1'),
         'workexp1_income_tax_return2' => $request->file('workexp1_income_tax_return2'),
         'workexp1_income_tax_return2_1' => $request->file('workexp1_income_tax_return2_1'),
         'workexp1_relevant_doc' => $request->file('workexp1_relevant_doc'),
         'workexp1_tabella_estratto' => $request->file('workexp1_tabella_estratto'),

         'workexpintracompany_employment_contract' => $request->file('workexpintracompany_employment_contract'),
         'workexpintracompany_current_recent_payslip' => $request->file('workexpintracompany_current_recent_payslip'),
         'workexpintracompany_income_tax_return' => $request->file('workexpintracompany_income_tax_return'),
         'workexpintracompany_social_security' => $request->file('workexpintracompany_social_security'),
         'workexpintracompany_perform_in_aus_nz' => $request->file('workexp1_tabella_estratto'),

         'currentvisa_aus_naz_if_applicable' => $request->file('currentvisa_aus_naz_if_applicable'),
         'previous_visa_if_applicable1' => $request->file('previous_visa_if_applicable1'),
         'previous_visa_if_applicable2' => $request->file('previous_visa_if_applicable2'),

  
        
            //education docs
        //  'edu_info_university_diploma' => $request->file('edu_info_university_diploma'),
        //     //work docs
        //  'work_agreement' => $request->file('work_agreement'),
        ];

        foreach($documents as $key =>  $doc){
                   
            if($key){
                $uploadedFile = $doc;
                $filetype = '';
                $filename = ''; 
                if(!empty($doc)){
                    $fileMimeType = $doc->getMimeType();
                     
                    if($fileMimeType == 'image/png' || $fileMimeType == 'image/jpg' || $fileMimeType == 'image/jpeg' || $fileMimeType == 'image/eps' || $fileMimeType == 'image/gif'){
              
                        $filetype = 'png';
                    }
                    if($fileMimeType == 'application/pdf' ){
                        
                        $filetype = 'pdf';
                    }
                }
                 
                 
                if(!empty($uploadedFile)){
                    $filename = time().$uploadedFile->getClientOriginalName();
                    Storage::disk('local')->put('/public/form360/'.Auth::user()->id.'/'.$key.'/' . $filename, File::get($uploadedFile));
                    
                    $docData = [
                        'user_id' => Auth::user()->id,
                        'form360_id' => $form_id,
                        'doc_name' => $filename,
                        'doc_field' => $key,
                        'file_type' => $filetype,
                  ];
                  $documetExist = DB::table('form360_documents')
                  ->where([
                      'user_id' => Auth::user()->id,
                      'form360_id' => $form_id,
                      'doc_field' => $key,
                  ])
                  ->exists();
                  if($documetExist == true){
                      $documetExist = DB::table('form360_documents')
                      ->where([
                          'user_id' => Auth::user()->id,
                          'form360_id' => $form_id,
                          'doc_field' => $key,
                      ])
                      ->update($docData);
                  }else{
                      $documetUploaded = DB::table('form360_documents')->insert($docData);
                  }
                }  
                 

                  
                    
              
            }
             
          
          
      }
       // dd($request);
    }

    private function getFieldsetsData($form_id,$request){
        
        $matrixData =  [
            'form360_id' => $form_id,
            'matrix_name_and_surname' => $request->matrix_name_and_surname,
            'matrix_age' => $request->matrix_age,
            'matrix_aus_or_nz' => $request->matrix_aus_or_nz,
            'matrix_located' => $request->matrix_located,
            'matrix_visahold' => $request->matrix_visahold,
            'matrix_visaexpire' => $request->matrix_visaexpire,
            'matrix_occupation' => $request->matrix_occupation,
            'matrix_levelofenglish' => $request->matrix_levelofenglish,
            'matrix_yearofexperienceinausornz' => $request->matrix_yearofexperienceinausornz,
            'matrix_yearofexperienceoutsideausornz' => $request->matrix_yearofexperienceoutsideausornz,
            'matrix_highesteducationqualification' => $request->matrix_highesteducationqualification,
            'matrix_areyoucomingtoausornz' => $request->matrix_areyoucomingtoausornz,
            'matrix_enrolling' => $request->matrix_enrolling,
            'matrix_skillassessment' => $request->matrix_skillassessment,
            'matrix_indicateoccupation' => $request->matrix_indicateoccupation,
            'matrix_englishtest' => $request->matrix_englishtest,
            'matrix_indicatetesttaken' => $request->matrix_indicatetesttaken,
            'matrix_indicateincluded' => $request->matrix_indicateincluded,
            'matrix_familymember' => $request->matrix_familymember,
            'matrix_familymember' => $request->matrix_familymember,
            'matrix_familymember' => $request->matrix_familymember,
        ];

        $personalData = [
            'form360_id' => $form_id,
            'personal_name' => $request->personal_name,
            'personal_surname' => $request->personal_surname,
            'personal_name_surname' => $request->personal_name_surname,
            'personal_civil_status' => $request->personal_civil_status,
            'personal_dob' => $request->personal_dob,
            'personal_pob' => $request->personal_pob,
            'personal_gender' => $request->personal_gender,
            'personal_nationality' => $request->personal_nationality,
            'personal_other_nationality' => $request->personal_other_nationality,
            'personal_countryofresidence' => $request->personal_countryofresidence,
            'personal_addressusualcountry' => $request->personal_addressusualcountry,
            'personal_addressinausornz' => $request->personal_addressinausornz,
            'personal_contactnumberusuallycountry' => $request->personal_contactnumberusuallycountry,
            'personal_whatsappcontact' => $request->personal_whatsappcontact,
            'personal_contactnumberausornz' => $request->personal_contactnumberausornz,
            'personal_emailaddress' => $request->personal_emailaddress,
            'personal_aus_or_nz' => $request->personal_aus_or_nz,
            'personal_visahold' => $request->personal_visahold,
            'personal_visaexpire' => $request->personal_visaexpire,
            'personal_health_examination' => $request->personal_health_examination,
            'personal_health_examination_specifytaken' => $request->personal_health_examination_specifytaken,
            'personal_health_care' => $request->personal_health_care,
            'personal_health_care_specifytaken' => $request->personal_health_care_specifytaken,
            'personal_conviction' => $request->personal_conviction,
            'personal_conviction_specifytaken' => $request->personal_conviction_specifytaken,
            'personal_legal_action' => $request->personal_legal_action,
            'personal_legal_action_specifytaken' => $request->personal_legal_action_specifytaken,
            'personal_skills_assessment' => $request->personal_skills_assessment,
            'personal_skills_assessment_specifytaken' => $request->personal_skills_assessment_specifytaken,
            'personal_skills_assessment_application' => $request->personal_skills_assessment_application,
            'personal_skills_assessment_application_specifytaken' => $request->personal_skills_assessment_application_specifytaken,
            'personal_main_languages' => $request->personal_main_languages,
            'personal_languages_english_test' => $request->personal_languages_english_test,
            'personal_englishtest_specify' => $request->personal_englishtest_specify,
            'personal_englishtest_taken' => $request->personal_englishtest_taken,
            'personal_tertiary_institution' => $request->personal_tertiary_institution,
            'personal_course_duration' => $request->personal_course_duration,
            'personal_license_and_registration' => $request->personal_license_and_registration,
        ];

        $firstEducationData = [
            'form360_id' => $form_id,
            'first_education_qualification_obtained' => $request->first_education_qualification_obtained,
            'firstedu_background_nameofschool' => $request->firstedu_background_nameofschool,
            'firstedu_background_fulladdress' => $request->firstedu_background_fulladdress,
            'firstedu_background_datecoursesstarted' => $request->firstedu_background_datecoursesstarted,
            'firstedu_background_datecoursesended' => $request->firstedu_background_datecoursesended,
            'firstedu_background_yearobt' => $request->firstedu_background_yearobt,
            'firstedu_background_legal_duration' => $request->firstedu_background_legal_duration,
            'firstedu_background_qualification_obtained' => $request->firstedu_background_qualification_obtained,
            'firstedu_middle_nameofschool' => $request->firstedu_middle_nameofschool,
            'firstedu_middle_fulladdress' => $request->firstedu_middle_fulladdress,
            'firstedu_middle_datecoursesstarted' => $request->firstedu_middle_datecoursesstarted,
            'firstedu_middle_datecoursesended' => $request->firstedu_middle_datecoursesended,
            'firstedu_middle_yearobt' => $request->firstedu_middle_yearobt,
            'firstedu_middle_legal_duration' => $request->firstedu_middle_legal_duration,
            'firstedu_middle_qualification_obtained' => $request->firstedu_middle_qualification_obtained,
            'firstedu_high_nameofschool' => $request->firstedu_high_nameofschool,
            'firstedu_high_fulladdress' => $request->firstedu_high_fulladdress,
            'firstedu_high_datecoursesstarted' => $request->firstedu_high_datecoursesstarted,
            'firstedu_high_datecoursesended' => $request->firstedu_high_datecoursesended,
            'firstedu_high_yearobt' => $request->firstedu_high_yearobt,
            'firstedu_high_legal_duration' => $request->firstedu_high_legal_duration,
            'firstedu_high_qualification_obtained' => $request->firstedu_high_qualification_obtained,
        ];

        $highEducationData = [
            'form360_id' => $form_id,
            'higher_level_qualification1_nameofuniversity' => $request->higher_level_qualification1_nameofuniversity,
            'higher_level_vocational_level_qualification1' => $request->higher_level_vocational_level_qualification1,
            'higher_level__qualification1_education_provider' => $request->higher_level__qualification1_education_provider,
            'higher_level_qualifciation1_official_languages' => $request->higher_level_qualifciation1_official_languages,
            'higher_level_qualification1_english' => $request->higher_level_qualification1_english,
            'higher_level_qualification1_course_duration' => $request->higher_level_qualification1_course_duration,
            'higher_level_qualification1_course_started' => $request->higher_level_qualification1_course_started,
            'higher_level_qualification1_course_ended' => $request->higher_level_qualification1_course_ended,
            'higher_level_qualification1_full_part' => $request->higher_level_qualification1_full_part,
            'higher_level_qualification1_courseofstudy' => $request->higher_level_qualification1_courseofstudy,
            'higher_level_qualification1_country' => $request->higher_level_qualification1_country,
            'higher_level_qualification1_thesis_project' => $request->higher_level_qualification1_thesis_project,
            'higher_level_qualification1_thesis_project_if' => $request->higher_level_qualification1_thesis_project_if,
            
            'higher_level_qualification2_nameofuniversity' => $request->higher_level_qualification2_nameofuniversity,
            'higher_level_vocational_level_qualification2' => $request->higher_level_vocational_level_qualification2,
            'higher_level__qualification2_education_provider' => $request->higher_level__qualification2_education_provider,
            'higher_level_qualifciation2_official_languages' => $request->higher_level_qualifciation2_official_languages,
            'higher_level_qualification2_english' => $request->higher_level_qualification2_english,
            'higher_level_qualification2_course_duration' => $request->higher_level_qualification2_course_duration,
            'higher_level_qualification2_course_started' => $request->higher_level_qualification2_course_started,
            'higher_level_qualification2_course_ended' => $request->higher_level_qualification2_course_ended,
            'higher_level_qualification2_full_part' => $request->higher_level_qualification2_full_part,
            'higher_level_qualification2_courseofstudy' => $request->higher_level_qualification2_courseofstudy,
            'higher_level_qualification2_country' => $request->higher_level_qualification2_country,
            'higher_level_qualification2_thesis_project' => $request->higher_level_qualification2_thesis_project,
            'higher_level_qualification2_thesis_project_if' => $request->higher_level_qualification2_thesis_project_if,

            'higher_level_qualification3_nameofuniversity' => $request->higher_level_qualification3_nameofuniversity,
            'higher_level_vocational_level_qualification3' => $request->higher_level_vocational_level_qualification3,
            'higher_level__qualification3_education_provider' => $request->higher_level__qualification3_education_provider,
            'higher_level_qualifciation3_official_languages' => $request->higher_level_qualifciation3_official_languages,
            'higher_level_qualification3_english' => $request->higher_level_qualification3_english,
            'higher_level_qualification3_course_duration' => $request->higher_level_qualification3_course_duration,
            'higher_level_qualification3_course_started' => $request->higher_level_qualification3_course_started,
            'higher_level_qualification3_course_ended' => $request->higher_level_qualification3_course_ended,
            'higher_level_qualification3_full_part' => $request->higher_level_qualification3_full_part,
            'higher_level_qualification3_courseofstudy' => $request->higher_level_qualification3_courseofstudy,
            'higher_level_qualification3_country' => $request->higher_level_qualification3_country,
            'higher_level_qualification3_thesis_project' => $request->higher_level_qualification3_thesis_project,
            'higher_level_qualification3_thesis_project_if' => $request->higher_level_qualification3_thesis_project_if,
            
        ];

        $apprenticeshipData = [
            'form360_id' => $form_id,
            'apprenticeship_formal_studies' => $request->apprenticeship_formal_studies,
            'apprenticeship_formal_studies_specify' => $request->apprenticeship_formal_studies_specify,
            'apprenticeship_total_duration' => $request->apprenticeship_total_duration,
            'apprenticeship_completed' => $request->apprenticeship_completed,
            'apprenticeship_conclusion' => $request->apprenticeship_conclusion,
            'apprenticeship_company' => $request->apprenticeship_company,
            'apprenticeship_company_address' => $request->apprenticeship_company_address,
            'apprenticeship_visa_country' => $request->apprenticeship_visa_country,
            'apprenticeship_position' => $request->apprenticeship_position,
            'apprenticeship_start_date' => $request->apprenticeship_start_date,
            'apprenticeship_end_date' => $request->apprenticeship_end_date,
            'apprenticeship_fulltime_parttime' => $request->apprenticeship_fulltime_parttime,
            'apprenticeship_week_perhour' => $request->apprenticeship_week_perhour,
            'apprenticeship_duties_responsibities' => $request->apprenticeship_duties_responsibities,
            'apprenticeship_formal_qualification' => $request->apprenticeship_formal_qualification,
            'apprenticeship_payments' => $request->apprenticeship_payments,
            'apprenticeship_period' => $request->apprenticeship_period,
            'apprenticeship_issue_invoice' => $request->apprenticeship_issue_invoice,
            'apprenticeship_employment_collaboration' => $request->apprenticeship_employment_collaboration,
            'apprenticeship_payslips' => $request->apprenticeship_payslips,
            'apprenticeship_income' => $request->apprenticeship_income,
            'apprenticeship_bank_statement' => $request->apprenticeship_bank_statement,
            'apprenticeship_reference_letter' => $request->apprenticeship_reference_letter,
            'apprenticeship_name_surname' => $request->apprenticeship_name_surname,
            'apprenticeship_referee_contact' => $request->apprenticeship_referee_contact,
        ];

        $workExperienceData = [
            'form360_id' => $form_id,
            'workexp_current_employed' => $request->workexp_current_employed,
            'workexp_current_future_sponsor' => $request->workexp_current_future_sponsor,
            'workexp_current_recent_occupation' => $request->workexp_current_recent_occupation,
            'workexp_retired' => $request->workexp_retired,
            'workexp_if_retired' => $request->workexp_if_retired,
            'workexp_last_occupation' => $request->workexp_last_occupation,
            'workexp1_your_position' => $request->workexp1_your_position,
            'workexp1_your_position_type' => $request->workexp1_your_position_type,
            'workexp1_employer_name' => $request->workexp1_employer_name,
            'workexp1_business_country' => $request->workexp1_business_country,
            'workexp1_date_work_started' => $request->workexp1_date_work_started,
            'workexp1_date_work_ended' => $request->workexp1_date_work_ended,
            'workexp1_description_duties' => $request->workexp1_description_duties,
            'workexp1_nominated_position' => $request->workexp1_nominated_position,
            'workexp1_performed_in_aus_nz' => $request->workexp1_performed_in_aus_nz,
            'workexp1_visa_employer' => $request->workexp1_visa_employer,
            'workexp1_payslips_for_this_week' => $request->workexp1_payslips_for_this_week,
            'workexp1_contact_details_work_period' => $request->workexp1_contact_details_work_period,
            'workexp1_contact_details_work_period_indicate' => $request->workexp1_contact_details_work_period_indicate,
            'workexp1_contact_details_work_period_name' => $request->workexp1_contact_details_work_period_name,
            'workexp1_contact_details_work_period_position' => $request->workexp1_contact_details_work_period_position,
            'workexp1_contact_details_work_period_email' => $request->workexp1_contact_details_work_period_email,
            'workexp1_contact_details_work_period_phone' => $request->workexp1_contact_details_work_period_phone
        
        ];

        $workExperienceIntraData = [
            'form360_id' => $form_id,
            'workexpintracompany_current_employed' => $request->workexpintracompany_current_employed,
            'workexpintracompany_current_working' => $request->workexpintracompany_current_working,
            'workexpintracompany_current_recent_occupation' => $request->workexpintracompany_current_recent_occupation,
            'workexpintracompany_your_position' => $request->workexpintracompany_your_position,
            'workexpintracompany_your_position_type' => $request->workexpintracompany_your_position_type,
            'workexpintracompany_employer_name' => $request->workexpintracompany_employer_name,
            'workexpintracompany_business_country' => $request->workexpintracompany_business_country,
            'workexpintracompany_date_work_started' => $request->workexpintracompany_date_work_started,
            'workexpintracompany_date_work_ended' => $request->workexpintracompany_date_work_ended,
            'workexpintracompany_description_duties' => $request->workexpintracompany_description_duties,
            'workexpintracompany_nominated_position' => $request->workexpintracompany_nominated_position,
            'workexpintracompany_performed_in_aus_nz' => $request->workexpintracompany_performed_in_aus_nz,
            'workexpintracompany_visa_employer' => $request->workexpintracompany_visa_employer,
            'workexpintracompany_payslips_for_this_week' => $request->workexpintracompany_payslips_for_this_week,
            'workexpintracompany_contact_details_work_period' => $request->workexpintracompany_contact_details_work_period,
            'workexpintracompany_contact_details_work_period_indicate' => $request->workexpintracompany_contact_details_work_period_indicate,
            'workexpintracompany_contact_details_work_period_name' => $request->workexpintracompany_contact_details_work_period_name,
            'workexpintracompany_contact_details_work_period_position' => $request->workexpintracompany_contact_details_work_period_position,
            'workexpintracompany_contact_details_work_period_email' => $request->workexpintracompany_contact_details_work_period_email,
            //'workexpintracompany_contact_details_work_period_phone' => $request->workexpintracompany_contact_details_work_period_phone,
            'workexpintracompany_aus_nz_name_of_company' => $request->workexpintracompany_aus_nz_name_of_company,
            'workexpintracompany_aus_nz_reg_number' => $request->workexpintracompany_aus_nz_reg_number,
            'workexpintracompany_aus_nz_address' => $request->workexpintracompany_aus_nz_address,
            'workexpintracompany_aus_nz_contact' => $request->workexpintracompany_aus_nz_contact,
            'workexpintracompany_aus_nz_name_surname' => $request->workexpintracompany_aus_nz_name_surname,
            'workexpintracompany_aus_nz_role' => $request->workexpintracompany_aus_nz_role,
            'workexpintracompany_aus_nz_sector' => $request->workexpintracompany_aus_nz_sector,
            'workexpintracompany_aus_nz_position' => $request->workexpintracompany_aus_nz_position,
            'workexpintracompany_aus_nz_responsibilities' => $request->workexpintracompany_aus_nz_responsibilities,
            'workexpintracompany_aus_nz_description' => $request->workexpintracompany_aus_nz_description,
            'workexpintracompany_aus_nz_planing_date' => $request->workexpintracompany_aus_nz_planing_date,
            'workexpintracompany_aus_nz_planing_date_max_6_month' => $request->workexpintracompany_aus_nz_planing_date_max_6_month,
            'workexpintracompany_aus_nz_necessary' => $request->workexpintracompany_aus_nz_necessary,
            'workexpintracompany_aus_nz_paidby' => $request->workexpintracompany_aus_nz_paidby,

        ];

        $visahistoryData =  [
            'form360_id' => $form_id,
            'currentvisa_in_aus_nz' => $request->currentvisa_in_aus_nz,
            'currentvisa_hold_aus_nz' => $request->currentvisa_hold_aus_nz,
            'currentvisa_typeofvisa' => $request->currentvisa_typeofvisa,
            'currentvisa_waiting_for_visa' => $request->currentvisa_waiting_for_visa,
            'currentvisa_typeofvisawaiting' => $request->currentvisa_typeofvisawaiting,
            'currentvisa_dateofexpiry' => $request->currentvisa_dateofexpiry,
            'currentvisa_ever_had_visa' => $request->currentvisa_ever_had_visa,
            'currentvisa_held_visa' => $request->currentvisa_held_visa,
            'currentvisa_indicate_countries' => $request->currentvisa_indicate_countries,
            'currentvisa_complied_with_visa_conditions' => $request->currentvisa_complied_with_visa_conditions
        ];

        $travelhistoryData =  [
            'form360_id' => $form_id,
            'travelhistory_last_ten_years' => $request->travelhistory_last_ten_years,
            'travelhistory_country1' => $request->travelhistory_country1,
            'travelhistory_datefrom1' => $request->travelhistory_datefrom1,
            'travelhistory_dateto1' => $request->travelhistory_dateto1,
            'travelhistory_purpose1' => $request->travelhistory_purpose1,
            'travelhistory_country4' => $request->travelhistory_country4,
            'travelhistory_datefrom2' => $request->travelhistory_datefrom2,
            'travelhistory_dateto2' => $request->travelhistory_dateto2,
            'travelhistory_purpose2' => $request->travelhistory_purpose2,
            'travelhistory_country3' => $request->travelhistory_country3,
            'travelhistory_datefrom3' => $request->travelhistory_datefrom3,
            'travelhistory_dateto3' => $request->travelhistory_dateto3,
            'travelhistory_purpose3' => $request->travelhistory_purpose3,
            'travelhistory_datefrom4' => $request->travelhistory_datefrom4,
            'travelhistory_dateto4' => $request->travelhistory_dateto4,
            'travelhistory_purpose4' => $request->travelhistory_purpose4
        ];

        $countryofresidenceData = [
            'form360_id' => $form_id,
            'countryofresidence_country1' => $request->countryofresidence_country1,
            'countryofresidence_fromwhen1' => $request->countryofresidence_fromwhen1,
            'countryofresidence_towhen1' => $request->countryofresidence_towhen1,
            'countryofresidence_address1' => $request->countryofresidence_address1,
            'countryofresidence_city1' => $request->countryofresidence_city1,
            'countryofresidence_postal1' => $request->countryofresidence_postal1,
            'countryofresidence_country2' => $request->countryofresidence_country2,
            'countryofresidence_fromwhen2' => $request->countryofresidence_fromwhen2,
            'countryofresidence_towhen2' => $request->countryofresidence_towhen2,
            'countryofresidence_address2' => $request->countryofresidence_address2,
            'countryofresidence_city2' => $request->countryofresidence_city2,
            'countryofresidence_postal2' => $request->countryofresidence_postal2,
            'countryofresidence_country3' => $request->countryofresidence_country3,
            'countryofresidence_fromwhen3' => $request->countryofresidence_fromwhen3,
            'countryofresidence_towhen3' => $request->countryofresidence_towhen3,
            'countryofresidence_address3' => $request->countryofresidence_address3,
            'countryofresidence_city3' => $request->countryofresidence_city3,
            'countryofresidence_postal3' => $request->countryofresidence_postal3,
            'countryofresidence_country4' => $request->countryofresidence_country4,
            'countryofresidence_fromwhen4' => $request->countryofresidence_fromwhen4,
            'countryofresidence_towhen4' => $request->countryofresidence_towhen4,
            'countryofresidence_address4' => $request->countryofresidence_address4,
            'countryofresidence_city4' => $request->countryofresidence_city4,
            'countryofresidence_postal4' => $request->countryofresidence_postal4,
            'countryofresidence_country5' => $request->countryofresidence_country5,
            'countryofresidence_fromwhen5' => $request->countryofresidence_fromwhen5,
            'countryofresidence_towhen5' => $request->countryofresidence_towhen5,
            'countryofresidence_address5' => $request->countryofresidence_address5,
            'countryofresidence_city5' => $request->countryofresidence_city5,
            'countryofresidence_postal5' => $request->countryofresidence_postal5,
        
        ];

        $healthDeclaration =  [
            'form360_id' => $form_id,
            'healthdeclaration_country1' => $request->healthdeclaration_country1,
            'healthdeclaration_from1' => $request->healthdeclaration_from1,
            'healthdeclaration_to1' => $request->healthdeclaration_to1,
            'healthdeclaration_purpose1' => $request->healthdeclaration_purpose1,
            'healthdeclaration_country2' => $request->healthdeclaration_country2,
            'healthdeclaration_from2' => $request->healthdeclaration_from2,
            'healthdeclaration_to2' => $request->healthdeclaration_to2,
            'healthdeclaration_purpose2' => $request->healthdeclaration_purpose2,
            'healthdeclaration_country3' => $request->healthdeclaration_country3,
            'healthdeclaration_from3' => $request->healthdeclaration_from3,
            'healthdeclaration_to3' => $request->healthdeclaration_to3,
            'healthdeclaration_purpose3' => $request->healthdeclaration_purpose3,
            'healthdeclaration_country4' => $request->healthdeclaration_country4,
            'healthdeclaration_from4' => $request->healthdeclaration_from4,
            'healthdeclaration_to4' => $request->healthdeclaration_to4,
            'healthdeclaration_purpose4' => $request->healthdeclaration_purpose4,
            'healthdeclaration_country5' => $request->healthdeclaration_country5,
            'healthdeclaration_from5' => $request->healthdeclaration_from5,
            'healthdeclaration_to5' => $request->healthdeclaration_to5,
            'healthdeclaration_purpose5' => $request->healthdeclaration_purpose5
        ];

        $healthQuestion =  [
            'form360_id' => $form_id,
            'healthquestion_aus_or_nz' => $request->healthquestion_aus_or_nz,
            'healthquestion_paramedic' => $request->healthquestion_paramedic,
            'healthquestion_childcare' => $request->healthquestion_childcare,
            'healthquestion_classroom' => $request->healthquestion_classroom,
            'healthquestion_tuberculosis' => $request->healthquestion_tuberculosis,
            'healthquestion_familymember_tuberculosis' => $request->healthquestion_familymember_tuberculosis,
            'healthquestion_xray' => $request->healthquestion_xray,
            'healthquestion_indicate_if_yes' => $request->healthquestion_indicate_if_yes,
            'healthquestion_medicalcosts' => $request->healthquestion_medicalcosts,
            'healthquestion_blood' => $request->healthquestion_blood,
            'healthquestion_cancer' => $request->healthquestion_cancer,
            'healthquestion_heart' => $request->healthquestion_heart,
            'healthquestion_hepatitis' => $request->healthquestion_hepatitis,
            'healthquestion_hiv' => $request->healthquestion_hiv,
            'healthquestion_kidney' => $request->healthquestion_kidney,
            'healthquestion_mental' => $request->healthquestion_mental,
            'healthquestion_pregnancy' => $request->healthquestion_pregnancy,
            'healthquestion_respiratory1' => $request->healthquestion_respiratory1,
            'healthquestion_medical_condition' => $request->healthquestion_medical_condition,
            'healthquestion_question_number_if_yes' => $request->healthquestion_question_number_if_yes
        ];

        $character =  [
            'form360_id' => $form_id,
            'character_legal_action' => $request->character_legal_action,
            'character_official_record' => $request->character_official_record,
            'character_interpol_notice1' => $request->character_interpol_notice1,
            'character_interpol_notice2' => $request->character_interpol_notice2,
            'character_sexually' => $request->character_sexually,
            'character_offender' => $request->character_offender,
            'character_unsoundness' => $request->character_unsoundness,
            'character_plead1' => $request->character_plead1,
            'character_plead2' => $request->character_plead2,
            'character_associated' => $request->character_associated,
            'character_genocide' => $request->character_genocide,
            'character_terrorism' => $request->character_terrorism,
            'character_private_militia' => $request->character_private_militia,
            'character_biological' => $request->character_biological,
            'character_training' => $request->character_training,
            'character_offences' => $request->character_offences,
            'character_deported' => $request->character_deported,
            'character_overstayed' => $request->character_overstayed,
            'character_authority' => $request->character_authority,
            'character_refer_to_you' => $request->character_refer_to_you
        ];

        $familymember =  [
            'form360_id' => $form_id,
            'fam_member' => $request->fam_member,
            'fam_member_visa' => $request->fam_member_visa,
            'fam_member_children' => $request->fam_member_children,
            'fam_member_child_visa' => $request->fam_member_child_visa,
            'fam_member_name' => $request->fam_member_name,
            'fam_member_dob' => $request->fam_member_dob,
            'fam_member_pob' => $request->fam_member_pob,
            'fam_member_nationality' => $request->fam_member_nationality,
            'fam_member_other_nationality' => $request->fam_member_other_nationality,
            'fam_member_ever_suffered' => $request->fam_member_ever_suffered,
            'fam_member_legal_action' => $request->fam_member_legal_action,
            'fam_member_visa_application' => $request->fam_member_visa_application,
            'fam_member_currently_live' => $request->fam_member_currently_live,
            'fam_member_child_nam1e' => $request->fam_member_child_nam1e,
            'fam_member_child_dob1' => $request->fam_member_child_dob1,
            'fam_member_child_pob1' => $request->fam_member_child_pob1,
            'fam_member_child_nationality1' => $request->fam_member_child_nationality1,
            'fam_member_child_other_nationality1' => $request->fam_member_child_other_nationality1,
            'fam_member_child_ever_suffered1' => $request->fam_member_child_ever_suffered1,
            'fam_member_child_legal_action1' => $request->fam_member_child_legal_action1,
            'fam_member_child_visa_application1' => $request->fam_member_child_visa_application1,
            'fam_member_child_currently_live1' => $request->fam_member_child_currently_live1,
            'fam_member_child_nam2e' => $request->fam_member_child_nam2e,
            'fam_member_child_dob2' => $request->fam_member_child_dob2,
            'fam_member_child_pob2' => $request->fam_member_child_pob2,
            'fam_member_child_nationality2' => $request->fam_member_child_nationality2,
            'fam_member_child_other_nationality2' => $request->fam_member_child_other_nationality2,
            'fam_member_child_ever_suffered2' => $request->fam_member_child_ever_suffered2,
            'fam_member_child_legal_action2' => $request->fam_member_child_legal_action2,
            'fam_member_child_visa_application2' => $request->fam_member_child_visa_application2,
            'fam_member_child_currently_live2' => $request->fam_member_child_currently_live2,
            'fam_member_child_name3' => $request->fam_member_child_name3,
            'fam_member_child_dob3' => $request->fam_member_child_dob3,
            'fam_member_child_pob3' => $request->fam_member_child_pob3,
            'fam_member_child_nationality3' => $request->fam_member_child_nationality3,
            'fam_member_child_other_nationality3' => $request->fam_member_child_other_nationality3,
            'fam_member_child_ever_suffered3' => $request->fam_member_child_ever_suffered3,
            'fam_member_child_legal_action3' => $request->fam_member_child_legal_action3,
            'fam_member_child_visa_application3' => $request->fam_member_child_visa_application3,
            'fam_member_child_currently_live3' => $request->fam_member_child_currently_live3,
            'fam_member_child_name4' => $request->fam_member_child_name4,
            'fam_member_child_dob4' => $request->fam_member_child_dob4,
            'fam_member_child_pob4' => $request->fam_member_child_pob4,
            'fam_member_child_nationality4' => $request->fam_member_child_nationality4,
            'fam_member_child_other_nationality4' => $request->fam_member_child_other_nationality4,
            'fam_member_child_ever_suffered4' => $request->fam_member_child_ever_suffered4,
            'fam_member_child_legal_action4' => $request->fam_member_child_legal_action4,
            'fam_member_child_visa_application4' => $request->fam_member_child_visa_application4,
            'fam_member_child_currently_live4' => $request->fam_member_child_currently_live4,
            'fam_member_father_name' => $request->fam_member_father_name,
            'fam_member_father_dob' => $request->fam_member_father_dob,
            'fam_member_father_pob' => $request->fam_member_father_pob,
            'fam_member_father_nationality' => $request->fam_member_father_nationality,
            'fam_member_father_other_nationality' => $request->fam_member_father_other_nationality,
            'fam_member_father_ever_suffered' => $request->fam_member_father_ever_suffered,
            'fam_member_father_legal_action' => $request->fam_member_father_legal_action,
            'fam_member_father_visa_application' => $request->fam_member_father_visa_application,
            'fam_member_father_currently_live' => $request->fam_member_father_currently_live,
            'fam_member_mother_name' => $request->fam_member_mother_name,
            'fam_member_mother_dob' => $request->fam_member_mother_dob,
            'fam_member_mother_pob' => $request->fam_member_mother_pob,
            'fam_member_mother_nationality' => $request->fam_member_mother_nationality,
            'fam_member_mother_other_nationality' => $request->fam_member_mother_other_nationality,
            'fam_member_mother_ever_suffered' => $request->fam_member_mother_ever_suffered,
            'fam_member_mother_legal_action' => $request->fam_member_mother_legal_action,
            'fam_member_mother_visa_application' => $request->fam_member_mother_visa_application,
            'fam_member_mother_currently_live' => $request->fam_member_mother_currently_live,
            'fam_member_bro_sis_name1' => $request->fam_member_bro_sis_name1,
            'fam_member_bro_sis_dob1' => $request->fam_member_bro_sis_dob1,
            'fam_member_bro_sis_pob1' => $request->fam_member_bro_sis_pob1,
            'fam_member_bro_sis_nationality1' => $request->fam_member_bro_sis_nationality1 ,
            'fam_member_bro_sis_other_nationality1' => $request->fam_member_bro_sis_other_nationality1,
            'fam_member_bro_sis_ever_suffered1' => $request->fam_member_bro_sis_ever_suffered1,
            'fam_member_bro_sis_legal_action1' => $request->fam_member_bro_sis_legal_action1,
            'fam_member_bro_sis_visa_application1' => $request->fam_member_bro_sis_visa_application1,
            'fam_member_bro_sis_currently_live1' => $request->fam_member_bro_sis_currently_live1,
            'fam_member_bro_sis_name2' => $request->fam_member_bro_sis_name2,
            'fam_member_bro_sis_dob2' => $request->fam_member_bro_sis_dob2,
            'fam_member_bro_sis_pob2' => $request->fam_member_bro_sis_pob2,
            'fam_member_bro_sis_nationality2' => $request->fam_member_bro_sis_nationality2,
            'fam_member_bro_sis_other_nationality2' => $request->fam_member_bro_sis_other_nationality2,
            'fam_member_bro_sis_ever_suffered2' => $request->fam_member_bro_sis_ever_suffered2,
            'fam_member_bro_sis_legal_action2' => $request->fam_member_bro_sis_legal_action2,
            'fam_member_bro_sis_visa_application2' => $request->fam_member_bro_sis_visa_application2,
            'fam_member_bro_sis_currently_live2' => $request->fam_member_bro_sis_currently_live2,
            'fam_member_bro_sis_name3' => $request->fam_member_bro_sis_name3,
            'fam_member_bro_sis_dob3' => $request->fam_member_bro_sis_dob3,
            'fam_member_bro_sis_pob3' => $request->fam_member_bro_sis_pob3,
            'fam_member_bro_sis_nationality3' => $request->fam_member_bro_sis_nationality3,
            'fam_member_bro_sis_other_nationality3' => $request->fam_member_bro_sis_other_nationality3,
            'fam_member_bro_sis_ever_suffered3' => $request->fam_member_bro_sis_ever_suffered3,
            'fam_member_bro_sis_legal_action3' => $request->fam_member_bro_sis_legal_action3,
            'fam_member_bro_sis_visa_application3' => $request->fam_member_bro_sis_visa_application3 ,
            'fam_member_bro_sis_currently_live3' => $request->fam_member_bro_sis_currently_live3,
            'fam_member_bro_sis_name4' => $request->fam_member_bro_sis_name4,
            'fam_member_bro_sis_dob4' => $request->fam_member_bro_sis_dob4,
            'fam_member_bro_sis_pob4' => $request->fam_member_bro_sis_pob4,
            'fam_member_bro_sis_nationality4' => $request->fam_member_bro_sis_nationality4,
            'fam_member_bro_sis_other_nationality4' => $request->fam_member_bro_sis_other_nationality4,
            'fam_member_bro_sis_ever_suffered4' => $request->fam_member_bro_sis_ever_suffered4,
            'fam_member_bro_sis_legal_action4' => $request->fam_member_bro_sis_legal_action4,
            'fam_member_bro_sis_visa_application4' => $request->fam_member_bro_sis_visa_application4,
            'fam_member_bro_sis_currently_live4' => $request->fam_member_bro_sis_currently_live4,

        ];
        
        $fieldsetsData = [
            'matrixdata' => $matrixData ,
            'personaldata' => $personalData ,
            'firsteducationdata' => $firstEducationData,
            'higheducationdata' =>$highEducationData,
            'apprenticeship' =>$apprenticeshipData, 
            'workExperienceData' => $workExperienceData,
            'workExperienceIntraData' => $workExperienceIntraData,
            'visahistoryData' => $visahistoryData,
            'travelhistoryData' => $travelhistoryData,
            'countryofresidenceData' => $countryofresidenceData,
            'healthdeclaration' => $healthDeclaration,
            'healthQuestion' => $healthQuestion,
            'character' => $character,
            'familymember' => $familymember
        ];
        
        return $fieldsetsData;

    }

    public function correctFieldsEmail(Request $request){
        
        if(!empty($request->userid)){
            $user = DB::table('users')->where('id',$request->userid)->first();
           
            if($request->has('fieldsname')){
                       $data = [
                           'email' => $user->email,
                           'username' => $user->username,
                           'fieldsname' => $request->fieldsname,
                           'fieldsvalue' => $request->fieldsvalue,
                           'fieldscomments' => $request->fieldscomments,
                           'formname' => $request->formName
                       ];
                       //dd($data);
                       Mail::to($user->email)->send(new CorrectionMail($data));
                       //Mail::to('hamzashan123@gmail.com')->send(new CorrectionEmailAdmin($data));
                      //Mail::to('riccardo@australialegal.it')->send(new CorrectionEmailAdmin($data));
                       return response()->json(['success' => "true"]);
           }
       }
    }
}
