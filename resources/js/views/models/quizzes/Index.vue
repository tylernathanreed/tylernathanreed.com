<template>

    <div>

        <!-- Jumbotron -->
        <header class="masthead bg-primary text-white">
            <div class="container d-flex flex-column align-items-center justify-content-center">

                <!-- Jumbotron Heading -->
                <h1 class="masthead-heading text-center mb-0">Quizzes</h1>

                <!-- Icon Divider -->
                <div class="divider-custom divider-light text-center">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>

                <!-- Jumbotron Content -->
                <div class="d-flex flex-column flex-sm-row align-items-center w-100">

                    <!-- Jumbotron Avatar Image -->
                    <div class="masthead-avatar mr-4 px-4">
                        <div class="far fa-question-circle w-100 h-100"></div>
                    </div>

                    <!-- Jumbotron Subheading -->
                    <div class="flex-1 masthead-subheading font-weight-light mb-0 ml-4 mt-4 mt-sm-0">
                        Test your mental mettle with these quizzes. Try your hand at one or more quiz below to see what you know.
                    </div>

                </div>
            </div>
        </header>

        <!-- Portfolio Section -->
        <section class="page-section portfolio">
            <div class="container">

                <!-- Portfolio Section Heading -->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Public Quizzes</h2>

                <!-- Icon Divider -->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>

                <!-- Portfolio Grid Items -->
                <div class="row">
                    <div v-for="quiz in quizzes" class="col-md-12 col-lg-6 mb-5">
                        <quiz-teaser :quiz="quiz"/>
                    </div>
                </div>

                <div class="text-center">
                    Click on any quiz to try it out.
                </div>
            </div>
        </section>

    </div>
</template>

<script>
import QuizTeaser from '@/views/models/quizzes/Teaser'

export default {
    components: {
        QuizTeaser
    },
    props: {
        quizzes: Array
    }
}
</script>