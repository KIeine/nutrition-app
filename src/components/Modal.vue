<script setup lang="ts" name="Modal">
const emit = defineEmits<{
  (e: 'close'): void;
}>();

const { title } = defineProps<{
  title?: string;
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
        class="max-w-5xl p-5 bg-white border rounded-lg min-w-[300px]"
      >
        <h4 v-if="title" class="mb-10 text-xl text-bold">{{ title }}</h4>
        <slot />

        <div v-if="$slots.footer" class="mt-10">
          <slot name="footer" />
        </div>
      </div>
    </div>
  </Teleport>
</template>
