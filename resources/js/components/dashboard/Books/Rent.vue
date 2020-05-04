<template>
  <div>
    <div
      class="uk-background-cover"
      style="background-image: url(https://images.wallpaperscraft.com/image/books_shelf_stairs_125930_3840x2400.jpg);"
    >
      <navbar />
      <div uk-height-viewport="offset-top: true">
        <div
          class="uk-child-width-1-2 uk-child-width-1-5@m uk-grid-small uk-grid-match uk-padding"
          uk-grid
        >
          <div v-for="i in [1,2,3,4,5,6,7,8,9,10]" v-bind:key="i">
            <div class="uk-card uk-card-default">
              <div
                class="uk-height-medium uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light"
                data-src="https://www.bookcoversclub.com/wp-content/uploads/2017/07/book-cover-338.jpg"
                uk-img
                alt
              >
                <div class="uk-card-media-top"></div>
              </div>

              <div class="uk-padding-small">
                <div class="uk-card-title">Titulo del libro</div>
                <div>Autor, Edicion</div>
                <div>Precio Renta Mensual: 100Q</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>