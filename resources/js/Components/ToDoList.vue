<script setup lang="ts">
import { defineProps, ref } from "vue";
import ToDoItem from "./ToDoItem.vue";
import { router } from "@inertiajs/vue3";
import route from "ziggy-js";
import axios from 'axios';
import { Task } from "@/Types/Task";

// propsの型定義
interface Props {
  tasks: Task[];
}

// propsを定義して、外部から渡されるデータを受け取る
const props = defineProps<Props>();

const tasks = ref<Task[]>(props.tasks);

const addTask = () => {
  router.get(route("tasks.create"));
};

const handleTaskDeleted = (taskId: number) => {
  if (confirm("このタスクを削除してもよろしいですか？")) {
    axios.delete(route("tasks.destroy", taskId)).then(() => {
      tasks.value = tasks.value.filter((task: Task) => task.id !== taskId);
    });
  }
};
</script>
<template>
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                ToDoリスト
            </h3>
        </div>

        <!-- ここのデザインを後で考える-->
        <button
            @click="addTask"
            class="bg-blue-500 text-white p-2 rounded mr-2"
        >
            新規登録
        </button>
        <div class="border-t border-gray-200">
            <dl>
                <ToDoItem
                    v-for="task in tasks"
                    :key="task.id"
                    :task="task"
                    @taskDeleted="handleTaskDeleted"
                />
            </dl>
        </div>
    </div>
</template>
