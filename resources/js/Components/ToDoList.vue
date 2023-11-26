<script setup>
import { Inertia } from '@inertiajs/inertia';
import { defineProps, ref } from 'vue';
import route from 'ziggy-js'; // Ziggy をインポート
// @inertiajs/inertiaとziggyが最初からは入ってないことが発覚。思い込みは良くない。素直にとりあえずインストールしてみることが大事。それで動くこともある。

// propsを定義して、外部から渡されるデータを受け取る
const props = defineProps({
    tasks: Array, // tasksをArray型として定義
});

const tasks = ref(props.tasks);

const deleteTask = (taskId) => {
    if (confirm('タスクを削除してもよろしいですか？')) {
        Inertia.delete(route('tasks.destroy', taskId), {
            preserveScroll: true,
            onSuccess: () => {
                // 現在ポップアップで表示しているようにしているが、動的に削除されたものが表示されるようにする。
                // もしモーダルを表示するのであれば工夫が必要。
                tasks.value = tasks.value.filter(task => task.id !== taskId);
            },
            onError: errors => {
                console.error('削除中にエラーが発生しました:', errors);
            }
        });
    }
};

</script>
<template>
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                ToDoリスト
            </h3>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div
                    v-for="task in tasks"
                    :key="task.id"
                    class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <dt class="text-sm font-medium text-gray-500">
                        {{ task.title }}
                    </dt>
                    <dd
                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                    >
                        {{ task.description }}
                        <span class="text-sm text-gray-600">
                            (ステータス: {{ task.status.name }})
                        </span>
                    </dd>
                    <button @click="deleteTask(task.id)" class="bg-red-500 text-white p-2 rounded">削除</button>
                </div>
            </dl>
        </div>
    </div>
</template>
