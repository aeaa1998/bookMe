<template>
  <div class="vh-100 book-wallpaper">
    <div class="uk-flex uk-flex-center uk-flex-wrap">
      <div class="uk-flex uk-flex-center uk-width-1-1 uk-flex-wrap uk-margin-medium-top">
        <img class="uk-width-small" src="images/bookMe-green-logo.svg" />
        <div class="uk-width-1-1 text-center white uk-text-lead">BookMe</div>
      </div>

      <div class="uk-card uk-card-default uk-width-3-4 uk-width-2-3@s uk-width-1-3@m uk-margin">
        <div class="uk-card-header uk-flex uk-flex-center uk-flex-wrap">
          <p class="uk-card-title">Registrase</p>
        </div>
        <div class="uk-card-body">
          <ValidationObserver v-slot="{ invalid }">
            <form @submit.prevent="registerUser">
              <v-input
                class="uk-margin-small-bottom"
                inputClass="uk-form-small uk-input "
                v-model="model.firstName"
                placeholder="Nombre"
              />
              <v-input
                class="uk-margin-small-bottom"
                inputClass=" uk-form-small uk-input"
                v-model="model.lastName"
                placeholder="Apellido"
              />
              <v-input
                class="uk-margin-small-bottom"
                inputClass=" uk-form-small uk-input"
                v-model="model.phoneNumber"
                placeholder="Número de celular"
                rules="required|numbers"
              />
              <v-input
                class="uk-margin-small-bottom"
                inputClass=" uk-form-small uk-input"
                v-model="model.licenseNumber"
                placeholder="Número de carné"
                rules="required|numbers"
              />
              <v-input
                name="email"
                class="uk-margin-small-bottom"
                inputClass=" uk-form-small uk-input"
                v-model="model.email"
                placeholder="Email"
                rules="required|email"
              />
              <v-input
                name="contraseña"
                class="uk-margin-small-bottom"
                type="password"
                inputClass=" uk-form-small uk-input"
                v-model="model.password"
                placeholder="Contraseña"
                vid="confirmation"
                rules="required|min:6"
              />
              <v-input
                name="confirmación contraseña"
                class="uk-margin-small-bottom"
                type="password"
                mode="lazy"
                inputClass=" uk-form-small uk-input"
                v-model="model.passwordConfirmation"
                placeholder="Conformación Contraseña"
                rules="required|min:6|confirmed:confirmation"
              />
              <button
                type="submit"
                class="uk-button uk-button-default uk-display-block"
                :disabled="invalid || registering"
              >Registrarse</button>
              <a
                href="login"
                class="uk-link-muted uk-display-block uk-margin-top"
              >¿Ya tienes usuario? Inicia sesión</a>
            </form>
          </ValidationObserver>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: () => {
    return {
      model: {
        firstName: "",
        lastName: "",
        phoneNumber: "",
        licenseNumber: "",
        email: "",
        password: "",
        passwordConfirmation: ""
      },
      registering: false
    };
  },
  methods: {
    registerUser() {
      this.registering = true;
      axios
        .post("register", {
          first_name: this.model.firstName,
          last_name: this.model.lastName,
          email: this.model.email,
          password: this.model.password,
          phone_number: this.model.phoneNumber,
          license_number: this.model.licenseNumber
        })
        .then(response => {
          this.registering = false;
          this.showSuccessAlert("Usuario creado exitosamente.");
          window.location.replace("/login");
        })
        .catch(e => {
          this.registering = false;
          this.showErrorAlert("Error al registrar el usuario.");
        });
    }
  }
};
</script>


