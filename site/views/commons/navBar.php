<div class="header1">
    <div class="header-top">
      <div class="header-container">
        <div class="search">
          <!-- <form method="get" action="search/keyword/" autocomplete="off">
            <div class="autocomplete">
              <input placeholder="Search" id="myInput" type="text" name="s" onfocus="this.value='';"onblur="if(this.value==''){this.value='Search';}" required>  
            </div>
            <input type="submit" value="Tìm">
          </form> -->
          <form autocomplete="off" action="search/keyword/" method="get">
            <div class="autocomplete" style="width: 100%">
              <input id="myInput" type="text" name="s" placeholder="Search" value="" required>
            </div>
              <!-- <input type="submit" value="Tìm"> -->
          </form>
        </div>
        <div class="header-left">
          <ul>
            <a class="notification ">
              </a>
              <?php if(!isset($_SESSION['user'])){ ?>
            <li class="theli">
              <a class="thea" href="user/login" title="Đăng nhập">Đăng Nhập</a>
            </li>
            <li class="theli ">
              <a class="thea" href="user/register">Đăng ký</a>
            </li>
          <?php }else{?>
            <li class="theli">
              <a class="thea" href="user/login" id="dropdown"><?php  echo $_SESSION['user']['name']; ?></a>
            </li>
            <li class="theli ">
              <a class="thea" href="user/logout">Đăng Xuất</a>
            </li>
          <?php } ?>
          </ul>
          <div class="shopping-cart">
            <a href="cart">
               <?php if(!empty($_SESSION['product']) > 0){ ?>
                <span class="badge"><?php echo count($_SESSION['product']) ?></span>
               <?php } ?>
             <i class="fab fa-yin-yang" style="color:#fff;">Giỏ Hàng</i> 
            </a>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="header-container">
      <div class="header-top2 clear-fix">
        <a href=""> <img class="imgHeader" src="assets/images/logoStore.png"></a>
       
        <div class="header-navbar">
          <div class="menu-destop">
  <div class="main-nav1">

<ul class="clearfix">
  <li><a href="">Trang Chủ</a></li>
        <li><a href="about">Giới Thiệu</a></li>
        <li><a href="product">Sản Phẩm</i></a>
            <ul class="sub-menu">
              <li><a href="product/product_by_cate/1">Áo Nam <span class="sub-tex"></span></a>
                <ul class="sub-menu1">
                    <li><a href="product/all_list/1">Áo Thun Nam</span></a> 
                    </li>
                    <li><a href="product/all_list/2">Áo Sơ Mi Nam</span></a>  
                    </li>
                    <li><a href="product/all_list/15">Áo khoát nam</a></li>
                    <li><a href="product/all_list/16">Áo len nam</a></li>
                </ul>
              </li>
              <li><a href="product/product_by_cate/2">Quần Nam <span class="sub-tex"></span></a>
                  <ul class="sub-menu1">
                    <li><a href="product/all_list/4">Quần Jean Nam</a></li>
                    <li><a href="product/all_list/3">Quần Kaki Nam</a></li>
                    <li><a href="product/all_list/5">Quần Vải Nam</a></li>
                    <li><a href="product/all_list/6">Quần Short Nam</a></li>
                  </ul>
              </li>
              <li><a href="product/product_by_cate/3">Giày Dép Nam</a></li>
              <li><a href="product/product_by_cate/4">Suit Nam</a></li>
              <li><a href="product/product_by_cate/5">Phụ Kiện <span class="sub-tex"></span></a>
                <ul class="sub-menu1">
                  <li><a href="product/all_list/9">Quần Lót Nam</a></li>
                  <li><a href="product/all_list/10">Thắt Lưng Nam</a></li>
                  <li><a href="product/all_list/11">Ví Nam</a></li>
                  <li><a href="product/all_list/12">Mũ Nam</a></li>
                  <li><a href="product/all_list/13">Vớ Nam</a></li>
                  <li><a href="product/all_list/14">Caravat Nam</a></li>
                </ul>
              </li>
            </ul>
        </li>
      
        <li><a href="news">Tin Tức</a></li>
        <li><a href="ht_cua_hang">Hệ Thống Cửa Hàng</a></li>    
      </ul>
  </div>
</div>
          <div class="clearfix"></div>
        </div>

      </div>
      
    </div>
  </div>

</div>
<script type="text/javascript" src="assets/js/search.js">
</script>
<!-- echo json_encode($product); -->
<script type="text/javascript">
  // var b = new Array();

  // autocomplete(document.getElementById("myInput"), b[0]);
</script>


<script type="text/javascript">

  // set su kien khi click chuot
  function myFunction(){
    document.getElementById("dropdown").classList.toggle("show");
  }
  //xy ly khi user click chuot ben ngoai icon
 window.onclick = function(event) {
  if (!event.target.matches('.drop')) {
    var dropdowns = document.getElementsByClassName("info-login");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
