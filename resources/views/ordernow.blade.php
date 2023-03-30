<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/rocker/demo/vertical/authentication-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Aug 2021 08:50:22 GMT -->

<!-- Mirrored from earngasmoney.com/member/ordernow.php?user_name=gasmoney by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Apr 2022 16:19:58 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="/ordernowpage/assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="/ordernowpage/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="/ordernowpage/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="/ordernowpage/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="/ordernowpage/assets/css/pace.min.css" rel="stylesheet" />
    <script src="/ordernowpage/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="/ordernowpage/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/ordernowpage/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="/ordernowpage/assets/css/app.css" rel="stylesheet">
    <link href="/ordernowpage/assets/css/icons.css" rel="stylesheet">
    <title>Sign Up</title>
</head>
<style>
    body {
        background-color: #2AC9FF;
        background-image: url("/ordernowpage/wp-content/uploads/2022/02/main-2.png");
        background-attachment: fixed;
        background-size: cover;
    }

    .error {
        color: red;
    }

    .goog-te-banner-frame {
        display: none !important;
    }

</style>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto">

                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <div class="mb-4 text-center">
                                            <!--<img src="/ordernowpage/assets/images/logo-basic2.png" width="256" alt="" />-->
                                        </div>
                                        <br>
                                        <h3 class="">To order your Iteracare device, please enter your
                                            information below</h3>
                                        <p><a class="text-primary" href="login.html"></a>
                                        </p>
                                    </div>
                                    <div class="login-separater text-center mb-4"> <span>ENTER DETAILS BELOW</span>
                                        <hr />
                                    </div>
                                    <div class="form-body">


                                        <!--alert msg start-->
                                        <div id="alertMsg">

                                        </div>
                                        <!--alert msg close-->
                                        <!--<div id="validateMessage" style="width: 100%" class="text-center alert alert-danger">-->

                                    </div>
                                    <form id="formSubmit" method="post" class="row g-3">

                                        <div class="col-sm-6">
                                            <label for="uname" class="form-label"></label>
                                            <div id="google_translate_element"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="uname" class="form-label">Sponsor Id</label>
                                            <br>
                                            <h4 class='text-primary'>{{$sponsor}}</h4> <input style="display:none;"
                                                type="text" name="sponsor_name" class="form-control" id="uname"
                                                value="gasmoney" placeholder="Enter Sponsor ID">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="uname" class="form-label">Username</label>
                                            <input type="text" name="user_name" class="form-control" id="uname"
                                                placeholder="Enter Username">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="first-name" class="form-label">First Name</label>
                                            <input type="text" name="first_name" class="form-control" id="frist-name"
                                                placeholder="Enter First Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="last-name" class="form-label">Last Name</label>
                                            <input type="text" name="last_name" class="form-control" id="last-name"
                                                placeholder="Enter Last Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                placeholder="example@user.com">
                                            <div style="color:red" id="sponsorNameError"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control" id="address"
                                                placeholder="Enter Address">
                                            <div style="color:red" id="address"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="address" class="form-label">Address 2</label>
                                            <input type="text" name="address2" class="form-control" id="address2"
                                                placeholder="Enter Address">
                                            <div style="color:red" id="address2"></div>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" name="city" class="form-control" id="city"
                                                placeholder="Enter City">
                                            <div style="color:red" id="city"></div>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="state" class="form-label">State</label>
                                            <input type="text" name="state" class="form-control" id="state"
                                                placeholder="Enter State">
                                            <div style="color:red" id="state"></div>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="postal_code" class="form-label">Postal Code</label>
                                            <input type="text" name="postal_code" class="form-control"
                                                id="postal_code" placeholder="Enter Postal Code">
                                            <div style="color:red" id="postal_code"></div>
                                        </div>


                                        <div class="col-sm-6">
                                            <label for="inputSelectCountry" class="form-label">Country</label>
                                            <select class="form-select" name="country_name" id="country"
                                                aria-label="Default select example">
                                                <option value="">Select country</option>
                                                <option value="AFGHANISTAN">AFGHANISTAN</option>
                                                <option value="ALBANIA">ALBANIA</option>
                                                <option value="ALGERIA">ALGERIA</option>
                                                <option value="AMERICAN SAMOA">AMERICAN SAMOA</option>
                                                <option value="ANDORRA">ANDORRA</option>
                                                <option value="ANGOLA">ANGOLA</option>
                                                <option value="ANGUILLA">ANGUILLA</option>
                                                <option value="ANTARCTICA">ANTARCTICA</option>
                                                <option value="ANTIGUA AND BARBUDA">ANTIGUA AND BARBUDA</option>
                                                <option value="ARGENTINA">ARGENTINA</option>
                                                <option value="ARMENIA">ARMENIA</option>
                                                <option value="ARUBA">ARUBA</option>
                                                <option value="AUSTRALIA">AUSTRALIA</option>
                                                <option value="AUSTRIA">AUSTRIA</option>
                                                <option value="AZERBAIJAN">AZERBAIJAN</option>
                                                <option value="BAHAMAS">BAHAMAS</option>
                                                <option value="BAHRAIN">BAHRAIN</option>
                                                <option value="BANGLADESH">BANGLADESH</option>
                                                <option value="BARBADOS">BARBADOS</option>
                                                <option value="BELARUS">BELARUS</option>
                                                <option value="BELGIUM">BELGIUM</option>
                                                <option value="BELIZE">BELIZE</option>
                                                <option value="BENIN">BENIN</option>
                                                <option value="BERMUDA">BERMUDA</option>
                                                <option value="BHUTAN">BHUTAN</option>
                                                <option value="BOLIVIA">BOLIVIA</option>
                                                <option value="BOSNIA AND HERZEGOVINA">BOSNIA AND HERZEGOVINA</option>
                                                <option value="BOTSWANA">BOTSWANA</option>
                                                <option value="BOUVET ISLAND">BOUVET ISLAND</option>
                                                <option value="BRAZIL">BRAZIL</option>
                                                <option value="BRITISH INDIAN OCEAN TERRITORY">BRITISH INDIAN OCEAN
                                                    TERRITORY</option>
                                                <option value="BRUNEI DARUSSALAM">BRUNEI DARUSSALAM</option>
                                                <option value="BULGARIA">BULGARIA</option>
                                                <option value="BURKINA FASO">BURKINA FASO</option>
                                                <option value="BURUNDI">BURUNDI</option>
                                                <option value="CAMBODIA">CAMBODIA</option>
                                                <option value="CAMEROON">CAMEROON</option>
                                                <option value="CANADA">CANADA</option>
                                                <option value="CAPE VERDE">CAPE VERDE</option>
                                                <option value="CAYMAN ISLANDS">CAYMAN ISLANDS</option>
                                                <option value="CENTRAL AFRICAN REPUBLIC">CENTRAL AFRICAN REPUBLIC
                                                </option>
                                                <option value="CHAD">CHAD</option>
                                                <option value="CHILE">CHILE</option>
                                                <option value="CHINA">CHINA</option>
                                                <option value="CHRISTMAS ISLAND">CHRISTMAS ISLAND</option>
                                                <option value="COCOS (KEELING) ISLANDS">COCOS (KEELING) ISLANDS</option>
                                                <option value="COLOMBIA">COLOMBIA</option>
                                                <option value="COMOROS">COMOROS</option>
                                                <option value="CONGO">CONGO</option>
                                                <option value="CONGO, THE DEMOCRATIC REPUBLIC OF THE">CONGO, THE
                                                    DEMOCRATIC REPUBLIC OF THE</option>
                                                <option value="COOK ISLANDS">COOK ISLANDS</option>
                                                <option value="COSTA RICA">COSTA RICA</option>
                                                <option value="COTE D'IVOIRE">COTE D'IVOIRE</option>
                                                <option value="CROATIA">CROATIA</option>
                                                <option value="CUBA">CUBA</option>
                                                <option value="CYPRUS">CYPRUS</option>
                                                <option value="CZECH REPUBLIC">CZECH REPUBLIC</option>
                                                <option value="DENMARK">DENMARK</option>
                                                <option value="DJIBOUTI">DJIBOUTI</option>
                                                <option value="DOMINICA">DOMINICA</option>
                                                <option value="DOMINICAN REPUBLIC">DOMINICAN REPUBLIC</option>
                                                <option value="ECUADOR">ECUADOR</option>
                                                <option value="EGYPT">EGYPT</option>
                                                <option value="EL SALVADOR">EL SALVADOR</option>
                                                <option value="EQUATORIAL GUINEA">EQUATORIAL GUINEA</option>
                                                <option value="ERITREA">ERITREA</option>
                                                <option value="ESTONIA">ESTONIA</option>
                                                <option value="ETHIOPIA">ETHIOPIA</option>
                                                <option value="FALKLAND ISLANDS (MALVINAS)">FALKLAND ISLANDS (MALVINAS)
                                                </option>
                                                <option value="FAROE ISLANDS">FAROE ISLANDS</option>
                                                <option value="FIJI">FIJI</option>
                                                <option value="FINLAND">FINLAND</option>
                                                <option value="FRANCE">FRANCE</option>
                                                <option value="FRENCH GUIANA">FRENCH GUIANA</option>
                                                <option value="FRENCH POLYNESIA">FRENCH POLYNESIA</option>
                                                <option value="FRENCH SOUTHERN TERRITORIES">FRENCH SOUTHERN TERRITORIES
                                                </option>
                                                <option value="GABON">GABON</option>
                                                <option value="GAMBIA">GAMBIA</option>
                                                <option value="GEORGIA">GEORGIA</option>
                                                <option value="GERMANY">GERMANY</option>
                                                <option value="GHANA">GHANA</option>
                                                <option value="GIBRALTAR">GIBRALTAR</option>
                                                <option value="GREECE">GREECE</option>
                                                <option value="GREENLAND">GREENLAND</option>
                                                <option value="GRENADA">GRENADA</option>
                                                <option value="GUADELOUPE">GUADELOUPE</option>
                                                <option value="GUAM">GUAM</option>
                                                <option value="GUATEMALA">GUATEMALA</option>
                                                <option value="GUINEA">GUINEA</option>
                                                <option value="GUINEA-BISSAU">GUINEA-BISSAU</option>
                                                <option value="GUYANA">GUYANA</option>
                                                <option value="HAITI">HAITI</option>
                                                <option value="HEARD ISLAND AND MCDONALD ISLANDS">HEARD ISLAND AND
                                                    MCDONALD ISLANDS</option>
                                                <option value="HOLY SEE (VATICAN CITY STATE)">HOLY SEE (VATICAN CITY
                                                    STATE)</option>
                                                <option value="HONDURAS">HONDURAS</option>
                                                <option value="HONG KONG">HONG KONG</option>
                                                <option value="HUNGARY">HUNGARY</option>
                                                <option value="ICELAND">ICELAND</option>
                                                <option value="INDIA">INDIA</option>
                                                <option value="INDONESIA">INDONESIA</option>
                                                <option value="IRAN, ISLAMIC REPUBLIC OF">IRAN, ISLAMIC REPUBLIC OF
                                                </option>
                                                <option value="IRAQ">IRAQ</option>
                                                <option value="IRELAND">IRELAND</option>
                                                <option value="ISRAEL">ISRAEL</option>
                                                <option value="ITALY">ITALY</option>
                                                <option value="JAMAICA">JAMAICA</option>
                                                <option value="JAPAN">JAPAN</option>
                                                <option value="JORDAN">JORDAN</option>
                                                <option value="KAZAKHSTAN">KAZAKHSTAN</option>
                                                <option value="KENYA">KENYA</option>
                                                <option value="KIRIBATI">KIRIBATI</option>
                                                <option value="KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF">KOREA, DEMOCRATIC
                                                    PEOPLE'S REPUBLIC OF</option>
                                                <option value="KOREA, REPUBLIC OF">KOREA, REPUBLIC OF</option>
                                                <option value="KUWAIT">KUWAIT</option>
                                                <option value="KYRGYZSTAN">KYRGYZSTAN</option>
                                                <option value="LAO PEOPLE'S DEMOCRATIC REPUBLIC">LAO PEOPLE'S DEMOCRATIC
                                                    REPUBLIC</option>
                                                <option value="LATVIA">LATVIA</option>
                                                <option value="LEBANON">LEBANON</option>
                                                <option value="LESOTHO">LESOTHO</option>
                                                <option value="LIBERIA">LIBERIA</option>
                                                <option value="LIBYAN ARAB JAMAHIRIYA">LIBYAN ARAB JAMAHIRIYA</option>
                                                <option value="LIECHTENSTEIN">LIECHTENSTEIN</option>
                                                <option value="LITHUANIA">LITHUANIA</option>
                                                <option value="LUXEMBOURG">LUXEMBOURG</option>
                                                <option value="MACAO">MACAO</option>
                                                <option value="MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF">MACEDONIA,
                                                    THE FORMER YUGOSLAV REPUBLIC OF</option>
                                                <option value="MADAGASCAR">MADAGASCAR</option>
                                                <option value="MALAWI">MALAWI</option>
                                                <option value="MALAYSIA">MALAYSIA</option>
                                                <option value="MALDIVES">MALDIVES</option>
                                                <option value="MALI">MALI</option>
                                                <option value="MALTA">MALTA</option>
                                                <option value="MARSHALL ISLANDS">MARSHALL ISLANDS</option>
                                                <option value="MARTINIQUE">MARTINIQUE</option>
                                                <option value="MAURITANIA">MAURITANIA</option>
                                                <option value="MAURITIUS">MAURITIUS</option>
                                                <option value="MAYOTTE">MAYOTTE</option>
                                                <option value="MEXICO">MEXICO</option>
                                                <option value="MICRONESIA, FEDERATED STATES OF">MICRONESIA, FEDERATED
                                                    STATES OF</option>
                                                <option value="MOLDOVA, REPUBLIC OF">MOLDOVA, REPUBLIC OF</option>
                                                <option value="MONACO">MONACO</option>
                                                <option value="MONGOLIA">MONGOLIA</option>
                                                <option value="MONTSERRAT">MONTSERRAT</option>
                                                <option value="MOROCCO">MOROCCO</option>
                                                <option value="MOZAMBIQUE">MOZAMBIQUE</option>
                                                <option value="MYANMAR">MYANMAR</option>
                                                <option value="NAMIBIA">NAMIBIA</option>
                                                <option value="NAURU">NAURU</option>
                                                <option value="NEPAL">NEPAL</option>
                                                <option value="NETHERLANDS">NETHERLANDS</option>
                                                <option value="NETHERLANDS ANTILLES">NETHERLANDS ANTILLES</option>
                                                <option value="NEW CALEDONIA">NEW CALEDONIA</option>
                                                <option value="NEW ZEALAND">NEW ZEALAND</option>
                                                <option value="NICARAGUA">NICARAGUA</option>
                                                <option value="NIGER">NIGER</option>
                                                <option value="NIGERIA">NIGERIA</option>
                                                <option value="NIUE">NIUE</option>
                                                <option value="NORFOLK ISLAND">NORFOLK ISLAND</option>
                                                <option value="NORTHERN MARIANA ISLANDS">NORTHERN MARIANA ISLANDS
                                                </option>
                                                <option value="NORWAY">NORWAY</option>
                                                <option value="OMAN">OMAN</option>
                                                <option value="PAKISTAN">PAKISTAN</option>
                                                <option value="PALAU">PALAU</option>
                                                <option value="PALESTINIAN TERRITORY, OCCUPIED">PALESTINIAN TERRITORY,
                                                    OCCUPIED</option>
                                                <option value="PANAMA">PANAMA</option>
                                                <option value="PAPUA NEW GUINEA">PAPUA NEW GUINEA</option>
                                                <option value="PARAGUAY">PARAGUAY</option>
                                                <option value="PERU">PERU</option>
                                                <option value="PHILIPPINES">PHILIPPINES</option>
                                                <option value="PITCAIRN">PITCAIRN</option>
                                                <option value="POLAND">POLAND</option>
                                                <option value="PORTUGAL">PORTUGAL</option>
                                                <option value="PUERTO RICO">PUERTO RICO</option>
                                                <option value="QATAR">QATAR</option>
                                                <option value="REUNION">REUNION</option>
                                                <option value="ROMANIA">ROMANIA</option>
                                                <option value="RUSSIAN FEDERATION">RUSSIAN FEDERATION</option>
                                                <option value="RWANDA">RWANDA</option>
                                                <option value="SAINT HELENA">SAINT HELENA</option>
                                                <option value="SAINT KITTS AND NEVIS">SAINT KITTS AND NEVIS</option>
                                                <option value="SAINT LUCIA">SAINT LUCIA</option>
                                                <option value="SAINT PIERRE AND MIQUELON">SAINT PIERRE AND MIQUELON
                                                </option>
                                                <option value="SAINT VINCENT AND THE GRENADINES">SAINT VINCENT AND THE
                                                    GRENADINES</option>
                                                <option value="SAMOA">SAMOA</option>
                                                <option value="SAN MARINO">SAN MARINO</option>
                                                <option value="SAO TOME AND PRINCIPE">SAO TOME AND PRINCIPE</option>
                                                <option value="SAUDI ARABIA">SAUDI ARABIA</option>
                                                <option value="SENEGAL">SENEGAL</option>
                                                <option value="SERBIA AND MONTENEGRO">SERBIA AND MONTENEGRO</option>
                                                <option value="SEYCHELLES">SEYCHELLES</option>
                                                <option value="SIERRA LEONE">SIERRA LEONE</option>
                                                <option value="SINGAPORE">SINGAPORE</option>
                                                <option value="SLOVAKIA">SLOVAKIA</option>
                                                <option value="SLOVENIA">SLOVENIA</option>
                                                <option value="SOLOMON ISLANDS">SOLOMON ISLANDS</option>
                                                <option value="SOMALIA">SOMALIA</option>
                                                <option value="SOUTH AFRICA">SOUTH AFRICA</option>
                                                <option value="SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS">SOUTH
                                                    GEORGIA AND THE SOUTH SANDWICH ISLANDS</option>
                                                <option value="SPAIN">SPAIN</option>
                                                <option value="SRI LANKA">SRI LANKA</option>
                                                <option value="SUDAN">SUDAN</option>
                                                <option value="SURINAME">SURINAME</option>
                                                <option value="SVALBARD AND JAN MAYEN">SVALBARD AND JAN MAYEN</option>
                                                <option value="SWAZILAND">SWAZILAND</option>
                                                <option value="SWEDEN">SWEDEN</option>
                                                <option value="SWITZERLAND">SWITZERLAND</option>
                                                <option value="SYRIAN ARAB REPUBLIC">SYRIAN ARAB REPUBLIC</option>
                                                <option value="TAIWAN, PROVINCE OF CHINA">TAIWAN, PROVINCE OF CHINA
                                                </option>
                                                <option value="TAJIKISTAN">TAJIKISTAN</option>
                                                <option value="TANZANIA, UNITED REPUBLIC OF">TANZANIA, UNITED REPUBLIC
                                                    OF</option>
                                                <option value="THAILAND">THAILAND</option>
                                                <option value="TIMOR-LESTE">TIMOR-LESTE</option>
                                                <option value="TOGO">TOGO</option>
                                                <option value="TOKELAU">TOKELAU</option>
                                                <option value="TONGA">TONGA</option>
                                                <option value="TRINIDAD AND TOBAGO">TRINIDAD AND TOBAGO</option>
                                                <option value="TUNISIA">TUNISIA</option>
                                                <option value="TURKEY">TURKEY</option>
                                                <option value="TURKMENISTAN">TURKMENISTAN</option>
                                                <option value="TURKS AND CAICOS ISLANDS">TURKS AND CAICOS ISLANDS
                                                </option>
                                                <option value="TUVALU">TUVALU</option>
                                                <option value="UGANDA">UGANDA</option>
                                                <option value="UKRAINE">UKRAINE</option>
                                                <option value="UNITED ARAB EMIRATES">UNITED ARAB EMIRATES</option>
                                                <option value="UNITED KINGDOM">UNITED KINGDOM</option>
                                                <option value="UNITED STATES">UNITED STATES</option>
                                                <option value="UNITED STATES MINOR OUTLYING ISLANDS">UNITED STATES MINOR
                                                    OUTLYING ISLANDS</option>
                                                <option value="URUGUAY">URUGUAY</option>
                                                <option value="UZBEKISTAN">UZBEKISTAN</option>
                                                <option value="VANUATU">VANUATU</option>
                                                <option value="VENEZUELA">VENEZUELA</option>
                                                <option value="VIET NAM">VIET NAM</option>
                                                <option value="VIRGIN ISLANDS, BRITISH">VIRGIN ISLANDS, BRITISH</option>
                                                <option value="VIRGIN ISLANDS, U.S.">VIRGIN ISLANDS, U.S.</option>
                                                <option value="WALLIS AND FUTUNA">WALLIS AND FUTUNA</option>
                                                <option value="WESTERN SAHARA">WESTERN SAHARA</option>
                                                <option value="YEMEN">YEMEN</option>
                                                <option value="ZAMBIA">ZAMBIA</option>
                                                <option value="ZIMBABWE">ZIMBABWE</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="inputEmailAddress" class="form-label">Phone</label>
                                            <div class="input-group mb-3 align-items-center">
                                                <div>
                                                    <img id="flag" style="border-radius: 8px" height="35" width="40"
                                                        class="p-1"
                                                        src="../../fbsworldnetwork.com/member/images/flags/flag.png"
                                                        alt="">
                                                </div>
                                                <!--<span class="input-group-text" id="countryCode">+92 </span>-->
                                                <input style="width:60px" class="input-group-text" readonly
                                                    id="countryCode" type="text">
                                                <input name="phone" id="mobileNumber"
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                    type="text" class="form-control" placeholder="Mobile"
                                                    aria-label="Dollar amount (with dot and two decimal places)">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="product" class="form-label">Product Order</label>
                                            <select class="form-select" name="product" id="product"
                                                aria-label="Default select example">
                                                <option value="" hidden>Select product</option>
                                                <option value="1 Classic - $350">1 Classic - $350</option>
                                                <option value="3 Classic - $1050">3 Classic - $1050</option>
                                                <option value="10 Classic - $3500">10 Classic - $3500</option>
                                                <option value="1 PRO - $3500">1 PRO - $3500</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="agree" type="checkbox"
                                                    id="flexSwitchCheckChecked">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">I read and
                                                    agree to Terms & Conditions</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" name="sign_up" id="submit" value="Sign Up"
                                                    class="btn bg-gradient-rose-button text-white"><i
                                                        class='lni lni-user'></i>Submit</button>
                                            </div>
                                        </div>
                                        <div style="display:none;" id="checkRef"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="/ordernowpage/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="/ordernowpage/assets/js/jquery.min.js"></script>
    <script src="/ordernowpage/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="/ordernowpage/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="/ordernowpage/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="/ordernowpage/assets/js/jqueryValidator.min.js"></script>
    <!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="/ordernowpage/assets/js/app.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {

            if ($('#checkRef').text() == '1') {
                $('#uname').prop('readonly', true);

            } else {
                $('#uname').prop('readonly', false);
            }
            $('#validateMessage').hide();

        });

        //email check

        //   $("#email").keyup(function(){
        //       var email = $(this).val();

        //              $.post( "ajax/user_email_check.php",{email:email}, function( feedback ) {
        //                   $('#sponsorNameError').text(feedback);
        //              });
        //     })

        //email check end


        //email check

        $("#user-name").keyup(function() {
            var userName = $(this).val();

            $.post("ajax/usercheck-signup.html", {
                userchecktransfer: userName
            }, function(feedback) {
                $('#userNameError').text(feedback);
            });
        })

        //email check end




        //country select start 
        $("#country").change(function() {
            var country = $(this).val();
            if (country != '') {
                $.ajax({
                    url: "ajax/country.php?country=" + country,
                    success: function(result) {
                        if (result) {
                            var array = result.split('|');
                            var a = array[0];
                            var b = array[1];
                            b = b.toLowerCase();
                            $("#countryCode").val(a);
                            var img = "images/flags/" + b + ".svg";
                            $('#flag').attr('src', img);
                            $('#mobileNumber').focus();

                        }
                    }
                });
            }
        })
        //country select end
    </script>
    <script>
        //Form Validator
        $("#formSubmit").validate({

            rules: {

                sponsor_name: {
                    required: true
                },
                user_name: {
                    required: true
                },
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                address: {
                    required: true,
                },
                address2: {
                    required: true,
                },
                city: {
                    required: true,
                },
                state: {
                    required: true,
                },
                postal_code: {
                    required: true,
                },
                country_name: {
                    required: true
                },
                phone: {
                    required: true
                },
                product: {
                    required: true
                },
                agree: {
                    required: true
                }
            },
            messages: {


                sponsor_name: "Please enter sponsor name",
                user_name: "Please enter username",
                first_name: "Please enter first name",
                last_name: "Please enter last name",
                email: {
                    required: "Please provide email",
                    email: "Please enter a valid email address"
                },
                address: "Please enter address",
                address2: "Please enter address",
                city: "Please enter city",
                state: "Please enter state",
                postal_code: "Please enter postal code",
                country_name: "Please select country",
                phone: "Please enter phone number",
                product: "Plese select product",
                agree: "Please accept terms and conditions"
            },
            errorElement: "em",
            errorPlacement: function(error, element) {
                error.addClass("help-block");
                if (element.prop("type") === "password") {
                    error.insertAfter(element.parent(".input-group"));
                } else if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent(".form-switch"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid state-invalid").removeClass("is-valid state-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid state-valid").removeClass("is-invalid state-invalid");
            }

        });
    </script>


    <!--google translator-->
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>

    <script type="text/javascript"
        src="../../translate.google.com/translate_a/elementa0d8.js?cb=googleTranslateElementInit"></script>


</body>

<!-- Mirrored from earngasmoney.com/member/ordernow.php?user_name=gasmoney by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Apr 2022 16:20:10 GMT -->

</html>
