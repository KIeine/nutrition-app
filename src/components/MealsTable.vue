<script setup lang="ts" name="IngredientsTable">
import { Calories, laravelPagination, Meal } from '@/features/useTypes';

import BaseTable from './BaseTable.vue';

type Props = {
  meals: laravelPagination & {
    data: (Meal & Calories)[];
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

const mealsLinked = computed(() =>
  meals.data.map((item) => ({
    ...item,
    link: `/meals/${item.id}`,
  })),
);
</script>

<template>
  <BaseTable :headers="headers" :items="mealsLinked" :pagination="meals" />
</template>
