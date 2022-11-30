<fieldset id="fieldsetone">
    <div class="form-card">
        <h2 class="fs-title" style="text-align: center;">SECTION 1:</h2>

        <div class="row">
            <div class="col-7">
                <h2 class="fs-title"> SPONSORSHIP APPLICATION TO BECOME A SPONSOR – Employer form </h2>
            </div>
            <div class="col-5">
                <h2 class="steps">Step 1 - 4 </h2>
            </div>
        </div>

        <h2 class="fs-title">SBS - BUSINESS DETAILS </h2>
        <table>
            <tbody>
                <tr>
                    <td> Is your business registered in Australia? </td>
                    <td>
                        <select name="sbs_business_required_aus" id="sbs_business_required_aus" class="form-control">
                            <option value=""> Select Option </option>

                            @if(!empty(isset($data->sbs_business_required_aus)))
                            <option value="{{$data->sbs_business_required_aus}}" selected>{{$data->sbs_business_required_aus}}</option>
                            @endif
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> If not in Australia, indicate the country
                        where your business is registered </td>
                    <td>
                        <select id="sbs_business_country" name="sbs_business_country" class="form-control">
                            <option value="">Select Nationality</option>
                            @if(!empty(isset($data->sbs_business_country)))
                            <option value="{{$data->sbs_business_country}}" selected>{{$data->sbs_business_country}}</option>
                            @endif
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Åland Islands">Aland Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antarctica">Antarctica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina
                            </option>
                            <option value="Botswana">Botswana</option>
                            <option value="Bouvet Island">Bouvet Island</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Indian Ocean Territory">British Indian Ocean
                                Territory</option>
                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic
                            </option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands
                            </option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Congo, The Democratic Republic of The">Congo, The
                                Democratic Republic of The</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands (Malvinas)">Falkland Islands
                                (Malvinas)</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Territories">French Southern
                                Territories</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernsey">Guernsey</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-bissau">Guinea-bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Heard Island and Mcdonald Islands">Heard Island and
                                Mcdonald Islands</option>
                            <option value="Holy See (Vatican City State)">Holy See (Vatican City
                                State)</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of
                            </option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Isle of Man">Isle of Man</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, Democratic People's Republic of">Korea,
                                Democratic People's Republic of</option>
                            <option value="Korea, Republic of">Korea, Republic of</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao People's Democratic Republic">Lao People's
                                Democratic Republic</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya
                            </option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macao">Macao</option>
                            <option value="Macedonia, The Former Yugoslav Republic of">
                                Macedonia, The Former Yugoslav Republic of</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia, Federated States of">Micronesia,
                                Federated States of</option>
                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands
                            </option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Palestinian Territory, Occupied">Palestinian
                                Territory, Occupied</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn">Pitcairn</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russian Federation">Russian Federation</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Helena">Saint Helena</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon
                            </option>
                            <option value="Saint Vincent and The Grenadines">Saint Vincent and
                                The Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Georgia and The South Sandwich Islands">South
                                Georgia and The South Sandwich Islands</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen
                            </option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania, United Republic of">Tanzania, United
                                Republic of</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Timor-leste">Timor-leste</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos Islands">Turks and Caicos Islands
                            </option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="United States Minor Outlying Islands">United States
                                Minor Outlying Islands</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Viet Nam">Viet Nam</option>
                            <option value="Virgin Islands, British">Virgin Islands, British
                            </option>
                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td> What is the business legal registered name
                    </td>
                    <td>
                        <input type="text" name="sbs_business_legal_registered" id="sbs_business_legal_registered" @if(isset($data->sbs_business_legal_registered)) value="{{$data->sbs_business_legal_registered}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Do you have a different trading name? If so,
                        please specify

                    </td>
                    <td>
                        <input type="text" name="sbs_business_trading" id="sbs_business_trading" @if(isset($data->sbs_business_trading)) value="{{$data->sbs_business_trading}}" @endif/>
                    </td>
                </tr>



                <tr>
                    <td> What is your ABN number or the
                        registration number in the country where
                        the business is registered?

                    </td>
                    <td>
                        <input type="text" name="sbs_business_abn" id="sbs_business_abn" @if(isset($data->sbs_business_abn)) value="{{$data->sbs_business_abn}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> What is the ACN number of the business?

                    </td>
                    <td>
                        <input type="text" name="sbs_business_acn" id="sbs_business_acn" @if(isset($data->sbs_business_acn)) value="{{$data->sbs_business_acn}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Business type (company, sole trader, public
                        listed company, trust, other)

                    </td>
                    <td>
                        <select name="sbs_business_type" id="sbs_business_type" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->sbs_business_type)))
                            <option value="{{$data->sbs_business_type}}" selected>{{$data->sbs_business_type}}</option>
                            @endif
                            <option value="Sole trader"> Sole trader </option>
                            <option value="Proprietary Limited"> Proprietary Limited </option>
                            <option value="Public listed company"> Public listed company </option>
                            <option value="Trust"> Trust </option>
                            <option value="Other"> Other </option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td> Is this business a subsidiary of a foreign
                        company? If so, please provide details

                    </td>
                    <td>
                        <input type="text" name="sbs_business_subsidiary" id="sbs_business_subsidiary" @if(isset($data->sbs_business_subsidiary)) value="{{$data->sbs_business_subsidiary}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Is this company a branch of a foreign
                        company? If so, please provide details

                    </td>
                    <td>
                        <input type="text" name="sbs_business_branch" id="sbs_business_branch" @if(isset($data->sbs_business_branch)) value="{{$data->sbs_business_branch}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Is your business part of a franchise?

                    </td>
                    <td>
                        <input type="text" name="sbs_business_franchise" id="sbs_business_franchise" @if(isset($data->sbs_business_franchise)) value="{{$data->sbs_business_franchise}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td>Is your business the trustee for any other
                        business activities?

                    </td>
                    <td>
                        <input type="text" name="sbs_business_trustee" id="sbs_business_trustee" @if(isset($data->sbs_business_trustee)) value="{{$data->sbs_business_trustee}}" @endif/>
                    </td>
                </tr>



                <tr>
                    <td>If so, please specify

                    </td>
                    <td>
                        <input type="text" name="sbs_business_trustee_specify" id="sbs_business_trustee_specify" @if(isset($data->sbs_business_trustee_specify)) value="{{$data->sbs_business_trustee_specify}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Trust name

                    </td>
                    <td>
                        <input type="text" name="sbs_business_trustee_name" id="sbs_business_trustee_name" @if(isset($data->sbs_business_trustee_name)) value="{{$data->sbs_business_trustee_name}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td>Trust Australian Number (ABN)

                    </td>
                    <td>
                        <input type="text" name="sbs_business_trustee_abn" id="sbs_business_trustee_abn" @if(isset($data->sbs_business_trustee_abn)) value="{{$data->sbs_business_trustee_abn}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td>Have you ever been a sponsor for migration
                        purposes before? If so, please send us the
                        Immigration approval letter
                    </td>
                    <td>
                        <input type="text" name="sbs_business_sponsor_migration" id="sbs_business_sponsor_migration" @if(isset($data->sbs_business_sponsor_migration)) value="{{$data->sbs_business_sponsor_migration}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td>Is your business currently registered with
                        the Australian Taxation Office (ATO)?


                    </td>
                    <td>
                        <input type="text" name="sbs_business_ato" id="sbs_business_ato" @if(isset($data->sbs_business_ato)) value="{{$data->sbs_business_ato}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td>Is your business registered with the
                        Australian Securities and Investments
                        Commission (ASIC) or the Australian Stock
                        Exchange (ASX)?


                    </td>
                    <td>
                        <input type="text" name="sbs_business_stock_exchange" id="sbs_business_stock_exchange" @if(isset($data->sbs_business_stock_exchange)) value="{{$data->sbs_business_stock_exchange}}" @endif/>
                    </td>
                </tr>




            </tbody>
        </table>

        <h2 class="fs-title">SBS - TRADING DETAILS </h2>

        <table>
            <tbody>



                <tr>
                    <td> In what year was your business
                        established?
                    </td>
                    <td>
                        <input type="text" name="sbs_trading_established" id="sbs_trading_established" @if(isset($data->sbs_trading_established)) value="{{$data->sbs_trading_established}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> How long has your business been trading in
                        Australia? Indicate the month and year
                    </td>
                    <td>
                        <input type="text" name="sbs_trading_business" id="sbs_trading_business" @if(isset($data->sbs_trading_business)) value="{{$data->sbs_trading_business}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Business structure

                    </td>
                    <td>
                        <input type="text" name="sbs_trading_structure" id="sbs_trading_structure" @if(isset($data->sbs_trading_structure)) value="{{$data->sbs_trading_structure}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Address of the business
                    </td>
                    <td>
                        <input type="text" name="sbs_trading_address" id="sbs_trading_address" @if(isset($data->sbs_trading_address)) value="{{$data->sbs_trading_address}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> Sector of business
                    </td>
                    <td>
                        <input type="text" name="sbs_trading_sector" id="sbs_trading_sector" @if(isset($data->sbs_trading_sector)) value="{{$data->sbs_trading_sector}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> Description of the business activity
                    </td>
                    <td>
                        <input type="text" name="sbs_trading_activity" id="sbs_trading_activity" @if(isset($data->sbs_trading_activity)) value="{{$data->sbs_trading_activity}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td> How many people are you willing to
                        sponsor in the following 5 years?</td>
                    <td>
                        <select name="sbs_trading_willing" id="sbs_trading_willing" class="form-control">
                            <option value=""> Select Option </option>

                            @if(!empty(isset($data->sbs_trading_willing)))
                            <option value="{{$data->sbs_trading_willing}}" selected>{{$data->sbs_trading_willing}}</option>
                            @endif
                            <option value="1 to 3"> 1 to 3 </option>
                            <option value="3 to 5"> 3 to 5 </option>
                            <option value="5 to 10"> 5 to 10</option>
                            <option value="More than 10"> More than 10 </option>


                        </select>
                    </td>
                </tr>


                <tr>
                    <td>Please provide an explanation outlining the
                        reasons why you are willing to sponsor a
                        foreigner rather than an Australian citizen
                        or PR resident
                    </td>
                    <td>
                        <input type="text" name="sbs_trading_outlining" id="sbs_trading_outlining" @if(isset($data->sbs_trading_outlining)) value="{{$data->sbs_trading_outlining}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Indicate your webpage, if you have one
                    </td>
                    <td>
                        <input type="text" name="sbs_trading_webpage" id="sbs_trading_webpage" @if(isset($data->sbs_trading_webpage)) value="{{$data->sbs_trading_webpage}}" @endif/>
                    </td>
                </tr>
            </tbody>
        </table>


        <h2 class="fs-title">Main point of contact in the business </h2>

        <table>
            <tbody>

                <tr>
                    <td>Indicate Name and surname of the best
                        contact person in the company
                    </td>
                    <td>
                        <input type="text" name="main_point_name_surname" id="main_point_name_surname" @if(isset($data->main_point_name_surname)) value="{{$data->main_point_name_surname}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Indicate the role of this person in the
                        company
                    </td>
                    <td>
                        <input type="text" name="main_point_role" id="main_point_role" @if(isset($data->main_point_role)) value="{{$data->main_point_role}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Indicate the email contact of this person
                    </td>
                    <td>
                        <input type="text" name="main_point_email_person" id="main_point_email_person" @if(isset($data->main_point_email_person)) value="{{$data->main_point_email_person}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Indicate the best contact number of this
                        person
                    </td>
                    <td>
                        <input type="text" name="main_point_contact_number" id="main_point_contact_number" @if(isset($data->main_point_contact_number)) value="{{$data->main_point_contact_number}}" @endif/>
                    </td>
                </tr>

            </tbody>
        </table>


        <h2 class="fs-title">For each of the owners, directors, principals and / or partners </h2>

        <table>
            <tbody>

                <tr>
                    <td>Name and surname
                    </td>
                    <td>
                        <input type="text" name="partner_name_surname1" id="partner_name_surname1" @if(isset($data->partner_name_surname1)) value="{{$data->partner_name_surname1}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Gender
                    </td>
                    <td>
                        <input type="text" name="partner_gender1" id="partner_gender1" @if(isset($data->partner_gender1)) value="{{$data->partner_gender1}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Date of birth
                    </td>
                    <td>
                        <input type="text" name="partner_dob1" id="partner_dob1" @if(isset($data->partner_dob1)) value="{{$data->partner_dob1}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Position
                    </td>
                    <td>
                        <input type="text" name="partner_position1" id="partner_position1" @if(isset($data->partner_position1)) value="{{$data->partner_position1}}" @endif/>
                    </td>
                </tr>

            </tbody>
        </table>

        <table>
            <tbody>

                <tr>
                    <td>Name and surname
                    </td>
                    <td>
                        <input type="text" name="partner_name_surname2" id="partner_name_surname2" @if(isset($data->partner_name_surname2)) value="{{$data->partner_name_surname2}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Gender
                    </td>
                    <td>
                        <input type="text" name="partner_gender2" id="partner_gender2" @if(isset($data->partner_gender2)) value="{{$data->partner_gender2}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Date of birth
                    </td>
                    <td>
                        <input type="text" name="partner_dob2" id="partner_dob2" @if(isset($data->partner_dob2)) value="{{$data->partner_dob2}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Position
                    </td>
                    <td>
                        <input type="text" name="partner_position2" id="partner_position2" @if(isset($data->partner_position2)) value="{{$data->partner_position2}}" @endif/>
                    </td>
                </tr>

            </tbody>
        </table>

        <table>
            <tbody>

                <tr>
                    <td>Name and surname
                    </td>
                    <td>
                        <input type="text" name="partner_name_surname3" id="partner_name_surname3" @if(isset($data->partner_name_surname3)) value="{{$data->partner_name_surname3}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Gender
                    </td>
                    <td>
                        <input type="text" name="partner_gender3" id="partner_gender3" @if(isset($data->partner_gender3)) value="{{$data->partner_gender3}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Date of birth
                    </td>
                    <td>
                        <input type="text" name="partner_dob3" id="partner_dob3" @if(isset($data->partner_dob3)) value="{{$data->partner_dob3}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>Position
                    </td>
                    <td>
                        <input type="text" name="partner_position3" id="partner_position3" @if(isset($data->partner_position3)) value="{{$data->partner_position3}}" @endif/>
                    </td>
                </tr>

            </tbody>
        </table>

        <h2 class="fs-title">WORKFORCE DETAILS OF THE BUSINESS/ORGANIZATION </h2>

        <p> Indicate what is the total number of: </p>

        <table>
            <tbody>

                <tr>
                    <td>Australian employees (including Australian
                        citizens and permanent residents)

                    </td>
                    <td>
                        <select name="organization_name_surname" id="organization_name_surname" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->organization_name_surname)))
                            <option value="{{$data->organization_name_surname}}" selected>{{$data->organization_name_surname}}</option>
                            @endif
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                            <option value="60">60</option>
                            <option value="61">61</option>
                            <option value="62">62</option>
                            <option value="63">63</option>
                            <option value="64">64</option>
                            <option value="65">65</option>
                            <option value="66">66</option>
                            <option value="67">67</option>
                            <option value="68">68</option>
                            <option value="69">69</option>
                            <option value="70">70</option>
                            <option value="71">71</option>
                            <option value="72">72</option>
                            <option value="73">73</option>
                            <option value="74">74</option>
                            <option value="75">75</option>
                            <option value="76">76</option>
                            <option value="77">77</option>
                            <option value="78">78</option>
                            <option value="79">79</option>
                            <option value="80">80</option>
                            <option value="81">81</option>
                            <option value="82">82</option>
                            <option value="83">83</option>
                            <option value="84">84</option>
                            <option value="85">85</option>
                            <option value="86">86</option>
                            <option value="87">87</option>
                            <option value="88">88</option>
                            <option value="89">89</option>
                            <option value="90">90</option>
                            <option value="91">91</option>
                            <option value="92">92</option>
                            <option value="93">93</option>
                            <option value="94">94</option>
                            <option value="95">95</option>
                            <option value="96">96</option>
                            <option value="97">97</option>
                            <option value="98">98</option>
                            <option value="99">99</option>
                            <option value="100">100</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Out of the Australian citizens and PR
                        residents, how many are classified as
                        professionals?

                    </td>
                    <td>
                        <select name="organization_residents1" id="organization_residents1" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->organization_residents1)))
                            <option value="{{$data->organization_residents1}}" selected>{{$data->organization_residents1}}</option>
                            @endif
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                            <option value="60">60</option>
                            <option value="61">61</option>
                            <option value="62">62</option>
                            <option value="63">63</option>
                            <option value="64">64</option>
                            <option value="65">65</option>
                            <option value="66">66</option>
                            <option value="67">67</option>
                            <option value="68">68</option>
                            <option value="69">69</option>
                            <option value="70">70</option>
                            <option value="71">71</option>
                            <option value="72">72</option>
                            <option value="73">73</option>
                            <option value="74">74</option>
                            <option value="75">75</option>
                            <option value="76">76</option>
                            <option value="77">77</option>
                            <option value="78">78</option>
                            <option value="79">79</option>
                            <option value="80">80</option>
                            <option value="81">81</option>
                            <option value="82">82</option>
                            <option value="83">83</option>
                            <option value="84">84</option>
                            <option value="85">85</option>
                            <option value="86">86</option>
                            <option value="87">87</option>
                            <option value="88">88</option>
                            <option value="89">89</option>
                            <option value="90">90</option>
                            <option value="91">91</option>
                            <option value="92">92</option>
                            <option value="93">93</option>
                            <option value="94">94</option>
                            <option value="95">95</option>
                            <option value="96">96</option>
                            <option value="97">97</option>
                            <option value="98">98</option>
                            <option value="99">99</option>
                            <option value="100">100</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Out of the Australian citizens and PR
                        residents, how many are classified as
                        trades?


                    </td>
                    <td>
                        <select name="organization_residents2" id="organization_residents2" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->organization_residents2)))
                            <option value="{{$data->organization_residents2}}" selected>{{$data->organization_residents2}}</option>
                            @endif
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                            <option value="60">60</option>
                            <option value="61">61</option>
                            <option value="62">62</option>
                            <option value="63">63</option>
                            <option value="64">64</option>
                            <option value="65">65</option>
                            <option value="66">66</option>
                            <option value="67">67</option>
                            <option value="68">68</option>
                            <option value="69">69</option>
                            <option value="70">70</option>
                            <option value="71">71</option>
                            <option value="72">72</option>
                            <option value="73">73</option>
                            <option value="74">74</option>
                            <option value="75">75</option>
                            <option value="76">76</option>
                            <option value="77">77</option>
                            <option value="78">78</option>
                            <option value="79">79</option>
                            <option value="80">80</option>
                            <option value="81">81</option>
                            <option value="82">82</option>
                            <option value="83">83</option>
                            <option value="84">84</option>
                            <option value="85">85</option>
                            <option value="86">86</option>
                            <option value="87">87</option>
                            <option value="88">88</option>
                            <option value="89">89</option>
                            <option value="90">90</option>
                            <option value="91">91</option>
                            <option value="92">92</option>
                            <option value="93">93</option>
                            <option value="94">94</option>
                            <option value="95">95</option>
                            <option value="96">96</option>
                            <option value="97">97</option>
                            <option value="98">98</option>
                            <option value="99">99</option>
                            <option value="100">100</option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td>Foreign employees (i.e. non-Australian
                        citizens or non-permanent residents)



                    </td>
                    <td>
                        <select name="organization_foreign_employees" id="organization_foreign_employees" class="form-control">
                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->organization_foreign_employees)))
                            <option value="{{$data->organization_foreign_employees}}" selected>{{$data->organization_foreign_employees}}</option>
                            @endif
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                            <option value="60">60</option>
                            <option value="61">61</option>
                            <option value="62">62</option>
                            <option value="63">63</option>
                            <option value="64">64</option>
                            <option value="65">65</option>
                            <option value="66">66</option>
                            <option value="67">67</option>
                            <option value="68">68</option>
                            <option value="69">69</option>
                            <option value="70">70</option>
                            <option value="71">71</option>
                            <option value="72">72</option>
                            <option value="73">73</option>
                            <option value="74">74</option>
                            <option value="75">75</option>
                            <option value="76">76</option>
                            <option value="77">77</option>
                            <option value="78">78</option>
                            <option value="79">79</option>
                            <option value="80">80</option>
                            <option value="81">81</option>
                            <option value="82">82</option>
                            <option value="83">83</option>
                            <option value="84">84</option>
                            <option value="85">85</option>
                            <option value="86">86</option>
                            <option value="87">87</option>
                            <option value="88">88</option>
                            <option value="89">89</option>
                            <option value="90">90</option>
                            <option value="91">91</option>
                            <option value="92">92</option>
                            <option value="93">93</option>
                            <option value="94">94</option>
                            <option value="95">95</option>
                            <option value="96">96</option>
                            <option value="97">97</option>
                            <option value="98">98</option>
                            <option value="99">99</option>
                            <option value="100">100</option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td>Of the total number of foreign employees,
                        what is the number of: </td>
                    <td>
                        <input type="text" name="organization_foreign_employees_number" id="organization_foreign_employees_number" @if(isset($data->organization_foreign_employees_number)) value="{{$data->organization_foreign_employees_number}}" @endif/>
                    </td>
                </tr>


                <tr>
                    <td> 457 or 482 visa holders (this is the
                        sponsorship visa)</td>
                    <td>
                        <select name="organization_foreign_457_482_visa" id="organization_foreign_457_482_visa" class="form-control">
                            <option value=""> Select Option </option>

                            @if(!empty(isset($data->organization_foreign_457_482_visa)))
                            <option value="{{$data->organization_foreign_457_482_visa}}" selected>{{$data->organization_foreign_457_482_visa}}</option>
                            @endif

                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                            <option value="60">60</option>
                            <option value="61">61</option>
                            <option value="62">62</option>
                            <option value="63">63</option>
                            <option value="64">64</option>
                            <option value="65">65</option>
                            <option value="66">66</option>
                            <option value="67">67</option>
                            <option value="68">68</option>
                            <option value="69">69</option>
                            <option value="70">70</option>
                            <option value="71">71</option>
                            <option value="72">72</option>
                            <option value="73">73</option>
                            <option value="74">74</option>
                            <option value="75">75</option>
                            <option value="76">76</option>
                            <option value="77">77</option>
                            <option value="78">78</option>
                            <option value="79">79</option>
                            <option value="80">80</option>
                            <option value="81">81</option>
                            <option value="82">82</option>
                            <option value="83">83</option>
                            <option value="84">84</option>
                            <option value="85">85</option>
                            <option value="86">86</option>
                            <option value="87">87</option>
                            <option value="88">88</option>
                            <option value="89">89</option>
                            <option value="90">90</option>
                            <option value="91">91</option>
                            <option value="92">92</option>
                            <option value="93">93</option>
                            <option value="94">94</option>
                            <option value="95">95</option>
                            <option value="96">96</option>
                            <option value="97">97</option>
                            <option value="98">98</option>
                            <option value="99">99</option>
                            <option value="100">100</option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td>Other temporary work or temporary
                        activity visa holders
                    </td>
                    <td>
                        <select name="organization_foreign_other_temporary_visa" id="organization_foreign_other_temporary_visa" class="form-control">
                            <option value=""> Select Option </option>

                            @if(!empty(isset($data->organization_foreign_other_temporary_visa)))
                            <option value="{{$data->organization_foreign_other_temporary_visa}}" selected>{{$data->organization_foreign_other_temporary_visa}}</option>
                            @endif

                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                            <option value="60">60</option>
                            <option value="61">61</option>
                            <option value="62">62</option>
                            <option value="63">63</option>
                            <option value="64">64</option>
                            <option value="65">65</option>
                            <option value="66">66</option>
                            <option value="67">67</option>
                            <option value="68">68</option>
                            <option value="69">69</option>
                            <option value="70">70</option>
                            <option value="71">71</option>
                            <option value="72">72</option>
                            <option value="73">73</option>
                            <option value="74">74</option>
                            <option value="75">75</option>
                            <option value="76">76</option>
                            <option value="77">77</option>
                            <option value="78">78</option>
                            <option value="79">79</option>
                            <option value="80">80</option>
                            <option value="81">81</option>
                            <option value="82">82</option>
                            <option value="83">83</option>
                            <option value="84">84</option>
                            <option value="85">85</option>
                            <option value="86">86</option>
                            <option value="87">87</option>
                            <option value="88">88</option>
                            <option value="89">89</option>
                            <option value="90">90</option>
                            <option value="91">91</option>
                            <option value="92">92</option>
                            <option value="93">93</option>
                            <option value="94">94</option>
                            <option value="95">95</option>
                            <option value="96">96</option>
                            <option value="97">97</option>
                            <option value="98">98</option>
                            <option value="99">99</option>
                            <option value="100">100</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Student visa
                    </td>
                    <td>
                        <select name="organization_foreign_student_visa" id="organization_foreign_student_visa" class="form-control">
                            <option value=""> Select Option </option>

                            @if(!empty(isset($data->organization_foreign_student_visa)))
                            <option value="{{$data->organization_foreign_student_visa}}" selected>{{$data->organization_foreign_student_visa}}</option>
                            @endif

                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                            <option value="60">60</option>
                            <option value="61">61</option>
                            <option value="62">62</option>
                            <option value="63">63</option>
                            <option value="64">64</option>
                            <option value="65">65</option>
                            <option value="66">66</option>
                            <option value="67">67</option>
                            <option value="68">68</option>
                            <option value="69">69</option>
                            <option value="70">70</option>
                            <option value="71">71</option>
                            <option value="72">72</option>
                            <option value="73">73</option>
                            <option value="74">74</option>
                            <option value="75">75</option>
                            <option value="76">76</option>
                            <option value="77">77</option>
                            <option value="78">78</option>
                            <option value="79">79</option>
                            <option value="80">80</option>
                            <option value="81">81</option>
                            <option value="82">82</option>
                            <option value="83">83</option>
                            <option value="84">84</option>
                            <option value="85">85</option>
                            <option value="86">86</option>
                            <option value="87">87</option>
                            <option value="88">88</option>
                            <option value="89">89</option>
                            <option value="90">90</option>
                            <option value="91">91</option>
                            <option value="92">92</option>
                            <option value="93">93</option>
                            <option value="94">94</option>
                            <option value="95">95</option>
                            <option value="96">96</option>
                            <option value="97">97</option>
                            <option value="98">98</option>
                            <option value="99">99</option>
                            <option value="100">100</option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td>Working holiday makers
                    </td>
                    <td>
                        <select name="organization_foreign_working_holiday" id="organization_foreign_working_holiday" class="form-control">
                            <option value=""> Select Option </option>

                            @if(!empty(isset($data->organization_foreign_working_holiday)))
                            <option value="{{$data->organization_foreign_working_holiday}}" selected>{{$data->organization_foreign_working_holiday}}</option>
                            @endif

                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                            <option value="60">60</option>
                            <option value="61">61</option>
                            <option value="62">62</option>
                            <option value="63">63</option>
                            <option value="64">64</option>
                            <option value="65">65</option>
                            <option value="66">66</option>
                            <option value="67">67</option>
                            <option value="68">68</option>
                            <option value="69">69</option>
                            <option value="70">70</option>
                            <option value="71">71</option>
                            <option value="72">72</option>
                            <option value="73">73</option>
                            <option value="74">74</option>
                            <option value="75">75</option>
                            <option value="76">76</option>
                            <option value="77">77</option>
                            <option value="78">78</option>
                            <option value="79">79</option>
                            <option value="80">80</option>
                            <option value="81">81</option>
                            <option value="82">82</option>
                            <option value="83">83</option>
                            <option value="84">84</option>
                            <option value="85">85</option>
                            <option value="86">86</option>
                            <option value="87">87</option>
                            <option value="88">88</option>
                            <option value="89">89</option>
                            <option value="90">90</option>
                            <option value="91">91</option>
                            <option value="92">92</option>
                            <option value="93">93</option>
                            <option value="94">94</option>
                            <option value="95">95</option>
                            <option value="96">96</option>
                            <option value="97">97</option>
                            <option value="98">98</option>
                            <option value="99">99</option>
                            <option value="100">100</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Other visas
                    </td>
                    <td>
                        <select name="organization_foreign_other_visas " id="organization_foreign_other_visas" class="form-control">

                            <option value=""> Select Option </option>
                            @if(!empty(isset($data->organization_foreign_other_visas)))
                            <option value="{{$data->organization_foreign_other_visas}}" selected>{{$data->organization_foreign_other_visas}}</option>
                            @endif
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                            <option value="60">60</option>
                            <option value="61">61</option>
                            <option value="62">62</option>
                            <option value="63">63</option>
                            <option value="64">64</option>
                            <option value="65">65</option>
                            <option value="66">66</option>
                            <option value="67">67</option>
                            <option value="68">68</option>
                            <option value="69">69</option>
                            <option value="70">70</option>
                            <option value="71">71</option>
                            <option value="72">72</option>
                            <option value="73">73</option>
                            <option value="74">74</option>
                            <option value="75">75</option>
                            <option value="76">76</option>
                            <option value="77">77</option>
                            <option value="78">78</option>
                            <option value="79">79</option>
                            <option value="80">80</option>
                            <option value="81">81</option>
                            <option value="82">82</option>
                            <option value="83">83</option>
                            <option value="84">84</option>
                            <option value="85">85</option>
                            <option value="86">86</option>
                            <option value="87">87</option>
                            <option value="88">88</option>
                            <option value="89">89</option>
                            <option value="90">90</option>
                            <option value="91">91</option>
                            <option value="92">92</option>
                            <option value="93">93</option>
                            <option value="94">94</option>
                            <option value="95">95</option>
                            <option value="96">96</option>
                            <option value="97">97</option>
                            <option value="98">98</option>
                            <option value="99">99</option>
                            <option value="100">100</option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td>How many recent Australian university
                        graduates with less than 12 months work
                        experience </td>
                    <td>
                        <input type="text" name="organization_foreign_recent_university" id="organization_foreign_recent_university" @if(isset($data->organization_foreign_recent_university)) value="{{$data->organization_foreign_recent_university}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>How many apprentices ae employed under
                        a training agreement or contract of training </td>
                    <td>
                        <input type="text" name="organization_foreign_contract_of_training" id="organization_foreign_recent_university" @if(isset($data->organization_foreign_recent_university)) value="{{$data->organization_foreign_recent_university}}" @endif/>
                    </td>
                </tr>


            </tbody>
        </table>

        <h2 class="fs-title">ANNUAL TURNOVER </h2>

        <table>

            <tbody>

                <tr>
                    <td>What was the annual turnover of your
                        business for the most recent full financial
                        year?
                    </td>
                    <td>
                        <input type="text" name="annual_turnover_year" id="annual_turnover_year" @if(isset($data->annual_turnover_year)) value="{{$data->annual_turnover_year}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>What has been the payroll figure (wages +
                        expenses) for the most recent financial year

                    </td>
                    <td>
                        <input type="text" name="annual_turnover_payroll_figure" id="annual_turnover_payroll_figure" @if(isset($data->annual_turnover_payroll_figure)) value="{{$data->annual_turnover_payroll_figure}}" @endif/>
                    </td>
                </tr>

                <tr>
                    <td>If you have been operating for less than 12
                        months, please indicate the payroll figure
                        starting since you have been operating

                    </td>
                    <td>
                        <input type="text" name="annual_turnover_operating" id="annual_turnover_operating" @if(isset($data->annual_turnover_operating)) value="{{$data->annual_turnover_operating}}" @endif/>
                    </td>
                </tr>

            </tbody>

        </table>

        <h2 class="fs-title">SBS DOCS TO UPLOAD </h2>

        <table>

            <tbody>

                <tr>
                    <td> Previous Sponsorship Approval Letter (SBS)
                        if applicable
                    </td>
                    <td> <input type="file" name="sbs_upload_previous_sponsorship" id="sbs_upload_previous_sponsorship">
                        @if (array_key_exists('sbs_upload_previous_sponsorship', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_previous_sponsorship/'.$docdataemployerform['sbs_upload_previous_sponsorship'])  }}">
                            @if(str_contains($docdataemployerform['sbs_upload_previous_sponsorship'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_previous_sponsorship/'.$docdataemployerform['sbs_upload_previous_sponsorship'])  }}" />
                            @endif
                        </a>


                        @endif
                    </td>
                </tr>

                <tr>
                    <td> ASIC Historical Extract
                    </td>
                    <td> <input type="file" name="sbs_upload_asic_historical" id="sbs_upload_asic_historical">
                        @if (array_key_exists('sbs_upload_asic_historical', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_asic_historical/'.$docdataemployerform['sbs_upload_asic_historical'])  }}">
                            @if(str_contains($docdataemployerform['sbs_upload_asic_historical'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_asic_historical/'.$docdataemployerform['sbs_upload_asic_historical'])  }}" />
                            @endif
                        </a>


                        @endif
                    </td>
                </tr>

                <tr>
                    <td> Trust deed (signed pages only) if applicable
                    </td>
                    <td> <input type="file" name="sbs_upload_trust" id="sbs_upload_trust">

                        @if (array_key_exists('sbs_upload_trust', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_trust/'.$docdataemployerform['sbs_upload_trust'])  }}">
                            @if(str_contains($docdataemployerform['sbs_upload_trust'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_trust/'.$docdataemployerform['sbs_upload_trust'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>

                <tr>
                    <td> Lease agreement/evidence of ownership
                        for the business premises
                    </td>
                    <td> <input type="file" name="sbs_upload_lease" id="sbs_upload_lease">
                        @if (array_key_exists('sbs_upload_lease', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_lease/'.$docdataemployerform['sbs_upload_lease'])  }}">
                            @if(str_contains($docdataemployerform['sbs_upload_lease'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_lease/'.$docdataemployerform['sbs_upload_lease'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>

                <tr>
                    <td> Bank statement in the name of the
                        company (not older than 6 months)
                    </td>
                    <td> <input type="file" name="sbs_upload_bank_statement" id="sbs_upload_bank_statement">

                        @if (array_key_exists('sbs_upload_bank_statement', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_bank_statement/'.$docdataemployerform['sbs_upload_bank_statement'])  }}">
                            @if(str_contains($docdataemployerform['sbs_upload_bank_statement'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_bank_statement/'.$docdataemployerform['sbs_upload_bank_statement'])  }}" />
                            @endif
                        </a>


                        @endif
                    </td>
                </tr>

                <tr>
                    <td> BAS for the last 12 months or since when
                        you the business has been operating
                    </td>
                    <td> <input type="file" name="sbs_upload_bas" id="sbs_upload_bas">
                        @if (array_key_exists('sbs_upload_bas', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_bas/'.$docdataemployerform['sbs_upload_bas'])  }}">
                            @if(str_contains($docdataemployerform['sbs_upload_bas'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_bas/'.$docdataemployerform['sbs_upload_bas'])  }}" />
                            @endif
                        </a>


                        @endif
                    </td>
                </tr>

                <tr>
                    <td> Profit & Loss of the most recent financial
                        year
                    </td>
                    <td> <input type="file" name="sbs_upload_profit_loss" id="sbs_upload_profit_loss">

                        @if (array_key_exists('sbs_upload_profit_loss', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_profit_loss/'.$docdataemployerform['sbs_upload_profit_loss'])  }}">
                            @if(str_contains($docdataemployerform['sbs_upload_profit_loss'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_profit_loss/'.$docdataemployerform['sbs_upload_profit_loss'])  }}" />
                            @endif
                        </a>


                        @endif


                    </td>
                </tr>

                <tr>
                    <td> Most recent payroll extract: provide the
                        company’s gross payroll + expenses +
                        superannuation extract for the past 12
                        month (or ever since the business has been
                        operating for)
                    </td>
                    <td> <input type="file" name="sbs_upload_recent_payroll" id="sbs_upload_recent_payroll">

                        @if (array_key_exists('sbs_upload_recent_payroll', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_recent_payroll/'.$docdataemployerform['sbs_upload_recent_payroll'])  }}">
                            @if(str_contains($docdataemployerform['sbs_upload_recent_payroll'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_recent_payroll/'.$docdataemployerform['sbs_upload_recent_payroll'])  }}" />
                            @endif
                        </a>


                        @endif
                    </td>
                </tr>

                <tr>
                    <td>Organizational Chart: please provide an
                        organizational chart for the business to be
                        filled with the list of all of your employees
                        and roles
                    </td>
                    <td> <input type="file" name="sbs_upload_chart" id="sbs_upload_chart">


                        @if (array_key_exists('sbs_upload_chart', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_chart/'.$docdataemployerform['sbs_upload_chart'])  }}">
                            @if(str_contains($docdataemployerform['sbs_upload_chart'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_chart/'.$docdataemployerform['sbs_upload_chart'])  }}" />
                            @endif
                        </a>


                        @endif
                    </td>
                </tr>

                <tr>
                    <td>A few recent utility bills
                    </td>
                    <td> <input type="file" name="sbs_upload_bill1" id="sbs_upload_bill1">

                        @if (array_key_exists('sbs_upload_bill1', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_bill1/'.$docdataemployerform['sbs_upload_bill1'])  }}">
                            @if(str_contains($docdataemployerform['sbs_upload_bill1'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_bill1/'.$docdataemployerform['sbs_upload_bill1'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>

                <tr>
                    <td>A few recent utility bills
                    </td>
                    <td> <input type="file" name="sbs_upload_bill2" id="sbs_upload_bill2">

                        @if (array_key_exists('sbs_upload_bill2', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_bill2/'.$docdataemployerform['sbs_upload_bill2'])  }}">
                            @if(str_contains($docdataemployerform['sbs_upload_bill2'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_bill2/'.$docdataemployerform['sbs_upload_bill2'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>

                <tr>
                    <td>A few invoices from suppliers
                    </td>
                    <td> <input type="file" name="sbs_upload_invoice1" id="sbs_upload_invoice1">

                        @if (array_key_exists('sbs_upload_invoice1', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_invoice1/'.$docdataemployerform['sbs_upload_invoice1'])  }}">
                            @if(str_contains($docdataemployerform['sbs_upload_invoice1'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_invoice1/'.$docdataemployerform['sbs_upload_invoice1'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>

                <tr>
                    <td>A few invoices from suppliers
                    </td>
                    <td> <input type="file" name="sbs_upload_invoice2" id="sbs_upload_invoice2">

                        @if (array_key_exists('sbs_upload_invoice2', $docdataemployerform))

                        <a class="imgfileAnchor" target="_blank" href="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_invoice2/'.$docdataemployerform['sbs_upload_invoice2'])  }}">
                            @if(str_contains($docdataemployerform['sbs_upload_invoice2'] , '.pdf'))
                            <img class="imgfile" src="{{asset('pdficon.png')}}" />
                            @else
                            <img class="imgfile" src="{{  asset('/storage/employerform/'.$data->user_id.'/sbs_upload_invoice2/'.$docdataemployerform['sbs_upload_invoice2'])  }}" />
                            @endif
                        </a>


                        @endif

                    </td>
                </tr>

            </tbody>
        </table>



    </div>

    <input type="hidden" name="fieldset" value="abc" class="currentfieldset">

    @if(!Auth::user()->hasRole('consultant') && !Auth::user()->hasRole('admin') )
    <input type="button" name="save" class="save action-button" value="Save" />
    @endif
    <input type="button" name="next" class="next action-button" value="Next" />
</fieldset>