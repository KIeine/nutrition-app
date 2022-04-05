<script setup lang="ts" name="FormTextareaField">
import { PROVIDE_ID_TO_KEY } from '@/features/useProvideInjectKeys';

interface Props {
  name: string;
  title: string;
  rows?: number;
  small?: boolean;
  maxlength?: number;
  required?: boolean;
  modelValue?: string;
}

const emit = defineEmits<{
  (e: 'update:modelValue', value: string | number | null): void;
}>();

const injectKey = PROVIDE_ID_TO_KEY.formErrors;
const formErrors = inject<{
  [key: string]: object;
}>(injectKey);

const {
  name,
  title,
  small = false,
  rows = 3,
  maxlength,
  required = false,
  modelValue = '',
} = defineProps<Props>();

const onInput = (e: Event) => {
  emit('update:modelValue', (e.target as HTMLInputElement).value);
};
</script>

<template>
  <label :for="name" class="flex flex-col items-start sm:flex-row">
    <span class="min-w-[120px] md:mr-20">
      {{ title }}
      <span v-if="required" class="text-red-500">*</span>
    </span>

    <div>
      <textarea
        :id="name"
        :rows="rows"
        :required="required"
        :maxlength="maxlength"
        :value="modelValue"
        @input="onInput"
        :class="{ 'w-32': small, 'w-full md:w-96': !small }"
        class="p-1 border rounded-md outline-none hover:shadow-input-hover focus:shadow-input-focus"
      />
      <p v-if="formErrors?.[name]" class="mt-1 text-xs text-red-500">
        {{ formErrors[name] }}
      </p>
    </div>
  </label>
</template>
