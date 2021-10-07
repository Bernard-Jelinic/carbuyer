<?php $this->view("inc/header",$data); ?>
<?php $this->view("inc/how_it_works",$data); ?>
<?php $this->view("inc/recent",$data); ?>

    <!-- start: contact -->
    <section id="contact">
        <div class="container">
            <h2>Kontaktirajte nas</h2>

            <div class="flex">
                <div id="form-container">
                    <h3>Kontakt obrazac</h3>
                    <form>
                        <label for="name">Ime</label>
                        <input type="text" id="name" />

                        <label for="email">E-mail</label>
                        <input type="text" id="email" />

                        <label for="subject">Naslov</label>
                        <input type="text" id="subject" />

                        <label for="message">Poruka</label>
                        <textarea id="message" placeholder="Napišite svoju poruku ovdje..."></textarea>

                        <button class="rounded">Pošalji poruku</button>
                    </form>
                </div>
                <!-- start: adress -->
                <div id="address-container">
                    <label>Adresa</label>
                    <p>Kerdeni 92 B, 35 000 Slavonski Brod</p>

                    <label>Telefon</label>
                    <p>091-461-5251</p>

                    <label>E-mail</label>
                    <p>kupiautohr@gmail.com</p>
                </div>
                <!-- end: adress -->
            </div>
        </div>
    </section>
    <!-- end: contact -->
	
<?php $this->view("inc/footer", $data); ?>