<script setup>
import { useForm } from "@inertiajs/vue3";
import { ref, defineProps } from "vue";
import route from "ziggy-js";
import TaskForm from "@/Components/TaskForm.vue";

const form = useForm({
    title: "",
    description: "",
    status_id: null,
    due_date: null,
});

const props = defineProps({
    showData: Array,
    taskStatus: Array,
});

// `showData` を監視してフォームを更新
onMounted(() => {
    if (props.showData) {
        form.title = props.showData.title;
        form.description = props.showData.description;
        form.status_id = props.showData.status_id;
        form.due_date = props.showData.due_date;
    }
});

const taskStatus = ref(props.taskStatus);

const onSubmit = (form) => {
    form.post(route("tasks.store"));
};
</script>

<template>
    <div class="max-w-md mx-auto mt-10">
        <TaskForm
            :form="form"
            :taskStatus="taskStatus"
            @submit="onSubmit"
        />
    </div>
</template>
