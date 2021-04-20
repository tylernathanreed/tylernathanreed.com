<template>
    <section class="page-section bg-primary text-white mb-0 leading-normal">
        <div class="container">

            <!-- Section Heading -->
            <h2 class="page-section-heading text-center text-uppercase text-white">
                <slot name="heading"/>
            </h2>

            <!-- Icon Divider -->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <!-- Section Content -->
            <div class="row justify-content-center">
                <div v-for="i in slots" :key="i" :class="'col-lg-4' + (i == slots - 1 ? ' mb-16 mb-lg-0' : '')" style="max-width: 400px">
                    <slot :name="`button-${i}`"/>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: {
            slots: Number
        }
    }
</script>