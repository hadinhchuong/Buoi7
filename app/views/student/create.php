<?php require_once __DIR__ . '/../../shares/header.php'; ?>

<style>
    /* Định dạng tổng thể */
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    .container {
        max-width: 500px;
        background: white;
        padding: 30px;
        margin: 50px auto;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Tiêu đề */
    h2 {
        color: #333;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 20px;
    }

    /* Form và input */
    .form-group {
        margin-bottom: 15px;
    }

    .form-control, .form-control-file {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    /* Giới tính */
    .radio-group {
        display: flex;
        gap: 15px;
        margin-top: 5px;
    }

    .radio-group label {
        font-size: 16px;
    }

    /* Select box */
    select {
        padding: 10px;
        border-radius: 5px;
        width: 100%;
    }

    /* Nút bấm */
    .btn {
        border-radius: 5px;
        transition: 0.3s;
        font-weight: bold;
        padding: 10px 15px;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #545b62;
    }
</style>

<div class="container">
    <h2>Thêm Sinh Viên Mới</h2>
    <form action="index.php?action=store" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="MaSV">Mã Sinh Viên:</label>
            <input type="text" class="form-control" id="MaSV" name="MaSV" required>
        </div>
        <div class="form-group">
            <label for="HoTen">Họ Tên:</label>
            <input type="text" class="form-control" id="HoTen" name="HoTen" required>
        </div>
        <div class="form-group">
            <label>Giới Tính:</label>
            <div class="radio-group">
                <label><input type="radio" name="GioiTinh" value="Nam" checked> Nam</label>
                <label><input type="radio" name="GioiTinh" value="Nữ"> Nữ</label>
            </div>
        </div>
        <div class="form-group">
            <label for="NgaySinh">Ngày Sinh:</label>
            <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" required>
        </div>
        <div class="form-group">
            <label for="Hinh">Hình Đại Diện:</label>
            <input type="file" class="form-control-file" id="Hinh" name="Hinh">
        </div>
        <div class="form-group">
            <label for="MaNganh">Ngành Học:</label>
            <select class="form-control" id="MaNganh" name="MaNganh" required>
                <option value="">Chọn Ngành</option>
                <option value="CNTT">Công Nghệ Thông Tin</option>
                <option value="QTKD">Quản Trị Kinh Doanh</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

<?php require_once __DIR__ . '/../../shares/footer.php'; ?>
