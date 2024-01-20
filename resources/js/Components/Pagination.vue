<script setup>
import { ref, watch, computed, defineProps} from 'vue';
import { router } from "@inertiajs/vue3";
import route from "ziggy-js";

// Paginationのプロパティを定義
const props = defineProps({
    pagination: {
        type: Object,
        required: true,
        default: () => ({})
    }
});

// pagination オブジェクトから current_page と last_page を取り出す
const current_page = computed(() => props.pagination.current_page);
const last_page = computed(() => props.pagination.last_page);

// ページネーションのリンクを生成
const createPageArray = (current, last) => {
    let start = current - 2;
    if (start < 1) start = 1;
    let end = start + 4;
    if (end > last) end = last;
    let pages = [];
    for (let i = start; i <= end; i++) {
        pages.push(i);
    }
    return pages;
};

const pages = ref(createPageArray(props.current_page, props.last_page));

// ページが変更されたときにページ配列を更新
watch(() =>current_page, (newVal) => {
    pages.value = createPageArray(newVal,last_page);
});

// ページ移動の処理
const goToPage = (page) => {
    router.get(route('dashboard', { page: page }));
};
</script>

<template>
    <nav aria-label="Page navigation" class="flex justify-center mt-4">
        <ul class="inline-flex items-center -space-x-px">
            <li v-if="current_page > 1">
                <a class="py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border hover:bg-gray-100"
                    href="#"
                    @click.prevent="goToPage(current_page - 1)">
                    前
                </a>
            </li>

            <li v-for="page in pages" :key="page" :class="{ 'bg-blue-500': page ===current_page }">
                <a class="py-2 px-3 leading-tight text-gray-700 bg-white border hover:bg-gray-100"
                    href="#"
                    @click.prevent="goToPage(page)">
                    {{ page }}
                </a>
            </li>

            <li v-if="current_page <last_page">
                <a class="py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border hover:bg-gray-100"
                    href="#"
                    @click.prevent="goToPage(current_page + 1)">
                    次
                </a>
            </li>
        </ul>
    </nav>
</template>

