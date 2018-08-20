<style lang="scss" scoped>
    .loading-container {
        margin:20px 0;
        height:400px;
        display: flex;
        align-items: center;
        justify-content: center;
        align-content: center;
        .loading-text {
            margin:auto;
            padding:0;
        }
    }
</style>

<template>
    <div class="loading-container">
        <div class="loading-text">
            <slot></slot>
        </div>
    </div>
</template>