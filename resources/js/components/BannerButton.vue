<template>
    <div class="d-flex flex-column h-100">
        <p class="lead flex-1">
            <slot/>
        </p>
        <div class="text-center mt-3">
            <component :is="inertia ? 'inertia-link' : 'a'" class="btn btn-xl btn-outline-light text-nowrap w-75" :href="link">
                <slot name="button"/>
            </component>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            link: String,
            inertia: {type: Boolean, default: false}
        }
    }
</script>