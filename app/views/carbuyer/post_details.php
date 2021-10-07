<?php $this->view("inc/header",$data); ?>

  <!-- start: main post -->
  
  <section >
      <!-- Start: images slider -->
	  <?php if($post):?>
      <div id="post-image-slider" class="slick">
        <?php if(pathinfo(ROOT . $post->image, PATHINFO_EXTENSION)):?>
          <div>
            <img src="<?=ROOT . $post->image?>" alt="Property Image 1" />
          </div>
        <?php endif; ?>

        <?php if(pathinfo(ROOT . $post->image2, PATHINFO_EXTENSION)):?>
          <div>
            <img src="<?=ROOT . $post->image2?>" alt="Property Image 2" />
          </div>
        <?php endif; ?>

        <?php if(pathinfo(ROOT . $post->image3, PATHINFO_EXTENSION)):?>
          <div>
            <img src="<?=ROOT . $post->image3?>" alt="Property Image 3" />
          </div>
        <?php endif; ?>

        <?php if(pathinfo(ROOT . $post->image4, PATHINFO_EXTENSION)):?>
          <div>
            <img src="<?=ROOT . $post->image4?>" alt="Property Image 4" />
          </div>
        <?php endif; ?>

        <?php if(pathinfo(ROOT . $post->image5, PATHINFO_EXTENSION)):?>
          <div>
            <img src="<?=ROOT . $post->image5?>" alt="Property Image 5" />
          </div>
        <?php endif; ?>

        <?php if(pathinfo(ROOT . $post->image6, PATHINFO_EXTENSION)):?>
          <div>
            <img src="<?=ROOT . $post->image6?>" alt="Property Image 6" />
          </div>
        <?php endif; ?>

        <?php if(pathinfo(ROOT . $post->image7, PATHINFO_EXTENSION)):?>
          <div>
            <img src="<?=ROOT . $post->image7?>" alt="Property Image 7" />
          </div>
        <?php endif; ?>

        <?php if(pathinfo(ROOT . $post->image8, PATHINFO_EXTENSION)):?>
          <div>
            <img src="<?=ROOT . $post->image8?>" alt="Property Image 8" />
          </div>
        <?php endif; ?>

        <?php if(pathinfo(ROOT . $post->image9, PATHINFO_EXTENSION)):?>
          <div>
            <img src="<?=ROOT . $post->image9?>" alt="Property Image 9" />
          </div>
        <?php endif; ?>

      </div>
      <!-- end: images slider -->
    </section>
	<?php endif; ?>

	<div id="post-details" class="flex container">
        <div class="address-container flex">
          <div>
            <address>
              <strong><?=$post->name?></strong>
              <small><?= $post->location ?></small>
            </address>
            <?php if($post->status=="Za prodaju"):?>
              <small class="status"><span class="for-sale"></span> <?= $post->status ?></small>
            <?php else: ?>
              <small class="status"><span class="for-rent"></span> <?= $post->status ?></small>
            <?php endif?>
          </div>
        </div>

        <div class="post-stats-container flex">
          <div class="price">
            <div class="padded-inner-container">
              <strong><?=$post->price?> kn</strong>
              <small>Cijena</small>
            </div>
          </div>
          <div class="beds">
            <div class="padded-inner-container">
              <strong><?=$post->kilometers?></strong>
              <small>Prijeđeni kilometri</small>
            </div>
          </div>
          <div class="baths">
            <div class="padded-inner-container">
              <strong><?=$post->power?> kW</strong>
              <small>Snaga motora</small>
            </div>
          </div>
          <div class="sqft">
            <div class="padded-inner-container">
              <strong><?=$post->motor_type?></strong>
              <small>Vrsta motora</small>
            </div>
          </div>
          <small class="year-built-published">Godina proizvodnje: <?=$post->manufacture_year	?> - Oglas objavljen: <?= $post->date ?></small>
          <small class="year-built-sm">Godina proizvodnje: <?=$post->manufacture_year ?></small>
          <small class="ad-published-sm">Oglas objavljen: <?= $post->date ?></small>
        </div>

        <div class="actions-container flex">
          <div class="favorite">
            <button><span class="fa fa-heart"></span></button>
            <small>Spremi</small>
          </div>
        </div>
      </div>

    <!-- end: main post -->
  </main>

  <!-- start: post description -->
  <section id="post-description">
    <div class="flex container">
      <div class="description">
        <h3>Opis oglasa</h3>
        <p><?=$post->description?></p>
      </div>

      <div class="listed-by-container">
        <h3>Kontaktiraj oglašivača</h3>

            <?php if($advertiser_data->image != ""):?>
              <img src="<?=ROOT . $advertiser_data->image?>" alt="Slika oglašivača" />
            <?php else: ?>
              <img src="<?=ROOT . "users/default.jpg"?>" alt="Slika oglašivača" />
            <?php endif; ?>

        <div>
          <p>Ime: <?= $advertiser_data->name . ' ' . $advertiser_data->last_name ?></p>
          <p>Broj telefona: <?= $advertiser_data->telephone?></p>
          <p>Email: <?= $advertiser_data->email?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- end: post description -->

  <!-- start: post info -->
  <section id="post-info" class="container">
    <div class="home-facts">
      <h3>Osnovne informacije</h3>

      <div class="flex">
        <div>
          <ul>
            <?php if($post->location != ""):?>
            <li>        
                <label>Lokacija:</label>
                <strong><?= $post->location ?></strong>
            </li>
            <?php endif; ?>

            <?php if($post->brand != ""):?>
            <li>
                <label>Marka vozila:</label>
                <strong><?= $post->brand ?></strong>
            </li>
            <?php endif; ?>

            <?php if($post->model != ""):?>
            <li>
                <label>Model vozila:</label>
                <strong><?= $post->model ?></strong>
            </li>
            <?php endif; ?>

            <?php if($post->manufacture_year != ""):?>
            <li>
                <label>Godina proizvodnje:</label>
                <strong><?=$post->manufacture_year?></strong>
            </li>
            <?php endif; ?>

            <?php if($post->kilometers != ""):?>
            <li>
                <label>Prijeđeni kilometri:</label>
                <strong><?=$post->kilometers?> km</strong>
            </li>
            <?php endif; ?>

            <?php if($post->motor_type != ""):?>
            <li>
                <label>Vrsta motora:</label>
                <strong><?=$post->motor_type?></strong>
            </li>
            <?php endif; ?>

            <?php if($post->power != ""):?>
            <li>
                <label>Snaga motora:</label>
                <strong><?=$post->power?> kW</strong>
            </li>
            <?php endif; ?>

            <?php if($post->engine_displacement != ""):?>
            <li>
                <label>Radni obujam:</label>
                <strong><?=$post->engine_displacement?> cm3</strong>
            </li>
            <?php endif; ?>

            <?php if($post->transmission != ""):?>
            <li>
                <label>Mjenjač:</label>
                <strong><?=$post->transmission?></strong>
            </li>
            <?php endif; ?>

            <?php if($post->transmission_number != ""):?>
            <li>
                <label>Broj stupnjeva:</label>
                <strong><?=$post->transmission_number?></strong>
            </li>
            <?php endif; ?>

          </ul>
        </div>

    </div>
  </section>
  <!-- end: post info -->

<?php $this->view("inc/recent",$data); ?>
<?php $this->view("inc/footer",$data); ?>