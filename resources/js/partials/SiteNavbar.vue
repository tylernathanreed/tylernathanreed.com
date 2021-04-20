<template>
    <nav class="site-nav navbar navbar-expand-md bg-secondary">
        <div class="container">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <inertia-link class="navbar-brand" :href="route('pages.index')">
                        <img src="/images/brand_full.webp" :alt="config('app.name')" height="22" class="d-none d-sm-block"/>
                        <img src="/images/brand_letter.webp" :alt="config('app.name')" height="22" class="d-block d-sm-none"/>
                    </inertia-link>
                </li>
            </ul>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggle" aria-controls="navbar-toggle" aria-expanded="false" aria-label="Toggle Navigation">
                <i class="fas fa-bars text-white"></i>
            </button>

            <!-- Right Side Of Navbar -->
            <div id="navbar-toggle" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto mt-2 mt-md-0">
                    <li class="nav-item ml-4">
                        <inertia-link class="nav-link" :href="route('pages.resume')">Resume</inertia-link>
                    </li>

                    <li class="nav-item ml-4">
                        <inertia-link class="nav-link" :href="route('pages.projects')">Projects</inertia-link>
                    </li>

                    <li class="nav-item ml-4">
                        <inertia-link class="nav-link" :href="route('pages.about')">About</inertia-link>
                    </li>

                    <li class="nav-item ml-4">
                        <inertia-link class="nav-link" :href="route('pages.contact')">Contact</inertia-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>