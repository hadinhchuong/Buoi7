<?php require_once __DIR__ . '/../../shares/header.php'; ?>

<div class="container mt-4">
    <h2>Xóa Sinh Viên</h2>
    <div class="alert alert-danger">
        <p>Bạn có chắc chắn muốn xóa sinh viên này?</p>
        <p><strong>Mã SV:</strong> <?php echo $student['MaSV']; ?></p>
        <p><strong>Họ Tên:</strong> <?php echo $student['HoTen']; ?></p>
    </div>
    <form action="index.php?action=destroy" method="POST">
        <input type="hidden" name="MaSV" value="<?php echo $student['MaSV']; ?>">
        <button type="submit" class="btn btn-danger">Xác nhận xóa</button>
        <a href="index.php" class="btn btn-secondary">Hủy</a>
    </form>
</div>

<?php require_once __DIR__ . '/../../shares/footer.php'; ?>