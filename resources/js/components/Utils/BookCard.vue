<template>
  <div href="#modal-container" uk-toggle>
    <div class="uk-card uk-card-default p-pointer">
      <div class="uk-card-media-top">
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
      </div>
      <div class="uk-grid-medium uk-flex uk-flex-middle uk-flex-center" uk-grid>
        <div class="uk-width-expand uk-flex uk-flex-column uk-flex-center uk-flex-middle">
          <h3 class="uk-card-title uk-margin-remove-bottom">Título</h3>
          <p class="uk-text-meta uk-margin-remove-top uk-text-center uk-margin-small-bottom">Autor</p>
          <p class="uk-text-meta uk-margin-remove-top uk-text-center uk-margin-small-bottom">Edición</p>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  name: "BookCard",
  props: ["book"]
};
</script>