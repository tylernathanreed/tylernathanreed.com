<template>
    <div>
        <div class="mb-2">
            <strong v-text="number + 1"/>
            <span v-html="question.prompt.question"/>
        </div>

        <code v-if="question.prompt.code" class="d-block border px-3 py-2 mb-3" v-html="code"/>
        <slot/>
    </div>
</template>

<script>
    export default {
        props: {
            question: Object,
            number: Number,
        },

        computed: {
            code() {
                return this.question.prompt.code && this.question.prompt.code.replaceAll('\n', '<br>').replaceAll('\t', '&nbsp;&nbsp;')
            }
        }
    }
</script>
