import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/css/styles.css'], // Добавь свой CSS файл
            refresh: true,
        }),
    ],
});
