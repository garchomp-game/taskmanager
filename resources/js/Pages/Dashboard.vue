<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import ToDoList from "@/Components/ToDoList.vue";
import Pagination from "@/Components/Pagination.vue";
import LangChangeDropDown from "@/Components/LangChangeDropDown.vue";
import { ref, watch, Ref } from "vue";
import { router } from "@inertiajs/vue3";
import route from "ziggy-js";
import { Task } from "@/Types/Task";
import { User } from "@/Types/User";
import { PaginatedResponse } from "@/Types/PaginatedResponse";


interface Props {
    user: User; // より具体的な型を使用できる場合はそうする
    tasks: PaginatedResponse<Task>;
    sort: string;
    order: string;
}

const props = defineProps<Props>();

const tasksData: Ref<Task[]> = ref(props.tasks.data); // データ部分のみを抽出
const pagination = ref({
    current_page: props.tasks.current_page,
    last_page: props.tasks.last_page,
    // その他必要なページネーション情報
});

// リアクティブなソート情報を初期化
const selectedSort = ref<string>(props.sort || 'created_at');
const sortOrder = ref<string>(props.order || 'asc');

// props.sort または props.order が変更された場合に、selectedSort と sortOrder を更新
watch(() => props.sort, (newSort: string) => {
    selectedSort.value = newSort || '';
});

watch(() => props.order, (newOrder: string) => {
    sortOrder.value = newOrder || 'asc';
});

// ソートオーダーの切り替えとタスクのソート
const toggleSortOrder = () => {
    sortOrder.value = sortOrder.value === 'asc' ? 'desc' : 'asc';
    sortTasks();
};

const sortTasks = () => {
    router.get(route("dashboard", { sort: selectedSort.value, order: sortOrder.value }));
};
</script>

<template>
    <AppLayout title="ToDoリストメインページ">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                ToDoリスト
            </h2>
            <LangChangeDropDown position="right" />
        </template>

        <div class="py-12">
            <!-- テスト用表示 -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- ここでToDoListにタスク一覧のデータを渡す。-->

                    <div class="my-4">
                        <select
                            v-model="selectedSort"
                            @change="sortTasks"
                            class="p-2 border rounded w-32"
                        >
                            <option value="created_at">作成日</option>
                            <option value="status_id">ステータス</option>
                            <!-- その他のソート基準 -->
                        </select>
                        <button
                            @click="toggleSortOrder"
                            class="ml-2 p-2 border rounded"
                        >
                            {{ sortOrder === "asc" ? "昇順" : "降順" }}
                        </button>
                    </div>
                    <ToDoList :tasks="tasksData" />
                    <!-- ToDoListコンポーネントにtasksを渡す -->
                </div>
            </div>
        </div>
        <!-- ページネーションコントロール -->
        <Pagination :pagination="pagination" />
    </AppLayout>
</template>
