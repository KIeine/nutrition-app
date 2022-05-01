import { Calories } from './useTypes';

export const useMealNutritionalInfo = (food: Calories, type: string) => {
  const items = $computed(() => [
    {
      label: 'Type',
      value: type,
    },
    {
      label: 'Calories',
      value: food.calories,
    },
    {
      label: 'Carbohydrates',
      value: food.carbohydrates,
      postfix: ' g',
    },
    {
      label: 'Protein',
      value: food.protein,
      postfix: ' g',
    },
    {
      label: 'Fat',
      value: food.fat,
      postfix: ' g',
    },
    {
      label: 'Fiber',
      value: food.fiber ?? '-',
      postfix: ' g',
    },
    {
      label: 'Sugar',
      value: food.sugar ?? '-',
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
        { name: 'Carbohydrates', value: food.carbohydrates },
        { name: 'Protein', value: food.protein },
        { name: 'Fat', value: food.fat },
      ],
    },
  }));

  return { items, chartOptions };
};
