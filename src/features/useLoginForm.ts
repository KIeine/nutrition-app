import { useForm } from '@inertiajs/inertia-vue3';

export const useLoginForm = () => {
  const form = useForm({
    email: null,
    password: null,
  });

  const schema = computed(() => ({
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
  }));

  return { form, schema };
};
