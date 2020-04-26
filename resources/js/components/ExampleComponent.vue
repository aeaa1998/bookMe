<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <input v-model="count" />
          <div class="card-header">{count}</div>
          <div class="card-body">I'm an example component.</div>
          <div style="display: block;">Agregar detalles</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: () => {
    return {
      count: "",
      myArray: [],
      dasdasd: {},
      selectedBook: {}
    };
  },
  watch: {
    myArray: (val, oldVal) => {}
  },
  computed: {},
  mounted() {
    console.log("Component mounted.");
  },
  beforeMount() {}
};
</script>
