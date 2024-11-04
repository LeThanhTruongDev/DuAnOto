<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="../product/product.css">
   <title class="address">hoàngminhAuTo</title>

</head>

<body>
   <div class="backgrond_header">
      <div class="header_image">

      
         <div class="outer">
            <div class="outer_header">
               <div id="logo-bg">
                 <div class="logo_pd">
                 <h1>hoàng minh auto</h1>
                  <span class="tag">Sức Mạnh Tiên Phong</span>
                  <div>
                     <a href="https://www.google.com/search?q=161+%C4%90.%C4%90%E1%BB%93ng+Kh%E1%BB%9Fi+%2C+B%E1%BA%BFn+Ngh%C3%A9+%2C+Qu%E1%BA%ADn+1+%2C+tp.H%E1%BB%93+Ch%C3%AD+Minh&rlz=1C1GCEA_enVN1024VN1024&oq=161+%C4%90.%C4%90%E1%BB%93ng+Kh%E1%BB%9Fi+%2C+B%E1%BA%BFn+Ngh%C3%A9+%2C+Qu%E1%BA%ADn+1+%2C+tp.H%E1%BB%93+Ch%C3%AD+Minh&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIHCAEQIRifBdIBBzgxNGowajeoAgCwAgA&sourceid=chrome&ie=UTF-8" class="address">
                        địa chỉ:161 Đ.Đồng Khởi , Bến Nghé , Quận 1 , tp.Hồ Chí Minh</a>
                  </div>
                  <div>
                     <p>Email : hoanghau12357@gmail.com</p>
                  </div>
                 </div>
               </div>
               <div id="logo-bg">
               <div class="logo_pd">
                 <h1>lời nói từ cửa hàng :</h1>
                  <div  class="address">Chúng tôi cam kết mang đến cho bạn những chiếc xe chất lượng với dịch vụ tận tâm. Sự hài lòng của bạn là ưu tiên hàng đầu của chúng tôi !!!</div>
                 </div>
               </div>
            </div>
           

            <!-- Menu ngang -->
            <div class="clear"></div>
            <div id="bg">
            <div class="toplinks">
               <a href="../trangchu/index.php"><img class="anh" src="../uploads/MH.jpg" alt=""></a>
            </div>
            <div class="sap">|</div>
            <div class="toplinks">
               <a href="../aboutUS/aboutus.php">About us</a>
            </div>
            <div class="sap">|</div>
            <div class="toplinks">
               <a href="../product/product.php">Products</a>
            </div>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
            <div class="sap">|</div>
            <div class="toplinks">
               <a href="../car-management/list-car.php">Management</a>
            </div>
            <div class="sap">|</div>
            <div class="toplinks">
               <a href="../car-management/list-car.php">Đơn hàng</a>
            </div>
            <?php endif; ?>
            <?php if (!isset($_SESSION['is_login'])) : ?>
            <div class="sap">|</div>
            <div class="toplinks">
               <a href="../auth/login.php">Sign in</a>
            </div>
            <div class="sap">|</div>
            <div class="toplinks">
               <a href="../auth/register.php">Sign up</a>
            </div>
            <?php else : ?>
            <div class="sap">|</div>
            <div class="toplinks">
               <a href="../functions/logout.php">Logout</a>
            </div>
            <div class="sap">|</div>
            <div class="toplinks" style="width: fit-content;">
               <span style="margin-left: 20px; font-weight: 500; color: blue;">Xin chào
                  <strong><?php print_r($_SESSION['user']['fullName']) ?></strong></span>
            </div>
            <?php endif; ?>
         </div>
            <div class="clear"></div>
         </div>
      </div>
   </div>