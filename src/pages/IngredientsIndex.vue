<script setup lang="ts" name="IngredientsIndex">
import { PROVIDE_ID_TO_KEY } from '@/features/useProvideInjectKeys';

import BaseButton from '@/components/BaseButton.vue';
import IngredientsAddModal from '@/components/IngredientsAddModal.vue';

const { errors } = defineProps<{
  errors?: object;
}>();

const provideKey = PROVIDE_ID_TO_KEY.ingredientsCreate;
provide(
  provideKey,
  computed(() => errors),
);

let showModal = $ref(true);

const onAddIngredient = () => {
  showModal = true;
};

const onCloseModal = () => {
  showModal = false;
};
</script>

<template>
  <div>
    <InertiaHead title="Ingredients" />
    <h1 class="text-2xl font-medium tracking-wide">Ingredients</h1>

    <div class="mt-10">WIP</div>
    <BaseButton @click="onAddIngredient">Add an ingredient</BaseButton>

    <IngredientsAddModal v-if="showModal" @close="onCloseModal" />
  </div>
</template>
