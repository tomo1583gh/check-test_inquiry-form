document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modal');
    const closeBtn = document.querySelector('.modal-close');
    const detailButtons = document.querySelectorAll('.btn-detail');
    const deleteIdInput = document.getElementById('modal-id');

    detailButtons.forEach(button => {
        button.addEventListener('click', () => {
            const row = button.closest('tr');
            const contactId = button.dataset.id;

            // ダミーのデータ挿入（本番はAjaxに置き換え）
            document.getElementById('modal-name').textContent = button.closest('tr').querySelectorAll('td')[0].textContent;
            document.getElementById('modal-gender').textContent = button.closest('tr').querySelectorAll('td')[1].textContent;
            document.getElementById('modal-email').textContent = button.closest('tr').querySelectorAll('td')[2].textContent;
            document.getElementById('modal-category').textContent = button.closest('tr').querySelectorAll('td')[3].textContent;
            document.getElementById('modal-tel').textContent = button.dataset.tel || '';
            document.getElementById('modal-address').textContent = button.dataset.address || '';
            document.getElementById('modal-building').textContent = button.dataset.building || '';
            document.getElementById('modal-detail').textContent = button.dataset.detail || '';

            deleteIdInput.value = contactId;

            modal.classList.remove('hidden');
        });
    });

    closeBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
    });
});
