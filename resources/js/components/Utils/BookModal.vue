<template>
<<<<<<< Updated upstream
  <div id="book-detail-modal" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog">
      <button class="uk-modal-close-default" type="button" uk-close></button>
      <div class="uk-modal-header uk-text-center">
        <h2 class="uk-modal-title">INFORMACION DEL LIBRO</h2>
      </div>
      <div class="uk-modal-body">
        <div class="uk-flex uk-child-width-1-3">
          <img class="uk-padding-large" :src="book.book_cover" alt />

          <div
            class="uk-width-expand uk-flex uk-flex-column uk-flex-center uk-padding-small uk-padding-large-top"
          >
            <p
              class="uk-margin-remove-top uk-margin-small-bottom uk-text-center uk-text-lead uk-text-large"
            >Título: {{ book.title }}</p>
            <p
              class="uk-margin-remove-top uk-margin-small-bottom uk-text-center uk-text-lead uk-text-large"
            >Publicador: {{ book.publisher.name }}</p>
            <p
              class="uk-margin-remove-top uk-margin-small-bottom uk-text-center uk-text-lead uk-text-large"
            >Dueño: {{ book.user.name }}</p>
            <h4 class="uk-margin-small-top uk-margin-small-bottom">Descripción:</h4>
            <p
              class="uk-text-meta uk-margin-remove-top uk-text-justify uk-padding-small"
              style="border: 0.5px solid;"
            >{{ book.description }}</p>
          </div>

          <div class="uk-padding-large">
            <div
              class="uk-flex uk-flex-column uk-flex-center uk-flex-middle uk-padding-medium"
              style="border: 0.5px solid;"
            >
              <h2 class="uk-margin-remove-top uk-margin-small-bottom">Precios</h2>
              <p class="uk-text-center" uk-margin>
                <span class="uk-text-light" style="font-size: 18px;">Alquiler por semestre</span>
                <br />
                <button
                  class="uk-button uk-button-default"
                  v-if="book.is_on_rent===1"
                >Q. {{ book.payment_detail.rent.price }}</button>
                <button class="uk-button uk-button-default uk-text-muted" v-else>No disponible</button>
              </p>

              <p class="uk-text-center" uk-margin>
                <span class="uk-text-light" style="font-size: 18px;">Venta</span>
                <br />
                <button
                  class="uk-button uk-button-default"
                  v-if="book.is_on_sale===1"
                >Q. {{ book.payment_detail.sale.price }}</button>
                <button class="uk-button uk-button-default uk-text-muted" v-else>No disponible</button>
              </p>
=======
    <div id="available-modal" class="uk-modal-container" uk-modal>
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header uk-text-center">
                <h2 class="uk-modal-title">Información del libro</h2>
            </div>
            <div class="uk-modal-body">
                <div class="uk-flex uk-child-width-1-3">

                    <img class="uk-padding-large" :src="book.book_cover" alt="">

                    <div class="uk-width-expand uk-flex uk-flex-column uk-flex-center uk-padding-small uk-padding-large-top">
                        <p class="uk-margin-remove-top uk-margin-small-bottom uk-text-left uk-text-lead"> <span style="text-decoration: underline"> Publicador:</span> {{ book.publisher.name }} </p>
                        <p class="uk-margin-remove-top uk-margin-small-bottom uk-text-left uk-text-lead"> <span style="text-decoration: underline"> Título:</span> {{ book.title }}</p>
                        <p class="uk-margin-remove-top uk-margin-small-bottom uk-text-left uk-text-lead"> <span style="text-decoration: underline"> Edición:</span> {{ book.edition_number }} </p>
                        <p class="uk-margin-remove-top uk-margin-small-bottom uk-text-left uk-text-lead"> <span style="text-decoration: underline"> Dueño:</span> {{ book.user.name }} </p>
                        <p class="uk-margin-remove-top uk-margin-small-bottom uk-text-left uk-text-lead"> <span style="text-decoration: underline"> Curso:</span> {{ book.course.name }} </p>
                        <p class="uk-margin-remove-top uk-margin-small-bottom uk-text-left uk-text-lead"> <span style="text-decoration: underline"> Estado:</span> {{ book.status.name }} </p>
                    </div>

                    <div class="uk-padding-large">
                        <div class="uk-flex uk-flex-column uk-flex-center uk-flex-middle uk-padding-medium uk-text-lead" style="border: 0.5px solid;">
                            
                            <h2 class="uk-margin-remove-top uk-margin-small-bottom"> <span style="text-decoration: underline"> Precios </span> </h2>
                                <p class="uk-text-center" uk-margin>
                                    <span class="uk-text-light" style="font-size: 18px;"> Renta </span>  <br>
                                    <button class="uk-button uk-button-default uk-text-success uk-modal-close" v-on:click="rentBook(book)" v-if="book.is_on_rent===1">Q. {{ book.payment_detail.rent.price }}</button>
                                    <button class="uk-button uk-button-default uk-text-muted" v-else> No disponible </button>
                                </p>

                                <p class="uk-text-center" uk-margin>
                                    <span class="uk-text-light" style="font-size: 18px;"> Venta </span>  <br>
                                    <button class="uk-button uk-button-default uk-text-success" v-on:click="buyBook(book)" v-if="book.is_on_sale===1">Q. {{ book.payment_detail.sale.price }}</button>
                                    <button class="uk-button uk-button-default uk-text-muted" v-else> No disponible </button>
                                </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button"> Cancel </button>
                <button class="uk-button uk-button-primary" type="button"> Save </button>
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
  name: "BookModal",
  props: ["book"]
};
=======
    name: "BookModal",
    props: ["book"],
    methods: {
        buyBook(book) {
        axios.post("buy/book", {
          id: book.id,
        })
        .then(response => {
            this.$props.book = response.data;
            this.showSuccessAlert("Comprado con éxito!");
        })
        .catch(e => {
            this.showErrorAlert(
                "No se pudo realizar la transacción",
                "Intente de nuevo.");
        });
        },
        rentBook(book) {
        axios.post("rent/book", {
          id: book.id,
        })
        .then(response => {
            this.$props.book = response.data;
            this.showSuccessAlert("Rentado con éxito!");
        })
        .catch(e => {
            this.showErrorAlert(
                "No se pudo realizar la transacción",
                "Intente de nuevo.");
        });
        },
    }
}
>>>>>>> Stashed changes
</script>
