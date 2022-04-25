<script setup lang="ts" name="FormModal">
import Modal from './Modal.vue';

const emit = defineEmits<{
  (e: 'submit'): void;
  (e: 'close'): void;
}>();

const {
  title,
  isDisabled = false,
  isLoading = false,
} = defineProps<{
  title: string;
  isDisabled?: boolean;
  isLoading?: boolean;
}>();

const onClose = () => {
  emit('close');
};

const onSubmit = () => {
  emit('submit');
};
</script>

<template>
  <Modal :title="title" @close="onClose">
    <form @submit.prevent="onSubmit" @keydown.enter.prevent>
      <div class="space-y-4 sm:px-10">
        <slot />
      </div>

      <div class="flex justify-end mt-10 space-x-4">
        <BaseButton :disabled="isDisabled" @click="onClose" theme="secondary">
          Cancel
        </BaseButton>
        <BaseButton :loading="isLoading" class="w-24">Submit</BaseButton>
      </div>
    </form>
  </Modal>
</template>
