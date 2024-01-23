<script setup lang="ts">
import { defineProps, defineEmits, ref } from "vue";
import { Ref } from "vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { TaskStatus } from "@/Types/TaskStatus";

// フォームデータの型定義
interface FormDataType {
    title: string;
    description: string;
    status_id: number | null;
    due_date: string;
    errors: {
        title?: string;
        description?: string;
        status_id?: string;
        due_date?: string;
    };
}

// propsの型定義
interface Props {
    form: FormDataType;
    taskStatus: TaskStatus[];
}

const props = defineProps<Props>();
const taskStatuses: Ref<TaskStatus[]> = ref(props.taskStatus);

const emit = defineEmits(["submit"]);

const onSubmit = (event: Event) => {
    event.preventDefault(); // デフォルトの送信を防ぐ
    emit("submit", props.form);
};
</script>

<template>
    <form @submit.prevent="onSubmit" method="post">
        <div>
            <InputLabel
                for="title"
                value="タイトル"
            />
            <TextInput
                id="title"
                v-model="form.title"
                type="text"
                class="mt-1 block w-full"
            />
            <InputError
                :message="form.errors.title"
                class="mt-2"
            />
        </div>
        <div>
            <InputLabel
                for="description"
                value="詳細"
            />
            <TextInput
                id="description"
                v-model="form.description"
                type="text"
                class="mt-1 block w-full"
            />
            <InputError
                :message="form.errors.description"
                class="mt-2"
            />
        </div>
        <div>
            <InputLabel
                for="status_id"
                value="ステータス"
            />
            <select
                id="status_id"
                v-model="form.status_id"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >
                <option
                    v-for="taskStatus in taskStatuses"
                    :key="taskStatus.id"
                    :value="taskStatus.id"
                >
                    {{ taskStatus.name }}
                </option>
            </select>
            <InputError
                :message="form.errors.status_id"
                class="mt-2"
            />
        </div>
        <div>
            <InputLabel
                for="due_date"
                value="期限"
            />
            <TextInput
                id="due_date"
                v-model="form.due_date"
                type="date"
                class="mt-1 block w-full"
            />
            <InputError
                :message="form.errors.due_date"
                class="mt-2"
            />
        </div>
        <div class="flex items-center justify-end mt-4">
            <PrimaryButton
                class="ml-4"
            >
                登録
            </PrimaryButton>
        </div>
    </form>
</template>
