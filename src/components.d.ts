import BaseIcon from './components/BaseIcon.vue';
import BaseButton from './components/BaseButton.vue';

declare module '@vue/runtime-core' {
  export interface GlobalComponents {
    BaseIcon: typeof BaseIcon;
    BaseButton: typeof BaseButton;
  }
}

export {};
