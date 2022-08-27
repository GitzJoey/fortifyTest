@extends('layouts.master')
@section('title') @lang('translation.users') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/swiper/swiper.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') User @endslot
@endcomponent
<div class="table-responsive table-card">
    <table class="table table-nowrap mb-0">
        <thead class="table-light">
            <tr>
                <th scope="col">
                </th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Roles</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userLists as $u)
            <tr>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="cardtableCheck01">
                        <label class="form-check-label" for="cardtableCheck01"></label>
                    </div>
                </td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>
                    @foreach ($u->roles as $r)
                        {{ $r->name }}
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('users.crud', $u->uuid) }}" class="btn btn-sm btn-light"><i data-feather="edit" class="icon-xs"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-5">
    <a href="{{ route('users.crud') }}" class="btn btn-primary">Create</a>
</div>

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
