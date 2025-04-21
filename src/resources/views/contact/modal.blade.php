
<div id="modal" class="modal hidden">
    <div class="modal-content">
        <button class="modal-close">×</button>
        <table class="modal-table">
            <tr>
                <th>お名前</th>
                <td id="modal-name"></td>
            </tr>
            <tr>
                <th>性別</th>
                <td id="modal-gender"></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td id="modal-email"></td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td id="modal-tel"></td>
            </tr>
            <tr>
                <th>住所</th>
                <td id="modal-address"></td>
            </tr>
            <tr>
                <th>建物名</th>
                <td id="modal-building"></td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td id="modal-category"></td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td id="modal-detail"></td>
            </tr>
        </table>
        <form method="POST" action="{{ route('contact.delete') }}" class="modal-delete-form">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" id="modal-id">
            <button type="submit" class="btn-delete">削除</button>
        </form>
    </div>
</div>
