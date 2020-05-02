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
        <div class="uk-card-header uk-flex uk-flex-center uk-flex-wrap">
          <h3 class="uk-card-title">Registrase</h3>
        </div>
        <form action="/" method="post" class="uk-card-body">
          <div class="uk-margin">
            <input class="uk-input" name="nombre" type="text" placeholder="Nombre" />
          </div>
          <div class="uk-margin">
            <input class="uk-input" name="number" type="text" placeholder="Número de celular" />
          </div>
          <div class="uk-margin">
            <input class="uk-input" name="carne" type="text" placeholder="Número de carné" />
          </div>
          <div class="uk-margin">
            <input class="uk-input" name="email" type="text" placeholder="Email" />
          </div>
          <div class="uk-margin">
            <input type="password" name="password" class="uk-input" placeholder="Password" />
          </div>
          <div class="uk-flex uk-flex-center">
            <input type="submit" class="uk-button uk-button-default" value="Listo!" />

          </div>
        </form>
      </div>
    </div>
  </div>
</template>
