<script setup lang="ts" name="MealsShow">
import { Calories, Ingredient, Meal } from '@/features/useTypes';

import MealNutrition from '@/components/MealNutrition.vue';
import MealIngredientsList from '@/components/MealIngredientsList.vue';
import MealsAddModal from '@/components/MealsAddModal.vue';

type Props = {
  meal: Meal;
  totals: Calories;
  ingredients: Ingredient[];
  mealIngredients: (Ingredient & {
    serving_quantity: number;
    notes?: string;
  })[];
  auth: {
    submitted_by: string;
    can_edit: boolean;
  };
};

const imageSrc = computed(() => meal.image ?? '/images/placeholder.png');

const { meal, mealIngredients, totals, ingredients } = defineProps<Props>();

let showEditModal = $ref(false);

const onEdit = () => {
  showEditModal = true;
};

const onCloseModal = () => {
  showEditModal = false;
};

provide('ingredients', ingredients);
</script>

<template>
  <div>
    <InertiaHead :title="`Meals | ${meal.title}`" />
    <MealsAddModal
      v-if="showEditModal"
      title="Edit meal"
      :meal="meal"
      :mealIngredients="mealIngredients"
      :ingredients="ingredients"
      @close="onCloseModal"
    />

    <div class="flex items-start justify-between">
      <div class="flex space-x-6">
        <img :src="imageSrc" alt="meal-image" class="object-cover w-40 h-40" />
        <div>
          <h2 class="text-2xl font-bold">{{ meal.title }}</h2>
          <p class="mt-2 text-sm text-gray-400">
            Submitted by {{ auth.submitted_by }}
          </p>
        </div>
      </div>

      <BaseButton v-if="auth.can_edit" theme="secondary" @click="onEdit">
        Edit
      </BaseButton>
    </div>

    <div class="flex mt-10 space-x-10">
      <MealNutrition class="w-1/2" :totals="totals" :type="meal.type" />
      <MealIngredientsList class="w-1/2" :ingredients="mealIngredients" />
    </div>

    <div class="space-y-4">
      <h5 class="mt-10 text-lg font-semibold">
        Recipe description and directions
      </h5>
      <p class="whitespace-pre-wrap">{{ meal.description }}</p>
    </div>
  </div>
</template>
