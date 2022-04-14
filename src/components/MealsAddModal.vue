<script setup lang="ts" name="MealsAddModal">
import { useMealsForm } from '@/features/useMealsForm';
import { Ingredient } from '@/features/useTypes';

import FormModal from './FormModal.vue';
import FormTextField from './FormTextField.vue';
import FormFileUpload from './FormFileUpload.vue';
import FormTextareaField from './FormTextareaField.vue';
import FormSelectField from './FormSelectField.vue';
import FormIngredientsField from './FormIngredientsField.vue';

const emit = defineEmits<{
  (e: 'close'): void;
}>();

const { form, schema } = useMealsForm();

const onClose = () => {
  form.reset();
  form.clearErrors();
  emit('close');
};

const onSubmit = () => {
  form
    .transform((data) => ({
      ...data,
      ingredients: data.ingredients.map((x) => x.id),
    }))
    .post('/meals', {
      onSuccess: onClose,
    });
};

const onRemoveIngredient = (ingredient: Ingredient) => {
  form.ingredients = form.ingredients.filter((x) => x.id !== ingredient.id);
};
</script>

<template>
  <FormModal title="Create a meal" @close="onClose" @submit="onSubmit">
    <FormTextField v-bind="schema.title" v-model="form.title" />
    <FormTextareaField v-bind="schema.description" v-model="form.description" />
    <FormSelectField v-bind="schema.type" v-model="form.type" />
    <FormFileUpload v-bind="schema.image" v-model="form.image" />
    <FormIngredientsField
      v-bind="schema.ingredients"
      v-model="form.ingredients"
    />

    <div v-if="form.ingredients.length">
      <p class="mb-2">Selected ingredients:</p>
      <div
        v-for="ingredient in form.ingredients"
        :key="ingredient.id"
        class="flex items-center p-1 rounded-md group hover:bg-gray-100 hover:cursor-pointer"
        @click.stop="onRemoveIngredient(ingredient)"
      >
        <img :src="ingredient.image" alt="" class="w-16 h-16 rounded-lg" />

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
  </FormModal>
</template>
