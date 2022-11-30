<fieldset id="fieldseteight">
@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('consultant'))
                    <a id="pdfvisahistory" class="btn btn-primary" style="text-align:center;color:white; margin-bottom:20px;">Generate Pdf</a>
                    @endif
    <div class="form-card">
        <h2 class="fs-title" style="text-align: center;">SECTION 8:</h2>

        <div class="row">
            <div class="col-7">
                <h2 class="fs-title">VISA HISTORY QUESTIONS</h2>
            </div>
            <div class="col-5">
                <h2 class="steps">Step 8 - 14</h2>
            </div>
        </div>



        <h2 class="fs-title">CURRENT VISA DETAILS</h2>
        <table>
            <tbody>

                <tr>
                    <td>Are you currently in Australia or New Zealand
                    </td>
                    <td>
                        <select name="currentvisa_in_aus_nz" id="currentvisa_in_aus_nz" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->currentvisa_in_aus_nz)))
                            <option value="{{$data->currentvisa_in_aus_nz}}" selected>{{$data->currentvisa_in_aus_nz}}</option>
                            @endif

                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Do you hold a visa to Australia or New Zealand?
                    </td>
                    <td>
                        <select name="currentvisa_hold_aus_nz" id="currentvisa_hold_aus_nz" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->currentvisa_hold_aus_nz)))
                            <option value="{{$data->currentvisa_hold_aus_nz}}" selected>{{$data->currentvisa_hold_aus_nz}}</option>
                            @endif

                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>

                        </select>
                    </td>
                </tr>


                <tr>
                    <td>If yes, what type of visa do you hold?
                    </td>
                    <td>
                        <input type="text" name="currentvisa_typeofvisa" id="currentvisa_typeofvisa" @if(isset($data->currentvisa_typeofvisa)) value="{{$data->currentvisa_typeofvisa}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Are you waiting for a visa to Australia or New
                        Zealand to be finalized?

                    </td>
                    <td>
                        <select name="currentvisa_waiting_for_visa" id="currentvisa_waiting_for_visa" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->currentvisa_waiting_for_visa)))
                            <option value="{{$data->currentvisa_waiting_for_visa}}" selected>{{$data->currentvisa_waiting_for_visa}}</option>
                            @endif

                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>If yes, what type of visa are you waiting to be
                        finalized?
                    </td>
                    <td>
                        <input type="text" name="currentvisa_typeofvisawaiting" id="currentvisa_typeofvisawaiting" @if(isset($data->currentvisa_typeofvisawaiting)) value="{{$data->currentvisa_typeofvisawaiting}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td>Date of expiry of your current visa? (if
                        applicable)

                    </td>
                    <td>
                        <input type="date" name="currentvisa_dateofexpiry" id="currentvisa_dateofexpiry" @if(isset($data->currentvisa_dateofexpiry)) value="{{$data->currentvisa_dateofexpiry}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Have you ever had a visa for Australia or New
                        Zealand or any other country refused or
                        cancelled?If so, please specify
                    </td>
                    <td>
                        <input type="text" name="currentvisa_ever_had_visa" id="currentvisa_ever_had_visa" @if(isset($data->currentvisa_ever_had_visa)) value="{{$data->currentvisa_ever_had_visa}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td>Do you hold or have you ever held a visa to any
                        other country, other than Australia or New
                        Zealand? sa to Australia or New Zealand or any
                        other country?

                    </td>
                    <td>
                        <select name="currentvisa_held_visa" id="currentvisa_held_visa" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->currentvisa_held_visa)))
                            <option value="{{$data->currentvisa_held_visa}}" selected>{{$data->currentvisa_held_visa}}</option>
                            @endif

                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>If yes, please indicate the countries you have
                        held or hold a visa for
                    </td>
                    <td>
                        <input type="text" name="currentvisa_indicate_countries" id="currentvisa_indicate_countries" @if(isset($data->currentvisa_indicate_countries)) value="{{$data->currentvisa_indicate_countries}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Have you ever been in Australia or New Zealand
                        or any other country and Have you ever had any
                        visa issues, not complied with visa conditions or
                        have departed outside their authorised period
                        of stay, in any country, Australia or New
                        Zealand or non in Australia or New Zealand? If
                        yes, please specify the country and the type of
                        issue

                    </td>
                    <td>
                        <input type="text" name="currentvisa_complied_with_visa_conditions" id="currentvisa_complied_with_visa_conditions" @if(isset($data->currentvisa_complied_with_visa_conditions)) value="{{$data->currentvisa_complied_with_visa_conditions}}" @endif/>
                    </td>
                </tr>


            </tbody>
        </table>


        <h2 class="fs-title">VISA HISTORY – DOCS TO UPLAOD</h2>

        <p> Upload each current and/or previous visas to Australia or New Zealand </p>

        <table>
            <tbody>

                <table>
                    <tbody>

                        <tr>
                            <td> Current visa to Australia or New Zealand (if
                                applicable)
                            </td>
                            <td> <input type="file" name="currentvisa_aus_naz_if_applicable" id="currentvisa_aus_naz_if_applicable"  >
                            @if (array_key_exists('currentvisa_aus_naz_if_applicable', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/currentvisa_aus_naz_if_applicable/'.$docdataForm360['currentvisa_aus_naz_if_applicable'])  }}">
                                                               @if(str_contains($docdataForm360['currentvisa_aus_naz_if_applicable'] , '.pdf'))
                                                                <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/currentvisa_aus_naz_if_applicable/'.$docdataForm360['currentvisa_aus_naz_if_applicable'])  }}"  />
                                                               @endif
                                                               </a>
                                                                                                    
                                                                                                      
                                                           @endif     
                        </td>
                        </tr>

                        <tr>
                            <td> Previous visas to Australia or New Zealand (if
                                applicable)
                            </td>
                            <td> <input type="file" name="previous_visa_if_applicable1" id="previous_visa_if_applicable1"  >
                            @if (array_key_exists('previous_visa_if_applicable1', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/previous_visa_if_applicable1/'.$docdataForm360['previous_visa_if_applicable1'])  }}">
                                                               @if(str_contains($docdataForm360['previous_visa_if_applicable1'] , '.pdf'))
                                                                <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/previous_visa_if_applicable1/'.$docdataForm360['previous_visa_if_applicable1'])  }}"  />
                                                               @endif
                                                               </a>
                                                                                                    
                                                                                                      
                                                           @endif     
                        </td>
                        </tr>

                        <tr>
                            <td> Previous visas to Australia or New Zealand (if
                                applicable)

                            </td>
                            <td> <input type="file" name="previous_visa_if_applicable2" id="previous_visa_if_applicable2" >
                            @if (array_key_exists('previous_visa_if_applicable2', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/previous_visa_if_applicable2/'.$docdataForm360['previous_visa_if_applicable2'])  }}">
                                                               @if(str_contains($docdataForm360['previous_visa_if_applicable2'] , '.pdf'))
                                                                <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/previous_visa_if_applicable2/'.$docdataForm360['previous_visa_if_applicable2'])  }}"  />
                                                               @endif
                                                               </a>
                                                                                                    
                                                                                                      
                                                           @endif     
                        </td>
                        </tr>


                    </tbody>
                </table>


            </tbody>
        </table>





    </div>
    @if(!Auth::user()->hasRole('consultant') && !Auth::user()->hasRole('admin') )
    <input type="button" name="save" class="save action-button" value="Save" />
    @endif
    <input type="button" name="next" class="next action-button" value="Next" />
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
</fieldset>