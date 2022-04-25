<script setup lang="ts" name="BaseForm">
const emit = defineEmits<{
  (e: 'submit'): void;
}>();

const { isDisabled = false, isLoading = false } = defineProps<{
  isDisabled?: boolean;
  isLoading?: boolean;
}>();

const onSubmit = () => {
  emit('submit');
};
</script>

<template>
  <form @submit.prevent="onSubmit">
    <div class="space-y-4 sm:px-10">
      <slot />
    </div>

    <div class="flex justify-end space-x-4">
      <BaseButton :disabled="isDisabled" :loading="isLoading" class="w-24">
        Submit
      </BaseButton>
    </div>
  </form>
</template>
