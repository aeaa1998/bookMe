<template>
  <div class="vh-100 book-wallpaper">
    <div class="uk-flex uk-flex-center uk-flex-wrap">
      <div class="uk-flex uk-flex-center uk-width-1-1 uk-flex-wrap uk-margin-medium-top">
        <img class="uk-width-small" src="images/bookMe-green-logo.svg" alt="Kiwi standing on oval" />
        <h1 class="uk-width-1-1 text-center white">BookMe</h1>
      </div>

      <div class="uk-card uk-card-default uk-width-1-3 uk-margin-medium-top">
        <div class="uk-card-header">
          <h3 class="uk-card-title">Ingresa tus credenciales</h3>
        </div>
        <form action="/" method="post" class="uk-card-body">
          <div class="uk-margin">
            <input class="uk-input" name="email" type="text" placeholder="Email" />
          </div>
          <div class="uk-margin">
            <input type="password" name="password" class="uk-input" placeholder="Password" />
          </div>
          <div>
            <input type="submit" class="uk-button uk-button-default" value="Ingresar" />
            <a class="uk-button uk-button-default" href>Registrarse</a>
          </div>
          <div class="uk-margin-top">
            <a class="uk-link-muted" href>Olvidaste tu contraseña?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
