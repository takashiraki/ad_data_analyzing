import { resolve } from 'path';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: true,
        hmr: {
            host: 'localhost',
        },
        watch: {
            usePolling: true
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/scss/style.scss', 
                'resources/js/app.js'
            ],
            refresh: true,
        }),
        // vue(),
    ],
});
