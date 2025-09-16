<script setup lang="ts">
import Image from "./svgs/PlusSvg.vue";

const props = defineProps<{
    memo:string;
    isSaving:boolean;
}>()
const emit = defineEmits(['save'])

</script>

<template>
    <button type="button"
            @click="emit('save')"
            :disabled="props.memo.trim().length === 0||props.isSaving"
            :class="['flex justify-center items-center gap-2 w-11/12 border-solid rounded-md p-4 ml-6 text-white',props.isSaving?'bg-orange-300':props.memo.trim().length > 0?'bg-orange-500':'bg-orange-300']">
        <Image class="text-white"/>
        メモを保存
    </button>
</template>

<style scoped>

</style>
