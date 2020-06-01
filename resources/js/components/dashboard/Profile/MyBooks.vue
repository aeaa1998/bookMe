<template>
  <div class="uk-position-relative" uk-height-viewport="offset-top: true">
    <div class="uk-width-expand uk-flex uk-flex-between uk-flex-middle">
      <div class="uk-margin-large-right uk-margin-large-left"></div>
      <h1 class="uk-heading-line uk-heading-medium uk-light uk-text-center uk-margin uk-margin-left-small uk-margin-right-small"> Libros de {{this.user.first_name}} </h1>
      <div
        :uk-toggle="`target: #modal-add-book`"
        class="uk-card uk-card-default uk-flex uk-flex-middle uk-flex-center p-pointer uk-width-1-6@m uk-width-1-5@s uk-width-1-4 uk-margin-small-right add-btn"
      >
        <div class="uk-text-emphasis uk-text-lead uk-margin-right">Agregar</div>
        <img class="uk-light add" src="/images/plus-sm.png" uk-img />
      </div>
    </div>

    <div v-if="userBooks.length > 0">
      <div v-for="(bookType) in bookTypes" :key="bookType.title">
        <h1 class="uk-heading-line white uk-margin">
          <span>{{bookType.title}}</span>
        </h1>

        <div
          v-if="userBooks.filter(bookType.callback).length >0"
          class="overflow-y-auto hide-scroll-bar uk-width-1-1 uk-flex"
        >
          <div
            v-for="book in userBooks.filter(bookType.callback)"
            :key="book.id"
            v-on:click="selectedBook = book"
            class="mw-25 uk-margin-left uk-margin-right p-pointer"
            uk-toggle="target: #modal-edit-book"
          >
            <BookCard :book="book" />
          </div>
        </div>
        <div
          v-else
          class="uk-heading-line uk-heading-medium uk-light uk-text-center uk-margin"
        >No hay libros en esta categoria</div>
      </div>
    </div>
    <div v-else>
      <div>
        <h2
          class="uk-heading-line uk-heading-medium uk-light uk-text-center uk-margin"
        >Aún no tienes libros.</h2>
      </div>
    </div>
    <AddBook :callback="onSuccessBookCreated" :booksinfo="booksinfo" />
    <EditBook
      :callback="onSuccessBookEdited"
      :booksinfo="booksinfo"
      :selectedBook="selectedBook ? {...selectedBook}: undefined"
    />
  </div>
</template>
<script>
import BookCard from "../Books/BookCard";
import EditBook from "./EditBook";
import AddBook from "./AddBook";
import UIkit from "uikit";

export default {
  components: {
    BookCard,
    EditBook,
    AddBook
  },
  props: ["payload", "user", "booksinfo"],
  data: () => ({
    userBooks: [],
    selectedBook: undefined,
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
    this.userBooks = this.payload;
  },
  methods: {
    onSuccessBookCreated(response) {
      response = response.data;
      this.userBooks.push(response);
      this.showSuccessAlert(
        "Se ingreso el nuevo libro " + response.title + " con exito"
      );
    },
    onSuccessBookEdited(response) {
      response = response.data;
      this.userBooks = this.userBooks.filter(book => book.id != response.id);
      this.userBooks.push(response);
      this.showSuccessAlert(
        "Se edito el libro " + response.title + " con exito"
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
.add {
  object-fit: scale-down;
  width: 1.5rem;
  height: 1.5rem;
}
.add-btn {
  height: 3rem;
  border-radius: 2rem;
}
</style>