@extends('layouts.main')
@push('title')
    Home
@endpush
@section('main-section')
    <h2>From home</h2>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/customer')}}">Add customer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/customer/view')}}">View customers</a>
        </li>
    </ul>
@endsection