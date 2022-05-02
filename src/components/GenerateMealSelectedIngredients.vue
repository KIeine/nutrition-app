<script setup lang="ts" name="GenerateMealSelectedIngredients">
import { Ingredient } from '@/features/useTypes';

const emit = defineEmits<{
  (e: 'remove', value: number): void;
}>();

const { title, ingredients } = defineProps<{
  title: string;
  ingredients: Ingredient[];
}>();

const onRemove = (id: number) => {
  emit('remove', id);
};
</script>

<template>
  <div>
    <p class="mb-2">{{ title }}:</p>
    <div
      v-for="ingredient in ingredients"
      :key="ingredient.id"
      class="flex items-center p-1 rounded-md group hover:bg-gray-100 hover:cursor-pointer"
      @click.stop="onRemove(ingredient.id)"
    >
      <img
        :src="ingredient.image ?? '/images/placeholder.png'"
        alt=""
        class="object-cover w-16 h-16 rounded-lg"
      />

      <div class="flex flex-col ml-2 space-y-1">
        <span class="w-32">{{ ingredient.name }}</span>
      </div>

      <BaseIcon
        icon="close"
        class="hidden w-4 h-4 ml-auto mr-2 text-gray-400 group-hover:block"
      />
    </div>
  </div>
</template>
