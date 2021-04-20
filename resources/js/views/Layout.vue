<template>
    <div>
        <site-navbar/>

        <main id="page-content">
            <slot/>
        </main>

        <site-footer/>
        <site-copyright/>

        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>
    </div>
</template>

<script>
import SiteNavbar from '@/partials/SiteNavbar'
import SiteFooter from '@/partials/SiteFooter'
import SiteCopyright from '@/partials/SiteCopyright'

export default {
    components: {
        SiteNavbar,
        SiteFooter,
        SiteCopyright
    },
}
</script>