<script lang="ts">
// TODO: change to useOptions()
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
  <main class="flex min-h-screen items-center justify-center">
    <InertiaHead title="Login" />
    <section class="flex flex-col rounded-md p-5 shadow-md">
      <h2 class="text-xl font-semibold">Login</h2>

      <BaseForm class="mt-10" @submit="onSubmit" :is-loading="form.processing">
        <FormTextField v-model="form.email" v-bind="schema.email" />
        <FormTextField v-model="form.password" v-bind="schema.password" />
      </BaseForm>

      <p class="text-sm">
        Don't have an account yet?
        <InertiaLink class="text-pink-500" href="/register">
          Register here.
        </InertiaLink>
      </p>
    </section>
  </main>
</template>
