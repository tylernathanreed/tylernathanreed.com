<template>
    <div class="col-md-6">
        <div class="mx-auto mb-6 last-2:mb-0" style="max-width: 400px">
            <h3 class="mb-1" :role="link ? 'link' : null">
                <a v-if="link" target="_blank" :href="link">
                    <div class="heading-title" v-html="title"/>
                </a>
                <div v-else class="heading-title" v-html="title"/>
            </h3>

            <small v-if="subtitle" class="text-gray" v-html="subtitle"/>

            <p class="mt-2" v-html="content"/>

            <p v-if="footer" class="small mt-2" v-html="footer"/>

            <small v-if="meta" class="block mt-3">
                <span v-html="meta"/>
                <span v-if="aside" class="float-right" v-html="aside"/>
            </small>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            title: String,
            subtitle: String,
            link: String,
            content: String,
            footer: String,
            meta: String,
            aside: String
        }
    }
</script>
