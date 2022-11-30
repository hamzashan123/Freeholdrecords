<fieldset id="fieldsetthirteen">
@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('consultant'))
                    <a id="pdfcharacter" class="btn btn-primary" style="text-align:center;color:white; margin-bottom:20px;">Generate Pdf</a>
                    @endif
    <div class="form-card">
        <h2 class="fs-title" style="text-align: center;">SECTION 13:</h2>

        <div class="row">
            <div class="col-7">
                <h2 class="fs-title">- CHARACTER – GENERAL QUESTIONS </h2>
            </div>
            <div class="col-5">
                <h2 class="steps">Step 13 - 14</h2>
            </div>
        </div>

        <table>
            <tbody>

                <tr>
                    <td> 1) Has any applicant ever been charged with any
                        offence that is currently awaiting legal action? </td>
                    <td>
                        <select name="character_legal_action" id="character_legal_action" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_legal_action)))
                            <option value="{{$data->character_legal_action}}" selected>{{$data->character_legal_action}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td> 2) Has any applicant ever been convicted of an
                        offence in any country (including any conviction
                        which is now removed from official records)? </td>
                    <td>
                        <select name="character_official_record" id="character_official_record" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_official_record)))
                            <option value="{{$data->character_official_record}}" selected>{{$data->character_official_record}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> 3) Has any applicant ever been the subject of an
                        arrest warrant or Interpol notice? </td>
                    <td>
                        <select name="character_interpol_notice1" id="character_interpol_notice1" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_interpol_notice1)))
                            <option value="{{$data->character_interpol_notice1}}" selected>{{$data->character_interpol_notice1}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> 4) Has any applicant ever been the subject of an
                        arrest warrant or Interpol notice?
                    </td>
                    <td>
                        <select name="character_interpol_notice2" id="character_interpol_notice2" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_interpol_notice2)))
                            <option value="{{$data->character_interpol_notice2}}" selected>{{$data->character_interpol_notice2}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td> 5) Has any applicant ever been found guilty of a
                        sexually based offence involving a child (including
                        where no conviction was recorded)?
                    </td>
                    <td>
                        <select name="character_sexually" id="character_sexually" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_sexually)))
                            <option value="{{$data->character_sexually}}" selected>{{$data->character_sexually}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> 6) Has any applicant ever been named on a sex
                        offender register?
                    </td>
                    <td>
                        <select name="character_offender" id="character_offender" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_offender)))
                            <option value="{{$data->character_offender}}" selected>{{$data->character_offender}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td> 7) Has any applicant ever been acquitted of any
                        offence on the grounds of unsoundness of mind
                        or insanity?
                    </td>
                    <td>
                        <select name="character_unsoundness" id="character_unsoundness" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_unsoundness)))
                            <option value="{{$data->character_unsoundness}}" selected>{{$data->character_unsoundness}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td> 8) Has any applicant ever been found by a court not
                        fit to plead?
                    </td>
                    <td>
                        <select name="character_plead1" id="character_plead1" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_plead1)))
                            <option value="{{$data->character_plead1}}" selected>{{$data->character_plead1}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td> 9) Has any applicant ever been found by a court not
                        fit to plead?

                    </td>
                    <td>
                        <select name="character_plead2" id="character_plead2" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_plead2)))
                            <option value="{{$data->character_plead2}}" selected>{{$data->character_plead2}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> 10) Has any applicant ever been directly or indirectly
                        involved in, or associated with, activities which
                        would represent a risk to national security in
                        Australia or New Zealand or any other country??

                    </td>
                    <td>
                        <select name="character_associated" id="character_associated" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_associated)))
                            <option value="{{$data->character_associated}}" selected>{{$data->character_associated}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td> 11) Has any applicant ever been charged with, or
                        indicted for: genocide, war crimes, crimes against
                        humanity, torture, slavery, or any other crime
                        that is otherwise of a serious international
                        concern?

                    </td>
                    <td>
                        <select name="character_genocide" id="character_genocide" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_genocide)))
                            <option value="{{$data->character_genocide}}" selected>{{$data->character_genocide}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td> 12) acts of violence (including war, insurgency,
                        freedom fighting, terrorism, protest) either
                        overseas or in Australia or New Zealand?

                    </td>
                    <td>
                        <select name="character_terrorism" id="character_terrorism" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_terrorism)))
                            <option value="{{$data->character_terrorism}}" selected>{{$data->character_terrorism}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> 13) Has any applicant ever served in a military force,
                        police force, state sponsored / private militia or
                        intelligence agency (including secret police)?

                    </td>
                    <td>
                        <select name="character_private_militia" id="character_private_militia" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_private_militia)))
                            <option value="{{$data->character_private_militia}}" selected>{{$data->character_private_militia}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> 14) explosives or in the manufacture of
                        chemical/biological products?

                    </td>
                    <td>
                        <select name="character_biological" id="character_biological" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_biological)))
                            <option value="{{$data->character_biological}}" selected>{{$data->character_biological}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> 15) Has any applicant ever undergone any
                        military/paramilitary training, been trained in
                        weapons/</td>
                    <td>
                        <select name="character_training" id="character_training" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_training)))
                            <option value="{{$data->character_training}}" selected>{{$data->character_training}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td> 16) Has any applicant ever been involved in people
                        smuggling or people trafficking offences?
                    </td>
                    <td>
                        <select name="character_offences" id="character_offences" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_offences)))
                            <option value="{{$data->character_offences}}" selected>{{$data->character_offences}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> 17) Has any applicant ever been removed, deported
                        or excluded from any country (including Australia
                        or New Zealand)?
                    </td>
                    <td>
                        <select name="character_deported" id="character_deported" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_deported)))
                            <option value="{{$data->character_deported}}" selected>{{$data->character_deported}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> 18) Has any applicant ever overstayed a visa in any
                        country (including Australia or New Zealand)?
                    </td>
                    <td>
                        <select name="character_overstayed" id="character_overstayed" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_overstayed)))
                            <option value="{{$data->character_overstayed}}" selected>{{$data->character_overstayed}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> 19) Has any applicant ever had any outstanding debts
                        to the Australia or New Zealandn Government or
                        any public authority in Australia or New Zealand?
                    </td>
                    <td>
                        <select name="character_authority" id="character_authority" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->character_authority)))
                            <option value="{{$data->character_authority}}" selected>{{$data->character_authority}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td> If you answered YES to any questions, indicate YES, specify
                        what question number refers to you and provide further
                        details in the following box:

                    </td>
                    <td>
                        <input type="text" name="character_refer_to_you" id="character_refer_to_you" @if(isset($data->character_refer_to_you)) value="{{$data->character_refer_to_you}}" @endif
                        />
                    </td>
                </tr>


            </tbody>
        </table>


        <table>
            <tbody>

                <tr>
                    <td> During their proposed visit to Australia or New Zealand, do
                        you expect to incur medical costs, or require treatment or
                        medical follow up for: </td>
                    <td>
                        <select name="healthquestion_medicalcosts" id="healthquestion_medicalcosts" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_medicalcosts)))
                            <option value="{{$data->healthquestion_medicalcosts}}" selected>{{$data->healthquestion_medicalcosts}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td> 1) Blood disorder </td>
                    <td>
                        <select name="healthquestion_blood" id="healthquestion_blood" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_blood)))
                            <option value="{{$data->healthquestion_blood}}" selected>{{$data->healthquestion_blood}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>

                    </td>
                </tr>

                <tr>
                    <td> 2) Cancer
                    </td>
                    <td>

                        <select name="healthquestion_cancer" id="healthquestion_cancer" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_cancer)))
                            <option value="{{$data->healthquestion_cancer}}" selected>{{$data->healthquestion_cancer}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td> 3) Heart disease </td>
                    <td>
                        <select name="healthquestion_heart" id="healthquestion_heart" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_heart)))
                            <option value="{{$data->healthquestion_heart}}" selected>{{$data->healthquestion_heart}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>


                    </td>
                </tr>

                <tr>
                    <td> 4) Hepatitis B or C and/or liver disease </td>
                    <td>

                        <select name="healthquestion_hepatitis" id="healthquestion_hepatitis" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_hepatitis)))
                            <option value="{{$data->healthquestion_hepatitis}}" selected>{{$data->healthquestion_hepatitis}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>


                    </td>
                </tr>

                <tr>
                    <td> 5) HIV infection, including AIDS </td>
                    <td>

                        <select name="healthquestion_hiv" id="healthquestion_hiv" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_hiv)))
                            <option value="{{$data->healthquestion_hiv}}" selected>{{$data->healthquestion_hiv}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> 6) Kidney disease, including dialysis </td>
                    <td>


                        <select name="healthquestion_kidney" id="healthquestion_kidney" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_kidney)))
                            <option value="{{$data->healthquestion_kidney}}" selected>{{$data->healthquestion_kidney}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>

                    </td>
                </tr>

                <tr>
                    <td> 7) Mental illness</td>
                    <td>

                        <select name="healthquestion_mental" id="healthquestion_mental" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_mental)))
                            <option value="{{$data->healthquestion_mental}}" selected>{{$data->healthquestion_mental}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>

                    </td>
                </tr>

                <tr>
                    <td> 8) Pregnancy </td>
                    <td>
                        <select name="healthquestion_pregnancy" id="healthquestion_pregnancy" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_pregnancy)))
                            <option value="{{$data->healthquestion_pregnancy}}" selected>{{$data->healthquestion_pregnancy}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>


                    </td>
                </tr>

                <tr>
                    <td> 9) Respiratory disease that has required hospital
                        admission or oxygen therapy </td>
                    <td>

                        <select name="healthquestion_respiratory1" id="healthquestion_respiratory1" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_respiratory1)))
                            <option value="{{$data->healthquestion_respiratory1}}" selected>{{$data->healthquestion_respiratory1}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> 10) Respiratory disease that has required hospital
                        admission or oxygen therapy </td>
                    <td>
                        <select name="healthquestion_respiratory1" id="healthquestion_respiratory1" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_respiratory1)))
                            <option value="{{$data->healthquestion_respiratory1}}" selected>{{$data->healthquestion_respiratory1}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>

                    </td>
                </tr>

                <tr>
                    <td> 11) Do you require assistance with mobility or care
                        due to a medical condition? </td>
                    <td>

                        <select name="healthquestion_medical_condition" id="healthquestion_medical_condition" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_medical_condition)))
                            <option value="{{$data->healthquestion_medical_condition}}" selected>{{$data->healthquestion_medical_condition}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>



                    </td>
                </tr>


                <tr>
                    <td> If you answered YES to any questions, indicate YES, specify
                        what question number refers to you and provide further
                        details in the following box:
                    </td>
                    <td> <input type="text" name="healthquestion_question_number_if_yes" id="healthquestion_question_number_if_yes" @if(isset($data->healthquestion_question_number_if_yes)) value="{{$data->healthquestion_question_number_if_yes}}" @endif
                        /> </td>
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