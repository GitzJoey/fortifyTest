@extends('layouts.master')
@section('title') @lang('translation.roles') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/swiper/swiper.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') {{ ucfirst($mode) }} Roles @endslot
@endcomponent

<form action="{{ route('roles.crud.create') }}" method="post">
    @csrf
    @if ($mode == 'edit')
        @method('patch')
    @else
        @method('post')
    @endif
    <input type="hidden" name="id" value="{{ $role ? $role->id : '' }}"/>
    <div class="mb-3">
        <label for="inputName" class="form-label">Name</label>
        <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{{ $role ? $role->name : '' }}">
    </div>
    <div class="mb-3">
        <label for="inputPermission" class="form-label">Permissions</label>
        <select class="form-select" multiple id="inputPermission" name="permissions[]">
            @foreach ($permissions as $key=>$value)
                <option value="{{ $key }}" {{ !empty($selectedPermissions) && $selectedPermissions->contains($key) ? 'selected':'' }}>{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-primary">{{ ucfirst($mode) }}</button>

        @if($mode == 'edit')
        <form action="{{ route('roles.crud.create') }}" method="post">
            @csrf
            @method('delete')
            <input type="hidden" name="id" value="{{ $role ? $role->id : '' }}"/>
            <button type="submit" class="btn btn-primary">Delete</button>
        </form>
        @endif

        <a href="{{ route('roles.index') }}" class="btn btn-primary">Cancel</a>
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
