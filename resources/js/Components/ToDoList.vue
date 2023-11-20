<template>
    <div class="container">
        <div class="flex flex-col">
            <div class="mb-4">
                <TextInput
                    ref="input"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    :value="modelValue"
                    @input="$emit('update:modelValue', $event.target.value)"
                    placeholder="新しいタスクを追加"
                />
                </div>
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="task1">
                        タスク1
                    </label>
                    <p class="text-gray-700 text-base">タスク1の詳細</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="task2">
                        タスク2
                    </label>
                    <p class="text-gray-700 text-base">タスク2の詳細</p>
                </div>
            </div>
        </div>

    </div>
</template>
<script setup>
import TextInput from "@/Components/TextInput.vue"
</script>