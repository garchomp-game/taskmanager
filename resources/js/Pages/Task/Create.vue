<script setup>
import FormSection from "@/Components/FormSection.vue";
import SectionTitle from "@/Components/SectionTitle.vue";

const onSubmit = () => {};
</script>
<template>
    <FormSection @submitted="onSubmit">
        <template #title>
            <SectionTitle>
                <template #title>新規作成</template>
                <template #description>新規作成画面</template>
            </SectionTitle>
        </template>

        <template #description>
            <!-- 説明文をここに挿入 -->
            <p>このセクションの詳細な説明。</p>
        </template>

        <template #form>
            <!-- フォームの入力フィールドをここに挿入 -->
            <input type="text" placeholder="名前" />
            <input type="email" placeholder="メールアドレス" />
            <!-- その他のフォーム要素 -->
        </template>

        <template #actions>
            <!-- フォームのアクション（例：送信ボタン）をここに挿入 -->
            <button type="submit">送信</button>
        </template>
    </FormSection>
</template>
