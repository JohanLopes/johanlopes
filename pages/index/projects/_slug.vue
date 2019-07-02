<template>
    <div class="aside" v-on:keyup.esc="$nuxt.$router.push({ name: 'index' })">
        <div class="aside-header d-flex align-items-center p-2 px-4">
            <h3 v-if="project" class="m-0">{{ project.attributes.name }}</h3>
            <nuxt-link :to="{ name: 'index' }" tag="button" type="button" class="aside-close ml-auto" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </nuxt-link>
        </div>

        <div v-if="project" class="aside-content p-4">
            <section class="media bg-light p-4 mb-4">
                <img v-bind:src="logoUrl" class="d-flex mr-4" width="120" />

                <div class="media-body">
                    <p>Année de réalisation :</p>
                    <p class="mb-0">
                        Technologies / Concept utilisés :<br />
                        <span v-for="technology in project.attributes.technologies" v-bind:key="technology" class="badge badge-pill badge-primary mr-1">{{ technology }}</span>
                    </p>
                </div>
            </section>

            <section>
                <div v-html="project.html"></div>
            </section>
        </div>
        <div v-else class="aside-loading"></div>
    </div>
</template>

<script>
export default {
  name: 'ProjectAside',

  transition: {
      name: 'slide',
      mode: 'out-in'
  },

  data () {
    return {
      project: null
    }
  },

  created () {
    this.fetchData()
  },

  computed: {
      slug () {
          return this.$route.params.slug
      },

      logoUrl () {
          return require('~/assets/datas/projects/logos/' + this.slug + '.png');
      }
  },

  methods: {
    fetchData () {
        this.project = require('~/assets/datas/projects/' + this.slug + '.md');
    }
  }
}
</script>
