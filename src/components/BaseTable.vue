<script setup lang="ts" name="BaseTable">
import { Ingredient } from '@/features/useTypes';

const { headers, items } = defineProps<{
  headers: string[];
  // TODO: Add type for items
  items: any[];
}>();

const imageSrc = computed(
  () => (item: Ingredient) => item.image ?? 'images/placeholder.png',
);
</script>

<template>
  <table class="w-full table-auto">
    <thead>
      <tr>
        <th
          class="p-3 text-xl font-light text-left capitalize border-2 border-gray-200"
          v-for="header in headers"
          :key="header"
          :class="{ 'w-32': header === 'image' }"
        >
          {{ header }}
        </th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="item in items" :key="item.id" class="border-x-2">
        <td
          v-for="header in headers"
          class="text-lg font-light align-top border-b-2"
        >
          <img
            v-if="header === 'image'"
            :src="imageSrc(item)"
            alt="ingredient-image"
            class="object-cover w-32 h-24"
          />

          <span class="p-3" v-else>{{ item[header] || '-' }}</span>
        </td>
      </tr>
    </tbody>
  </table>
</template>
