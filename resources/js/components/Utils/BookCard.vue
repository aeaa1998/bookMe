<template>
    <div class="uk-width-medium">
        <div class="uk-card-media-top">
            <img src="https://www.bookcoversclub.com/wp-content/uploads/2017/07/book-cover-338.jpg" alt="Book Image">
        </div>
        <div class="uk-card uk-card-default">
            <div class="uk-grid-medium  uk-flex uk-flex-middle uk-flex-center" uk-grid>
                <div class="uk-width-expand uk-flex uk-flex-column uk-flex-center uk-flex-middle">
                    <h3 class="uk-card-title uk-margin-remove-bottom">Título</h3>
                    <p class="uk-text-meta uk-margin-remove-top uk-text-center uk-margin-small-bottom"> Autor <br> Edición </p>
                    <a href="#modal-container" class="uk-button uk-button-text uk-margin-small-bottom" uk-toggle> Más información </a>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    name: "BookCard",
  props: ['book']
}
</script>