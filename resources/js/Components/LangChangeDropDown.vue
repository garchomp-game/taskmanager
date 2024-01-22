<template>
  <div :class="dropdownClass">
    <select @change="changeLanguage($event.target.value)" class="p-2 border rounded mr-2">
      <!-- 'mr-2' は右のマージンを追加する -->
      <option value="en">English</option>
      <option value="ja">日本語</option>
      <!-- 他の言語オプション -->
    </select>
  </div>
</template>

<script setup>
import { useI18n } from 'vue-i18n';
import { computed } from 'vue';

const props = defineProps({
  position: {
    type: String,
    default: 'left'
  }
});

const { locale } = useI18n();

const dropdownClass = computed(() => {
  return [
    "language-dropdown",
    props.position === 'right' ? 'justify-end' : 'justify-start'
  ].join(' '); // 配列の要素を空白で結合
});

// 言語を切り替えるメソッド
const changeLanguage = (lang) => {
  locale.value = lang;
};
</script>

<style>
.language-dropdown {
  display: flex;
}
</style>
