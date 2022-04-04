<script setup lang="ts" name="IngredientsIndex">
import { PROVIDE_ID_TO_KEY } from '@/features/useProvideInjectKeys';

import BaseButton from '@/components/BaseButton.vue';
import IngredientsAddModal from '@/components/IngredientsAddModal.vue';

interface Ingredient {
  id: string;
  name: string;
  description: string;
  calories: number;
  carbohydrates: number;
  protein: number;
  fat: number;
  sugar: number;
  fiber: number;
  image: string;
}

const { errors, ingredients = [] } = defineProps<{
  errors?: object;
  ingredients: Ingredient[];
}>();

const provideKey = PROVIDE_ID_TO_KEY.ingredientsCreate;
provide(
  provideKey,
  computed(() => errors),
);

let showModal = $ref(false);

const onAddIngredient = () => {
  showModal = true;
};

const onCloseModal = () => {
  showModal = false;
};
</script>

<template>
  <div>
    <InertiaHead title="Ingredients" />
    <h1 class="text-2xl font-medium tracking-wide">Ingredients</h1>

    <div class="mt-10">
      <BaseButton @click="onAddIngredient">Add an ingredient</BaseButton>
    </div>

    <IngredientsAddModal v-if="showModal" @close="onCloseModal" />

    <div v-for="ingredient in ingredients">
      {{ ingredient.name }}
    </div>
  </div>
</template>
