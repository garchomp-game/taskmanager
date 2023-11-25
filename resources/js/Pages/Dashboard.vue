<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ToDoList from '@/Components/ToDoList.vue';

const props = defineProps({
  user: Object,
  tasks: Object // tasksをArray型として定義
});

const user = props.user;
const tasks = props.tasks; // tasksをrefで定義
</script>

<template>
  <AppLayout title="ToDoリストメインページ">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        ToDoリスト
      </h2>
    </template>

    <div class="py-12">
      <!-- テスト用表示 -->
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <!-- ここでToDoListにタスク一覧のデータを渡す。-->
          <ToDoList :tasks="tasks" /> <!-- ToDoListコンポーネントにtasksを渡す -->

          <!-- テスト用：タスクのリストを表示 -->
          <!-- なお、まだテストデータのseedを定義していないのでそこからやる -->
        </div>
      </div>
    </div>
  </AppLayout>
</template>

