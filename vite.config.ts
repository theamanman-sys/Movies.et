import {resolve} from 'node:path';
import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react-swc';
import tsconfigPaths from 'vite-tsconfig-paths';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/client/main.tsx', 'resources/client/app.css'],
      refresh: true,
    }),
    react(),
    tsconfigPaths(),
  ],
  resolve: {
    alias: {
      '@ui': resolve(__dirname, 'common/foundation/resources/client/ui/library'),
      '@common': resolve(__dirname, 'common/foundation/resources/client'),
      '@app': resolve(__dirname, 'resources/client'),
    },
  },
});
