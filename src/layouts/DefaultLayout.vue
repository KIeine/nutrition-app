<script lang="ts" setup name="DefaultLayout">
import Footer from '@/components/Footer.vue';
import Navbar from '@/components/Navbar.vue';
</script>

<template>
  <div class="flex flex-col w-full min-h-screen">
    <Navbar />
    <main class="px-5 mt-32 mb-20 md:px-40">
      <div
        class="max-w-4xl mx-auto xl:max-w-screen-lg desktop:max-w-screen-2xl"
      >
        <slot />
      </div>
    </main>
    <Footer />
  </div>
</template>
