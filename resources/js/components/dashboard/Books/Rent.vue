<template>
  <div>
    <h1 class="uk-heading-line uk-heading-small uk-light uk-text-center">
      <span>Renta de libros</span>
    </h1>
    <div uk-height-viewport="offset-top: true">
      <div
        class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-6@l uk-grid-small uk-grid-match uk-padding"
        uk-grid
      >
        <div v-for="i in [1,2,3,4,5,6,7,8,9,10]" v-bind:key="i">
          <div class="uk-card uk-card-default">
            <div
              uk-lightbox
              class="uk-height-medium uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light uk-position-relative"
              data-src="https://www.bookcoversclub.com/wp-content/uploads/2017/07/book-cover-338.jpg"
              uk-img
              alt
            >
              <div class="uk-card-media-top">
                <a
                  class="uk-button uk-button-text uk-position-absolute uk-position-bottom-right uk-position-small"
                  href="https://www.bookcoversclub.com/wp-content/uploads/2017/07/book-cover-338.jpg"
                  data-caption="Titulo del libro"
                >Agrandar</a>
              </div>
            </div>

            <div class="uk-padding-small">
              <div class="uk-card-title">Titulo del libro</div>
              <div>Autor, Edicion</div>
              <div>Precio Venta: 500Q</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>