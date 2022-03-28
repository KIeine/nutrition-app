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
    },
    description: {
      name: 'description',
      title: 'Description',
      type: 'text',
    },
    carbohydrates: {
      name: 'carbohydrates',
      title: 'Carbohydrates',
      type: 'number',
      required: true,
      min: 0,
    },
    protein: {
      name: 'protein',
      title: 'Protein',
      type: 'number',
      required: true,
      min: 0,
    },
    fat: {
      name: 'fat',
      title: 'Fat',
      type: 'number',
      required: true,
      min: 0,
    },
    sugar: {
      name: 'sugar',
      title: 'Sugar',
      type: 'number',
      min: 0,
    },
    fiber: {
      name: 'fiber',
      title: 'Fiber',
      type: 'number',
      min: 0,
    },
    calories: {
      name: 'calories',
      title: 'Calories',
      type: 'number',
      required: true,
      min: 0,
    },
    image: {
      name: 'image',
      title: 'Image',
      accept: 'image/*',
    },
  }));

  return {
    form,
    schema,
  };
};
