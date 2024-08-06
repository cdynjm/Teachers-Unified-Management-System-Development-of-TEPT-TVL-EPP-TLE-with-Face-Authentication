<div class="row" id="promeds-result">
    <div class="col-md-12 mb-4">
        <p class="text-sm"><b>1st Quarter</b></p>
        <button id="first-add-row" class="btn btn-xs bg-dark text-white"> + </button>
        <button id="first-delete-row" class="btn btn-xs bg-gradient-danger"> - </button>
        <button id="download-pdf" class="btn btn-xs bg-gradient-success fw-normal" data-quarter="1" data-quarter-name="1st-Quarter"><i class="fa-solid fa-file-pdf"></i> Download</button>
        <div class="table-responsive mb-4 p-4">
            <table class="table align-items-center mb-0 text-xs text-center table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Action</th>
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
                            <td class="text-center" status="1" id="{{ $aes->encrypt($pm->id) }}"
                                section="{{ $pm->section }}" mps="{{ $pm->mps }}" students="{{ $pm->students }}"
                                out1="{{ $pm->out1 }}" out2="{{ $pm->out2 }}" out3="{{ $pm->out3 }}"
                                very="{{ $pm->very }}" sat="{{ $pm->sat }}" fair="{{ $pm->fair }}"
                                didnot="{{ $pm->didnot }}" atrisk="{{ $pm->atrisk }}"
                                average="{{ $pm->average }}">
                                <a href="javascript:;" id="edit-pro-meds"
                                    class="text-secondary font-weight-bold text-xs me-2" data-toggle="tooltip"
                                    title="Update">
                                    <i class="fas fa-pen-alt text-sm"></i>
                                </a>
                                <a href="javascript:;" id="delete-pro-meds"
                                    class="text-secondary font-weight-bold text-xs me-2" data-toggle="tooltip"
                                    title="Delete">
                                    <i class="fas fa-trash text-sm"></i>
                                </a>
                            </td>
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
                    <div class="overflow-auto">
                        <div id="first-chart-{{ $loop->index }}"></div>
                    </div>
                </div>

                <script>
                    var options = {
                        series: [
                            {{ $pm->out1 }},
                            {{ $pm->out2 }},
                            {{ $pm->out3 }},
                            {{ $pm->very }},
                            {{ $pm->sat }},
                            {{ $pm->fair }},
                            {{ $pm->didnot }},
                            {{ $pm->atrisk }},

                        ],
                        chart: {
                            type: 'polarArea',
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
                        stroke: {
                            colors: ['#fff']
                        },
                        fill: {
                            opacity: 1
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 500
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
        <button id="second-add-row" class="btn btn-xs bg-dark text-white"> + </button>
        <button id="second-delete-row" class="btn btn-xs bg-gradient-danger"> - </button>
        <button id="download-pdf" class="btn btn-xs bg-gradient-success fw-normal" data-quarter="2" data-quarter-name="2nd-Quarter"><i class="fa-solid fa-file-pdf"></i> Download</button>
        <div class="table-responsive mb-4 p-4">
            <table class="table align-items-center mb-0 text-xs text-center table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Action</th>
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
                            <td class="text-center" status="1" id="{{ $aes->encrypt($pm->id) }}"
                                section="{{ $pm->section }}" mps="{{ $pm->mps }}"
                                students="{{ $pm->students }}" out1="{{ $pm->out1 }}" out2="{{ $pm->out2 }}"
                                out3="{{ $pm->out3 }}" very="{{ $pm->very }}" sat="{{ $pm->sat }}"
                                fair="{{ $pm->fair }}" didnot="{{ $pm->didnot }}" atrisk="{{ $pm->atrisk }}"
                                average="{{ $pm->average }}">
                                <a href="javascript:;" id="edit-pro-meds"
                                    class="text-secondary font-weight-bold text-xs me-2" data-toggle="tooltip"
                                    title="Update">
                                    <i class="fas fa-pen-alt text-sm"></i>
                                </a>
                                <a href="javascript:;" id="delete-pro-meds"
                                    class="text-secondary font-weight-bold text-xs me-2" data-toggle="tooltip"
                                    title="Delete">
                                    <i class="fas fa-trash text-sm"></i>
                                </a>
                            </td>
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
                    <div class="overflow-auto">
                        <div id="second-chart-{{ $loop->index }}"></div>
                    </div>
                </div>

                <script>
                    var options = {
                        series: [
                            {{ $pm->out1 }},
                            {{ $pm->out2 }},
                            {{ $pm->out3 }},
                            {{ $pm->very }},
                            {{ $pm->sat }},
                            {{ $pm->fair }},
                            {{ $pm->didnot }},
                            {{ $pm->atrisk }},

                        ],
                        chart: {
                            type: 'polarArea',
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
                        stroke: {
                            colors: ['#fff']
                        },
                        fill: {
                            opacity: 1
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 500
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
        <button id="third-add-row" class="btn btn-xs bg-dark text-white"> + </button>
        <button id="third-delete-row" class="btn btn-xs bg-gradient-danger"> - </button>
        <button id="download-pdf" class="btn btn-xs bg-gradient-success fw-normal" data-quarter="3" data-quarter-name="3rd-Quarter"><i class="fa-solid fa-file-pdf"></i> Download</button>
        <div class="table-responsive mb-4 p-4">
            <table class="table align-items-center mb-0 text-xs text-center table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Action</th>
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
                            <td class="text-center" status="1" id="{{ $aes->encrypt($pm->id) }}"
                                section="{{ $pm->section }}" mps="{{ $pm->mps }}"
                                students="{{ $pm->students }}" out1="{{ $pm->out1 }}"
                                out2="{{ $pm->out2 }}" out3="{{ $pm->out3 }}" very="{{ $pm->very }}"
                                sat="{{ $pm->sat }}" fair="{{ $pm->fair }}" didnot="{{ $pm->didnot }}"
                                atrisk="{{ $pm->atrisk }}" average="{{ $pm->average }}">
                                <a href="javascript:;" id="edit-pro-meds"
                                    class="text-secondary font-weight-bold text-xs me-2" data-toggle="tooltip"
                                    title="Update">
                                    <i class="fas fa-pen-alt text-sm"></i>
                                </a>
                                <a href="javascript:;" id="delete-pro-meds"
                                    class="text-secondary font-weight-bold text-xs me-2" data-toggle="tooltip"
                                    title="Delete">
                                    <i class="fas fa-trash text-sm"></i>
                                </a>
                            </td>
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
                    <div class="overflow-auto">
                        <div id="third-chart-{{ $loop->index }}"></div>
                    </div>
                </div>

                <script>
                    var options = {
                        series: [
                            {{ $pm->out1 }},
                            {{ $pm->out2 }},
                            {{ $pm->out3 }},
                            {{ $pm->very }},
                            {{ $pm->sat }},
                            {{ $pm->fair }},
                            {{ $pm->didnot }},
                            {{ $pm->atrisk }},

                        ],
                        chart: {
                            type: 'polarArea',
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
                        stroke: {
                            colors: ['#fff']
                        },
                        fill: {
                            opacity: 1
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 500
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
        <button id="fourth-add-row" class="btn btn-xs bg-dark text-white"> + </button>
        <button id="fourth-delete-row" class="btn btn-xs bg-gradient-danger"> - </button>
        <button id="download-pdf" class="btn btn-xs bg-gradient-success fw-normal" data-quarter="4" data-quarter-name="4th-Quarter"><i class="fa-solid fa-file-pdf"></i> Download</button>
        <div class="table-responsive mb-4 p-4">
            <table class="table align-items-center mb-0 text-xs text-center table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Action</th>
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
                            <td class="text-center" status="1" id="{{ $aes->encrypt($pm->id) }}"
                                section="{{ $pm->section }}" mps="{{ $pm->mps }}"
                                students="{{ $pm->students }}" out1="{{ $pm->out1 }}"
                                out2="{{ $pm->out2 }}" out3="{{ $pm->out3 }}" very="{{ $pm->very }}"
                                sat="{{ $pm->sat }}" fair="{{ $pm->fair }}" didnot="{{ $pm->didnot }}"
                                atrisk="{{ $pm->atrisk }}" average="{{ $pm->average }}">
                                <a href="javascript:;" id="edit-pro-meds"
                                    class="text-secondary font-weight-bold text-xs me-2" data-toggle="tooltip"
                                    title="Update">
                                    <i class="fas fa-pen-alt text-sm"></i>
                                </a>
                                <a href="javascript:;" id="delete-pro-meds"
                                    class="text-secondary font-weight-bold text-xs me-2" data-toggle="tooltip"
                                    title="Delete">
                                    <i class="fas fa-trash text-sm"></i>
                                </a>
                            </td>
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
                    <div class="overflow-auto">
                        <div id="fourth-chart-{{ $loop->index }}"></div>
                    </div>
                </div>

                <script>
                    var options = {
                        series: [
                            {{ $pm->out1 }},
                            {{ $pm->out2 }},
                            {{ $pm->out3 }},
                            {{ $pm->very }},
                            {{ $pm->sat }},
                            {{ $pm->fair }},
                            {{ $pm->didnot }},
                            {{ $pm->atrisk }},

                        ],
                        chart: {
                            type: 'polarArea',
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
                        stroke: {
                            colors: ['#fff']
                        },
                        fill: {
                            opacity: 1
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 500
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
</div>
