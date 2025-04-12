import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/ts/app.ts',
                'resources/ts/app.js',
                'resources/ts/pages/hello.ts', // 追加するファイル
                'resources/js/dashboard.js',
                'resources/css/dashboard.css',
                'resources/css/dashboard.rtl.css'
            ],
            refresh: true,
        }),
    ],
    server: {
        host: true,
        hmr: {
            host: 'localhost',
        },
    },
});
