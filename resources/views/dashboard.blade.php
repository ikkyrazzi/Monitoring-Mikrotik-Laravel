@extends('layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">@yield('title')</h2>
                            <h5 class="text-white op-7 mb-2">Router Board Name: </h5>
                        </div>
                        <div class="ml-md-auto py-2 py-md-0"></div>
                    </div>
                </div>
            </div>

            <div class="page-inner mt--5">
                <div class="row">
                    <!-- CPU Load Card -->
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                                            <i class="fas fa-th-list"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">CPU Load</p>
                                            <h3 class="card-title" id="cpu"></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total PPPoE Secret Card -->
                    <div class="col-sm-6 col-md-3">
                        <a href="{{ route('pppoe.secret') }}" style="text-decoration:none">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                                <i class="fas fa-home"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Total PPPoE Secret</p>
                                                <h4 class="card-title">{{ $totalsecret }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Hotspot Active Card -->
                    <div class="col-sm-6 col-md-3">
                        <a href="" style="text-decoration:none">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Hotspot Active</p>
                                                <h4 class="card-title">{{ $hotspotactive }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Uptime Card -->
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Uptime</p>
                                            <h4 class="card-title" id="uptime"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Router Info Card -->
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-warning bubble-shadow-small">
                                            <i class="fas fa-info"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Info</p>
                                            <b>Model:</b>/<br>
                                            <b>OS:</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Free Memory/HDD Card -->
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-danger bubble-shadow-small">
                                            <i class="fas fa-database"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Free Memory/HDD</p>
                                            <h4 class="card-title">/</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PPPoE Active Card -->
                    <div class="col-sm-6 col-md-3">
                        <a href="{{ route('pppoe.active') }}" style="text-decoration:none">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-muted bubble-shadow-small">
                                                <i class="fas fa-user-alt"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">PPPoE Active</p>
                                                <h4 class="card-title">{{ $secretactive }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Total Hotspot Users Card -->
                    <div class="col-sm-6 col-md-3">
                        <a href="" style="text-decoration:none">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                                <i class="fas fa-wifi"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Total Hotspot Users</p>
                                                <h4 class="card-title">{{ $totalhotspot }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Traffic Section -->
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <div class="card-title">List Traffic Naik</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="load"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Interface Select -->
                    <div class="col-sm-8 col-md-4">
                        <div class="card card-stats">
                            <div class="form-group">
                                <label for="defaultSelect">Select Interface</label>
                                <select class="form-control" name="interface" id="interface">
                                    @foreach ($interface as $data)
                                        <option value="{{ $data['name'] }}">{{ $data['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" id="traffic"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>

    <script type="text/javascript">
        setInterval(traffic, 1000);

        function traffic() {
            var traffic = $('#interface').val();
            var url = '{{ route('dashboard.traffic', ':traffic') }}';
            $('#traffic').load(url.replace(':traffic', traffic));
        }

        setInterval(cpu, 1000);

        function cpu() {
            $('#cpu').load('{{ route('dashboard.cpu') }}');
        }

        setInterval(uptime, 1000);

        function uptime() {
            $('#uptime').load('{{ route('dashboard.uptime') }}');
        }

        setInterval(load, 1000);

        function load() {
            $('#load').load('{{ route('dashboard.report') }}');
        }
    </script>
@endsection
