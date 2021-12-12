<?php
	$menus = [
		[
			"link" => "",
			"title" => "Dashboard",
			"icon" => "home",
		],
		[
			"link" => "/admin/users",
			"title" => "Users",
			"icon" => "person",
		],
		[
			"link" => "",
			"title" => "Products",
			"icon" => "cube",
		]
	];

	function getActiveMenu($url){
		$arrayUrl = explode(	'/',$url);
		unset($arrayUrl[0]);
		$uri = $_SERVER['REQUEST_URI'];
		if(strpos($uri, "?")){
			$uri = explode("?",$uri);
			$uri = $uri[0];
		}
		$arrayUri = explode(	'/',$uri);
		unset($arrayUri[0]);
		$isActive = false;
		foreach ($arrayUrl as $key => $value){
			if($key == 3){
				break;
			}
			if($value !== $arrayUri[$key]){
				$isActive = false;
			}else{
				$isActive = true;
			}
		}
		return $isActive;
	}

?>
<aside>
	<ul class="sidebar">
		<li class="brand">
			<span class="icon">
				   <ion-icon name="git-branch"></ion-icon>
			</span>
			<span class="title">TEAM 12</span>
		</li>
		<?php foreach ($menus as $menu): ?>
			<li class="sidebar-item
				<?= getActiveMenu($menu['link'])?'active': '' ?>">
				<a href="<?= $menu['link'] ?>">
					<span class="icon"><ion-icon name="<?= $menu['icon'] ?>" /></span>
					<span class="title"><?= $menu['title'] ?></span>
				</a>
			</li class="sidebar-item">
		<?php endforeach; ?>
	</ul>
</aside>
