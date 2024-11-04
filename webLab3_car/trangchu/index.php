<?php include_once "../layout/header.php";
include_once "../database/db_connect.php";
$db = new DB_Connect();


$datas = $db->get("SELECT * FROM car LIMIT 3");
?>

<div id="outer2">
   <div id="left-nav">
      <h2>danh sách best seller</h2>
      <?php foreach ($datas as $data) : ?>
         <div id="showcase">
            <div class="stxt-bg">
               <h3><?= $data['name'] ?></h3>
               <div class="smalltext">
                  <a href="../product/product.php"><img src="../uploads/<?= $data['thumbnail'] ?>" alt="" width="150" height="95"></a>
                  <div class="clear"></div>
                  <?= $data['description'] ?>
                  <div style="clear: right; height: 25px;">
                     <span class="read-more"><a href="../infor_product/infor_product.php?id=<?= htmlspecialchars($data['id']) ?>">Read More</a></span>
                  </div>
               </div>
            </div>
         </div>
      <?php endforeach; ?>
   </div>
</div>

<div id="content">
   <h2>[ chào mừng đến với Hoàng Minh Auto ]</h2>
   <div id="main">
   Chào mừng bạn đến với thế giới đa dạng và phong phú của các mẫu ô tô,
   nơi mà sự kết hợp giữa công nghệ và thiết kế tinh tế mang đến những trải nghiệm vô song.
   Từ những chiếc ô tô tiện ích đến những chiếc xe mạnh mẽ, hiện đại,
   thế giới xe hơi không chỉ là phương tiện di chuyển mà còn là biểu tượng của phong cách sống và cái đẹp của công nghệ.
   Hãy cùng nhau khám phá sự đa dạng, sức mạnh và đẳng cấp của các loại xe,
   nơi mà đam mê và sáng tạo hội tụ để tạo ra những kiệt tác di động độc đáo và không ngừng làm mới.
      <h4>New Feature Car</h4>
      <a href="../product/product.php"><img src="https://th.bing.com/th/id/OIP.THySQ-QQ7pgzJaQGabxkTgHaFj?rs=1&pid=ImgDetMain.jpg" alt="" width="150" height="95"></a>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium non quisquam eaque commodi ipsam laborum
      perspiciatis minus Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi sit ut optio nemo ipsum
      nesciunt, nobis corporis! Blanditiis, molestiae explicabo. Dolore reprehenderit dolorem minima nostrum incidunt
      eius accusantium nam optio. <span class="read-more"><a href="https://danchoioto.vn/bmw-i8-gia/">Read More</a></span>
      <div class="clear"></div>

      <h4>New Feature Car</h4>
      <a href="../product/product.php"><img src="https://th.bing.com/th/id/OIP.2QCICLmk-YIIe3kQDgyfrAHaEq?rs=1&pid=ImgDetMain.jpg" alt="" width="150" height="95"></a>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium non quisquam eaque commodi ipsam laborum
      perspiciatis minus Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos saepe incidunt accusantium,
      commodi, hic soluta natus error quis a enim voluptate ex laudantium mollitia rerum! Quo quas nesciunt animi.
      Aspernatur. <span class="read-more"><a href="https://www.audi.com/en/sport/motorsport/audi-racing-models.html">Read More</a></span>
      <div class="clear"></div>

      <h2>Company New</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo impedit quas cupiditate, modi illo
         corrupti aliquam enim est fugit rem officiis dolores facere? Sit, totam nobis assumenda sunt neque ea. Lorem
         ipsum dolor sit, amet consectetur adipisicing elit. Atque deserunt nulla rerum omnis quibusdam quo iure
         veritatis, molestias possimus perspiciatis adipisci facere neque quae magnam est assumenda aperiam, tempore
         a. <span class="read-more"><a href="../aboutUS/aboutus.php">Read More</a></span></p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem sunt blanditiis dolorem nam dignissimos?
         Vero, sequi sit facilis quaerat aliquid vitae nostrum rem nulla maiores voluptatem sed repudiandae quo
         corrupti? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate, nulla consequuntur impedit
         ducimus veritatis id vero hic, minima odit modi reiciendis officia quam libero vitae maiores saepe voluptate
         aut laudantium. <span class="read-more"><a href="../product/product.php">Read More</a></span></p>
   </div>
   <div class="clear"></div>
</div>

<?php include_once "../layout/footer.php"; ?>

</body>

</html>