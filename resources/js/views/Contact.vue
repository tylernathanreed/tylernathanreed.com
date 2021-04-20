<template>
    <div>
        <!-- Jumbotron -->
        <section class="page-section portfolio">
            <div class="container">

                <!-- Jumbotron Heading -->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Get in Touch</h2>

                <!-- Icon Divider -->
                <div class="divider-custom text-center">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>

                <div class="row justify-content-center">
                    <div v-for="(item, key) in contacts" class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" :data-target="`#portfolio-modal-${key}`">
                            <div class="d-flex align-items-center p-2">
                                <div :class="`portfolio-item-icon ${item.icon} bg-${item.color} text-white p-2`"></div>
                                <div class="ml-3 mr-3">
                                    <div>{{ item.name }}</div>
                                    <small class="text-muted text-xs">{{ item.description }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    Want to reach out? Give me a call or shoot me a text message.
                </div>
            </div>
        </section>

        <banner-buttons :slots="3">
            <template v-slot:heading>
                On the Web
            </template>

            <template v-slot:button-1>
                <banner-button link="//www.github.com/tylernathanreed">
                    <template v-slot:button>
                        <i class="fab fa-fw fa-github"></i> GitHub
                    </template>
                    If you want to view some of my projects, past and present,
                    take a look at my GitHub where I house all of my recreational projects.
                </banner-button>
            </template>

            <template v-slot:button-2>
               <banner-button link="//www.linkedin.com/in/tylernathanreed">
                    <template v-slot:button>
                        <i class="fab fa-fw fa-linkedin-in"></i> LinkedIn
                    </template>
                    If you want to get connected, check me out on LinkedIn!
                    It's a great place to maintain business relationships.
                </banner-button>
            </template>

            <template v-slot:button-3>
               <banner-button link="//https://codepen.io/tylernathanreed">
                    <template v-slot:button>
                        <i class="fab fa-fw fa-codepen"></i> Code Pen
                    </template>
                    Sometimes I slap together prototypes of random ideas, and
                    Code Pen is a great place to get started.
                </banner-button>
            </template>
        </banner-buttons>
    </div>
</template>

<script>
    import BannerButton from '@/components/BannerButton'
    import BannerButtons from '@/components/BannerButtons'
    import Jumbotron from '@/components/Jumbotron'

    export default {
        components: {
            BannerButtons,
            BannerButton,
            Jumbotron
        },
        computed: {
            contacts() {
                return {
                    'email':    {'name': 'Email',       'icon': 'fas fa-envelope',       'color': 'yellow', 'description': 'tylernathanreed@gmail.com'},
                    'phone':    {'name': 'Call & Text', 'icon': 'fas fa-phone-alt',      'color': 'cyan',   'description': '469.230.9970'},
                    'location': {'name': 'Location',    'icon': 'fas fa-map-marker-alt', 'color': 'pink',   'description': 'Dallas, TX'}
                }
            }
        }
    }
</script>