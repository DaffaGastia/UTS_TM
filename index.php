<?php
$controller = $_GET['controller'] ?? 'auth';
$action = $_GET['action'] ?? 'loginForm';
$id = $_GET['id'] ?? null;

switch ($controller) {
    case 'item':
        require_once 'controllers/ItemController.php';
        $ctrl = new ItemController();
        break;
    case 'auth':
    default:
        require_once 'controllers/AuthController.php';
        $ctrl = new AuthController();
        break;
}

if (method_exists($ctrl, $action)) {
    if ($id !== null) $ctrl->$action($id);
    else $ctrl->$action();
} else {
    echo "Action tidak ditemukan!";
}
?>
