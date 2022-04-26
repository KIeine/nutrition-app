import { useForm } from '@inertiajs/inertia-vue3';

export const useGeneratorForm = () => {
  const form = useForm({
    calories: 2000,
  });

  const schema = computed(() => ({
    calories: {
      name: 'calories',
      title: 'Target calories',
      type: 'number',
      required: true,
    },
  }));

  return { form, schema };
};
