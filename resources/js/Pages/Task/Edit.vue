<script setup>
import { useForm } from "@inertiajs/vue3";
import { ref, defineProps } from "vue";
import route from "ziggy-js";
import TaskForm from "@/Components/TaskForm.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { onMounted } from "vue";

const form = useForm({
    title: "",
    description: "",
    status_id: null,
    due_date: null,
});

const props = defineProps({
    task: Object,
    taskStatus: Array,
});

// `showData` を監視してフォームを更新
onMounted(() => {
    if (props.task) {
        form.title = props.task.title;
        form.description = props.task.description;
        form.status_id = props.task.status_id;
        form.due_date = props.task.due_date;
    }
});

const taskStatus = ref(props.taskStatus);

const onSubmit = (form) => {
    form.put(route("tasks.update", props.task.id), {
        preserveScroll: true,
    });
};
</script>

<template>
    <AppLayout title="投稿内容編集">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                ToDoリスト
            </h2>
        </template>
        <div class="max-w-md mx-auto mt-10">
            <TaskForm
                :form="form"
                :taskStatus="taskStatus"
                @submit="onSubmit"
            />
        </div>
    </AppLayout>
</template>
