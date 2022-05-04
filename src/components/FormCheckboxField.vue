<script setup lang="ts" name="FormCheckboxField">
interface Props {
  name: string;
  title: string;
  modelValue?: boolean;
}

const { name, title, modelValue = false } = defineProps<Props>();

const emit = defineEmits<{
  (e: 'update:modelValue', value: boolean): void;
}>();

const onInput = (e: Event) => {
  emit('update:modelValue', (e.target as HTMLInputElement).checked);
};
</script>

<template>
  <label :for="name" class="flex flex-col items-center sm:flex-row">
    <span class="min-w-[200px] mr-10">
      {{ title }}
    </span>

    <input :id="name" type="checkbox" :value="modelValue" @input="onInput" />
  </label>
</template>
