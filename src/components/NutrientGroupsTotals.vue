<script setup lang="ts" name="NutrientGroupsTotals">
const { nutritionalItems } = defineProps<{
  nutritionalItems: {
    label: string;
    value: string | number;
    postfix?: string;
  }[];
}>();
</script>

<template>
  <div class="text-sm font-light">
    <div
      v-for="item in nutritionalItems"
      :key="item.label"
      class="flex items-center justify-between"
    >
      <p>{{ item.label }}:</p>
      <p>{{ item.value }}{{ item.postfix }}</p>
    </div>
  </div>
</template>
