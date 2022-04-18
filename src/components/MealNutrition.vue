<script setup lang="ts" name="MealNutrition">
import { useNutritionalInfo } from '@/features/useNutritionalInfo';
import { Calories } from '@/features/useTypes';

import NutrientGroupsTotals from './NutrientGroupsTotals.vue';

const { totals } = defineProps<{
  totals: Calories;
}>();

const { nutritionalItems, chartOptions } = useNutritionalInfo(totals);
</script>

<template>
  <div class="flex flex-col space-y-10">
    <div class="max-w-max">
      <h5 class="text-lg font-semibold">Nutritional information per serving</h5>

      <NutrientGroupsTotals :nutritionalItems="nutritionalItems" />
    </div>

    <div>
      <EChart class="h-72" :option="chartOptions" />
    </div>
  </div>
</template>
