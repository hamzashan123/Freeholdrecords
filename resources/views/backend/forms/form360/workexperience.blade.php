<fieldset id="fieldsetsix">
@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('consultant'))
                    <a id="pdfworkhistory" class="btn btn-primary" style="text-align:center;color:white; margin-bottom:20px;">Generate Pdf</a>
                    @endif
    <div class="form-card">
        <h2 class="fs-title" style="text-align: center;">SECTION 6:</h2>

        <div class="row">
            <div class="col-7">
                <h2 class="fs-title">- WORK EXPERIENCE (CURRENT OR MOST RECENT) NOT OLDER THAN 10 YEARS:</h2>
            </div>
            <div class="col-5">
                <h2 class="steps">Step 6 - 14</h2>
            </div>
        </div>

        <table>
            <tbody>

                <tr>
                    <td>Are you currently employed? </td>
                    <td>
                        <select name="workexp_current_employed" id="workexp_current_employed" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->workexp_current_employed)))
                            <option value="{{$data->workexp_current_employed}}" selected>{{$data->workexp_current_employed}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>If you are employed, are you currently working
                        for your future sponsor?
                    </td>
                    <td>
                        <select name="workexp_current_future_sponsor" id="workexp_current_future_sponsor" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->workexp_current_future_sponsor)))
                            <option value="{{$data->workexp_current_future_sponsor}}" selected>{{$data->workexp_current_future_sponsor}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>What is your current or most recent
                        occupation?
                    </td>
                    <td> <input type="text" name="workexp_current_recent_occupation" id="workexp_current_recent_occupation" @if(isset($data->workexp_current_recent_occupation)) value="{{$data->workexp_current_recent_occupation}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Are you retired? </td>
                    <td>
                        <select name="workexp_retired" id="workexp_retired" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->workexp_retired)))
                            <option value="{{$data->workexp_retired}}" selected>{{$data->workexp_retired}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>If retired, when did you retire? </td>
                    <td> <input type="date" name="workexp_if_retired" id="workexp_if_retired" @if(isset($data->workexp_if_retired)) value="{{$data->workexp_if_retired}}" @endif/> </td>
                </tr>

                <tr>
                    <td>What was your last occupation before
                        retiring
                    </td>
                    <td> <input type="text" name="workexp_last_occupation" id="workexp_last_occupation" @if(isset($data->workexp_last_occupation)) value="{{$data->workexp_last_occupation}}" @endif/> </td>
                </tr>


            </tbody>
        </table>


        <p style="color:red">FOR EACH WORKING PERIOD PLEASE INDICATE THE FOLLOWING. PLEASE REFER ONLY TO WORK THAT IS RELEVANT
            TO THE OCCUPATION YOU WILL BE PERFORMING ON YOUR VISA. </p>

        <table>
            <tbody>
                <tr>
                    <td> Your Position
                    </td>
                    <td> <input type="text" name="workexp1_your_position" id="workexp1_your_position" @if(isset($data->workexp1_your_position)) value="{{$data->workexp1_your_position}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Position Type
                    </td>
                    <td>
                        <select name="workexp1_your_position_type" id="workexp1_your_position_type" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->workexp1_your_position_type)))
                            <option value="{{$data->workexp1_your_position_type}}" selected>{{$data->workexp1_your_position_type}}</option>
                            @endif
                            <option value="Full Time"> Full Time </option>
                            <option value="Part Time"> Part Time </option>
                            <option value="Other"> Other </option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td>Employer/Name of the business you work for
                    </td>
                    <td> <input type="text" name="workexp1_employer_name" id="workexp1_employer_name" @if(isset($data->workexp1_employer_name)) value="{{$data->workexp1_employer_name}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Country where the business is located

                    </td>
                    <td> <input type="text" name="workexp1_business_country" id="workexp1_business_country" @if(isset($data->workexp1_business_country)) value="{{$data->workexp1_business_country}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Date work started

                    </td>
                    <td> <input type="date" name="workexp1_date_work_started" id="workexp1_date_work_started" @if(isset($data->workexp1_date_work_started)) value="{{$data->workexp1_date_work_started}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Date work ended (if still working please leave
                        blank)

                    </td>
                    <td> <input type="date" name="workexp1_date_work_ended" id="workexp1_date_work_ended" @if(isset($data->workexp1_date_work_ended)) value="{{$data->workexp1_date_work_ended}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Description of duties (please indicate 5 main
                        duties)

                    </td>
                    <td> <input type="date" name="workexp1_description_duties" id="workexp1_description_duties" @if(isset($data->workexp1_description_duties)) value="{{$data->workexp1_description_duties}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Please confirm that this work experience is
                        related to the nominated position

                    </td>
                    <td> <input type="date" name="workexp1_nominated_position" id="workexp1_nominated_position" @if(isset($data->workexp1_nominated_position)) value="{{$data->workexp1_nominated_position}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Was this work performed in Australia or New
                        Zealand?
                    </td>
                    <td>
                        <select name="workexp1_performed_in_aus_nz" id="workexp1_performed_in_aus_nz" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->workexp1_performed_in_aus_nz)))
                            <option value="{{$data->workexp1_performed_in_aus_nz}}" selected>{{$data->workexp1_performed_in_aus_nz}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>If yes, please specify with what visa you have
                        worked with this employer

                    </td>
                    <td> <input type="date" name="workexp1_visa_employer" id="workexp1_visa_employer" @if(isset($data->workexp1_visa_employer)) value="{{$data->workexp1_visa_employer}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Did you receive a payslip for this work or an
                        invoice?
                    </td>
                    <td>
                        <select name="workexp1_payslips_for_this_week" id="workexp1_payslips_for_this_week" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->workexp1_payslips_for_this_week)))
                            <option value="{{$data->workexp1_payslips_for_this_week}}" selected>{{$data->workexp1_payslips_for_this_week}}</option>
                            @endif
                            <option value="Payslip"> Payslip </option>
                            <option value="Invoice"> Invoice </option>
                            <option value="Other"> Other </option>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Can you provide the contact details of a person
                        for this work period
                    </td>
                    <td>
                        <select name="workexp1_contact_details_work_period" id="workexp1_contact_details_work_period" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->workexp1_contact_details_work_period)))
                            <option value="{{$data->workexp1_contact_details_work_period}}" selected>{{$data->workexp1_contact_details_work_period}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>If yes, please indicate
                    </td>
                    <td> <input type="text" name="workexp1_contact_details_work_period_indicate" id="workexp1_contact_details_work_period_indicate" @if(isset($data->workexp1_contact_details_work_period_indicate)) value="{{$data->workexp1_contact_details_work_period_indicate}}" @endif/> </td>

                </tr>

                <tr>
                    <td>Name & Surname
                    </td>
                    <td> <input type="text" name="workexp1_contact_details_work_period_name" id="workexp1_contact_details_work_period_name" @if(isset($data->workexp1_contact_details_work_period_name)) value="{{$data->workexp1_contact_details_work_period_name}}" @endif/> </td>

                </tr>

                <tr>
                    <td>Position
                    </td>
                    <td> <input type="text" name="workexp1_contact_details_work_period_position" id="workexp1_contact_details_work_period_position" @if(isset($data->workexp1_contact_details_work_period_position)) value="{{$data->workexp1_contact_details_work_period_position}}" @endif/> </td>

                </tr>

                <tr>
                    <td>Email
                    </td>
                    <td> <input type="email" name="workexp1_contact_details_work_period_email" id="workexp1_contact_details_work_period_email" @if(isset($data->workexp1_contact_details_work_period_email)) value="{{$data->workexp1_contact_details_work_period_email}}" @endif/> </td>

                </tr>

                <tr>
                    <td>Phone contact
                    </td>
                    <td> <input type="tel" name="workexp1_contact_details_work_period_phone" id="workexp1_contact_details_work_period_phone" @if(isset($data->workexp1_contact_details_work_period_phone)) value="{{$data->workexp1_contact_details_work_period_phone}}" @endif/> </td>

                </tr>

            </tbody>
        </table>

        <h2 class="fs-title" style="margin-top: 10px;">WORK EXPERIENCE N.1 – DOCS TO BE UPLOADED
        </h2>
        <h2 class="fs-title" style="margin-top: 10px;"> EMPLOYMENT CONTRACT LETTER
        </h2>


        <table>
            <tbody>
                <tr>
                    <td> Employment contract or equivalent document
                        Reference letter </td>
                    <td> <input type="file" name="workexp1_employment_contract" id="workexp1_employment_contract">
                
                    @if (array_key_exists('workexp1_employment_contract', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_employment_contract/'.$docdataForm360['workexp1_employment_contract'])  }}">
                                                               @if(str_contains($docdataForm360['workexp1_employment_contract'] , '.pdf'))
                                                               <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_employment_contract/'.$docdataForm360['workexp1_employment_contract'])  }}"  />
                                                               @endif
                                                               </a>
                                                             
                                                               
                                                           @endif   
                
                </td>
                </tr>
            </tbody>
        </table>

        <h2 class="fs-title" style="margin-top: 10px;"> Payslips</h2>

        <table>
            <tbody>
                <tr>
                    <td> 1 payslip of your current year or most recent
                        year of experience to be uploaded here
                    </td>
                    <td> <input type="file" name="workexp1_current_year_of_experience" id="workexp1_current_year_of_experience">
                
                    @if (array_key_exists('workexp1_current_year_of_experience', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_current_year_of_experience/'.$docdataForm360['workexp1_current_year_of_experience'])  }}">
                                                               @if(str_contains($docdataForm360['workexp1_current_year_of_experience'] , '.pdf'))
                                                               <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_current_year_of_experience/'.$docdataForm360['workexp1_current_year_of_experience'])  }}"  />
                                                               @endif
                                                               </a>
                                                             
                                                               
                                                           @endif   
                </td>
                </tr>

                <tr>
                    <td> 1 payslip for each year previous year of work
                        experience performed with this employer, to be
                        uploaded here
                    </td>
                    <td> <input type="file" name="workexp1_previous_year_of_experience1" id="workexp1_previous_year_of_experience1">
                
                    @if (array_key_exists('workexp1_previous_year_of_experience1', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_previous_year_of_experience1/'.$docdataForm360['workexp1_previous_year_of_experience1'])  }}">
                                                               @if(str_contains($docdataForm360['workexp1_previous_year_of_experience1'] , '.pdf'))
                                                               <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_previous_year_of_experience1/'.$docdataForm360['workexp1_previous_year_of_experience1'])  }}"  />
                                                               @endif
                                                               </a>
                                                             
                                                               
                                                           @endif   
                </td>
                </tr>

                <tr>
                    <td> 1 payslip for each year previous year of work
                        experience performed with this employer, to be
                        uploaded here
                    </td>
                    <td> <input type="file" name="workexp1_previous_year_of_experience2" id="workexp1_previous_year_of_experience2">
                
                    @if (array_key_exists('workexp1_previous_year_of_experience2', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_previous_year_of_experience2/'.$docdataForm360['workexp1_previous_year_of_experience2'])  }}">
                                                               @if(str_contains($docdataForm360['workexp1_previous_year_of_experience2'] , '.pdf'))
                                                               <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_previous_year_of_experience2/'.$docdataForm360['workexp1_previous_year_of_experience2'])  }}"  />
                                                               @endif
                                                               </a>
                                                             
                                                               
                                                           @endif   
                </td>
                </tr>

                <tr>
                    <td> 1 payslip for each year previous year of work
                        experience performed with this employer, to be
                        uploaded here
                    </td>
                    <td> <input type="file" name="workexp1_previous_year_of_experience3" id="workexp1_previous_year_of_experience3">
                
                    @if (array_key_exists('workexp1_previous_year_of_experience3', $docdataForm360))
                                                               
                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_previous_year_of_experience3/'.$docdataForm360['workexp1_previous_year_of_experience3'])  }}">
                        @if(str_contains($docdataForm360['workexp1_previous_year_of_experience3'] , '.pdf'))
                         <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                        @else
                        <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_previous_year_of_experience3/'.$docdataForm360['workexp1_previous_year_of_experience3'])  }}"  />
                        @endif
                        </a>
                                                             
                                                               
                    @endif   
                </td>
                </tr>


            </tbody>
        </table>

        <h2 class="fs-title" style="margin-top: 10px;"> INCOME TAX RETURN (In Italy CUD) FOR EACH YEAR OF WORK PERFORMED </h2>

        <table>
            <tbody>
                <tr>
                    <td>Income tax return issued for each year of work
                        performed to be uploaded here
                    </td>
                    <td> <input type="file" name="workexp1_income_tax_return1" id="workexp1_income_tax_return1">
                    @if (array_key_exists('workexp1_income_tax_return1', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_income_tax_return1/'.$docdataForm360['workexp1_income_tax_return1'])  }}">
                                                               @if(str_contains($docdataForm360['workexp1_income_tax_return1'] , '.pdf'))
                                                                <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_income_tax_return1/'.$docdataForm360['workexp1_income_tax_return1'])  }}"  />
                                                               @endif
                                                               </a>
                                                                                                    
                                                                                                      
                                                           @endif  
                    </td>
                </tr>

                <tr>
                    <td>Income tax return issued for each year of work
                        performed to be uploaded here
                    </td>
                    <td> <input type="file" name="workexp1_income_tax_return2" id="workexp1_income_tax_return2">
                    @if (array_key_exists('workexp1_income_tax_return2', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_income_tax_return2/'.$docdataForm360['workexp1_income_tax_return2'])  }}">
                                                               @if(str_contains($docdataForm360['workexp1_income_tax_return2'] , '.pdf'))
                                                                <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_income_tax_return2/'.$docdataForm360['workexp1_income_tax_return2'])  }}"  />
                                                               @endif
                                                               </a>
                                                                                                    
                                                                                                      
                                                           @endif  
                </td>
                </tr>

                <tr>
                    <td>Income tax return issued for each year of work
                        performed to be uploaded here
                    </td>
                    <td> <input type="file" name="workexp1_income_tax_return2_1" id="workexp1_income_tax_return2_1">
                    @if (array_key_exists('workexp1_income_tax_return2_1', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_income_tax_return2_1/'.$docdataForm360['workexp1_income_tax_return2_1'])  }}">
                                                               @if(str_contains($docdataForm360['workexp1_income_tax_return2_1'] , '.pdf'))
                                                                <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_income_tax_return2_1/'.$docdataForm360['workexp1_income_tax_return2_1'])  }}"  />
                                                               @endif
                                                               </a>
                                                                                                    
                                                                                                      
                                                           @endif  
                    </td>
                </tr>


                <tr>
                    <td>Any other relevant document to be uploaded
                        here
                    </td>
                    <td> <input type="file" name="workexp1_relevant_doc" id="workexp1_relevant_doc">
                    @if (array_key_exists('workexp1_relevant_doc', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_relevant_doc/'.$docdataForm360['workexp1_relevant_doc'])  }}">
                                                               @if(str_contains($docdataForm360['workexp1_relevant_doc'] , '.pdf'))
                                                                <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_relevant_doc/'.$docdataForm360['workexp1_relevant_doc'])  }}"  />
                                                               @endif
                                                               </a>
                                                                                                    
                                                                                                      
                                                           @endif      
                </td>
                </tr>





            </tbody>
        </table>

        <h2 class="fs-title" style="margin-top: 10px;"> INPS CHART (Italian employment only) </h2>

        <table>
            <tbody>
                <tr>
                    <td>Tabella estratto contributivo INPS
                    </td>
                    <td> <input type="file" name="workexp1_tabella_estratto" id="workexp1_tabella_estratto">
                    @if (array_key_exists('workexp1_tabella_estratto', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_tabella_estratto/'.$docdataForm360['workexp1_tabella_estratto'])  }}">
                                                               @if(str_contains($docdataForm360['workexp1_tabella_estratto'] , '.pdf'))
                                                                <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/workexp1_tabella_estratto/'.$docdataForm360['workexp1_tabella_estratto'])  }}"  />
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