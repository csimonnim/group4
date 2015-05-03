	<!--logo--><div style="float: left; width:121px; heigth:65px; margin-top:21px">
		<img src="img/logo.jpg" />
	<!--end logo--></div>
	<!--menu--><div style="float:left; margin: 63px 0px 0px 63px;  solid yellow;"> <!--margin : 0px = top 0px = right 0px = btm 0px = left-->
			<?php 
	$visiting_page= isset($_REQUEST['id'])?$_REQUEST['id']:"";
	$arr_article=array(
	
	array("1", "Home", "Descoption Of Our Home", "home.jpg"),
	array("2", "About Us", "Descoption Of Our About Us", "aboutus.jpg"),
	array("3", "Our Products", "Descoption Of Our Product", "product.jpg"),
	array("4", "Our Services", "Descoption Of Our Serives", "service.jpg"),
	array("5", "Contact US", "Descoption Of Our Contact Us", "contact.jpg"),
	
	);
	$num_menu = count($arr_article);
	for($i=0;$i<$num_menu;$i++){
	$menu_class="menu";
	if($visiting_page==$arr_article[$i][0]){
		$menu_class="menu_current";	
		
	}
	if ($i ==0 && empty ($visiting_page)){
		$menu_class="menu_current";	
	}
		echo '<span class="'.$menu_class.'">';
		echo'<a href="?page=detail&id='.$arr_article[$i][0].'">'.$arr_article[$i][1].'</a>';
		echo'</span>';
	}/*end loop*/
	?>

	<!--end menu--></div>	
	
