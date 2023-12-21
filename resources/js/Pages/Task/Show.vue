<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { defineProps } from "vue";
import route from "ziggy-js";

const props = defineProps({
    task: Object,
});

const formatDate = (date) => {
    if (!date) return "";
    // 日付のフォーマット処理
};
</script>

<template>
    <AppLayout title="詳細画面">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                ToDoリスト
            </h2>
        </template>
        <div class="container mx-auto p-4">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-2">{{ task.title }}</h2>
                <p class="text-gray-700 mb-4">{{ task.description }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600"
                        >ステータス: {{ task.status.name }}</span
                    >
                    <span
                        class="text-sm text-gray-600"
                        v-if="task.due_date"
                        >期限: {{ task.due_date | formatDate }}</span
                    >
                </div>
                <!-- 編集ボタンの追加 -->
                <div class="mt-4">
                    <a
                        :href="route('tasks.edit', task.id)"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    >
                        編集
                    </a>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
