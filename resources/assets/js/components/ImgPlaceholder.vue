<style lang="scss" scoped>
    .img-banner {
        margin: 0;
        padding: 0;
        height: 100%;

        .img-placeholder {
            padding: 0;
            display: flex;
            padding: 0;
            margin: auto;
            justify-items: center;
            place-items: center;
            height: 100%;
            .img-text {
                margin:auto;
                padding:0;
            }
        }
    }
</style>

<template>
    <div class="img-banner">
        <div class="img-placeholder">
            <div class="img-text">
                <slot></slot>
            </div>
        </div>
    </div>
</template>