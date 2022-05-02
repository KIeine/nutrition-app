<script setup lang="ts" name="FormIngredientsField">
import { Ingredient } from '@/features/useTypes';

const emit = defineEmits<{
  (e: 'update:modelValue', value: Ingredient[]): void;
}>();

const {
  modelValue = [],
  error = '',
  required = true,
  ingredients,
} = defineProps<{
  modelValue?: Ingredient[];
  error?: string;
  required?: boolean;
  ingredients: Ingredient[];
}>();

let ingredientSearch = $ref<string>('');
let selectedIngredients = $ref<Ingredient[]>(modelValue);

const filteredIngredients = computed(() => {
  const search = ingredientSearch.toLowerCase();
  if (!search) {
    return [];
  }

  return ingredients?.filter((x) => x.name.toLowerCase().includes(search));
});

const onSelectIngredient = (ingredient: Ingredient) => {
  if (selectedIngredients.includes(ingredient)) {
    return;
  }

  selectedIngredients.push(ingredient);
  ingredientSearch = '';

  emit('update:modelValue', selectedIngredients);
};

watch(
  () => modelValue,
  () => {
    selectedIngredients = modelValue;
  },
  { deep: true },
);
</script>

<template>
  <label for="ingredients" class="flex flex-col items-center sm:flex-row">
    <span class="min-w-[200px]">
      <slot>Ingredients</slot>
      <span v-if="required" class="text-red-500">*</span>
    </span>

    <div class="relative">
      <input
        id="ingredients"
        v-model="ingredientSearch"
        class="w-full p-1 border rounded-md outline-none md:w-96 hover:shadow-input-hover focus:shadow-input-focus"
      />

      <div
        v-if="filteredIngredients?.length"
        class="absolute w-full max-h-[10rem] mt-2 z-50 overflow-y-auto bg-white rounded-md shadow"
      >
        <div
          v-for="ingredient in filteredIngredients"
          :key="ingredient.id"
          class="p-2 rounded-md hover:bg-gray-100 hover:cursor-pointer"
          @click.stop="onSelectIngredient(ingredient)"
        >
          {{ ingredient.name }}
        </div>
      </div>

      <p v-if="error" class="mt-1 text-xs text-red-500">
        {{ error }}
      </p>
    </div>
  </label>
</template>
