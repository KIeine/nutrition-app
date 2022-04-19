<script setup lang="ts" name="MealsAddModal">
import { useMealsForm } from '@/features/useMealsForm';
import { Ingredient, Meal } from '@/features/useTypes';

import FormModal from './FormModal.vue';
import FormTextField from './FormTextField.vue';
import FormFileUpload from './FormFileUpload.vue';
import FormTextareaField from './FormTextareaField.vue';
import FormSelectField from './FormSelectField.vue';
import FormIngredientsField from './FormIngredientsField.vue';
import MealsSelectedIngredients from './MealsSelectedIngredients.vue';

const emit = defineEmits<{
  (e: 'close'): void;
}>();

const {
  title = 'Create a meal',
  meal,
  mealIngredients = [],
} = defineProps<{
  title?: string;
  meal?: Meal;
  mealIngredients?: Ingredient[];
}>();

const { form, schema } = useMealsForm(meal, mealIngredients);

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

const onRemoveIngredient = (id: number) => {
  form.ingredients = form.ingredients.filter((x) => x.id !== id);
};
</script>

<template>
  <FormModal :title="title" @close="onClose" @submit="onSubmit">
    <FormTextField v-bind="schema.title" v-model="form.title" />
    <FormTextareaField v-bind="schema.description" v-model="form.description" />
    <FormSelectField v-bind="schema.type" v-model="form.type" />
    <FormFileUpload v-bind="schema.image" v-model="form.image" />
    <FormIngredientsField
      v-bind="schema.ingredients"
      v-model="form.ingredients"
    />

    <MealsSelectedIngredients
      v-if="form.ingredients.length"
      :form="form"
      @remove="onRemoveIngredient"
    />
  </FormModal>
</template>
