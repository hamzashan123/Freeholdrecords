<fieldset id="fieldsettwo">
@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('consultant'))
                    <a id="pdfpersonal" class="btn btn-primary" style="text-align:center;color:white; margin-bottom:20px;">Generate Pdf</a>
                    @endif
    <div class="form-card">
        <h2 class="fs-title" style="text-align: center;">SECTION 2:</h2>
        <div class="row">
            <div class="col-7">
                <h2 class="fs-title">Personal:</h2>
            </div>
            <div class="col-5">
                <h2 class="steps">Step 2 - 14 </h2>
            </div>
        </div>

        <h2 class="fs-title">MAIN APPLICANT</h2>
        <table>
            <tbody>
                <tr>
                    <td> Name </td>
                    <td> <input type="text" name="personal_name" id="personal_name" @if(isset($data->personal_name)) value="{{$data->personal_name}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Surname </td>
                    <td> <input type="text" name="personal_surname" id="personal_surname" @if(isset($data->personal_surname)) value="{{$data->personal_surname}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Are or have you ever been formally known by
                        any other names or surnames?
                    </td>
                    <td> <input type="text" name="personal_name_surname" id="personal_name_surname" @if(isset($data->personal_name_surname)) value="{{$data->personal_name_surname}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Civil status </td>
                    <td>
                        <select name="personal_civil_status" id="personal_civil_status" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->personal_civil_status)))
                            <option value="{{$data->personal_civil_status}}" selected>{{$data->personal_civil_status}}</option>
                            @endif
                            <option value="Single"> Single </option>
                            <option value="Married"> Married </option>
                            <option value="De facto relationship with formal certificate
                                issued"> De facto relationship with formal certificate
                                issued </option>
                            <option value="De facto relationship without a formal
                                certificate issued"> De facto relationship without a formal
                                certificate issued </option>
                            <option value="Separated"> Separated </option>
                            <option value="Divorced"> Divorced </option>
                            <option value="Widowed"> Widowed </option>

                        </select>
                    </td>
                </tr>


                <tr>
                    <td> Date of birth

                    </td>
                    <td> <input type="date" name="personal_dob" id="personal_dob" @if(isset($data->personal_dob)) value="{{$data->personal_dob}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Place of birth

                    </td>
                    <td> <input type="text" name="personal_pob" id="personal_pob" @if(isset($data->personal_pob)) value="{{$data->personal_pob}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Gender

                    </td>
                    <td> <input type="text" name="personal_gender" id="personal_gender" @if(isset($data->personal_gender)) value="{{$data->personal_gender}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Nationality

                    </td>
                    <td> <input type="text" name="personal_nationality" id="personal_nationality" @if(isset($data->personal_nationality)) value="{{$data->personal_nationality}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Other Nationality (If applicable)

                    </td>
                    <td> <input type="text" name="personal_other_nationality" id="personal_other_nationality" @if(isset($data->personal_other_nationality)) value="{{$data->personal_other_nationality}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Country of residence

                    </td>
                    <td> <input type="text" name="personal_countryofresidence" id="personal_countryofresidence" @if(isset($data->personal_countryofresidence)) value="{{$data->personal_countryofresidence}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Address where you live in your usual country of
                        residence

                    </td>
                    <td> <input type="text" name="personal_addressusualcountry" id="personal_addressusualcountry" @if(isset($data->personal_addressusualcountry)) value="{{$data->personal_addressusualcountry}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Address in Australia or New Zealand (if
                        applicable)


                    </td>
                    <td> <input type="text" name="personal_addressinausornz" id="personal_addressinausornz" @if(isset($data->personal_addressinausornz)) value="{{$data->personal_addressinausornz}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Contact number in your usually country of
                        residence</td>
                    <td> <input type="tel" name="personal_contactnumberusuallycountry" id="personal_contactnumberusuallycountry" @if(isset($data->personal_contactnumberusuallycountry)) value="{{$data->personal_contactnumberusuallycountry}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Whatsapp contact number
                    </td>
                    <td> <input type="tel" name="personal_whatsappcontact" id="personal_whatsappcontact" @if(isset($data->personal_whatsappcontact)) value="{{$data->personal_whatsappcontact}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Phone number in Australia or New Zealand (if
                        already available)
                    </td>
                    <td> <input type="tel" name="personal_contactnumberausornz" id="personal_contactnumberausornz" @if(isset($data->personal_contactnumberausornz)) value="{{$data->personal_contactnumberausornz}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Email address</td>
                    <td> <input type="email" name="personal_emailaddress" id="personal_emailaddress" @if(isset($data->personal_emailaddress)) value="{{$data->personal_emailaddress}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Are you currently in Australia or New Zealand? </td>
                    <td>
                        <select name="personal_aus_or_nz" id="personal_aus_or_nz" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->personal_aus_or_nz)))
                            <option value="{{$data->personal_aus_or_nz}}" selected>{{$data->personal_aus_or_nz}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> If in Australia or New Zealand, what visa do you hold? </td>
                    <td> <input type="text" name="personal_visahold" id="personal_visahold" @if(isset($data->personal_visahold)) value="{{$data->personal_visahold}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>If in Australia or New Zealand, when does your visa
                        expire </td>
                    <td> <input type="date" name="personal_visaexpire" id="personal_visaexpire" @if(isset($data->personal_visaexpire)) value="{{$data->personal_visaexpire}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td>Have you undertaken a health examination for an Australia or New Zealandn visa in the last 12 months? </td>
                    <td>
                        <select name="personal_health_examination" id="personal_health_examination" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->personal_health_examination)))
                            <option value="{{$data->personal_health_examination}}" selected>{{$data->personal_health_examination}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td>If yes, please specify when it was taken </td>
                    <td> <input type="date" name="personal_health_examination_specifytaken" id="personal_health_examination_specifytaken" @if(isset($data->personal_health_examination_specifytaken)) value="{{$data->personal_health_examination_specifytaken}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td>During your stay in Australia or New Zealand, are you planning to enter a hospital or a health care facility (including nursing homes) </td>
                    <td>
                        <select name="personal_health_care" id="personal_health_care" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->personal_health_care)))
                            <option value="{{$data->personal_health_care}}" selected>{{$data->personal_health_care}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>If yes, please specify </td>
                    <td> <input type="text" name="personal_health_care_specifytaken" id="personal_health_care_specifytaken" @if(isset($data->personal_health_care_specifytaken)) value="{{$data->personal_health_care_specifytaken}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Have you ever been convicted of an offence in any country (including any conviction which is now removed from official records)? </td>
                    <td>
                        <select name="personal_conviction" id="personal_conviction" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->personal_conviction)))
                            <option value="{{$data->personal_conviction}}" selected>{{$data->personal_conviction}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>If yes, please specify </td>
                    <td> <input type="text" name="personal_conviction_specifytaken" id="personal_conviction_specifytaken" @if(isset($data->personal_conviction_specifytaken)) value="{{$data->personal_conviction_specifytaken}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Have you ever been charged with any offence that is currently awaiting legal action? </td>
                    <td>
                        <select name="personal_legal_action" id="personal_legal_action" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->personal_legal_action)))
                            <option value="{{$data->personal_legal_action}}" selected>{{$data->personal_legal_action}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>If yes, please specify </td>
                    <td> <input type="text" name="personal_legal_action_specifytaken" id="personal_legal_action_specifytaken" @if(isset($data->personal_legal_action_specifytaken)) value="{{$data->personal_legal_action_specifytaken}}" @endif/>
                    </td>
                </tr>
            </tbody>
        </table>


        <h2 class="fs-title" style="margin-top: 10px;">DOCS FOR PERSONAL DETAILS</h2>
        <p style="color:red"> Attachments must be colour scans of the original document and uploaded in PDF format only. Please consolidate all
            multipage files into one PDF document for each attachment type. Maximum PDF file size is 3MB per PDF.
            Unnecessary additional documents will cause delays in processing. </p>

        <table>
            <tbody>
            
            <tr>
                        <td> Personal Biodata Page </td>
                        <td> <input type="file" name="personal_passport_biodata_page" id="personal_passport_biodata_page" > 
                        
                        @if (array_key_exists('personal_passport_biodata_page', $docdataForm360))
                                                               
                            <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/personal_passport_biodata_page/'.$docdataForm360['personal_passport_biodata_page'])  }}">
                            @if(str_contains($docdataForm360['personal_passport_biodata_page'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}"  />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/personal_passport_biodata_page/'.$docdataForm360['personal_passport_biodata_page'])  }}" />
                            @endif
                            </a>
                          
                            
                        @endif
                        </td>
                    </tr>

               
                <tr>
                    <td> ID card or driving license </td>
                    <td> <input type="file" name="personal_id_card_driving_license" id="personal_id_card_driving_license" >
                    @if (array_key_exists('personal_id_card_driving_license', $docdataForm360))
                                                               
                            <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/personal_id_card_driving_license/'.$docdataForm360['personal_id_card_driving_license'])  }}">
                            @if(str_contains($docdataForm360['personal_id_card_driving_license'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/personal_id_card_driving_license/'.$docdataForm360['personal_id_card_driving_license'])  }}"  />
                            @endif
                            </a>
                          
                            
                        @endif
                        </td>
                </tr>
                <tr>
                    <td> Updated CV/Resume </td>
                    <td> <input type="file" name="personal_update_resume" id="personal_update_resume" >
                    @if (array_key_exists('personal_update_resume', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/personal_update_resume/'.$docdataForm360['personal_update_resume'])  }}">
                                                               @if(str_contains($docdataForm360['personal_update_resume'] , '.pdf'))
                                                               <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/personal_update_resume/'.$docdataForm360['personal_update_resume'])  }}" />
                                                               @endif
                                             </a>
                         
                        
                     
                   @endif
                   </td>
                </tr>



            </tbody>
        </table>

        <h2 class="fs-title" style="margin-top: 10px;"> SKILLS ASSESSMENT </h2>
        <table>
            <tbody>

                <tr>
                    <td>Do you hold a skills assessment? If so, in what occupation (please attach outcome letter) </td>
                    <td>
                        <select name="personal_skills_assessment" id="personal_skills_assessment" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->personal_skills_assessment)))
                            <option value="{{$data->personal_skills_assessment}}" selected>{{$data->personal_skills_assessment}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td>If yes, please indicate in what occupation you obtained the assessment </td>
                    <td> <input type="text" name="personal_skills_assessment_specifytaken" id="personal_health_examination_specifytaken" @if(isset($data->personal_skills_assessment_specifytaken)) value="{{$data->personal_skills_assessment_specifytaken}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>If you do not have a skills assessment, have you lodged a skills assessment application that is still pending? </td>
                    <td>
                        <select name="personal_skills_assessment_application" id="personal_skills_assessment_application" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->personal_skills_assessment_application)))
                            <option value="{{$data->personal_skills_assessment_application}}" selected>{{$data->personal_skills_assessment_application}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td>If yes, please specify what skills assessment has been lodged and for what occupation
                    </td>
                    <td> <input type="text" name="personal_skills_assessment_application_specifytaken" id="personal_skills_assessment_application_specifytaken" @if(isset($data->personal_skills_assessment_application_specifytaken)) value="{{$data->personal_skills_assessment_application_specifytaken}}" @endif/>
                    </td>
                </tr>
            </tbody>


        </table>


        <h2 class="fs-title" style="margin-top: 10px;">SKILLS ASSESSMENT - DOCS</h2>

        <table>
            <tbody>
                <tr>
                    <td> Skills assessment outcome letter </td>
                    <td> <input type="file" name="personal_skills_assessment_outcome_letter" id="personal_skills_assessment_outcome_letter" >
                
                    @if (array_key_exists('personal_skills_assessment_outcome_letter', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/personal_skills_assessment_outcome_letter/'.$docdataForm360['personal_skills_assessment_outcome_letter'])  }}">
                                                               @if(str_contains($docdataForm360['personal_skills_assessment_outcome_letter'] , '.pdf'))
                                                               <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/personal_skills_assessment_outcome_letter/'.$docdataForm360['personal_skills_assessment_outcome_letter'])  }}"  />
                                                               @endif
                                                               </a>
                                                             
                                                               
                                                           @endif
                                                        
                                                        </td>
                </tr>
            </tbody>
        </table>


        <h2 class="fs-title" style="margin-top: 10px;">LANGUAGES</h2>

        <table>
            <tbody>
                <tr>
                    <td> What is your main language </td>
                    <td> <input type="text" name="personal_main_languages" id="personal_main_languages" @if(isset($data->personal_main_languages)) value="{{$data->personal_main_languages}}" @endif /></td>
                </tr>

                <tr>
                    <td>Have you ever taken a formal English test such
                        as IELTS Test or PTE, TOEFL; CAE Advanced, OET,
                        in the last 36 months? </td>
                    <td>
                        <select name="personal_languages_english_test" id="personal_languages_english_test" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->personal_languages_english_test)))
                            <option value="{{$data->personal_languages_english_test}}" selected>{{$data->personal_languages_english_test}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>If yes, please specify what Test was taken </td>
                    <td>
                        <select name="personal_englishtest_specify" id="personal_englishtest_specify" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->personal_englishtest_specify)))
                            <option value="{{$data->personal_englishtest_specify}}" selected>{{$data->personal_englishtest_specify}}</option>
                            @endif
                            <option value="IELTS"> IELTS </option>
                            <option value="PTE Academic"> PTE Academic </option>
                            <option value="TOEFL"> TOEFL </option>
                            <option value="OET"> OET </option>
                            <option value="CAE Advanced"> CAE Advanced </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> Date the English test was taken </td>
                    <td> <input type="date" name="personal_englishtest_taken" id="personal_englishtest_taken" @if(isset($data->personal_englishtest_taken)) value="{{$data->personal_englishtest_taken}}" @endif /></td>
                </tr>

                <tr>
                    <td>Have you studied in a secondary and or tertiary
                        institution where the instruction was in English?
                    </td>
                    <td>
                        <select name="personal_tertiary_institution" id="personal_tertiary_institution" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->personal_tertiary_institution)))
                            <option value="{{$data->personal_tertiary_institution}}" selected>{{$data->personal_tertiary_institution}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> If yes, please specify what course level it was,
                        the duration and where the course was taken </td>
                    <td> <input type="date" name="personal_course_duration" id="personal_course_duration" @if(isset($data->personal_course_duration)) value="{{$data->personal_course_duration}}" @endif /></td>
                </tr>
            </tbody>
        </table>

        <h2 class="fs-title" style="margin-top: 10px;">LANGUAGES - DOCS</h2>

        <table>
            <tbody>
                <tr>
                    <td> English test to be uploaded here </td>
                    <td> <input type="file" name="personal_languages_english_test_document" id="personal_languages_english_test_document">
                
                    @if (array_key_exists('personal_languages_english_test_document', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/personal_languages_english_test_document/'.$docdataForm360['personal_languages_english_test_document'])  }}">
                                                               @if(str_contains($docdataForm360['personal_languages_english_test_document'] , '.pdf'))
                                                               <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/personal_languages_english_test_document/'.$docdataForm360['personal_languages_english_test_document'])  }}"  />
                                                               @endif
                                                               </a>
                                                             
                                                               
                                                           @endif
                                                        
                
                
                </td>
                </tr>
            </tbody>
        </table>

        <h2 class="fs-title" style="margin-top: 10px;">LICENCE AND REGSITRATION</h2>

        <table>
            <tbody>
                <tr>
                    <td>
                        Is registration or a licence required to work in
                        the nominated occupation in the location where
                        you will be working in Australia or New
                        Zealand
                    </td>
                    <td>
                        <select name="personal_license_and_registration" id="personal_license_and_registration" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->personal_license_and_registration)))
                            <option value="{{$data->personal_license_and_registration}}" selected>{{$data->personal_license_and_registration}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                            <option value="OTHER"> OTHER </option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>

        <h2 class="fs-title" style="margin-top: 10px;">LICENCE AND REGISTRATION – DOCS
        </h2>

        <table>
            <tbody>
                <tr>
                    <td> Licence/Registration evidence </td>
                    <td> <input type="file" name="personal_license_and_registration_document" id="personal_license_and_registration_document" >
                
                    @if (array_key_exists('personal_license_and_registration_document', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/personal_license_and_registration_document/'.$docdataForm360['personal_license_and_registration_document'])  }}">
                                                               @if(str_contains($docdataForm360['personal_license_and_registration_document'] , '.pdf'))
                                                               <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/personal_license_and_registration_document/'.$docdataForm360['personal_license_and_registration_document'])  }}"  />
                                                               @endif
                                                               </a>
                                                             
                                                               
                                                           @endif
                                                        
                
                
                </td>
                </tr>
            </tbody>
        </table>




    </div>
    @if(!Auth::user()->hasRole('consultant') && !Auth::user()->hasRole('admin') )
    <input type="button" name="save" class="save action-button" value="Save" />
    @endif
    <input type="button" name="next" class="next action-button" value="Next" />
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
</fieldset>