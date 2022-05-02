<script setup lang="ts" name="GeneratedMealItem">
import { Meal } from '@/features/useTypes';

const { meal } = defineProps<{
  meal?: Meal;
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
      class="object-contain w-20 h-20"
    />

    <div class="space-y-2 w-72">
      <p :title="meal.title" class="font-semibold truncate">
        {{ meal.title }}
      </p>
      <p>Calories: {{ Math.round(meal.calories) }}</p>
    </div>
  </a>

  <p v-else>We couldn't find a fitting meal based on your search parameters.</p>
</template>
