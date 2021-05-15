<template>
    <div>
        <jumbotron>

            <!-- Jumbotron Heading -->
            <h1 class="masthead-heading text-center mb-0">Example Projects</h1>

            <!-- Icon Divider -->
            <div class="divider-custom divider-light text-center">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <!-- Jumbotron Content -->
            <div class="d-flex flex-column flex-sm-row align-items-center w-100">

                <!-- Jumbotron Avatar Image -->
                <img class="masthead-avatar mr-4" src="/images/ecosystem/laravel.min.svg" alt="Laravel">

                <!-- Jumbotron Subheading -->
                <div class="flex-1 masthead-subheading font-weight-light mb-0 ml-4 mt-4 mt-sm-0">
                    Explore some of the projects I've made available to the public.
                    Both a working copy and source code are accessible for each example.
                </div>

            </div>

        </jumbotron>

        <!-- Portfolio Section -->
        <section class="page-section portfolio">
            <div class="container">

                <!-- Portfolio Section Heading -->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Try One Out</h2>

                <!-- Icon Divider -->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>

                <!-- Portfolio Grid Items -->
                <div class="row justify-content-center">
                    <div v-for="project in projects" class="col-md-12 mb-4">
                        <div class="portfolio-item-lg mx-auto w-100">
                            <div class="d-flex align-items-stretch p-2">
                                <div :class="`portfolio-item-icon ${project.icon} bg-${project.color} text-white p-2`"></div>
                                <div class="ml-3 mr-3 w-100 flex-1 my-auto">
                                    <div class="d-flex flex-column">
                                        <h4 class="flex-1">{{ project.name }}</h4>
                                        <div class="text-muted flex-1">{{ project.description }}</div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column justify-content-between">
                                    <component :is="project.inertia ? 'inertia-link' : 'a'" :href="project.demo">
                                        Live Demo &raquo;
                                    </component>
                                    <a :href="project.source" target="_blank">Source Code &raquo;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    Click on any item to dive into the project itself.
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import Jumbotron from '@/components/Jumbotron'

    export default {
        components: {
            Jumbotron
        },
        computed: {
            projects() {
                return [
                    {
                        name: 'Quiz',
                        description: 'A simple demonstration on taking a quiz.',
                        color: 'yellow',
                        icon: 'far fa-question-circle',
                        demo: route('quiz.index'),
                        source: 'https://github.com/tylernathanreed/tylernathanreed.com',
                        inertia: true
                    }
                ]
            }
        }
    }
</script>