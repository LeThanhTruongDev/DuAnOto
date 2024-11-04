<?php

include_once "../database/db_connect.php";

// Kết nối đến cơ sở dữ liệu
$db = new DB_Connect();
$connection = $db->connect();

// Kiểm tra nếu có ID trong URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Truy vấn sản phẩm với ID tương ứng
    $query = "SELECT * FROM car WHERE id = :id";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Product Information</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <link rel="stylesheet" href="./infor_product.css">
        </head>
        <body>
        <header>
          
       
        <div class="container mt-5">
            <div class="product-container">
            <a href="javascript:history.back()" class="btn btn-back bg-danger">← Trở về</a>
                
                <div class="row">
                    <div class="col-md-6">
                        <img src="../uploads/<?= ($data['thumbnail']) ?>" alt="<?= ($data['name']) ?>" class="product-image">
                    </div>
                    <div class="col-md-6">
                        <div class="product-details">
                            <h2 class="product-title"><?= ($data['name']) ?> </h2>
                            <p class="product-price">Giá bán : <?= number_format($data['price'], 0, '', ',') ?> VNĐ</p>
                            <p class="product-brand">hãng xe : <?= ($data['brand']) ?></p>
                            <p class="product-brand">Màu xe : <?= ($data['color']) ?></p>
                            <p class="product-brand">số ghế : <?= ($data['seats']) ?></p>
                            <p class="product-brand">nhiên liệu : <?= ($data['fuel_type']) ?></p>
                            <p class="product-brand">năm sản xuất : <?= ($data['yearOfProduction']) ?></p>
                            <p class="product-description">mô tả : <?= ($data['description']) ?></p>
                        </div>
                        <div class="container_contact">
                            <button class="btn btn-buy me-4  "><a href="../product_order/product_order.php?id=<?= htmlspecialchars($data['id']) ?>">Buy Now</a></button>
                            <span>liên hệ với chúng tôi :</span>
                            <a class="container_contact-span" href="https://www.facebook.com/"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Facebook_Logo_%282019%29.png/800px-Facebook_Logo_%282019%29.png" alt="" class="contact-logo"></a>
                            <a class="container_contact-span" href="https://zalo.me/pc"><img src="https://cdn.pixabay.com/photo/2020/05/19/17/15/telephone-5191764_1280.png" alt="" class="contact-logo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>
        </html>
        <?php
    } else {
        echo "Product not found.";
    }
} else {
    echo "No product ID specified.";
}
?>
