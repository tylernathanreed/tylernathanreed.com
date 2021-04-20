<template>
    <div class="portfolio-modal modal fade" :id="`portfolio-modal-${item.key}`" tabindex="-1" role="dialog" :aria-labelledby="`portfolio-modal-${item.key}-label`" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body">
                    <div class="portfolio-modal-heading">
                        <div v-if="item.icon" :class="`portfolio-modal-icon mr-2 mr-lg-4 ${item.icon} text-white p-md-2 bg-${item.color || item.key}`"/>
                        <div v-else :class="`portfolio-modal-icon mr-2 mr-lg-4 bg-${item.color || item.key}`">
                            <img class="img-fluid" :src="`/images/ecosystem/${item.key}.min.svg`" :alt="item.name" />
                        </div>
                        <h2 class="portfolio-modal-title text-secondary mb-0 pr-4" :id="`portfolio-modal-${item.key}-label`">{{ item.name }}</h2>
                    </div>

                    <slot class="leading-normal"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            item: Object
        }
    }
</script>