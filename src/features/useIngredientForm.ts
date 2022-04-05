import { useForm } from '@inertiajs/inertia-vue3';

export const useIngredientForm = () => {
  const form = useForm({
    name: null,
    description: null,
    carbohydrates: null,
    protein: null,
    fat: null,
    sugar: null,
    fiber: null,
    calories: null,
    image: null,
  });

  const schema = computed(() => ({
    name: {
      name: 'name',
      title: 'Food name',
      type: 'text',
      required: true,
      error: form.errors.name,
    },
    description: {
      name: 'description',
      title: 'Description',
      type: 'text',
      error: form.errors.description,
    },
    carbohydrates: {
      name: 'carbohydrates',
      title: 'Carbohydrates',
      type: 'number',
      required: true,
      min: 0,
      error: form.errors.carbohydrates,
    },
    protein: {
      name: 'protein',
      title: 'Protein',
      type: 'number',
      required: true,
      min: 0,
      error: form.errors.protein,
    },
    fat: {
      name: 'fat',
      title: 'Fat',
      type: 'number',
      required: true,
      min: 0,
      error: form.errors.fat,
    },
    sugar: {
      name: 'sugar',
      title: 'Sugar',
      type: 'number',
      min: 0,
      error: form.errors.sugar,
    },
    fiber: {
      name: 'fiber',
      title: 'Fiber',
      type: 'number',
      min: 0,
      error: form.errors.fiber,
    },
    calories: {
      name: 'calories',
      title: 'Calories',
      type: 'number',
      required: true,
      min: 0,
      error: form.errors.calories,
    },
    image: {
      name: 'image',
      title: 'Image',
      accept: 'image/*',
      error: form.errors.image,
    },
  }));

  return {
    form,
    schema,
  };
};
