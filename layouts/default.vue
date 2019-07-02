<template>
    <div>
        <top-bar/>
        <nuxt/>
        <bottom-bar/>
    </div>
</template>

<script>
    import TopBar from '~/components/TopBar'
    import BottomBar from "~/components/BottomBar";

    export default {
        components: {
            TopBar,
            BottomBar
        }
    }
</script>

<style lang="scss">
    @import "~/assets/scss/app.scss";
</style>
