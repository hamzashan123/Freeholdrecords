<fieldset id="fieldsetthree">
    <div class="form-card">
        <h2 class="fs-title" style="text-align: center;">SECTION 3:</h2>

        <div class="row">
            <div class="col-7">
                <h2 class="fs-title">LABOUR MARKET TESTING </h2>
            </div>
            <div class="col-5">
                <h2 class="steps">Step 3 - 4</h2>
            </div>
        </div>

        <div class="col-12 pl-0 mt-20">

            <p>You will need to make sure that at least 3 job ads on 3 different platforms have been put
                online, under the name of the sponsoring company. Each job ad must indicate the name of
                the sponsoring company, the position to be filled, a brief description of the duties, full-time
                role, annual salary unless the annual salary to be offered is beyond $ 96.400 AUD per year. </p>

            <p> Each job ad must have run for at least 28 days and must not be older than 4 months before
                the application is submitted </p>
        </div>

        <table>

            <tbody>

                <tr>
                    <td>Have you published 3 job ads on 3 different
                        platforms (if not, please make sure to
                        update this form when the job ads will be
                        online)
                    </td>
                    <td> <input type="file" name="labour_market_different" id="labour_market_different">

                        @if (array_key_exists('labour_market_different', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/labour_market_different/'.$docdataemployerform['labour_market_different'])  }}">
                            @if(str_contains($docdataemployerform['labour_market_different'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/labour_market_different/'.$docdataemployerform['labour_market_different'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>

            </tbody>
        </table>


        <h2 class="fs-title">For Job ad n.1 WORKFORCE WEBSITE - please indicate </h2>

        <table>
            <tbody>
                <tr>
                    <td> Name of the Job ad platform n.1 (Please
                        note that Workforce is a mandatory
                        website)
                    </td>
                    <td> <input type="text" name="labour_job_n1_people" id="labour_job_n1_people" @if(isset($data->labour_job_n1_people)) value="{{$data->labour_job_n1_people}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Exact date when the job ad was put online </td>
                    <td> <input type="date" name="labour_job_n1_exact_date" id="labour_job_n1_exact_date" @if(isset($data->labour_job_n1_exact_date)) value="{{$data->labour_job_n1_exact_date}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Please confirm this job ad has been online
                        for at least 28 days or it will be by the time
                        it expires </td>
                    <td> <input type="text" name="labour_job_n1_online" id="labour_job_n1_online" @if(isset($data->labour_job_n1_online)) value="{{$data->labour_job_n1_online}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Please indicate the link to the job ad here
                    </td>
                    <td> <input type="text" name="labour_job_n1_indicate" id="labour_job_n1_indicate" @if(isset($data->labour_job_n1_indicate)) value="{{$data->labour_job_n1_indicate}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Are you able to provide a payment receipt
                        for this job ad? If yes, please make sure to
                        attach this document
                    </td>
                    <td> <input type="text" name="labour_job_n1_payment" id="labour_job_n1_payment" @if(isset($data->labour_job_n1_payment)) value="{{$data->labour_job_n1_payment}}" @endif/> </td>
                </tr>


            </tbody>
        </table>


        <h2 class="fs-title">For Job ad n.1 AFTER THE 28 DAY PERIOD please indicate
        </h2>

        <table>
            <tbody>
                <tr>
                    <td> Number of people who applied for the
                        position to be filled </td>
                    <td> <input type="text" name="labour_job_n1_after_people" id="labour_job_n1_after_people" @if(isset($data->labour_job_n1_after_people)) value="{{$data->labour_job_n1_after_people}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Number of people who were shortlisted for
                        the role </td>
                    <td> <input type="text" name="labour_job_n1_after_people_shortlisted" id="labour_job_n1_after_people_shortlisted" @if(isset($data->labour_job_n1_after_people_shortlisted)) value="{{$data->labour_job_n1_after_people_shortlisted}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Reason why no one was suitable for the role
                        and therefore you are offering the full-time
                        position to the visa applicant </td>
                    <td> <input type="text" name="labour_job_n1_after_people_suitable" id="labour_job_n1_after_people_suitable" @if(isset($data->labour_job_n1_after_people_suitable)) value="{{$data->labour_job_n1_after_people_suitable}}" @endif/> </td>
                </tr>
            </tbody>
        </table>


        <h2 class="fs-title">For Job ad n.2 please indicate
        </h2>


        <table>
            <tbody>
                <tr>
                    <td> Name of the Job ad platform n.2

                    </td>
                    <td> <input type="text" name="labour_job_n2_people" id="labour_job_n2_people" @if(isset($data->labour_job_n2_people)) value="{{$data->labour_job_n2_people}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Exact date when the job ad was put online </td>
                    <td> <input type="date" name="labour_job_n2_exact_date" id="labour_job_n2_exact_date" @if(isset($data->labour_job_n2_exact_date)) value="{{$data->labour_job_n2_exact_date}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Please confirm this job ad has been online
                        for at least 28 days or it will be by the time
                        it expires </td>
                    <td> <input type="text" name="labour_job_n2_online" id="labour_job_n2_online" @if(isset($data->labour_job_n2_online)) value="{{$data->labour_job_n2_online}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Please indicate the link to the job ad here
                    </td>
                    <td> <input type="text" name="labour_job_n2_indicate" id="labour_job_n2_indicate" @if(isset($data->labour_job_n2_indicate)) value="{{$data->labour_job_n2_indicate}}" @endif/> </td>
                </tr>

                <tr>
                    <td> Are you able to provide a payment receipt
                        for this job ad? If yes, please make sure to
                        attach this document
                    </td>
                    <td> <input type="text" name="labour_job_n2_payment" id="labour_job_n2_payment" @if(isset($data->labour_job_n2_payment)) value="{{$data->labour_job_n2_payment}}" @endif/> </td>
                </tr>


            </tbody>
        </table>


        <h2 class="fs-title">NOMINATION – DOCS TO UPLOAD FOR THE LABOR MARKET TESTING </h2>
        <h2 class="fs-title"> Job ad 1 – WORKFORCE platform </h2>
        <table>

            <tbody>

                <tr>
                    <td>Copy and paste of the link of the Job ad
                        platform
                    </td>
                    <td> <input type="file" name="workforce_1_copyandpaste" id="workforce_1_copyandpaste">

                        @if (array_key_exists('workforce_1_copyandpaste', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_1_copyandpaste/'.$docdataemployerform['workforce_1_copyandpaste'])  }}">
                            @if(str_contains($docdataemployerform['workforce_1_copyandpaste'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_1_copyandpaste/'.$docdataemployerform['workforce_1_copyandpaste'])  }}" />
                            @endif
                        </a>


                        @endif


                    </td>
                </tr>

                <tr>
                    <td>Invoice for having posted the job ad (if
                        applicable)
                    </td>
                    <td> <input type="file" name="workforce_1_invoice" id="workforce_1_invoice">



                        @if (array_key_exists('workforce_1_invoice', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_1_invoice/'.$docdataemployerform['workforce_1_invoice'])  }}">
                            @if(str_contains($docdataemployerform['workforce_1_invoice'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_1_invoice/'.$docdataemployerform['workforce_1_invoice'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>

                <tr>
                    <td>Screenshot of the job ad page
                    </td>
                    <td> <input type="file" name="workforce_1_screenshot" id="workforce_1_screenshot">


                        @if (array_key_exists('workforce_1_screenshot', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_1_screenshot/'.$docdataemployerform['workforce_1_screenshot'])  }}">
                            @if(str_contains($docdataemployerform['workforce_1_screenshot'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_1_screenshot/'.$docdataemployerform['workforce_1_screenshot'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>

                <tr>
                    <td>Any other evidence of having posted the job
                        ad
                    </td>
                    <td> <input type="file" name="workforce_1_evidence" id="workforce_1_evidence">



                        @if (array_key_exists('workforce_1_evidence', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_1_evidence/'.$docdataemployerform['workforce_1_evidence'])  }}">
                            @if(str_contains($docdataemployerform['workforce_1_evidence'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_1_evidence/'.$docdataemployerform['workforce_1_evidence'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>


            </tbody>
        </table>


        <h2 class="fs-title"> Job ad 2 </h2>

        <table>

            <tbody>

                <tr>
                    <td>Copy and paste of the link of the Job ad
                        platform
                    </td>
                    <td> <input type="file" name="workforce_2_copyandpaste" id="workforce_2_copyandpaste">


                        @if (array_key_exists('workforce_2_copyandpaste', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_2_copyandpaste/'.$docdataemployerform['workforce_2_copyandpaste'])  }}">
                            @if(str_contains($docdataemployerform['workforce_2_copyandpaste'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_2_copyandpaste/'.$docdataemployerform['workforce_2_copyandpaste'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>

                <tr>
                    <td>Invoice for having posted the job ad (if
                        applicable)
                    </td>
                    <td> <input type="file" name="workforce_2_invoice" id="workforce_2_invoice">

                        @if (array_key_exists('workforce_2_invoice', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_2_invoice/'.$docdataemployerform['workforce_2_invoice'])  }}">
                            @if(str_contains($docdataemployerform['workforce_2_invoice'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_2_invoice/'.$docdataemployerform['workforce_2_invoice'])  }}" />
                            @endif
                        </a>


                        @endif



                    </td>
                </tr>

                <tr>
                    <td>Screenshot of the job ad page
                    </td>
                    <td> <input type="file" name="workforce_2_screenshot" id="workforce_2_screenshot">

                        @if (array_key_exists('workforce_2_screenshot', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_2_screenshot/'.$docdataemployerform['workforce_2_screenshot'])  }}">
                            @if(str_contains($docdataemployerform['workforce_2_screenshot'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_2_screenshot/'.$docdataemployerform['workforce_2_screenshot'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>

                <tr>
                    <td>Any other evidence of having posted the job
                        ad
                    </td>
                    <td> <input type="file" name="workforce_2_evidence" id="workforce_2_evidence">



                        @if (array_key_exists('workforce_2_evidence', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_2_evidence/'.$docdataemployerform['workforce_2_evidence'])  }}">
                            @if(str_contains($docdataemployerform['workforce_2_evidence'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_2_evidence/'.$docdataemployerform['workforce_2_evidence'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>


            </tbody>
        </table>


        <h2 class="fs-title"> Job ad 3 </h2>

        <table>

            <tbody>

                <tr>
                    <td>Copy and paste of the link of the Job ad
                        platform
                    </td>
                    <td> <input type="file" name="workforce_3_copyandpaste" id="workforce_3_copyandpaste">

                        @if (array_key_exists('workforce_3_copyandpaste', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_3_copyandpaste/'.$docdataemployerform['workforce_3_copyandpaste'])  }}">
                            @if(str_contains($docdataemployerform['workforce_3_copyandpaste'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_3_copyandpaste/'.$docdataemployerform['workforce_3_copyandpaste'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>

                <tr>
                    <td>Invoice for having posted the job ad (if
                        applicable)
                    </td>
                    <td> <input type="file" name="workforce_3_invoice" id="workforce_3_invoice">


                        @if (array_key_exists('workforce_3_invoice', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_3_invoice/'.$docdataemployerform['workforce_3_invoice'])  }}">
                            @if(str_contains($docdataemployerform['workforce_3_invoice'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_3_invoice/'.$docdataemployerform['workforce_3_invoice'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>

                <tr>
                    <td>Screenshot of the job ad page
                    </td>
                    <td> <input type="file" name="workforce_3_screenshot" id="workforce_3_screenshot">


                        @if (array_key_exists('workforce_3_screenshot', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_3_screenshot/'.$docdataemployerform['workforce_3_screenshot'])  }}">
                            @if(str_contains($docdataemployerform['workforce_3_screenshot'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_3_screenshot/'.$docdataemployerform['workforce_3_screenshot'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>

                <tr>
                    <td>Any other evidence of having posted the job
                        ad
                    </td>
                    <td> <input type="file" name="workforce_3_evidence" id="workforce_3_evidence">



                        @if (array_key_exists('workforce_3_evidence', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_3_evidence/'.$docdataemployerform['workforce_3_evidence'])  }}">
                            @if(str_contains($docdataemployerform['workforce_3_evidence'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/workforce_3_evidence/'.$docdataemployerform['workforce_3_evidence'])  }}" />
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