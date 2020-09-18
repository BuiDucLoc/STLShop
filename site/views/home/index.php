<?php 
if(isset($_COOKIE['user_name']) && isset($_COOKIE['user_password']))
{
  $_SESSION['user']['name'] = $_COOKIE['user_name'];
  $_SESSION['user']['password'] = $_COOKIE['user_password'];
  $_SESSION['user']['level'] = $_COOKIE['user_level'];

  setcookie('user_name', $_SESSION['user']['name'], time()+(7*24*3600),"/","");
  setcookie('user_password', $_SESSION['user']['password'], time()+(7*24*3600),"/","");
  setcookie('user_level', $_SESSION['user']['level'], time()+(7*24*3600),"/","");
}
 ?>

<!--Gọi file header.php-->
	<?php 
		require('site/views/commons/header.php');
	 ?>
<!--  -->
<!-- <p class="header">IT'S GOOD TO SEE YOU</p> -->

<!-- Gọi file menu -->
<?php 
	require('site/views/commons/navBar.php');
?>

<!-- start slideshow -->
<?php 
  require('site/views/home/slideshow.php');
 ?>

<!-- end slideshow -->
<!-- start main content -->
<div class="main">
  <div class="container special">

<div class="piece-of-content" >
  <div class="content">
    <div class="block2">
      <div class="GiaDo">
        <div style=" border-top:4px solid #ff0068;" class="fr-content">
          <div class="title-block"><h2>Áo </h2></div>
          <div class="content-block"><p>Những chiếc áo được tạo ra từ nhà thiết kế thời trang nổi tiếng Mr.STL</p></div>
          <div class="button-block">
            <a href="product/product_by_cate/1">
              <div class="button">Mua ngay</div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div style="margin-left: -4rem" class="block1">
      <div class="imgTrangChinh">
        <img src="assets/images/ao.jpg">
      </div>
    </div>
  </div>
</div>
<div class="piece-of-content">
 <div class="content ">
  <div class="block1 ">
    <div class="imgTrangChinh">
      <img src="assets/images/shortNam.jpg">
    </div>
  </div>
  <div class="block2 ">
    <div class="GiaDo">
     <div style=" border-top: 4px solid #fff912;" class="fr-content ">
      <div class="title-block"> <h2>Quần</h2></div>
      <div class="content-block"><p>Chất liệu mềm mịn,đường chỉ chắc chắn,form chuẩn mang lại cho người mặc sự thoải mái trẻ trung cho ngày mới năng động.</p></div>
      <div class="button-block">
        <a href="product/product_by_cate/2">
          <div class="button">Mua ngay</div>
        </a>
      </div>
    </div>

  </div>
</div>
</div>
</div>
<div class="piece-of-content" >
  <div class="content">
    <div class="block2">
      <div class="GiaDo">
        <div style=" border-top:4px solid #042b88;" class="fr-content">
          <div class="title-block"><h2>Suit </h2></div>
          <div class="content-block"><p>Những chiếc Suit với màu sắc đa dạng, chất liệu vải thoải mái, thanh lịch...</p></div>
          <div class="button-block">
            <a href="product/product_by_cate/4">
              <div class="button">Mua ngay</div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div style="margin-left: -4rem" class="block1">
      <div class="imgTrangChinh">
        <img src="assets/images/suitNam.png">
      </div>
    </div>
  </div>
</div>
<div class="piece-of-content">
 <div class="content ">
  <div class="block1 ">
    <div class="imgTrangChinh">
      <img src="assets/images/giayDep.jpg">
    </div>
  </div>
  <div class="block2 ">
    <div class="GiaDo">
     <div style=" border-top: 4px solid #0e0d08;" class="fr-content ">
      <div class="title-block"> <h2>Giày-Dép</h2></div>
      <div class="content-block"><p>Những chiếc giày mang khuynh hướng của thế kỉ XX, đơn giản, thoải mái, độc đáo là những sản phẩm đang được bán chạy nhất ở shop.</p></div>
      <div class="button-block">
        <a href="product/product_by_cate/3">
          <div class="button">Mua ngay</div>
        </a>
      </div>
    </div>

  </div>
</div>
</div>
</div>
<div class="piece-of-content" >
  <div class="content">
    <div class="block2">
      <div class="GiaDo">
        <div style=" border-top:4px solid #f96002;" class="fr-content">
          <div class="title-block"><h2>Ví Nam </h2></div>
          <div class="content-block"><p>Một chiếc áo thun, 1 cái quần sort, đôi giày và 1 cái túi, đơn giản, thoải mái là rất phù hợp cho chuyến đi dã ngoại của bạn.</p></div>
          <div class="button-block">
            <a href="product/all_list/11">
              <div class="button">Mua ngay</div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div style="margin-left: -4rem" class="block1">
      <div class="imgTrangChinh">
        <img src="assets/images/ViNam.jpg">
      </div>
    </div>
  </div>
</div>
<div class="piece-of-content">
  <div class="content">
    <div class="block3" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(assets/images/mu.jpg)">
      <div class="content-block3">
        <div class="title-block"><h2 style="color: white ">Mũ</h2></div>
        <div class="content-block"><p style="color: white ">Những chiếc mũ nhiều màu sắc, êm ái, độc nhất tại Việt Nam.</p></div>
        <div class="button-block">
          <a href="product/all_list/12">
            <div class="button">Mua ngay</div>
          </a>
        </div>
      </div>
    </div>
    <div class="block3" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(assets/images/thatLung.jpg)">
      <div class="content-block3">
        <div class="title-block"><h2 style="color: white">Thắt lưng</h2></div>
        <div class="content-block"><p style="color: white">Thắng lưng da cá sấu thật rẻ nhất ở Việt Nam</p></div>
        <div class="button-block">
          <a href="product/all_list/10">
            <div class="button">Mua ngay</div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div style="background-color: #F8F8F8" class="piece-of-content">
  <div class="content">
    <div class="block4">
      
        <div class="imgIcon">
          <i id="iconTrangChinh" class="fas fa-truck"></i>
        </div>
        <div class="title-block">
          <h3>Miễn phí giao hàng</h3>
        </div>
        <div class="content-block4">
          <p>Miễn phí giao hàng cho tất cả đơn hàng tại TP. HCM</p>
        </div>
     
    </div>
    <div class="block5">
      
        <div  class="imgIcon">
          <i id="iconTrangChinh" class="far fa-calendar-alt"></i>
        </div>
        <div class="title-block">
          <a href="about/chinh_sach_bao_hanh">
            <h3>Chính sách bảo hành</h3>  
          </a>
        </div>
    </div>
    <div class="block5">
        <div  class="imgIcon">
          <i id="iconTrangChinh"class="fas fa-mouse-pointer"></i>
        </div>
        <div class="title-block">
          <h3>Chăm sóc khách hàng</h3>
        </div>
        <div class="content-block4">
          <p>0357116129<br>Fanpage:Quần áo STL</p>
        </div>
    </div>
    <div class="block6">
        <div  class="imgIcon">
          <i id="iconTrangChinh" class="fas fa-sync"></i>
        </div>
        <div class="title-block">
          <a href="about/chinh_sach_doi_tra">
            <h3>Chính sách đổi trả</h3>  
          </a>
        </div>
        <div class="content-block4">
          <p>Click để biết thêm chi tiết về chính sách đổi trả của cửa hàng.</p>
        </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- end main content -->

<!-- Gọi file footer -->
    <?php
        require"site/views/commons/footer.php";
     ?>  
    
    <script type="text/javascript">
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
    var i ;
    var i_img = 0;
    var div_slideshow = document.getElementById("SlideShow");
    var img_slideshow = div_slideshow.getElementsByTagName("img");
    var dots = document.getElementsByClassName("dot");
    if (n > img_slideshow.length) {slideIndex = 1} 
    if (n < 1) {slideIndex = img_slideshow.length}
    for (i = 0; i < img_slideshow.length; i++) {
      img_slideshow[i].style.display = "none"; 
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active3", "");
    }
    img_slideshow[slideIndex-1].style.display = "block"; 
    dots[slideIndex-1].className += " active3";
    setInterval(function(){
      
    },3000)
    
  }
    </script>
</body>
</html>