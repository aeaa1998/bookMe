<template>
  <div>
    <ValidationProvider v-slot="{ failed, dirty, errors }" v-bind="$attrs">
      <input
        v-bind="$attrs"
        class="uk-input"
        @blur="blurFlag = true"
        @focus="blurFlag = false"
        :class="[{'uk-form-danger v-invalid': failed, 'uk-animation-shake': errors.length > 0 && blurFlag}]"
        v-bind:value="value"
        v-on:input="onInput($event)"
      />

      <span
        class="uk-text-small uk-form-danger"
        v-show="withErrors && errors.length > 0"
      >{{ errors[0] }}*</span>
    </ValidationProvider>
  </div>
</template>
<script>
import { ValidationProvider } from "vee-validate";
export default {
  inheritAttrs: false,
  components: { ValidationProvider },
  props: {
    value: [String, Number, Object, File],
    withErrors: {
      type: Boolean,
      default: true
    },
    vclass: {
      type: String,
      default: ""
    }
  },
  data: () => ({
    blurFlag: false
  }),
  methods: {
    onInput(event) {
      if (this.$attrs["type"] != "file") {
        this.$emit("input", event.target.value);
      } else {
        let file = event.target.files[0];
        this.$emit("input", file);
      }
    }
  }
};
</script>
