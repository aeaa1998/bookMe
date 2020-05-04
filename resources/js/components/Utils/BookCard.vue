<template>
<div class="uk-card uk-card-default uk-width-1-5@m uk-card-hover">
    <div class="uk-card-header">
        <div class="uk-grid-small uk-flex-middle" uk-grid>
            <div class="uk-width-expand text-center">
                <h5 class="uk-card-title uk-margin-remove-bottom">Titulo</h5>
                <!-- <h4 class="uk-card-title uk-margin-remove-bottom">{{book_info.title}}</h4>
                <h5 class="uk-text-meta uk-margin-remove-top">{{book_info.author}}</h5>
                <h5 class="uk-text-meta uk-margin-remove-top">Edition: {{book_info.edition}}</h5> -->
            <h6 class="uk-text-meta uk-margin-remove-top">Autor <br> Edición</h6>
            </div> 
        </div>
    </div>
    <div class="uk-card-body">
        <img src="" alt="Book Image">
        <!-- <img v-bind:src="book_info.image" alt="Book Image"> -->
    </div>
    <div class="uk-card-footer">
        <a class="uk-button uk-button-text">Información del libro</a>
    </div>
</div>
</template>

<script>
export default {
  name: "BookCard",
  props: []
}
</script>
