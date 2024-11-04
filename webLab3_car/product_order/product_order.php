<?php
// Khởi động session
session_start(); // Đảm bảo session được khởi động

// Kiểm tra xem người dùng có đăng nhập hay chưa
if (!isset($_SESSION['user']['fullName']) || $_SESSION['user']['fullName'] === '') {
    header("Location: ./not_buy_bcs_login.php");
    exit(); // Dừng thực thi mã nếu người dùng chưa đăng nhập
}

include_once "../database/db_connect.php";
$db = new DB_Connect();
$connection = $db->connect();

// Biến để lưu thông báo
$message = '';
$status = '';

// Biến để lưu dữ liệu form
$formData = [
    'name' => '',
    'telephone' => '',
    'address' => ''
];

// Kiểm tra xem có phải là phương thức POST được submit không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form và lưu vào biến
    $formData['name'] = $_POST['name'] ?? '';
    $formData['telephone'] = $_POST['telephone'] ?? '';
    $formData['address'] = $_POST['address'] ?? '';
    $productName = $_POST['product_type'] ?? '';
    $productPrice = $_POST['price'] ?? '';

    // Kiểm tra nếu người dùng chưa đăng nhập
    if (!isset($_SESSION['user']['fullName']) || $_SESSION['user']['fullName'] === '') {
        $message = "Bạn cần đăng nhập để đặt hàng!";
        $status = 'danger';
    } else {
        try {
            // Truy vấn để thêm dữ liệu vào bảng customers
            $query = "INSERT INTO customers (name, telephone, address, product_type, price) VALUES (:username, :telephone, :address, :product_name, :product_price)";
            $stmt = $connection->prepare($query);
            
            // Gắn giá trị cho các tham số trong câu truy vấn SQL
            $stmt->bindParam(':username', $formData['name']);
            $stmt->bindParam(':telephone', $formData['telephone']);
            $stmt->bindParam(':address', $formData['address']);
            $stmt->bindParam(':product_name', $productName);
            $stmt->bindParam(':product_price', $productPrice);

            $result = $stmt->execute();

            // Thông báo thành công hoặc thất bại
            if ($result) {
                $message = "Đặt hàng thành công!";
                $status = 'success';
            } else {
                $message = "Lỗi khi đang xử lý dữ liệu!";
                $status = 'danger';
            }
        } catch (Exception $exception) {
            // Lỗi xảy ra khi thực hiện câu lệnh SQL
            $message = "Lỗi khi đang xử lý dữ liệu! Chi tiết: " . $exception->getMessage();
            $status = 'danger';
        }
    }
}

// Truy vấn sản phẩm với ID tương ứng
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
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
            <link rel="stylesheet" href="./product_order.css">
        </head>
        <body>
            <div class="container mt-5">
                <div class="product-container">
                    <a href="javascript:history.back()" class="btn btn-back bg-danger">← Trở về</a>
                    
                    <!-- Hiển thị thông báo nếu có -->
                    <?php if ($message): ?>
                        <div class="alert alert-<?php echo htmlspecialchars($status); ?>" role="alert">
                            <?php echo htmlspecialchars($message); ?>
                            <button class="btn btn-idex me-4"><a href="../trangchu/index.php">Trở về trang chủ</a></button>
                        </div>
                    <?php endif; ?>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <img src="../uploads/<?= htmlspecialchars($data['thumbnail']) ?>" alt="<?= htmlspecialchars($data['name']) ?>" class="product-image">
                            <h2 class="product-title"><?= htmlspecialchars($data['name']) ?></h2>
                            <p class="product-price">Giá bán : <?= number_format($data['price'], 0, '', ',') ?> VNĐ</p>
                           
                        </div>
                        <div class="col-md-6">
                            <form class="row g-3 needs-validation" method="POST" novalidate onsubmit="return validateForm()">
                                <div class="form-floating">
                                    <h3 class="form_address">Thông tin giao hàng</h3>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="floatingname" placeholder="Họ và tên" required value="<?= htmlspecialchars($formData['name']) ?>">
                                    <label for="floatingname">Họ và tên</label>
                                </div>
                                <div class="form-floating">
                                    <input type="tel" class="form-control" name="telephone" id="floatingtelephone" placeholder="Số điện thoại" required value="<?= htmlspecialchars($formData['telephone']) ?>">
                                    <label for="floatingtelephone">Số điện thoại</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="address" id="floatingaddress" placeholder="Địa chỉ" required value="<?= htmlspecialchars($formData['address']) ?>">
                                    <label for="floatingaddress">Địa chỉ</label>
                                </div>

                                <!-- Các trường ẩn để gửi thông tin sản phẩm -->
                                <input type="hidden" name="product_type" value="<?= htmlspecialchars($data['name']) ?>">
                                <input type="hidden" name="price" value="<?= htmlspecialchars($data['price']) ?>">
                                
                                <div class="col-12">
                                    <button type="submit" class="btn btn-buy me-4">Hoàn tất đơn hàng</button>
                                    <span>Hãy liên hệ :</span>
                                    <a class="container_contact-span" href="https://www.facebook.com/"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Facebook_Logo_%282019%29.png/800px-Facebook_Logo_%282019%29.png" alt="" class="contact-logo"></a>
                                    <a class="container_contact-span" href="https://zalo.me/pc"><img src="https://cdn.pixabay.com/photo/2020/05/19/17/15/telephone-5191764_1280.png" alt="" class="contact-logo"></a>
                                </div>
                            </form>
                            
                        </div>
                    </div>

                </div>
                
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
            <script>
                function validateForm() {
                    var name = document.getElementById("floatingname").value.trim();
                    var telephone = document.getElementById("floatingtelephone").value.trim();
                    var address = document.getElementById("floatingaddress").value.trim();

                    if (name === "" || telephone === "" || address === "") {
                        alert("Vui lòng điền đầy đủ thông tin trước khi gửi.");
                        return false; // Ngăn không cho gửi form
                    }
                    return true; // Cho phép gửi form
                }
            </script>
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
