<table class="table align-items-center mb-0" id="elementary-school-mps-data-result">
    <thead>
        <tr>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Subject</th>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                1st Quarter</th>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                2nd Quarter</th>
             <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                3rd Quarter</th> 
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                4th Quarter</th>      
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Average</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($elementaryMPS->groupBy('yearLevel') as $yearLevel => $subjects)
       <tr>
           <td colspan="7" class="fw-bolder bg-gray-200">Grade {{ $yearLevel }} | <span class="text-xs fw-normal">Students: {{ $subjects->first()->students }}</span>           </td>
       </tr>
       @foreach ($subjects as $index => $sub)
           <tr>
               <td class="text-sm"
               
               id="{{ $aes->encrypt($sub->id) }}"
               schoolID="{{ $aes->encrypt($sub->schoolID) }}"
               yearLevel="{{ $yearLevel }}"
               subject="{{ $sub->ElementarySubjects->subject }}"
               first="{{ $sub->first }}"
               second="{{ $sub->second }}"
               third="{{ $sub->third }}"
               fourth="{{ $sub->fourth }}"

               >
                   <p class="ms-3 text-sm fw-bolder mb-0 text-wrap">{{ $sub->ElementarySubjects->subject }}</p>
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
           </tr>
        @endforeach

        <tr>
            <td colspan="6">
                <div id="elem-chart-{{ $loop->index }}"></div>
            </td>
        </tr>

        <script>

            var options = {
                  series: [
                    
                        {
                        name: 'First',
                        data: [

                        @foreach ($subjects as $index => $mps)
                            @if(!empty($mps->first))
                                {{ $mps->first }},
                            @else
                                0,
                            @endif
                        @endforeach

                        ]
                        }, {
                        name: 'Second',
                        data: [

                        @foreach ($subjects as $index => $mps)
                            @if(!empty($mps->second))
                                {{ $mps->second }},
                            @else
                                0,
                            @endif
                        @endforeach

                        ]
                        }, {
                        name: 'Third',
                        data: [

                        @foreach ($subjects as $index => $mps)
                            @if(!empty($mps->third))
                                {{ $mps->third }},
                            @else
                                0,
                            @endif
                        @endforeach

                        ]
                        },
                        {
                        name: 'Fourth',
                        data: [

                        @foreach ($subjects as $index => $mps)
                            @if(!empty($mps->fourth))
                                {{ $mps->fourth }},
                            @else
                                0,
                            @endif
                        @endforeach

                        ]
                        }
                    
                ],
                  chart: {
                  type: 'bar',
                  height: 350
                },
                plotOptions: {
                  bar: {
                    horizontal: false,
                    columnWidth: '20%',
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
                        '{{ $subject->ElementarySubjects->subject }}',
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
        
                var chart = new ApexCharts(document.querySelector("#elem-chart-{{ $loop->index }}"), options);
                chart.render();
        </script>

    @endforeach
    </tbody>
</table>