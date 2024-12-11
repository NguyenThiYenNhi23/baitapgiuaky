<?php
$conn = new mysqli('localhost', 'root', '', 'QLSV_NguyenThiYenNhi');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lấy thông tin sinh viên
    $sql = "SELECT * FROM table_Students WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy sinh viên!";
        exit;
    }

    // Xử lý khi bấm nút Cập nhật
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullname = $_POST['fullname'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $hometown = $_POST['hometown'];
        $level = $_POST['level'];
        $group_id = $_POST['group_id'];

        $update_sql = "UPDATE table_Students 
                       SET fullname = '$fullname', dob = '$dob', gender = $gender, 
                           hometown = '$hometown', level = $level, group_id = $group_id 
                       WHERE id = $id";

        if ($conn->query($update_sql) === TRUE) {
            echo "Cập nhật thành công!";
            header("Location: index.php"); // Quay về trang danh sách
            exit;
        } else {
            echo "Lỗi cập nhật: " . $conn->error;
        }
    }
} else {
    echo "ID sinh viên không hợp lệ!";
    exit;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sinh viên</title>
</head>
<body>
    <h1>Sửa thông tin sinh viên</h1>
    <form method="POST">
        <label>Họ và tên:</label><br>
        <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" required><br>

        <label>Ngày sinh:</label><br>
        <input type="date" name="dob" value="<?php echo $row['dob']; ?>" required><br>

        <label>Giới tính:</label><br>
        <input type="radio" name="gender" value="1" <?php echo $row['gender'] == 1 ? 'checked' : ''; ?>> Nam
        <input type="radio" name="gender" value="0" <?php echo $row['gender'] == 0 ? 'checked' : ''; ?>> Nữ<br>

        <label>Quê quán:</label><br>
        <input type="text" name="hometown" value="<?php echo $row['hometown']; ?>" required><br>

        <label>Trình độ học vấn:</label><br>
        <select name="level">
            <option value="0" <?php echo $row['level'] == 0 ? 'selected' : ''; ?>>Tiến sĩ</option>
            <option value="1" <?php echo $row['level'] == 1 ? 'selected' : ''; ?>>Thạc sĩ</option>
            <option value="2" <?php echo $row['level'] == 2 ? 'selected' : ''; ?>>Kỹ sư</option>
            <option value="3" <?php echo $row['level'] == 3 ? 'selected' : ''; ?>>Khác</option>
        </select><br>

        <label>Nhóm:</label><br>
        <input type="number" name="group_id" value="<?php echo $row['group_id']; ?>" required><br>

        <br>
        <input type="submit" value="Cập nhật">
        <a href="index.php">Quay lại</a>
        <link rel="stylesheet"href="suasv.css">
    </form>
</body>
</html>