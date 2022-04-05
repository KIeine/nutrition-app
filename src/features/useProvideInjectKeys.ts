import { InjectionKey } from 'vue';

export const PROVIDE_ID_TO_KEY = {
  formErrors: Symbol('formErrors') as InjectionKey<object>,
};
