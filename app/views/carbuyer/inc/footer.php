    <!-- start: footer -->
    <footer>
        <div class="flex container">
            <div class="footer-about">
                <h5>O nama</h5>
                <p>Cilj nam je biti Vaš najbolji i najpouzdaniji partner u potrazi za vozilima. Sve ćemo prilagoditi Vašim uvjetima. Pomoći ćemo Vam pronaći Vaše vozilo iz snova, bez obzira na to radi li se o automobilu, oldtimeru, motociklu, gospodarskom vozilu ili kamperu.</p>
            </div>

            <div class="footer-quick-links">
                <h5>Posjetite linkove</h5>
                <ul>
                    <?php $this->view("inc/links_item",$data); ?>
                </ul>
            </div>

            <div class="footer-subscribe">
                <h5>Pretplatite se na naš Newsletter</h5>
                <div id="subscribe-container">
                    <input type="text" placeholder="Unesi E-mail" />
                    <button class="right-rounded">Pošalji</button>
                </div>

                <h5 class="follow-us">Društvene mreže</h5>
                <ul>
                    <li><a href="https://www.facebook.com"><span class="fab fa-facebook-f"></span></a></li>
                    <li><a href="https://twitter.com/"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="https://www.instagram.com/"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="https://www.linkedin.com/"><span class="fab fa-linkedin-in"></span></a></li>
                </ul>
            </div>
        </div>

        <small class="copyright-footer">
            Copyright &copy; 2021 Sva prava pridržana | Kupi auto.hr
        </small>
    </footer>
    <!-- end: footer -->

    <?php if ($data['page_title']=="Home"): ?>
        <script src="<?= ASSETS  . THEME ?>js/index.js"></script>
    <?php else: ?>
        <script src="<?= ASSETS  . THEME ?>js/<?= strtolower($data['page_title']) ?>.js"></script>
    <?php endif; ?>

</body>
</html>