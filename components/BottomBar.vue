<template>
    <footer id="footer" class="bg-dark text-light">
            <div class="container">
                <div class="d-flex align-items-center border-top border-light py-3">
                    <p class="mb-0 mr-auto">Tous droits réservés - &copy; Copyright 2009 / {{ new Date().getFullYear() }}</p>

                    <nuxt-link :to="{ name: 'index-legal-notices'}">
                        Mentions légales
                    </nuxt-link>

                    <ul class="list-inline mb-0 ml-4">
                        <li class="list-inline-item">
                            <a href="https://fr.linkedin.com/in/lopesjohan" target="_blank" title="LinkedIn">
                                <i class="fab fa-2x fa-linkedin"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://github.com/JohanLopes" target="_blank" title="GitHub">
                                <i class="fab fa-2x fa-github"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://twitter.com/johan_lopes" target="_blank" title="Twitter">
                                <i class="fab fa-2x fa-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
</template>

<script>
    export default {
        name: "BottomBar"
    }
</script>

<style lang="scss" scoped>
    @import "~assets/scss/variables";

    #footer {
        font-size: 14px;

        a {
            color: $white;

            &:hover {
                color: $red;
            }
        }
    }
</style>