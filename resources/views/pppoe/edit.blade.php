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
                            <i>PPPoE</i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <i>Secret</i>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <i>Edit</i>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
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
                            <form action="{{ route('pppoe.update') }}" method="POST">
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
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="service">Service</label>
                                            <select name="service" id="service" class="form-control">
                                                <option selected selected disabled>-- Pilih Service --</option>
                                                <option selected>{{ $user['service'] }}</option>
                                                <option value="any">ANY</option>
                                                <option value="async">ASYNC</option>
                                                <option value="pppoe">PPPoE</option>
                                                <option value="pptp">PPTP</option>
                                                <option value="sstp">SSTP</option>
                                                <option value="l2tp">L2TP</option>
                                                <option value="ovpn">OVPN</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="profile">Profile</label>
                                            <select name="profile" id="profile" class="form-control">
                                                <option selected selected disabled>-- Pilih Profile --</option>
                                                <option selected>{{ $user['profile'] }}</option>
                                                @foreach ($profile as $item)
                                                    <option>{{ $item['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="localaddress">Local Address</label>
                                            <input type="text" name="localaddress" class="form-control" id="localaddress" value="{{ $user['local-address'] ?? '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="remoteaddress">Remote Address</label>
                                            <input type="text" name="remoteaddress" class="form-control" id="remoteaddress" value="{{ $user['remote-address'] ?? '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
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
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="comment">Comment</label>
                                            <input type="text" name="comment" class="form-control" id="comment" value="{{ $user['comment'] ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-action text-right">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{ route('pppoe.secret') }}" class="btn btn-danger">Cancel</a>
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
