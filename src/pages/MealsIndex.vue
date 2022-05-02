<script setup lang="ts" name="MealsIndex">
import {
  Ingredient,
  laravelPagination,
  Meal,
  Calories,
} from '@/features/useTypes';

import MealsAddModal from '@/components/MealsAddModal.vue';
import MealsTable from '@/components/MealsTable.vue';

type Props = {
  meals: laravelPagination & {
    data: (Meal & Calories)[];
  };
  ingredients: Ingredient[];
};

const { meals = [], ingredients = [] } = defineProps<Props>();

let showModal = $ref(false);

const onCreateMeal = () => {
  showModal = true;
};

const onCloseModal = () => {
  showModal = false;
};
</script>

<template>
  <div>
    <InertiaHead title="Meals" />
    <h1 class="text-2xl font-medium tracking-wide">Meals</h1>

    <div class="mt-10">
      <BaseButton v-if="$page.props.auth" @click="onCreateMeal">
        Create a meal
      </BaseButton>
    </div>

    <MealsAddModal
      v-if="showModal"
      @close="onCloseModal"
      :ingredients="ingredients"
    />

    <MealsTable v-if="meals.data.length" class="mt-20" :meals="meals" />
  </div>
</template>
