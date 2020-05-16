  
<template>
  <div>
    <h1 class="uk-heading-line uk-heading-small uk-light uk-text-center">
      <span>Renta de libros</span>
    </h1>

    <div class="uk-grid" uk-grid>
      <div class="uk-width-1-2@m uk-width-1-1 uk-grid" uk-grid>
        <div class="uk-search uk-search-default uk-width-1-2@m">
          <span uk-search-icon></span>
          <input
            class="uk-search-input uk-width-1-1 transparent-white"
            type="search"
            v-model="filterTitle"
            placeholder="Buscar por nombre..."
          />
        </div>
        <div class="uk-width-1-4@m">
          <button
            @click="() => (fetchPage(undefined, '1', true))"
            class="uk-button uk-width-1-1 transparent-white"
          >Buscar</button>
        </div>
        <div class="uk-width-1-4@m">
          <button
            @click="() => (cleanPage())"
            class="uk-button uk-width-1-1 transparent-white"
          >Limpiar</button>
        </div>
      </div>
      <div
        v-if="pagination.data.length > 0"
        class="uk-width-1-2@m uk-width-1-1 overflow-y-auto uk-flex hide-scroll-bar uk-margin-left"
      >
        <!-- <div>
          <a v-if="pagination.prev_page_url" @click="() => (fetchPage(pagination.prev_page_url))">
            <span uk-pagination-previous></span>
          </a>
        </div>-->

        <div
          v-for="i in Array(pagination.last_page).keys()"
          :key="i"
          class="white uk-margin-left uk-margin-right"
          :class="{'uk-active': pagination.current_page == i}"
        >
          <a @click="() => (fetchPage(undefined, i+1))">{{i + 1}}</a>
        </div>

        <!-- <div>
          <a v-if="pagination.prev_page_url" @click="() => (fetchPage(pagination.prev_page_url))">
            <span uk-pagination-next></span>
          </a>
        </div>-->
      </div>
    </div>

    <div uk-height-viewport="offset-top: true">
      <div
        v-if="pagination.data.length > 0"
        class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-6@l uk-grid-small uk-grid-match uk-padding"
        uk-grid
      >
        <div
          v-for="book in this.pagination.data"
          :key="book.id"
          v-on:click="selectBook(book)"
          uk-toggle="target: #book-detail-modal"
        >
          <BookCard :book="book" />
        </div>
      </div>
      <div v-else>
        <h1
          class="uk-heading-line uk-heading-medium uk-light uk-text-center uk-medium-margin-top"
        >No se encontro resultados</h1>
        <h1 class="uk-heading-line uk-heading-large uk-light uk-text-center">:(</h1>
      </div>
    </div>
    <BookModal :book="selectedBook" />
  </div>
</template>

<script>
import BookCard from "../../Utils/BookCard.vue";
import BookModal from "../../Utils/BookModal.vue";

export default {
  props: ["payload"],
  name: "Rent",
  components: {
    BookCard,
    BookModal
  },
  beforeMount() {
    this.pagination = this.payload;
    this.selectedBook = this.pagination.data[0];

    this.selectedBook.payment_detail = JSON.parse(
      this.selectedBook.payment_detail
    );
  },
  data: () => {
    return {
      pagination: {},
      selectedBook: undefined,
      books: [],
      filterTitle: "",
      hasScope: false
    };
  },
  methods: {
    selectBook(book) {
      this.selectedBook = book;
      this.selectedBook.payment_detail = JSON.parse(book.payment_detail);
    },
    updateUser(fieldName, value, observer) {
      this.changingField[fieldName] = true;
      axios
        .post("user/update", {
          field: fieldName,
          value: value
        })
        .then(response => {
          this.user = response.data;
          this.changingField[fieldName] = false;
          this.cleanForm(observer);
          this.showSuccessAlert("Se edito el usuario exitosamente.");
        })
        .catch(e => {
          this.changingField[fieldName] = false;
          this.cleanForm(observer);
          if (fieldName == "email") {
            this.showErrorAlert(
              "Error al editar el usuario.",
              "Ese email ya ha sido tomado."
            );
          } else {
            this.showErrorAlert("Error al editar el usuario.");
          }
        });
    },
    fetchPage(url = undefined, page = "", query = false) {
      url = url ?? this.pagination.path + "?dataOnly=true&page=";
      let fullUrl = url + page;
      if (query || this.hasScope) {
        this.hasScope = true;
        fullUrl += "&query=" + this.filterTitle;
      } else {
        this.hasScope = false;
      }
      axios.get(fullUrl).then(response => {
        this.pagination = response.data.books;
      });
    },
    cleanPage() {
      let url = this.pagination.path + "?dataOnly=true&page=";
      this.hasScope = false;
      this.filterTitle = "";

      axios.get(url).then(response => {
        this.pagination = response.data.books;
      });
    }
  }
};
</script>
<style scoped>
.transparent-white {
  background: rgb(248, 250, 252, 0.8);
}
.transparent-white:focus {
  background: rgb(248, 250, 252, 0.95);
}
</style>

