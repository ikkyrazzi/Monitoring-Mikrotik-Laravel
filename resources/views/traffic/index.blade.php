@extends('layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title"><i class="flaticon-home"></i></h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i>REPORT</i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <i>Report Up</i>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <i></i>
                        </li>
                        <li>Total Report : {{ $report->count() }}</li>
                    </ul>
                </div>
            </div>
            <div class="page-inner mt--5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <center>
                                <div>
                                    <table>
                                        <tr>
                                            <form class="form-inline" action="{{ route('traffic.index') }}" method="GET">
                                                <div class="form-group">
                                                    <td><label><b>Mulai Tanggal:</b></label></td>
                                                    <td><input type="date" class="form-control datepicker"
                                                            name="tgl_awal" id="tgl_awal" value="{{ date('Y-m-d') }}"
                                                            required></td>
                                                </div>

                                                <div class="form-group">
                                                    <td><label><b>Sampai Tanggal:</b></label></td>
                                                    <td><input type="date" class="form-control datepiscker"
                                                            name="tgl_akhir" id="tgl_akhir" value="{{ date('Y-m-d') }}"
                                                            required></td>
                                                </div>

                                                <div class="form-group">
                                                    <td><button type="submit" class="btn btn-primary">Search</button></td>
                                                </div>
                                                <div class="form-group">
                                                    <td><a href="{{ route('traffic.index') }}" type="reset" value="reset"
                                                            class="btn btn-danger">Reset</a></td>
                                                </div>
                                            </form>
                                        </tr>
                                    </table>
                                </div>
                            </center>
                            <center class="mt-4">
                                {{ $view_tgl }}
                            </center>
                        </div>
                        <div class="card-body">
                            <!-- Modal Add -->
                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">New</span>
                                                <span class="fw-light">Secret PPPoE</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Status</th>
                                            <th>Date/Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($report as $no => $item)
                                            <tr>
                                                <td>{{ $no + 1 }}</td>
                                                <td>{!! $item->text !!}</td>
                                                <td>{{ date('d F Y, h:i A', strtotime($item->created_at)) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
