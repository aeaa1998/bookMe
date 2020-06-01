<template>
  <div v-if="user" uk-grid uk-height-viewport="offset-top: true; offset-bottom: 15px">
    <div class="uk-width-2-3@m uk-width-1-1">
      <h1 class="white uk-heading-small uk-heading-bullet uk-margin-top">Información del ususario</h1>
      <div class="uk-card uk-card-default uk-card-hover">
        <div class>
          <div class="uk-grid uk-flex-middle" uk-grid style="padding: 10px;">
            <div class="uk-position-relative uk-visible-toggle">
              <img
                ref="profile_pic"
                class="uk-border-circle"
                :style="`width: ${width}px!important; height: ${height}px!important;`"
                uk-img="target: .uk-slideshow-items"
                :src="user.profile_path ? `/storage/${user.profile_path}`: 'https://racemph.com/wp-content/uploads/2016/09/profile-image-placeholder.png'"
              />
              <div
                class="uk-position-center-right uk-text-center uk-hidden-hover uk-height-1-1 uk-width-1-1 blur-black uk-border-circle"
                :style="`width: ${width}px!important;`"
                uk-form-custom="target: true"
              >
                <input
                  :style="`width: ${width}px!important; height: ${height}px!important;`"
                  type="file"
                  @change="(e)=> {changeFile(e)}"
                />
                <input
                  :style="`width: ${width}px!important; line-height: ${height}px!important; height: ${height}px!important; font-size: 32px; border: 0;`"
                  class="white-placeholder uk-border-circle centered-input uk-text-center"
                  type="text"
                  placeholder="+"
                  disabled
                />
              </div>
            </div>

            <div class="uk-margin uk-width-expand">
              <h3
                class="uk-card-title uk-margin-remove-bottom"
              >{{user.first_name}} {{user.last_name}}</h3>
              <p class="uk-text-meta uk-margin-remove-top">
                Usuario desde:
                {{moment(user.created_at).locale('es').format('llll')}}
              </p>
            </div>
          </div>
        </div>
        <div class="uk-card-body">
          <ul uk-tab>
            <li>
              <a href="#">Información</a>
            </li>
            <li>
              <a href="#">Editar</a>
            </li>
          </ul>

          <div class="uk-switcher">
            <div>
              <dl class="uk-description-list uk-description-list-divider uk-width1-1">
                <dt class="uk-text-large uk-text-bold">Email</dt>
                <dd>{{user.email}}</dd>
                <dt class="uk-text-large uk-text-bold">Cantidad de libros</dt>
                <dd>{{user.books_count}}</dd>
                <dt class="uk-text-large uk-text-bold">Número de carne</dt>
                <dd>{{user.license_number}}</dd>
                <dt class="uk-text-large uk-text-bold">Número de teléfono</dt>
                <dd>{{user.phone_number}}</dd>
              </dl>
            </div>
            <div class="uk-grid-match" uk-grid>
              <div class="uk-description-list uk-width-1-2@m uk-width-1-1">
                <dt class="uk-text-large uk-text-bold uk-margin-small-bottom">Email</dt>
                <ValidationObserver
                  ref="user-provider"
                  style="display: inherit"
                  v-slot="{ invalid }"
                >
                  <v-input
                    class="uk-width-1-2"
                    name="email"
                    rules="required|email"
                    v-model="newUserModel.email"
                    placeholder="Ingresa tu nuevo usuario"
                  />
                  <button
                    @click="updateUser('email', newUserModel.email, 'user-provider')"
                    :disabled="invalid"
                    class="uk-button uk-button-default uk-button-small uk-width-1-3 uk-margin-left"
                  >
                    <div v-if="changingField.email" uk-spinner></div>
                    {{!changingField.email ? 'Cambiar' : 'Cambiando'}}
                  </button>
                </ValidationObserver>

                <dt class="uk-text-large uk-text-bold">Número de teléfono</dt>
                <ValidationObserver
                  ref="phone-provider"
                  style="display: inherit"
                  v-slot="{ invalid }"
                >
                  <v-input
                    v-model="newUserModel.phoneNumber"
                    class="uk-width-1-2"
                    rules="required|numeric"
                    name="número de teléfono"
                    placeholder="Ingresa tu nuevo numero de teléfono"
                  />
                  <button
                    @click="updateUser('phone_number', newUserModel.phoneNumber, 'phone-provider')"
                    :disabled="invalid"
                    class="uk-button uk-button-default uk-button-small uk-width-1-3 uk-margin-left"
                  >
                    <div v-if="changingField['phone_number']" uk-spinner></div>
                    {{!changingField['phone_number'] ? 'Cambiar' : 'Cambiando'}}
                  </button>
                </ValidationObserver>

                <dt class="uk-text-large uk-text-bold">Nombre</dt>
                <ValidationObserver
                  ref="name-provider"
                  style="display: inherit"
                  v-slot="{ invalid }"
                >
                  <v-input
                    v-model="newUserModel.first_name"
                    class="uk-width-1-2"
                    rules="required"
                    name="Nombre"
                    placeholder="Ingresa tu nuevo numero nombre"
                  />
                  <button
                    @click="updateUser('first_name', newUserModel.name, 'name-provider')"
                    :disabled="invalid"
                    class="uk-button uk-button-default uk-button-small uk-width-1-3 uk-margin-left"
                  >
                    <div v-if="changingField.name" uk-spinner></div>
                    {{!changingField.name ? 'Cambiar' : 'Cambiando'}}
                  </button>
                </ValidationObserver>

                <dt class="uk-text-large uk-text-bold">Apellido</dt>
                <ValidationObserver
                  ref="last-name-provider"
                  style="display: inherit"
                  v-slot="{ invalid }"
                >
                  <v-input
                    v-model="newUserModel.lastName"
                    class="uk-width-1-2"
                    name="Apellido"
                    rules="required|alpha"
                    placeholder="Ingresa tu nuevo apellido"
                  />
                  <button
                    @click="updateUser('last_name', newUserModel.lastName, 'last-name-provider')"
                    :disabled="invalid"
                    class="uk-button uk-button-default uk-button-small uk-width-1-3 uk-margin-left"
                  >
                    <div v-if="changingField['last_name']" uk-spinner></div>
                    {{!changingField['last_name'] ? 'Cambiar' : 'Cambiando'}}
                  </button>
                </ValidationObserver>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="uk-width-1-3@m uk-width-1-1">
      <h2 class="white uk-heading-small uk-heading-bullet uk-margin-top">Cambiar contraseña</h2>
      <div class="uk-card uk-card-default uk-card-hover uk-padding">
        <ValidationObserver ref="password-form" style="display: inherit" v-slot="{ invalid }">
          <form @submit.prevent="updatePassword">
            <div class="uk-text-lead uk-margin-small-bottom">Vieja contraseña</div>
            <div class="uk-width-1-1 uk-margin-bottom">
              <v-input
                v-model="oldPassword"
                name="contraseña actual"
                type="password"
                placeholder="Ingresa tu contraseña actual"
              />
            </div>

            <div class="uk-text-lead uk-margin-small-bottom">Nueva contraseña</div>
            <div class="uk-width-1-1 uk-margin-bottom">
              <v-input
                v-model="newPassword"
                name="contraseña"
                type="password"
                vid="confirmation"
                rules="required|min:6"
                placeholder="Ingresa tu nueva contraseña"
              />
            </div>
            <div class="uk-text-lead uk-margin-small-bottom">Confirmar contraseña</div>
            <div class="uk-width-1-1 uk-margin-bottom">
              <v-input
                name="confirmación contraseña nueva"
                type="password"
                v-model="newPasswordConfrim"
                placeholder="Confirma tu nueva contraseña"
                rules="required|min:6|confirmed:confirmation"
              />
            </div>
            <button
              type="submit"
              class="uk-button uk-button-default uk-display-block"
              :disabled="invalid || loading"
            >
              <div v-if="loading" uk-spinner></div>
              {{loading ? '' : 'Cambiar contraseña'}}
            </button>
          </form>
        </ValidationObserver>
      </div>
    </div>
  </div>
</template>
<script>
import moment from "moment";
export default {
  props: ["myuser"],
  data: () => ({
    user: false,
    loading: false,
    img: "",
    newUserModel: {
      first_name: "",
      email: "",
      phoneNumber: "",
      lastName: ""
    },
    changingField: {
      first_name: false,
      email: false,
      phone_number: false,
      last_name: false
    },
    newPassword: "",
    newPasswordConfrim: "",
    oldPassword: "",
    width: 150,
    height: 150,
    file: ""
  }),

  beforeMount() {
    this.user = this.myuser;
    axios
      .get(`https://randomuser.me/api/?seed=${this.user.id}`)
      .then(response => (this.img = response.data.results[0].picture.large));
  },
  mounted() {
    // window.addEventListener("resize", this.computeSize);
    // this.computeSize();
  },
  destroyed() {
    // window.removeEventListener("resize", this.computeSize);
  },
  methods: {
    changeFile(event) {
      let file = event.target.files[0];
      this.file = file;
      this.changeProfilePic();
    },
    computeSize() {
      this.width = this.$refs.profile_pic.width;
      this.height = this.$refs.profile_pic.clientHeight;
    },
    changeProfilePic() {
      let formData = new FormData();
      formData.append("file", this.file);
      axios
        .post("user/update/profile/pic", formData, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(response => {
          console.log(response);
          this.user.profile_path = response.data;
        })
        .catch(e => {
          this.showErrorAlert("Error al cambiar foto.");
        })
        .finally(() => {
          // this.uploading = false;
        });
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
    updatePassword() {
      this.loading = true;
      axios
        .post("user/update/password", {
          oldPassword: this.oldPassword,
          newPassword: this.newPassword
        })
        .then(response => {
          this.loading = false;
          this.showSuccessAlert("Se establecio la contraseña adecuadamente.");
        })
        .catch(() => {
          this.loading = false;
          this.showErrorAlert(
            "Credenciales inválidas.",
            "La contraseña actual no es la correcta"
          );
        })
        .finally(() => this.cleanForm("password-form"));
    },
    cleanForm(observer) {
      this.$refs[observer].$children.forEach(field => field.$emit("input", ""));
      this.$refs[observer].reset();
    }
  }
};
</script>