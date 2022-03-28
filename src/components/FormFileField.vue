<script setup lang="ts" name="FormFileField">
import { PROVIDE_ID_TO_KEY } from '@/features/useProvideInjectKeys';

interface Props {
  name: string;
  title: string;
  accept: string;
  required?: boolean;
  modelValue?: File | null;
}

const emit = defineEmits<{
  (e: 'update:modelValue', value: File): void;
}>();

const {
  name,
  title,
  accept,
  required = false,
  modelValue = '',
} = defineProps<Props>();

const injectKey = PROVIDE_ID_TO_KEY.ingredientsCreate;
const formErrors = inject<{
  [key: string]: string;
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
        :id="name"
        type="file"
        :accept="accept"
        :value="modelValue"
        @input="onInput"
        class="w-full p-1 border rounded-md outline-none md:w-96 hover:shadow-input-hover focus:shadow-input-focus"
      />
      <p v-if="formErrors?.[name]" class="mt-1 text-xs text-red-500">
        {{ formErrors[name] }}
      </p>
    </div>
  </label>
</template>
