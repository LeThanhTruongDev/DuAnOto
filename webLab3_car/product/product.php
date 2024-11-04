<?php
include_once "../layout/header_product.php";
include_once "../database/db_connect.php";
$db = new DB_Connect();

// Kiểm tra kết nối cơ sở dữ liệu
if (!$db) {
    die('Kết nối cơ sở dữ liệu thất bại');
}

$datas = $db->get("SELECT * FROM car");

// Kiểm tra dữ liệu trả về
if (!$datas) {
    die('Không có dữ liệu hoặc truy vấn không thành công');
}
?>

<body>
    <header>
        <!-- Nội dung header_product.php -->
    </header>
    <div class="content">
        <div class="content_center">
            <div class="content_item">
                <?php foreach ($datas as $data) : ?>
                    <div class="card m-3" style="width: 21rem;">
                        <img src="../uploads/<?= htmlspecialchars($data['thumbnail']) ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title"><?= htmlspecialchars($data['name']) ?></h3>
                            <p class="card-text"><?= htmlspecialchars($data['description']) ?></p>
                            <a href="../infor_product/infor_product.php?id=<?= htmlspecialchars($data['id']) ?>" class="btn btn-primary">Xem chi tiết sản phẩm</a>
                        </div>
                    </div>
                <?php endforeach; ?> 
            </div>
        </div>
    </div>
    <?php include_once "../layout/footer.php"; ?>
</body>
</html>
