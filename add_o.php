<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlvc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $E_ID = $_POST['E_ID'];
  $R_ID = $_POST['R_ID'];
  $S_ID = $_POST['S_ID'];
  $status = $_POST['status'];
  $Date = $_POST['Date'];
  $address = $_POST['address'];
  $infor = $_POST['infor'];

  $sql = "INSERT INTO orders (E_ID, R_ID, S_ID, status, Date, address, infor) VALUES ('$E_ID', '$R_ID', '$S_ID', '$status', '$Date', '$address', '$infor')";

  if ($conn->query($sql) === TRUE) {
      echo "New order created successfully";
      header("Location: orders.php");
      exit;
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}


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


  <main id="main" class="main">
    <div class="container">
        <h2>Thêm đơn hàng mới</h2>
        <form method="post">
            <div class="form-group">
                <label for="E_ID">Nhân viên:</label>
                <select class = "form-select form-control-lg" name="E_ID" >
                <?php
                $query = "SELECT * FROM employees";
                $e_array = $conn->query($query);
                while($row = $e_array->fetch_assoc()) {
                    echo "<option value='".$row['E_ID']."'>".$row['Name']."</option>";
                }

                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="R_ID">Người nhận:</label>
                <select class = "form-select form-control-lg" name="R_ID" >
                  <?php
                  $query = "SELECT * FROM receiver";
                  $e_array = $conn->query($query);
                  while($row = $e_array->fetch_assoc()) {
                      echo "<option value='".$row['R_ID']."'>".$row['name']."</option>";
                  }

                  ?>
                </select>
            </div>
            <div class="form-group">
                <label for="S_ID">Người gửi:</label>
                <select class = "form-select form-control-lg" name="S_ID" >
                <?php
                  $query = "SELECT * FROM sender";
                  $e_array = $conn->query($query);
                  while($row = $e_array->fetch_assoc()) {
                      echo "<option value='".$row['S_ID']."'>".$row['name']."</option>";
                  }

                  ?>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Trạng thái:</label>
                <select class = "form-select form-control-lg" name="status">
                  <option value="Đang xử lý">Đang xử lý</option>
                  <option value="Đang giao hàng">Đang giao hàng</option>
                  <option value="Hoàn thành">Hoàn thành</option>
                  <option value="Đã hủy">Đã hủy</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Date">Ngày tạo đơn hàng:</label>
                <input type="date" class="form-control" id="Date" name="Date">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ giao hàng:</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="infor">Thông tin:</label>
                <input type="text" class="form-control" id="infor" name="infor">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>  
    </div>
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
