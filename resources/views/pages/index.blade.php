@extends('layouts.page', [
    'stickyNav' => true
])

@section('page.content')

    <!-- Masthead -->
    <header class="masthead fullscreen bg-primary text-white text-center">
        <div class="container d-flex align-items-center justify-content-center flex-column h-100">

            <!-- Masthead Avatar Image -->
            <img class="masthead-avatar mb-5" src="{{ url('images/avatar.png') }}" alt="Avatar">

            <!-- Masthead Heading -->
            <h1 class="masthead-heading mb-0">Tyler Nathan Reed</h1>

            <!-- Icon Divider -->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <!-- Masthead Subheading -->
            <p class="masthead-subheading font-weight-light mb-0">Architect - Developer - Leader</p>
        </div>
    </header>

    <!-- Portfolio Section -->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">

            <!-- Portfolio Section Heading -->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Laravel Ecosystem</h2>

            <!-- Icon Divider -->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <!-- Portfolio Grid Items -->
            <div class="row justify-content-center">

                <?php $portfolio = [
                    'laravel'   => ['name' => 'Laravel',   'description' => 'Web-Framework'],
                    'lumen'     => ['name' => 'Lumen',     'description' => 'Micro-Framework'],
                    'nova'      => ['name' => 'Nova',      'description' => 'Administration Panel'],
                    'vue'       => ['name' => 'Vue',       'description' => 'Responsive UIs'],
                    'dusk'      => ['name' => 'Dusk',      'description' => 'Browser Testing'],
                    'socialite' => ['name' => 'Socialite', 'description' => 'OAuth Authentication'],
                ]; ?>

                @foreach($portfolio as $key => $info)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolio-modal-{{ $key }}">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white">Read More</div>
                            </div>
                            <div class="d-flex align-items-center p-2">
                                <div class="portfolio-item-icon bg-{{ $key }}">
                                    <img class="img-fluid" src="{{ url("images/ecosystem/{$key}.min.svg") }}" alt="{{ $info['name'] }}" />
                                </div>
                                <div class="ml-3">
                                    <div>{{ $info['name'] }}</div>
                                    <small class="text-muted text-xs">{{ $info['description'] }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center">
                Click on any item to view my experience with it
            </div>
        </div>
    </section>

    <!-- Learn More Section -->
    @component('components.banner-buttons', [
        'heading' => 'Learn More',
        'slots' => 3
    ])

        @slot('slot0')
            @component('components.banner-button', [
                'link' => route('pages.about'),
                'button' => '<i class="fas fa-user-tie mr-2"></i> About Me'
            ])
                You can vist my About page to learn more about what I excel at, 
                and understand the practices and approaches I use when architecting
                superior solutions in a work environment.
            @endcomponent
        @endslot

        @slot('slot1')
            @component('components.banner-button', [
                'link' => route('pages.resume'),
                'button' => '<i class="far fa-file-alt mr-2"></i> View Resume'
            ])
                My knowledge and expertise goes beyond Laravel.
                My resume has a high-level listing of my skills,
                but only so much can be condensed onto a single sheet of paper!
            @endcomponent
        @endslot

        @slot('slot2')
            @component('components.banner-button', [
                'link' => 'https://startbootstrap.com/theme/freelancer/',
                'button' => '<i class="fas fa-phone-alt mr-2"></i> Get in Touch'
            ])
                If you have any questions, don't hesisitate to reach out to me!
                You can visit the Contact page to learn how to get in touch.
                I'm always willing to hear about promising opportunities.
            @endcomponent
        @endslot
    @endcomponent

    <!-- Portfolio Modals -->
    @component('components.portfolio-modal', ['key' => 'laravel'])
        <p>
            Laravel is typically the first product people experience within the Laravel ecosystem, and I was no exception.
            In fact, the majority of products within the ecosystem didn't yet exist when I joined the fray, and Laravel was all that there was.
            I've used a number of PHP frameworks over the years, such as
            <a href="https://kohanaframework.org/" target="_blank">Kohana</a>,
            <a href="https://www.codeigniter.com/" target="_blank">Code Igniter</a>,
            <a href="https://cakephp.org/" target="_blank">Cake PHP</a>, and others,
            but none of them had the quality of the Laravel framework.
        </p>
        <p>
            Laravel is a beautifully built framework that I've learned inside and out.
            I actually find myself reading the framework source code like a "choose your own adventure" novel,
            as I like to dive deep into the magic of Laravel.
            However, once I fully understood that magic, I was able to apply several brilliant design patterns both inside and outside of Laravel projects.
            Additionally, in-depth knowledge of Laravel's source code has proved to be incredibly valuable in a large number of situations.
        </p>
        <p>
            My first introduction into Laravel was in early 2014, using L4.1 and PHP 5.3.
            Since then, I have followed Laravel throughout its history, and even upgraded several projects from L4.2 all the way up to L6.x.
            I've enjoyed using several of the new features that Laravel continues to release, such as Lazy Collections for bulk file ingestion, or Job Middleware for complex nightly cron jobs.
        </p>
        <p>
            I plan to continue to use Laravel for both recreational and profressional projects.
            Every now and then, I'll dabble with some other framework, even in other languages (such as
            <a href="https://rubyonrails.org/" target="_blank">Ruby on Rails</a> and
            <a href="https://www.djangoproject.com/" target="_blank">Django</a>),
            just to stay open minded, but Laravel still proves to be the best framework out there.
        </p>
    @endcomponent

    @component('components.portfolio-modal', ['key' => 'lumen'])
        <p>
            Lumen was first introduced as a "slimmed down" version of Laravel, without too much focus on what it was actually meant for.
            It wasn't until Lumen 5.2 (which tied to Laravel 5.2 and the Multi-Auth update) that Lumen was tuned towards Stateless APIs.
            I dabbled with Lumen in its early years, but I didn't find much use for it in the small-scale Laravel applications I was working on.
        </p>
        <p>
            However, my situation changed in mid 2016, when performance became paramount, and the fat-trimming quality of Lumen became important.
            After getting comfortable with Lumen, and actually understanding what made it faster, I found myself using similar techniques within
            my Laravel projects, when the situation allowed for it.
        </p>
        <p>
            I've since built a number of Stateless APIs for a wide range of business scenarios, including SSO, data extraction, and PDF generation.
            Profressionally, I've used Lumen to create dedicated micro-services to slow the monolithic growth of a primary application.
            But lately, with the introduction of <a href="https://vapor.laravel.com/">Laravel Vapor</a> (a Serverless PHP Platform),
            some of the Lumen applications I've built are now being converted into Laravel to make proper use of serverless deployment.
        </p>
    @endcomponent

    @component('components.portfolio-modal', ['key' => 'nova'])
        <p>
            Nova was a dream come true for me.
            I've had to manually built several admin panels in the past, and having a framework that delivered this out of the box was magnificent.
            Even better, Nova also comes with a fully integrated front-end framework built on top of Vue.js,
            which allows for responsiveness and faster page loads (as Nova behaves like a <a href="https://en.wikipedia.org/wiki/Single-page_application">SPA</a> under the hood).
        </p>
        <p>
            So far I've built two applications in Laravel Nova: one professional, and one recreational.
            My profressional application was actually an upgrade on a custom-built admin panel made in Laravel.
            That project used a frankenstein jQuery front-end "framework", and had terrible response times.
            After migrating into Laravel Nova, was saw page speeds go from 90 seconds to 1.5 seconds.
            There were several alternatives that we could have used to increase our response times, but Nova was a magic bullet for us.
        </p>
        <p>
            My recreational project was called <a href="https://github.com/tylernathanreed/jira-nova" target="_blank">Jinora</a>,
            and was something I built to get myself out of deadline hell when management was terrible at making commitments.
            Jinora integrated with Jira through its API, and persisted everything back into Jira.
            Jinora's database was actually just cached information from Jira, and we could pull incredible metrics from Jira that oddly weren't offered out of the box.
            The primary function of Jinora was to take the hourly estimate of the issues on your plate, compare them against your schedule in a prioritized stack rank,
            and tell you in advance if something was expected to become delinquent if no action was taken outside of standard business practice.
        </p>
    @endcomponent

    @component('components.portfolio-modal', ['key' => 'vue'])
        <p>
            For years, most developers used jQuery and some sort of homebrew framework that was custom-built for the application at hand.
            However, once the rise of the JS frameworks started, solutions such as
            <a href="https://angularjs.org/">Angular</a>,
            <a href="https://reactjs.org/">React</a>, and
            <a href="https://vuejs.org/">Vue</a> climbed in popularity.
            I gave each of these an honest attempt, but found myself liking Vue the most.
            Given that Vue is popular within the Laravel community, it seems I came to the right conclusion.
        </p>
        <p>
            I've really only used JavaScript frameworks in large applications; most of them recreational.
            Several of the profressional projects I've worked on already had a somewhat functional jQuery based framework,
            and my experience with management is that they traditionally aren't keen on using new technology when the old stuff is working just fine.
        </p>
        <p>
            That said, I've used Vue quite a bit along side with Laravel Nova, and I've even built some SPAs (Single Page Applications) with it.
            Vue definitely works best as an "all-in" solution, as mixing jQuery and Vue tends to lead to mixed results.
            Nevertheless, I'm looking forward to using Vue in my future projects, as it does feel like the next evolutionary step for front-end development.
        </p>
    @endcomponent

    @component('components.portfolio-modal', ['key' => 'dusk'])
        <p>
            When it comes to CI/CD (Continuous Integration/Deployment), automated testing is paramount.
            I've used PHP Unit in the past, and still use it today, but it's only good for back-end testing.
            Sure, back-end testing is valuable, but the responsive front-ends being in high demand,
            having something to ensure that responsiveness works correctly in important.
        </p>

        <p>
            Automated Testing in general brings a confidence in the code-base that I've never had before.
            Instead of being afraid to make large, masterful changes, I'm able to whip my code into shape
            without the fear of breaking something.
        </p>

        <p>
            In practice, I've used Dusk to handle complex feature and end-to-end testing where the level of effort
            to do the same on the back-end was much higher. Additionally, adding dusk tags and other means of
            navigating through the front-end programmatically gives everything a clean and well-defined structure.
        </p>
    @endcomponent

    @component('components.portfolio-modal', ['key' => 'socialite'])
        <p>
            When it comes to OAuth, SSO, and other alternative forms of authentication, I tend to have a love-hate relationship with it.
            While sure, it's clean and simple for the user to interact with, some of the complexities behind the scenes can be a bit much.
            Thankfully, Laravel Socialite saves the day by making the development process less painful.
        </p>

        <p>
            I've had to build a couple of custom OAuth integration services with proprietary companies before, and that's probably where most of the pain comes from.
            With established protocols like OIDC and JWT, you'd be surprised how much third-party companies like to deviate from these well-formed patterns,
            and try to put user experience above security (and sometimes even common sense).
            The structure that Socialite provides helps create a rigid standard when necessary, but allows for flexibility when required.
        </p>

        <p>
            With my intermediate security knowledge, and deep understanding of Socialite, I've been able to keep customized OAuth secure.
            However, for big-party services, like Facebook and Google, Socialite makes this a breeze, and I'm happy to continue using it.
        </p>
    @endcomponent

@endsection