<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import ToDoList from '@/Components/ToDoList.vue';

const props = defineProps({
  user: Object,
  tasks: Array // tasksをArray型として定義
});

const user = ref(props.user);
const tasks = ref(props.tasks); // tasksをrefで定義
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
      hello {{ user.value.name }} <!-- user.valueでユーザー情報を参照 -->
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <!-- ここでToDoListにタスク一覧のデータを渡す。-->
          <ToDoList :tasks="tasks" /> <!-- ToDoListコンポーネントにtasksを渡す -->

          <!-- テスト用：タスクのリストを表示 -->
          <!-- なお、まだテストデータのseedを定義していないのでそこからやる -->
          <ul>
            <li v-for="task in tasks.value" :key="task.id">
              {{ task.title }} - {{ task.description }}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

