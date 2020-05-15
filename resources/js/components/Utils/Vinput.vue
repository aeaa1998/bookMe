<template>
  <div :class="className">
    <ValidationProvider :name="name" :vid="vid" :mode="mode" :rules="rules" v-slot="{ errors }">
      <input
        :class="`${inputClass} ${errors.length > 0 ? 'uk-form-danger' : ''}`"
        :type="type"
        v-bind:value="value"
        v-on:input="$emit('input', $event.target.value)"
        :placeholder="placeholder"
      />
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
  props: {
    vid: {
      type: String,
      default: uuidv4()
    },
    name: {
      type: String,
      default: uuidv4()
    },
    mode: {
      type: String,
      default: "aggressive"
    },
    rules: {
      type: String,
      default: "required"
    },
    value: String,
    withErrors: {
      type: Boolean,
      default: true
    },
    placeholder: {
      type: String,
      default: ""
    },
    inputClass: {
      type: String,
      default: "uk-input"
    },
    className: {
      type: String,
      default: ""
    },
    type: {
      type: String,
      default: "text"
    }
  }
};
</script>