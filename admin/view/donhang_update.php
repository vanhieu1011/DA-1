<?php
// Bao gồm tệp kết nối cơ sở dữ liệu
include 'D:/xampp/htdocs/DA-1/DAO/pdo.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lấy thông tin đơn hàng từ CSDL
    $donhang = pdo_query_one("SELECT * FROM bill WHERE id = ?", $id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ form
    $nguoidat_ten = $_POST['nguoidat_ten'];
    $nguoidat_email = $_POST['nguoidat_email'];
    $nguoidat_tel = $_POST['nguoidat_tel'];
    $nguoidat_diachi = $_POST['nguoidat_diachi'];
    $nguoinhan_ten = $_POST['nguoinhan_ten'];
    $nguoinhan_diachi = $_POST['nguoinhan_diachi'];
    $nguoinhan_tel = $_POST['nguoinhan_tel'];
    $ship = $_POST['ship'];
    $voucher = $_POST['voucher'];
    $tongthanhtoan = $_POST['tongthanhtoan'];
    $pttt = $_POST['pttt'];

    // Cập nhật thông tin đơn hàng
    $updateQuery = "UPDATE bill SET 
        nguoidat_ten=?, 
        nguoidat_email=?, 
        nguoidat_tel=?, 
        nguoidat_diachi=?, 
        nguoinhan_ten=?, 
        nguoinhan_diachi=?, 
        nguoinhan_tel=?, 
        ship=?, 
        voucher=?, 
        tongthanhtoan=?, 
        pttt=? 
        WHERE id=?";

    try {
        pdo_execute($updateQuery, 
            $nguoidat_ten, 
            $nguoidat_email, 
            $nguoidat_tel, 
            $nguoidat_diachi, 
            $nguoinhan_ten, 
            $nguoinhan_diachi, 
            $nguoinhan_tel, 
            $ship, 
            $voucher, 
            $tongthanhtoan, 
            $pttt, 
            $id // Đảm bảo biến $id được truyền vào ở đây
        );
        echo "<div class='alert alert-success'>Cập nhật thành công</div>";
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Cập nhật thất bại: " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Đơn Hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Sửa Đơn Hàng</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nguoidat_ten" class="form-label">Tên người đặt</label>
                <input type="text" class="form-control" id="nguoidat_ten" name="nguoidat_ten" value="<?php echo isset($donhang['nguoidat_ten']) ? htmlspecialchars($donhang['nguoidat_ten']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nguoidat_email" class="form-label">Email người đặt</label>
                <input type="email" class="form-control" id="nguoidat_email" name="nguoidat_email" value="<?php echo isset($donhang['nguoidat_email']) ? htmlspecialchars($donhang['nguoidat_email']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nguoidat_tel" class="form-label">SĐT người đặt</label>
                <input type="text" class="form-control" id="nguoidat_tel" name="nguoidat_tel" value="<?php echo isset($donhang['nguoidat_tel']) ? htmlspecialchars($donhang['nguoidat_tel']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nguoidat_diachi" class="form-label">Địa chỉ người đặt</label>
                <input type="text" class="form-control" id="nguoidat_diachi" name="nguoidat_diachi" value="<?php echo isset($donhang['nguoidat_diachi']) ? htmlspecialchars($donhang['nguoidat_diachi']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nguoinhan_ten" class="form-label">Tên người nhận</label>
                <input type="text" class="form-control" id="nguoinhan_ten" name="nguoinhan_ten" value="<?php echo isset($donhang['nguoinhan_ten']) ? htmlspecialchars($donhang['nguoinhan_ten']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nguoinhan_diachi" class="form-label">Địa chỉ người nhận</label>
                <input type="text" class="form-control" id="nguoinhan_diachi" name="nguoinhan_diachi" value="<?php echo isset($donhang['nguoinhan_diachi']) ? htmlspecialchars($donhang['nguoinhan_diachi']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nguoinhan_tel" class="form-label">SĐT người nhận</label>
                <input type="text" class="form-control" id="nguoinhan_tel" name="nguoinhan_tel" value="<?php echo isset($donhang['nguoinhan_tel']) ? htmlspecialchars($donhang['nguoinhan_tel']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="ship" class="form-label">SHIP</label>
                <input type="text" class="form-control" id="ship" name="ship" value="<?php echo isset($donhang['ship']) ? htmlspecialchars($donhang['ship']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="voucher" class="form-label">Voucher</label>
                <input type="text" class="form-control" id="voucher" name="voucher" value="<?php echo isset($donhang['voucher']) ? htmlspecialchars($donhang['voucher']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tongthanhtoan" class="form-label">Tổng thanh toán</label>
                <input type="text" class="form-control" id="tongthanhtoan" name="tongthanhtoan" value="<?php echo isset($donhang['tongthanhtoan']) ? htmlspecialchars($donhang['tongthanhtoan']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="pttt" class="form-label">Phương thức thanh toán</label>
                <input type="text" class="form-control" id="pttt" name="pttt" value="<?php echo isset($donhang['pttt']) ? htmlspecialchars($donhang['pttt']) : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
