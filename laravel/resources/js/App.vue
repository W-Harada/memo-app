<script setup lang="ts">
import Plus from "@/components/svgs/PlusSvg.vue";
import Header from '@/components/Header.vue';
import Textarea from "@/components/TextareaForm.vue";
import MemoButton from "@/components/MemoButton.vue";
import MemoCard from "@/components/MemoCard.vue";

import {ref} from "vue";
import axios from "axios";

const memo = ref("");
const memoCardRef = ref();
const isSaving = ref(false);

async function store() {
    const text = memo.value.trim();
    if (!text || isSaving.value) return;
    isSaving.value = true;
    try {
        await axios.post('http://localhost:48080/api/memos', {text});
        await memoCardRef.value.fetchMemo();
        memo.value="";
    } catch (error) {
        console.error('error', error);
    } finally {
        isSaving.value = false;
    }
}

</script>
<template>
    <div class="bg-orange-100 min-h-screen">
        <Header/>
        <div class="flex justify-center">
            <div class="w-2/5 bg-white border-solid rounded-md border-2 border-orange-200 m-6 p-4 shadow-md">
                <div class="flex items-center gap-2">
                    <Plus class="w-6 h-6"/>
                    <p class="text-black font-semibold text-lg">新しいメモ</p>
                </div>
                <Textarea v-model="memo"
                          :disabled="isSaving"
                          @keyup.enter.exact.prevent="store"
                          @keyup.shift.enter="memo += '\n'"/>
                <MemoButton :memo="memo"
                            :isSaving="isSaving"
                            @save="store"/>
            </div>
        </div>
        <div class="flex flex-col items-center w-full">
            <MemoCard ref="memoCardRef"/>
        </div>
    </div>
</template>
