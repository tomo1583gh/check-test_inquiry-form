<!-- index.blade.php -->
@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<h2 class="page-title">Contact</h2>

<form method="POST" action="{{ route('contact.confirm') }}" class="contact-form">
    @csrf

    <div class="form-group name-group">
        <label>お名前<span class="required">※</span></label>
        <div class="form-input name-inputs">
            <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例：山田">
            <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例：太郎">
        </div>
        @error('last_name') <div class="error-message">{{ $message }}</div> @enderror
        @error('first_name') <div class="error-message">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>性別<span class="required">※</span></label>
        <div class="form-input gender-inputs">
            <div class="gender-option"><label><input type="radio" name="gender" value="1" {{ old('gender', '1') == '1' ? 'checked' : '' }}> 男性</label></div>
            <div class="gender-option"><label><input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}> 女性</label></div>
            <div class="gender-option"><label><input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}> その他</label></div>
        </div>
        @error('gender') <div class="error-message">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>メールアドレス<span class="required">※</span></label>
        <div class="form-input">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="例：test@example.com">
        </div>
        @error('email') <div class="error-message">{{ $message }}</div> @enderror
    </div>

    <div class="form-group tel-group">
        <label>電話番号<span class="required">※</span></label>
        <div class="form-input tel-inputs">
            <input type="text" name="tel1" value="{{ old('tel1') }}" size="4" placeholder="090"> -
            <input type="text" name="tel2" value="{{ old('tel2') }}" size="4" placeholder="1234"> -
            <input type="text" name="tel3" value="{{ old('tel3') }}" size="4" placeholder="5678">
        </div>
        @error('tel1') <div class="error-message">{{ $message }}</div> @enderror
        @error('tel2') <div class="error-message">{{ $message }}</div> @enderror
        @error('tel3') <div class="error-message">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>住所<span class="required">※</span></label>
        <div class="form-input">
            <input type="text" name="address" value="{{ old('address') }}" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3">
        </div>
        @error('address') <div class="error-message">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>建物名</label>
        <div class="form-input">
            <input type="text" name="building" value="{{ old('building') }}" placeholder="例：千駄ヶ谷マンション101">
        </div>
        @error('building') <div class="error-message">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>お問い合わせの種類<span class="required">※</span></label>
        <div class="form-input">
            <select name="category_id">
                <option value="">選択してください</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->content }}
                </option>
                @endforeach
            </select>
        </div>
        @error('category_id') <div class="error-message">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>お問い合わせ内容<span class="required">※</span></label>
        <div class="form-input">
            <textarea name="detail" rows="5" placeholder="お問い合わせ内容をご記入ください">{{ old('detail') }}</textarea>
        </div>
        @error('detail') <div class="error-message">{{ $message }}</div> @enderror
    </div>

    <div class="form-submit">
        <button type="submit" class="btn-submit">確認画面へ</button>
    </div>
</form>
@endsection