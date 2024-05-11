<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlvc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM receiver";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EnTiKay Delivery</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
  table {
    width: 100%;
    border-collapse: collapse;
    margin: 15px 0;
  }

  table, th, td {
    border: 1px solid #ddd;
    padding: 8px;
  }

  th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  tr:hover {
    background-color: #ddd;
  }
  </style>
</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.jpg" alt="">
        <span class="d-none d-lg-block">EnTiKay Delivery</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">EnTiKay</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Nguyễn Tuấn Kiệt</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="login.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul>
        </li>

      </ul>
    </nav>
  </header>

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="orders.php">
          <i class="bi bi-bag-check"></i>
          <span>Đơn hàng</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="employees.php">
          <i class="bi bi-person-fill"></i>
          <span>Nhân Viên</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="sender.php">
          <i class="bi bi-person-fill-up"></i>
          <span>Người gửi</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="receiver.php">
          <i class="bi bi-person-fill-down"></i>
          <span>Người nhận</span>
        </a>
      </li>

      
    </ul>
  </aside>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
  function deleteRecord(id) {
      if(confirm('Are you sure you want to delete?')) {
          $.ajax({
              url: 'delete_record_r.php',
              type: 'POST',
              data: { id: id },
              success: function(response) {
                  if(response == 1) {
                      location.reload();
                  } else {
                      alert('Invalid ID.');
                  }
              }
          });
      }
  }
  </script>

  <main id="main" class="main">
  <button class="btn btn-success" onclick="location.href='add_r.php'">Thêm</button>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th></th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["R_ID"]. "</td><td>" . $row["name"]. "</td><td>" . $row["address"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phone"]. "</td>";
                echo "<td><button style='margin-right: 10px; border-radius: 10px; background-color: yellow;' onclick=\"location.href='edit_r.php?id=" . $row["R_ID"]. "'\">Sửa</button>";
                echo "<button style='background-color: red;border-radius: 10px;' onclick=\"deleteRecord(" . $row["R_ID"]. ")\">Xóa</button></td></tr>";
              }
        } else {
            echo "<tr><td colspan='3'>No results</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    
  </main>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>