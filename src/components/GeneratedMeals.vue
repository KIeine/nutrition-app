<script setup lang="ts" name="GeneratedMeals">
import { Meal } from '@/features/useTypes';

import GeneratedMealItem from './GeneratedMealItem.vue';

const { totalCalories, breakfast, lunch, dinner } = defineProps<{
  totalCalories?: number;
  breakfast?: Meal;
  lunch?: Meal;
  dinner?: Meal;
}>();
</script>

<template>
  <div class="flex flex-col items-center justify-center space-y-5">
    <h3 class="text-xl font-semibold">Today's meal plan</h3>

    <p v-if="totalCalories" class="text-left">
      Total calories: {{ totalCalories }}
    </p>

    <div v-if="breakfast || lunch || dinner" class="space-y-4">
      <div>
        <p>Breakfast:</p>
        <GeneratedMealItem :meal="breakfast" />
      </div>
      <div>
        <p>Lunch:</p>
        <GeneratedMealItem :meal="lunch" />
      </div>
      <div>
        <p>Dinner:</p>
        <GeneratedMealItem :meal="dinner" />
      </div>
    </div>

    <div v-else class="italic text-gray-400">
      Click generate to see the plan.
    </div>
  </div>
</template>
