<template>
  <div>
    <h1 class="uk-heading-line uk-heading-small uk-light uk-text-center">
      <span>Renta de libros</span>
    </h1>
    <div uk-height-viewport="offset-top: true">
      <div
        class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-6@l uk-grid-small uk-grid-match uk-padding"
        uk-grid
      >
        <BookCard v-for="book in books" :key="book.id" :book="book" />
      </div>
    </div>
    <!-- <BookModal /> -->
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
    this.books = this.payload;
  },
  data: () => {
    return {
      selectedBook: undefined,
      books: []
    };
  },
  methods: {
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
    }
  }
};
</script>
