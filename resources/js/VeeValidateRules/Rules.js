import { extend } from 'vee-validate';
import * as rules from 'vee-validate/dist/rules';
import { messages } from 'vee-validate/dist/locale/es.json';

Object.keys(rules).forEach(rule => {
  extend(rule, {
    ...rules[rule],
    message: messages[rule]
  });
});

extend('required-file', value => {
  try {

    if (value !== undefined) {
      return true
    }
  } catch (e) {
    return 'Debe ingresar un archivo';
  }


  return 'Debe ingresar un archivo';
})