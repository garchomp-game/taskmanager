<script setup>
import { useForm } from "@inertiajs/vue3";
import { ref, defineProps } from "vue";
import route from "ziggy-js";
import TaskForm from "@/Components/TaskForm.vue";
import AppLayout from "@/Layouts/AppLayout.vue";

const form = useForm({
    title: "",
    description: "",
    status_id: null,
    due_date: null,
});

const props = defineProps({
    taskStatus: Array,
});

const taskStatus = ref(props.taskStatus);

const onSubmit = (form) => {
    form.post(route("tasks.store"));
};
</script>

<template>
    <AppLayout title="新規作成画面">
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
