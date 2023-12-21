<template>
  <div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6">
      <h2 class="text-2xl font-bold mb-2">{{ task.title }}</h2>
      <p class="text-gray-700 mb-4">{{ task.description }}</p>
      <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">ステータス: {{ task.status.name }}</span>
        <span class="text-sm text-gray-600" v-if="task.due_date">期限: {{ task.due_date | formatDate }}</span>
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  task: Object,
});

// ここで日付のフォーマットメソッドを定義する場合
const formatDate = (date) => {
  if (!date) return '';
  // 日付のフォーマット処理
};
</script>
