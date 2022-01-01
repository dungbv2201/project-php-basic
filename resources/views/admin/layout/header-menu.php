<nav class="navbar">
	<ul>
		<li class="page-title">

		</li>
		<li class="user-profile">
			<span><?php echo authUser()['fullName'][0]?></span>
			<ul>
				<li>
					<a href="#"><?php echo authUser()['fullName']?></a>
				</li>
				<li>
					<form action="/admin/logout" method="post">
						<button>Logout</button>
					</form>
				</li>
			</ul>
		</li>
	</ul>
</nav>
