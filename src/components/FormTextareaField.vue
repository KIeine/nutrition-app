<script setup lang="ts" name="FormTextareaField">
interface Props {
  name: string;
  title: string;
  rows?: number;
  small?: boolean;
  maxlength?: number;
  required?: boolean;
  modelValue?: string;
  error?: string;
}

const emit = defineEmits<{
  (e: 'update:modelValue', value: string | number | null): void;
}>();

const {
  name,
  title,
  small = false,
  rows = 3,
  maxlength,
  required = false,
  modelValue = '',
  error = '',
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
      <p v-if="error" class="mt-1 text-xs text-red-500">
        {{ error }}
      </p>
    </div>
  </label>
</template>
