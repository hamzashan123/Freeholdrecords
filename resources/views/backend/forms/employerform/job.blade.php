<fieldset id="fieldsetfour">
    <div class="form-card">
        <h2 class="fs-title" style="text-align: center;">SECTION 4:</h2>

        <div class="row">
            <div class="col-7">
                <h2 class="fs-title">- For Job ad n.2 AFTER THE 28 DAY PERIOD please indicate</h2>
            </div>
            <div class="col-5">
                <h2 class="steps">Step 4 - 4 </h2>
            </div>
        </div>

        <table>
            <tbody>
                <tr>
                    <td> Number of people who applied for the
                        position to be filled </td>
                    <td> <input type="text" name="job_n2_people" id="job_n2_people" @if(isset($data->job_n2_people)) value="{{$data->job_n2_people}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Number of people who were shortlisted for
                        the role </td>
                    <td> <input type="text" name="job_n2_people_shortlisted" id="job_n2_people_shortlisted" @if(isset($data->job_n2_people_shortlisted)) value="{{$data->job_n2_people_shortlisted}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Reason why no one was suitable for the role
                        and therefore you are offering the full-time
                        position to the visa applicant </td>
                    <td> <input type="text" name="job_n2_people_suitable" id="job_n2_people_suitable" @if(isset($data->job_n2_people_suitable)) value="{{$data->job_n2_people_suitable}}" @endif/> </td>
                </tr>
            </tbody>
        </table>

        <h2 class="fs-title">For Job ad n.3 please indicate</h2>

        <table>
            <tbody>
                <tr>
                    <td> Name of the Job ad platform n.2 </td>
                    <td> <input type="text" name="job_n3_people" id="job_n3_people" @if(isset($data->job_n3_people)) value="{{$data->job_n3_people}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Exact date when the job ad was put online </td>
                    <td> <input type="date" name="job_n3_exact_date" id="job_n3_exact_date" @if(isset($data->job_n3_exact_date)) value="{{$data->job_n3_exact_date}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Please confirm this job ad has been online
                        for at least 28 days or it will be by the time
                        it expires </td>
                    <td> <input type="text" name="job_n3_online" id="job_n3_online" @if(isset($data->job_n3_online)) value="{{$data->job_n3_online}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Please indicate the link to the job ad here
                    </td>
                    <td> <input type="text" name="job_n3_indicate" id="job_n3_indicate" @if(isset($data->job_n3_indicate)) value="{{$data->job_n3_indicate}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Are you able to provide a payment receipt
                        for this job ad? If yes, please make sure to
                        attach this document
                    </td>
                    <td> <input type="text" name="job_n3_payment" id="job_n3_payment" @if(isset($data->job_n3_payment)) value="{{$data->job_n3_payment}}" @endif/> </td>
                </tr>


            </tbody>
        </table>

        <h2 class="fs-title">For Job ad n.3 AFTER THE 28 DAY PERIOD please indicate</h2>

        <table>
            <tbody>
                <tr>
                    <td> Number of people who applied for the
                        position to be filled </td>
                    <td> <input type="text" name="job_n3_after_people" id="job_n3_after_people" @if(isset($data->job_n3_after_people)) value="{{$data->job_n3_after_people}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Number of people who were shortlisted for
                        the role </td>
                    <td> <input type="text" name="job_n3_after_people_shortlisted" id="job_n3_after_people_shortlisted" @if(isset($data->job_n3_after_people_shortlisted)) value="{{$data->job_n3_after_people_shortlisted}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Reason why no one was suitable for the role
                        and therefore you are offering the full-time
                        position to the visa applicant </td>
                    <td> <input type="text" name="job_n3_after_people_suitable" id="job_n3_after_people_suitable" @if(isset($data->job_n3_after_people_suitable)) value="{{$data->job_n3_after_people_suitable}}" @endif/> </td>
                </tr>
            </tbody>
        </table>

    </div>
  
    <input type="hidden" name="formsubmitemail" value="" id="formsubmitemail"/>
    <!-- <input type="button" name="next" class="next action-button" value="Submit" /> -->
    
    @if(!empty($data->is_email_sent) != true)
    <button name="formsubmit" class="next action-button submitemployerform" > Submit</button>
    @else
    <input type="button" name="save" class="save action-button" value="Save" />
    @endif
 
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
   
</fieldset>