@extends('layouts.mentor')
@section('title', 'Dashboard')
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Dashboard Mentor : {{Session::get('activeUser')->name}}</h2>
        </div>
        <div class="col-lg-2"></div>
    </div>



@endsection