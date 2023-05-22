<script setup lang="ts" name="BaseTable">
import { laravelPagination } from '@/features/useTypes';

import BasePagination from './BasePagination.vue';

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
            class="border-2 border-gray-200 p-3 text-left text-xl font-light"
            v-for="header in headers"
            :key="header.key"
            :class="{ 'w-32': header.key === 'image' }"
          >
            {{ header.title }}
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="item in items"
          :key="item.id"
          :href="item.link"
          class="table-row border-x-2 hover:bg-gray-100"
        >
          <td
            v-for="header in headers"
            :key="header.key"
            class="border-b-2 align-top text-lg font-light"
          >
            <img
              v-if="header.key === 'image'"
              :src="imageSrc(item.image)"
              alt="ingredient-image"
              class="h-24 w-32 object-cover"
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
