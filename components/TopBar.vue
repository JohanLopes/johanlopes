<template>
     <b-navbar toggleable="md" :type="type" :fixed="fixedPlacement" id="topbar">
        <div class="container">
            <b-navbar-brand href="/"><img src="~assets/images/logo.svg" alt="Johan Lopes" /></b-navbar-brand>
            <h1 class="navbar-title">
                Johan LOPES
                <div class="d-none d-lg-block"><small>Conseil et développement de services web</small></div>
            </h1>
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
            <b-collapse id="nav-collapse" is-nav>
                <scrollactive tag="ul" active-class="active" :offset="topbarHeight" class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link scrollactive-item" href="#services">Mes domaines d'expertise</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollactive-item" href="#projects">Cas clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollactive-item" href="#contact">On discute de votre projet ?</a>
                    </li>
                </scrollactive>
            </b-collapse>
        </div>
     </b-navbar>
</template>

<script>
    export default {
        name: "TopBar",
        data() {
            return {
                fixed: false,
                topbarHeight: 60,
            }
        },
        mounted(){
            this.affixTopbar();
        },
        methods: {
            affixTopbar() {
                let scrollHeight = window.scrollY;
                let viewportHeight = window.innerHeight;

                this.fixed = scrollHeight > viewportHeight;
            }
        },
        computed: {
            type() {
                return this.fixed ? 'light' : 'dark';
            },
            fixedPlacement() {
                return this.fixed ? 'top' : false;
            }

        },
        beforeMount () {
            window.addEventListener('scroll', this.affixTopbar);
        },
        beforeDestroy () {
            window.removeEventListener('scroll', this.affixTopbar);
        }
    }
</script>

<style lang="scss" scoped>
    @import '~assets/scss/variables';
    @import '~bootstrap/scss/mixins/breakpoints';

    #topbar {
        left: 0;
        right: 0;
        top: 0;
        position: absolute;
        z-index: 2000;
        transition: all 0.5s ease-out;

        &.fixed-top {
            position: fixed;
            box-shadow: 0px 0px 10px 0px #888;
        }

        .navbar-brand {
            padding: 0;
        }

        .navbar-title {
            color: #333;
            font-size: 17px;
            margin: 0;
            line-height: 20px;

            small {
                color: #999;
            }
        }

        .navbar-nav {
            .nav-link {
                margin-left: $navbar-nav-link-padding-x;
                margin-right: $navbar-nav-link-padding-x;
                padding-left: 0;
                padding-right: 0;

                &.active  {
                    border-bottom: 2px solid $red;
                }
            }
        }

        &.navbar-light {
            background: rgb(255, 255, 255);
            height: 60px;

            .navbar-brand {
                img {
                    height: 40px;
                    filter: invert(0.3);
                }
            }

            @include media-breakpoint-down('sm') {
                .navbar-collapse {
                    margin-top: 20px;
                    background: rgb(240, 240, 240);

                    a {
                        padding-top: 20px;
                        padding-bottom: 20px;
                    }
                }
            }
        }

        &.navbar-dark {
            height: 100px;
            padding-top: 20px;
            padding-bottom: 20px;

            .navbar-brand {
                img {
                    height: 60px;
                    filter: invert(1);
                    opacity: 0.6;
                }
            }

            .navbar-title {
                display: none;
            }

            @include media-breakpoint-down('sm') {
                .navbar-collapse {
                    margin-top: 20px;
                    background: rgb(0, 0, 0);

                    li:not(:last-child) {
                        border-bottom: 1px solid #fff;
                    }

                    a {
                        padding-top: 20px;
                        padding-bottom: 20px;
                    }
                }
            }
        }
    }
</style>