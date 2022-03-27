<script setup lang="ts" name="Modal">
const emit = defineEmits<{
  (e: 'close'): void;
}>();

const contentRef = ref<HTMLInputElement | null>(null);

const onClickOutside = (e: MouseEvent) => {
  if (!contentRef.value?.contains(e.target as HTMLElement)) {
    emit('close');
  }
};
</script>

<template>
  <Teleport to="body">
    <div
      class="fixed inset-0 z-50 flex items-center justify-center bg-black/30"
      @click="onClickOutside"
    >
      <div
        ref="contentRef"
        class="max-w-lg p-10 bg-white border rounded-lg min-w-[300px]"
      >
        <slot />
      </div>
    </div>
  </Teleport>
</template>
