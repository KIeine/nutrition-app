<script setup lang="ts" name="IngredientMealsList">
import { Meal } from '@/features/useTypes';

const { meals = [] } = defineProps<{
  meals?: Meal[];
}>();
</script>

<template>
  <div class="w-1/2">
    <h5 class="mb-6 text-lg font-semibold">Some meals using this ingredient</h5>

    <div class="space-y-2">
      <InertiaLink
        v-for="meal in meals"
        :key="meal.id"
        :href="`/meals/${meal.id}`"
        class="flex space-x-4 rounded shadow hover:bg-gray-100"
      >
        <img
          :src="meal.image ?? '/images/placeholder.png'"
          alt="meal-image"
          class="object-cover w-20 h-20"
        />

        <div class="py-2">
          <p>{{ meal.title }}</p>
        </div>
      </InertiaLink>
    </div>

    <p v-if="!meals.length" class="text-gray-500">
      No meals using this ingredient have been created yet.
    </p>
  </div>
</template>
