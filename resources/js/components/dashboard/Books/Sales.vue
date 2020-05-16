  
<template>
  <div>
    <h1 class="uk-heading-line uk-heading-small uk-light uk-text-center">
      <span>Renta de libros</span>
    </h1>

    <div class="uk-flex uk-flex-center">
      <div class="uk-width-1-2 overflow-y-auto uk-flex hide-scroll-bar">
        <div>
          <a v-if="pagination.prev_page_url" @click="() => (fetchPage(pagination.prev_page_url))">
            <span uk-pagination-previous></span>
          </a>
        </div>
        <div
          v-for="i in Array(pagination.last_page).keys()"
          :key="i"
          class="white uk-margin-left uk-margin-right"
          :class="{'uk-active': pagination.current_page == i}"
        >
          <a @click="() => (fetchPage(undefined, i+1))">{{i + 1}}</a>
        </div>
        <div>
          <a v-if="pagination.prev_page_url" @click="() => (fetchPage(pagination.prev_page_url))">
            <span uk-pagination-next></span>
          </a>
        </div>
      </div>
    </div>
    <div uk-height-viewport="offset-top: true">
      <div
        class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-6@l uk-grid-small uk-grid-match uk-padding"
        uk-grid
      >
            <div v-for="book in this.pagination.data" :key="book.id" v-on:click="selectBook(book)" uk-toggle="target: #available-modal">
                <BookCard :book="book" />
            </div>
      </div>
    </div>
    <BookModal :book="selectedBook"/>
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
    this.selectedBook.payment_detail = JSON.parse(this.selectedBook.payment_detail);
  },
  data: () => {
    return {
      pagination: {},
      selectedBook: undefined,
      books: []
    };
  },
  methods: {
      selectBook(book){
          this.selectedBook = book;
          this.selectedBook.payment_detail = JSON.parse(book.payment_detail);
          console.log('this.selectedBook', this.selectedBook);
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
    fetchPage(url = undefined, page = "") {
      url = url ?? this.pagination.path + "?dataOnly=true&page=";
      axios.get(url + page).then(response => {
        this.pagination = response.data.books;
        console.log(this.pagination);
      });
    }
  }
};
</script>
