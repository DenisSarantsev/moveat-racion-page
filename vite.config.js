import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    assetsDir: 'assets',
    rollupOptions: {
      output: {
        assetFileNames: (assetInfo) => {
          const name = assetInfo.name || '';
          const ext = name.split('.').pop();
          if (/(woff2?|ttf|otf|eot)$/i.test(ext)) {
            return 'wp-content/themes/astra/assets/fonts/[name][extname]';
          }
          if (/css$/i.test(ext)) {
            return 'wp-content/themes/astra/assets/css/[name]-[hash][extname]';
          }
          if (/(png|jpe?g|svg|webp|gif)$/i.test(ext)) {
            return 'wp-content/themes/astra/assets/images/[name]-[hash][extname]';
          }
          return 'assets/[name]-[hash][extname]';
        }
      }
    }
  }
});