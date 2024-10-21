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
                            <i>HOTSPOT</i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <i>User</i>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <i></i>
                    </li>
                    <li>Total Hotspot User: {{ $totalhotspotuser }}</li>
                </ul>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">HOTSPOT</h3>
                            <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#addRowModal">
                                <i class="fa fa-plus"></i> Add User
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal Add -->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">New</span>
                                            <span class="fw-light">User HOTSPOT</span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('hotspot.add') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Username</label>
                                                        <input name="user" type="text" class="form-control @error('user') is-invalid @enderror" value="{{ old('user') }}" required autocomplete="user" autofocus placeholder="Username">
                                                        @error('user')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Password</label>
                                                        <input name="password" type="text" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" required autocomplete="password" placeholder="Password">
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Server</label>
                                                        <select name="server" class="form-control" placeholder="Password" required>
                                                            <option disabled selected>Pilih</option>
                                                            @foreach ($server as $data)
                                                            <option>{{ $data['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Profile</label>
                                                        <select name="profile" class="form-control" placeholder="Profile" required>
                                                            <option disabled selected>Pilih</option>
                                                            @foreach ($profile as $data)
                                                            <option>{{ $data['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Time Limit</label>
                                                        <input name="timelimit" type="text" class="form-control" placeholder="Time Limit">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Comment</label>
                                                        <input name="comment" type="text" class="form-control" placeholder="Comment">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer no-bd">
                                                <button type="submit" class="btn btn-primary">Add</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Profile</th>
                                        <th>Uptime</th>
                                        <th>Bytes In</th>
                                        <th>Bytes Out</th>
                                        <th>Status</th>
                                        <th>Comment</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hotspotuser as $no => $item)
                                    <tr>
                                        <div hidden>{{ $id = str_replace('*', '', $data['.id']) }}</div>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $item['name'] ?? '' }}</td>
                                        <td>{{ $item['password'] ?? '' }}</td>
                                        <td>{{ $item['profile'] ?? '' }}</td>
                                        <td>{{ $item['uptime'] ?? '' }}</td>
                                        <td>{{ formatBytes($item['bytes-in'],) }}</td>
                                        <td>{{ formatBytes($item['bytes-out'],) }}</td>
                                        <td>
                                            @if ($item['disabled'] == "true" )
                                            Disable
                                            @else
                                            Enable
                                            @endif
                                        </td>
                                        <td>{{ $item['comment'] ?? '' }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('hotspot.edit', str_replace('*', '', $item['.id'])) }}" class="btn btn-link btn-primary btn-lg" data-toggle="tooltip" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('hotspot.delete', str_replace('*', '', $item['.id'])) }}" class="btn btn-link btn-danger" data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Apakah anda yakin menghapus secret {{ $item['name'] }} ?')">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </td>
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

@php
function formatBytes($bytes, $decimal = 2) {
    $satuan = ['Bytes', 'Kb', 'Mb', 'Gb', 'Tb'];
    $i = 0;
    while ($bytes >= 1024 && $i < count($satuan) - 1) {
        $bytes /= 1024;
        $i++;
    }
    return round($bytes, $decimal) . ' ' . $satuan[$i];
}
@endphp

@endsection
