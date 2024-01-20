<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ToDoList from '@/Components/ToDoList.vue';
import Pagination from '@/Components/Pagination.vue';
import { ref } from 'vue';

const props = defineProps({
  user: Object,
  tasks: Object // tasksをArray型として定義
});

const tasksData = ref(props.tasks.data); // データ部分のみを抽出
const pagination = ref({
  current_page: props.tasks.current_page,
  last_page: props.tasks.last_page,
  // その他必要なページネーション情報
});

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
          <ToDoList :tasks="tasksData" /> <!-- ToDoListコンポーネントにtasksを渡す -->
        </div>
      </div>
    </div>
    <!-- ページネーションコントロール -->
    <Pagination :pagination="pagination" />
  </AppLayout>
</template>
<style>

</style>
