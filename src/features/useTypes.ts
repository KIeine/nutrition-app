export interface Ingredient {
  id: number;
  name: string;
  description: string;
  calories: number;
  carbohydrates: number;
  protein: number;
  fat: number;
  sugar: number;
  fiber: number;
  image: string;
}

export interface Meal {
  id: number;
  title: string;
  description: string;
  type: string;
  image: string;
}
