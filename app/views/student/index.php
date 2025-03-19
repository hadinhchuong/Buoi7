<?php require_once __DIR__ . '/../../shares/header.php'; ?>

<!-- Kết nối CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/student_management/public/style.css">


<div class="container mt-4">
    <h2 class="text-center text-uppercase fw-bold">Danh Sách Sinh Viên</h2>
    <a href="index.php?action=create" class="btn btn-success mb-3">➕ Thêm mới</a>

    <table class="table table-hover table-striped table-bordered shadow-lg">
        <thead class="bg-dark text-light text-center">
            <tr>
                <th>Mã SV</th>
                <th>Họ Tên</th>
                <th>Giới Tính</th>
                <th>Ngày Sinh</th>
                <th>Ngành</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($students)): ?>
                <tr>
                    <td colspan="6" class="text-center text-danger fw-bold">Không có dữ liệu</td>
                </tr>
            <?php else: ?>
                <?php foreach ($students as $student): ?>
                    <tr class="text-center align-middle">
                        <td><?php echo $student['MaSV']; ?></td>
                        <td class="fw-bold"><?php echo $student['HoTen']; ?></td>
                        <td><?php echo $student['GioiTinh']; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($student['NgaySinh'])); ?></td>
                        <td class="text-primary"><?php echo $student['MaNganh']; ?></td>
                        <td>
                            <a href="index.php?action=show&id=<?php echo $student['MaSV']; ?>" class="btn btn-sm btn-info">👁 Chi tiết</a>
                            <a href="index.php?action=edit&id=<?php echo $student['MaSV']; ?>" class="btn btn-sm btn-warning">✏ Sửa</a>
                            <a href="index.php?action=delete&id=<?php echo $student['MaSV']; ?>" class="btn btn-sm btn-danger btn-delete">🗑 Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Script xác nhận xóa -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const deleteButtons = document.querySelectorAll(".btn-delete");
        deleteButtons.forEach(button => {
            button.addEventListener("click", function(event) {
                if (!confirm("Bạn có chắc chắn muốn xóa sinh viên này?")) {
                    event.preventDefault();
                }
            });
        });
    });
</script>

<?php require_once __DIR__ . '/../../shares/footer.php'; ?>
