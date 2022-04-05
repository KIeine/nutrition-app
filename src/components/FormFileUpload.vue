<script setup lang="ts" name="FormFileUpload">
interface Props {
  name: string;
  title: string;
  accept: string;
  required?: boolean;
  error?: string;
}

const {
  name,
  title,
  accept,
  required = false,
  error = '',
} = defineProps<Props>();

const emit = defineEmits<{
  (e: 'update:modelValue', value: File): void;
}>();

const onInput = (e: Event) => {
  emit(
    'update:modelValue',
    ((e.target as HTMLInputElement).files as FileList)[0],
  );
};
</script>

<template>
  <label :for="name" class="flex flex-col items-center sm:flex-row">
    <span class="min-w-[120px] md:mr-20">
      {{ title }}
      <span v-if="required" class="text-red-500">*</span>
    </span>

    <div>
      <input
        type="file"
        :id="name"
        :accept="accept"
        class="w-full p-1 border rounded-md outline-none md:w-96 hover:shadow-input-hover focus:shadow-input-focus"
        @change="onInput"
      />
      <p v-if="error" class="mt-1 text-xs text-red-500">
        {{ error }}
      </p>
    </div>
  </label>
</template>
