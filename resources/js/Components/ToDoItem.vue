<script setup>
import route from "ziggy-js"; // Ziggy をインポート
// @inertiajs/inertiaとziggyが最初からは入ってないことが発覚。思い込みは良くない。素直にとりあえずインストールしてみることが大事。それで動くこともある。
// 実際の現場では、現場ごとに採用しているアプローチが異なるため、このような問題は都度確認をすること。

import { defineProps, ref, defineEmits } from "vue";

import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    task: Array,
});

const emit = defineEmits(['taskDeleted']);

const task = ref(props.task);

// 必要なCRUD操作のメソッドをここに実装
// ToDoItem.vue 内の deleteTask メソッド
const deleteTask = () => {
    if (confirm("このタスクを削除してもよろしいですか？")) {
        Inertia.delete(route("tasks.destroy", props.task.id), {
            onSuccess: () => {
                // 親コンポーネントへのイベント発火や状態の更新をここで行う
                console.log("onSuccess done messages!");
                emit("taskDeleted", props.task.id);
            },
        });
    }
};

const editTask = () => {
    // 編集処理の実装（例：モーダルを開く、別のページに遷移するなど）
};
</script>

<template>
    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">
            {{ task.title }}
        </dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{ task.description }}
            <span class="text-sm text-gray-600"
                >(ステータス: {{ task.status.name }})</span
            >
            <!-- ここに操作ボタン（編集、削除など）を配置 -->
            <div class="mt-4">
                <button
                    @click="editTask"
                    class="bg-blue-500 text-white p-2 rounded mr-2"
                >
                    編集
                </button>
                <button
                    @click="deleteTask"
                    class="bg-red-500 text-white p-2 rounded"
                >
                    削除
                </button>
            </div>
        </dd>
    </div>
</template>
