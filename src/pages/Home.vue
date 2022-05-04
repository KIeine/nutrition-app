<script setup lang="ts" name="Home">
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
      // @ts-ignore
      !excludedIngredients.includes(item) &&
      // @ts-ignore
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
</script>

<template>
  <div>
    <h1 class="text-2xl font-bold text-center">Meal plan generator</h1>

    <div
      class="flex items-center justify-center max-w-2xl p-10 mx-auto mt-20 bg-white rounded-lg shadow-md"
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
          <BaseButton :loading="form.processing" class="w-24 mx-auto mt-10">
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
    />
  </div>
</template>
