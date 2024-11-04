<?php
session_start();
# Kiểm tra xem có phải là role admin không, nếu không thì không cho vào trang này
if ((!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin')) {
   header("Location: ../index.php");
}

include_once "../database/db_connect.php";
$db = new DB_Connect();
# Lấy tất cả dữ liệu car lên
$datas = $db->get("SELECT * FROM customers");

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

<div class="container">
   <h1 class="text-center mt-3">Danh sách xe</h1>
   <a href="../trangchu/index.php" class="d-inline-flex align-items-center justify-content-center text-decoration-none">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left"
         viewBox="0 0 16 16">
         <path fill-rule="evenodd"
            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
      </svg>
      <span class="ms-3"> Quay về trang chủ</span>
   </a>
   <hr>
  
   
   <table id="table1" class="table table-striped table-hover">
      <thead>
         <tr>
            <th>ID</th>
            <th>name</th>
            <th>telephone</th>
            <th>đại chỉ</th>
            <th>tên sản phẩm</th>
            <th>giá</th>
         </tr>
      </thead>
      <?php if (!empty($datas)) : ?>
      <tbody>
         <?php foreach ($datas as $data) : ?>
         <tr>
            <td><?= $data['id'] ?></td>
            <td><?= $data['name'] ?></td>
            <td><?= $data['telephone'] ?></td>
            <td><?= $data['address'] ?></td>
            <td><?= $data['product_type'] ?></td>      
            <td><?= number_format($data['price'], 0, '', ',') ?></td>
         </tr>
         <?php endforeach; ?>
      </tbody>
      <?php endif; ?>
   </table>

</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
   $('#table1').DataTable();
});

function handleDeleteConfirm(id) {
   const href = "./handle-delete-car.php?id=" + id;
   const isDeleted = confirm(`Bạn có muốn xoá xe có id là ${id} không?`);
   if (isDeleted) {
      window.location.href = href;
   }
}
</script>