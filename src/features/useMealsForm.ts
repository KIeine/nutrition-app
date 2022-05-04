import { useForm } from '@inertiajs/inertia-vue3';
import { Ingredient, Meal } from './useTypes';

type mealIngredientType = {
  [key: string]: string;
};

const reduceIngredients = (ingredients: Ingredient[], attr: string) =>
  ingredients.reduce(
    // @ts-ignore
    (acc, ingredient) => ({ ...acc, [ingredient.id]: ingredient[attr] }),
    {},
  );

export const useMealsForm = (
  meal: Meal | undefined,
  mealIngredients: Ingredient[],
) => {
  const mealTypeOptions = [
    { label: 'Select a type', value: '' },
    { label: 'Breakfast', value: 'breakfast' },
    { label: 'Lunch', value: 'lunch' },
    { label: 'Dinner', value: 'dinner' },
  ];

  const form = useForm({
    title: meal?.title ?? '',
    description: meal?.description ?? '',
    type: meal?.type ?? mealTypeOptions[0].value,
    ingredients: mealIngredients,
    image: meal?.image ?? null,
    notes: meal
      ? reduceIngredients(mealIngredients, 'notes')
      : <mealIngredientType>{},
    quantities: meal
      ? reduceIngredients(mealIngredients, 'serving_quantity')
      : <mealIngredientType>{},
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
