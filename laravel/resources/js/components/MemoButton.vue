<script setup lang="ts">
import Image from "./svgs/PlusSvg.vue";
const props = defineProps<{ memo:string }>()
const emit = defineEmits(['save'])
import { computed } from "vue"
import { ref } from "vue"
const isDisabled = computed(() => props.memo.trim().length === 0)
</script>

<template>
    <button type="button"
            @click="emit('save')"
            :disabled="isDisabled"
            :class="['flex justify-center items-center gap-2 w-11/12 h-14 border-solid rounded-md p-4 ml-6',props.memo.trim().length > 0?'bg-orange-500':'bg-orange-300']">
        <Image class="text-white"/>
        メモを保存
    </button>
</template>

<style scoped>

</style>
