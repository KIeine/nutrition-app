import { Ingredient } from './useTypes';

export const useIngredientShow = (ingredient: Ingredient) => {
  const nutritionalItems = computed(() => [
    {
      label: 'Calories',
      value: ingredient.calories,
    },
    {
      label: 'Carbohydrates',
      value: ingredient.carbohydrates,
      postfix: ' g',
    },
    {
      label: 'Protein',
      value: ingredient.protein,
      postfix: ' g',
    },
    {
      label: 'Fat',
      value: ingredient.fat,
      postfix: ' g',
    },
    {
      label: 'Fiber',
      value: ingredient.fiber ?? '-',
      postfix: ' g',
    },
    {
      label: 'Sugar',
      value: ingredient.sugar ?? '-',
      postfix: ' g',
    },
  ]);

  const chartOptions = {
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
        { name: 'Carbohydrates', value: ingredient.carbohydrates },
        { name: 'Protein', value: ingredient.protein },
        { name: 'Fat', value: ingredient.fat },
      ],
    },
  };

  return { nutritionalItems, chartOptions };
};
