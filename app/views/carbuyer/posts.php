<?php $this->view("inc/header",$data); ?>

<!-- start: products -->
<section id="products">
    <div class="container">
    <?php if(is_array($posts)): ?>
        <h2>Kategorija: <?=$category?></h2>
        <div id="products-slider" class="slick">
            <!-- start: loop -->
                    <?php foreach($posts as $post): ?>
                    <!--start: One product-->
                    <div class="single-product">
                        <a href="<?=ROOT?>post_details/<?=$post->slag?>">
                        <img src="<?= ROOT . $post->image?>" alt="" />
                            <div class="product-details">
                                <strong><?=$post->name?></strong>
                                <span>Prijeđeni kilometri: <?=$post->kilometers?> km</span>
                                <span>Lokacija vozila: <?= $post->location?></span>
                                <span>Godina proizvodnje: <?=$post->manufacture_year?></span>
                                <p class="price"><?=$post->price?> kn</p>
                            </div>
                        </a>
                    </div>
                    <!--end: One product-->
                    <?php endforeach;?>
            
            <!-- end: loop -->
        </div>
        <button class="rounded">Pogledajte popis vozila</button>

        <?php else:?>
            <h2>Nema rezultata za traženi pojam: <?=$category?></h2>
            <div class="no-result">
                <img src="<?=ASSETS .THEME . "images/posts/monkey.png"?>" alt="Nema rezultata" />
            </div>
        <?php endif;?>

    </div>
</section>
<!-- end: products -->

<?php $this->view("inc/footer",$data); ?>