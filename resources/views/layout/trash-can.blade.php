@extends('layout.master')
@section('content')
    @include('layout.nav')
    <div class="white-space"></div>
    <div class="container">
        <a href="{{ url()->previous() }}" class="btn btn-primary mt-5 mb-3">Back</a>
        <div class="p-5 rounder shadow-lg">
            {{-- Table starts here --}}
            <div class="col-12 my-table">
                @yield('table')
            </div>
            {{-- Table ends here --}}
        </div>
    </div>
@endsection
