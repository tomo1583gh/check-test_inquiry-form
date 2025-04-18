<!-- resources/views/index.blade.php -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate | Contact</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <div class="container">
        <h1 class="logo">FashionablyLate</h1>
        <h2 class="title">Contact</h2>

        <form action="{{ route('contact.confirm') }}" method="POST">
            @csrf
            <div class="form-table">
                <label>お名前 <span class="required">※</span></label>
                <div class="name-fields">
                    <input type="text" name="last_name" placeholder="例: 山田">
                    <input type="text" name="first_name" placeholder="例: 太郎">
                </div>

                <label>性別 <span class="required">※</span></label>
                <div class="gender-fields">
                    <label><input type="radio" name="gender" value="男性"> 男性</label>
                    <label><input type="radio" name="gender" value="女性"> 女性</label>
                    <label><input type="radio" name="gender" value="その他"> その他</label>
                </div>

                <label>メールアドレス <span class="required">※</span></label>
                <input type="email" name="email" placeholder="例: test@example.com">

                <label>電話番号 <span class="required">※</span></label>
                <div class="phone-fields">
                    <input type="text" name="tel1"> -
                    <input type="text" name="tel2"> -
                    <input type="text" name="tel3">
                </div>

                <label>住所 <span class="required">※</span></label>
                <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">

                <label>建物名</label>
                <input type="text" name="building_name" placeholder="例: 千駄ヶ谷マンション101">

                <label>お問い合わせの種類 <span class="required">※</span></label>
                <select name="category">
                    <option value="">選択してください</option>
                    <option value="商品について">商品について</option>
                    <option value="配送について">配送について</option>
                    <option value="返品について">返品について</option>
                </select>

                <label>お問い合わせ内容 <span class="required">※</span></label>
                <textarea name="message" rows="6" placeholder="お問い合わせ内容をご記載ください"></textarea>
            </div>

            <div class="submit-button">
                <button type="submit">確認画面</button>
            </div>
        </form>
    </div>
</body>

</html>