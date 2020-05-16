<template>
    <div id="modal-container" class="uk-modal-container" uk-modal>
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header uk-text-center">
                <h2 class="uk-modal-title">Visualización de libro</h2>
            </div>
            <div class="uk-modal-body">
                <div class="uk-flex uk-child-width-1-3">

                    <img class="uk-padding-large" src="https://www.bookcoversclub.com/wp-content/uploads/2017/07/book-cover-338.jpg" alt="">

                    <div class="uk-width-expand uk-flex uk-flex-column uk-flex-center uk-flex-middle uk-padding-large uk-padding-medium-top">
                        <h1 class="uk-margin-remove-top uk-margin-small-bottom"> {{ book.title }}</h1>
                        <h3 class="uk-margin-remove-top uk-margin-small-bottom"> {{ book.publisher }}</h3>
                        <h3 class="uk-margin-remove-top uk-margin-small-bottom"> {{ book.user }} </h3>
                        <h4 class="uk-margin-small-top uk-margin-small-bottom"> {{Descripción}} </h4>
                        <p class="uk-text-meta uk-margin-remove-top uk-text-justify uk-padding-small" style="border: 0.5px solid;">
                            {{ book.description }}
                        </p>
                    </div>

                    <div class="uk-padding-large">
                        <div class="uk-flex uk-flex-column uk-flex-center uk-flex-middle uk-padding-medium" style="border: 0.5px solid;">
                            
                            <h2 class="uk-margin-remove-top uk-margin-small-bottom"> Precios</h2>
                            <p class="uk-text-center" uk-margin>
                                <span class="uk-text-light" style="font-size: 18px;"> Alquiler por semestre </span>  <br>
                                <button class="uk-button uk-button-default">Q. {{ book.detail.rent_detail.price }}</button>
                            </p>

                            <p class="uk-text-center" uk-margin>
                                <span class="uk-text-light" style="font-size: 18px;"> Compra </span> <br>
                                <button class="uk-button uk-button-default">Q. {{ book.detail.sale_details.price }}</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary" type="button">Save</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BookModal",
    props: ["book"],
}
</script>
