<fieldset id="fieldsetseven">
@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('consultant'))
                    <a id="pdfworkexpintra" class="btn btn-primary" style="text-align:center;color:white; margin-bottom:20px;">Generate Pdf</a>
                    @endif
    <div class="form-card">
        <h2 class="fs-title" style="text-align: center;">SECTION 7:</h2>

        <div class="row">
            <div class="col-7">
                <h2 class="fs-title">- WORK EXPERIENCE – FOR INTRA COMPANY VISAS:</h2>
            </div>
            <div class="col-5">
                <h2 class="steps">Step 7 - 14</h2>
            </div>
        </div>

        <table>
            <tbody>

                <tr>
                    <td>Are you currently employed? </td>
                    <td>
                        <select name="workexpintracompany_current_employed" id="workexpintracompany_current_employed" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->workexpintracompany_current_employed)))
                            <option value="{{$data->workexpintracompany_current_employed}}" selected>{{$data->workexpintracompany_current_employed}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>If you are employed, are you currently working
                        for the overseas branch of the Australia or New
                        Zealandn company?
                    </td>
                    <td>
                        <select name="workexpintracompany_current_working" id="workexpintracompany_current_working" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->workexpintracompany_current_working)))
                            <option value="{{$data->workexpintracompany_current_working}}" selected>{{$data->workexpintracompany_current_working}}</option>
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
                    <td>
                        <input type="text" name="workexpintracompany_current_recent_occupation" id="workexpintracompany_current_recent_occupation" @if(isset($data->workexpintracompany_current_recent_occupation)) value="{{$data->workexpintracompany_current_recent_occupation}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Your Position
                    </td>
                    <td> <input type="text" name="workexpintracompany_your_position" id="workexpintracompany_your_position" @if(isset($data->workexpintracompany_your_position)) value="{{$data->workexpintracompany_your_position}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Position Type
                    </td>
                    <td>
                        <select name="workexpintracompany_your_position_type" id="workexpintracompany_your_position_type" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->workexpintracompany_your_position_type)))
                            <option value="{{$data->workexpintracompany_your_position_type}}" selected>{{$data->workexpintracompany_your_position_type}}</option>
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
                    <td> <input type="text" name="workexpintracompany_employer_name" id="workexpintracompany_employer_name" @if(isset($data->workexpintracompany_employer_name)) value="{{$data->workexpintracompany_employer_name}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Country where the business is located

                    </td>
                    <td> <input type="text" name="workexpintracompany_business_country" id="workexpintracompany_business_country" @if(isset($data->workexpintracompany_business_country)) value="{{$data->workexpintracompany_business_country}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Date work started

                    </td>
                    <td> <input type="date" name="workexpintracompany_date_work_started" id="workexpintracompany_date_work_started" @if(isset($data->workexpintracompany_date_work_started)) value="{{$data->workexpintracompany_date_work_started}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Date work ended (if still working please leave
                        blank)

                    </td>
                    <td> <input type="date" name="workexpintracompany_date_work_ended" id="workexpintracompany_date_work_ended" @if(isset($data->workexpintracompany_date_work_ended)) value="{{$data->workexpintracompany_date_work_ended}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Description of duties (please indicate 5 main
                        duties)

                    </td>
                    <td> <input type="date" name="workexpintracompany_description_duties" id="workexpintracompany_description_duties" @if(isset($data->workexpintracompany_description_duties)) value="{{$data->workexpintracompany_description_duties}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Please confirm that this work experience is
                        related to the nominated position

                    </td>
                    <td> <input type="date" name="workexpintracompany_nominated_position" id="workexpintracompany_nominated_position" @if(isset($data->workexpintracompany_nominated_position)) value="{{$data->workexpintracompany_nominated_position}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Was this work performed in Australia or New
                        Zealand?
                    </td>
                    <td>
                        <select name="workexpintracompany_performed_in_aus_nz" id="workexpintracompany_performed_in_aus_nz" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->workexpintracompany_performed_in_aus_nz)))
                            <option value="{{$data->workexpintracompany_performed_in_aus_nz}}" selected>{{$data->workexpintracompany_performed_in_aus_nz}}</option>
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
                    <td> <input type="date" name="workexpintracompany_visa_employer" id="workexpintracompany_visa_employer" @if(isset($data->workexpintracompany_visa_employer)) value="{{$data->workexpintracompany_visa_employer}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Did you receive a payslip for this work or an
                        invoice?
                    </td>
                    <td>
                        <select name="workexpintracompany_payslips_for_this_week" id="workexpintracompany_payslips_for_this_week" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->workexpintracompany_payslips_for_this_week)))
                            <option value="{{$data->workexpintracompany_payslips_for_this_week}}" selected>{{$data->workexpintracompany_payslips_for_this_week}}</option>
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
                        <select name="workexpintracompany_contact_details_work_period" id="workexpintracompany_contact_details_work_period" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->workexpintracompany_contact_details_work_period)))
                            <option value="{{$data->workexpintracompany_contact_details_work_period}}" selected>{{$data->workexpintracompany_contact_details_work_period}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>If yes, please indicate
                    </td>
                    <td> <input type="text" name="workexpintracompany_contact_details_work_period_indicate" id="workexpintracompany_contact_details_work_period_indicate" @if(isset($data->workexpintracompany_contact_details_work_period_indicate)) value="{{$data->workexpintracompany_contact_details_work_period_indicate}}" @endif/> </td>

                </tr>

                <tr>
                    <td>Name & Surname
                    </td>
                    <td> <input type="text" name="workexpintracompany_contact_details_work_period_name" id="workexpintracompany_contact_details_work_period_name" @if(isset($data->workexpintracompany_contact_details_work_period_name)) value="{{$data->workexpintracompany_contact_details_work_period_name}}" @endif/> </td>

                </tr>

                <tr>
                    <td>Position
                    </td>
                    <td> <input type="text" name="workexpintracompany_contact_details_work_period_position" id="workexpintracompany_contact_details_work_period_position" @if(isset($data->workexpintracompany_contact_details_work_period_position)) value="{{$data->workexpintracompany_contact_details_work_period_position}}" @endif/> </td>

                </tr>

                <tr>
                    <td>Email
                    </td>
                    <td> <input type="email" name="workexpintracompany_contact_details_work_period_email" id="workexpintracompany_contact_details_work_period_email" @if(isset($data->workexpintracompany_contact_details_work_period_email)) value="{{$data->workexpintracompany_contact_details_work_period_email}}" @endif/> </td>

                </tr>

                <tr>
                    <td>Phone contact
                    </td>
                    <td> <input type="tel" name="workexpintracompany_contact_details_work_period_phone" id="workexpintracompany_contact_details_work_period_phone" @if(isset($data->workexpintracompany_contact_details_work_period_phone)) value="{{$data->workexpintracompany_contact_details_work_period_phone}}" @endif/> </td>

                </tr>


            </tbody>
        </table>


        <h2 class="fs-title" style="margin-top: 10px;">WORK EXPERIENCE – DOCS TO BE UPLOADED
        </h2>

        <table>
            <tbody>
                <tr>
                    <td> Employment contract </td>
                    <td> <input type="file" name="workexpintracompany_employment_contract" id="workexpintracompany_employment_contract" >
                    @if (array_key_exists('workexpintracompany_employment_contract', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/workexpintracompany_employment_contract/'.$docdataForm360['workexpintracompany_employment_contract'])  }}">
                                                               @if(str_contains($docdataForm360['workexpintracompany_employment_contract'] , '.pdf'))
                                                                <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/workexpintracompany_employment_contract/'.$docdataForm360['workexpintracompany_employment_contract'])  }}"  />
                                                               @endif
                                                               </a>
                                                                                                    
                                                                                                      
                                                           @endif      
                </td>
                </tr>

                <tr>
                    <td> Payslip of the current or most recent year </td>
                    <td> <input type="file" name="workexpintracompany_current_recent_payslip" id="workexpintracompany_current_recent_payslip" >
                    @if (array_key_exists('workexpintracompany_current_recent_payslip', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/workexpintracompany_current_recent_payslip/'.$docdataForm360['workexpintracompany_current_recent_payslip'])  }}">
                                                               @if(str_contains($docdataForm360['workexpintracompany_current_recent_payslip'] , '.pdf'))
                                                                <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/workexpintracompany_current_recent_payslip/'.$docdataForm360['workexpintracompany_current_recent_payslip'])  }}"  />
                                                               @endif
                                                               </a>
                                                                                                    
                                                                                                      
                                                           @endif      
                </td>
                </tr>

                <tr>
                    <td> Income tax return </td>
                    <td> <input type="file" name="workexpintracompany_income_tax_return" id="workexpintracompany_income_tax_return" >
                    @if (array_key_exists('workexpintracompany_income_tax_return', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/workexpintracompany_income_tax_return/'.$docdataForm360['workexpintracompany_income_tax_return'])  }}">
                                                               @if(str_contains($docdataForm360['workexpintracompany_income_tax_return'] , '.pdf'))
                                                                <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/workexpintracompany_income_tax_return/'.$docdataForm360['workexpintracompany_income_tax_return'])  }}"  />
                                                               @endif
                                                               </a>
                                                                                                    
                                                                                                      
                                                           @endif      
                </td>
                </tr>

                <tr>
                    <td> Social security chart such as INPS chart or other
                        equivalent document
                    </td>
                    <td> <input type="file" name="workexpintracompany_social_security" id="workexpintracompany_social_security" >
                    @if (array_key_exists('workexpintracompany_social_security', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/workexpintracompany_social_security/'.$docdataForm360['workexpintracompany_social_security'])  }}">
                                                               @if(str_contains($docdataForm360['workexpintracompany_social_security'] , '.pdf'))
                                                                <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/workexpintracompany_social_security/'.$docdataForm360['workexpintracompany_social_security'])  }}"  />
                                                               @endif
                                                               </a>
                                                                                                    
                                                                                                      
                                                           @endif 
                    </td>
                </tr>
            </tbody>
        </table>

        <h2 class="fs-title" style="margin-top: 10px;"> WORK TO BE PERFORMED IN AUSTRALIA OR NEW ZEALAND
        </h2>

        <table>
            <tbody>

                <tr>
                    <td>Name of company in Australia or New Zealand
                    </td>
                    <td> <input type="text" name="workexpintracompany_aus_nz_name_of_company" id="workexpintracompany_aus_nz_name_of_company" @if(isset($data->workexpintracompany_aus_nz_name_of_company)) value="{{$data->workexpintracompany_aus_nz_name_of_company}}" @endif /> </td>

                </tr>


                <tr>
                    <td>Registration number of the company in Australia
                        or New Zealand (ABN and CAN number)

                    </td>
                    <td> <input type="text" name="workexpintracompany_aus_nz_reg_number" id="workexpintracompany_aus_nz_reg_number" @if(isset($data->workexpintracompany_aus_nz_reg_number)) value="{{$data->workexpintracompany_aus_nz_reg_number}}" @endif /> </td>

                </tr>


                <tr>
                    <td>Address of the company in Australia or New
                        Zealand

                    </td>
                    <td> <input type="text" name="workexpintracompany_aus_nz_address" id="workexpintracompany_aus_nz_addresss" @if(isset($data->workexpintracompany_aus_nz_addresss)) value="{{$data->workexpintracompany_aus_nz_addresss}}" @endif /> </td>

                </tr>

                <tr>
                    <td>Contact number in Australia or New Zealand


                    </td>
                    <td> <input type="text" name="workexpintracompany_aus_nz_contact" id="workexpintracompany_aus_nz_contact" @if(isset($data->workexpintracompany_aus_nz_contact)) value="{{$data->workexpintracompany_aus_nz_contact}}" @endif /> </td>

                </tr>

                <tr>
                    <td>Contact person in Australia or New Zealand
                        (name and surname) </td>
                    <td> <input type="text" name="workexpintracompany_aus_nz_name_surname" id="workexpintracompany_aus_nz_name_surname" @if(isset($data->workexpintracompany_aus_nz_name_surname)) value="{{$data->workexpintracompany_aus_nz_name_surname}}" @endif /> </td>

                </tr>

                <tr>
                    <td>Role of the contact person in Australia or New
                        Zealand </td>
                    <td> <input type="text" name="workexpintracompany_aus_nz_role" id="workexpintracompany_aus_nz_role" @if(isset($data->workexpintracompany_aus_nz_role)) value="{{$data->workexpintracompany_aus_nz_role}}" @endif/> </td>

                </tr>


                <tr>
                    <td>Company sector </td>
                    <td> <input type="text" name="workexpintracompany_aus_nz_sector" id="workexpintracompany_aus_nz_sector" @if(isset($data->workexpintracompany_aus_nz_sector)) value="{{$data->workexpintracompany_aus_nz_sector}}" @endif/> </td>

                </tr>

                <tr>
                    <td>Position that you will carry out in Australia or
                        New Zealand </td>
                    <td> <input type="text" name="workexpintracompany_aus_nz_position" id="workexpintracompany_aus_nz_position" @if(isset($data->workexpintracompany_aus_nz_position)) value="{{$data->workexpintracompany_aus_nz_position}}" @endif/> </td>

                </tr>

                <tr>
                    <td>Main responsibilities and duties to be carried
                        out in Australia or New Zealand </td>
                    <td> <input type="text" name="workexpintracompany_aus_nz_responsibilities" id="workexpintracompany_aus_nz_responsibilities" @if(isset($data->workexpintracompany_aus_nz_responsibilities)) value="{{$data->workexpintracompany_aus_nz_responsibilities}}" @endif/> </td>

                </tr>

                <tr>
                    <td>Description of the project you will be working
                        during the time in Australia or New Zealand </td>
                    <td> <input type="text" name="workexpintracompany_aus_nz_description" id="workexpintracompany_aus_nz_description" @if(isset($data->workexpintracompany_aus_nz_description)) value="{{$data->workexpintracompany_aus_nz_description}}" @endif/> </td>

                </tr>

                <tr>
                    <td>Date you are planning to enter Australia or New
                        Zealand </td>
                    <td> <input type="date" name="workexpintracompany_aus_nz_planing_date" id="workexpintracompany_aus_nz_planing_date" @if(isset($data->workexpintracompany_aus_nz_planing_date)) value="{{$data->workexpintracompany_aus_nz_planing_date}}" @endif/> </td>

                </tr>

                <tr>
                    <td>Date you are planning to leave Australia or New
                        Zealand (maximum 6 months stay) </td>
                    <td> <input type="date" name="workexpintracompany_aus_nz_planing_date_max_6_month" id="workexpintracompany_aus_nz_planing_date_max_6_month" @if(isset($data->workexpintracompany_aus_nz_planing_date_max_6_month)) value="{{$data->workexpintracompany_aus_nz_planing_date_max_6_month}}" @endif/> </td>

                </tr>


                <tr>
                    <td>Will it be necessary enter Australia or New
                        Zealand more than one time in order to carry
                        out the job? In this case, please indicate how
                        many times and for how long you will need to
                        stay </td>
                    <td> <input type="text" name="workexpintracompany_aus_nz_necessary" id="workexpintracompany_aus_nz_necessary" @if(isset($data->workexpintracompany_aus_nz_necessary)) value="{{$data->workexpintracompany_aus_nz_necessary}}" @endif/> </td>

                </tr>

                <tr>
                    <td>For the work carried out in Australia or New
                        Zealand, will you be paid by the Australia or
                        New Zealandn company or will you still receive
                        the payment from the company in Spain? Please
                        specify in any case the amount for the period of
                        work (even if approximately)</td>
                    <td> <input type="text" name="workexpintracompany_aus_nz_paidby" id="workexpintracompany_aus_nz_paidby" @if(isset($data->workexpintracompany_aus_nz_paidby)) value="{{$data->workexpintracompany_aus_nz_paidby}}" @endif/> </td>

                </tr>



            </tbody>
        </table>


        <h2 class="fs-title" style="margin-top: 10px;">WORK TO BE PERFORMED IN AUSTRALIA OR NEW ZEALAND – DOCS</h2>

        <table>
            <tbody>
                <tr>
                    <td> Invitation letter from the Australia or New
                        Zealand company
                    </td>
                    <td> <input type="file" name="workexpintracompany_perform_in_aus_nz" id="workexpintracompany_perform_in_aus_nz" >
                    @if (array_key_exists('workexpintracompany_perform_in_aus_nz', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/workexpintracompany_perform_in_aus_nz/'.$docdataForm360['workexpintracompany_perform_in_aus_nz'])  }}">
                                                               @if(str_contains($docdataForm360['workexpintracompany_perform_in_aus_nz'] , '.pdf'))
                                                                <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/workexpintracompany_perform_in_aus_nz/'.$docdataForm360['workexpintracompany_perform_in_aus_nz'])  }}"  />
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