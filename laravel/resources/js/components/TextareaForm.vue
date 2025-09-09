<script setup lang="ts">
const modelValue = defineModel<string>();
</script>

<template>
    <textarea placeholder="メモを入力してください．．．
（Enterで保存、Shift+Enterで改行）"
              v-model="modelValue"
              class="w-11/12 h-40 border-gray-200 border-2 border-solid rounded-md ml-6 m-4 p-4">
    </textarea>
</template>

<style scoped>

</style>
