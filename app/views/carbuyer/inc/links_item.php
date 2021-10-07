<!-- start: links Item -->

	<!-- start: loop -->
	<?php if(is_array($_SESSION['category_data'])): ?>
			<?php foreach($_SESSION['category_data'] as $product): ?>
			<!--start: One category-->
				<li><a href="<?=ROOT?>posts/<?=$product->category?>"><?=$product->category?></a></li>
			<!--end: One category-->
			<?php endforeach;?>
	<?php endif;?>
	<!-- end: loop -->

	<?php if (isset($_SESSION['user_data'])): ?>
		<li><a href="<?= ROOT?>profile"><i class="fa fa-user"></i> <?= $_SESSION['user_data']->name ?></a></li>
		<li><a href="<?= ROOT?>profile/user_posts"> Moji oglasi </a></li>
	<?php endif; ?>

	<?php if (isset($_SESSION['user_data'])): ?>
		<li><a href="<?=ROOT?>logout"><i class="fa fa-lock"></i> Odjava</a></li>
	<?php else: ?>
		<li><a href="<?=ROOT?>login"><i class="fas fa-sign-in-alt"></i> Prijava</a></li>
		<li><a href="<?=ROOT?>signup"><i class="fa fa-user-plus" aria-hidden="true"></i> Registracija</a></li>
	<?php endif; ?>

	<?php if (isset($_SESSION['user_data']) && $_SESSION['user_data']->rank == 'admin'): ?>
		<li><a href="<?=ROOT?>admin"><i class="fas fa-users-cog"></i> Admin</a></li>
	<?php endif; ?>
	
<!-- end: links Item -->
