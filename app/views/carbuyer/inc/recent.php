<!-- start: posts -->
<section id="products">
        <div class="container">
            <h2>Aktualno</h2>
            <div id="products-slider" class="slick">
				<!-- start: loop -->
				<?php if(is_array($POSTS)): ?>
						<?php foreach($POSTS as $product): ?>
						<!--start: One product-->
						<div class="single-product">
							<a href="<?=ROOT?>post_details/<?=$product->slag?>">
							<img src="<?= ROOT . $product->image?>" alt="" />
								<div class="product-details">
									<strong><?=$product->name?></strong>
									<span>Prijeđeni kilometri: <?=$product->kilometers?> km</span>
									<span>Lokacija vozila: <?= $product->location ?></span>
									<span>Godina proizvodnje: <?=$product->manufacture_year	?></span>
									<p class="price"><?=$product->price?> kn</p>
								</div>
							</a>
                		</div>
						<!--end: One product-->
						<?php endforeach;?>
				<?php endif;?>
				<!-- end: loop -->
            </div>
            <button class="rounded">Pogledajte popis vozila</button>
        </div>
    </section>
    <!-- end: posts -->