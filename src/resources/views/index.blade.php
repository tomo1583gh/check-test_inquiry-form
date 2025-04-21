@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<h2 class="page-title">Contact</h2>

<form method="POST" action="{{ route('contact.confirm') }}" class="form">
    @csrf

    <!-- お名前 -->
    <div class="form-row horizontal">
        <label>お名前 <span class="required">※</span></label>
        <div class="name-input-wrapper">
            <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例：山田">
            <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例：太郎">
        </div>
        @error('last_name') <div class="error">{{ $message }}</div> @enderror
        @error('first_name') <div class="error">{{ $message }}</div> @enderror
    </div>


    <!-- 性別 -->
    <div class="form-row horizontal">
        <label>性別 <span class="required">※</span></label>
        <div class="form-input-group gender-options">
            <label><input type="radio" name="gender" value="1" {{ old('gender', '1') == 1 ? 'checked' : '' }}> 男性</label>
            <label><input type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}> 女性</label>
            <label><input type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }}> その他</label>
        </div>
        @error('gender') <div class="error">{{ $message }}</div> @enderror
    </div>

    <!-- メールアドレス -->
    <div class="form-row horizontal">
        <label>メールアドレス <span class="required">※</span></label>
        <div class="form-input-group">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="例：test@example.com">
        </div>
        @error('email') <div class="error">{{ $message }}</div> @enderror
    </div>

    <!-- 電話番号 -->
    <div class="form-row horizontal">
        <label>電話番号 <span class="required">※</span></label>
        <div class="tel-input-group">
            <input type="text" name="tel1" value="{{ old('tel1') }}" maxlength="4" placeholder="例：090"> -
            <input type="text" name="tel2" value="{{ old('tel2') }}" maxlength="4"> -
            <input type="text" name="tel3" value="{{ old('tel3') }}" maxlength="4">
        </div>
        @error('tel1') <div class="error">{{ $message }}</div> @enderror
        @error('tel2') <div class="error">{{ $message }}</div> @enderror
        @error('tel3') <div class="error">{{ $message }}</div> @enderror
    </div>

    <!-- 住所 -->
    <div class="form-row horizontal">
        <label>住所 <span class="required">※</span></label>
        <div class="form-input-group">
            <input type="text" name="address" value="{{ old('address') }}" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3">
        </div>
        @error('address') <div class="error">{{ $message }}</div> @enderror
    </div>

    <!-- 建物名 -->
    <div class="form-row horizontal">
        <label>建物名</label>
        <div class="form-input-group">
            <input type="text" name="building" value="{{ old('building') }}" placeholder="例：千駄ヶ谷マンション101">
        </div>
        @error('building') <div class="error">{{ $message }}</div> @enderror
    </div>

    <!-- お問い合わせの種類 -->
    <div class="form-row horizontal">
        <label>お問い合わせの種類 <span class="required">※</span></label>
        <div class="form-input-group">
            <select name="category_id">
                <option value="">選択してください</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
                @endforeach
            </select>
        </div>
        @error('category_id') <div class="error">{{ $message }}</div> @enderror
    </div>

    <!-- お問い合わせ内容 -->
    <div class="form-row horizontal">
        <label>お問い合わせ内容 <span class="required">※</span></label>
        <div class="form-input-group">
            <textarea name="detail" rows="5" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
        </div>
        @error('detail') <div class="error">{{ $message }}</div> @enderror
    </div>

    <!-- ✅ 確認画面ボタン -->
    <div class="form-row submit-button">
        <button type="submit" class="btn-submit">確認画面</button>
    </div>
</form>
@endsection