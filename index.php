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

  table th:first-child, table td:first-child {
    width: 50px;
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
  .card-deck {
    display: flex;
    justify-content: space-between;
  }
  .card {
      flex: 1 0 20%; /* Grow, shrink, basis */
      margin: 1em;
  }
  .card .card-body h5 {
    color: white;
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


  <main id="main" class="main">
  <div class="card-deck">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Đơn hàng</h5>
                <?php
                $query = "SELECT COUNT(*) as order_count FROM orders";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                echo "<p>Số lượng đơn hàng: " . $row['order_count'] . "</p>";
                ?>
                <a href="orders.php" class="btn btn-light btn-sm">Quản lý đơn hàng</a>
            </div>
        </div>
        <div class="card text-white bg-danger mb-3">
            <div class="card-body ">
                <h5 class="card-title">Nhân viên</h5>
                <?php
                $query = "SELECT COUNT(*) as employee_count FROM employees";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                echo "<p>Số lượng nhân viên: " . $row['employee_count'] . "</p>";
                ?>
                <a href="employees.php" class="btn btn-light btn-sm">Quản lý nhân viên</a>
            </div>
        </div>
        <div class="card text-white bg-dark mb-3">
            <div class="card-body">
                <h5 class="card-title">Người gửi</h5>
                <?php
                $query = "SELECT COUNT(*) as sender_count FROM sender";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                echo "<p>Số lượng người gửi: " . $row['sender_count'] . "</p>";
                ?>
                <a href="sender.php" class="btn btn-light btn-sm">Quản lý người gửi</a>
            </div>
        </div>
        <div class="card text-white bg-secondary mb-3">
            <div class="card-body">
                <h5 class="card-title">Người nhận</h5>
                <?php
                $query = "SELECT COUNT(*) as receiver_count FROM receiver";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                echo "<p>Số lượng người nhận: " . $row['receiver_count'] . "</p>";
                ?>
                <a href="receiver.php" class="btn btn-light btn-sm">Quản lý người nhận</a>
            </div>
        </div>
    </div>

  
    <h2>Top 3 nhân viên tạo nhiều đơn hàng nhất</h2>
    <?php
    echo "<table>";
    echo "<tr><th>STT</th><th>Nhân viên</th><th>Số lượng đơn hàng</th></tr>";

    $query = "SELECT employees.Name, COUNT(*) as order_count 
    FROM orders 
    INNER JOIN employees ON orders.E_ID = employees.E_ID 
    GROUP BY orders.E_ID 
    ORDER BY order_count DESC 
    LIMIT 3";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $count = 1;
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $count . "</td><td>" . $row['Name'] . "</td><td>" . $row['order_count'] . "</td></tr>";
            $count++;
        }
    } else {
        echo "<tr><td colspan='3'>No orders found.</td></tr>";
    }

    echo "</table>";
    ?>
    <br>

    <h2>Top 3 người gửi nhiều đơn hàng nhất</h2>
    <?php
    echo "<table>";
    echo "<tr><th>STT</th><th>Nhân viên</th><th>Số lượng đơn hàng</th></tr>";

    $query = "SELECT sender.name, COUNT(*) as order_count 
    FROM orders 
    INNER JOIN sender ON orders.S_ID = sender.S_ID 
    GROUP BY orders.S_ID 
    ORDER BY order_count DESC 
    LIMIT 3";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $count = 1;
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $count . "</td><td>" . $row['name'] . "</td><td>" . $row['order_count'] . "</td></tr>";
            $count++;
        }
    } else {
        echo "<tr><td colspan='3'>No orders found.</td></tr>";
    }

    echo "</table>";
    ?>
    
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