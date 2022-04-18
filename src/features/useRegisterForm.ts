import { useForm } from '@inertiajs/inertia-vue3';

export const useRegisterForm = () => {
  const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
  });

  const schema = computed(() => ({
    name: {
      name: 'name',
      title: 'Name',
      type: 'name',
      required: true,
      error: form.errors.name,
    },
    email: {
      name: 'email',
      title: 'Email',
      type: 'email',
      required: true,
      error: form.errors.email,
    },
    password: {
      name: 'password',
      title: 'Password',
      type: 'password',
      required: true,
      min: 3,
      error: form.errors.password,
    },
    password_confirmation: {
      name: 'password_confirmation',
      title: 'Password Confirmation',
      type: 'password',
      required: true,
      min: 3,
      error: form.errors.password_confirmation,
    },
  }));

  return { form, schema };
};
