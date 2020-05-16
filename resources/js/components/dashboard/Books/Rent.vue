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
        <div v-for="i in [1,2,3,4,5,6,7,8,9,10]" v-bind:key="i">
          <BookCard />
        </div>
      </div>
    </div>
    <BookModal />
  </div>
</template>

<script>
import BookCard from "../../Utils/BookCard.vue";
import BookModal from "../../Utils/BookModal.vue";

export default {
  name: "Rent",
  components: {
    BookCard,
    BookModal
  },
  props: ["books"]
};
</script>
