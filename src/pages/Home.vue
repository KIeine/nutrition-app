<script setup lang="ts" name="Home">
import { useGeneratorForm } from '@/features/useGeneratorForm';
import FormTextField from '@/components/FormTextField.vue';

const { form, schema } = useGeneratorForm();

const onSubmit = () => {};
</script>

<template>
  <div>
    <h1 class="text-2xl font-bold text-center">Meal plan generator</h1>

    <div
      class="flex items-center justify-center max-w-2xl p-10 mx-auto mt-20 bg-white rounded-lg shadow-md"
    >
      <form @submit.prevent="onSubmit">
        <FormTextField small v-model="form.calories" v-bind="schema.calories" />

        <div class="mt-10">
          <BaseButton :loading="form.processing" class="w-24 mx-auto">
            Generate
          </BaseButton>
        </div>
      </form>
    </div>
  </div>
</template>
