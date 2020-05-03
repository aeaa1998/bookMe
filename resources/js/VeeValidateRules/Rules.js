import { extend } from 'vee-validate';
import * as rules from 'vee-validate/dist/rules';
import { messages } from 'vee-validate/dist/locale/es.json';

Object.keys(rules).forEach(rule => {
  // if (rule != 'email') {
  extend(rule, {
    ...rules[rule],
    message: messages[rule] 
  });
// }
});

extend('required', {
  validate (value) {
    return {
      required: true,
      valid: ['', null, undefined].indexOf(value) === -1
    };
  },
  message: 'El campo es obligatorio',
  computesRequired: true
});

// extend('email', value => {
//   if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value)) {
//       return true;
//   }

//   return 'El campo debe ser una dirección de correo válida';
// })

extend('numbers', value => {
try {
  let i = Number(value)
  if (Number.isInteger(i)) {
    return true
  }
} catch(e) {
  return 'Debe de ingresar únicamente números';
}


  return 'Debe de ingresar únicamente números';
})