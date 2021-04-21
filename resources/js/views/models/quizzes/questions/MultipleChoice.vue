<template>
    <question :question="question" :number="number">
        <ul class="list-none mb-4">
            <li v-for="(option, index) in options">
                <div class="checkbox d-inline-block">
                    <label class="cursor-pointer">
                        <input type="radio" :name="`answers[${number}]`" :value="option"/>
                        <strong v-text="`${letter(index)})`"/>
                        <span v-html="option"/>
                    </label>
                </div>
            </li>
        </ul>
    </question>
</template>

<script>
    import Question from '@/views/models/quizzes/questions/Question'

    export default {
        components: {
            Question
        },

        props: {
            question: Object,
            number: Number,
        },

        methods: {

            // Returns whether or not an answer has been provided on the given question
            letter(index) {
                return String.fromCharCode('A'.charCodeAt(0) + index)
            }

        },

        computed: {
            options() {
                return _.shuffle(this.question.prompt.incorrect.concat([this.question.answer_key.exact]))
            }
        }
    }

</script>