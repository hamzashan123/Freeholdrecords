<fieldset id="fieldsetfour">
@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('consultant'))
                    <a id="pdfhighleveleducation" class="btn btn-primary" style="text-align:center;color:white; margin-bottom:20px;">Generate Pdf</a>
                    @endif

    <div class="form-card">
        <h2 class="fs-title" style="text-align: center;">SECTION 4:</h2>

        <div class="row">
            <div class="col-7">
                <h2 class="fs-title">HIGHER LEVEL QUALIFICATION (UNIVERISITY / VOCATIONAL QUALIFICATIONS)
                </h2>
            </div>
            <div class="col-5">
                <h2 class="steps">Step 4 - 14</h2>
            </div>
        </div>

        <p>Indicate all relevant qualifications obtained and that are relevant to the sector for your visa or skills assessment
            application</p>

        <p>Please start with your highest qualification obtained </p>

        <h2 class="fs-title">QUALIFICATIONS 1
        </h2>

        <table>

            <tbody>

                <tr>
                    <td> Name of University/Institute </td>
                    <td> <input type="text" name="higher_level_qualification1_nameofuniversity" id="higher_level_qualification1_nameofuniversity" @if(isset($data->higher_level_qualification1_nameofuniversity)) value="{{$data->higher_level_qualification1_nameofuniversity}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Is this a university or vocational level qualification?
                    </td>
                    <td>
                        <select name="higher_level_vocational_level_qualification1" id="higher_level_vocational_level_qualification1" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->higher_level_vocational_level_qualification1)))
                            <option value="{{$data->higher_level_vocational_level_qualification1}}" selected>{{$data->higher_level_vocational_level_qualification1}}</option>
                            @endif

                            <option value="University Level"> University Level </option>
                            <option value="Vocational/Professional Level"> Vocational/Professional Level </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> Full address of the education provider
                    </td>
                    <td> <input type="text" name="higher_level__qualification1_education_provider" id="higher_level__qualification1_education_provider" @if(isset($data->higher_level__qualification1_education_provider)) value="{{$data->higher_level__qualification1_education_provider}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Name of exact qualification obtained in the official
                        language
                    </td>
                    <td> <input type="text" name="higher_level_qualifciation1_official_languages" id="higher_level_qualifciation1_official_languages" @if(isset($data->higher_level_qualifciation1_official_languages)) value="{{$data->higher_level_qualifciation1_official_languages}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Name of the qualification obtained in English
                    </td>
                    <td> <input type="text" name="higher_level_qualification1_english" id="higher_level_qualification1_english" @if(isset($data->higher_level_qualification1_english)) value="{{$data->higher_level_qualification1_english}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Course duration

                    </td>
                    <td> <input type="text" name="higher_level_qualification1_course_duration" id="higher_level_qualification1_course_duration" @if(isset($data->higher_level_qualification1_course_duration)) value="{{$data->higher_level_qualification1_course_duration}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Date course started

                    </td>
                    <td> <input type="date" name="higher_level_qualification1_course_started" id="higher_level_qualification1_course_started" @if(isset($data->higher_level_qualification1_course_started)) value="{{$data->higher_level_qualification1_course_started}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Date course extension_loaded

                    </td>
                    <td> <input type="date" name="higher_level_qualification1_course_ended" id="higher_level_qualification1_course_ended" @if(isset($data->higher_level_qualification1_course_ended)) value="{{$data->higher_level_qualification1_course_ended}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Was the course studied full-time or part-time


                    </td>
                    <td> <input type="text" name="higher_level_qualification1_full_part" id="higher_level_qualification1_full_part" @if(isset($data->higher_level_qualification1_full_part)) value="{{$data->higher_level_qualification1_full_part}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Was this qualification obtained through course of
                        study or via RPL?


                    </td>
                    <td> <input type="text" name="higher_level_qualification1_courseofstudy" id="higher_level_qualification1_courseofstudy" @if(isset($data->higher_level_qualification1_courseofstudy)) value="{{$data->higher_level_qualification1_courseofstudy}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Country where you studied


                    </td>
                    <td> <input type="text" name="higher_level_qualification1_country" id="higher_level_qualification1_country" @if(isset($data->higher_level_qualification1_country)) value="{{$data->higher_level_qualification1_country}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Was a thesis or final project required to end the
                        course? If so, specify the title of the thesis/project



                    </td>
                    <td> <input type="text" name="higher_level_qualification1_thesis_project" id="higher_level_qualification1_thesis_project" @if(isset($data->higher_level_qualification1_thesis_project)) value="{{$data->higher_level_qualification1_thesis_project}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Indicate the number of weeks (even if approximate)
                        studied to complete the thesis/project



                    </td>
                    <td> <input type="text" name="higher_level_qualification1_thesis_project_if" id="higher_level_qualification1_thesis_project_if" @if(isset($data->higher_level_qualification1_thesis_project_if)) value="{{$data->higher_level_qualification1_thesis_project_if}}" @endif/>
                    </td>
                </tr>

            </tbody>
        </table>

        <h2 class="fs-title" style="margin-top: 10px;">DOCS FOR HIGHER QUALIFICATION 1
        </h2>
        <p style="color:red">Attachments must be colour scans of the original document and uploaded in PDF format only. Please consolidate all
            multipage files into one PDF document for each attachment type. Maximum PDF file size is 3MB per PDF.
            Unnecessary additional documents will cause delays in processing. </p>

        <table>
            <tbody>
                <tr>
                    <td> Qualification – Diploma/Award Certificate
                    </td>
                    <td> <input type="file" name="higher_level_qualification1_diploma_award" id="higher_level_qualification1_diploma_award">
                    @if (array_key_exists('higher_level_qualification1_diploma_award', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/higher_level_qualification1_diploma_award/'.$docdataForm360['higher_level_qualification1_diploma_award'])  }}">
                                                               @if(str_contains($docdataForm360['higher_level_qualification1_diploma_award'] , '.pdf'))
                                                               <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/higher_level_qualification1_diploma_award/'.$docdataForm360['higher_level_qualification1_diploma_award'])  }}"  />
                                                               @endif
                                                               </a>
                                                             
                                                               
                                                           @endif
                
                
                </td>
                </tr>

                <tr>
                    <td> List of exams taken

                    </td>
                    <td> <input type="file" name="higher_level_qualification1_listofexams" id="higher_level_qualification1_listofexams">
                
                    @if (array_key_exists('higher_level_qualification1_listofexams', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/higher_level_qualification1_listofexams/'.$docdataForm360['higher_level_qualification1_listofexams'])  }}">
                                                               @if(str_contains($docdataForm360['higher_level_qualification1_listofexams'] , '.pdf'))
                                                               <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/higher_level_qualification1_listofexams/'.$docdataForm360['higher_level_qualification1_listofexams'])  }}"  />
                                                               @endif
                                                               </a>
                                                             
                                                               
                                                           @endif
                </td>
                </tr>

                <tr>
                    <td> Diploma Supplement


                    </td>
                    <td> <input type="file" name="higher_level_qualification1_diploma_supplement" id="higher_level_qualification1_diploma_supplement" >
                    @if (array_key_exists('higher_level_qualification1_diploma_supplement', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/higher_level_qualification1_diploma_supplement/'.$docdataForm360['higher_level_qualification1_diploma_supplement'])  }}">
                                                               @if(str_contains($docdataForm360['higher_level_qualification1_diploma_supplement'] , '.pdf'))
                                                               <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/higher_level_qualification1_diploma_supplement/'.$docdataForm360['higher_level_qualification1_diploma_supplement'])  }}"  />
                                                               @endif
                                                               </a>
                                                             
                                                               
                                                           @endif
                
                </td>
                </tr>
            </tbody>
        </table>

        <h2 class="fs-title">QUALIFICATIONS 2
        </h2>

        <table>

            <tbody>

                <tr>
                    <td> Name of University/Institute </td>
                    <td> <input type="text" name="higher_level_qualification2_nameofuniversity" id="higher_level_qualification2_nameofuniversity" @if(isset($data->higher_level_qualification2_nameofuniversity)) value="{{$data->higher_level_qualification2_nameofuniversity}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Is this a university or vocational level qualification?
                    </td>
                    <td>
                        <select name="higher_level_vocational_level_qualification2" id="higher_level_vocational_level_qualification2" class="form-control">
                            <option value=""> Select Option </option>

                            @if(!empty(isset($data->higher_level_vocational_level_qualification2)))
                            <option value="{{$data->higher_level_vocational_level_qualification2}}" selected>{{$data->higher_level_vocational_level_qualification2}}</option>
                            @endif
                            <option value="University Level"> University Level </option>
                            <option value="Vocational/Professional Level"> Vocational/Professional Level </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> Full address of the education provider
                    </td>
                    <td> <input type="text" name="higher_level__qualification2_education_provider" id="higher_level__qualification2_education_provider" @if(isset($data->higher_level__qualification2_education_provider)) value="{{$data->higher_level__qualification2_education_provider}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Name of exact qualification obtained in the official
                        language
                    </td>
                    <td> <input type="text" name="higher_level_qualifciation2_official_languages" id="higher_level_qualifciation2_official_languages" @if(isset($data->higher_level_qualifciation2_official_languages)) value="{{$data->higher_level_qualifciation2_official_languages}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Name of the qualification obtained in English
                    </td>
                    <td> <input type="text" name="higher_level_qualification2_english" id="higher_level_qualification2_english" @if(isset($data->higher_level_qualification2_english)) value="{{$data->higher_level_qualification2_english}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Course duration

                    </td>
                    <td> <input type="text" name="higher_level_qualification2_course_duration" id="higher_level_qualification2_course_duration" @if(isset($data->higher_level_qualification2_course_duration)) value="{{$data->higher_level_qualification2_course_duration}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Date course started

                    </td>
                    <td> <input type="date" name="higher_level_qualification2_course_started" id="higher_level_qualification2_course_started" @if(isset($data->higher_level_qualification2_course_started)) value="{{$data->higher_level_qualification2_course_started}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Date course extension_loaded

                    </td>
                    <td> <input type="date" name="higher_level_qualification2_course_ended" id="higher_level_qualification2_course_ended" @if(isset($data->higher_level_qualification2_course_ended)) value="{{$data->higher_level_qualification2_course_ended}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Was the course studied full-time or part-time


                    </td>
                    <td> <input type="text" name="higher_level_qualification2_full_part" id="higher_level_qualification2_full_part" @if(isset($data->higher_level_qualification2_full_part)) value="{{$data->higher_level_qualification2_full_part}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Was this qualification obtained through course of
                        study or via RPL?


                    </td>
                    <td> <input type="text" name="higher_level_qualification2_courseofstudy" id="higher_level_qualification2_courseofstudy" @if(isset($data->higher_level_qualification2_courseofstudy)) value="{{$data->higher_level_qualification2_courseofstudy}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Country where you studied


                    </td>
                    <td> <input type="text" name="higher_level_qualification2_country" id="higher_level_qualification2_country" @if(isset($data->higher_level_qualification2_country)) value="{{$data->higher_level_qualification2_country}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Was a thesis or final project required to end the
                        course? If so, specify the title of the thesis/project



                    </td>
                    <td> <input type="text" name="higher_level_qualification2_thesis_project" id="higher_level_qualification2_thesis_project" @if(isset($data->higher_level_qualification2_thesis_project)) value="{{$data->higher_level_qualification2_thesis_project}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Indicate the number of weeks (even if approximate)
                        studied to complete the thesis/project



                    </td>
                    <td> <input type="text" name="higher_level_qualification2_thesis_project_if" id="higher_level_qualification2_thesis_project_if" @if(isset($data->higher_level_qualification2_thesis_project_if)) value="{{$data->higher_level_qualification2_thesis_project_if}}" @endif/>
                    </td>
                </tr>

            </tbody>
        </table>

        <h2 class="fs-title" style="margin-top: 10px;">DOCS FOR HIGHER QUALIFICATION 2
        </h2>
        <p style="color:red">Attachments must be colour scans of the original document and uploaded in PDF format only. Please consolidate all
            multipage files into one PDF document for each attachment type. Maximum PDF file size is 3MB per PDF.
            Unnecessary additional documents will cause delays in processing. </p>

        <table>
            <tbody>
                <tr>
                    <td> Qualification – Diploma/Award Certificate
                    </td>
                    <td> <input type="file" name="higher_level_qualification2_diploma_award" id="higher_level_qualification2_diploma_award">
                    @if (array_key_exists('higher_level_qualification2_diploma_award', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/higher_level_qualification2_diploma_award/'.$docdataForm360['higher_level_qualification2_diploma_award'])  }}">
                                                               @if(str_contains($docdataForm360['higher_level_qualification2_diploma_award'] , '.pdf'))
                                                               <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/higher_level_qualification2_diploma_award/'.$docdataForm360['higher_level_qualification2_diploma_award'])  }}"  />
                                                               @endif
                                                               </a>
                                                             
                                                               
                                                           @endif
                
                </td>
                </tr>

                <tr>
                    <td> List of exams taken

                    </td>
                    <td> <input type="file" name="higher_level_qualification2_listofexams" id="higher_level_qualification2_listofexams">
                    @if (array_key_exists('higher_level_qualification2_listofexams', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/higher_level_qualification2_listofexams/'.$docdataForm360['higher_level_qualification2_listofexams'])  }}">
                                                               @if(str_contains($docdataForm360['higher_level_qualification2_listofexams'] , '.pdf'))
                                                               <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/higher_level_qualification2_listofexams/'.$docdataForm360['higher_level_qualification2_listofexams'])  }}"  />
                                                               @endif
                                                               </a>
                                                             
                                                               
                                                           @endif
                
                </td>
                </tr>

                <tr>
                    <td> Diploma Supplement


                    </td>
                    <td> <input type="file" name="higher_level_qualification2_diploma_supplement" id="higher_level_qualification2_diploma_supplement">
                
                    @if (array_key_exists('higher_level_qualification2_diploma_supplement', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/higher_level_qualification2_diploma_supplement/'.$docdataForm360['higher_level_qualification2_diploma_supplement'])  }}">
                                                               @if(str_contains($docdataForm360['higher_level_qualification2_diploma_supplement'] , '.pdf'))
                                                               <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/higher_level_qualification2_diploma_supplement/'.$docdataForm360['higher_level_qualification2_diploma_supplement'])  }}"  />
                                                               @endif
                                                               </a>
                                                             
                                                               
                                                           @endif
                
                </td>
                </tr>
            </tbody>
        </table>

        <h2 class="fs-title">QUALIFICATIONS 3
        </h2>


        <table>

            <tbody>

                <tr>
                    <td> Name of University/Institute </td>
                    <td> <input type="text" name="higher_level_qualification3_nameofuniversity" id="higher_level_qualification3_nameofuniversity" @if(isset($data->higher_level_qualification3_nameofuniversity)) value="{{$data->higher_level_qualification3_nameofuniversity}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Is this a university or vocational level qualification?
                    </td>
                    <td>
                        <select name="higher_level_vocational_level_qualification3" id="higher_level_vocational_level_qualification3" class="form-control">
                            <option value=""> Select Option </option>

                            @if(!empty(isset($data->higher_level_vocational_level_qualification3)))
                            <option value="{{$data->higher_level_vocational_level_qualification3}}" selected>{{$data->higher_level_vocational_level_qualification3}}</option>
                            @endif



                            <option value="University Level"> University Level </option>
                            <option value="Vocational/Professional Level"> Vocational/Professional Level </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> Full address of the education provider
                    </td>
                    <td> <input type="text" name="higher_level__qualification3_education_provider" id="higher_level__qualification3_education_provider" @if(isset($data->higher_level__qualification3_education_provider)) value="{{$data->higher_level__qualification3_education_provider}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Name of exact qualification obtained in the official
                        language
                    </td>
                    <td> <input type="text" name="higher_level_qualifciation3_official_languages" id="higher_level_qualifciation3_official_languages" @if(isset($data->higher_level_qualifciation3_official_languages)) value="{{$data->higher_level_qualifciation3_official_languages}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Name of the qualification obtained in English
                    </td>
                    <td> <input type="text" name="higher_level_qualification3_english" id="higher_level_qualification3_english" @if(isset($data->higher_level_qualification3_english)) value="{{$data->higher_level_qualification3_english}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Course duration

                    </td>
                    <td> <input type="text" name="higher_level_qualification3_course_duration" id="higher_level_qualification3_course_duration" @if(isset($data->higher_level_qualification3_course_duration)) value="{{$data->higher_level_qualification3_course_duration}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Date course started

                    </td>
                    <td> <input type="date" name="higher_level_qualification3_course_started" id="higher_level_qualification3_course_started" @if(isset($data->higher_level_qualification3_course_started)) value="{{$data->higher_level_qualification3_course_started}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Date course extension_loaded

                    </td>
                    <td> <input type="date" name="higher_level_qualification3_course_ended" id="higher_level_qualification3_course_ended" @if(isset($data->higher_level_qualification3_course_ended)) value="{{$data->higher_level_qualification3_course_ended}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Was the course studied full-time or part-time


                    </td>
                    <td> <input type="text" name="higher_level_qualification3_full_part" id="higher_level_qualification3_full_part" @if(isset($data->higher_level_qualification3_full_part)) value="{{$data->higher_level_qualification3_full_part}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Was this qualification obtained through course of
                        study or via RPL?


                    </td>
                    <td> <input type="text" name="higher_level_qualification3_courseofstudy" id="higher_level_qualification3_courseofstudy" @if(isset($data->higher_level_qualification3_courseofstudy)) value="{{$data->higher_level_qualification3_courseofstudy}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Country where you studied


                    </td>
                    <td> <input type="text" name="higher_level_qualification3_country" id="higher_level_qualification3_country" @if(isset($data->higher_level_qualification3_country)) value="{{$data->higher_level_qualification3_country}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Was a thesis or final project required to end the
                        course? If so, specify the title of the thesis/project



                    </td>
                    <td> <input type="text" name="higher_level_qualification3_thesis_project" id="higher_level_qualification3_thesis_project" @if(isset($data->higher_level_qualification3_thesis_project)) value="{{$data->higher_level_qualification3_thesis_project}}" @endif />
                    </td>
                </tr>


                <tr>
                    <td> Indicate the number of weeks (even if approximate)
                        studied to complete the thesis/project



                    </td>
                    <td> <input type="text" name="higher_level_qualification3_thesis_project_if" id="higher_level_qualification3_thesis_project_if" @if(isset($data->higher_level_qualification3_thesis_project_if)) value="{{$data->higher_level_qualification3_thesis_project_if}}" @endif/>
                    </td>
                </tr>

            </tbody>
        </table>

        <h2 class="fs-title" style="margin-top: 10px;">DOCS FOR HIGHER QUALIFICATION 3
        </h2>
        <p style="color:red">Attachments must be colour scans of the original document and uploaded in PDF format only. Please consolidate all
            multipage files into one PDF document for each attachment type. Maximum PDF file size is 3MB per PDF.
            Unnecessary additional documents will cause delays in processing. </p>

        <table>
            <tbody>
                <tr>
                    <td> Qualification – Diploma/Award Certificate
                    </td>
                    <td> <input type="file" name="higher_level_qualification3_diploma_award" id="higher_level_qualification3_diploma_award">
                
                    @if (array_key_exists('higher_level_qualification3_diploma_award', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/higher_level_qualification3_diploma_award/'.$docdataForm360['higher_level_qualification3_diploma_award'])  }}">
                                                               @if(str_contains($docdataForm360['higher_level_qualification3_diploma_award'] , '.pdf'))
                                                               <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/higher_level_qualification3_diploma_award/'.$docdataForm360['higher_level_qualification3_diploma_award'])  }}"  />
                                                               @endif
                                                               </a>
                                                             
                                                               
                                                           @endif
                
                </td>
                </tr>

                <tr>
                    <td> List of exams taken

                    </td>
                    <td> <input type="file" name="higher_level_qualification3_listofexams" id="higher_level_qualification3_listofexams">
                    @if (array_key_exists('higher_level_qualification3_listofexams', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/higher_level_qualification3_listofexams/'.$docdataForm360['higher_level_qualification3_listofexams'])  }}">
                                                               @if(str_contains($docdataForm360['higher_level_qualification3_listofexams'] , '.pdf'))
                                                               <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/higher_level_qualification3_listofexams/'.$docdataForm360['higher_level_qualification3_listofexams'])  }}"  />
                                                               @endif
                                                               </a>
                                                             
                                                               
                                                           @endif               
                </td>
                </tr>

                <tr>
                    <td> Diploma Supplement


                    </td>
                    <td> <input type="file" name="higher_level_qualification3_diploma_supplement" id="higher_level_qualification3_diploma_supplement">
                    @if (array_key_exists('higher_level_qualification3_diploma_supplement', $docdataForm360))
                                                               
                                                               <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/form360/'.$data->user_id.'/higher_level_qualification3_diploma_supplement/'.$docdataForm360['higher_level_qualification3_diploma_supplement'])  }}">
                                                               @if(str_contains($docdataForm360['higher_level_qualification3_diploma_supplement'] , '.pdf'))
                                                               <img class="imgfile" src="{{asset('pdficon.png')}}"   />
                                                               @else
                                                               <img class="imgfile" src="{{  asset('/storage/form360/'.$data->user_id.'/higher_level_qualification3_diploma_supplement/'.$docdataForm360['higher_level_qualification3_diploma_supplement'])  }}"  />
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