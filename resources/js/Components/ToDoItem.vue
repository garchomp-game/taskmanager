<script setup lang="ts">
import route from "ziggy-js"; // Ziggy をインポート
import { defineProps, ref, Ref, defineEmits } from "vue";
import { router } from "@inertiajs/vue3";

// Taskインターフェースをインポート
import { Task } from "@/Types/Task";

// propsの型定義
interface Props {
    task: Task;
}

const props = defineProps<Props>();

const emit = defineEmits(["taskDeleted"]);

const task: Ref<Task> = ref(props.task);

// 必要なCRUD操作のメソッドをここに実装
// ToDoItem.vue 内の deleteTask メソッド
const deleteTask = () => {
    emit("taskDeleted", props.task.id);
};

const editTask = () => {
    router.get(route('tasks.show', props.task.id));
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
                    詳細表示
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
