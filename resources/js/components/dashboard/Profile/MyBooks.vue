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
    <div v-if="userBooks.length > 0">
      <div v-for="(bookType) in bookTypes" :key="bookType.title">
        <h1 class="uk-heading-line white uk-margin">
          <span>{{bookType.title}}</span>
        </h1>

        <div
          v-if="userBooks.filter(bookType.callback).length >0"
          class="overflow-y-auto hide-scroll-bar uk-width-1-1 uk-flex"
        >
          <BookCard
            class="mw-25 uk-margin-left uk-margin-right"
            v-for="book in userBooks.filter(bookType.callback)"
            :key="book.id"
            :book="book"
          />
        </div>
        <div
          v-else
          class="uk-heading-line uk-heading-medium uk-light uk-text-center uk-margin"
        >No hay libros en esta categoria</div>
      </div>
    </div>
    <div v-else>
      <h2 class="uk-heading-line uk-heading-medium uk-light uk-text-center uk-margin">
        No hay libros :(
        <br />
        <br />Puede agregar uno con el boton de arriba
      </h2>
    </div>
    <AddBook :callback="onSuccessBookCreated" :booksinfo="booksinfo" />
  </div>
</template>
<script>
import BookCard from "../Books/BookCard.vue";
import AddBook from "./AddBook";

export default {
  components: {
    BookCard,
    AddBook
  },
  props: ["payload", "user", "booksinfo"],
  data: () => ({
    userBooks: [],
    bookTypes: [
      {
        title: "Venta",
        callback: book => book.is_on_sale == 1 && book.is_on_rent != 1
      },
      {
        title: "Renta",
        callback: book => book.is_on_sale != 1 && book.is_on_rent == 1
      },
      {
        title: "Venta y Renta",
        callback: book => book.is_on_sale == 1 && book.is_on_rent == 1
      }
    ]
  }),
  mounted() {
    console.log(this.payload);
    this.userBooks = this.payload;
  },
  methods: {
    onSuccessBookCreated(response) {
      response = response.data;
      this.userBooks.push(response);
      this.showSuccessAlert(
        "Se ingreso el nuevo libro " + response.title + " con exito"
      );
    }
  }
};
</script>
<style>
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