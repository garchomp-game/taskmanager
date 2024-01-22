import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import { createI18n } from "vue-i18n";

// 翻訳メッセージの定義
const messages = {
    en: {
        message: {
            hello: "Hello World",
        },
    },
    ja: {
        message: {
            hello: "こんにちは、世界",
        },
    },
    // 他の言語もここに追加
};

// i18n インスタンスの作成
const i18n = createI18n({
    locale: "en", // デフォルトの言語
    fallbackLocale: "ja", // フォールバックの言語
    messages, // 翻訳メッセージ
    legacy: false,
});
const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue"),
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(i18n)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
