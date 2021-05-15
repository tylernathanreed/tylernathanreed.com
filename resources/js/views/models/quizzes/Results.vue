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
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Results</h2>

                <!-- Icon Divider -->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>

                <h3 class="d-flex justify-content-between mb-4 w-100">
                    <div>Score: {{ results.score }}%</div>
                    <div>{{ results.total_awarded }} of {{ results.total_available }} Points</div>
                </h3>

                <!-- Progress Bar -->
                <div class="progress mb-4">
                    <div
                        :class="`progress-bar bg-${color}`"
                        role="progressbar"
                        :style="`width: ${results.score}%;`"
                        :aria-valuenow="results.total_awarded"
                        aria-valuemin="0"
                        :aria-valuemax="results.total_available"
                    >
                    </div>
                </div>

                <h3 class="mb-4">Ratings</h3>

                <section class="mb-4">
                    <div id="ratings" class="ct-chart"></div>

                    <div class="text-right">
                        <small class="text-muted">Global Attempts: {{ globalAttempts }}</small>
                    </div>
                </section>

                <h3 class="mb-4">Questions</h3>

                <section class="mb-4">
                    <div v-for="(order, index) in results.orders" class="mb-4">
                        <div class="d-flex mb-1">
                            <strong class="pr-1">{{ index + 1 }}) </strong>
                            <span class="flex-1" v-html="question(order).prompt"/>
                            <span class="pl-1 text-muted">({{ question(order).awarded }} of {{ question(order).available }})</span>
                        </div>

                        <ul class="ml-4">
                            <li>
                                <span>Your Answer: </span>
                                <strong :class="question(order).status == 'correct' ? 'text-success' : 'text-danger'">{{ question(order).provided }}</strong>
                            </li>
                            <li>
                                <span>Correct Answer: {{ question(order).answer }}</span>
                            </li>
                        </ul>
                        
                    </div>
                </section>

                <div class="d-flex justify-content-between">
                    <inertia-link :href="route('quiz.index')" class="btn btn-lg btn-primary">
                        &laquo; Back to Quizzes
                    </inertia-link>

                    <inertia-link :href="route('quiz.show', quiz.slug)" class="btn btn-lg btn-primary">
                        &#8635; Retake Quiz
                    </inertia-link>
                </div>
            </div>
        </section>

    </div>

</template>

<style>
    #ratings.ct-series-a .ct-bar { stroke: var(--primary); }
</style>

<script>
    export default {
        props: {
            quiz: Object,
            results: Object
        },

        data() {

            let otherScores = [];
            let currentScore = [];

            _.forEach(this.quiz.breakdown, (count, score) => {

                otherScores.push(score == this.results.score ? 0 : count)
                currentScore.push(score != this.results.score ? 0 : count)

            })

            return {
                otherScores: otherScores,
                currentScore: currentScore
            }

        },

        methods: {

            question(number) {
                return this.results.questions[number]
            }

        },

        computed: {

            color() {

                if(this.percent > 90) {
                    return 'success'
                } else if(this.percent > 70) {
                    return 'primary'
                } else if(this.percent > 60) {
                    return 'warning'
                } else {
                    return 'danger'
                }

            },

            labels() {

                let labels = [];

                for(let i = 0; i < this.results.total_available; i++) {
                    labels.push(Math.round(i / this.results.total_available * 100) + '%')
                }

                return labels

            },

            globalAttempts() {
                return _.sum(Object.values(this.quiz.breakdown).map((v) => +v))
            },

            chartData() {

                return {
                    labels: this.labels,
                    series: [
                        this.otherScores,
                        this.currentScore
                    ]
                }

            },

            chartOptions() {

                return {
                    stackBars: true,
                    axisY: {
                        onlyInteger: true
                    }
                }

            }

        },

        mounted() {

            new Chartist.Bar('.ct-chart', this.chartData, this.chartOptions);

        }


    }

</script>