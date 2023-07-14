<footer>
  <div class="color-part2"></div>
  <div class="container-fluid">
    <div class="row block-content">
      <div class="col-xs-12 col-sm-4 wow zoomIn" data-wow-delay="0.3s">
        <img src="img/logo-footer.png" width="211" height="57" alt="">
        <p>Servicio eficaz a través de tecnología innovadora, procesos óptimos y personal calificado. Líderes en el traslado de combustible, minerales y semillas.</p>
        <div class="footer-icons">
          <a href="https://www.facebook.com/TramusaCarrier/" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a>
          <a href="https://g.page/TramusaCarrier/" target="_blank"><i class="fa fa-google-plus-square fa-2x"></i></a>
          <a href="https://twitter.com/tramusacarrier" target="_blank"><i class="fa fa-twitter-square fa-2x"></i></a>
        </div>
        <a href="#" class="btn btn-lg btn-danger">Rastreo de unidad</a>
      </div>
      <div class="hidden-xs col-sm-2 wow zoomIn" data-wow-delay="0.3s">
        <h4>DIRECTORIO</h4>
        <nav>
          <a href="#">Quiénes Somos</a>
          <a href="#">Nuestros Servicios</a>
          <a href="#">Acceso Clientes</a>
          <a href="#">Blog</a>
        </nav>
      </div>
      <div class="hidden-xs col-sm-2 wow zoomIn" data-wow-delay="0.3s">
        <h4>SERVICIOS</h4>
        <nav>
          <a href="#">Transporte de combustible</a>
          <a href="#">Transporte de mineral</a>
          <a href="#">Transporte de semillas</a>
        </nav>
      </div>
      <div class="hidden-xs col-sm-4 wow zoomIn" data-wow-delay="0.3s">
        <h4>CONTÁCTANOS</h4>
        <div class="contact-info">
          <span><i class="fa fa-location-arrow"></i><strong>SOMBRERETE ZACATECAS</strong><br>Carretera Panamericana KM. 162.6 CP: 99100</span>
          <span><i class="fa fa-phone"></i>433.935.2784</span>
          <span><i class="fa fa-envelope"></i>info@tramusacarrier.com.mx</span>
          <span><i class="fa fa-clock-o"></i>Lun - Sáb  9.00 - 19.00</span>
        </div>
      </div>
    </div>
    <div class="copy text-right"><a id="to-top" href="#this-is-top"><i class="fa fa-chevron-up"></i></a><a href="#">SAEMI</a> &copy; 2019 TramusaCarrier - Todos los derechos reservados.</div>
  </div>
</footer>
</div>

<!--Main-->
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!-- Loader -->
<script src="assets/loader/js/classie.js"></script>
<script src="assets/loader/js/pathLoader.js"></script>
<script src="assets/loader/js/main.js"></script>
<script src="js/classie.js"></script>
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--Owl Carousel-->
<script src="assets/owl-carousel/owl.carousel.min.js"></script>
<!--blockUI-->
<script src="assets/blockui-master/jquery.blockUI.js"></script>
<?php
if(isset($vista)){
  if($vista == 'inicio' || $vista == 'cotizaciones'){
    ?>
    <!--Contact form-->
    <script src="assets/cotizaciones/jqBootstrapValidation.js"></script>
    <script src="assets/cotizaciones/getcotizacion.js"></script>
    <?php
  }
  elseif($vista == 'contacto'){
    ?>
    <!--Contact form-->
    <script src="assets/contact/jqBootstrapValidation.js"></script>
    <script src="assets/contact/contact_me.js"></script>
    <?php
  }
  elseif($vista == 'vacantes'){
    ?>
    <!--Contact form-->
    <script src="assets/contact/jqBootstrapValidation.js"></script>
    <script src="assets/contact/sendvacante.js"></script>
    <?php
  }
  elseif($vista == 'encuestasc'){
    ?>
    <!--Contact form-->
    <script src="assets/contact/jqBootstrapValidation.js"></script>
    <script src="assets/contact/sendencuestasc.js"></script>
    <?php
  }
  elseif($vista == 'encuestatp'){
    ?>
    <!--Contact form-->
    <script src="assets/contact/jqBootstrapValidation.js"></script>
    <script src="assets/contact/sendencuestatp.js"></script>
    <?php
  }
}
?>
<!-- SCRIPTS -->
<script type="text/javascript" src="assets/isotope/jquery.isotope.min.js"></script>
<!--Theme-->
<script src="js/jquery.smooth-scroll.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.placeholder.min.js"></script>
<script src="js/smoothscroll.min.js"></script>
<script src="js/theme.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148950811-1">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-148950811-1');
</script>
</body>
</html>
