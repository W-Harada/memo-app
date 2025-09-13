<script setup lang="ts">
import Header from '@/components/Header.vue';
import Plus from "@/components/svgs/PlusSvg.vue";
import Textarea from "@/components/TextareaForm.vue";
import MemoButton from "@/components/MemoButton.vue";
import MemoCard from "@/components/MemoCard.vue";

import {ref} from "vue";
import axios from "axios";

const memo = ref("");
const memoCardRef = ref();

async function store() {
    const text = memo.value.trim();
    console.log(text)
    if (text.length === 0) return;
    try {
        const response = await axios.post('http://localhost:48080/api/memos', {text});
        console.log('success', response.data);
        memoCardRef.value.fetchMemo();
        memo.value="";
    } catch (error) {
        console.error('error', error);
    }
}

</script>
<template>
    <div class="bg-orange-100 min-h-screen">
        <Header/>
        <div class="flex content-center justify-center">
            <div class="w-2/5 border-solid rounded-md bg-white border-2 border-orange-200 m-6 p-4 shadow-md">
                <div class="flex gap-2">
                    <Plus class="pt-1 w-6 h-6 ml-4"/>
                    <h2 class="text-black font-semibold text-lg">新しいメモ</h2>
                </div>
                <Textarea v-model="memo"/>
                <MemoButton :memo="memo"
                            @save="store"/>
            </div>
        </div>
        <div class="flex flex-col items-center w-full">
            <MemoCard ref="memoCardRef"/>
        </div>
    </div>
</template>
