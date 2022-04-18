<script setup lang="ts" name="MealsSelectedIngredients">
import { Ingredient } from '@/features/useTypes';

const emit = defineEmits<{
  (e: 'remove', value: number): void;
}>();

const { form } = defineProps<{
  form: {
    ingredients: Ingredient[];
    notes: {
      [key: string]: string;
    };
    quantities: {
      [key: string]: string;
    };
  };
}>();

const onRemove = (id: number) => {
  emit('remove', id);
};
</script>

<template>
  <div>
    <p class="mb-2">Selected ingredients:</p>
    <div
      v-for="ingredient in form.ingredients"
      :key="ingredient.id"
      class="flex items-center p-1 rounded-md group hover:bg-gray-100 hover:cursor-pointer"
      @click.stop="onRemove(ingredient.id)"
    >
      <img
        :src="ingredient.image ?? '/images/placeholder.png'"
        alt=""
        class="w-16 h-16 rounded-lg"
      />

      <div class="flex flex-col ml-2 space-y-1">
        <span class="w-32">{{ ingredient.name }}</span>
        <input
          @click.stop
          placeholder="Notes"
          v-model="form.notes[ingredient.id]"
          class="px-1 border rounded-md outline-none w-52 hover:shadow-input-hover focus:shadow-input-focus"
        />
      </div>

      <div class="flex flex-col ml-2 space-y-1">
        <label for="quantity">Serving quantity</label>
        <input
          id="quantity"
          @click.stop
          type="number"
          min="0"
          step="0.1"
          placeholder="1"
          v-model="form.quantities[ingredient.id]"
          class="px-1 border rounded-md outline-none w-14 hover:shadow-input-hover focus:shadow-input-focus"
        />
      </div>

      <BaseIcon
        icon="close"
        class="hidden w-4 h-4 ml-auto mr-2 text-gray-400 group-hover:block"
      />
    </div>
  </div>
</template>
