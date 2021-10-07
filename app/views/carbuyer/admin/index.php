<?php $this->view("admin/inc/header",$data); ?>

    <section class="home-section">
        <div class="home-content">
          <div class="overview-boxes">
            <div class="box">
              <div class="right-side">
                <div class="box-topic">Ukupno oglasa</div>
                <div class="number"><?= $data['count_posts']->count_posts ?></div>
              </div>
              <i class='bx bx-cart-alt cart'></i>
            </div>

            <div class="box">
              <div class="right-side">
                <div class="box-topic">Ukupno kategorija</div>
                <div class="number"><?= $data['count_categories'] ?></div>
              </div>
              <i class='bx bxs-cart-add cart two' ></i>
            </div>

            <div class="box">
              <div class="right-side">
                <div class="box-topic">Ukupno korisnika</div>
                <div class="number"><?= $data['count_users']->count_users ?></div>
              </div>
              <i class='bx bx-cart cart three' ></i>
            </div>

          </div>
        </div>
      </section>

<script src="<?= ASSETS  . THEME ?>admin/js/<?= strtolower($data['page_title']) ?>.js"></script>

</body>
</html>