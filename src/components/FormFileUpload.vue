<script setup lang="ts" name="FormFileUpload">
import { PROVIDE_ID_TO_KEY } from '@/features/useProvideInjectKeys';

interface Props {
  name: string;
  title: string;
  accept: string;
  required?: boolean;
}

const emit = defineEmits<{
  (e: 'update:modelValue', value: File): void;
}>();

const { name, title, accept, required = false } = defineProps<Props>();

const injectKey = PROVIDE_ID_TO_KEY.formErrors;
const formErrors = inject<{
  [key: string]: object;
}>(injectKey);

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
      <p v-if="formErrors?.[name]" class="mt-1 text-xs text-red-500">
        {{ formErrors[name] }}
      </p>
    </div>
  </label>
</template>
