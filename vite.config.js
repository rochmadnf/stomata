import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/edit-coords.js",
                "resources/js/pages/register.js",
                "resources/js/pages/dashboard-admin.js",
                "resources/js/pages/users.js",
                "resources/js/pages/profile.js",
                "resources/js/pages/personal.js",
            ],
            refresh: true,
        }),
    ],
});
