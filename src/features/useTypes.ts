export type Calories = {
  calories: number;
  carbohydrates: number;
  protein: number;
  fat: number;
  sugar: number;
  fiber: number;
};

export type Ingredient = {
  id: number;
  name: string;
  description: string;
  serving_name: string;
  serving_size: number;
  image: string;
} & Calories;

export type Meal = {
  id: number;
  title: string;
  description: string;
  type: string;
  image: string;
};

export type paginationLink = {
  active: boolean;
  label: string;
  url: string;
};

export type laravelPagination = {
  current_page: number;
  first_page: number;
  last_page: number;
  first_page_url: string;
  next_page_url: string | null;
  prev_page_url: string | null;
  last_page_url: string;
  path: string;
  per_page: number;
  total: number;
  from: number;
  to: number;
  links: paginationLink[];
};
