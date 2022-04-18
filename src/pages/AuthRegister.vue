<script lang="ts">
export default {
  layout: null,
};
</script>

<script setup lang="ts" name="AuthRegister">
import { useRegisterForm } from '@/features/useRegisterForm';

import BaseForm from '@/components/BaseForm.vue';
import FormTextField from '@/components/FormTextField.vue';

const { form, schema } = useRegisterForm();

const onSubmit = () => {
  form.post('/register');
};
</script>

<template>
  <main class="flex items-center justify-center min-h-screen">
    <InertiaHead title="Register" />
    <section class="flex flex-col p-5 rounded-md shadow-md">
      <h2 class="text-xl font-semibold">Register</h2>

      <BaseForm class="mt-10" @submit="onSubmit" :is-loading="form.processing">
        <FormTextField v-model="form.name" v-bind="schema.name" />
        <FormTextField v-model="form.email" v-bind="schema.email" />
        <FormTextField v-model="form.password" v-bind="schema.password" />
        <FormTextField
          v-model="form.password_confirmation"
          v-bind="schema.password_confirmation"
        />
      </BaseForm>

      <p class="text-sm">
        Already have an account?
        <InertiaLink class="text-pink-500" href="/login">
          Login here.
        </InertiaLink>
      </p>
    </section>
  </main>
</template>
