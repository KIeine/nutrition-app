import { InjectionKey } from 'vue';

export const PROVIDE_ID_TO_KEY = {
  ingredientsCreate: Symbol('ingredientsCreate') as InjectionKey<object>,
};
