<script setup lang="ts" name="Profile">
import { Inertia } from '@inertiajs/inertia';
import { Meal } from '@/features/useTypes';

import FavouritePlanItem from '@/components/FavouritePlanItem.vue';

defineProps<{
  favourites: {
    id: number;
    calories: number;
    breakfast: Meal;
    lunch: Meal;
    dinner: Meal;
    created_at: string;
  }[];
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

    <div class="grid grid-cols-3 gap-6 mt-10 desktop:grid-cols-4">
      <FavouritePlanItem
        v-for="item in favourites"
        :key="item.id"
        :item="item"
        @remove="onRemove"
      />

      <p v-if="!favourites.length">No meal plans saved yet.</p>
    </div>
  </div>
</template>
