<?php
require_once __DIR__ . '/app/controllers/StudentController.php';

$controller = new StudentController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'show':
        if (isset($_GET['id'])) {
            $controller->show($_GET['id']);
        } else {
            header("Location: index.php");
        }
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Xử lý upload file hình ảnh nếu có
            $data = $_POST;
            if(isset($_FILES['Hinh']) && $_FILES['Hinh']['error'] == 0) {
                $target_dir = "uploads/";
                $fileName = time() . '_' . basename($_FILES["Hinh"]["name"]);
                $target_file = $target_dir . $fileName;
                if (move_uploaded_file($_FILES["Hinh"]["tmp_name"], $target_file)) {
                    $data['Hinh'] = $fileName;
                }
            } else {
                $data['Hinh'] = '';
            }
            $controller->store($data);
        }
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $controller->edit($_GET['id']);
        } else {
            header("Location: index.php");
        }
        break;
    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            if(isset($_FILES['Hinh']) && $_FILES['Hinh']['error'] == 0) {
                $target_dir = "uploads/";
                $fileName = time() . '_' . basename($_FILES["Hinh"]["name"]);
                $target_file = $target_dir . $fileName;
                if (move_uploaded_file($_FILES["Hinh"]["tmp_name"], $target_file)) {
                    $data['Hinh'] = $fileName;
                }
            } else {
                $data['Hinh'] = $data['current_image'];
            }
            $controller->update($data);
        }
        break;
    case 'delete':
        if (isset($_GET['id'])) {
            $student = $controller->model->getStudentById($_GET['id']);
            include __DIR__ . '/app/views/student/delete.php';
        } else {
            header("Location: index.php");
        }
        break;
    case 'destroy':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['MaSV'])) {
            $controller->delete($_POST['MaSV']);
        } else {
            header("Location: index.php");
        }
        break;
    default:
        $controller->index();
        break;
}
?>