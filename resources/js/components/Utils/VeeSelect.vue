<template>
  <div :class="className">
    <ValidationProvider v-slot="{ failed, dirty, errors }" v-bind="$attrs">
      <vSelect
        v-bind:value="value"
        @input="value => $emit('input', value)"
        class="v-custom-select"
        v-bind="$attrs"
        :class="[{
          'vee-select-invalid': failed,
        }, vclass]"
      >
        <slot v-for="(_, name) in $slots" :name="name" :slot="name" />
        <template v-for="(_, name) in $scopedSlots" :slot="name" slot-scope="slotData">
          <slot :name="name" v-bind="slotData" />
        </template>
      </vSelect>
      <slot name="errors" v-bind:errors="errors"></slot>
      <div
        class="uk-text-small uk-form-danger uk-margin"
        v-show="withErrors && errors.length > 0"
      >{{ errors[0] }}*</div>
    </ValidationProvider>
  </div>
</template>
<script>
import vSelect from "vue-select";

import { ValidationProvider } from "vee-validate";

export default {
  inheritAttrs: false,
  components: { vSelect, ValidationProvider },
  props: {
    value: [String, Number, Object],
    vclass: {
      type: String,
      default: ""
    },
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
<style>
.v-custom-select .vs__dropdown-toggle {
  padding: 5px;
  border-radius: 0px;
}

.vee-select-invalid .vs__dropdown-toggle {
  border: 1px #f0506e solid;
}
.vee-select-untouched .vs__dropdown-toggle {
  border: 1px rgb(78, 194, 163) solid;
}
</style>