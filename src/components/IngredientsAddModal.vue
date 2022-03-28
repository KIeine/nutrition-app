<script setup lang="ts" name="IngredientsAddModal">
import { useIngredientForm } from '@/features/useIngredientForm';

import Modal from './Modal.vue';
import BaseButton from './BaseButton.vue';
import FormTextField from './FormTextField.vue';
import FormFileField from './FormFileField.vue';

const emit = defineEmits<{
  (e: 'close'): void;
}>();

const { form, schema } = useIngredientForm();

const onClose = () => {
  form.reset();
  emit('close');
};

const onSubmit = () => {
  form.post('/ingredients');
};
</script>

<template>
  <Modal title="Add an ingredient" @close="onClose">
    <form @submit.prevent="onSubmit">
      <div class="space-y-4 sm:px-10">
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
        <FormFileField v-bind="schema.image" v-model="form.image" />
      </div>
      <div class="mt-10 text-sm text-gray-500">
        <span class="text-red-500">*</span> marked fields are required.
      </div>
      <div class="flex justify-end">
        <BaseButton @click="onClose" theme="primary-inverse">
          Cancel
        </BaseButton>
        <BaseButton class="w-24 ml-4">Submit</BaseButton>
      </div>
    </form>
  </Modal>
</template>
