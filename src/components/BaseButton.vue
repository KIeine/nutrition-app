<script setup lang="ts" name="BaseButton">
interface types {
  primary: string;
  'primary-inverse': string;
}

const { type = 'primary' } = defineProps<{
  type?: keyof types;
}>();

const TYPE_TO_CLASS: types = {
  primary:
    'text-white bg-pink-500 rounded-md hover:bg-pink-500/70 focus:bg-pink-500',
  'primary-inverse':
    'text-pink-500 bg-white rounded-md border border-pink-500 hover:bg-pink-500/20 focus:bg-pink-500/10',
};

const classesByType = computed(() => TYPE_TO_CLASS[type]);
</script>

<template>
  <button class="px-4 py-2 focus:shadow-lg" :class="classesByType">
    <slot />
  </button>
</template>
