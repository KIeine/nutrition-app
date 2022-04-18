<script setup lang="ts" name="MealsShow">
import { Ingredient, Meal } from '@/features/useTypes';

import MealNutrition from '@/components/MealNutrition.vue';

type Props = {
  meal: Meal;
  ingredients: Ingredient[];
  totals: {
    calories: number;
    carbohydrates: number;
    protein: number;
    fat: number;
    fiber?: number;
    sugar?: number;
  };
};

const { meal, ingredients, totals } = defineProps<Props>();

const imageSrc = computed(() => meal.image ?? '/images/placeholder.png');
</script>

<template>
  <div>
    <InertiaHead :title="`Meals | ${meal.title}`" />
    <InertiaLink href="/meals">
      <BaseButton theme="secondary" icon="arrow-left">
        Back to meals
      </BaseButton>
    </InertiaLink>

    <div class="flex mt-10 space-x-6">
      <img
        :src="imageSrc"
        alt="ingredient-image"
        class="object-cover w-40 h-40"
      />
      <div>
        <h2 class="text-2xl font-bold">{{ meal.title }}</h2>

        <p class="text-sm text-gray-400">Submitted by</p>
      </div>
    </div>

    <div class="mt-10">
      <MealNutrition class="w-1/2" :totals="totals" />
    </div>

    <div>
      <h5 class="mt-10 text-lg font-semibold">
        Recipe description and directions
      </h5>
      <p>
        {{ meal.description }}
      </p>
    </div>
  </div>
</template>
