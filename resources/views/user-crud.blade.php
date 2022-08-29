@extends('layouts.master')
@section('title') @lang('translation.users') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/swiper/swiper.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') {{ ucfirst($mode) }} User @endslot
@endcomponent

<form action="{{ route('users.crud.create') }}" method="post">
    @csrf
    @if ($mode == 'edit')
        @method('patch')
    @else
        @method('post')
    @endif
    <input type="hidden" name="uuid" value="{{ $user ? $user->uuid : '' }}"/>
    <div class="mb-3">
        <label for="inputName" class="form-label">Name</label>
        <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{{ $user ? $user->name : '' }}">
    </div>
    <div class="mb-3">
        <label for="inputEmail" class="form-label">Email</label>
        <input type="text" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{ $user ? $user->email : '' }}" {{ $mode == 'create' ? '':'disabled' }}>
    </div>
    <div class="mb-3">
        <label for="inputPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
    </div>
    <div class="mb-3">
        <label for="inputPasswordConfirmation" class="form-label">Password Confirmation</label>
        <input type="password" class="form-control" id="inputPasswordConfirmation" placeholder="Confirm Password" name="password_confirmation">
    </div>
    <div class="mb-3">
        <label for="inputRoles" class="form-label">Roles</label>
        <select class="form-select mb-3" aria-label="Default select example" name="roles">
            @foreach ($roles as $key => $val)
                <option value="{{ $key }}" {{ $user && $user->roles->first()->id == $key ? 'selected':'' }}>{{ $val }}</option>
            @endforeach
        </select>
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-primary">{{ ucfirst($mode) }}</button>

        <form action="{{ route('users.crud.create') }}" method="post">
            @csrf
            @method('delete')
            <input type="hidden" name="uuid" value="{{ $user ? $user->uuid : '' }}"/>
            <button type="submit" class="btn btn-primary">Delete</button>
        </form>

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
