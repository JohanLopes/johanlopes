<template>
  <div>
    <hero/>
    <customers/>
    <services/>
    <projects/>
    <contact/>
    <nuxt-child :key="$route.path"/>
  </div>
</template>

<script>
import Contact from '~/components/Contact'
import Hero from "../components/Hero";
import Customers from "../components/Customers";
import Services from "../components/Services";
import Projects from "../components/Projects";

export default {
  components: {
    Projects,
    Services,
    Customers,
    Hero,
    Contact
  }
}
</script>
