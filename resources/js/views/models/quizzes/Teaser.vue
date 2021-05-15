<template>
    <div class="portfolio-item-lg mx-auto">
        <div class="d-flex align-items-center p-2">
            <div :class="`portfolio-item-icon ${icon} bg-${color} text-white p-4`"></div>
            <div class="ml-3 mr-3">
                <inertia-link :href="route('quiz.show', quiz.slug)" class="d-block">{{ quiz.name }}</inertia-link>
                <small class="text-muted text-xs">{{ quiz.description }}</small>
            </div>
        </div>
        <small class="position-absolute pin-b pin-r p-2">
            Questions: {{ quiz.questions_count }}
        </small>
    </div>
</template>

<script>
export default {
    props: {
        quiz: Object
    },

    computed: {
        icon() {
            return this.quiz.icon || 'fas fa-question' 
        },

        color() {
            return this.quiz.color || 'blue'
        }
    }
}
</script>