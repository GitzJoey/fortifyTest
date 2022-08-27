@extends('layouts.master')
@section('title') @lang('translation.users') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/swiper/swiper.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Dashboard @endslot
@endcomponent

<form action="">
    <div class="mb-3">
        <label for="inputName" class="form-label">Name</label>
        <input type="text" class="form-control" id="inputName" placeholder="Name">
    </div>
    <div class="mb-3">
        <label for="inputEmail" class="form-label">Email</label>
        <input type="url" class="form-control" id="inputEmail" placeholder="Email">
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('users.index') }}" class="btn btn-primary">Cancel</a>
    </div>
</form>

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
