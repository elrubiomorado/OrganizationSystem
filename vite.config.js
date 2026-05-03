import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),

    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
        host: '10.10.65.153',
        port: 5175,
        hmr: {
            host: '10.10.65.153',
        },
    },
});
