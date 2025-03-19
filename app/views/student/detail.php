<?php require_once __DIR__ . '/../../shares/header.php'; ?>

<style>
    /* Định dạng tổng thể */
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    .container {
        max-width: 800px;
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

    .card {
        border: none;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background: #007bff;
        color: white;
        font-size: 20px;
        text-align: center;
        font-weight: bold;
        padding: 15px;
        border-radius: 10px 10px 0 0;
    }

    .img-fluid {
        width: 100%;
        max-height: 250px;
        object-fit: cover;
        border-radius: 10px;
    }

    .table {
        margin-top: 15px;
    }

    .table th {
        width: 30%;
        font-weight: bold;
        background: #f1f1f1;
    }

    .table td {
        font-size: 16px;
    }

    /* Nút bấm */
    .btn {
        border-radius: 5px;
        transition: 0.3s;
        font-weight: bold;
        padding: 10px 15px;
        margin: 5px;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333;
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
    <h2>Thông Tin Chi Tiết Sinh Viên</h2>
    
    <div class="card">
        <div class="card-header">
            <?php echo $student['HoTen']; ?>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <?php if (!empty($student['Hinh'])): ?>
                        <img src="uploads/<?php echo $student['Hinh']; ?>" alt="Student Photo" class="img-fluid">
                    <?php else: ?>
                        <img src="assets/default_avatar.png" alt="Default Photo" class="img-fluid">
                    <?php endif; ?>
                </div>
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <th>Mã Sinh Viên:</th>
                            <td><?php echo $student['MaSV']; ?></td>
                        </tr>
                        <tr>
                            <th>Họ Tên:</th>
                            <td><?php echo $student['HoTen']; ?></td>
                        </tr>
                        <tr>
                            <th>Giới Tính:</th>
                            <td><?php echo $student['GioiTinh']; ?></td>
                        </tr>
                        <tr>
                            <th>Ngày Sinh:</th>
                            <td><?php echo date('d/m/Y', strtotime($student['NgaySinh'])); ?></td>
                        </tr>
                        <tr>
                            <th>Mã Ngành:</th>
                            <td><?php echo $student['MaNganh']; ?></td>
                        </tr>
                    </table>
                    <div class="mt-3 text-center">
                        <a href="index.php?action=edit&id=<?php echo $student['MaSV']; ?>" class="btn btn-primary">Sửa</a>
                        <a href="index.php?action=delete&id=<?php echo $student['MaSV']; ?>" class="btn btn-danger">Xóa</a>
                        <a href="index.php" class="btn btn-secondary">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../../shares/footer.php'; ?>
