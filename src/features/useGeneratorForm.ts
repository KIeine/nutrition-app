import { useForm } from '@inertiajs/vue3';

export const useGeneratorForm = () => {
  const form = useForm({
    calories: 2000,
    error: 200,
    personalMeals: false,
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
      title: 'Meal calorie error',
      type: 'number',
      step: 0,
      required: true,
      error: form.errors.error,
    },
    personalMeals: {
      name: 'personalMeals',
      title: 'Generate only from my meals',
    },
  }));

  return { form, schema };
};
