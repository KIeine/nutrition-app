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

const transformForm = (data: typeof form) => ({
  ...data,
  ingredients: data.ingredients.map((i) => i.id),
});

const onSubmit = () => {
  if (!meal) {
    // @ts-ignore
    form.transform(transformForm).post('/meals', {
      onSuccess: onClose,
    });
    return;
  }

  // @ts-ignore
  form.transform(transformForm).post(`/meals/${meal.id}`, {
    // @ts-ignore
    _method: 'put',
    onSuccess: onClose,
  });
};

const onRemoveIngredient = (id: number) => {
  form.ingredients = form.ingredients.filter((x) => x.id !== id);
};
</script>

<template>
  <FormModal
    :isLoading="form.processing"
    :title="title"
    @close="onClose"
    @submit="onSubmit"
  >
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
