<script setup lang="ts" name="FormFileField">
interface Props {
  name: string;
  title: string;
  accept: string;
  required?: boolean;
  modelValue?: string | null;
}

const emit = defineEmits<{
  (e: 'update:modelValue', value: string): void;
}>();

const {
  name,
  title,
  accept,
  required = false,
  modelValue = '',
} = defineProps<Props>();

const onInput = (e: Event) => {
  emit('update:modelValue', (e.target as HTMLInputElement).value);
};
</script>

<template>
  <label :for="name" class="flex flex-col items-center sm:flex-row">
    <span class="min-w-[120px] md:mr-20">
      {{ title }}
      <span v-if="required" class="text-red-500">*</span>
    </span>

    <input
      :id="name"
      type="file"
      :accept="accept"
      :value="modelValue"
      @input="onInput"
      class="w-full p-1 border rounded-md outline-none md:w-96 hover:shadow-input-hover focus:shadow-input-focus"
    />
  </label>
</template>
