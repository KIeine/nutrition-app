import { useForm } from '@inertiajs/inertia-vue3';
import { Ingredient } from './useTypes';

export const useIngredientForm = (ingredient: Ingredient | undefined) => {
  const form = useForm({
    name: ingredient?.name ?? '',
    description: ingredient?.description ?? '',
    serving_name: ingredient?.serving_name ?? 'serving',
    serving_grams: ingredient?.serving_grams ?? null,
    carbohydrates: ingredient?.carbohydrates ?? null,
    protein: ingredient?.protein ?? null,
    fat: ingredient?.fat ?? null,
    sugar: ingredient?.sugar ?? null,
    fiber: ingredient?.fiber ?? null,
    calories: ingredient?.calories ?? null,
    image: ingredient?.image ?? null,
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
      rows: 2,
      error: form.errors.description,
    },
    serving_name: {
      name: 'serving_name',
      title: 'Serving name',
      type: 'text',
      error: form.errors.serving_name,
    },
    serving_grams: {
      name: 'serving_grams',
      title: 'Serving size (in grams)',
      type: 'number',
      min: 0,
      required: true,
      error: form.errors.serving_grams,
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
