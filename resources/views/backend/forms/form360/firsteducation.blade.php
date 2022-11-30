<fieldset id="fieldsetthree">
@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('consultant'))
                    <a id="pdffirst_education" class="btn btn-primary" style="text-align:center;color:white; margin-bottom:20px;">Generate Pdf</a>
                    @endif

    <div class="form-card">
        <h2 class="fs-title" style="text-align: center;">SECTION 3:</h2>

        <div class="row">
            <div class="col-7">
                <h2 class="fs-title">FIRST EDUCATION</h2>
            </div>
            <div class="col-5">
                <h2 class="steps">Step 3 - 14</h2>
            </div>
        </div>

        <h2 class="fs-title">EDUCATION HISTORY – INFO
        </h2>
        <p>Indicate what is your highest recognised qualification obtained </p>


        <table>
            <tbody>
                <tr>
                    <td>
                        Indicate what is your highest recognised
                        qualification obtained

                    </td>

                    <td>
                        <select name="first_education_qualification_obtained" id="first_education_qualification_obtained" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->first_education_qualification_obtained)))
                            <option value="{{$data->first_education_qualification_obtained}}" selected>{{$data->first_education_qualification_obtained}}</option>
                            @endif
                            <option value="PHD"> PHD </option>
                            <option value="Masters Degree"> Masters Degree </option>
                            <option value="Bachelor Degree"> Bachelor Degree </option>
                            <option value="Vocational diploma"> Vocational diploma </option>
                            <option value="High School diploma"> High School diploma </option>
                            <option value="Other"> Other </option>

                        </select>
                    </td>
                </tr>
            </tbody>
        </table>

        <h2 class="fs-title">EDUCATION BACKGROUND
        </h2>
        <p>PRIMARY SCHOOL or equivalent </p>

        <table>
            <tbody>
                <tr>
                    <td> Name Of the School </td>
                    <td> <input type="text" name="firstedu_background_nameofschool" id="firstedu_background_nameofschool" @if(isset($data->firstedu_background_nameofschool)) value="{{$data->firstedu_background_nameofschool}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Full address
                    </td>
                    <td> <input type="text" name="firstedu_background_fulladdress" id="firstedu_background_fulladdress" @if(isset($data->firstedu_background_fulladdress)) value="{{$data->firstedu_background_fulladdress}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Date course started

                    </td>
                    <td> <input type="date" name="firstedu_background_datecoursesstarted" id="firstedu_background_datecoursesstarted" @if(isset($data->firstedu_background_datecoursesstarted)) value="{{$data->firstedu_background_datecoursesstarted}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Date course ended

                    </td>
                    <td> <input type="date" name="firstedu_background_datecoursesended" id="firstedu_background_datecoursesended" @if(isset($data->firstedu_background_datecoursesended)) value="{{$data->firstedu_background_datecoursesended}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Year obtained

                    </td>
                    <td> <input type="date" name="firstedu_background_yearobt" id="firstedu_background_yearobt" @if(isset($data->firstedu_background_yearobt)) value="{{$data->firstedu_background_yearobt}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Legal duration of the course


                    </td>
                    <td> <input type="date" name="firstedu_background_legal_duration" id="firstedu_background_legal_duration" @if(isset($data->firstedu_background_legal_duration)) value="{{$data->firstedu_background_legal_duration}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Qualification obtained



                    </td>
                    <td> <input type="date" name="firstedu_background_qualification_obtained" id="firstedu_background_qualification_obtained" @if(isset($data->firstedu_background_qualification_obtained)) value="{{$data->firstedu_background_qualification_obtained}}" @endif/>
                    </td>
                </tr>


            </tbody>
        </table>

        <h2 class="fs-title">MIDDLE SCHOOL or equivalent</h2>


        <table>
            <tbody>
                <tr>
                    <td> Name Of the School </td>
                    <td> <input type="text" name="firstedu_middle_nameofschool" id="firstedu_middle_nameofschool" @if(isset($data->firstedu_middle_nameofschool)) value="{{$data->firstedu_middle_nameofschool}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Full address
                    </td>
                    <td> <input type="text" name="firstedu_middle_fulladdress" id="firstedu_middle_fulladdress" @if(isset($data->firstedu_middle_fulladdress)) value="{{$data->firstedu_middle_fulladdress}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Date course started

                    </td>
                    <td> <input type="date" name="firstedu_middle_datecoursesstarted" id="firstedu_middle_datecoursesstarted" @if(isset($data->firstedu_middle_datecoursesstarted)) value="{{$data->firstedu_middle_datecoursesstarted}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Date course ended

                    </td>
                    <td> <input type="date" name="firstedu_middle_datecoursesended" id="firstedu_middle_datecoursesended" @if(isset($data->firstedu_middle_datecoursesended)) value="{{$data->firstedu_middle_datecoursesended}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Year obtained

                    </td>
                    <td> <input type="date" name="firstedu_middle_yearobt" id="firstedu_middle_yearobt" @if(isset($data->firstedu_middle_yearobt)) value="{{$data->firstedu_middle_yearobt}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Legal duration of the course


                    </td>
                    <td> <input type="date" name="firstedu_middle_legal_duration" id="firstedu_middle_legal_duration" @if(isset($data->firstedu_middle_legal_duration)) value="{{$data->firstedu_middle_legal_duration}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Qualification obtained



                    </td>
                    <td> <input type="date" name="firstedu_middle_qualification_obtained" id="firstedu_middle_qualification_obtained" @if(isset($data->firstedu_middle_qualification_obtained)) value="{{$data->firstedu_middle_qualification_obtained}}" @endif/>
                    </td>
                </tr>


            </tbody>
        </table>


        <h2 class="fs-title">HIGH SCHOOL or equivalent
        </h2>


        <table>
            <tbody>
                <tr>
                    <td> Name Of the School </td>
                    <td> <input type="text" name="firstedu_high_nameofschool" id="firstedu_high_nameofschool" @if(isset($data->firstedu_high_nameofschool)) value="{{$data->firstedu_high_nameofschool}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Full address
                    </td>
                    <td> <input type="text" name="firstedu_high_fulladdress" id="firstedu_high_fulladdress" @if(isset($data->firstedu_high_fulladdress)) value="{{$data->firstedu_high_fulladdress}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Date course started

                    </td>
                    <td> <input type="date" name="firstedu_high_datecoursesstarted" id="firstedu_high_datecoursesstarted" @if(isset($data->firstedu_high_datecoursesstarted)) value="{{$data->firstedu_high_datecoursesstarted}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Date course ended

                    </td>
                    <td> <input type="date" name="firstedu_high_datecoursesended" id="firstedu_high_datecoursesended" @if(isset($data->firstedu_high_datecoursesended)) value="{{$data->firstedu_high_datecoursesended}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Year obtained

                    </td>
                    <td> <input type="date" name="firstedu_high_yearobt" id="firstedu_high_yearobt" @if(isset($data->firstedu_high_yearobt)) value="{{$data->firstedu_high_yearobt}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Legal duration of the course


                    </td>
                    <td> <input type="date" name="firstedu_high_legal_duration" id="firstedu_high_legal_duration" @if(isset($data->firstedu_high_legal_duration)) value="{{$data->firstedu_high_legal_duration}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Qualification obtained



                    </td>
                    <td> <input type="date" name="firstedu_high_qualification_obtained" id="firstedu_high_qualification_obtained" @if(isset($data->firstedu_high_qualification_obtained)) value="{{$data->firstedu_high_qualification_obtained}}" @endif/>
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