@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks-wrapper">
    <div class="thanks-background">Thank You</div>

    <div class="thanks-message">
        <p class="thanks-message">お問い合わせありがとうございました</p>
        <div class="btn-area">
            <a href="{{ route('index') }}" class="btn-home">HOME</a>
        </div>
    </div>
    @endsection