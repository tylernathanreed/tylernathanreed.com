<template>
    <form :method="formMethod" :action="action">
        <input type="hidden" name="_token" :value="csrf"/>
        <input v-if="useHiddenMethod" type="hidden" name="_method" :value="hiddenMethod"/>

        <slot/>
    </form>
</template>

<script>
    export default {
        props: {
            method: {
                type: String,
                default: 'GET'
            },
            url: String
        },

        computed: {
            action() {
                return this.url
            },

            csrf() {
                return document.querySelector('meta[name="csrf-token"]').content
            },

            formMethod() {
                return this.hiddenMethod !== 'GET' ? 'POST' : 'GET'
            },

            hiddenMethod() {
                return this.method.toUpperCase()
            },

            useHiddenMethod() {
                return this.hiddenMethod !== 'GET' && this.hiddenMethod !== 'POST'
            }
        }
    }
</script>