<fieldset id="fieldsettwo">
    <div class="form-card">
        <h2 class="fs-title" style="text-align: center;">SECTION 2:</h2>

        <div class="row">
            <div class="col-7">
                <h2 class="fs-title">NOMINATION – POSITION NEEDED</h2>
            </div>
            <div class="col-5">
                <h2 class="steps">Step 2 - 4</h2>
            </div>
        </div>


        <h2 class="fs-title"> DETAILS OF THE POSITION YOU ARE WILLING TO OFFER </h2>

        <table>


            <tbody>
                <tr>
                    <td> Indicate where the visa applicant will be
                        working (full address)</td>
                    <td> <input type="text" name="nomination_visa_appliciant" id="nomination_visa_appliciant" @if(isset($data->nomination_visa_appliciant)) value="{{$data->nomination_visa_appliciant}}" @endif/> </td>
                </tr>


                <tr>
                    <td> Is this an intra-company transfer? (when
                        the applicant has been working for a
                        subsidiary and/or branch of the Australian
                        company outside of Australia)</td>
                    <td> <input type="text" name="nomination_intra_company_transfer" id="nomination_intra_company_transfer" @if(isset($data->nomination_intra_company_transfer)) value="{{$data->nomination_intra_company_transfer}}" @endif/> </td>
                </tr>


                <tr>
                    <td> Indicate the annual turnover of the
                        business for the last financial year
                    </td>
                    <td> <input type="text" name="nomination_financial_year" id="nomination_financial_year" @if(isset($data->nomination_financial_year)) value="{{$data->nomination_financial_year}}" @endif/> </td>
                </tr>

                <tr>
                    <td> What is the job title you are offering to the
                        visa applicant
                    </td>
                    <td> <input type="text" name="nomination_job_offering" id="nomination_job_offering" @if(isset($data->nomination_job_offering)) value="{{$data->nomination_job_offering}}" @endif/> </td>
                </tr>


                <tr>
                    <td>Are you able to find the most suitable
                        occupation from this dropdown menu? If
                        so, please select it</td>

                    <td>
                        <select class="form-control" id="nomination_job_occupation" name="nomination_job_occupation">
                            <option value="">SELECT </option>
                            @if(!empty(isset($data->nomination_job_occupation)))
                            <option value="{{$data->nomination_job_occupation}}" selected>{{$data->nomination_job_occupation}}</option>
                            @endif
                            <option value="Chiropractor">Chiropractor</option>
                            <option value="Dentist">Dentist</option>
                            <option value="Dietitian or Nutritionist">Dietitian or Nutritionist</option>
                            <option value="Optometrist">Optometrist</option>
                            <option value="Pharmacist">Pharmacist</option>
                            <option value="Physician">Physician</option>
                            <option value="Physician Assistant">Physician Assistant</option>
                            <option value="Podiatrist">Podiatrist</option>
                            <option value="Registered Nurse">Registered Nurse</option>
                            <option value="Therapist">Therapist</option>
                            <option value="Veterinarian">Veterinarian</option>
                            <option value="Health Technologist or Technician">Health Technologist or Technician</option>
                            <option value="Other Healthcare Practitioners and Technical Occupation">Other Healthcare Practitioners and Technical Occupation</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Indicate the main duties and responsibilities
                        that the applicant will be performing
                        (ideally please indicate 5 duties)
                    </td>
                    <td> <input type="text" name="nomination_responsibilities" id="nomination_responsibilities" @if(isset($data->nomination_responsibilities)) value="{{$data->nomination_responsibilities}}" @endif/> </td>
                </tr>


                <tr>
                    <td>Indicate the main tasks to be performed
                    </td>
                    <td> <input type="text" name="nomination_performed" id="nomination_performed" @if(isset($data->nomination_performed)) value="{{$data->nomination_performed}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Other information about the position,
                        including information about why this position cannot be filled from the local
                        labour market:

                    </td>
                    <td> <input type="text" name="nomination_position" id="nomination_position" @if(isset($data->nomination_position)) value="{{$data->nomination_position}}" @endif/> </td>
                </tr>


            </tbody>
        </table>

        <h2 class="fs-title"> QUALIFICATIONS AND EXPERIENCE NEEDED FOR THE POSITION NEEDED </h2>

        <p> Describe the qualifications, relevant skills, employment experience and
            registrations/licenses required to be held by the nominee </p>

        <table>

            <tbody>

                <tr>
                    <td> Relevant qualifications needed</td>
                    <td> <input type="text" name="qua_and_exp_relevant" id="qua_and_exp_relevant" @if(isset($data->qua_and_exp_relevant)) value="{{$data->qua_and_exp_relevant}}" @endif/> </td>
                </tr>


                <tr>
                    <td>Relevant skills needed</td>
                    <td> <input type="text" name="qua_and_exp_skills" id="qua_and_exp_skills" @if(isset($data->qua_and_exp_skills)) value="{{$data->qua_and_exp_skills}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Does the position require the applicant to
                        hold a licence, registration or professional
                        membership? If so, please specify. Also,
                        please specify if the applicant can perform
                        work under supervision of another person
                        who holds licence/registration</td>
                    <td> <input type="text" name="qua_and_exp_license" id="qua_and_exp_license" @if(isset($data->qua_and_exp_license)) value="{{$data->qua_and_exp_license}}" @endif/> </td>
                </tr>


                <tr>
                    <td>Has your business retrenched any Australian
                        citizens or Australian permanent residents in
                        the nominated occupation, or made their
                        positions redundant, in the last four months?</td>
                    <td> <input type="text" name="qua_and_exp_four_month" id="qua_and_exp_four_month" @if(isset($data->qua_and_exp_four_month)) value="{{$data->qua_and_exp_four_month}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Does your business operate in the
                        Agricultural sector?</td>
                    <td> <input type="text" name="qua_and_exp_agriculture" id="qua_and_exp_agriculture" @if(isset($data->qua_and_exp_agriculture)) value="{{$data->qua_and_exp_agriculture}}" @endif/> </td>
                </tr>

            </tbody>
        </table>


        <h2 class="fs-title"> SALARY FOR THE POSITION NEEDED </h2>

        <table>
            <tbody>

                <tr>
                    <td> What annual salary are you offering the visa
                        applicant?
                    </td>
                    <td> <input type="text" name="salary_offering_visa_applicant" id="salary_offering_visa_applicant" @if(isset($data->salary_offering_visa_applicant)) value="{{$data->salary_offering_visa_applicant}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Are there any non-monetary components of
                        the nominee’s salary?
                    </td>
                    <td>
                        <select name="salary_non_monetary" id="salary_non_monetary" class="form-control">
                            <option value=""> Select Option </option>

                            @if(!empty(isset($data->salary_non_monetary)))
                            <option value="{{$data->salary_non_monetary}}" selected>{{$data->salary_non_monetary}}</option>
                            @endif

                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>

                    </td>
                </tr>

                <tr>
                    <td> If Yes, please specify
                    </td>
                    <td> <input type="text" name="salary_offering_visa_applicant_specify" id="salary_offering_visa_applicant_specify" @if(isset($data->salary_offering_visa_applicant_specify)) value="{{$data->salary_offering_visa_applicant_specify}}" @endif/> </td>
                </tr>


                <tr>
                    <td>How many years of contract are you willing
                        to offer the visa applicant
                    </td>
                    <td>
                        <select name="salary_year_of_contract" id="salary_year_of_contract-monetary" class="form-control">
                            <option value=""> Select Option </option>

                            @if(!empty(isset($data->salary_year_of_contract)))
                            <option value="{{$data->salary_year_of_contract}}" selected>{{$data->salary_year_of_contract}}</option>
                            @endif
                            <option value="1 year"> 1 year </option>
                            <option value="2 year"> 2 year </option>
                            <option value="3 year"> 3 year </option>
                            <option value="4 year"> 4 year </option>
                        </select>

                    </td>
                </tr>


                <tr>
                    <td> What annual salary will you be offering the
                        visa applicant? Please indicate the net salary
                        offered to the applicant NOT including
                        superannuation

                    </td>
                    <td> <input type="text" name="salary_annual" id="salary_annual" @if(isset($data->salary_annual)) value="{{$data->salary_annual}}" @endif/> </td>
                </tr>

                <tr>
                    <td> How many hours per week will the applicant
                        be working (please note that a minimum of
                        38 hours per week is required)

                    </td>
                    <td> <input type="text" name="salary_hours_per_week" id="salary_hours_per_week" @if(isset($data->salary_hours_per_week)) value="{{$data->salary_hours_per_week}}" @endif/> </td>
                </tr>

                <tr>
                    <td>Are you able to indicate how you elaborated
                        the annual salary rate you are willing to
                        offer the visa applicant?

                    </td>
                    <td> <input type="text" name="salary_eloborate_annual_salary" id="salary_eloborate_annual_salary" @if(isset($data->salary_eloborate_annual_salary)) value="{{$data->salary_eloborate_annual_salary}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Do you already have an Australian citizen
                        and/or a Permanent resident working in the
                        same position offered to the visa applicant?
                    </td>
                    <td>
                        <select name="salary_permanent_resident" id="salary_permanent_resident" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->salary_permanent_resident)))
                            <option value="{{$data->salary_permanent_resident}}" selected>{{$data->salary_permanent_resident}}</option>
                            @endif

                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>

                    </td>
                </tr>

                <tr>
                    <td>If yes, please indicate the annual salary of
                        this person

                    </td>
                    <td> <input type="text" name="salary_permanent_resident_indicate" id="salary_permanent_resident_indicate" @if(isset($data->salary_permanent_resident_indicate)) value="{{$data->salary_permanent_resident_indicate}}" @endif/> </td>
                </tr>


                <tr>
                    <td> If you do have an Australian citizen and/or
                        PR resident, are you willing to pay the visa
                        applicant the same annual salary?
                    </td>
                    <td>
                        <select name="salary_citizen" id="salary_citizen" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->salary_citizen)))
                            <option value="{{$data->salary_citizen}}" selected>{{$data->salary_citizen}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>

                    </td>
                </tr>

            </tbody>
        </table>


        <h2 class="fs-title" style="margin-top: 10px;">NOMINATION – DOCS TO UPLOAD FOR THE POSITION NEEDED
        </h2>


        <table>
            <tbody>

                <tr>
                    <td> Job description/Duty Statement of the
                        position to be offered to the applicant </td>
                    <td> <input type="file" name="nomination_job_description" id="nomination_job_description">

                        @if (array_key_exists('nomination_job_description', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/nomination_job_description/'.$docdataemployerform['nomination_job_description'])  }}">
                            @if(str_contains($docdataemployerform['nomination_job_description'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/nomination_job_description/'.$docdataemployerform['nomination_job_description'])  }}" />
                            @endif
                        </a>


                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <p> Employment contract to be offered to the
            applicant. Please note the contract must
            be: </p>


        <table>
            <tbody>
                <tr>
                    <td> 1) Dated after the 28 days period of
                        the job ads </td>
                    <td> <input type="file" name="nomination_period_of_job" id="nomination_period_of_job">

                        @if (array_key_exists('nomination_period_of_job', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/nomination_period_of_job/'.$docdataemployerform['nomination_period_of_job'])  }}">
                            @if(str_contains($docdataemployerform['nomination_period_of_job'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/nomination_period_of_job/'.$docdataemployerform['nomination_period_of_job'])  }}" />
                            @endif
                        </a>


                        @endif
                    </td>
                </tr>

                <tr>
                    <td> 2) Indicate the name and surname of
                        the applicant</td>
                    <td> <input type="file" name="nomination_name_and_surname" id="nomination_name_and_surname">

                        @if (array_key_exists('nomination_name_and_surname', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/nomination_name_and_surname/'.$docdataemployerform['nomination_name_and_surname'])  }}">
                            @if(str_contains($docdataemployerform['nomination_name_and_surname'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/nomination_name_and_surname/'.$docdataemployerform['nomination_name_and_surname'])  }}" />
                            @endif
                        </a>


                        @endif
                    </td>
                </tr>

                <tr>
                    <td> 3) Indicate "upon visa approval" for
                        the Start date</td>
                    <td> <input type="file" name="nomination_start_date_doc" id="nomination_start_date_doc">


                        @if (array_key_exists('nomination_start_date_doc', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/nomination_start_date_doc/'.$docdataemployerform['nomination_start_date_doc'])  }}">
                            @if(str_contains($docdataemployerform['nomination_start_date_doc'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/nomination_start_date_doc/'.$docdataemployerform['nomination_start_date_doc'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>

                <tr>
                    <td> 4) Indicate the gross annual salary rate</td>
                    <td> <input type="file" name="nomination_gross_annual_salary" id="nomination_gross_annual_salary">

                        @if (array_key_exists('nomination_gross_annual_salary', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/nomination_gross_annual_salary/'.$docdataemployerform['nomination_gross_annual_salary'])  }}">
                            @if(str_contains($docdataemployerform['nomination_gross_annual_salary'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/nomination_gross_annual_salary/'.$docdataemployerform['nomination_gross_annual_salary'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>

                <tr>
                    <td> 5) Indicate the super annuation in
                        addition to the gross annual salary
                        rate</td>
                    <td> <input type="file" name="nomination_super_annuation" id="nomination_super_annuation">

                        @if (array_key_exists('nomination_super_annuation', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/nomination_super_annuation/'.$docdataemployerform['nomination_super_annuation'])  }}">
                            @if(str_contains($docdataemployerform['nomination_super_annuation'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/nomination_super_annuation/'.$docdataemployerform['nomination_super_annuation'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>

                <tr>
                    <td> 6) Indicate any other monetary
                        components as a separate figure to
                        the annual gross salary</td>
                    <td> <input type="file" name="nomination_separate_figure" id="nomination_separate_figure">

                        @if (array_key_exists('nomination_separate_figure', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/nomination_separate_figure/'.$docdataemployerform['nomination_separate_figure'])  }}">
                            @if(str_contains($docdataemployerform['nomination_separate_figure'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/nomination_separate_figure/'.$docdataemployerform['nomination_separate_figure'])  }}" />
                            @endif
                        </a>


                        @endif
                    </td>
                </tr>



            </tbody>
        </table>

    </div>
    <input type="hidden" name="fieldset" value="xyz" class="currentfieldset">

    @if(!Auth::user()->hasRole('consultant') && !Auth::user()->hasRole('admin') )
    <input type="button" name="save" class="save action-button" value="Save" />
    @endif
    <input type="button" name="next" class="next action-button" value="Next" />
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
</fieldset>