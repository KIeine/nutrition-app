<script setup lang="ts" name="MealNutrition">
import { useMealNutritionalInfo } from '@/features/useMealNutritionalInfo';
import { Calories } from '@/features/useTypes';

import NutrientGroupsTotals from './NutrientGroupsTotals.vue';

const { totals } = defineProps<{
  totals: Calories;
}>();

const nutritionalInfo = computed(() => useMealNutritionalInfo(totals));
</script>

<template>
  <div class="flex flex-col space-y-10">
    <div class="max-w-max">
      <h5 class="text-lg font-semibold">Nutritional information per serving</h5>

      <NutrientGroupsTotals :nutritionalItems="nutritionalInfo.items" />
    </div>

    <div>
      <EChart class="h-72" :option="nutritionalInfo.chartOptions" />
    </div>
  </div>
</template>
