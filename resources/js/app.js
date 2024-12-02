import './bootstrap';
// Hàm preview ảnh khi upload
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function () {
        const output = document.getElementById('previewAvatar');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

// Hàm hiển thị modal
document.getElementById('previewButton').addEventListener('click', function () {
    // Lấy dữ liệu từ form
    document.getElementById('previewName').innerText = document.getElementById('name').value || 'N/A';
    document.getElementById('previewStock').innerText = document.getElementById('stock').value || 'N/A';
    document.getElementById('previewExpiredAt').innerText = document.getElementById('expired_at').value || 'N/A';
    document.getElementById('previewSku').innerText = document.getElementById('sku').value || 'N/A';

    // Hiển thị tên danh mục
    const category = document.getElementById('category_id');
    const categoryName = category.options[category.selectedIndex].text;
    document.getElementById('previewCategory').innerText = categoryName || 'N/A';
    // Hiển thị modal
    document.getElementById('previewModal').style.display = 'block';
});

// Hàm đóng modal
function closePreview() {
    document.getElementById('previewModal').style.display = 'none';
}