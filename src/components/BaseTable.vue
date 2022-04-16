<script setup lang="ts" name="BaseTable">
import { laravelPagination } from '@/features/useTypes';

import BasePagination from './BasePagination.vue';

// TODO: Add type for items
type Props = {
  headers: {
    title: string;
    key: string;
  }[];
  items: any[];
  pagination: laravelPagination;
};

const { headers, items } = defineProps<Props>();

const imageSrc = computed(
  () => (image: string | null) => image ?? 'images/placeholder.png',
);
</script>

<template>
  <div>
    <table class="w-full table-auto">
      <thead>
        <tr>
          <th
            class="p-3 text-xl font-light text-left capitalize border-2 border-gray-200"
            v-for="header in headers"
            :key="header.key"
            :class="{ 'w-32': header.key === 'image' }"
          >
            {{ header.title }}
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
              v-if="header.key === 'image'"
              :src="imageSrc(item.image)"
              alt="ingredient-image"
              class="object-cover w-32 h-24"
            />

            <span class="p-3" v-else>{{ item[header.key] ?? '-' }}</span>
          </td>
        </tr>
      </tbody>
    </table>

    <BasePagination
      v-if="pagination.last_page > 1"
      :links="pagination.links"
      class="mt-10"
    />
  </div>
</template>
