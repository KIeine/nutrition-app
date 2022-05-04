<script setup lang="ts" name="Profile">
import { Inertia } from '@inertiajs/inertia';
import { Meal, laravelPagination } from '@/features/useTypes';

import FavouritePlanItem from '@/components/FavouritePlanItem.vue';
import BasePagination from '@/components/BasePagination.vue';

const { favourites } = defineProps<{
  favourites: laravelPagination & {
    data: {
      id: number;
      calories: number;
      breakfast: Meal;
      lunch: Meal;
      dinner: Meal;
      created_at: string;
    }[];
  };
}>();

const onRemove = (id: number) => {
  Inertia.delete(`/favourite/${id}`, {
    preserveScroll: true,
  });
};
</script>

<template>
  <div>
    <h3 class="text-2xl">{{ $page.props.auth.name }}'s profile</h3>

    <h5 class="mt-20 text-xl">Saved meal plans</h5>

    <div
      v-if="favourites.data.length"
      class="grid grid-cols-3 gap-6 mt-10 desktop:grid-cols-4"
    >
      <FavouritePlanItem
        v-for="item in favourites.data"
        :key="item.id"
        :item="item"
        @remove="onRemove"
      />
    </div>
    <p v-else>No meal plans saved yet.</p>

    <BasePagination
      v-if="favourites.last_page > 1"
      :links="favourites.links"
      class="mt-10"
    />
  </div>
</template>
