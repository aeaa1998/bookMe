<template>
  <div>
    <div
      uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar"
    >
      <nav class="uk-navbar-container uk-margin uk-background-secondary uk-padding-small" uk-navbar>
        <div class="uk-navbar-left">
          <a class="uk-navbar-item uk-logo" href="/home">BookMe</a>
          <ul v-if="showItems" class="uk-navbar-nav">
            <li>
              <a href="#">Libros</a>
              <div class="uk-navbar-dropdown">
                <ul class="uk-nav uk-navbar-dropdown-nav">
                  <li class>
                    <a href="/sales">Venta</a>
                  </li>
                  <li>
                    <a href="/rent">Renta</a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a href="/profile">Mi perfil</a>
            </li>
            <li>
              <a href="/rent">Mis libros</a>
            </li>
          </ul>
        </div>
        <div class="uk-navbar-right">
          <ul class="uk-navbar-nav">
            <li>
              <a href="/logout">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div
      class="uk-background-cover"
      style="background-image: url(https://images.wallpaperscraft.com/image/books_shelf_stairs_125930_3840x2400.jpg);"
    >
      <div class="uk-container-expand uk-padding-small uk-position-relative content">
        <slot name="content"></slot>
      </div>
    </div>
  </div>
</template>
<script>
import { v4 as uuidv4 } from "uuid";
export default {
  props: {
    showItems: {
      type: Boolean,
      default: true
    }
  }
};
</script>