<div class="row" id="promeds-result">
    <div class="col-md-12 mb-4">
        <h6 class="mt-0 mb-3 fw-bolder text-uppercase">Progress Monitoring & Evaluation Data Sheet</h6>
        <p class="text-sm"><b>1st Quarter</b></p>
        <button id="download-pdf" class="btn btn-xs bg-gradient-success fw-normal" data-quarter="1" data-quarter-name="1st-Quarter"><i class="fa-solid fa-file-pdf"></i> Download</button>
        <div class="table-responsive mb-4 p-4">
            <table class="table align-items-center mb-0 text-xs text-center table-hover text-nowrap">
                <thead>
                    <tr>
                        
                        <th>Section</th>
                        <th>MPS</th>
                        <th>No. of Students</th>
                        <th>Outstanding (98-100)</th>
                        <th>Outstanding (95-97)</th>
                        <th>Outstanding (90-94)</th>
                        <th>Very Satisfactory (85-89)</th>
                        <th>Satisfactory (80-84)</th>
                        <th>Fairly Satisfactory (75-79)</th>
                        <th>Did not meet Expectation (Below 75)</th>
                        <th>At risk falling in the next Quarter</th>
                        <th>Average computed grade for the Quarter</th>
                    </tr>
                </thead>
                <tbody id="first-table-body">
                    @foreach ($promeds->where('quarter', 1) as $pm)
                        <tr>
                            
                            <td><span class="text-sm">{{ $pm->section }}</span></td>
                            <td><span class="text-sm">{{ $pm->mps }}</span></td>
                            <td><span class="text-sm">{{ $pm->students }}</span></td>
                            <td><span class="text-sm">{{ $pm->out1 }}</span></td>
                            <td><span class="text-sm">{{ $pm->out2 }}</span></td>
                            <td><span class="text-sm">{{ $pm->out3 }}</span></td>
                            <td><span class="text-sm">{{ $pm->very }}</span></td>
                            <td><span class="text-sm">{{ $pm->sat }}</span></td>
                            <td><span class="text-sm">{{ $pm->fair }}</span></td>
                            <td><span class="text-sm">{{ $pm->didnot }}</span></td>
                            <td><span class="text-sm">{{ $pm->atrisk }}</span></td>
                            <td><span class="text-sm">{{ $pm->average }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">

            @foreach ($promeds->where('quarter', 1) as $pm)
                <div class="col-md-6">
                    <div class="">
                        <div id="first-chart-{{ $loop->index }}"></div>
                    </div>
                </div>

                <script>
                     var options = {
                        series: [{
                            name: 'Performance',
                            data: [
                                {{ $pm->out1 }},
                                {{ $pm->out2 }},
                                {{ $pm->out3 }},
                                {{ $pm->very }},
                                {{ $pm->sat }},
                                {{ $pm->fair }},
                                {{ $pm->didnot }},
                                {{ $pm->atrisk }},
                            ]
                        }],
                        chart: {
                            type: 'bar', // Change to 'bar' to create a bar graph
                            height: 350,
                            toolbar: {
                                show: false // Hide toolbar if not needed
                            }
                        },
                        labels: [
                            'Outstanding (98-100)',
                            'Outstanding (95-97)',
                            'Outstanding (90-94)',
                            'Very Satisfactory (85-89)',
                            'Satisfactory (80-84)',
                            'Fairly Satisfactory (75-79)',
                            'Did not meet Expectation (Below 75)',
                            'At risk falling in the next Quarter'
                        ],
                        title: {
                            text: '{{ $pm->yearLevel }} - {{ $pm->section }}',
                            align: 'center',
                            style: {
                                fontSize: '16px',
                                fontWeight: 'bold',
                                color: '#263238'
                            }
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4, // Optional rounded corners
                                horizontal: true, // Set to 'false' for vertical bars (classic bar chart)
                            }
                        },
                        xaxis: {
                            categories: [
                                'Outstanding (98-100)',
                                'Outstanding (95-97)',
                                'Outstanding (90-94)',
                                'Very Satisfactory (85-89)',
                                'Satisfactory (80-84)',
                                'Fairly Satisfactory (75-79)',
                                'Did not meet Expectation (Below 75)',
                                'At risk falling in the next Quarter'
                            ],
                            labels: {
                                rotate: -45 // Rotate x-axis labels for better readability
                            }
                        },
                        yaxis: {
                            title: {
                                text: 'Number of Students'
                            }
                        },
                        fill: {
                            opacity: 1 // Ensure full bar color fill
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 300
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                    };

                    var chart = new ApexCharts(document.querySelector("#first-chart-{{ $loop->index }}"), options);
                    chart.render();
                </script>
            @endforeach
        </div>

    </div>
    <div class="col-md-12 mb-4">
        <p class="text-sm"><b>2nd Quarter</b></p>
        <button id="download-pdf" class="btn btn-xs bg-gradient-success fw-normal" data-quarter="2" data-quarter-name="2nd-Quarter"><i class="fa-solid fa-file-pdf"></i> Download</button>
        <div class="table-responsive mb-4 p-4">
            <table class="table align-items-center mb-0 text-xs text-center table-hover text-nowrap">
                <thead>
                    <tr>
                        
                        <th>Section</th>
                        <th>MPS</th>
                        <th>No. of Students</th>
                        <th>Outstanding (98-100)</th>
                        <th>Outstanding (95-97)</th>
                        <th>Outstanding (90-94)</th>
                        <th>Very Satisfactory (85-89)</th>
                        <th>Satisfactory (80-84)</th>
                        <th>Fairly Satisfactory (75-79)</th>
                        <th>Did not meet Expectation (Below 75)</th>
                        <th>At risk falling in the next Quarter</th>
                        <th>Average computed grade for the Quarter</th>
                    </tr>
                </thead>
                <tbody id="second-table-body">
                    @foreach ($promeds->where('quarter', 2) as $pm)
                        <tr>
                            
                            <td><span class="text-sm">{{ $pm->section }}</span></td>
                            <td><span class="text-sm">{{ $pm->mps }}</span></td>
                            <td><span class="text-sm">{{ $pm->students }}</span></td>
                            <td><span class="text-sm">{{ $pm->out1 }}</span></td>
                            <td><span class="text-sm">{{ $pm->out2 }}</span></td>
                            <td><span class="text-sm">{{ $pm->out3 }}</span></td>
                            <td><span class="text-sm">{{ $pm->very }}</span></td>
                            <td><span class="text-sm">{{ $pm->sat }}</span></td>
                            <td><span class="text-sm">{{ $pm->fair }}</span></td>
                            <td><span class="text-sm">{{ $pm->didnot }}</span></td>
                            <td><span class="text-sm">{{ $pm->atrisk }}</span></td>
                            <td><span class="text-sm">{{ $pm->average }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">

            @foreach ($promeds->where('quarter', 2) as $pm)
                <div class="col-md-6">
                    <div class="">
                        <div id="second-chart-{{ $loop->index }}"></div>
                    </div>
                </div>

                <script>
                     var options = {
                        series: [{
                            name: 'Performance',
                            data: [
                                {{ $pm->out1 }},
                                {{ $pm->out2 }},
                                {{ $pm->out3 }},
                                {{ $pm->very }},
                                {{ $pm->sat }},
                                {{ $pm->fair }},
                                {{ $pm->didnot }},
                                {{ $pm->atrisk }},
                            ]
                        }],
                        chart: {
                            type: 'bar', // Change to 'bar' to create a bar graph
                            height: 350,
                            toolbar: {
                                show: false // Hide toolbar if not needed
                            }
                        },
                        labels: [
                            'Outstanding (98-100)',
                            'Outstanding (95-97)',
                            'Outstanding (90-94)',
                            'Very Satisfactory (85-89)',
                            'Satisfactory (80-84)',
                            'Fairly Satisfactory (75-79)',
                            'Did not meet Expectation (Below 75)',
                            'At risk falling in the next Quarter'
                        ],
                        title: {
                            text: '{{ $pm->yearLevel }} - {{ $pm->section }}',
                            align: 'center',
                            style: {
                                fontSize: '16px',
                                fontWeight: 'bold',
                                color: '#263238'
                            }
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4, // Optional rounded corners
                                horizontal: true, // Set to 'false' for vertical bars (classic bar chart)
                            }
                        },
                        xaxis: {
                            categories: [
                                'Outstanding (98-100)',
                                'Outstanding (95-97)',
                                'Outstanding (90-94)',
                                'Very Satisfactory (85-89)',
                                'Satisfactory (80-84)',
                                'Fairly Satisfactory (75-79)',
                                'Did not meet Expectation (Below 75)',
                                'At risk falling in the next Quarter'
                            ],
                            labels: {
                                rotate: -45 // Rotate x-axis labels for better readability
                            }
                        },
                        yaxis: {
                            title: {
                                text: 'Number of Students'
                            }
                        },
                        fill: {
                            opacity: 1 // Ensure full bar color fill
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 300
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                    };

                    var chart = new ApexCharts(document.querySelector("#second-chart-{{ $loop->index }}"), options);
                    chart.render();
                </script>
            @endforeach
        </div>
    </div>
    <div class="col-md-12 mb-4">
        <p class="text-sm"><b>3rd Quarter</b></p>
        <button id="download-pdf" class="btn btn-xs bg-gradient-success fw-normal" data-quarter="3" data-quarter-name="3rd-Quarter"><i class="fa-solid fa-file-pdf"></i> Download</button>
        <div class="table-responsive mb-4 p-4">
            <table class="table align-items-center mb-0 text-xs text-center table-hover text-nowrap">
                <thead>
                    <tr>
                        
                        <th>Section</th>
                        <th>MPS</th>
                        <th>No. of Students</th>
                        <th>Outstanding (98-100)</th>
                        <th>Outstanding (95-97)</th>
                        <th>Outstanding (90-94)</th>
                        <th>Very Satisfactory (85-89)</th>
                        <th>Satisfactory (80-84)</th>
                        <th>Fairly Satisfactory (75-79)</th>
                        <th>Did not meet Expectation (Below 75)</th>
                        <th>At risk falling in the next Quarter</th>
                        <th>Average computed grade for the Quarter</th>
                    </tr>
                </thead>
                <tbody id="third-table-body">
                    @foreach ($promeds->where('quarter', 3) as $pm)
                        <tr>
                            
                            <td><span class="text-sm">{{ $pm->section }}</span></td>
                            <td><span class="text-sm">{{ $pm->mps }}</span></td>
                            <td><span class="text-sm">{{ $pm->students }}</span></td>
                            <td><span class="text-sm">{{ $pm->out1 }}</span></td>
                            <td><span class="text-sm">{{ $pm->out2 }}</span></td>
                            <td><span class="text-sm">{{ $pm->out3 }}</span></td>
                            <td><span class="text-sm">{{ $pm->very }}</span></td>
                            <td><span class="text-sm">{{ $pm->sat }}</span></td>
                            <td><span class="text-sm">{{ $pm->fair }}</span></td>
                            <td><span class="text-sm">{{ $pm->didnot }}</span></td>
                            <td><span class="text-sm">{{ $pm->atrisk }}</span></td>
                            <td><span class="text-sm">{{ $pm->average }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">

            @foreach ($promeds->where('quarter', 3) as $pm)
                <div class="col-md-6">
                    <div class="">
                        <div id="third-chart-{{ $loop->index }}"></div>
                    </div>
                </div>

                <script>
                    var options = {
                        series: [{
                            name: 'Performance',
                            data: [
                                {{ $pm->out1 }},
                                {{ $pm->out2 }},
                                {{ $pm->out3 }},
                                {{ $pm->very }},
                                {{ $pm->sat }},
                                {{ $pm->fair }},
                                {{ $pm->didnot }},
                                {{ $pm->atrisk }},
                            ]
                        }],
                        chart: {
                            type: 'bar', // Change to 'bar' to create a bar graph
                            height: 350,
                            toolbar: {
                                show: false // Hide toolbar if not needed
                            }
                        },
                        labels: [
                            'Outstanding (98-100)',
                            'Outstanding (95-97)',
                            'Outstanding (90-94)',
                            'Very Satisfactory (85-89)',
                            'Satisfactory (80-84)',
                            'Fairly Satisfactory (75-79)',
                            'Did not meet Expectation (Below 75)',
                            'At risk falling in the next Quarter'
                        ],
                        title: {
                            text: '{{ $pm->yearLevel }} - {{ $pm->section }}',
                            align: 'center',
                            style: {
                                fontSize: '16px',
                                fontWeight: 'bold',
                                color: '#263238'
                            }
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4, // Optional rounded corners
                                horizontal: true, // Set to 'false' for vertical bars (classic bar chart)
                            }
                        },
                        xaxis: {
                            categories: [
                                'Outstanding (98-100)',
                                'Outstanding (95-97)',
                                'Outstanding (90-94)',
                                'Very Satisfactory (85-89)',
                                'Satisfactory (80-84)',
                                'Fairly Satisfactory (75-79)',
                                'Did not meet Expectation (Below 75)',
                                'At risk falling in the next Quarter'
                            ],
                            labels: {
                                rotate: -45 // Rotate x-axis labels for better readability
                            }
                        },
                        yaxis: {
                            title: {
                                text: 'Number of Students'
                            }
                        },
                        fill: {
                            opacity: 1 // Ensure full bar color fill
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 300
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                    };

                    var chart = new ApexCharts(document.querySelector("#third-chart-{{ $loop->index }}"), options);
                    chart.render();
                </script>
            @endforeach
        </div>

    </div>
    <div class="col-md-12 mb-4">
        <p class="text-sm"><b>4th Quarter</b></p>
        <button id="download-pdf" class="btn btn-xs bg-gradient-success fw-normal" data-quarter="4" data-quarter-name="4th-Quarter"><i class="fa-solid fa-file-pdf"></i> Download</button>
        <div class="table-responsive mb-4 p-4">
            <table class="table align-items-center mb-0 text-xs text-center table-hover text-nowrap">
                <thead>
                    <tr>
                        
                        <th>Section</th>
                        <th>MPS</th>
                        <th>No. of Students</th>
                        <th>Outstanding (98-100)</th>
                        <th>Outstanding (95-97)</th>
                        <th>Outstanding (90-94)</th>
                        <th>Very Satisfactory (85-89)</th>
                        <th>Satisfactory (80-84)</th>
                        <th>Fairly Satisfactory (75-79)</th>
                        <th>Did not meet Expectation (Below 75)</th>
                        <th>At risk falling in the next Quarter</th>
                        <th>Average computed grade for the Quarter</th>
                    </tr>
                </thead>
                <tbody id="fourth-table-body">
                    @foreach ($promeds->where('quarter', 4) as $pm)
                        <tr>
                            
                            <td><span class="text-sm">{{ $pm->section }}</span></td>
                            <td><span class="text-sm">{{ $pm->mps }}</span></td>
                            <td><span class="text-sm">{{ $pm->students }}</span></td>
                            <td><span class="text-sm">{{ $pm->out1 }}</span></td>
                            <td><span class="text-sm">{{ $pm->out2 }}</span></td>
                            <td><span class="text-sm">{{ $pm->out3 }}</span></td>
                            <td><span class="text-sm">{{ $pm->very }}</span></td>
                            <td><span class="text-sm">{{ $pm->sat }}</span></td>
                            <td><span class="text-sm">{{ $pm->fair }}</span></td>
                            <td><span class="text-sm">{{ $pm->didnot }}</span></td>
                            <td><span class="text-sm">{{ $pm->atrisk }}</span></td>
                            <td><span class="text-sm">{{ $pm->average }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">

            @foreach ($promeds->where('quarter', 4) as $pm)
                <div class="col-md-6">
                    <div class="">
                        <div id="fourth-chart-{{ $loop->index }}"></div>
                    </div>
                </div>

                <script>
                     var options = {
                        series: [{
                            name: 'Performance',
                            data: [
                                {{ $pm->out1 }},
                                {{ $pm->out2 }},
                                {{ $pm->out3 }},
                                {{ $pm->very }},
                                {{ $pm->sat }},
                                {{ $pm->fair }},
                                {{ $pm->didnot }},
                                {{ $pm->atrisk }},
                            ]
                        }],
                        chart: {
                            type: 'bar', // Change to 'bar' to create a bar graph
                            height: 350,
                            toolbar: {
                                show: false // Hide toolbar if not needed
                            }
                        },
                        labels: [
                            'Outstanding (98-100)',
                            'Outstanding (95-97)',
                            'Outstanding (90-94)',
                            'Very Satisfactory (85-89)',
                            'Satisfactory (80-84)',
                            'Fairly Satisfactory (75-79)',
                            'Did not meet Expectation (Below 75)',
                            'At risk falling in the next Quarter'
                        ],
                        title: {
                            text: '{{ $pm->yearLevel }} - {{ $pm->section }}',
                            align: 'center',
                            style: {
                                fontSize: '16px',
                                fontWeight: 'bold',
                                color: '#263238'
                            }
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4, // Optional rounded corners
                                horizontal: true, // Set to 'false' for vertical bars (classic bar chart)
                            }
                        },
                        xaxis: {
                            categories: [
                                'Outstanding (98-100)',
                                'Outstanding (95-97)',
                                'Outstanding (90-94)',
                                'Very Satisfactory (85-89)',
                                'Satisfactory (80-84)',
                                'Fairly Satisfactory (75-79)',
                                'Did not meet Expectation (Below 75)',
                                'At risk falling in the next Quarter'
                            ],
                            labels: {
                                rotate: -45 // Rotate x-axis labels for better readability
                            }
                        },
                        yaxis: {
                            title: {
                                text: 'Number of Students'
                            }
                        },
                        fill: {
                            opacity: 1 // Ensure full bar color fill
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 300
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                    };

                    var chart = new ApexCharts(document.querySelector("#fourth-chart-{{ $loop->index }}"), options);
                    chart.render();
                </script>
            @endforeach
        </div>
    </div>

    <hr>
    <div class="col-md-12 mb-4">
        <h6 class="mt-0 mb-3 fw-bolder text-uppercase">Mean Percentage Scores</h6>

        <div class="table-responsive p-4">
            <table class="table align-items-center mb-0 text-xs text-center table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Year & Section</th>
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>
                        <th>AVG</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Initialize variables for total calculations
                        $sectionAverages = []; // To store the average MPS for each section
                        $totalQ1 = 0;
                        $totalQ2 = 0;
                        $totalQ3 = 0;
                        $totalQ4 = 0;
                        $sectionsCount = 0; // To count the number of sections
                    @endphp
        
                    @foreach ($promeds->groupBy('section') as $section => $data)
                        @php
                            // Get the MPS for each quarter
                            $q1 = $data->where('quarter', 1)->first() ? $data->where('quarter', 1)->first()->mps : 0;
                            $q2 = $data->where('quarter', 2)->first() ? $data->where('quarter', 2)->first()->mps : 0;
                            $q3 = $data->where('quarter', 3)->first() ? $data->where('quarter', 3)->first()->mps : 0;
                            $q4 = $data->where('quarter', 4)->first() ? $data->where('quarter', 4)->first()->mps : 0;
        
                            // Filter out zeros and store non-zero values in an array
                            $nonZeroMPS = array_filter([$q1, $q2, $q3, $q4], function($value) {
                                return $value != 0;
                            });
        
                            // Calculate the average if there are non-zero values
                            $avg = count($nonZeroMPS) > 0 ? array_sum($nonZeroMPS) / count($nonZeroMPS) : 0;
        
                            // Store the section average in the array
                            $sectionAverages[] = $avg;
        
                            // Add to the totals for each quarter
                            $totalQ1 += $q1;
                            $totalQ2 += $q2;
                            $totalQ3 += $q3;
                            $totalQ4 += $q4;
                            $sectionsCount++; // Increment the section count
                        @endphp
                        <tr>
                            <td class="fw-bolder">{{ $data->first()->yearLevel }} - {{ $section }}</td>
                            <td>{{ $q1 }}</td>
                            <td>{{ $q2 }}</td>
                            <td>{{ $q3 }}</td>
                            <td>{{ $q4 }}</td>
                            <td>{{ number_format($avg, 2) }}</td> <!-- Display the computed average -->
                        </tr>
                    @endforeach
        
                    @php
                        // Calculate the overall average based on the section averages
                        $overallAvg = count($sectionAverages) > 0 ? array_sum($sectionAverages) / count($sectionAverages) : 0;
        
                        // Calculate the average MPS per quarter
                        $avgQ1 = $sectionsCount > 0 ? $totalQ1 / $sectionsCount : 0;
                        $avgQ2 = $sectionsCount > 0 ? $totalQ2 / $sectionsCount : 0;
                        $avgQ3 = $sectionsCount > 0 ? $totalQ3 / $sectionsCount : 0;
                        $avgQ4 = $sectionsCount > 0 ? $totalQ4 / $sectionsCount : 0;
                    @endphp
                    <!-- Add the last row with the average MPS per quarter and the overall average -->
                    <tr>
                        <td class="fw-bolder">Total (MPS Average)</td>
                        <td class="fw-bolder text-lg">{{ number_format($avgQ1, 2) }}</td>
                        <td class="fw-bolder text-lg">{{ number_format($avgQ2, 2) }}</td>
                        <td class="fw-bolder text-lg">{{ number_format($avgQ3, 2) }}</td>
                        <td class="fw-bolder text-lg">{{ number_format($avgQ4, 2) }}</td>
                        <td class="fw-bolder text-lg text-danger">{{ number_format($overallAvg, 2) }}</td> <!-- Display the overall average -->
                    </tr>
                </tbody>
            </table>
        </div>
        
        
        
        
        <div class="row">
            @foreach ($promeds->groupBy('section') as $section => $data)
            <div class="col-md-6">
                <div class="overflow-sm-auto">
                    <div id="mps-chart-{{ $loop->index }}"></div>
                </div>
            </div>

            @php
            $q1 = $data->where('quarter', 1)->first() ? $data->where('quarter', 1)->first()->mps : 0;
            $q2 = $data->where('quarter', 2)->first() ? $data->where('quarter', 2)->first()->mps : 0;
            $q3 = $data->where('quarter', 3)->first() ? $data->where('quarter', 3)->first()->mps : 0;
            $q4 = $data->where('quarter', 4)->first() ? $data->where('quarter', 4)->first()->mps : 0;
        @endphp
        <script>
            var options = {
                series: [{
                    name: 'MPS', // You can give a name to your series
                    data: [{{ $q1 }}, {{ $q2 }}, {{ $q3 }}, {{ $q4 }}] // MPS values for the quarters
                }],
                chart: {
                    type: 'area', // Changed from 'bar' to 'area'
                    height: 350
                },
                labels: ['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'],
                title: {
                    text: '{{ $data->first()->yearLevel }} - {{ $section }}',
                    align: 'left',
                    style: {
                        fontSize: '16px',
                        fontWeight: 'bold',
                        color: '#263238'
                    }
                },
                stroke: {
                    curve: 'smooth', // Adds a smooth curve to the area chart lines
                    width: 2
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.8,
                        opacityTo: 0.2,
                        stops: [0, 90, 100]
                    }
                },
                xaxis: {
                    categories: ['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'] // Quarter labels on X-axis
                },
                responsive: [{
                    breakpoint: 300,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
        
            var chart = new ApexCharts(document.querySelector("#mps-chart-{{ $loop->index }}"), options);
            chart.render();
        </script>
        

            @endforeach
        </div>

    </div>

</div>
