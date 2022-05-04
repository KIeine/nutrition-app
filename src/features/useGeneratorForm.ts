import { useForm } from '@inertiajs/inertia-vue3';

export const useGeneratorForm = () => {
  const form = useForm({
    calories: 2000,
    error: 200,
  });

  const schema = computed(() => ({
    calories: {
      name: 'calories',
      title: 'Target calories',
      type: 'number',
      step: 0,
      required: true,
      error: form.errors.calories,
    },
    error: {
      name: 'error',
      title: 'Calorie error',
      type: 'number',
      step: 0,
      required: true,
      error: form.errors.error,
    },
  }));

  return { form, schema };
};
