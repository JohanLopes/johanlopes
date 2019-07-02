<template>
    <section id="services" class="p-5">
        <div class="container">
            <h4 class="h2 text-center text-primary">Mes domaines d'expertise</h4>

            <p class="text-center w-75 mx-auto">Parce que le métier de développeur ne consiste pas à écrire simplement des lignes de codes, mes 10 années d'expériences m'ont offert une certaine polyvalence qui me permet aujourd'hui de vous accompagner sur toutes les phases de création et de déploiement de votre projet.</p>

            <div class="card-deck mt-5">
                <div class="card">
                    <div class="card-body pb-0 text-center" style="height: 200px;">
                        <img src="~assets/images/scrum.svg" class="h-100" />
                    </div>
                    <div class="card-body h-100">
                        <h3 class="card-title text-center">Conseil & Gestion de projet</h3>
                        <p class="card-text text-body">Dès la naissance de votre projet, je vous accompagne dans sa <strong>définition technique et fonctionnelle</strong> afin que vous puissiez rapidement faire les bons choix. </p>
                        <p class="card-text text-body">Je suis <strong>pragmatique</strong> et vous oriente vers des objectifs réalisables en accords avec votre planning de livraison et votre budget.</p>
                        <p class="card-text text-body">Afin de maximiser les chances de réussite d'un projet web, je veille à ce que son équipe soit <strong>organisée et alignée sur des objectifs communs</strong>.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body pb-0 text-center" style="height: 200px;">
                        <img src="~assets/images/symfony.svg" class="h-100" />
                    </div>
                    <div class="card-body h-100">
                        <h3 class="card-title text-center">Développement Backend</h3>
                        <p class="card-text text-body">Adepte du framework <a href="https://symfony.com" target="_blank">Symfony</a> depuis 10 ans, j'ai choisi ce framework pour <strong>sa robustesse, sa flexibilité et son évolutivité</strong>.</p>
                        <p class="card-text text-body">Aujourd'hui, la version 4 de <a href="https://symfony.com" target="_blank">Symfony</a> me permet de vous proposer des applications <strong>complètes</strong> (backend, frontend, API...) et <strong>pérennes</strong>.</p>
                        <p class="card-text text-body"><a href="https://symfony.com" target="_blank">Symfony</a> est open-source et bénéficie d'une grande communauté de développeurs, ce qui lui permet d'être régulièrement amélioré et mis à jour.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body pb-0 text-center" style="height: 200px;">
                        <img src="~assets/images/vuejs.svg" class="h-100" />
                    </div>
                    <div class="card-body h-100">
                        <h3 class="card-title text-center">Développement Frontend</h3>
                        <p class="card-text text-body">Depuis {{ (new Date().getFullYear()) - 2016 }} ans, je vous propose aussi des interfaces utilisateurs plus dynamiques, basées sur le célèbre framework <a href="https://fr.vuejs.org/index.html" target="_blank">Vue.js</a>.</p>
                        <p class="card-text text-body">La communauté de développeurs <a href="https://fr.vuejs.org/index.html" target="_blank">Vue.js</a> propose de nombreux "plugins" ou "composants" qui permettent d'ajouter facilement des fonctionnalités à vos interfaces, et de pouvoir ainsi tester rapidement leur efficacité auprès de vos clients.</p>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body h-100">
                    <h3 class="card-title text-center">Mais aussi...</h3>
                    <div class="row">
                        <div class="col">
                            <div class="media">
                                <img class="mr-3" src="~assets/images/html5-css.svg" width="50" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-0">Intégration HTML5/CSS3</h4>
                                    <p class="text-body mb-0">Bootstrap framework, Sass, Webpack</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="media">
                                <img class="mr-3" src="~assets/images/wireframes.png" width="50" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-0">Prototypage / Ergonomie</h4>
                                    <p class="text-body mb-0">Photoshop, Wireframe, UX</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="media">
                                <img class="mr-3" src="~assets/images/docker.svg" width="50" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-0">Déploiement / Automatisation</h4>
                                    <p class="text-body mb-0">Docker, Gitlab CI/CD, Capistrano</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
    export default {
        name: "Services"
    }
</script>

<style lang="scss" scoped>
    #services {
        background-color: gray("100");

        .card {
            border: 0;

            &::before {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                box-shadow: 0 24px 48px 0 rgba(17, 16, 62, 0.2);
                opacity: 0.5;
                transition: opacity 0.3s ease-in-out;
                mix-blend-mode: multiply;
                z-index: 500;
            }

            &>* {
                z-index: 1000;
            }

            &:hover {
                &::before {
                    opacity: 1;
                }
            }
        }
    }
</style>