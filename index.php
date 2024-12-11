<?php
$conn = new mysqli('localhost', 'root', '', 'QLSV_NguyenThiYenNhi');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$search = "";
if(isset($_GET["search"]) && !empty($_GET["search"])){
    $search = $_GET['search'];
    $sql = "SELECT * FROM table_Students WHERE (fullname LIKE '%$search%')OR (hometown LIKE '%$search%')";
}else{
    $sql = "SELECT * FROM table_Students";
}

$sql = "SELECT * FROM table_Students";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danhsachsinhvien</title>
    
</head>
<body>
    <h1 align="center"> Danh sách sinh viên </h1>
    <table class="search">
        <tr>
            <td>
                <form action="" method="get">
                    <input type="text" name="search" placeholder="Nhập tên hoặc quê quán để tìm kiếm" value="<?php if(isset($_GET['search'])) {echo $_GET['search'];} ?>">
                    <input type="submit" value="Tìm">
                    <input type="button" value="Tất cả" onclick="window.location.href='index.php'">
                    <style> 
                        form {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            padding-top: 20px;
                            padding-bottom: 20px;
                            background-color:darkseagreen; /* Màu nền nhẹ */
                        }

                    </style>
                </form>
            </td>
        </tr>
    </table>
    <table border="1px">
        <tr>
            <th>Thứ tự</th>
            <th>Họ và tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Quê quán</th>
            <th>Trình độ học vấn</th>
            <th>Nhóm</th>
            <th>Thao tác</th>
        </tr>
        <?php
        $stt=1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $stt++ . "</td>";
            echo "<td>" . $row['fullname'] . "</td>";
            echo "<td>" . $row['dob'] . "</td>";
            echo "<td>" . ($row['gender'] == 1 ? 'Nam' : 'Nữ') . "</td>";
            echo "<td>" . $row['hometown'] . "</td>";
            echo "<td>" . ($row['level'] == 0 ? 'Tiến sĩ' : ($row['level'] == 1 ? 'Thạc sĩ' : ($row['level'] == 2 ? 'Kỹ sư' : 'Khác'))) . "</td>";
            echo "<td>Nhóm " . $row['group'] . "</td>";
            echo "<td><a href='suasv.php?id=" . $row['id'] . "'>Sửa</a> | <a href='xoasv.php?id=" . $row['id'] . "'>Xóa</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <link rel="stylesheet" href="index.css">
    <a href="themsv.php">Thêm sinh viên</a>
    
    
</body>
</html>


