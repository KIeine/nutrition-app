<script setup lang="ts" name="MealsIndex">
import { PROVIDE_ID_TO_KEY } from '@/features/useProvideInjectKeys';

import BaseButton from '@/components/BaseButton.vue';

interface Meal {}

const { errors, meals = [] } = defineProps<{
  errors?: object;
  meals: Meal[];
}>();

const provideKey = PROVIDE_ID_TO_KEY.mealsCreate;
provide(
  provideKey,
  computed(() => errors),
);

let showModal = $ref(false);

const onAddIngredient = () => {
  showModal = true;
};

const onCloseModal = () => {
  showModal = false;
};
</script>

<template>
  <div>
    <InertiaHead title="Meals" />
    <h1 class="text-2xl font-medium tracking-wide">Meals</h1>
  </div>
</template>
