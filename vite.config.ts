import { fileURLToPath, URL } from 'url';
import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import AutoImport from 'unplugin-auto-import/vite';
import ReactivityTransform from '@vue-macros/reactivity-transform/vite';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    vue({ script: { defineModel: true } }),
    laravel({
      input: ['./src/main.ts'],
      ssr: '/src/ssr.ts',
    }),
    AutoImport({ imports: ['vue'] }),
    ReactivityTransform(),
  ],
  optimizeDeps: {
    include: ['@inertiajs/vue3', 'vue'],
  },
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url)),
    },
  },
});
