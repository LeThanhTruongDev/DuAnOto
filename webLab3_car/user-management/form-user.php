<?php
session_start();
# Kiểm tra xem có phải là role admin không, nếu không thì không cho vào trang này
if ((!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin')) {
   header("Location: ../trangchu/index.php");
}

include_once "../database/db_connect.php";
$db = new DB_Connect();

# Lấy danh sách sản phẩm đã đặt từ bảng customers
$query = "SELECT customers.id, customers.fullName, customers.email, customers.address, 
                 orders.product_name, orders.quantity, orders.price, orders.order_date
          FROM customers 
          JOIN orders ON customers.id = orders.customer_id";
$orders = $db->getAll($query);
?>

<div class="container">
   <h1 class="text-center mt-3">Danh sách sản phẩm đã đặt</h1>
   <hr>
   <table class="table table-striped">
      <thead>
         <tr>
            <th scope="col">ID Khách hàng</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Email</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá</th>
            <th scope="col">Ngày đặt hàng</th>
         </tr>
      </thead>
      <tbody>
         <?php if (!empty($orders)) : ?>
            <?php foreach ($orders as $order) : ?>
               <tr>
                  <td><?= htmlspecialchars($order['id']) ?></td>
                  <td><?= htmlspecialchars($order['fullName']) ?></td>
                  <td><?= htmlspecialchars($order['email']) ?></td>
                  <td><?= htmlspecialchars($order['address']) ?></td>
                  <td><?= htmlspecialchars($order['product_name']) ?></td>
                  <td><?= htmlspecialchars($order['quantity']) ?></td>
                  <td><?= htmlspecialchars($order['price']) ?></td>
                  <td><?= htmlspecialchars($order['order_date']) ?></td>
               </tr>
            <?php endforeach; ?>
         <?php else : ?>
            <tr>
               <td colspan="8" class="text-center">Không có dữ liệu</td>
            </tr>
         <?php endif; ?>
      </tbody>
   </table>
</div>
