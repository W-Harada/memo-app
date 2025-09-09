<script setup lang="ts">
import Plus from "./svgs/PlusSvg.vue";
import Textarea from './TextareaForm.vue';
import Button from './Button.vue';
import { ref } from "vue";

const memo = ref("");
</script>

<template>
    <div class="flex content-center justify-center">
        <div class="w-2/5 h-80 border-solid rounded-md bg-white border-2 border-orange-200 m-6 p-4 shadow-md">
            <div class="flex gap-4">
                <Plus class="pt-1 w-6 h-6 ml-4"/>
                <h2 class="text-black font-semibold text-lg">新しいメモ</h2>
            </div>
            <Textarea v-model="memo"/>
            <Button :memo="memo"/>
        </div>
    </div>

</template>

<style scoped>

</style>
