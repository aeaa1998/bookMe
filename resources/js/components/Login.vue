<template>
  <div class="vh-100 book-wallpaper">
    <div class="uk-flex uk-flex-center uk-flex-wrap">
      <div class="uk-flex uk-flex-center uk-width-1-1 uk-flex-wrap uk-margin-medium-top">
        <img class="uk-width-small" src="images/bookMe-green-logo.svg" alt="Kiwi standing on oval" />
        <h2 class="uk-width-1-1 text-center white">BookMe</h2>
      </div>

      <div
        class="uk-card uk-card-default uk-width-3-4 uk-width-2-3@s uk-width-1-3@m uk-margin-medium-top"
      >
        <div class="uk-card-header">
          <h3 class="uk-card-title">Ingresa tus credenciales</h3>
        </div>
        <div class="uk-card-body">
          <div class="uk-margin">
            <input class="uk-input" v-model="email" name="email" type="text" placeholder="Email" />
          </div>
          <div class="uk-margin">
            <input type="password" v-model="password" name="password" class="uk-input" placeholder="Password" />
          </div>
          <div>
            <button @click="logIn" class="uk-button uk-button-default" :disabled="!validLoginform || logging" >Ingresar</button>
            <a href="/register" class="uk-button uk-button-default">Registrarse</a>
          </div>
          <div class="uk-margin-top">
            <a class="uk-link-muted" href>Olvidaste tu contraseña?</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: () => {
    return {
      email: "",
      password: "",
      logging: false,
    }
  },
  computed: {
    validLoginform() {
      return this.email != "" && this.password != ""
    }
  },
  methods: {
    logIn(){
      this.logging = true
      axios
        .post("login", {
            "email": this.email,
            "password": this.password,
        })
        .then(response => {
          this.logging = false
          this.showSuccessAlert("Se inicio sesión correctamente.")
          window.location.replace("/home")
        })
        .catch(e => {
          this.logging = false
          this.showErrorAlert("Credenciales incorrectas.")
        })
    }
  }
};
</script>

