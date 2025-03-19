<?php require_once __DIR__ . '/../../shares/header.php'; ?>

<style>
    /* Định dạng tổng thể */
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    .container {
        max-width: 600px;
        background: white;
        padding: 20px;
        margin: 50px auto;
        border-radius: 10px;
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

    /* Form */
    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-control {
        border-radius: 5px;
        padding: 8px;
        border: 1px solid #ccc;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    /* Hình ảnh */
    img {
        display: block;
        margin-top: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
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

<div class="container mt-4">
    <h2>Cập Nhật Thông Tin Sinh Viên</h2>
    <form action="index.php?action=update" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="MaSV">Mã Sinh Viên:</label>
            <input type="text" class="form-control" id="MaSV" name="MaSV" value="<?php echo $student['MaSV']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="HoTen">Họ Tên:</label>
            <input type="text" class="form-control" id="HoTen" name="HoTen" value="<?php echo $student['HoTen']; ?>" required>
        </div>
        <div class="form-group">
            <label>Giới Tính:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="GioiTinh" id="nam" value="Nam" <?php echo ($student['GioiTinh'] == 'Nam') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="nam">Nam</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="GioiTinh" id="nu" value="Nữ" <?php echo ($student['GioiTinh'] == 'Nữ') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="nu">Nữ</label>
            </div>
        </div>
        <div class="form-group">
            <label for="NgaySinh">Ngày Sinh:</label>
            <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" value="<?php echo $student['NgaySinh']; ?>" required>
        </div>
        <div class="form-group">
            <label for="Hinh">Hình:</label>
            <?php if (!empty($student['Hinh'])): ?>
                <div>
                    <img src="uploads/<?php echo $student['Hinh']; ?>" alt="Student Photo" style="max-width: 100px;">
                </div>
            <?php endif; ?>
            <input type="file" class="form-control" id="Hinh" name="Hinh">
            <input type="hidden" name="current_image" value="<?php echo $student['Hinh']; ?>">
        </div>
        <div class="form-group">
            <label for="MaNganh">Mã Ngành:</label>
            <input type="text" class="form-control" id="MaNganh" name="MaNganh" value="<?php echo $student['MaNganh']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
        <a href="index.php" class="btn btn-secondary mt-3">Quay lại</a>
    </form>
</div>

<?php require_once __DIR__ . '/../../shares/footer.php'; ?>
