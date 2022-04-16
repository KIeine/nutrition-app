<script setup lang="ts" name="IngredientsTable">
import { Ingredient, laravelPagination } from '@/features/useTypes';

import BaseTable from './BaseTable.vue';

type Props = {
  ingredients: laravelPagination & {
    data: Ingredient[];
  };
};

const { ingredients } = defineProps<Props>();

const headers = [
  { title: 'Image', key: 'image' },
  { title: 'Name', key: 'name' },
  { title: 'Calories', key: 'calories' },
  { title: 'Carbs', key: 'carbohydrates' },
  { title: 'Protein', key: 'protein' },
  { title: 'Fat', key: 'fat' },
  { title: 'Sugar', key: 'sugar' },
  { title: 'Fiber', key: 'fiber' },
];
</script>

<template>
  <BaseTable
    :headers="headers"
    :items="ingredients.data"
    :pagination="ingredients"
  />
</template>
