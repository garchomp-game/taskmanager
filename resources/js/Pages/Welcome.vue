<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template lang="pug">
.container.mx-auto
    header.flex.justify-between.items-center.bg-gray-100.px-6.py-4.shadow
        h1.text-2xl.font-semibold ToDoList
        nav
            ul.flex.space-x-4
                li
                    a(href='login', class='text-gray-700 hover:text-gray-900') Login
                li
                    a(href='register', class='text-gray-700 hover:text-gray-900') Register

    .main-content.mt-8.text-center
        h2.text-3xl.font-bold.mb-2 ToDoListにようこそ！
        p.text-gray-700.mb-4 あなたのタスクを管理しましょう

footer.mt-8.py-4.text-center.border-t
    span.text-sm.text-gray-500 Laravel + Vue3 のToDoリストアプリケーション
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
