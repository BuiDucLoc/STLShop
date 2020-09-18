<?php 
	foreach($homeProductsSell as $item){?>
		<span><?php echo $item['name']; ?></span>
		<span><?php echo $item['price']; ?></span>
		<a href="#"><img style="width: 200px;height: auto" src="views/assets/images/<?php echo $item['image_link'];?>"></a>
<?php	
}
 ?>