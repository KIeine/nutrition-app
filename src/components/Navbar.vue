<script setup lang="ts" name="Navbar">
import BaseIcon from './BaseIcon.vue';
import NavbarLink from './NavbarLink.vue';

const links = [
  {
    name: 'Home',
    href: '/home',
  },
  {
    name: 'Add Ingredients',
    href: '/add-ingredients',
  },
];
</script>

<template>
  <nav class="fixed inset-x-0 top-0 w-full py-4 bg-jet-500">
    <div class="flex items-center max-w-4xl mx-auto space-x-10">
      <NavbarLink href="/home">
        <BaseIcon icon="leek" class="w-10 h-10 stroke-2 stroke-white" />
      </NavbarLink>

      <NavbarLink v-for="link in links" v-bind="link" />
    </div>
  </nav>
</template>
