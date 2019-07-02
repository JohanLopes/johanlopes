<template>
    <section id="projects" class="bg-primary p-5">
        <div class="container">
            <h4 class="h2 text-center text-white">Quelques réalisations...</h4>

            <p class="text-center w-75 mx-auto text-light">Voici quelques exemples de projets que j'ai pu réaliser.
                La plupart m'ont été confié par des clients dans le cadre de leur conception, pilotage et développement technique.
                Etant passionné par l'innovation, j'ai aussi imaginé, développé et commercialisé certains de ces projets.
            </p>

            <vue-glide type="slider" :perView="4" :bullet="true" :bound="true" :autoplay="3000" :breakpoints="{1280:{perView: 3}, 800:{perView: 2}, 480:{perView: 1}}" class="mt-5">
                <vue-glide-slide v-for="(project, name) in projects" :key="name">
                    <project :project="project" :slug="name"></project>
                </vue-glide-slide>
            </vue-glide>
        </div>
    </section>
</template>

<script>
    import projectsCollection from '~/assets/datas/projects.yaml';
    import Project from "./Project";
    import 'vue-glide-js/dist/vue-glide.css';
    import { Glide, GlideSlide } from 'vue-glide-js';

    export default {
        name: "Projects",
        components: {
            Project: Project,
            [Glide.name]: Glide,
            [GlideSlide.name]: GlideSlide
        },
        data: function () {
            return {
                projects: projectsCollection
            }
        }
    }
</script>

<style lang="scss">
    @import "~assets/scss/variables";

    div[data-glide-el='controls'] {
      position: absolute;
      left: 0;
      right: 0;
      top: 40%;
    }

    button[data-glide-dir='<'],
    button[data-glide-dir='>'] {
      position: absolute;
      border: 0;
      outline: 0;
      padding: 10px;
      border-radius: 3px;
      background-color: $gray-200;
      opacity: 0.3;
      color: #000;
      cursor: pointer;
      &:hover {
        opacity: 1;
      }
    }

    button[data-glide-dir='>'] {
      right: 5px;
    }
    button[data-glide-dir='<'] {
      left: 5px;
    }

    .glide__slide {
      pre {
        display: flex;
        align-items: center;
        justify-content: center;
      }
      &--active {
        pre {
          background-color: $secondary !important;
        }
      }
    }

    .glide__bullets {
      text-align: center;
    }

    .glide__bullet {
      background-color: $gray-200;
      border: 0;
      outline: 0;
      width: 15px;
      height: 15px;
      border-radius: 100%;
      cursor: pointer;
      &:hover {
        background-color: darken($gray-200, 10%);
      }
      + .glide__bullet {
        margin-left: 10px;
      }
      &--active {
        background-color: $secondary;
        &:hover {
          background-color: $secondary;
        }
      }
    }
</style>