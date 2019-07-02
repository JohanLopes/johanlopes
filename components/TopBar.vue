<template>
     <nav id="topbar" class="navbar navbar-expand-sm" :class="[{ fixed: fixed }, navbarTheme]">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="~assets/images/logo.svg" alt="Johan Lopes" /></a>
            <h1 class="navbar-title">Johan LOPES <br /><small>Conseil et développement de services web</small></h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topbarCollapse" aria-controls="topbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topbarCollapse">
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
            </div>
        </div>
    </nav>
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
            navbarTheme() {
                return this.fixed ? 'navbar-light' : 'navbar-dark';
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

    #topbar {
        left: 0;
        right: 0;
        top: 0;
        position: absolute;
        z-index: 2000;
        transition: all 0.5s ease-out;

        &.fixed {
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
        }

        &.navbar-dark {
            height: 80px;
            margin-top: 20px;

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
        }
    }
</style>