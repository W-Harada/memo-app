<script setup lang="ts">
import Image from "./svgs/PlusSvg.vue";
const props = defineProps<{ memo: string }>();
</script>

<template>
    <button :disabled="props.memo.trim().length === 0"
            :class="['w-11/12 h-14 border-solid rounded-md p-4 justify-center ml-6',props.memo.trim().length > 0?'bg-orange-500':'bg-orange-300']">
            <div class="flex justify-center items-center gap-2">
                <Image class="text-white"/>
                <p class="text-white">メモを保存</p>
            </div>
    </button>
</template>

<style scoped>

</style>
