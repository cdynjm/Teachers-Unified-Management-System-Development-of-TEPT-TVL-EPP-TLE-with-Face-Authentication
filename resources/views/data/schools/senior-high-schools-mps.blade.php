<table class="table align-items-center mb-0" id="senior-high-school-mps-data-result">
    <thead>
        <tr>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Subject</th>
            <th colspan="2" class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Quarters
            </th> 
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Average</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Actions</th>
        </tr>
    </thead>
    <tbody>
    
       @foreach ($seniorHighSchoolMPS->groupBy('yearLevel') as $yearLevel => $subjects)
       <tr>
        <td colspan="7" class="fw-bolder bg-gray-200"
           
        schoolID="{{ $aes->encrypt($subjects->first()->schoolID) }}"
        yearLevel="{{ $yearLevel }}"
        students="{{ $subjects->first()->students }}"

        >
         <a href="javascript:;" id="edit-senior-high-school-total-students" class="text-secondary font-weight-bold text-xs me-2"
             data-toggle="tooltip">
             <i class="fas fa-pen-alt text-sm"></i>
         </a>
         Grade {{ $yearLevel }} | <span class="text-xs fw-normal">Students: {{ $subjects->first()->students }}</span>
     </td>
       </tr>
       <tr>
            <td colspan="7" class="fw-bold bg-gray-100 text-sm">1st Semester</td>
        </tr>
        <tr>
            <td></td>
            <td class="fw-normal text-start text-xs">1st Quarter</td>
            <td class="fw-normal text-start text-xs">2nd Quarter</td>
            <td></td>
            <td></td>
        </tr>
        @foreach ($subjects as $index => $sub)
            @if($sub->Strands->semester == 1 && $sub->Strands->yearLevel == $yearLevel)
                <tr>
                    <td
                    
                    id="{{ $aes->encrypt($sub->id) }}"
                    schoolID="{{ $aes->encrypt($sub->schoolID) }}"
                    yearLevel="{{ $yearLevel }}"
                    subject="{{ $sub->Strands->subject }}"
                    first="{{ $sub->first }}"
                    second="{{ $sub->second }}"
                    semester='1'
                    
                    >
                        <p class="ms-3 text-sm fw-bolder mb-0">{{ $sub->Strands->subject }}</p>
                    </td>
                    <td class="text-start">
                        <p class="ms-3 text-sm fw-normal mb-0">
                            @if(empty($sub->first))
                                <span class="text-danger">---</span>
                            @else
                                {{ $sub->first }}
                            @endif
                        
                        </p>
                   </td>
                   <td class="text-start">
                        <p class="ms-3 text-sm fw-normal mb-0">
                            @if(empty($sub->second))
                                <span class="text-danger">---</span>
                            @else
                                {{ $sub->second }}
                            @endif
                        </p>
                   </td>
                   <td class="text-center">
                        <p class="ms-3 text-sm fw-normal mb-0">
                            @if(empty($sub->mps))
                                <span class="text-danger">---</span>
                            @else
                                {{ $sub->mps }}
                            @endif
                        </p>
                    </td>
                   <td class="text-center">
                       <a href="javascript:;" id="edit-senior-high-school-subject-mps" class="text-secondary font-weight-bold text-xs me-2"
                           data-toggle="tooltip">
                           <i class="fas fa-pen-alt text-sm"></i>
                       </a>
                   </td>
                </tr>
            @endif
            @if($sub->Strands->semester == null && $sub->Strands->yearLevel == $yearLevel)
                <tr>
                    <td
                    
                    id="{{ $aes->encrypt($sub->id) }}"
                    schoolID="{{ $aes->encrypt($sub->schoolID) }}"
                    yearLevel="{{ $yearLevel }}"
                    subject="{{ $sub->Strands->subject }}"
                    first="{{ $sub->first }}"
                    second="{{ $sub->second }}"
                    semester='1'
                    
                    >
                        <p class="ms-3 text-sm fw-bolder mb-0">{{ $sub->Strands->subject }}</p>
                    </td>
                    <td class="text-start">
                        <p class="ms-3 text-sm fw-normal mb-0">
                            @if(empty($sub->first))
                                <span class="text-danger">---</span>
                            @else
                                {{ $sub->first }}
                            @endif
                        
                        </p>
                   </td>
                   <td class="text-start">
                        <p class="ms-3 text-sm fw-normal mb-0">
                            @if(empty($sub->second))
                                <span class="text-danger">---</span>
                            @else
                                {{ $sub->second }}
                            @endif
                        </p>
                   </td>
                   <td class="text-center">
                        <p class="ms-3 text-sm fw-normal mb-0">
                            @if(empty($sub->mps))
                                <span class="text-danger">---</span>
                            @else
                                {{ $sub->mps }}
                            @endif
                        </p>
                    </td>
                   <td class="text-center">
                       <a href="javascript:;" id="edit-senior-high-school-subject-mps" class="text-secondary font-weight-bold text-xs me-2"
                           data-toggle="tooltip">
                           <i class="fas fa-pen-alt text-sm"></i>
                       </a>
                   </td>
                </tr>
            @endif
            @if($sub->Strands->semester == null && $sub->Strands->yearLevel == null)
                <tr>
                    <td
                    
                    id="{{ $aes->encrypt($sub->id) }}"
                    schoolID="{{ $aes->encrypt($sub->schoolID) }}"
                    yearLevel="{{ $yearLevel }}"
                    subject="{{ $sub->Strands->subject }}"
                    first="{{ $sub->first }}"
                    second="{{ $sub->second }}"
                    semester='1'
                    
                    >
                        <p class="ms-3 text-sm fw-bolder mb-0">{{ $sub->Strands->subject }}</p>
                    </td>
                    <td class="text-start">
                        <p class="ms-3 text-sm fw-normal mb-0">
                            @if(empty($sub->first))
                                <span class="text-danger">---</span>
                            @else
                                {{ $sub->first }}
                            @endif
                        
                        </p>
                   </td>
                   <td class="text-start">
                        <p class="ms-3 text-sm fw-normal mb-0">
                            @if(empty($sub->second))
                                <span class="text-danger">---</span>
                            @else
                                {{ $sub->second }}
                            @endif
                        </p>
                   </td>
                   <td class="text-center">
                        <p class="ms-3 text-sm fw-normal mb-0">
                            @if(empty($sub->mps))
                                <span class="text-danger">---</span>
                            @else
                                {{ $sub->mps }}
                            @endif
                        </p>
                    </td>
                   <td class="text-center">
                       <a href="javascript:;" id="edit-senior-high-school-subject-mps" class="text-secondary font-weight-bold text-xs me-2"
                           data-toggle="tooltip">
                           <i class="fas fa-pen-alt text-sm"></i>
                       </a>
                   </td>
                </tr>
            @endif
        @endforeach

        <tr>
            <td colspan="7">
                <div id="shs-1st-chart-{{ $loop->index }}"></div>
            </td>
        </tr>

        <script>

            var options = {
                  series: [
                    
                        {
                        name: 'First',
                        data: [

                        @foreach ($subjects as $index => $subject)
                            @if($subject->Strands->semester == 1 && $subject->Strands->yearLevel == $yearLevel)
                                @if(!empty($subject->first))
                                    '{{ $subject->first }}',
                                @else
                                    0,
                                @endif
                            @endif
                            @if($subject->Strands->semester == null && $subject->Strands->yearLevel == $yearLevel)
                                @if(!empty($subject->first))
                                    '{{ $subject->first }}',
                                @else
                                    0,
                                @endif
                            @endif
                            @if($subject->Strands->semester == null && $subject->Strands->yearLevel == null)
                                @if(!empty($subject->first))
                                    '{{ $subject->first }}',
                                @else
                                    0,
                                @endif
                            @endif
                        @endforeach

                        ]
                        }, {
                        name: 'Second',
                        data: [

                        @foreach ($subjects as $index => $subject)
                            @if($subject->Strands->semester == 1 && $subject->Strands->yearLevel == $yearLevel)
                                @if(!empty($subject->first))
                                    '{{ $subject->second }}',
                                @else
                                    0,
                                @endif
                            @endif
                            @if($subject->Strands->semester == null && $subject->Strands->yearLevel == $yearLevel)
                                @if(!empty($subject->first))
                                    '{{ $subject->second }}',
                                @else
                                    0,
                                @endif
                            @endif
                            @if($subject->Strands->semester == null && $subject->Strands->yearLevel == null)
                                @if(!empty($subject->first))
                                    '{{ $subject->second }}',
                                @else
                                    0,
                                @endif
                            @endif
                        @endforeach

                        ]
                        }, 
                    
                ],
                  chart: {
                  type: 'bar',
                  height: 350
                },
                plotOptions: {
                  bar: {
                    horizontal: false,
                    columnWidth: '30%',
                    endingShape: 'rounded'
                  },
                },
                dataLabels: {
                  enabled: false
                },
                stroke: {
                  show: true,
                  width: 2,
                  colors: ['transparent']
                },
                xaxis: {
                  categories: [
                    @foreach ($subjects as $index => $subject)
                        @if($subject->Strands->semester == 1 && $subject->Strands->yearLevel == $yearLevel)
                            '{{ $subject->Strands->subject }}',
                        @endif
                        @if($subject->Strands->semester == null && $subject->Strands->yearLevel == $yearLevel)
                            '{{ $subject->Strands->subject }}',
                        @endif
                        @if($subject->Strands->semester == null && $subject->Strands->yearLevel == null)
                            '{{ $subject->Strands->subject }}',
                        @endif
                    @endforeach
                  ],
                },
                yaxis: {
                  title: {
                    text: 'Data Analytics'
                  }
                },
                fill: {
                  opacity: 1
                },
                tooltip: {
                  y: {
                    formatter: function (val) {
                      return "MPS: " + val + " Rating"
                    }
                  }
                }
                };
        
                var chart = new ApexCharts(document.querySelector("#shs-1st-chart-{{ $loop->index }}"), options);
                chart.render();
        </script>

        <tr>
            <td colspan="7" class="fw-bold bg-gray-100 text-sm">2nd Semester</td>
        </tr>
        <tr>
            <td></td>
            <td class="fw-normal text-start text-xs">3rd Quarter</td>
            <td class="fw-normal text-start text-xs">4th Quarter</td>
            <td></td>
            <td></td>
        </tr>
        @foreach ($subjects as $index => $sub)
            @if($sub->Strands->semester == 2 && $sub->Strands->yearLevel == $yearLevel)
                <tr>
                    <td
                    
                    id="{{ $aes->encrypt($sub->id) }}"
                    schoolID="{{ $aes->encrypt($sub->schoolID) }}"
                    yearLevel="{{ $yearLevel }}"
                    subject="{{ $sub->Strands->subject }}"
                    third="{{ $sub->third }}"
                    fourth="{{ $sub->fourth }}"
                    semester='2'
                    
                    >
                        <p class="ms-3 text-sm fw-bolder mb-0">{{ $sub->Strands->subject }}</p>
                    </td>
                    
                   <td class="text-start">
                        <p class="ms-3 text-sm fw-normal mb-0">
                            @if(empty($sub->third))
                                <span class="text-danger">---</span>
                            @else
                                {{ $sub->third }}
                            @endif
                        </p>
                   </td>
                   <td class="text-start">
                        <p class="ms-3 text-sm fw-normal mb-0">
                            @if(empty($sub->fourth))
                                <span class="text-danger">---</span>
                            @else
                                {{ $sub->fourth }}
                            @endif
                        </p>
                   </td>
                   <td class="text-center">
                        <p class="ms-3 text-sm fw-normal mb-0">
                            @if(empty($sub->mps))
                                <span class="text-danger">---</span>
                            @else
                                {{ $sub->mps }}
                            @endif
                        </p>
                    </td>
                   <td class="text-center">
                       <a href="javascript:;" id="edit-senior-high-school-subject-mps" class="text-secondary font-weight-bold text-xs me-2"
                           data-toggle="tooltip">
                           <i class="fas fa-pen-alt text-sm"></i>
                       </a>
                   </td>
                </tr>
            @endif
            @if($sub->Strands->semester == null && $sub->Strands->yearLevel == $yearLevel)
            <tr>
                <td
                    
                    id="{{ $aes->encrypt($sub->id) }}"
                    schoolID="{{ $aes->encrypt($sub->schoolID) }}"
                    yearLevel="{{ $yearLevel }}"
                    subject="{{ $sub->Strands->subject }}"
                    third="{{ $sub->third }}"
                    fourth="{{ $sub->fourth }}"
                    semester='2'
                    
                    >
                    <p class="ms-3 text-sm fw-bolder mb-0">{{ $sub->Strands->subject }}</p>
                </td>
                
               <td class="text-start">
                    <p class="ms-3 text-sm fw-normal mb-0">
                        @if(empty($sub->third))
                            <span class="text-danger">---</span>
                        @else
                            {{ $sub->third }}
                        @endif
                    </p>
               </td>
               <td class="text-start">
                    <p class="ms-3 text-sm fw-normal mb-0">
                        @if(empty($sub->fourth))
                            <span class="text-danger">---</span>
                        @else
                            {{ $sub->fourth }}
                        @endif
                    </p>
               </td>
               <td class="text-center">
                    <p class="ms-3 text-sm fw-normal mb-0">
                        @if(empty($sub->mps))
                            <span class="text-danger">---</span>
                        @else
                            {{ $sub->mps }}
                        @endif
                    </p>
                </td>
               <td class="text-center">
                   <a href="javascript:;" id="edit-senior-high-school-subject-mps" class="text-secondary font-weight-bold text-xs me-2"
                       data-toggle="tooltip">
                       <i class="fas fa-pen-alt text-sm"></i>
                   </a>
               </td>
            </tr>
            @endif
            @if($sub->Strands->semester == null && $sub->Strands->yearLevel == null)
                <tr>
                    <td
                    
                    id="{{ $aes->encrypt($sub->id) }}"
                    schoolID="{{ $aes->encrypt($sub->schoolID) }}"
                    yearLevel="{{ $yearLevel }}"
                    subject="{{ $sub->Strands->subject }}"
                    third="{{ $sub->third }}"
                    fourth="{{ $sub->fourth }}"
                    semester='2'
                    
                    >
                        <p class="ms-3 text-sm fw-bolder mb-0">{{ $sub->Strands->subject }}</p>
                    </td>
                    
                   <td class="text-start">
                        <p class="ms-3 text-sm fw-normal mb-0">
                            @if(empty($sub->third))
                                <span class="text-danger">---</span>
                            @else
                                {{ $sub->third }}
                            @endif
                        </p>
                   </td>
                   <td class="text-start">
                        <p class="ms-3 text-sm fw-normal mb-0">
                            @if(empty($sub->fourth))
                                <span class="text-danger">---</span>
                            @else
                                {{ $sub->fourth }}
                            @endif
                        </p>
                   </td>
                   <td class="text-center">
                        <p class="ms-3 text-sm fw-normal mb-0">
                            @if(empty($sub->mps))
                                <span class="text-danger">---</span>
                            @else
                                {{ $sub->mps }}
                            @endif
                        </p>
                    </td>
                   <td class="text-center">
                       <a href="javascript:;" id="edit-senior-high-school-subject-mps" class="text-secondary font-weight-bold text-xs me-2"
                           data-toggle="tooltip">
                           <i class="fas fa-pen-alt text-sm"></i>
                       </a>
                   </td>
                </tr>
            @endif
        @endforeach

        <tr>
            <td colspan="7">
                <div id="shs-2nd-chart-{{ $loop->index }}"></div>
            </td>
        </tr>

        <script>

            var options = {
                  series: [
                    
                        {
                        name: 'Third',
                        data: [

                        @foreach ($subjects as $index => $subject)
                            @if($subject->Strands->semester == 2 && $subject->Strands->yearLevel == $yearLevel)
                                @if(!empty($subject->third))
                                    '{{ $subject->third }}',
                                @else
                                    0,
                                @endif
                            @endif
                            @if($subject->Strands->semester == null && $subject->Strands->yearLevel == $yearLevel)
                                @if(!empty($subject->third))
                                    '{{ $subject->third }}',
                                @else
                                    0,
                                @endif
                            @endif
                            @if($subject->Strands->semester == null && $subject->Strands->yearLevel == null)
                                @if(!empty($subject->third))
                                    '{{ $subject->third }}',
                                @else
                                    0,
                                @endif
                            @endif
                        @endforeach

                        ]
                        }, {
                        name: 'Fourth',
                        data: [

                        @foreach ($subjects as $index => $subject)
                            @if($subject->Strands->semester == 2 && $subject->Strands->yearLevel == $yearLevel)
                                @if(!empty($subject->fourth))
                                    '{{ $subject->fourth }}',
                                @else
                                    0,
                                @endif
                            @endif
                            @if($subject->Strands->semester == null && $subject->Strands->yearLevel == $yearLevel)
                                @if(!empty($subject->fourth))
                                    '{{ $subject->fourth }}',
                                @else
                                    0,
                                @endif
                            @endif
                            @if($subject->Strands->semester == null && $subject->Strands->yearLevel == null)
                                @if(!empty($subject->fourth))
                                    '{{ $subject->fourth }}',
                                @else
                                    0,
                                @endif
                            @endif
                        @endforeach

                        ]
                        }, 
                    
                ],
                  chart: {
                  type: 'bar',
                  height: 350
                },
                plotOptions: {
                  bar: {
                    horizontal: false,
                    columnWidth: '30%',
                    endingShape: 'rounded'
                  },
                },
                dataLabels: {
                  enabled: false
                },
                stroke: {
                  show: true,
                  width: 2,
                  colors: ['transparent']
                },
                xaxis: {
                  categories: [
                    @foreach ($subjects as $index => $subject)
                        @if($subject->Strands->semester == 2 && $subject->Strands->yearLevel == $yearLevel)
                            '{{ $subject->Strands->subject }}',
                        @endif
                        @if($subject->Strands->semester == null && $subject->Strands->yearLevel == $yearLevel)
                            '{{ $subject->Strands->subject }}',
                        @endif
                        @if($subject->Strands->semester == null && $subject->Strands->yearLevel == null)
                            '{{ $subject->Strands->subject }}',
                        @endif
                    @endforeach
                  ],
                },
                yaxis: {
                  title: {
                    text: 'Data Analytics'
                  }
                },
                fill: {
                  opacity: 1
                },
                tooltip: {
                  y: {
                    formatter: function (val) {
                      return "MPS: " + val + " Rating"
                    }
                  }
                }
                };
        
                var chart = new ApexCharts(document.querySelector("#shs-2nd-chart-{{ $loop->index }}"), options);
                chart.render();
        </script>
        @endforeach
    </tbody>
</table>