<script setup lang="ts" name="IngredientsTable">
import { Ingredient } from '@/features/useTypes';

import BaseTable from './BaseTable.vue';

const { ingredients } = defineProps<{
  ingredients: Ingredient[];
}>();

const headers = [
  'image',
  'name',
  'calories',
  'carbs',
  'fat',
  'protein',
  'fiber',
  'sugar',
];
</script>

<template>
  <BaseTable :headers="headers" :items="ingredients"></BaseTable>
</template>
