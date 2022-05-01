<script setup lang="ts" name="MealsShow">
import { Calories, Ingredient, Meal } from '@/features/useTypes';

import MealNutrition from '@/components/MealNutrition.vue';
import MealIngredientsList from '@/components/MealIngredientsList.vue';
import MealsAddModal from '@/components/MealsAddModal.vue';

type Props = {
  meal: Meal;
  totals: Calories;
  ingredients?: Ingredient[];
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

const { meal, mealIngredients, totals, ingredients, auth } =
  defineProps<Props>();

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
      @close="onCloseModal"
    />

    <div class="flex items-center justify-between">
      <InertiaLink href="/meals">
        <BaseButton theme="secondary" icon="arrow-left">
          Back to meals
        </BaseButton>
      </InertiaLink>

      <BaseButton v-if="auth.can_edit" theme="secondary" @click="onEdit">
        Edit
      </BaseButton>
    </div>

    <div class="flex mt-10 space-x-6">
      <img
        :src="imageSrc"
        alt="ingredient-image"
        class="object-cover w-40 h-40"
      />
      <div>
        <h2 class="text-2xl font-bold">{{ meal.title }}</h2>

        <p class="text-sm text-gray-400">
          Submitted by {{ auth.submitted_by }}
        </p>
      </div>
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
