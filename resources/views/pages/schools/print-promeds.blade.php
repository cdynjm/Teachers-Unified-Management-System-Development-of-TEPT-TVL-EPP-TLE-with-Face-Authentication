@php
    use App\Models\Information\HighSchools;
    use App\Models\Information\ElementarySchools;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();

@endphp


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <style>
       #body-content {
            font-family: 'Calibri', 'Arial', sans-serif;
            font-size: 11px;
            
        }

        #table {
            width: 100%;
            border-collapse: collapse
        }

        #table tr th {
            border: 1px solid black;
        }

        #table tr td {
            text-align: center;
            border: 1px solid black;
            padding: 5px;
        }

    </style>
</head>
<body id="body-content">
    <center>
        <img src="{{ asset('storage/images/deped-logo.png') }}" style="color: black; width: 60px;" alt="">
        <div style="color: black; font-weight: bold; font-size: 11px;">Republic of the Philippines</div>
        <div style="color: black; font-weight: bold; font-size: 14px;">Department of Education</div>
        <div style="color: black; font-weight: bold; font-size: 11px;">REGION VIII - EASTERN VISAYAS</div>
        <div style="color: black; font-weight: bold; font-size: 11px;">SCHOOLS DIVISION OF SOUTHERN LEYTE</div>

        <div style="color: black; font-weight: bold; font-size: 18px; margin-top: 5px; font-family: serif">
            @if(Auth::user()->role == 1)
                @if($schoolType == 1)
                    {{ strtoupper(ElementarySchools::where('id', $aes->decrypt(Session::get('elementary')))->first()->school) }}
                @endif
                @if($schoolType == 2 || $schoolType == 3)
                    {{ strtoupper(HighSchools::where('id', $aes->decrypt(Session::get('highSchool')))->first()->school) }}
                @endif
                @if($seniorHigh != false)
                - SENIOR HIGH SCHOOL
                @endif
            @endif

            @if(Auth::user()->role == 2)
                @if($schoolType == 1)
                    {{ strtoupper(Auth::user()->ElementarySchools->school) }}
                @endif
                @if($schoolType == 2 || $schoolType == 3)
                    {{ strtoupper(Auth::user()->HighSchools->school) }}
                @endif
                @if($seniorHigh != false)
                - SENIOR HIGH SCHOOL
                @endif
            @endif
        </div>


        <div style="color: black; font-weight: bold; font-size: 20px; margin-top: 10px; font-family: serif">PROGRESS MONITORING & EVALUATION DATA SHEET - 

            @if($quarter == 1)
                FIRST QUARTER
            @endif
            @if($quarter == 2)
                SECOND QUARTER
            @endif
            @if($quarter == 3)
                THIRD QUARTER
            @endif
            @if($quarter == 4)
                FOURTH QUARTER
            @endif
        </div>

        <table id="table">
            <thead>
                <tr>
                    <th style="color: black; font-size: 20px; background: yellow; text-align: center">SUBJECT</th>
                    <th style="color: black; font-size: 15px; background: rgb(222, 239, 222); text-align: center">GRADE & <br> SECTION</th>
                    <th style="color: black; font-size: 20px; background: rgb(222, 239, 222); text-align: center">MPS</th>
                    <th style="color: black; font-size: 11px; background: rgb(222, 239, 222); text-align: center">Number <br> of <br> Students</th>
                    <th style="color: black; font-size: 11px; background: rgb(222, 239, 222); text-align: center">Outstanding <br> (98-100)</th>
                    <th style="color: black; font-size: 11px; background: rgb(222, 239, 222); text-align: center">Outstanding <br> (95-97)</th>
                    <th style="color: black; font-size: 11px; background: rgb(222, 239, 222); text-align: center">Outstanding <br> (90-94)</th>
                    <th style="color: black; font-size: 11px; background: rgb(222, 239, 222); text-align: center">Very <br> Satisfactory <br> (85-89)</th>
                    <th style="color: black; font-size: 11px; background: rgb(222, 239, 222); text-align: center">Satisfactory <br> (80-84)</th>
                    <th style="color: black; font-size: 11px; background: rgb(222, 239, 222); text-align: center">Fairly Satisfacto <br> ry (75-79)</th>
                    <th style="color: black; font-size: 11px; background: rgb(222, 239, 222); text-align: center">Did not <br> meet <br> Expectation <br> (Below 75)</th>
                    <th style="color: black; font-size: 11px; background: rgb(222, 239, 222); text-align: center">At risk <br> falling <br> in the <br> next <br> Quarter</th>
                    <th style="color: black; font-size: 11px; background: rgb(222, 239, 222); text-align: center">Average <br> computed <br> grade for <br> the <br> Quarter</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach ($promeds as $pm)
                <tr>
                    <td style="color: black; font-size: 12px; text-align: left"><span style="color: black; font-weight: bold; font-size: 12px;">{{ $count++ }}. </span>
                        
                        
                            @if($schoolType == 1)
                            <b>{{ $subject->ElementarySubjects->subject }}</b>
                            @endif
                            @if($schoolType == 2)
                                @if($type == 1)
                                    @if($subject->tve_tle == 1)
                                        <b>{{ $subject->TLETVESubjects->subject }}</b>
                                    @else
                                        <b>{{ $subject->HighSchoolSubjects->subject }}</b>
                                    @endif
                                @endif
                                @if($type == 2)
                                    @if($subject->strand == 1)
                                        <b>{{ $subject->Strands->subject }}</b>
                                    @else
                                        <b>{{ $subject->SeniorHighSchoolSubjects->subject }}</b>
                                    @endif
                                @endif
                            @endif
                            @if($schoolType == 3)
                                @if($subject->strand == 1)
                                    <b>{{ $subject->Strands->subject }}</b>
                                @else
                                    <b>{{ $subject->SeniorHighSchoolSubjects->subject }}</b>
                                @endif
                            @endif
                        
                        
                        
                    </td>
                    <td style="color: black; font-size: 12px;">{{ $pm->yearLevel }} - {{ $pm->section }}</td>
                    <td style="color: black; font-size: 12px;">{{ $pm->mps }}</td>
                    <td style="color: black; font-size: 12px;">{{ $pm->students }}</td>
                    <td style="color: black; font-size: 12px;">{{ $pm->out1 }}</td>
                    <td style="color: black; font-size: 12px;">{{ $pm->out2 }}</td>
                    <td style="color: black; font-size: 12px;">{{ $pm->out3 }}</td>
                    <td style="color: black; font-size: 12px;">{{ $pm->very }}</td>
                    <td style="color: black; font-size: 12px;">{{ $pm->sat }}</td>
                    <td style="color: black; font-size: 12px;">{{ $pm->fair }}</td>
                    <td style="color: black; font-size: 12px;">{{ $pm->didnot }}</td>
                    <td style="color: black; font-size: 12px;">{{ $pm->atrisk }}</td>
                    <td style="color: black; font-size: 12px;">{{ $pm->average }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </center>

    <div style="color: black; font-size: 15px; font-weight: bold; margin-left: 10px;">Least Learned Competencies: </div>
   
    <center>
        <br>
        <div style="color: black; border-bottom: 1px solid black; width: 98.5%"></div>
        <br>
        <div style="color: black; border-bottom: 1px solid black; width: 98.5%"></div>
        <br>
        <div style="color: black; border-bottom: 1px solid black; width: 98.5%"></div>
    </center>

    <br>
    <div style="color: black; font-size: 13px; margin-left: 10px;">Prepared By:π</div>
    <br>
    <input value="{{ strtoupper($teacher) }}" type="text" style="color: black; border: none; border-bottom: 1px solid black; margin-left: 10px; font-size: 14px; text-align: center; font-weight: bold; width:25%">
    <br>
    <div style="margin-top: 10px; color: black; font-size: 13px; font-weight: bold; margin-left: 10px;">Subject Teacher</div>
   
</body>
</html>