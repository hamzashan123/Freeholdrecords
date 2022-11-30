<fieldset id="fieldsettwelve">
@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('consultant'))
                    <a id="pdfhealthquestion" class="btn btn-primary" style="text-align:center;color:white; margin-bottom:20px;">Generate Pdf</a>
                    @endif
    <div class="form-card">
        <h2 class="fs-title" style="text-align: center;">SECTION 12:</h2>

        <div class="row">
            <div class="col-7">
                <h2 class="fs-title">- HEALTH QUESTIONS</h2>
            </div>
            <div class="col-5">
                <h2 class="steps">Step 12 - 14</h2>
            </div>
        </div>

        <table>
            <tbody>

                <tr>
                    <td> 1) Does any applicant intend to enter a hospital or a
                        health care facility (including nursing homes)
                        while in Australia or New Zealand? </td>
                    <td>
                        <select name="healthquestion_aus_or_nz" id="healthquestion_aus_or_nz" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_aus_or_nz)))
                            <option value="{{$data->healthquestion_aus_or_nz}}" selected>{{$data->healthquestion_aus_or_nz}}</option>
                            @endif

                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td> 2) Does any applicant intend to work as, or study to
                        be a doctor, dentist, nurse or paramedic during
                        their stay in Australia or New Zealand? </td>
                    <td>

                        <select name="healthquestion_paramedic" id="healthquestion_paramedic" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_paramedic)))
                            <option value="{{$data->healthquestion_paramedic}}" selected>{{$data->healthquestion_paramedic}}</option>
                            @endif

                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> 3) Does any applicant intend to work or be a trainee
                        at a childcare centre (including preschools and
                        creches) while in Australia or New Zealand? </td>
                    <td>
                        <select name="healthquestion_childcare" id="healthquestion_childcare" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_childcare)))
                            <option value="{{$data->healthquestion_childcare}}" selected>{{$data->healthquestion_childcare}}</option>
                            @endif

                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>

                    </td>
                </tr>


                <tr>
                    <td> 4) Does any applicant intend to be in a classroom
                        situation for more than 3 months (eg. as either a
                        student, teacher, lecturer or observer)? </td>
                    <td>

                        <select name="healthquestion_classroom" id="healthquestion_classroom" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_classroom)))
                            <option value="{{$data->healthquestion_classroom}}" selected>{{$data->healthquestion_classroom}}</option>
                            @endif

                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> 5) Ever had, or currently have, tuberculosis? </td>
                    <td>

                        <select name="healthquestion_tuberculosis" id="healthquestion_tuberculosis" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_tuberculosis)))
                            <option value="{{$data->healthquestion_tuberculosis}}" selected>{{$data->healthquestion_tuberculosis}}</option>
                            @endif

                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> 6) been in close contact with a family member that
                        has active tuberculosis? </td>
                    <td>
                        <select name="healthquestion_familymember_tuberculosis" id="healthquestion_familymember_tuberculosis" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_familymember_tuberculosis)))
                            <option value="{{$data->healthquestion_familymember_tuberculosis}}" selected>{{$data->healthquestion_familymember_tuberculosis}}</option>
                            @endif

                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>




                    </td>
                </tr>

                <tr>
                    <td> 7) ever had a chest x-ray which showed an
                        abnormality? </td>
                    <td>

                        <select name="healthquestion_xray" id="healthquestion_xray" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_xray)))
                            <option value="{{$data->healthquestion_xray}}" selected>{{$data->healthquestion_xray}}</option>
                            @endif

                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> If you answered YES to any questions, indicate YES, specify
                        what question number refers to you and provide further
                        details in the following box:</td>
                    <td>
                        <select name="healthquestion_indicate_if_yes" id="healthquestion_indicate_if_yes" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_indicate_if_yes)))
                            <option value="{{$data->healthquestion_indicate_if_yes}}" selected>{{$data->healthquestion_indicate_if_yes}}</option>
                            @endif

                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>


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
                    <td>

                        <select name="healthquestion_question_number_if_yes" id="healthquestion_question_number_if_yes" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->healthquestion_question_number_if_yes)))
                            <option value="{{$data->healthquestion_question_number_if_yes}}" selected>{{$data->healthquestion_question_number_if_yes}}</option>
                            @endif

                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
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