import { useForm } from '@inertiajs/inertia-vue3';
import { Ingredient } from './useTypes';

export const useMealsForm = () => {
  const mealTypeOptions = [
    { label: 'Select a type', value: '' },
    { label: 'Breakfast', value: 'breakfast' },
    { label: 'Lunch', value: 'lunch' },
    { label: 'Dinner', value: 'dinner' },
    { label: 'Snack', value: 'snack' },
  ];

  const form = useForm({
    title: null,
    description: '',
    type: mealTypeOptions[0].value,
    ingredients: <Ingredient[]>[],
    image: null,
  });

  const schema = computed(() => ({
    title: {
      name: 'title',
      title: 'Meal title',
      type: 'text',
      required: true,
      error: form.errors.title,
    },
    description: {
      name: 'description',
      title: 'Description',
      required: true,
      error: form.errors.description,
    },
    type: {
      name: 'type',
      title: 'Meal type',
      required: true,
      options: mealTypeOptions,
      error: form.errors.type,
    },
    ingredients: {
      name: 'ingredients',
      title: 'Ingredients',
      required: true,
      error: form.errors.ingredients,
    },
    image: {
      name: 'image',
      title: 'Image',
      accept: 'image/*',
      error: form.errors.image,
    },
  }));

  return { form, schema };
};
