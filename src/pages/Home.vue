<script setup lang="ts" name="Home">
import { router } from '@inertiajs/vue3';
import { useGeneratorForm } from '@/features/useGeneratorForm';
import { Ingredient, Meal } from '@/features/useTypes';

import FormTextField from '@/components/FormTextField.vue';
import GeneratedMeals from '@/components/GeneratedMeals.vue';
import FormIngredientsField from '@/components/FormIngredientsField.vue';
import GenerateMealSelectedIngredients from '@/components/GenerateMealSelectedIngredients.vue';
import FormCheckboxField from '@/components/FormCheckboxField.vue';

const { totalCalories, breakfast, lunch, dinner, ingredients } = defineProps<{
  totalCalories?: number;
  breakfast?: Meal;
  lunch?: Meal;
  dinner?: Meal;
  ingredients: Ingredient[];
}>();

const { form, schema } = useGeneratorForm();

let excludedIngredients = $ref<Ingredient[]>([]);
let includedIngredients = $ref<Ingredient[]>([]);

const showMeals = $computed(
  () => breakfast !== undefined || lunch !== undefined || dinner,
);

let filterableIngredients = $computed(() =>
  ingredients.filter(
    (item) =>
      !excludedIngredients.includes(item) &&
      !includedIngredients.includes(item),
  ),
);

const onSubmit = () => {
  form
    .transform((data) => ({
      ...data,
      exclude: excludedIngredients,
      include: includedIngredients,
    }))
    .post('/home', {
      preserveScroll: true,
    });
};

const onRemoveExcluded = (id: number) => {
  excludedIngredients = excludedIngredients.filter((x) => x.id !== id);
};

const onRemoveIncluded = (id: number) => {
  includedIngredients = includedIngredients.filter((x) => x.id !== id);
};

const onRetryMeal = (type: string) => {
  form
    .transform((data) => ({
      ...data,
      exclude: excludedIngredients,
      include: includedIngredients,
      only: type,
    }))
    .post('/home', {
      preserveScroll: true,
      preserveState: true,
    });
};

const onSaveFavourite = () => {
  const items = {
    breakfast: breakfast?.id,
    lunch: lunch?.id,
    dinner: dinner?.id,
  };

  router.post('/favourite', items, {
    preserveScroll: true,
    preserveState: true,
  });
};
</script>

<template>
  <div>
    <h1 class="text-center text-2xl font-bold">Meal plan generator</h1>

    <div
      class="mx-auto mt-20 flex max-w-2xl items-center justify-center rounded-lg bg-white p-10 shadow-md"
    >
      <form @submit.prevent="onSubmit" class="space-y-4">
        <FormTextField small v-model="form.calories" v-bind="schema.calories" />
        <FormTextField small v-model="form.error" v-bind="schema.error" />
        <FormCheckboxField
          v-if="$page.props.auth"
          v-model="form.personalMeals"
          v-bind="schema.personalMeals"
        />

        <FormIngredientsField
          :ingredients="filterableIngredients"
          :required="false"
          v-model="excludedIngredients"
        >
          Exclude ingredients
        </FormIngredientsField>
        <FormIngredientsField
          :ingredients="filterableIngredients"
          :required="false"
          v-model="includedIngredients"
        >
          Include ingredients
        </FormIngredientsField>

        <div>
          <BaseButton :loading="form.processing" class="mx-auto mt-10 w-24">
            Generate
          </BaseButton>
        </div>

        <GenerateMealSelectedIngredients
          v-if="excludedIngredients.length"
          title="Excluded ingredients"
          :ingredients="excludedIngredients"
          @remove="onRemoveExcluded"
        />
        <GenerateMealSelectedIngredients
          v-if="includedIngredients.length"
          title="Included ingredients"
          :ingredients="includedIngredients"
          @remove="onRemoveIncluded"
        />
      </form>
    </div>

    <GeneratedMeals
      v-if="showMeals"
      class="mt-20"
      :total-calories="totalCalories"
      :breakfast="breakfast"
      :lunch="lunch"
      :dinner="dinner"
      @retry="onRetryMeal"
      @favourite="onSaveFavourite"
    />
  </div>
</template>
