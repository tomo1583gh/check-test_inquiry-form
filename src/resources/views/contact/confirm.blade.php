@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<h2 class="page-title">Confirm</h2>

<table class="confirm-table">
    <tr>
        <th>お名前</th>
        <td>{{ $inputs['last_name'] }} {{ $inputs['first_name'] }}</td>
    </tr>
    <tr>
        <th>性別</th>
        <td>
            @php
            $genderLabel = ['1' => '男性', '2' => '女性', '3' => 'その他'][$inputs['gender']] ?? '';
            @endphp
            {{ $genderLabel }}
        </td>
    </tr>
    <tr>
        <th>メールアドレス</th>
        <td>{{ $inputs['email'] }}</td>
    </tr>
    <tr>
        <th>電話番号</th>
        <td>{{ $inputs['tel1'] ?? '' }}-{{ $inputs['tel2'] ?? '' }}-{{ $inputs['tel3'] ?? '' }}</td>
    </tr>
    <tr>
        <th>住所</th>
        <td>{{ $inputs['address'] }}</td>
    </tr>
    <tr>
        <th>建物名</th>
        <td>{{ $inputs['building'] }}</td>
    </tr>
    <tr>
        <th>お問い合わせの種類</th>
        <td>{{ $category_name }}</td>
    </tr>
    <tr>
        <th>お問い合わせ内容</th>
        <td>{{ $inputs['detail'] }}</td>
    </tr>
</table>

<!-- 送信・修正ボタン -->
<div class="button-area">
    <form method="POST" action="{{ route('contact.store') }}">
        @csrf
        @foreach ($inputs as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <button type="submit" class="btn-submit">送信する</button>
    </form>

    <form method="POST" action="{{ route('contact.back') }}" style="margin-left: 10px;">
        @csrf
        @foreach ($inputs as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <button type="submit" class="btn-back">修正する</button>
    </form>
</div>
@endsection