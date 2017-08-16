@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-6 centered">
            <a href="{{route('new-client-form')}}">
                <div class="main-button new-button">
                    <div class="main-button-text">NEW CLIENT</div>
                </div>
            </a>
        </div>
        <div class="col-md-6 centered">
            <a href="{{route('client-search')}}">
                <div class="main-button existing-button">
                    <div class="main-button-text">EXISTING CLIENT</div>
                </div>
            </a>
        </div>
    </div>

@endsection