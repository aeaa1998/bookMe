<template>
  <navbar :showItems="false">
    <div
      slot="content"
      uk-height-viewport="offset-top: true; offset-bottom: 15px"
      class="uk-flex uk-flex-center"
    >
      <div class="uk-container-large">
        <div class="uk-grid uk-flex uk-flex-center" uk-grid>
          <div class="uk-width-1-3@m uk-width-1-1">
            <a class="uk-link-reset uk-animation-scale-down" href="\sale">
              <div class="uk-inline">
                <img
                  class="fh-275 img-cover h-shadow uk-width-1-1"
                  src="https://images.gr-assets.com/misc/1576518043-1576518043_goodreads_misc.gif"
                  alt
                />
                <div class="uk-overlay uk-overlay-default uk-position-bottom">
                  <h2>Compra de libros</h2>
                  <p>Compra tus libros a los mejores precios</p>
                </div>
              </div>
            </a>
          </div>
          <div class="uk-width-1-3@m uk-width-1-1">
            <a class="uk-link-reset uk-animation-scale-down" href="\rent">
              <div class="uk-inline">
                <img
                  class="fh-275 img-cover h-shadow uk-width-1-1"
                  src="https://images.gr-assets.com/misc/1576518436-1576518436_goodreads_misc.gif"
                  alt
                />
                <div class="uk-overlay uk-overlay-default uk-position-bottom">
                  <h2>Renta de libros</h2>
                  <p>Renta los libros de tus compañeros dentro de la universidad.</p>
                </div>
              </div>
            </a>
          </div>
          <div class="uk-width-1-3@m uk-width-1-1">
            <a class="uk-link-reset uk-animation-scale-down" href="\profile">
              <div class="uk-inline">
                <img
                  class="fh-275 img-cover h-shadow uk-width-1-1"
                  src="https://img.rawpixel.com/s3fs-private/rawpixel_images/website_content/pf-icon4-jir2064-por-03-l.jpg?bg=transparent&con=3&cs=srgb&dpr=1&fm=jpg&ixlib=php-3.1.0&mark=&markalpha=90&markpad=13&markscale=10&markx=25&q=65&usm=15&vib=3&w=1400&s=c07ad57f8e886355249445682e37c9e6"
                  alt
                />
                <div class="uk-overlay uk-overlay-default uk-position-bottom">
                  <h2>Manejar perfil</h2>
                  <p>Ten acceso a tu perfil y confugralo a tu placer.</p>
                </div>
              </div>
            </a>
          </div>

          <div>
            <a class="uk-link-reset uk-animation-scale-down" href="\user\books">
              <div class="uk-inline">
                <img
                  class="fh-400 uk-width-1-1 img-cover h-shadow"
                  src="https://miro.medium.com/max/10000/1*RRzmy1VPuNDYNr72RExGWQ.jpeg"
                  alt
                />
                <div class="uk-overlay uk-overlay-default uk-position-bottom">
                  <h2>Mis libros</h2>
                  <p>Maneja tus libros en venta y en renta.</p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </navbar>
</template>

<script>
import UIkit from "uikit";
export default {
  name: "Home",
  mounted() {
    // UIkit.toggle("#test");
  }
};
</script>
