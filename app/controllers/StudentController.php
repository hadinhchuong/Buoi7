<?php
require_once __DIR__ . '/../models/StudentModel.php';

class StudentController {
    private $model;

    public function __construct() {
        $this->model = new StudentModel();
    }

    public function index() {
        $students = $this->model->getAllStudents();
        include __DIR__ . '/../views/student/index.php';
    }

    public function show($id) {
        $student = $this->model->getStudentById($id);
        include __DIR__ . '/../views/student/detail.php';
    }

    public function create() {
        include __DIR__ . '/../views/student/create.php';
    }

    public function store($data) {
        // Kiểm tra bắt buộc
        if (empty($data['MaSV']) || empty($data['HoTen']) || empty($data['NgaySinh']) || empty($data['MaNganh'])) {
            die("Lỗi: Vui lòng nhập đầy đủ thông tin.");
        }

        // Kiểm tra mã ngành có tồn tại không
        if (!$this->model->checkMaNganhExists($data['MaNganh'])) {
            die("Lỗi: Mã ngành không tồn tại.");
        }

        // Xử lý upload ảnh
        $fileName = NULL;
        if (isset($_FILES['Hinh']) && $_FILES['Hinh']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $fileName = time() . "_" . basename($_FILES["Hinh"]["name"]);
            $filePath = $uploadDir . $fileName;
            
            if (!move_uploaded_file($_FILES["Hinh"]["tmp_name"], $filePath)) {
                die("Lỗi khi tải ảnh lên.");
            }
        }

        $this->model->addStudent($data['MaSV'], $data['HoTen'], $data['GioiTinh'], $data['NgaySinh'], $fileName, $data['MaNganh']);
        header("Location: index.php");
        exit;
    }

    public function edit($id) {
        $student = $this->model->getStudentById($id);
        include __DIR__ . '/../views/student/edit.php';
    }

    public function update($data) {
        if (empty($data['MaSV']) || empty($data['HoTen']) || empty($data['NgaySinh']) || empty($data['MaNganh'])) {
            die("Lỗi: Vui lòng nhập đầy đủ thông tin.");
        }

        // Kiểm tra mã ngành hợp lệ
        if (!$this->model->checkMaNganhExists($data['MaNganh'])) {
            die("Lỗi: Mã ngành không tồn tại.");
        }

        // Xử lý ảnh mới (nếu có)
        $fileName = $data['current_image'] ?? NULL;
        if (isset($_FILES['Hinh']) && $_FILES['Hinh']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $fileName = time() . "_" . basename($_FILES["Hinh"]["name"]);
            $filePath = $uploadDir . $fileName;

            if (!move_uploaded_file($_FILES["Hinh"]["tmp_name"], $filePath)) {
                die("Lỗi khi tải ảnh lên.");
            }
        }

        $this->model->updateStudent($data['MaSV'], $data['HoTen'], $data['GioiTinh'], $data['NgaySinh'], $fileName, $data['MaNganh']);
        header("Location: index.php");
        exit;
    }

    public function delete($id) {
        $this->model->deleteStudent($id);
        header("Location: index.php");
        exit;
    }
}
?>
