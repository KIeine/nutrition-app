<script setup lang="ts" name="FormInputText">
interface Props {
  name: string;
  type: string;
  title: string;
  small?: boolean;
  min?: number;
}
const { name, type, title, small = false, min = 0 } = defineProps<Props>();
</script>

<template>
  <label :for="name" class="flex flex-col items-center sm:flex-row">
    <span class="min-w-[120px] md:mr-20">{{ title }}</span>
    <input
      :id="name"
      :min="min"
      :type="type"
      :class="{ 'w-32': small, 'w-full md:w-96': !small }"
      class="p-1 border rounded-md outline-none hover:shadow-input-hover focus:shadow-input-focus"
    />
  </label>
</template>
