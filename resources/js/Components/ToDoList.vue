<script setup>
import { defineProps, onMounted, ref } from "vue";
import { useForm } from '@inertiajs/vue3';

const form = useForm();

// propsを定義して、外部から渡されるデータを受け取る
const props = defineProps({
    tasks: Array, // tasksをArray型として定義
});

const tasks = ref(props.tasks);

onMounted(() => {
    console.log(props.tasks);
});

const deleteTask = (taskId) => {
    if (confirm('タスクを削除してもよろしいですか？')) {
        form.delete(route('task.destroy', taskId), {
            preserveScroll: true,
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
        <div class="border-t border-gray-200">
            <dl>
                <div
                    v-for="task in tasks"
                    :key="task.id"
                    class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <dt class="text-sm font-medium text-gray-500">
                        {{ task.title }}
                    </dt>
                    <dd
                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                    >
                        {{ task.description }}
                        <span class="text-sm text-gray-600">
                            (ステータス: {{ task.status.name }})
                        </span>
                    </dd>
                    <button @click="deleteTask(task.id)" class="bg-red-500 text-white p-2 rounded">削除</button>
                </div>
            </dl>
        </div>
    </div>
</template>
