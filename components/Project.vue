<template>
    <nuxt-link :to="{ name: 'index-projects-slug', params: { slug: slug }}" class="project">
        <img :src="pictureUrl" :alt="project.name" class="w-100" />
        <h3 class="h5 px-2 py-1 text-uppercase text-white">{{ project }}</h3>
    </nuxt-link>
</template>

<script>
    export default {
        name: "Project",
        props: [ 'project', 'slug' ],
        computed: {
            pictureUrl: function () {
                return require('~/assets/datas/projects/pictures-sm/' + this.slug + '.png')
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "~assets/scss/variables";
    @import "~@fortawesome/fontawesome-free/scss/variables";

    .project {
        position: relative;
        display: inline-block;
        overflow: hidden;

        img {
            transition: transform 5s ease-in-out filter .5s ease-in-out;
        }

        h3 {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0,0,0,0.7);
            margin: 0;
        }

        &:before {
            content: fa-content($fa-var-search-plus);
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            top: 20px;
            text-align: center;
            width: 100%;
            display: none;
            font-size: 50px;
            color: $white;
            text-shadow: 0 0 10px #444;
            z-index: 1000;
        }

        &:after {
            content: 'Plus de détails';
            position: absolute;
            bottom: 60px;
            text-align: center;
            width: 100%;
            display: none;
            font-size: 20px;
            color: $white;
            text-shadow: 0 0 4px #444;
            z-index: 1000;
        }

        &:hover {
            img {
                filter: blur(5px);
                transform: scale(1.1);
            }

            &:before, &:after {
                display: block;
            }
        }
    }
</style>