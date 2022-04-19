import { Ingredient } from './useTypes';

export const useIngredientNutritionalInfo = (food: Ingredient) => {
  const transformNutritionalInfo = (value: number) =>
    ((value * food.serving_grams) / 100).toFixed(2);

  const items = $computed(() => [
    {
      label: 'Calories',
      value: transformNutritionalInfo(food.calories),
    },
    {
      label: 'Carbohydrates',
      value: transformNutritionalInfo(food.carbohydrates),
      postfix: ' g',
    },
    {
      label: 'Protein',
      value: transformNutritionalInfo(food.protein),
      postfix: ' g',
    },
    {
      label: 'Fat',
      value: transformNutritionalInfo(food.fat),
      postfix: ' g',
    },
    {
      label: 'Fiber',
      value: food.fiber ? transformNutritionalInfo(food.fiber) : '-',
      postfix: ' g',
    },
    {
      label: 'Sugar',
      value: food.sugar ? transformNutritionalInfo(food.sugar) : '-',
      postfix: ' g',
    },
  ]);

  const chartOptions = $computed(() => ({
    tooltip: {
      trigger: 'item',
      formatter: '{b}: {c} g ({d}%)',
    },
    series: {
      type: 'pie',
      label: {
        show: true,
        position: 'outside',
        formatter: '{b}: {c} g',
      },
      center: ['200px', '50%'],
      data: [
        {
          name: 'Carbohydrates',
          value: transformNutritionalInfo(food.carbohydrates),
        },
        { name: 'Protein', value: transformNutritionalInfo(food.protein) },
        { name: 'Fat', value: transformNutritionalInfo(food.fat) },
      ],
    },
  }));

  return { items, chartOptions };
};
