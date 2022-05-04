<script setup lang="ts" name="GeneratedMeals">
import { Meal } from '@/features/useTypes';

import GeneratedMealItem from './GeneratedMealItem.vue';

const emit = defineEmits<{
  (e: 'retry', value: string): void;
}>();

const { totalCalories, breakfast, lunch, dinner } = defineProps<{
  totalCalories?: number;
  breakfast?: Meal;
  lunch?: Meal;
  dinner?: Meal;
}>();

const onRetry = (type: string) => emit('retry', type);

const sections = $computed(() => [
  {
    title: 'Breakfast',
    retry: 'breakfast',
    meal: breakfast,
  },
  {
    title: 'Lunch',
    retry: 'lunch',
    meal: lunch,
  },
  {
    title: 'Dinner',
    retry: 'dinner',
    meal: dinner,
  },
]);
</script>

<template>
  <div class="flex flex-col items-center justify-center space-y-5">
    <h3 class="text-xl font-semibold">Today's meal plan</h3>

    <p v-if="totalCalories" class="text-left">
      Total calories: {{ totalCalories }}
    </p>

    <div class="space-y-4">
      <div v-for="section in sections" :key="section.title">
        <div class="flex space-x-2">
          <p>{{ section.title }}:</p>
          <BaseIcon
            icon="retry"
            class="w-5 h-5 cursor-pointer"
            @click="onRetry(section.retry)"
          />
        </div>

        <GeneratedMealItem :meal="section.meal" />
      </div>
    </div>
  </div>
</template>
