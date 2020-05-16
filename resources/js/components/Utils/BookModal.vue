<template>
    <div id="available-modal" class="uk-modal-container" uk-modal>
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header uk-text-center">
                <h2 class="uk-modal-title">INFORMACION DEL LIBRO</h2>
            </div>
            <div class="uk-modal-body">
                <div class="uk-flex uk-child-width-1-3">

                    <img class="uk-padding-large" :src="book.book_cover" alt="">

                    <div class="uk-width-expand uk-flex uk-flex-column uk-flex-center uk-padding-small uk-padding-large-top">
                        <p class="uk-margin-remove-top uk-margin-small-bottom uk-text-center uk-text-lead uk-text-large"> Título: {{ book.title }}</p>
                        <p class="uk-margin-remove-top uk-margin-small-bottom uk-text-center uk-text-lead uk-text-large"> Publicador: {{ book.publisher.name }} </p>
                        <p class="uk-margin-remove-top uk-margin-small-bottom uk-text-center uk-text-lead uk-text-large"> Dueño: {{ book.user.name }} </p>
                        <h4 class="uk-margin-small-top uk-margin-small-bottom"> Descripción: </h4>
                        <p class="uk-text-meta uk-margin-remove-top uk-text-justify uk-padding-small" style="border: 0.5px solid;">
                            {{ book.description }}
                        </p>
                    </div>

                    <div class="uk-padding-large">
                        <div class="uk-flex uk-flex-column uk-flex-center uk-flex-middle uk-padding-medium" style="border: 0.5px solid;">
                            
                            <h2 class="uk-margin-remove-top uk-margin-small-bottom"> Precios</h2>
                                <p class="uk-text-center" uk-margin>
                                    <span class="uk-text-light" style="font-size: 18px;"> Alquiler por semestre </span>  <br>
                                    <button class="uk-button uk-button-default" v-if="book.is_on_rent===1">Q. {{ book.payment_detail.rent.price }}</button>
                                    <button class="uk-button uk-button-default uk-text-muted" v-else> No disponible </button>
                                </p>

                                <p class="uk-text-center" uk-margin>
                                    <span class="uk-text-light" style="font-size: 18px;"> Venta </span>  <br>
                                    <button class="uk-button uk-button-default" v-if="book.is_on_sale===1">Q. {{ book.payment_detail.sale.price }}</button>
                                    <button class="uk-button uk-button-default uk-text-muted" v-else> No disponible </button>
                                </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button"> Cancel </button>
                <button class="uk-button uk-button-primary" type="button"> Save </button>
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
