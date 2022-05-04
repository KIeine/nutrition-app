<script setup lang="ts" name="IngredientsShow">
import { Ingredient, Meal } from '@/features/useTypes';

import IngredientNutrition from '@/components/IngredientNutrition.vue';
import IngredientMealsList from '../components/IngredientMealsList.vue';
import IngredientsAddModal from '@/components/IngredientsAddModal.vue';

const { ingredient, meals = [] } = defineProps<{
  ingredient: Ingredient;
  meals?: Meal[];
}>();

const imageSrc = computed(() => ingredient.image ?? '/images/placeholder.png');

let showEditModal = $ref(false);

const onEdit = () => {
  showEditModal = true;
};

const onCloseModal = () => {
  showEditModal = false;
};
</script>

<template>
  <div>
    <InertiaHead :title="`Ingredients | ${ingredient.name}`" />
    <IngredientsAddModal
      v-if="showEditModal"
      title="Edit ingredient"
      :ingredient="ingredient"
      @close="onCloseModal"
    />

    <div class="flex items-start justify-between">
      <div class="flex space-x-6">
        <img
          :src="imageSrc"
          alt="ingredient-image"
          class="object-cover w-40 h-40"
        />
        <h2 class="text-2xl font-bold">{{ ingredient.name }}</h2>
      </div>
      <BaseButton v-if="$page.props.auth" theme="secondary" @click="onEdit">
        Edit
      </BaseButton>
    </div>

    <p class="mt-10" v-if="ingredient.description">
      {{ ingredient.description }}
    </p>

    <div class="flex mt-20 space-x-10">
      <IngredientNutrition :ingredient="ingredient" />
      <IngredientMealsList :meals="meals" />
    </div>
  </div>
</template>
