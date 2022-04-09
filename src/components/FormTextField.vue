<script setup lang="ts" name="FormTextField">
interface Props {
  name: string;
  type: string;
  title: string;
  small?: boolean;
  min?: number;
  required?: boolean;
  modelValue?: string | null;
  error?: string;
}

const {
  name,
  type,
  title,
  small = false,
  min = 0,
  required = false,
  modelValue = '',
  error = '',
} = defineProps<Props>();

const emit = defineEmits<{
  (e: 'update:modelValue', value: string | number | null): void;
}>();

const onInput = (e: Event) => {
  emit('update:modelValue', (e.target as HTMLInputElement).value);
};
</script>

<template>
  <label :for="name" class="flex flex-col items-center sm:flex-row">
    <span class="min-w-[200px]">
      {{ title }}
      <span v-if="required" class="text-red-500">*</span>
    </span>

    <div>
      <input
        :id="name"
        :min="min"
        :type="type"
        :required="required"
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
