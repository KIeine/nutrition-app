<script setup lang="ts" name="BaseButton"></script>

<template>
  <button
    class="px-4 py-2 text-white bg-pink-500 rounded-md hover:bg-pink-500/70 focus:bg-pink-500 focus:shadow-lg"
  >
    <slot />
  </button>
</template>
