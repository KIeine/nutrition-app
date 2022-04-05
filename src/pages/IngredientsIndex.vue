<script setup lang="ts" name="IngredientsIndex">
import IngredientsAddModal from '@/components/IngredientsAddModal.vue';
import { Ingredient } from '@/features/useTypes';

const { ingredients = [] } = defineProps<{
  ingredients: Ingredient[];
}>();

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
