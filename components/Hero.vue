<template>
    <section id="hero" class="vh-100">
        <div class="container d-flex flex-column justify-content-center h-100">
            <div class="text-center text-lg-left">
                <h1 class="h2 text-white">
                    <type-it
                        :cursor="false"
                        :waitUntilVisible="true"
                        strings="Salut,<br />je suis <strong class='text-uppercase'>Johan Lopes</strong>">
                    </type-it>
                </h1>
                <h2 class="lead text-white">Expert web freelance ✌️</h2>
                <h3 class="h4 text-light">
                    Conseil et développement de services web<br />
                    Spécialiste Symfony <small class="font-italic">(backend)</small> & Vue.Js <small class="font-italic">(frontend)</small>
                </h3>
            </div>
        </div>
        <div class="hero-mouse"><span></span></div>
    </section>
</template>

<script>
    import TypeIt from './Vue-TypeIt';

    export default {
        name: "Hero",
        components: {
            TypeIt
        },
    }
</script>

<style lang="scss" scoped>
    @import "~assets/scss/mixins";
    @import "~assets/scss/variables";

    #hero {
        background: url("~assets/images/typing-849806_1280.jpg");
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        overflow: hidden;

        &::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(140deg, #000 40%, transparent);
            opacity: 0.8;
            z-index: 10;
        }

        * {
            z-index: 20;
        }

        h1 {
            text-shadow: 2px 2px 8px #222;
            font-family: 'Kalam', cursive;
        }

        .hero-mouse {
            border: 2px solid #fff;
            border-radius: 16px;
            height: 40px;
            width: 24px;
            display: block;
            z-index: 10;
            opacity: 0.7;
            position: absolute;
            bottom: 2rem;
            left: 50%;
            margin-left: -10px;

            span {
                display: block;
                position: relative;
                border-radius: 10px;
                background: #fff;
                width: 2px;
                height: 6px;
                top: 4px;
                margin-left: auto;
                margin-right: auto;
                @include mouseWheel();
            }
        }
    }
</style>