<fieldset id="fieldsetfourteen">
@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('consultant'))
                    <a id="pdffamilymember" class="btn btn-primary" style="text-align:center;color:white; margin-bottom:20px;">Generate Pdf</a>
                    @endif
    <div class="form-card">
        <h2 class="fs-title" style="text-align: center;">SECTION 14:</h2>

        <div class="row">
            <div class="col-7">
                <h2 class="fs-title">Family Members </h2>
            </div>
            <div class="col-5">
                <h2 class="steps">Step 14 - 14</h2>
            </div>
        </div>




        <table>
            <tbody>
                <tr>
                    <td> Do you have a partner?
                    </td>
                    <td> <input type="text" name="fam_member" id="fam_member" @if(isset($data->fam_member)) value="{{$data->fam_member}}" @endif /> </td>
                </tr>

                <tr>
                    <td> Will your partner included in this visa application?
                    </td>
                    <td> <input type="text" name="fam_member_visa" id="fam_member_visa" @if(isset($data->fam_member_visa)) value="{{$data->fam_member_visa}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Do you have children?</td>
                    <td> <input type="text" name="fam_member_children" id="fam_member_children" @if(isset($data->fam_member_children)) value="{{$data->fam_member_children}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Will your child including in your visa application?
                    </td>
                    <td> <input type="text" name="fam_member_child_visa" id="fam_member_child_visa" @if(isset($data->fam_member_child_visa)) value="{{$data->fam_member_child_visa}}" @endif/> </td>
                </tr>

            </tbody>
        </table>


        <h2 class="fs-title"> YOUR PARTNER </h2>


        <table>
            <tbody>
                <tr>
                    <td> Name and surname
                    </td>
                    <td> <input type="text" name="fam_member_name" id="fam_member_name" @if(isset($data->fam_member_name)) value="{{$data->fam_member_name}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Date of birth
                    </td>
                    <td> <input type="date" name="fam_member_dob" id="fam_member_dob" @if(isset($data->fam_member_dob)) value="{{$data->fam_member_dob}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Place of birth </td>
                    <td> <input type="text" name="fam_member_pob" id="fam_member_pob" @if(isset($data->fam_member_pob)) value="{{$data->fam_member_pob}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Nationality
                    </td>
                    <td> <input type="text" name="fam_member_nationality" id="fam_member_nationality" @if(isset($data->fam_member_nationality)) value="{{$data->fam_member_nationality}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Other nationalities
                    </td>
                    <td> <input type="text" name="fam_member_other_nationality" id="fam_member_other_nationality" @if(isset($data->fam_member_other_nationality)) value="{{$data->fam_member_other_nationality}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever suffered of severe illness, or do you
                        take any prescribed medication? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_ever_suffered" id="fam_member_ever_suffered" @if(isset($data->fam_member_ever_suffered)) value="{{$data->fam_member_ever_suffered}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever been convicted of a crime or are
                        awaiting legal action on any other matter, even if no
                        longer indicated on the police check or other
                        equivalent documents? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_legal_action" id="fam_member_legal_action" @if(isset($data->fam_member_legal_action)) value="{{$data->fam_member_legal_action}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Is this person included in the visa application?
                    </td>
                    <td> <input type="text" name="fam_member_visa_application" id="fam_member_visa_application" @if(isset($data->fam_member_visa_application)) value="{{$data->fam_member_visa_application}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Where does this person currently live?
                    </td>
                    <td> <input type="text" name="fam_member_currently_live" id="fam_member_currently_live" @if(isset($data->fam_member_currently_live)) value="{{$data->fam_member_currently_live}}" @endif/> </td>
                </tr>

            </tbody>
        </table>


        <h2 class="fs-title"> YOUR CHILD/CHILDREN </h2>


        <table>
            <tbody>
                <tr>
                    <td> Name and surname
                    </td>
                    <td> <input type="text" name="fam_member_child_nam1e" id="fam_member_child_name1" @if(isset($data->fam_member_child_name1)) value="{{$data->fam_member_child_name1}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Date of birth
                    </td>
                    <td> <input type="date" name="fam_member_child_dob1" id="fam_member_child_dob1" @if(isset($data->fam_member_child_dob1)) value="{{$data->fam_member_child_dob1}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Place of birth </td>
                    <td> <input type="text" name="fam_member_child_pob1" id="fam_member_child_pob1" @if(isset($data->fam_member_child_pob1)) value="{{$data->fam_member_child_pob1}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Nationality
                    </td>
                    <td> <input type="text" name="fam_member_child_nationality1" id="fam_member_child_nationality1" @if(isset($data->fam_member_child_nationality1)) value="{{$data->fam_member_child_nationality1}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Other nationalities
                    </td>
                    <td> <input type="text" name="fam_member_child_other_nationality1" id="fam_member_child_other_nationality1" @if(isset($data->fam_member_child_other_nationality1)) value="{{$data->fam_member_child_other_nationality1}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever suffered of severe illness, or do you
                        take any prescribed medication? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_child_ever_suffered1" id="fam_member_child_ever_suffered1" @if(isset($data->fam_member_child_ever_suffered1)) value="{{$data->fam_member_child_ever_suffered1}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever been convicted of a crime or are
                        awaiting legal action on any other matter, even if no
                        longer indicated on the police check or other
                        equivalent documents? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_child_legal_action1" id="fam_member_child_legal_action1" @if(isset($data->fam_member_child_legal_action1)) value="{{$data->fam_member_child_legal_action1}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Is this person included in the visa application?
                    </td>
                    <td> <input type="text" name="fam_member_child_visa_application1" id="fam_member_child_visa_application1" @if(isset($data->fam_member_child_visa_application1)) value="{{$data->fam_member_child_visa_application1}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Where does this person currently live?
                    </td>
                    <td> <input type="text" name="fam_member_child_currently_live1" id="fam_member_child_currently_live1" @if(isset($data->fam_member_child_currently_live1)) value="{{$data->fam_member_child_currently_live1}}" @endif/> </td>
                </tr>

            </tbody>
        </table>

        <table>
            <tbody>
                <tr>
                    <td> Name and surname
                    </td>
                    <td> <input type="text" name="fam_member_child_nam2e" id="fam_member_child_name2" @if(isset($data->fam_member_child_name2)) value="{{$data->fam_member_child_name2}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Date of birth
                    </td>
                    <td> <input type="date" name="fam_member_child_dob2" id="fam_member_child_dob2" @if(isset($data->fam_member_child_dob2)) value="{{$data->fam_member_child_dob2}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Place of birth </td>
                    <td> <input type="text" name="fam_member_child_pob2" id="fam_member_child_pob2" @if(isset($data->fam_member_child_pob2)) value="{{$data->fam_member_child_pob2}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Nationality
                    </td>
                    <td> <input type="text" name="fam_member_child_nationality2" id="fam_member_child_nationality2" @if(isset($data->fam_member_child_nationality2)) value="{{$data->fam_member_child_nationality2}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Other nationalities
                    </td>
                    <td> <input type="text" name="fam_member_child_other_nationality2" id="fam_member_child_other_nationality2" @if(isset($data->fam_member_child_other_nationality2)) value="{{$data->fam_member_child_other_nationality2}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever suffered of severe illness, or do you
                        take any prescribed medication? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_child_ever_suffered2" id="fam_member_child_ever_suffered2" @if(isset($data->fam_member_child_ever_suffered2)) value="{{$data->fam_member_child_ever_suffered2}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever been convicted of a crime or are
                        awaiting legal action on any other matter, even if no
                        longer indicated on the police check or other
                        equivalent documents? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_child_legal_action2" id="fam_member_child_legal_action2" @if(isset($data->fam_member_child_legal_action2)) value="{{$data->fam_member_child_legal_action2}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Is this person included in the visa application?
                    </td>
                    <td> <input type="text" name="fam_member_child_visa_application2" id="fam_member_child_visa_application2" @if(isset($data->fam_member_child_visa_application2)) value="{{$data->fam_member_child_visa_application2}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Where does this person currently live?
                    </td>
                    <td> <input type="text" name="fam_member_child_currently_live2" id="fam_member_child_currently_live2" @if(isset($data->fam_member_child_currently_live2)) value="{{$data->fam_member_child_currently_live2}}" @endif/> </td>
                </tr>

            </tbody>
        </table>


        <table>
            <tbody>
                <tr>
                    <td> Name and surname
                    </td>
                    <td> <input type="text" name="fam_member_child_name3" id="fam_member_child_name3" @if(isset($data->fam_member_child_name3)) value="{{$data->fam_member_child_name3}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Date of birth
                    </td>
                    <td> <input type="date" name="fam_member_child_dob3" id="fam_member_child_dob3" @if(isset($data->fam_member_child_dob3)) value="{{$data->fam_member_child_dob3}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Place of birth </td>
                    <td> <input type="text" name="fam_member_child_pob3" id="fam_member_child_pob3" @if(isset($data->fam_member_child_pob3)) value="{{$data->fam_member_child_pob3}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Nationality
                    </td>
                    <td> <input type="text" name="fam_member_child_nationality3" id="fam_member_child_nationality3" @if(isset($data->fam_member_child_nationality3)) value="{{$data->fam_member_child_nationality3}}" @endif> </td>
                </tr>

                <tr>
                    <td> Other nationalities
                    </td>
                    <td> <input type="text" name="fam_member_child_other_nationality3" id="fam_member_child_other_nationality3" @if(isset($data->fam_member_child_other_nationality3)) value="{{$data->fam_member_child_other_nationality3}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever suffered of severe illness, or do you
                        take any prescribed medication? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_child_ever_suffered3" id="fam_member_child_ever_suffered3" @if(isset($data->fam_member_child_ever_suffered3)) value="{{$data->fam_member_child_ever_suffered3}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever been convicted of a crime or are
                        awaiting legal action on any other matter, even if no
                        longer indicated on the police check or other
                        equivalent documents? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_child_legal_action3" id="fam_member_child_legal_action3" @if(isset($data->fam_member_child_legal_action3)) value="{{$data->fam_member_child_legal_action3}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Is this person included in the visa application?
                    </td>
                    <td> <input type="text" name="fam_member_child_visa_application3" id="fam_member_child_visa_application3" @if(isset($data->fam_member_child_visa_application3)) value="{{$data->fam_member_child_visa_application3}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Where does this person currently live?
                    </td>
                    <td> <input type="text" name="fam_member_child_currently_live3" id="fam_member_child_currently_live3" @if(isset($data->fam_member_child_currently_live3)) value="{{$data->fam_member_child_currently_live3}}" @endif/> </td>
                </tr>

            </tbody>
        </table>


        <table>
            <tbody>
                <tr>
                    <td> Name and surname
                    </td>
                    <td> <input type="text" name="fam_member_child_name4" id="fam_member_child_name4" @if(isset($data->fam_member_child_name4)) value="{{$data->fam_member_child_name4}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Date of birth
                    </td>
                    <td> <input type="date" name="fam_member_child_dob4" id="fam_member_child_dob4" @if(isset($data->fam_member_child_dob4)) value="{{$data->fam_member_child_dob4}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Place of birth </td>
                    <td> <input type="text" name="fam_member_child_pob4" id="fam_member_child_pob4" @if(isset($data->fam_member_child_pob4)) value="{{$data->fam_member_child_pob4}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Nationality
                    </td>
                    <td> <input type="text" name="fam_member_child_nationality4" id="fam_member_child_nationality4" @if(isset($data->fam_member_child_nationality4)) value="{{$data->fam_member_child_nationality4}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Other nationalities
                    </td>
                    <td> <input type="text" name="fam_member_child_other_nationality4" id="fam_member_child_other_nationality4" @if(isset($data->fam_member_child_other_nationality4)) value="{{$data->fam_member_child_other_nationality4}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever suffered of severe illness, or do you
                        take any prescribed medication? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_child_ever_suffered4" id="fam_member_child_ever_suffered4" @if(isset($data->fam_member_child_ever_suffered4)) value="{{$data->fam_member_child_ever_suffered4}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever been convicted of a crime or are
                        awaiting legal action on any other matter, even if no
                        longer indicated on the police check or other
                        equivalent documents? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_child_legal_action4" id="fam_member_child_legal_action4" @if(isset($data->fam_member_child_legal_action4)) value="{{$data->fam_member_child_legal_action4}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Is this person included in the visa application?
                    </td>
                    <td> <input type="text" name="fam_member_child_visa_application4" id="fam_member_child_visa_application4" @if(isset($data->fam_member_child_visa_application4)) value="{{$data->fam_member_child_visa_application4}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Where does this person currently live?
                    </td>
                    <td> <input type="text" name="fam_member_child_currently_live4" id="fam_member_child_currently_live4" @if(isset($data->fam_member_child_currently_live4)) value="{{$data->fam_member_child_currently_live4}}" @endif/> </td>
                </tr>

            </tbody>
        </table>

        <h2 class="fs-title"> FATHER </h2>

        <table>
            <tbody>
                <tr>
                    <td> Name and surname
                    </td>
                    <td> <input type="text" name="fam_member_father_name" id="fam_member_father_name" @if(isset($data->fam_member_father_name)) value="{{$data->fam_member_father_name}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Date of birth
                    </td>
                    <td> <input type="date" name="fam_member_father_dob" id="fam_member_father_dob" @if(isset($data->fam_member_father_dob)) value="{{$data->fam_member_father_dob}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Place of birth </td>
                    <td> <input type="text" name="fam_member_father_pob" id="fam_member_father_pob" @if(isset($data->fam_member_father_pob)) value="{{$data->fam_member_father_pob}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Nationality
                    </td>
                    <td> <input type="text" name="fam_member_father_nationality" id="fam_member_father_nationality" @if(isset($data->fam_member_father_nationality)) value="{{$data->fam_member_father_nationality}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Other nationalities
                    </td>
                    <td> <input type="text" name="fam_member_father_other_nationality" id="fam_member_father_other_nationality" @if(isset($data->fam_member_father_other_nationality)) value="{{$data->fam_member_father_other_nationality}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever suffered of severe illness, or do you
                        take any prescribed medication? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_father_ever_suffered" id="fam_member_father_ever_suffered" @if(isset($data->fam_member_father_ever_suffered)) value="{{$data->fam_member_father_ever_suffered}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever been convicted of a crime or are
                        awaiting legal action on any other matter, even if no
                        longer indicated on the police check or other
                        equivalent documents? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_father_legal_action" id="fam_member_father_legal_action" @if(isset($data->fam_member_father_legal_action)) value="{{$data->fam_member_father_legal_action}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Is this person included in the visa application?
                    </td>
                    <td> <input type="text" name="fam_member_father_visa_application" id="fam_member_father_visa_application" @if(isset($data->fam_member_father_visa_application)) value="{{$data->fam_member_father_visa_application}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Where does this person currently live?
                    </td>
                    <td> <input type="text" name="fam_member_father_currently_live" id="fam_member_father_currently_live" @if(isset($data->fam_member_father_currently_live)) value="{{$data->fam_member_father_currently_live}}" @endif/> </td>
                </tr>

            </tbody>
        </table>

        <h2 class="fs-title"> MOTHER </h2>

        <table>
            <tbody>
                <tr>
                    <td> Name and surname
                    </td>
                    <td> <input type="text" name="fam_member_mother_name" id="fam_member_mother_name" @if(isset($data->fam_member_mother_name)) value="{{$data->fam_member_mother_name}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Date of birth
                    </td>
                    <td> <input type="date" name="fam_member_mother_dob" id="fam_member_mother_dob" @if(isset($data->fam_member_mother_dob)) value="{{$data->fam_member_mother_dob}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Place of birth </td>
                    <td> <input type="text" name="fam_member_mother_pob" id="fam_member_mother_pob" @if(isset($data->fam_member_mother_pob)) value="{{$data->fam_member_mother_pob}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Nationality
                    </td>
                    <td> <input type="text" name="fam_member_mother_nationality" id="fam_member_mother_nationality" @if(isset($data->fam_member_mother_nationality)) value="{{$data->fam_member_mother_nationality}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Other nationalities
                    </td>
                    <td> <input type="text" name="fam_member_mother_other_nationality" id="fam_member_mother_other_nationality" @if(isset($data->fam_member_mother_other_nationality)) value="{{$data->fam_member_mother_other_nationality}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever suffered of severe illness, or do you
                        take any prescribed medication? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_mother_ever_suffered" id="fam_member_mother_ever_suffered" @if(isset($data->fam_member_mother_ever_suffered)) value="{{$data->fam_member_mother_ever_suffered}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever been convicted of a crime or are
                        awaiting legal action on any other matter, even if no
                        longer indicated on the police check or other
                        equivalent documents? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_mother_legal_action" id="fam_member_mother_legal_action" @if(isset($data->fam_member_mother_legal_action)) value="{{$data->fam_member_mother_legal_action}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Is this person included in the visa application?
                    </td>
                    <td> <input type="text" name="fam_member_mother_visa_application" id="fam_member_mother_visa_application" @if(isset($data->fam_member_mother_visa_application)) value="{{$data->fam_member_mother_visa_application}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Where does this person currently live?
                    </td>
                    <td> <input type="text" name="fam_member_mother_currently_live" id="fam_member_mother_currently_live" @if(isset($data->fam_member_mother_currently_live)) value="{{$data->fam_member_mother_currently_live}}" @endif/> </td>
                </tr>

            </tbody>
        </table>


        <h2 class="fs-title"> BROTHER/SISTER </h2>

        <table>
            <tbody>
                <tr>
                    <td> Name and surname
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_name1" id="fam_member_bro_sis_name1" @if(isset($data->fam_member_bro_sis_name1)) value="{{$data->fam_member_bro_sis_name1}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Date of birth
                    </td>
                    <td> <input type="date" name="fam_member_bro_sis_dob1" id="fam_member_bro_sis_dob1" @if(isset($data->fam_member_bro_sis_dob1)) value="{{$data->fam_member_bro_sis_dob1}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Place of birth </td>
                    <td> <input type="text" name="fam_member_bro_sis_pob1" id="fam_member_bro_sis_pob1" @if(isset($data->fam_member_bro_sis_pob1)) value="{{$data->matrix_name_and_surnfam_member_bro_sis_pob1ame}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Nationality
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_nationality1" id="fam_member_bro_sis_nationality1" @if(isset($data->fam_member_bro_sis_nationality1)) value="{{$data->fam_member_bro_sis_nationality1}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Other nationalities
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_other_nationality1" id="fam_member_bro_sis_other_nationality1" @if(isset($data->fam_member_bro_sis_other_nationality1)) value="{{$data->fam_member_bro_sis_other_nationality1}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever suffered of severe illness, or do you
                        take any prescribed medication? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_ever_suffered1" id="fam_member_bro_sis_ever_suffered1" @if(isset($data->fam_member_bro_sis_ever_suffered1)) value="{{$data->fam_member_bro_sis_ever_suffered1}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever been convicted of a crime or are
                        awaiting legal action on any other matter, even if no
                        longer indicated on the police check or other
                        equivalent documents? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_legal_action1" id="fam_member_bro_sis_legal_action1" @if(isset($data->fam_member_bro_sis_legal_action1)) value="{{$data->fam_member_bro_sis_legal_action1}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Is this person included in the visa application?
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_visa_application1" id="fam_member_bro_sis_visa_application1" @if(isset($data->fam_member_bro_sis_visa_application1)) value="{{$data->fam_member_bro_sis_visa_application1}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Where does this person currently live?
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_currently_live1" id="fam_member_bro_sis_currently_live1" @if(isset($data->fam_member_bro_sis_currently_live1)) value="{{$data->fam_member_bro_sis_currently_live1}}" @endif/> </td>
                </tr>

            </tbody>
        </table>


        <table>
            <tbody>
                <tr>
                    <td> Name and surname
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_name2" id="fam_member_bro_sis_name2" @if(isset($data->fam_member_bro_sis_name2)) value="{{$data->fam_member_bro_sis_name2}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Date of birth
                    </td>
                    <td> <input type="date" name="fam_member_bro_sis_dob2" id="fam_member_bro_sis_dob2" @if(isset($data->fam_member_bro_sis_dob2)) value="{{$data->fam_member_bro_sis_dob2}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Place of birth </td>
                    <td> <input type="text" name="fam_member_bro_sis_pob2" id="fam_member_bro_sis_pob2" @if(isset($data->fam_member_bro_sis_pob2)) value="{{$data->fam_member_bro_sis_pob2}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Nationality
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_nationality2" id="fam_member_bro_sis_nationality2" @if(isset($data->fam_member_bro_sis_nationality2)) value="{{$data->fam_member_bro_sis_nationality2}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Other nationalities
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_other_nationality2" id="fam_member_bro_sis_other_nationality2" @if(isset($data->fam_member_bro_sis_other_nationality2)) value="{{$data->fam_member_bro_sis_other_nationality2}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever suffered of severe illness, or do you
                        take any prescribed medication? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_ever_suffered2" id="fam_member_bro_sis_ever_suffered2" @if(isset($data->fam_member_bro_sis_ever_suffered2)) value="{{$data->fam_member_bro_sis_ever_suffered2}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever been convicted of a crime or are
                        awaiting legal action on any other matter, even if no
                        longer indicated on the police check or other
                        equivalent documents? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_legal_action2" id="fam_member_bro_sis_legal_action2" @if(isset($data->fam_member_bro_sis_legal_action2)) value="{{$data->fam_member_bro_sis_legal_action2}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Is this person included in the visa application?
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_visa_application2" id="fam_member_bro_sis_visa_application2" @if(isset($data->fam_member_bro_sis_visa_application2)) value="{{$data->fam_member_bro_sis_visa_application2}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Where does this person currently live?
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_currently_live2" id="fam_member_bro_sis_currently_live2" @if(isset($data->fam_member_bro_sis_currently_live2)) value="{{$data->fam_member_bro_sis_currently_live2}}" @endif/> </td>
                </tr>

            </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    <td> Name and surname
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_name3" id="fam_member_bro_sis_name3" @if(isset($data->fam_member_bro_sis_name3)) value="{{$data->fam_member_bro_sis_name3}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Date of birth
                    </td>
                    <td> <input type="date" name="fam_member_bro_sis_dob3" id="fam_member_bro_sis_dob3" @if(isset($data->fam_member_bro_sis_dob3)) value="{{$data->fam_member_bro_sis_dob3}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Place of birth </td>
                    <td> <input type="text" name="fam_member_bro_sis_pob3" id="fam_member_bro_sis_pob3" @if(isset($data->fam_member_bro_sis_pob3)) value="{{$data->fam_member_bro_sis_pob3}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Nationality
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_nationality3" id="fam_member_bro_sis_nationality3" @if(isset($data->fam_member_bro_sis_nationality3)) value="{{$data->fam_member_bro_sis_nationality3}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Other nationalities
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_other_nationality3" id="fam_member_bro_sis_other_nationality3" @if(isset($data->fam_member_bro_sis_other_nationality3)) value="{{$data->fam_member_bro_sis_other_nationality3}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever suffered of severe illness, or do you
                        take any prescribed medication? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_ever_suffered3" id="fam_member_bro_sis_ever_suffered3" @if(isset($data->fam_member_bro_sis_ever_suffered3)) value="{{$data->fam_member_bro_sis_ever_suffered3}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever been convicted of a crime or are
                        awaiting legal action on any other matter, even if no
                        longer indicated on the police check or other
                        equivalent documents? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_legal_action3" id="fam_member_bro_sis_legal_action3" @if(isset($data->fam_member_bro_sis_legal_action3)) value="{{$data->fam_member_bro_sis_legal_action3}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Is this person included in the visa application?
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_visa_application3" id="fam_member_bro_sis_visa_application3" @if(isset($data->fam_member_bro_sis_visa_application3)) value="{{$data->fam_member_bro_sis_visa_application3}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Where does this person currently live?
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_currently_live3" id="fam_member_bro_sis_currently_live3" @if(isset($data->fam_member_bro_sis_currently_live3)) value="{{$data->fam_member_bro_sis_currently_live3}}" @endif/> </td>
                </tr>

            </tbody>
        </table>

        <table>
            <tbody>
                <tr>
                    <td> Name and surname
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_name4" id="fam_member_bro_sis_name4" @if(isset($data->fam_member_bro_sis_name4)) value="{{$data->fam_member_bro_sis_name4}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Date of birth
                    </td>
                    <td> <input type="date" name="fam_member_bro_sis_dob4" id="fam_member_bro_sis_dob4" @if(isset($data->fam_member_bro_sis_dob4)) value="{{$data->fam_member_bro_sis_dob4}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Place of birth </td>
                    <td> <input type="text" name="fam_member_bro_sis_pob4" id="fam_member_bro_sis_pob4" @if(isset($data->fam_member_bro_sis_pob4)) value="{{$data->fam_member_bro_sis_pob4}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Nationality
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_nationality4" id="fam_member_bro_sis_nationality4" @if(isset($data->fam_member_bro_sis_nationality4)) value="{{$data->fam_member_bro_sis_nationality4}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Other nationalities
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_other_nationality4" id="fam_member_bro_sis_other_nationality4" @if(isset($data->fam_member_bro_sis_other_nationality4)) value="{{$data->fam_member_bro_sis_other_nationality4}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever suffered of severe illness, or do you
                        take any prescribed medication? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_ever_suffered4" id="fam_member_bro_sis_ever_suffered4" @if(isset($data->fam_member_bro_sis_ever_suffered4)) value="{{$data->fam_member_bro_sis_ever_suffered4}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Have you ever been convicted of a crime or are
                        awaiting legal action on any other matter, even if no
                        longer indicated on the police check or other
                        equivalent documents? If so, please specify
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_legal_action4" id="fam_member_bro_sis_legal_action4" @if(isset($data->fam_member_bro_sis_legal_action4)) value="{{$data->fam_member_bro_sis_legal_action4}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Is this person included in the visa application?
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_visa_application4" id="fam_member_bro_sis_visa_application4" @if(isset($data->fam_member_bro_sis_visa_application4)) value="{{$data->fam_member_bro_sis_visa_application4}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Where does this person currently live?
                    </td>
                    <td> <input type="text" name="fam_member_bro_sis_currently_live4" id="fam_member_bro_sis_currently_live4" @if(isset($data->fam_member_bro_sis_currently_live4)) value="{{$data->fam_member_bro_sis_currently_live4}}" @endif/> </td>
                </tr>

            </tbody>
        </table>


    </div>
   
   
    <!-- <input type="button" name="next" class="next action-button" value="Submit" /> -->
        @if(!empty($data->is_email_sent) != true)
        <button name="formsubmit" class="next action-button submitform360" > Submit</button>
        @else
        <input type="button" name="save" class="save action-button" value="Save" />
        @endif
    
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
    
</fieldset>