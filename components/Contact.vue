<template>
    <section id="contact" class="bg-dark py-5">
        <div class="container">
            <h4 class="h2 text-center text-white">Un projet ? On en discute !</h4>

            <div class="row mt-2 mt-md-5">
                <div class="col-12 col-lg-5 mb-2">
                    <h5 class="text-justify text-white font-weight-bold">
                        Vous avez un projet web et vous recherchez un prestaire pouvant vous accompagner
                        dans l'élaboration de celui-ci ?
                    </h5>
                    <p class="text-justify text-white">
                        Je vous propose d'en discuter quelques instants afin de mieux comprendre
                        votre métier, vos objectifs, vos contraintes et ainsi mieux cerner les contours de votre
                        projet.
                    </p>
                    <p class="text-justify text-white">
                        Suite de ce premier échange, nous définirons ensemble les parties de votre projet
                        sur lesquelles je pourrais intervenir.
                    </p>
                    <p class="text-right text-secondary mb-0 d-none d-lg-block">Je vous invite donc à remplir ce formulaire <i class="fa fa-angle-double-right ml-2"></i></p>
                </div>
                <div class="col mb-2">
                    <form v-if="!state" @submit.prevent="onSubmit" class="p-3">
                        <div class="form-group">
                            <div class="d-flex align-items-baseline">
                                <span class="text-nowrap mr-2 font-handwrite">Bonjour Johan, je suis</span>
                                <input type="text" v-model.trim="name" class="form-control" placeholder="votre prénom / nom / société" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="text-nowrap mr-2 font-handwrite">et je voulais vous dire que...</span>
                            <textarea-autosize v-model.trim="message" class="form-control" rows="1" placeholder="votre message..." required></textarea-autosize>
                        </div>

                        <div class="form-group">
                            <div class="d-flex align-items-baseline">
                                <span class="text-nowrap mr-2 font-handwrite">Vous pouvez me répondre à</span>
                                <input type="email" v-model.trim="email" class="form-control" placeholder="votre adresse e-mail ou numéro de téléphone" required />
                            </div>
                        </div>

                        <div class="form-group" v-show="formCompleted">
                            <recaptcha @success="onSuccess" @expired="onExpired" />
                        </div>

                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-outline-secondary" :disabled="!formCompleted || !this.captchaToken">
                                <i class="fa fa-paper-plane mr-2"></i> Envoyer mon message
                            </button>
                            <p class="ml-auto mb-0 text-muted d-none d-sm-block">Réponse rapide, sous quelques heures !</p>
                        </div>
                    </form>
                    <div v-else-if="state === 'sending'" class="text-white text-center p-3">
                        <p><i class="fa fa-circle-notch fa-spin fa-6x"></i></p>
                        <p>Envoi de votre message en cours...</p>
                    </div>
                    <div v-else-if="state === 'success'" class="text-white text-center p-3">
                        <p><i class="fa fa-check fa-6x text-success"></i></p>
                        <p>Votre message a bien été envoyé !<br />Une réponse vous sera apportée rapidement.</p>
                    </div>
                    <div v-else-if="state === 'error'" class="text-white text-center p-3">
                        <p><i class="fa fa-exclamation-triangle fa-6x text-danger"></i></p>
                        <p>Une erreur s'est produite lors de l'envoi de votre message !<br />Je vous invite à réessayer ultérieurement.</p>
                    </div>
                </div>
            </div>
            <p class="text-muted text-center mt-4">
                <small>PS : Afin de ne plus être sollicité inutilement par des appels commerciaux, et cela plusieurs fois par semaine,
                    j'ai pris la décision de ne plus diffuser mon numéro de téléphone sur cette page.<br />
                    Cependant, je vous invite à m'écrire un message via le formulaire ci-dessus, en me précisant votre numéro de téléphone,
                et je vous rappelerai dans les plus bref délais.</small>
            </p>
        </div>
    </section>
</template>

<script>
    import * as emailjs from 'emailjs-com';

    export default {
        name: "Contact",
        data() {
            return {
                name: '',
                email: '',
                message: '',
                captchaToken: null,
                state: null, // state(sending,success,error)
            }
        },
        methods: {
            onSuccess (token) {
                this.captchaToken = token
            },
            onExpired () {
                this.captchaToken = null
            },
            async onSubmit() {
                this.state = 'sending';

                let serviceId = 'sendinblue';
                let templateId = 'template_zHiRVowc';
                let userId = 'user_JNO1oQg5DyEoyqonhNP8W';

                let datas = {
                    'name': this.name,
                    'email': this.email,
                    'message': this.message,
                    'g-recaptcha-response': this.captchaToken
                };

                emailjs.send(serviceId, templateId, datas, userId)
                    .then((response) => {
                        this.state = 'success';
                    }, (err) => {
                        this.state = 'error';
                    });
            }
        },
        computed: {
            formCompleted() {
                return this.name !== '' && this.email !== '' && this.message !== '';
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "~assets/scss/variables";

    form {
        color: #fff;
        background: rgba(255, 255, 255, 0.1);

        .font-handwrite {
            font-family: 'Kalam', cursive;
            font-size: 1rem;
        }

        input, textarea {
            font-family: 'Kalam', cursive;
            background: transparent !important;
            color: #fff !important;
            padding-left: 0;
            padding-right: 0;
            box-shadow: none;
            border: 0;
            border-bottom: 1px solid $red;

            &::placeholder {
                font-family: $font-family-base;
                font-style: italic;
                font-weight: lighter;
            }

            &:focus,
            &:active {
                outline: none;
                box-shadow: none;
            }
        }
    }
</style>