@section('title', 'Register checkpoint')
@extends('layout.master')
@section('content')
    <div class="container">
        <h3>Why do you want to register</h3>
        <div class="row">
            <a href="/user/register?role=employer" class="col-6 btn btn-primary">
                <span>To find candidates</span>
            </a>
            <a href="/user/register?role=candidate" class="col-6 btn btn-primary">
                <span>To find jobs</span>
            </a>
        </div>
    </div>
@endsection
