import BaseIcon from './components/BaseIcon.vue';

declare module '@vue/runtime-core' {
  export interface GlobalComponents {
    BaseIcon: typeof BaseIcon;
  }
}

export {};
