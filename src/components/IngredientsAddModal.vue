<script setup lang="ts" name="IngredientsAddModal">
import { useIngredientForm } from '@/features/useIngredientForm';
import { Ingredient } from '@/features/useTypes';

import FormModal from './FormModal.vue';
import FormTextField from './FormTextField.vue';
import FormFileUpload from './FormFileUpload.vue';
import FormTextareaField from './FormTextareaField.vue';

const emit = defineEmits<{
  (e: 'close'): void;
}>();

const { title = 'Add an ingredient', ingredient } = defineProps<{
  title?: string;
  ingredient?: Ingredient;
}>();

const { form, schema } = useIngredientForm(ingredient);

const onClose = () => {
  form.reset();
  emit('close');
};

const onSubmit = () => {
  if (!ingredient) {
    form.post('/ingredients', {
      onSuccess: onClose,
    });
    return;
  }

  form.post(`/ingredients/${ingredient.id}`, {
    // @ts-ignore
    _method: 'put',
    onSuccess: onClose,
  });
};
</script>

<template>
  <FormModal :title="title" @close="onClose" @submit="onSubmit">
    <FormTextField v-bind="schema.name" v-model="form.name" />
    <FormTextareaField v-bind="schema.description" v-model="form.description" />
    <FormTextField v-bind="schema.serving_name" v-model="form.serving_name" />
    <FormTextField
      small
      v-bind="schema.serving_grams"
      v-model="form.serving_grams"
    />
    <FormTextField small v-bind="schema.calories" v-model="form.calories" />
    <FormTextField
      small
      v-bind="schema.carbohydrates"
      v-model="form.carbohydrates"
    />
    <FormTextField small v-bind="schema.protein" v-model="form.protein" />
    <FormTextField small v-bind="schema.fat" v-model="form.fat" />
    <FormTextField small v-bind="schema.sugar" v-model="form.sugar" />
    <FormTextField small v-bind="schema.fiber" v-model="form.fiber" />
    <FormFileUpload v-bind="schema.image" v-model="form.image" />
  </FormModal>
</template>
