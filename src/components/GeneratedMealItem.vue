<script setup lang="ts" name="GeneratedMealItem">
import { Meal } from '@/features/useTypes';

const { meal, inertiaLink = false } = defineProps<{
  meal?: Meal;
  inertiaLink?: boolean;
}>();
</script>

<template>
  <a
    v-if="meal"
    target="_blank"
    :href="`/meals/${meal?.id}`"
    class="flex items-center space-x-4 rounded shadow hover:bg-gray-100"
  >
    <img
      :src="meal.image ?? '/images/placeholder.png'"
      alt="ingredient-image"
      class="h-20 w-20 object-contain"
    />

    <div class="w-72 space-y-2 truncate">
      <p :title="meal.title" class="truncate font-semibold">
        {{ meal.title }}
      </p>
      <p v-if="meal.calories">Calories: {{ meal.calories }}</p>
    </div>
  </a>

  <p v-else>We couldn't find a fitting meal based on your search parameters.</p>
</template>
