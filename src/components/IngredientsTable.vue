<script setup lang="ts" name="IngredientsTable">
import { Ingredient, laravelPagination } from '@/features/useTypes';

import BaseTable from './BaseTable.vue';

type Props = {
  ingredients: laravelPagination & {
    data: Ingredient[];
  };
};

const headers = [
  { title: 'Image', key: 'image' },
  { title: 'Title', key: 'name' },
  { title: 'Calories (per 100g)', key: 'calories' },
  { title: 'Carbs', key: 'carbohydrates' },
  { title: 'Protein', key: 'protein' },
  { title: 'Fat', key: 'fat' },
  { title: 'Sugar', key: 'sugar' },
  { title: 'Fiber', key: 'fiber' },
];

const { ingredients } = defineProps<Props>();

const ingredientsLinked = computed(() =>
  ingredients.data.map((item) => ({
    ...item,
    link: `/ingredients/${item.id}`,
  })),
);
</script>

<template>
  <BaseTable
    :headers="headers"
    :items="ingredientsLinked"
    :pagination="ingredients"
  />
</template>
