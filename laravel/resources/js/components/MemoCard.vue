<script setup lang="ts">
import Image from "@/components/svgs/DocumentSvg.vue";

import { ref, onMounted } from "vue";
import axios from "axios";

const memos = ref<{id: number, text: string, created_at: string}[]>([]);

async function fetchMemo (){
    try {
        const res = await axios.get("http://localhost:48080/api/memos");
        memos.value = res.data.sort((a: {id: number}, b: {id: number}) => b.id - a.id);
    } catch (error) {
        console.error('error', error);
    }
}

onMounted(fetchMemo);

defineExpose({fetchMemo});

function formatDate(datetime: string): string {
    const date = new Date(datetime);
    const y = date.getFullYear();
    const m = String(date.getMonth() + 1).padStart(2, '0');
    const d = String(date.getDate()).padStart(2, '0');
    const hh = String(date.getHours()).padStart(2, '0');
    const mm = String(date.getMinutes()).padStart(2, '0');
    return `${y}/${m}/${d} ${hh}:${mm}`;
}

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
         class="w-2/5 border-solid rounded-md bg-white border-2 border-orange-200 m-2 p-4 shadow-md">
        <div class="text-lg font-medium">{{ memo.text }}</div>
        <div class="text-gray-500 text-sm">{{ formatDate(memo.created_at) }}</div>
    </div>
</template>

<style scoped>

</style>
