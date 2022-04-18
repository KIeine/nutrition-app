<script setup lang="ts" name="IngredientsShow">
import { useIngredientShow } from '@/features/useIngredientShow';
import { Ingredient } from '@/features/useTypes';

const { ingredient } = defineProps<{
  ingredient: Ingredient;
}>();

const imageSrc = computed(() => ingredient.image ?? '/images/placeholder.png');

const { nutritionalItems, chartOptions } = useIngredientShow(ingredient);
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
  </div>
</template>
