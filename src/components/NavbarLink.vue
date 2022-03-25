<script lang="ts" setup name="NavbarLink">
const { href, name } = defineProps<{
  href: string;
  name?: string;
}>();
</script>

<template>
  <InertiaLink :href="href" class="text-lg text-honeydew-500 hover:text-black">
    <slot />
    {{ name }}
  </InertiaLink>
</template>
