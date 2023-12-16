<script setup>
import { useForm } from "@inertiajs/vue3";
import route from "ziggy-js";

const form = useForm({
    title: "",
    description: "",
    status_id: null,
    due_date: null,
});

const onSubmit = (event) => {
    event.preventDefault(); // デフォルトの送信を防ぐ
    form.post(route("tasks.store"));
};
</script>

<template>
    <div class="max-w-md mx-auto mt-10">
        <form
            @submit.prevent="onSubmit"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
        >
            <div class="mb-4">
                <label
                    for="title"
                    class="block text-gray-700 text-sm font-bold mb-2"
                    >タスク名</label
                >
                <input
                    type="text"
                    id="title"
                    v-model="form.title"
                    placeholder="タスク名"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                />
                <p v-show="form.errors.title" class="text-red-500 text-xs italic">{{ form.errors.title }}</p>
            </div>

            <div class="mb-4">
                <label
                    for="description"
                    class="block text-gray-700 text-sm font-bold mb-2"
                    >説明</label
                >
                <textarea
                    id="description"
                    v-model="form.description"
                    placeholder="タスクの詳細"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                ></textarea>
                <p v-show="form.errors.description" class="text-red-500 text-xs italic">{{ form.errors.description }}</p>
            </div>

            <div class="mb-4">
                <label
                    for="status_id"
                    class="block text-gray-700 text-sm font-bold mb-2"
                    >ステータス</label
                >
                <select
                    id="status_id"
                    v-model="form.status_id"
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                >
                    <!-- ステータスオプションをここに挿入 -->
                </select>
                <p v-show="form.errors.status_id" class="text-red-500 text-xs italic">{{ form.errors.status_id }}</p>
            </div>

            <div class="mb-4">
                <label
                    for="due_date"
                    class="block text-gray-700 text-sm font-bold mb-2"
                    >期限</label
                >
                <input
                    type="date"
                    id="due_date"
                    v-model="form.due_date"
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                />
                <p v-show="form.errors.due_date" class="text-red-500 text-xs italic">{{ form.errors.due_date }}</p>
            </div>

            <div class="flex items-center justify-between">
                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                >
                    作成
                </button>
            </div>
        </form>
    </div>
</template>
