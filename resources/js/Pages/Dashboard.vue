<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import ToDoList from '@/Components/ToDoList.vue';

const props = defineProps({ user: Object, tasks: Object})

const user = ref(props.user)
</script>

<template>
    <AppLayout title="ToDoリストメインページ">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                ToDoリスト
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    hello {{ user.name }}
                    <!-- ここでToDoListにタスク一覧のデータを渡す。-->
                    <ToDoList />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
