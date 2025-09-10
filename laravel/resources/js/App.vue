<script setup lang="ts">
import Header from '@/components/Header.vue';
import Plus from "@/components/svgs/PlusSvg.vue";
import Textarea from "@/components/TextareaForm.vue";
import MemoButton from "@/components/MemoButton.vue";

import { ref } from "vue";
import axios from "axios";

const memo = ref("");

async function store(){
    const text = memo.value.trim();
    console.log(text)
    if (text.length === 0) return;
    try{const response = await axios.post('http://localhost:48080/api/memos', { text });
        console.log('success', response.data);}
        catch(error){console.error('error',error);}
    memo.value=""
}
</script>
<template>
    <div class="bg-orange-100 h-screen">
        <Header/>
        <div class="flex content-center justify-center">
            <div class="w-2/5 h-80 border-solid rounded-md bg-white border-2 border-orange-200 m-6 p-4 shadow-md">
                <div class="flex gap-4">
                    <Plus class="pt-1 w-6 h-6 ml-4"/>
                    <h2 class="text-black font-semibold text-lg">新しいメモ</h2>
                </div>
                <Textarea v-model="memo"/>
                <MemoButton :memo="memo"
                            @save="store"/>
            </div>
        </div>
    </div>
</template>
