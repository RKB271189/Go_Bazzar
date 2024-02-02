import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/bazzar.css',
                'resources/css/infinite-scroll.css',               
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ]
});
