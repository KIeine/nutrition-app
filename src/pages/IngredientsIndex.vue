<script setup lang="ts" name="IngredientsIndex">
import { Ingredient, laravelPagination } from '@/features/useTypes';

import IngredientsAddModal from '@/components/IngredientsAddModal.vue';
import IngredientsTable from '@/components/IngredientsTable.vue';

type Props = {
  ingredients: laravelPagination & {
    data: Ingredient[];
  };
};

const { ingredients } = defineProps<Props>();

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

    <IngredientsTable class="mt-20" :ingredients="ingredients" />
  </div>
</template>
