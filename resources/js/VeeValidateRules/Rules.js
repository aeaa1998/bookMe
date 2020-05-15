import { extend } from 'vee-validate';
import * as rules from 'vee-validate/dist/rules';
import { messages } from 'vee-validate/dist/locale/es.json';

Object.keys(rules).forEach(rule => {
  extend(rule, {
    ...rules[rule],
    message: messages[rule]
  });
});

// extend('numbers', value => {
//   try {
//     let i = Number(value)
//     if (Number.isInteger(i)) {
//       return true
//     }
//   } catch (e) {
//     return 'Debe de ingresar únicamente números';
//   }


//   return 'Debe de ingresar únicamente números';
// })