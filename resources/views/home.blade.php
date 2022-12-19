<?php $user = Auth::user();?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in! Here are your details') }}
                    <br>{{ __('Name: ')}}<b>{{ Auth::user()->name}}</b>
                    <br>{{ __('Phone Number: ')}}<b>{{ Auth::user()->phone}}</b>
                    <br>{{ __('Address: ')}}<b>{{ Auth::user()->address}}</b>
                    <br>{{ __('Email: ')}}<b>{{ Auth::user()->email}}</b>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
