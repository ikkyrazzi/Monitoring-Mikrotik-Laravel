@extends('layouts.master')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"><i class="flaticon-home"></i></h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#"><i>HOTSPOT</i></a>
                    </li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><i>User</i></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><i>Edit</i></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">
                        <a href="#">{{ $user['name'] }}</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="page-inner mt--5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container mt-4">
                            <form action="{{ route('hotspot.update') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user">Username</label>
                                            <input type="hidden" name="id" value="{{ $user['.id'] }}">
                                            <input type="text" name="user" class="form-control" id="user" value="{{ $user['name'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" name="password" class="form-control" id="password" value="{{ $user['password'] ?? '' }}" required>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="server">Server</label>
                                            <select name="server" id="server" class="form-control">
                                                <option disabled selected>{{ $user['server'] ?? '' }}</option>
                                                @foreach ($server as $item)
                                                    <option>{{ $item['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="profile">Profile</label>
                                            <select name="profile" id="profile" class="form-control">
                                                <option disabled selected>{{ $user['profile'] ?? '' }}</option>
                                                @foreach ($profile as $item)
                                                    <option>{{ $item['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="disabled">Status</label>
                                            <select name="disabled" id="disabled" class="form-control">
                                                <option disabled selected>-- Select Status --</option>
                                                @if ($user['disabled'] == "false")
                                                    <option value="true">Disable</option>
                                                    <option value="false" selected>Enable</option>
                                                @elseif($user['disabled'] == "true")
                                                    <option value="true" selected>Disable</option>
                                                    <option value="false">Enable</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="timelimit">Time Limit</label>
                                            <input type="text" name="timelimit" value="{{ $user['limit-uptime'] ?? '' }}" class="form-control" id="timelimit">
                                        </div>
                                    </div>
                                
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="comment">Comment</label>
                                            <input type="text" name="comment" class="form-control" id="comment" value="{{ $user['comment'] ?? '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-action text-right">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{ route('hotspot.users') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</div>
@endsection
