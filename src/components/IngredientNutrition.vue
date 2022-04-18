<script setup lang="ts" name="IngredientNutrition">
import { useIngredientShow } from '@/features/useIngredientShow';
import { Ingredient } from '@/features/useTypes';

const { ingredient } = defineProps<{
  ingredient: Ingredient;
}>();

const { nutritionalItems, chartOptions } = useIngredientShow(ingredient);
</script>

<template>
  <div class="flex flex-col w-1/2 mt-10 space-y-10">
    <div class="max-w-max">
      <p class="text-lg font-semibold">
        Nutritional information per {{ ingredient.serving_name }}
      </p>
      <div class="flex justify-between">
        <p>One {{ ingredient.serving_name }}:</p>
        <p>{{ ingredient.serving_size }} g</p>
      </div>

      <div class="text-sm font-light">
        <div
          v-for="item in nutritionalItems"
          :key="item.label"
          class="flex items-center justify-between"
        >
          <p>{{ item.label }}:</p>
          <p>{{ item.value }}{{ item.postfix }}</p>
        </div>
      </div>
    </div>

    <div>
      <EChart class="h-72" :option="chartOptions" />
    </div>
  </div>
</template>
