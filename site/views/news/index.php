<!-- Goi header -->
<?php require('site/views/commons/header.php') ?>

<!-- goi title -->
<!-- <p class="header">IT'S GOOD TO SEE YOU</p> -->

<!-- Gọi navBar -->
<?php require('site/views/commons/navBar.php') ?>

<!-- Gọi breadcrumb -->
<div class="container-xs">
  <?php require('site/views/news/session_breadcrumb.php') ?>
<div class="main clearfix">

    <!-- Gọi file news-latest -->
    <?php require('site/views/news/news_latest.php') ?>
    <div class="col-md-9 col-10 col-xs-12">
        <div class="main-right-title">
           <span>Tin Tức</span>
        </div>
          <div class="main-right-img">
            <?php foreach ($results as $items) {?>
              <div class="main-right-img1">
                  <div class="right-img-item">
                      <div class="col-md-4 col-xs-12 col-sm-12 ">
                        <a href="news/view" class="example">
                          <img src="assets/images/<?php echo $items['image'] ?>" alt="">
                        </a>
                      </div>
                      <div class="col-md-8 col-xs-12 col-sm-12">
                          <h3 class="h3-title"><a href="news/view"><?php echo $items['name'] ?></a></h3>
                          <div class="blog-post">
                            <span class="author">Người viết: <?php echo $items['author']; ?></span>
                            <span class="date"><?php $date = new DateTime($items['date']);
                              echo $date->format('d-m-Y');
                            ?></span>
                          </div>
                          <div class="title-desc"><p><?php echo $items['brief']; ?></p></div>
                      </div>
                  </div>
              </div>
            <?php } ?>
          </div></div>
        </div>
</div>
</div>


    <!-- Gọi footer -->
    <?php require('site/views/commons/footer.php') ?>
    
</body>
</html>
