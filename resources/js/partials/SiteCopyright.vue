<template>
    <!-- Copyright Section -->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; 2014-{{ year }} Reedware</small></div>
    </div>
</template>

<script>
    export default {
        computed: {
            year: function() {
                return (new Date).getFullYear();
            }
        }
    }
</script>