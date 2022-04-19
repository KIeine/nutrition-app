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
            class="p-3 text-xl font-light text-left border-2 border-gray-200"
            v-for="header in headers"
            :key="header.key"
            :class="{ 'w-32': header.key === 'image' }"
          >
            {{ header.title }}
          </th>
        </tr>
      </thead>
      <tbody>
        <component
          v-for="item in items"
          :key="item.id"
          :is="item.link ? 'InertiaLink' : 'tr'"
          :href="item.link"
          class="table-row border-x-2 hover:bg-gray-100"
        >
          <td
            v-for="header in headers"
            :key="header.key"
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
        </component>
      </tbody>
    </table>

    <BasePagination
      v-if="pagination.last_page > 1"
      :links="pagination.links"
      class="mt-10"
    />
  </div>
</template>
