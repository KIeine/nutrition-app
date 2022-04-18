<script setup lang="ts" name="IngredientsShow">
import { Ingredient } from '@/features/useTypes';

import IngredientNutrition from '@/components/IngredientNutrition.vue';

const { ingredient } = defineProps<{
  ingredient: Ingredient;
}>();

const imageSrc = computed(() => ingredient.image ?? '/images/placeholder.png');
</script>

<template>
  <div>
    <InertiaHead :title="`Ingredients | ${ingredient.name}`" />
    <InertiaLink href="/ingredients">
      <BaseButton theme="secondary" icon="arrow-left">
        Back to Ingredients
      </BaseButton>
    </InertiaLink>

    <div class="flex mt-10 space-x-6">
      <img
        :src="imageSrc"
        alt="ingredient-image"
        class="object-cover w-40 h-40"
      />
      <h2 class="text-2xl font-bold">{{ ingredient.name }}</h2>
    </div>

    <p class="mt-10" v-if="ingredient.description">
      {{ ingredient.description }}
    </p>

    <IngredientNutrition :ingredient="ingredient" />
  </div>
</template>
