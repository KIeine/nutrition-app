<script lang="ts">
export default {
  layout: null,
};
</script>

<script setup lang="ts" name="AuthLogin">
import { useLoginForm } from '@/features/useLoginForm';

import BaseForm from '../components/BaseForm.vue';
import FormTextField from '@/components/FormTextField.vue';

const { form, schema } = useLoginForm();

const onSubmit = () => {
  form.post('/login');
};
</script>

<template>
  <main class="flex items-center justify-center min-h-screen">
    <section class="flex flex-col p-5 rounded-md shadow-md">
      <h2 class="text-xl font-semibold">Login</h2>

      <BaseForm class="mt-10" @submit="onSubmit" :is-loading="form.processing">
        <FormTextField v-model="form.email" v-bind="schema.email" />
        <FormTextField v-model="form.password" v-bind="schema.password" />
      </BaseForm>
    </section>
  </main>
</template>
