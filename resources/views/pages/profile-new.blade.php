@extends('layouts.main')
@section('title', 'Profile')
@section('content')


    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        {{-- <i class="ik ik-file-text bg-blue"></i> --}}
                        <div class="d-inline">
                            <h5>{{ __('Edit Profile')}}</h5>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Pages')}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Profile')}}</li>
                        </ol>
                    </nav>
                </div> --}}
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session()->get('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ik ik-x"></i>
                            </button>
                        </div>
                        @endif
                        @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{session()->get('error')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ik ik-x"></i>
                            </button>
                        </div>
                        @endif
                    <div class="card-body">
                        <div class="text-center">
                            <img src="../img/user.png" class="rounded-circle" width="150" />
                            <h4 class="card-title mt-10">{{$profile->name}}</h4>
                        </div>
                    </div>
                    <hr class="mb-0">
                    {{-- <div class="card-body">
                        <small class="text-muted d-block">{{ __('Email address')}} </small>
                        <h6>{{$profile->email}}</h6>
                        <small class="text-muted d-block pt-10">{{ __('Phone')}}</small>
                        <h6>{{$profile->mobile}}</h6>
                        <small class="text-muted d-block pt-10">{{ __('Address')}}</small>
                        <h6>{{$profile->address}}</h6>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    {{-- <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">{{ __('Setting')}}</a>
                        </li>
                    </ul> --}}
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <form class="form-horizontal" action="{{route('update-profile')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="{{$profile->id}}">
                                        <label for="example-name">{{ __('Full Name')}}</label>
                                        <input type="text" placeholder="Johnathan Doe" class="form-control" required name="name" value="{{$profile->name}}" id="example-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email">{{ __('Email')}}</label>
                                        <input type="email" placeholder="johnathan@admin.com" class="form-control" required name="email" value="{{$profile->email}}" id="example-email">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email">{{ __('Mobile')}}</label>
                                        <input type="text" placeholder="123 456 7890" class="form-control" name="mobile" required value="{{$profile->mobile}}" id="example-email">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-phone">{{ __('Address')}}</label>
                                        <input type="text" id="example-phone" name="address" value="{{$profile->address}}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-password">{{ __('Password')}}</label>
                                        <input type="password"  class="form-control" name="password" id="example-password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-password">{{ __('Confirm Password')}}</label>
                                        <input type="password"  class="form-control" name="password_confirmation" id="example-password" required>
                                    </div>

                                    <button class="btn btn-success" type="submit">Update Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
