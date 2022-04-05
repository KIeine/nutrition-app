<script setup lang="ts" name="MealsIndex">
import { Ingredient, Meal } from '@/features/useTypes';

import MealsAddModal from '@/components/MealsAddModal.vue';

const { meals = [], ingredients = [] } = defineProps<{
  meals: Meal[];
  ingredients: Ingredient[];
}>();

provide('ingredients', ingredients);

let showModal = $ref(false);

const onCreateMeal = () => {
  showModal = true;
};

const onCloseModal = () => {
  showModal = false;
};
</script>

<template>
  <div>
    <InertiaHead title="Meals" />
    <h1 class="text-2xl font-medium tracking-wide">Meals</h1>

    <div class="mt-10">
      <BaseButton @click="onCreateMeal">Create a meal</BaseButton>
    </div>

    <MealsAddModal v-if="showModal" @close="onCloseModal" />

    <div v-for="meal in meals" :key="meal.id">
      {{ meal.title }}
    </div>
  </div>
</template>
