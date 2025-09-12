<script setup lang="ts">
import Image from "@/components/svgs/DocumentSvg.vue";

const memos = [
    { id: 1, text: "aaa",date: "2025/8/19 18:38:29" },
    { id: 2, text: "Vue.jsの基本構文を復習する",date: "2024-07-30 10:30" },
    { id: 3, text: "Laravelのルーティングについて調べる",date: "2024-07-30 9:15" },
    { id: 4, text: "明日のプレゼン資料を準備する",date: "2024-07-29 16:45 "}
];
</script>

<template>
    <div class="w-2/5 h-10">
        <div class="flex justify-between">
            <div class="flex gap-2">
                <Image class="w-6 h-6 mt-1"/>
                <h2 class="text-black font-semibold text-lg">保存されたメモ</h2>
            </div>
            <div class="w-12 h-7 bg-orange-200 rounded-xl border-solid text-center">
                {{memos.length}}件
            </div>
        </div>
    </div>
    <div v-for="memo in memos" :key="memo.id"
         class="w-2/5 h-20 border-solid rounded-md bg-white border-2 border-orange-200 m-2 p-4 shadow-md">
        <div>{{ memo.text }}</div>
        <div>{{ memo.date }}</div>
    </div>
</template>

<style scoped>

</style>
