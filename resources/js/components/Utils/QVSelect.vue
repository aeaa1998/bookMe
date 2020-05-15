<template>
  <div :class="className">
    <ValidationProvider v-slot="{ errors }" v-bind="$attrs">
      <v-select v-bind:value="value" @input="(value) => $emit('input', value)" v-bind="$attrs"></v-select>
      <span
        class="uk-text-small uk-form-danger"
        v-show="withErrors && errors.length > 0"
      >{{ errors[0] }}*</span>
    </ValidationProvider>
  </div>
</template>
<script>
import { v4 as uuidv4 } from "uuid";
export default {
  inheritAttrs: false,

  props: {
    value: [String, Number],
    withErrors: {
      type: Boolean,
      default: true
    },
    className: {
      type: String,
      default: ""
    }
  }
};
</script>