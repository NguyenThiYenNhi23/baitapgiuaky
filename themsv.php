<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên</title>
</head>
<body>
    <h1>Thêm sinh viên mới</h1>

    <form method="POST" action="themsv.php">
        <label for="fullname">Họ và tên:</label>
        <input type="text" name="fullname" required><br>

        <label for="dob">Ngày sinh:</label>
        <input type="date" name="dob" required><br>

        <label for="gender">Giới tính:</label>
        <input type="radio" name="gender" value="0" required> Nữ
        <input type="radio" name="gender" value="1" required> Nam<br>

        <label for="hometown">Quê quán:</label>
        <input type="text" name="hometown" required><br>

        <label for="level">Trình độ học vấn:</label>
        <select name="level" required>
            <option value="0">Tiến sĩ</option>
            <option value="1">Thạc sĩ</option>
            <option value="2">Kỹ sư</option>
            <option value="3">Khác</option>
        </select><br>

        <label for="group">Nhóm:</label>
        <select name="group" required>
            <option value="1">Nhóm 1</option>
            <option value="2">Nhóm 2</option>
            <option value="3">Nhóm 3</option>
            <option value="3">Nhóm 4</option>
            <option value="3">Nhóm 5</option>
            <option value="3">Nhóm 6</option>
            <option value="3">Nhóm 7</option>
            <option value="3">Nhóm 8</option>
            <option value="3">Nhóm 9</option>
        </select><br>

        <input type="submit" value="Lưu">
        <link rel="stylesheet" href="themsv.css">
    </form>
</body>
</html>
<?php
$conn = new mysqli('localhost', 'root', '', 'QLSV_NguyenThiYenNhi');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $hometown = $_POST['hometown'];
    $level = $_POST['level'];
    $group = $_POST['group'];
    // Chỉnh sửa lại cú pháp SQL
    $sql = "INSERT INTO table_Students (fullname, dob, gender, hometown, level, group)
            VALUES ('$fullname', '$dob', '$gender', '$hometown', '$level', '$group')";


    if ($conn->query($sql) === TRUE) {

        
        // Sau khi lưu thành công, chuyển hướng về index.php
        header("Location: index.php");
        exit();  // Đảm bảo script dừng lại và thực hiện chuyển hướng
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

