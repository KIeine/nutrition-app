<script setup lang="ts" name="IngredientsTable">
import { laravelPagination, Meal } from '@/features/useTypes';

import BaseTable from './BaseTable.vue';

type Props = {
  meals: laravelPagination & {
    data: Meal[];
  };
};

const { meals } = defineProps<Props>();

const headers = [
  { title: 'Image', key: 'image' },
  { title: 'Title', key: 'title' },
  { title: 'Calories', key: 'calories' },
  { title: 'Carbs', key: 'carbohydrates' },
  { title: 'Protein', key: 'protein' },
  { title: 'Fat', key: 'fat' },
  { title: 'Sugar', key: 'sugar' },
  { title: 'Fiber', key: 'fiber' },
];
</script>

<template>
  <BaseTable :headers="headers" :items="meals.data" :pagination="meals" />
</template>
