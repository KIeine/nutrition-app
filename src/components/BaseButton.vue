<script setup lang="ts" name="BaseButton">
interface theme {
  primary: string;
  'primary-inverse': string;
}

const {
  theme = 'primary',
  disabled = false,
  loading = false,
} = defineProps<{
  theme?: keyof theme;
  disabled?: boolean;
  loading?: boolean;
}>();

const THEME_TO_CLASS = $computed(() => ({
  primary:
    disabled || loading
      ? 'bg-gray-200 text-white'
      : 'text-white bg-pink-500 hover:bg-pink-500/70 focus:bg-pink-500',

  'primary-inverse':
    disabled || loading
      ? 'border border-gray-200 text-gray-200'
      : 'text-pink-500 bg-white border border-pink-500 hover:bg-pink-500/20 focus:bg-pink-500/10',
}));

const classesByTheme = computed(() => THEME_TO_CLASS[theme]);
</script>

<template>
  <button
    class="flex items-center justify-center px-4 py-2 rounded-md focus:shadow-lg"
    :class="classesByTheme"
    :disabled="loading || disabled"
  >
    <BaseIcon v-if="loading" icon="loading" class="w-5 h-5 mr-2 animate-spin" />
    <slot />
  </button>
</template>
