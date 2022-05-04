<script setup lang="ts" name="BaseButton">
interface Theme {
  primary: string;
  secondary: string;
}

const {
  theme = 'primary',
  disabled = false,
  loading = false,
  icon = null,
  small = false,
} = defineProps<{
  theme?: keyof Theme;
  disabled?: boolean;
  loading?: boolean;
  icon?: string;
  small?: boolean;
}>();

const THEME_TO_CLASS = $computed(
  (): Theme => ({
    primary:
      disabled || loading
        ? 'bg-gray-200 text-white'
        : 'text-white bg-pink-500 hover:bg-pink-500/70 focus:bg-pink-500',

    secondary:
      disabled || loading
        ? 'border border-gray-200 text-gray-200'
        : 'text-pink-500 bg-white border border-pink-500 hover:bg-pink-500/20 focus:bg-pink-500/10',
  }),
);

const classesByTheme = computed(() => THEME_TO_CLASS[theme]);
</script>

<template>
  <button
    class="flex items-center justify-center rounded-md focus:shadow-lg"
    :disabled="disabled || loading"
    :class="[
      classesByTheme,
      { 'cursor-wait': loading },
      { 'cursor-not-allowed': disabled },
      { 'p-1 text-sm': small, 'px-4 py-2': !small },
    ]"
  >
    <BaseIcon v-if="loading" icon="loading" class="w-5 h-5 mr-2 animate-spin" />
    <BaseIcon v-else-if="icon" :icon="icon" class="w-5 h-5 mr-2" />
    <slot />
  </button>
</template>
