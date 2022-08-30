@extends('layouts.master')
@section('title') @lang('translation.users') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/swiper/swiper.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Change Password @endslot
@endcomponent

<br/>
<form action="{{ route('users.crud.create') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ auth()->user()->uuid }}"/>
    <div class="mb-3">
        <label for="inputCurrentPassword" class="form-label">Current Password</label>
        <input type="password" class="form-control" id="inputCurrentPassword" placeholder="Password" name="current_password">
    </div>
    <div class="mb-3">
        <label for="inputNewPassword" class="form-label">New Password</label>
        <input type="password" class="form-control" id="inputNewPassword" placeholder="Password" name="password">
    </div>
    <div class="mb-3">
        <label for="inputNewPasswordConf" class="form-label">New Password Confirmation</label>
        <input type="password" class="form-control" id="inputNewPasswordConf" placeholder="Password" name="password_confirmation">
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('db') }}" class="btn btn-primary">Cancel</a>
    </div>
</form>
<br/>

@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/swiper/swiper.min.js')}}"></script>
<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
