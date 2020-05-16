<template>
  <!-- <div href="#modal-container" uk-toggle> -->
  <div>
    <div class="uk-card uk-card-default p-pointer">
      <div class="uk-card-media-top">
        <div
          uk-lightbox
          class="uk-height-medium uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light uk-position-relative"
          :data-src="book.book_cover"
          uk-img
          alt
        >
          <div class="uk-card-media-top">
            <a
              class="uk-button uk-button-text uk-position-absolute uk-position-bottom-right uk-position-small"
              :href="book.book_cover"
              data-caption="Titulo del libro"
            >Agrandar</a>
          </div>
        </div>
      </div>
      <div class="uk-grid-medium uk-flex uk-flex-middle uk-flex-center" uk-grid>
        <div class="uk-width-expand uk-flex uk-flex-column uk-flex-center uk-flex-middle">
          <h3 class="uk-card-title uk-margin-remove-bottom">{{book.title}}</h3>
          <p
            class="uk-text-meta uk-margin-remove-top uk-text-center uk-margin-small-bottom"
          >{{book.publisher.name}}</p>
          <p
            class="uk-text-meta uk-margin-remove-top uk-text-center uk-margin-small-bottom"
          >Edición no. {{book.edition_number}}</p>
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