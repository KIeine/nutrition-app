<script setup lang="ts" name="FavouritePlanItem">
import { Meal } from '@/features/useTypes';

import GeneratedMealItem from './GeneratedMealItem.vue';

defineProps<{
  item: {
    id: number;
    calories: number;
    breakfast: Meal;
    lunch: Meal;
    dinner: Meal;
    created_at: string;
  };
}>();
</script>

<template>
  <div class="p-4 bg-white rounded-lg shadow">
    <div class="flex items-center justify-between">
      <div>
        <p>Total calories: {{ item.calories }}</p>
        <p class="text-sm">Added: {{ item.created_at }}</p>
      </div>

      <BaseButton small theme="secondary" @click="$emit('remove', item.id)">
        Remove
      </BaseButton>
    </div>

    <div class="mt-4 space-y-2">
      <div>
        <p>Breakfast:</p>
        <GeneratedMealItem inertia-link :meal="item.breakfast" />
      </div>
      <div>
        <p>Lunch:</p>
        <GeneratedMealItem inertia-link :meal="item.lunch" />
      </div>
      <div>
        <p>Dinner:</p>
        <GeneratedMealItem inertia-link :meal="item.dinner" />
      </div>
    </div>
  </div>
</template>
