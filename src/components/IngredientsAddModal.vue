<script setup lang="ts" name="IngredientsAddModal">
import { useIngredientForm } from '@/features/useIngredientForm';

import FormModal from './FormModal.vue';
import FormTextField from './FormTextField.vue';
import FormFileUpload from './FormFileUpload.vue';

const emit = defineEmits<{
  (e: 'close'): void;
}>();

const { form, schema } = useIngredientForm();

const onClose = () => {
  form.reset();
  emit('close');
};

// TODO error state
const onSubmit = () => {
  form.post('/ingredients', {
    onSuccess: onClose,
  });
};
</script>

<template>
  <FormModal title="Add an ingredient" @close="onClose" @submit="onSubmit">
    <FormTextField v-bind="schema.name" v-model="form.name" />
    <FormTextField v-bind="schema.description" v-model="form.description" />
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
