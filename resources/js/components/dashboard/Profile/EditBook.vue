<template>
  <div id="modal-edit-book" class="uk-modal-container" uk-modal>
    <div v-if="selectedBook" class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
      <div class="uk-modal-header">
        <h2 class="uk-modal-title">Editar un libro</h2>
      </div>
      <div class="uk-margin">
        <ValidationObserver ref="add-book-form" style="display: inherit" v-slot="{ invalid }">
          <form @submit.prevent="editBook">
            <ul uk-tab>
              <li>
                <a href="#">Información</a>
              </li>
              <li>
                <a href="#">Portada</a>
              </li>
            </ul>
            <div class="uk-switcher">
              <div>
                <div uk-grid class="uk-grid-small uk-column-divider uk-height-1-1">
                  <!-- <legend class="uk-legend">Ingresa la información solicitada</legend> -->

                  <div class="uk-width-1-2@m uk-width-1-1">
                    <div class="uk-text-small uk-margin-small-bottom">Titulo del libro</div>
                    <v-input
                      v-model="newBook.title"
                      name="titulo del libro"
                      placeholder="Ingrese el titulo del libro"
                      type="text"
                    />
                  </div>

                  <div class="uk-width-1-2@m uk-width-1-1">
                    <div class="uk-text-small uk-margin-small-bottom">Editorial</div>
                    <v-select
                      v-model="newBook.publisher_id"
                      name="editorial"
                      placeholder="Seleccione una de las editoriales"
                      :options="booksinfo.publishers"
                      :reduce="publisher => publisher.id"
                      :getOptionLabel="publisher => publisher.name"
                      rules="required"
                    ></v-select>
                  </div>
                  <div class="uk-width-1-2@m uk-width-1-1">
                    <div class="uk-text-small uk-margin-small-bottom">Curso al que pertence</div>
                    <v-select
                      v-model="newBook.course_id"
                      name="curso"
                      placeholder="Seleccione uno de los siguientes cursos"
                      :options="booksinfo.courses"
                      :reduce="course => course.id"
                      :getOptionLabel="course => course.name"
                      rules="required"
                    ></v-select>
                  </div>
                  <div class="uk-width-1-2@m uk-width-1-1">
                    <div class="uk-text-small uk-margin-small-bottom">Año en que se publico</div>
                    <v-input
                      v-model="newBook.year"
                      name="año en que se publico"
                      placeholder="Ingrese el año"
                      type="text"
                      rules="required|numeric|min_value:1"
                    />
                  </div>
                  <div class="uk-width-1-2@m uk-width-1-1">
                    <div class="uk-text-small uk-margin-small-bottom">Número de edición del libro</div>
                    <v-input
                      v-model="newBook.edition_number"
                      name="número de edición"
                      placeholder="Ingrese el número de edición"
                      type="text"
                      rules="required|numeric|min_value:1"
                    />
                  </div>
                </div>
                <ul uk-tab>
                  <li>
                    <a @click="() => setActivePayments(['sale'])" href="#">Venta</a>
                  </li>
                  <li>
                    <a @click="() => setActivePayments(['rent'])" href="#">Renta</a>
                  </li>
                  <li>
                    <a @click="() => setActivePayments(['sale', 'rent'])" href="#">Ambos</a>
                  </li>
                </ul>
                <ul class="uk-switcher">
                  <div>
                    <div class="uk-text-small uk-margin-small-bottom">(Q) Precio de venta</div>
                    <v-input
                      v-if="newBook.payment_detail.sale.active"
                      name="precio de venta"
                      v-model="newBook.payment_detail.sale.price"
                      placeholder="Ingrese el precio de venta del libro"
                      type="text"
                      rules="required|numeric|min_value:1"
                    />
                  </div>
                  <div>
                    <div class="uk-text-small uk-margin-small-bottom">(Q) Precio de renta</div>
                    <v-input
                      name="precio de renta"
                      v-if="newBook.payment_detail.rent.active"
                      v-model="newBook.payment_detail.rent.price"
                      placeholder="Ingrese el precio de renta del libro"
                      type="text"
                      rules="required|numeric|min_value:1"
                    />
                  </div>
                  <div class="uk-grid-small uk-grid uk-width-1-1" uk-grid>
                    <div class="uk-width-1-2@m uk-width-1-1">
                      <div class="uk-text-small uk-margin-small-bottom">(Q) Precio de venta</div>
                      <v-input
                        v-if="newBook.payment_detail.sale.active"
                        name="precio de venta"
                        v-model="newBook.payment_detail.sale.price"
                        placeholder="Ingrese el precio de venta del libro"
                        type="text"
                        rules="required|numeric|min_value:1"
                      />
                    </div>
                    <div class="uk-width-1-2@m uk-width-1-1">
                      <div class="uk-text-small uk-margin-small-bottom">(Q) Precio de renta</div>
                      <v-input
                        v-if="newBook.payment_detail.rent.active"
                        v-model="newBook.payment_detail.rent.price"
                        name="precio de renta"
                        placeholder="Ingrese el precio de renta del libro"
                        type="text"
                        rules="required|numeric|min_value:1"
                      />
                    </div>
                  </div>
                </ul>
              </div>

              <div class>
                <ValidationProvider rules="required|ext:jpg,png" v-slot="{ errors, validate }">
                  <div uk-form-custom="target: true">
                    <input type="file" @change="(e)=> {validate(e); changeFile(e)}" />
                    <input
                      class="uk-input uk-form-width-medium uk-width-1-1"
                      type="text"
                      placeholder="Seleccione su foto"
                      disabled
                    />
                  </div>
                  <span
                    class="uk-text-small uk-form-danger"
                    v-show="errors.length > 0"
                  >{{ errors[0] }}*</span>
                </ValidationProvider>
                <div id="preview">
                  <img v-if="preview" :src="preview" />
                </div>
              </div>
            </div>
            <p class="uk-text-right">
              <button
                class="uk-button uk-button-default uk-modal-close"
                :disabled="uploading"
                type="button"
              >Cancelar</button>
              <button
                class="uk-button uk-button-primary"
                type="submit"
                :disabled="invalid || uploading"
              >
                <div v-if="uploading" uk-spinner></div>

                {{uploading ? 'Cargando' : 'Editar libro'}}
              </button>
            </p>
          </form>
        </ValidationObserver>
      </div>
    </div>
  </div>
</template>
<script>
import UIkit from "uikit";
export default {
  props: {
    booksinfo: [Object, Array],
    selectedBook: [Object],
    callback: {
      type: [Function],
      default: () => {}
    }
  },
  data: () => ({
    uploading: false,
    file: "",
    preview: "",
    newBook: {
      title: "",
      year: "",
      edition_number: "",
      publisher_id: "",
      payment_detail: {
        sale: {
          active: true,
          price: ""
        },
        rent: {
          active: false,
          price: ""
        }
      },
      course_id: ""
    }
  }),
  watch: {
    file(value) {
      if (value != "" && value) {
        this.preview = URL.createObjectURL(value);
      }
    },
    selectedBook(value) {
      let detail = this.newBook.payment_detail;
      this.newBook = { ...value };
      this.newBook.payment_detail = detail;
      const holder = JSON.parse(value.payment_detail);
      if (value.is_on_rent == 1) {
        this.newBook.payment_detail.rent.price = holder.rent.price;
      }
      if (value.is_on_sale == 1) {
        this.newBook.payment_detail.sale.price = holder.sale.price;
      }
      this.preview = `/storage/${value.book_cover}`;
    }
  },
  methods: {
    changeFile(event) {
      let file = event.target.files[0];
      this.file = file;
    },
    setActivePayments(args) {
      Object.keys(this.newBook.payment_detail).forEach(key => {
        this.newBook.payment_detail[key].active = false;
      });
      args.forEach(key => {
        this.newBook.payment_detail[key].active = true;
      });
    },
    cleanForm() {
      this.$refs["add-book-form"].$children.forEach(field =>
        field.$emit("input", "")
      );
      this.$refs["add-book-form"].reset();
      this.preview = "";
      this.file = "";
    },
    editBook() {
      this.uploading = true;
      let formData = new FormData();
      formData.append("file", this.file);
      Object.keys(this.newBook).forEach(key => {
        if (key == "payment_detail") {
          Object.keys(this.newBook["payment_detail"]).forEach(key => {
            Object.keys(this.newBook["payment_detail"][key]).forEach(
              keyNested => {
                console.log(key + "_" + keyNested);
                formData.append(
                  key + "_" + keyNested,
                  this.newBook["payment_detail"][key][keyNested]
                );
              }
            );
          });
        } else {
          formData.append(key, this.newBook[key]);
        }
      });
      axios
        .post("/user/book/edit/" + this.newBook.id, formData, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(response => {
          this.callback(response);
          this.cleanForm();
          UIkit.modal("#modal-edit-book").hide();
        })
        .catch(e => {
          console.log(e);
          this.showErrorAlert("Error al ingresar el libro.");
        })
        .finally(() => {
          this.uploading = false;
        });
    }
  }
};
</script>
<style scoped>
#preview {
  border-color: lightslategray;
  border-width: 1px;
  display: flex;
  justify-content: center;
  align-items: center;
}

#preview img {
  max-width: 100%;
  max-height: max(80vh, 355px);
  min-height: 350px;
}
</style>