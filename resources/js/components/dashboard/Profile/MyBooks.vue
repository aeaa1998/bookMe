<template>
  <div uk-height-viewport="offset-top: true">
    <h1
      class="uk-heading-line uk-heading-medium uk-light uk-text-center uk-margin"
    >Libros de {{this.user.first_name}}</h1>
    <button
      class="uk-button uk-button-default uk-margin-small-right uk-margin uk-button-secondary"
      type="button"
      :uk-toggle="`target: #modal-add-book`"
    >Agregar libro</button>
    <div v-for="(books, index) in userBooks" :key="index">
      <h1 class="uk-heading-line white uk-margin">
        <span>{{index}}</span>
      </h1>

      <div class="overflow-y-auto hide-scroll-bar uk-width-1-1 uk-flex">
        <BookCard
          class="mw-25 uk-margin-left uk-margin-right"
          v-for="book in books"
          :key="book.id"
          :book="book"
        />
      </div>
    </div>
    <AddBook :callback="onSuccessBookCreated" :booksinfo="booksinfo" />
  </div>
</template>
<script>
import BookCard from "../../Utils/BookCard.vue";
import AddBook from "./AddBook";

export default {
  components: {
    BookCard,
    AddBook
  },
  props: ["payload", "user", "booksinfo"],
  data: () => ({
    userBooks: []
  }),
  mounted() {
    this.userBooks = this.payload;
  },
  methods: {
    onSuccessBookCreated(response) {
      response = response.data;
      if (response.is_on_sale == 1 && response.is_on_rent == 1) {
        this.userBooks["Venta y renta"].push(response);
      } else if (response.is_on_sale == 1) {
        this.userBooks["Venta"].push(response);
      } else {
        this.userBooks["Renta"].push(response);
      }
      this.showSuccessAlert(
        "Se ingreso el nuevo libro " + response.title + " con exito"
      );
    }
  }
};
</script>
<style scoped>
.mw-25 {
  min-width: max(25%, 300px);
}
.fixed-btn {
  max-width: max(15%, 150px) !important;
}
.transparent-white {
  background: rgb(248, 250, 252, 0.8);
}
</style>