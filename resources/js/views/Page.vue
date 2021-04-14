<template>
    <loading-view :loading="loading">
        <div :html="html"></div>
    </loading-view>
</template>

<script>

import Minimum from '@/utilities/minimum';

export default {

    data: () => ({
        loading: true,
        html: null
    }),

    async created() {

        await this.getPageContents()

        this.loading = false

    },

    methods: {

        getPageContents() {

            this.$nextTick(() => {

                return Minimum(
                    Spa.request().get('/spa-api/pages/' + this.$route.name, {
                        params: this.resourceRequestQueryString,
                    }), 300
                )
                    .then(({ data }) => {

                        this.html = data.html

                        this.loading = false

                    })
            })

        }

    }

}
</script>
