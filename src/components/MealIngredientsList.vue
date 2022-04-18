<script setup lang="ts" name="IngredientMealsList">
import { Ingredient } from '@/features/useTypes';

const { ingredients } = defineProps<{
  ingredients: (Ingredient & {
    serving_quantity: number;
    notes?: string;
  })[];
}>();
</script>

<template>
  <div>
    <h5 class="mb-6 text-lg font-semibold">
      List of ingredients used in this recipe
    </h5>

    <div class="space-y-2">
      <InertiaLink
        v-for="ingredient in ingredients"
        :key="ingredient.id"
        :href="`/ingredients/${ingredient.id}`"
        class="flex items-center space-x-4 rounded shadow hover:bg-gray-100"
      >
        <img
          :src="ingredient.image ?? '/images/placeholder.png'"
          alt="ingredient-image"
          class="object-contain w-20 h-20"
        />

        <div class="flex items-center justify-between w-full pr-4 space-x-4">
          <div class="space-y-2 w-72">
            <p :title="ingredient.name" class="truncate">
              {{ ingredient.name }}
            </p>
            <p
              v-if="ingredient.notes"
              class="text-sm text-gray-500 truncate"
              :title="ingredient.notes"
            >
              {{ ingredient.notes }}
            </p>
          </div>

          <div class="w-20 text-center">
            <p>
              {{ ingredient.serving_quantity }} {{ ingredient.serving_name }}
            </p>
            <p class="text-sm text-gray-500">
              {{ ingredient.serving_grams * ingredient.serving_quantity }} grams
            </p>
          </div>
        </div>
      </InertiaLink>
    </div>

    <p v-if="!ingredients.length" class="text-gray-500">
      No ingredients using this ingredient have been created yet.
    </p>
  </div>
</template>
