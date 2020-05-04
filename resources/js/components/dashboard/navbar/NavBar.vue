<template>
  <div
    uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar"
  >
    <nav class="uk-navbar-container uk-margin uk-background-secondary uk-padding-small" uk-navbar>
      <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="/home">BookMe</a>
        <ul v-if="showItems" class="uk-navbar-nav">
          <li class>
            <a href="/sales">Venta</a>
          </li>
          <li>
            <a href="/rent">Renta</a>
          </li>
          <li>
            <a href="/rent">Mi perfil</a>
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