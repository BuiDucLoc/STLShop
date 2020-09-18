<div class="container special">
<div class="col-md-3 col-10 col-xs-12">
    <div class="news-latest">
        <div class="main-heart"><h3>bài viết mới nhất</h3></div> 

        <div class="img">
            <?php foreach ($all_news_latest as $items) {?>
            <div class="img1 clearfix">
                    <div class="item-img">
                      <a href="news/view"><img class="img-responsive" height="65px" width="75px" src="assets/images/<?php echo $items['image'] ?>" alt=""></a>
                        
                    </div>
                    <div class="item-title">
                        <h3><a href="news/view"><?php echo $items['name']; ?></a></h3>
                        <span class="author"><?php echo $items['author']; ?></span>
                        <span class="date"><?php $date = new DateTime($items['date']);
                            echo $date->format('d-m-Y');
                        ?></span>
                    </div>
            </div>
            <?php } ?>
  
        </div>
    </div>  
</div>