<template>
  <div
    class="uk-background-cover"
    style="background-image: url(https://images.wallpaperscraft.com/image/books_shelf_stairs_125930_3840x2400.jpg);"
  >
    <navbar :showItems="false" />
    <div class="uk-container-expand uk-margin-large-top" uk-height-viewport="offset-top: true">
      <div class="uk-grid-collapse uk-child-width-1-3@m uk-child-width-1-1 uk-flex-center" uk-grid>
        <a class="uk-height-medium p-pointer" href="\sale">
          <div
            class="uk-background-cover uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-middle uk-light"
            style="background-image: url(https://wallpaperaccess.com/full/969895.jpg);"
          >
            <h1>Compra de libros</h1>
          </div>
        </a>

        <a class="uk-height-medium p-pointer" href="\rent">
          <div
            class="uk-background-cover uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-middle uk-light"
            style="background-image: url(https://wallpaperaccess.com/full/93553.jpg);"
          >
            <h1>Renta de libros</h1>
          </div>
        </a>
      </div>
      <div
        class="uk-grid-collapse uk-grid-small@m uk-child-width-1-3@m uk-child-width-1-1 uk-flex-center"
        uk-grid
      >
        <a class="uk-height-medium p-pointer" href="\profile">
          <div
            class="uk-background-cover uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-middle uk-light"
            style="background-image: url(https://image.freepik.com/foto-gratis/textura-negra_1160-804.jpg);"
          >
            <h1>Manejar perfil</h1>
          </div>
        </a>

        <a class="uk-height-medium p-pointer" href="\user\books">
          <div
            class="uk-background-cover uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-middle uk-light"
            style="background-image: url(https://images.assetsdelivery.com/compings_v2/alexzaitsev/alexzaitsev1611/alexzaitsev161100001.jpg);"
          >
            <h1>Mis libros</h1>
          </div>
        </a>

      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home"
};
</script>
