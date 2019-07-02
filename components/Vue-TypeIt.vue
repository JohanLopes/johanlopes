<template>
    <span class="type-it"></span>
</template>

<script>
    import TypeIt from 'typeit'

    export default {

        props: {
            strings: {
                type: [String, Array],
                required: true
            },
            cursor: {
                type: Boolean,
                default: true
            },
            waitUntilVisible: {
                type: Boolean,
                default: true
            }
        },

        mounted () {
            new TypeIt(this.$el, {
                strings: this.strings,
                cursor: this.cursor,
                waitUntilVisible: this.waitUntilVisible
            }).go();
        }
    }
</script>
