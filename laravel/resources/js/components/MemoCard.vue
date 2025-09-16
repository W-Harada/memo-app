<script setup lang="ts">
import Document from "@/components/svgs/DocumentSvg.vue";
import Trash from "@/components/svgs/TrashSvg.vue";

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

async function deleteMemo (id: number) {
    try {
        await axios.delete(`http://localhost:48080/api/memos/${id}`);
        memos.value = memos.value.filter(memo => memo.id !== id);
    } catch (error) {
        console.error("error", error);
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
            <div class="flex items-center gap-2">
                <Document class="w-6 h-6"/>
                <p class="text-black font-semibold text-lg">保存されたメモ</p>
            </div>
            <div class="w-12 h-7 bg-orange-200 rounded-xl border-solid text-center">
                {{memos.length}}件
            </div>
        </div>
    </div>
    <div v-for="memo in memos" :key="memo.id"
         class="w-2/5 border-solid rounded-md bg-white border-2 border-orange-200 m-2 p-4 shadow-md">
        <div class="flex justify-between items-center">
            <div class="text-lg font-medium">{{ memo.text }}</div>
            <button class="w-8 h-8 rounded-md text-gray-500 transition hover:text-red-400 hover:bg-red-100"
                    @click="deleteMemo(memo.id)">
                <Trash class="ml-2"/>
            </button>
        </div>
        <div class="text-gray-500 text-sm">{{ formatDate(memo.created_at) }}</div>
    </div>
</template>

<style scoped>

</style>
