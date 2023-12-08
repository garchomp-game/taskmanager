<script setup>
import { defineProps, ref } from "vue";
import ToDoItem from "./ToDoItem.vue";

// propsを定義して、外部から渡されるデータを受け取る
const props = defineProps({
    tasks: Array, // tasksをArray型として定義
});

const tasks = ref(props.tasks);

const addTask = () => {
    Inertia.get(route("tasks.create"), {});
};

const handleTaskDeleted = (taskId) => {
    tasks.value = tasks.value.filter((task) => task.id !== taskId);
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
