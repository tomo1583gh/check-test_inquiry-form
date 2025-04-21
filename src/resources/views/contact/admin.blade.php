@extends('layouts.app')

@section('title', 'Admin')

@section('head')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin-pagination.css') }}">
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
<script src="{{ asset('js/modal.js') }}" defer></script>
@endsection

@section('content')
<div class="admin-container">
    <h2 class="admin-title">Admin</h2>

    <form method="GET" action="{{ route('contact.admin') }}" class="search-form">
        <div class="form-row">
            <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="名前やメールアドレスを入力してください" class="input-field">

            <select name="gender" class="select-field">
                <option value="">性別</option>
                <option value="1" {{ request('gender') === '1' ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') === '2' ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') === '3' ? 'selected' : '' }}>その他</option>
            </select>

            <select name="category_id" class="select-field">
                <option value="">お問い合わせの種類</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
                @endforeach
            </select>

            <input type="date" name="created_at" value="{{ request('created_at') }}" class="input-date">

            <button type="submit" class="btn-search">検索</button>
            <a href="{{ route('contact.admin') }}" class="btn-reset">リセット</a>
        </div>
    </form>


    <div class="search-actions">
        <form method="GET" action="{{ route('contact.export') }}" class="export-form">
            <button type="submit" class="btn-export">エクスポート</button>
        </form>

        <div class="custom-pagination">
            {{ $contacts->appends(request()->query())->links('vendor.pagination.custom') }}
        </div>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td>{{ ['1' => '男性', '2' => '女性', '3' => 'その他'][$contact->gender] ?? '' }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content ?? '' }}</td>
                <td><button
                        type="button"
                        class="btn-detail"
                        data-id="{{ $contact->id }}"
                        data-tel="{{ $contact->tel }}"
                        data-address="{{ $contact->address }}"
                        data-building="{{ $contact->building }}"
                        data-detail="{{ $contact->detail }}">詳細</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>

@include('contact.modal')
@endsection