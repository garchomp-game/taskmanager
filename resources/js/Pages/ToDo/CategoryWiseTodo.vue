<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ToDoList from '@/Components/ToDoList.vue';
</script>

<template>
    <AppLayout title="カテゴリ別ToDoページ">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                カテゴリ別ToDoページ
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <ToDoList />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
