<template>

    <div>
        <!-- Jumbotron -->
        <header :class="`masthead bg-${quiz.color || 'primary'} text-white`">
            <div class="container d-flex flex-column align-items-center justify-content-center">

                <!-- Jumbotron Heading -->
                <h1 class="masthead-heading text-center mb-0">{{ quiz.name }}</h1>

                <!-- Icon Divider -->
                <div class="divider-custom divider-light text-center">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>

                <!-- Jumbotron Content -->
                <div class="d-flex flex-column flex-sm-row align-items-center w-100">

                    <!-- Jumbotron Avatar Image -->
                    <div class="masthead-avatar d-sm-block d-none">
                        <div :class="`${quiz.icon || 'far fa-question-circle'} w-100 h-100`"></div>
                    </div>

                    <!-- Jumbotron Subheading -->
                    <div class="flex-1 masthead-subheading font-weight-light mb-0 ml-4 mt-4 mt-sm-0">
                        {{ quiz.description }}
                    </div>

                </div>
            </div>
        </header>

        <!-- Question Section -->
        <section class="page-section portfolio">
            <div class="container">

                <!-- Question Section Heading -->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Questions</h2>

                <!-- Icon Divider -->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>

                <div class="text-center mb-4">
                    Question <span ref="quiz-counter">{{ current }}</span> of {{ questionsCount }}
                </div>

                <!-- Progress Bar -->
                <div class="progress mb-4">
                    <div
                        ref="quiz-progress-bar"
                        class="progress-bar progress-bar-striped progress-bar-animated"
                        role="progressbar"
                        :style="`width: ${Math.round((current - 1) / questionsCount * 100)}%;`"
                        :aria-valuenow="current - 1"
                        aria-valuemin="0"
                        :aria-valuemax="questionsCount"
                    >
                    </div>
                </div>

                <v-form ref="quiz-form" method="post">
                    <div id="quiz" ref="quiz" class="carousel slide text-xl" data-bs-ride="carousel" data-wrap="false" data-interval="false">
                        <div class="carousel-inner">
                            <div v-for="(question, number) in questions" :key="number" :class="`carousel-item${number == 0 ? ' active' : ''}`">
                                <component :is="question.view_template" :number="number" :question="question"/>
                                <input type="hidden" :name="`orders[${number}]`" :value="question.default_order"/>
                            </div>
                        </div>

                        <div ref="quiz-validation" class="text-md text-danger text-center mb-2" style="display: none;">
                            <span>An answer must be provided.</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a class="btn btn-lg btn-primary disabled" href="#quiz" role="button" data-bs-slide="prev" ref="back">
                                <span>&laquo; Back</span>
                            </a>

                            <a class="btn btn-lg btn-primary" href="#quiz" role="button" data-bs-slide="next" ref="next">
                                <span>Next &raquo;</span>
                            </a>

                            <button type="submit" class="btn btn-lg btn-danger" style="display: none" ref="submit">
                                <span>Submit</span>
                            </button>
                        </div>
                    </div>

                </v-form>
            </div>
        </section>
    </div>

</template>

<script>
    import VForm from '@/components/Form'
    import QuestionMultipleChoice from '@/views/models/quizzes/questions/MultipleChoice'
    import QuestionTrueFalse from '@/views/models/quizzes/questions/TrueFalse'

    export default {
        components: {
            VForm,
            QuestionMultipleChoice,
            QuestionTrueFalse
        },

        props: {
            quiz: Object
        },

        methods: {

            // Returns whether or not an answer has been provided on the given question
            answerProvided(slideNumber) {

                let answer = _.find($(this.$refs['quiz-form'].$el).serializeArray(), {name: 'answers[' + slideNumber + ']'})

                return !!answer && !!answer.value;

            }

        },

        computed: {
            current() {
                return 1
            },

            questionsCount() {
                return this.quiz.questions.length
            },

            questions() {
                return _.shuffle(this.quiz.questions)
            }
        },

        mounted() {

            let self = this

            // When the carousel sliding begins...
            $(this.$refs['quiz']).on('slide.bs.carousel', function(e) {

                // Make sure an answer has been provided
                if(e.direction == 'left' && !self.answerProvided(e.from)) {

                    // Prevent the default behavior
                    e.preventDefault();

                    // Display a validation error
                    $(self.$refs['quiz-validation']).show();

                    // Stop here
                    return;

                }

                // Hide any validation errors
                $(self.$refs['quiz-validation']).hide();

                // Update the question counter
                $(self.$refs['quiz-counter']).text(e.to + 1);

                // Update the quiz progress
                $(self.$refs['quiz-progress-bar'])
                    .attr('aria-valuenow', e.to + 1)
                    .width(Math.round((e.to) / self.questionsCount * 100) + '%');

            });

            // When the carousel sliding ends
            $(this.$refs['quiz']).on('slid.bs.carousel', function(e) {

                // Make sure an answer has been provided
                if(e.direction == 'left' && !self.answerProvided(e.from)) {

                    // Prevent the default behavior
                    e.preventDefault();

                    // Stop here
                    return;

                }

                // Toggle the back button status
                if(e.to != 0) {
                    $(self.$refs['back']).removeClass('disabled');
                } else {
                    $(self.$refs['back']).addClass('disabled');
                }

                // Toggle the next/submit button visibility
                if(e.to == self.questionsCount - 1) {

                    $(self.$refs['next']).hide();
                    $(self.$refs['submit']).show();

                } else {

                    $(self.$refs['next']).show();
                    $(self.$refs['submit']).hide();

                }

            });

        }
    }

</script>
