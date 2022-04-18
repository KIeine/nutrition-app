<script setup lang="ts" name="Navbar">
import NavbarLink from './NavbarLink.vue';

const appLinks = [
  {
    name: 'Home',
    href: '/home',
  },
  {
    name: 'Ingredients',
    href: '/ingredients',
  },
  {
    name: 'Meals',
    href: '/meals',
  },
];

const loginLinks = [
  {
    name: 'Login',
    href: '/login',
  },
  {
    name: 'Register',
    href: '/register',
  },
];

const authLinks = [
  {
    name: 'Logout',
    href: '/logout',
    method: 'post',
    as: 'button',
  },
];
</script>

<template>
  <nav class="fixed inset-x-0 top-0 z-50 w-full py-4 bg-jet-500">
    <div class="flex justify-between max-w-4xl mx-auto">
      <div class="flex items-center space-x-10">
        <NavbarLink href="/home">
          <BaseIcon icon="leek" class="w-10 h-10 stroke-2 stroke-white" />
        </NavbarLink>

        <NavbarLink v-for="link in appLinks" :key="link.name" v-bind="link" />
      </div>

      <div class="flex items-center space-x-10">
        <template v-if="$page.props.auth">
          <NavbarLink
            v-for="link in authLinks"
            :key="link.name"
            v-bind="link"
          />
        </template>

        <template v-else>
          <NavbarLink
            v-for="link in loginLinks"
            :key="link.name"
            v-bind="link"
          />
        </template>
      </div>
    </div>
  </nav>
</template>
