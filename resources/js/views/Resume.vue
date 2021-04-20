<template>
    <div>
        <div class="container bg-white shadow-md font-serif overflow-auto pt-3 mt-4 mb-4" style="max-width: 800px">
            <article class="px-4">
                <!-- Name -->
                <section>
                    <h1 class="text-center">Tyler Reed</h1>
                </section>

                <!-- Phone Number -->
                <section class="mb-4">
                    <small class="d-block text-center">
                        469.230.9970 | Dallas, TX
                    </small>
                </section>

                <!-- Links -->
                <section class="text-center mb-3 md:mb-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <span>Email:</span>
                                <a href="mailto:tylernathanreed@gmail.com">tylernathanreed@gmail.com</a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <span>Website:</span>
                                <a href="//www.tylernathanreed.com">www.tylernathanreed.com</a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <span>Linked In:</span>
                                <a href="//www.linkedin.com/in/tylernathanreed">www.linkedin.com/in/tylernathanreed</a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <span>GitHub:</span>
                                <a href="//www.github.com/tylernathanreed">www.github.com/tylernathanreed</a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Objective -->
                <section class="row mb-6">
                    <h2 class="col-md-3 leading-loose mb-0 text-center">Objective</h2>
                    <p class="col-md-9">
                        To secure a position where I can efficiently contribute my skills and abilities for the growth of the organization and build my professional career, as well as learn new skills to expand my abilities.
                    </p>
                </section>

                <resume-skills :groups="skills"/>

                <!-- Education & Certifications -->
                <section class="mb-6">
                    <h2 class="text-center mb-3">Education &amp; Certifications</h2>

                    <div class="row">
                        <resume-paragraph
                            title="University of Texas at Dallas"
                            link="http://www.utdallas.edu/"
                            content="Bachelors in Computer Science"
                            footer="<b>Courses:</b> Algorithms, AI, Prob &amp; Stats, Security, Networking, OS, Discrete Math"
                            meta="Awarded: August 2015"
                        />

                        <resume-paragraph
                            title="Richland Collegiate High School"
                            link="http://richlandcollege.edu/rchs/"
                            content="Associates in Science"
                            footer="<b>Courses:</b> C/C++"
                            meta="Awarded: May 2011"
                        />

                        <resume-paragraph
                            title="Microsoft Technology Associate"
                            link="https://www.microsoft.com/en-us/learning/mta-certification.aspx"
                            content="Awarded for the ability to understand and explain fundamental concepts of Software Development."
                            footer="<b>Tech:</b> Database, Development, IT Infrastructure"
                            meta="Awarded: June 2014"
                        />
                    </div>
                </section>

                <!-- Employment & Internships -->
                <section class="mb-6">
                    <h2 class="text-center mb-3">Employment &amp; Internships</h2>

                    <div class="row">
                        <resume-paragraph
                            title="Transworld Systems Inc."
                            subtitle="Senior Software Developer"
                            link="https://www.tsico.com/"
                            content="Continued developing software from Halo Co. Responsibilities expanded into leading a team on optimization, bulk imports, data extraction, and more."
                            footer="<b>Skills:</b> Laravel 5.1 - 6.0, PHP 7.2, JavaScript, MSSQL, SSO, Tailwind, Unit Testing, JIRA, NPM, NoSQL"
                            meta="March 2018 - <b>Current</b>"
                        />

                        <resume-paragraph
                            title="Halo Companies Inc."
                            subtitle="Senior Software Developer"
                            link="http://www.haloco.com/"
                            content="Built a loan servicing software and borrower portal using the Laravel 5.1 Framework. Built architectures such as notifications, nightlies, and payments."
                            footer="<b>Skills:</b> Laravel 5.1, PHP 5.3, PHP 7.1, JavaScript, MSSQL, Mailgun, Twilio, Queues, PCI, Bootstrap, APIs, AWS"
                            meta="June 2016 - March 2018"
                        />

                        <resume-paragraph
                            title="Bible.org"
                            subtitle="Full-Stack Web Developer"
                            link="http://www.bible.org/"
                            content="Built a custom site from scratch using the Laravel 5.1 and then 5.2 Framework. Used a mobile-first design, and operated using TDD."
                            footer="<b>Skills:</b> Laravel 5.1, Laravel 5.2, PHP 5.3, JavaScript, Stripe, MySQL, Bootstrap, TDD, WAMP"
                            meta="January 2015 - May 2016"
                        />

                        <resume-paragraph
                            title="Epimed International"
                            subtitle="Contract Programmer | Backend Designer"
                            link="http://www.epimedpain.com/"
                            content="Replaced an analog paper system with a digital one. The implementation yielded a mobile-ready application using the Laravel 4 framework."
                            footer="<b>Skills:</b> Laravel 4.2, PHP 5.3, JavaScript, MySQL, Bootstrap, Git, SourceTree, Composer, LAMP"
                            meta="September 2014 - December 2014"
                        />

                        <resume-paragraph
                            title="STEAM Camp | UTD"
                            subtitle="Game Design Professor"
                            link="http://www.utdallas.edu/k12/summer/"
                            content="Taught K-12 Students how to program and design games in an Agile environment using Game Maker Software. Created the curriculum."
                            footer="<b>Skills:</b> Communication, Leadership, Teaching, Flexibility, Documentation, SOLID, MVC, OOP, DRY, KISS"
                            meta="June 2013 - August 2013, June 2014 - August 2014"
                        />

                        <resume-paragraph
                            title="GM: Studio / CS Private Tutor"
                            subtitle="Private Tutor for GM: Studio and other CS topics"
                            link="https://www.yoyogames.com/studio"
                            content="Taught Students various CS concepts by using a goal-oriented curriculum that was dynamically adjusted for each student\'s needs."
                            footer="<b>Skills:</b> Communication, Teaching, Modularity, Documentation, SOLID, OOP, DRY, KISS"
                            meta="August 2014 - January 2015"
                        />
                    </div>
                </section>

                <!-- Projects & Websites -->
                <section class="mb-6">
                    <h2 class="text-center mb-3">Projects &amp; Websites</h2>

                    <div class="row">
                        <resume-paragraph
                            title="Laravel | Personal Website"
                            link="http://www.tylernathanreed.com/"
                            content="My personal website, home to all of my various projects, packages, and other programming toys. Always uses latest software and principals."
                            footer="<b>Skills:</b> Laravel 5.1 to 6.08, Tailwind, Composer, NPM, Yarn"
                            meta="November 2014 - Current"
                        />

                        <resume-paragraph
                            title="C++ | Internet Simulation"
                            link="https://github.com/tylernathanreed/Academic-Projects/tree/master/C%20%26%20C%2B%2B/Internet%20Simulation"
                            content="Simulates a network by having files as network channels. Realistically matches an actual network where nodes use different OSI Layers."
                            footer="<b>Skills:</b> Modularity, SRP, C/C++, Vim, Software Design"
                            meta="May 2014"
                        />

                        <resume-paragraph
                            title="Laravel Nova | Jinora"
                            link="https://github.com/tylernathanreed/jira-nova"
                            content="Built to get developers out of deadline hell by forecasting expected completion times and raising flags weeks in advance of a missed commitment."
                            footer="<b>Skills:</b> Nova, JIRA, Statistics, Data Visualization, Caching"
                            meta="March 2019 - December 2020"
                        />

                        <resume-paragraph
                            title="C# | Contact Manager"
                            link="https://github.com/tylernathanreed/Academic-Projects/tree/master/C%23%20%26%20.NET"
                            content="Kept track of various contacts by storing data in a SQL Database. Stored procedures were used to manage addresses, phone numbers, etc."
                            footer="<b>Skills:</b> C#, MSSQL, Waterfall, SRS, Visual Studio"
                            meta="September 2013 - December 2013"
                        />

                        <!--
                        <resume-paragraph
                            title="Java | Constraint Satisfaction"
                            link="https://github.com/tylernathanreed/Academic-Projects/tree/master/Java/Constraint%20Satisfaction"
                            content="Solves a generalized Constraint Satisfaction Problem. The problem is solved using various heuristics and consistency procedures."
                            footer="<b>Skills:</b> Java, Eclipse, AI, Abstraction, Discrete Logic"
                            meta="February 2014 - March 2014"
                        />

                        <resume-paragraph
                            title="GML | Physics Sandbox"
                            link="http://steamcommunity.com/sharedfiles/filedetails/?id=131654659"
                            content="A sandbox-style gadget implementing Box2D physics. Included concave collisions and kinematic forces."
                            footer="<b>Skills:</b> GML, Box2D, Game Design, Physics"
                            meta="November 2012 -  April 2013"
                        />

                        <resume-paragraph
                            title="JS | Game Engine"
                            content="A 2D Canvas driven HTML5 platform providing object-based instances with an event-driven framework."
                            footer="<b>Skills:</b> JavaScript ES6, SOLID, Game Design"
                            meta="March 2016 - February 2017"
                        />
                        -->
                    </div>
                </section>

                <!-- Activities & Services -->
                <section class="mb-6">
                    <h2 class="text-center mb-3">Activities &amp; Services</h2>

                    <div class="row">
                        <resume-paragraph
                            title="Community Moderator"
                            content="Learned Agile-Programming, Version Control Systems, and programmed games using a wide spectrum of languages and tools."
                            footer="<b>Skills:</b> Leadership, Project Management, Git, Bitbucket"
                            meta="August 2014 - August 2018"
                        />

                        <resume-paragraph
                            title="Habitat for Humanity"
                            link="http://www.habitat.org/"
                            content="Worked in large groups to construct homes for those in need. Learned the value of teamwork. Project planning was observed."
                            footer="<b>Skills:</b> Leadership, Teamwork"
                            meta="August 2010 - May 2012'"
                            aside="60 Hours of Volunteer Work"
                        />
                    </div>
                </section>

                <!-- Footer -->
                <div class="mb-6">
                    <div class="text-center">
                        References available upon request
                    </div>
                </div>
            </article>
        </div>

        <!-- For the Road Section -->
        <banner-buttons :slots="2">
            <template v-slot:heading>
                For the Road
            </template>

            <template v-slot:button-1>
                <banner-button link="http://bit.ly/treed-resume-2020">
                    <template v-slot:button>
                        <i class="far fa-file-word mr-2"></i> Google Docs
                    </template>
                    If you need an electronic copy that you can save and modify as needed, please refer to my Resume listed on Google Docs.
                </banner-button>
            </template>

            <template v-slot:button-2>
               <banner-button link="/files/Resume - 2020.pdf">
                    <template v-slot:button>
                        <i class="far fa-file-pdf mr-2"></i> Download PDF
                    </template>
                    If you need a printed copy to take with you, please download the PDF version of my Resume.
                </banner-button>
            </template>
        </banner-buttons>
    </div>
</template>

<script>
    import _ from 'lodash'
    import BannerButton from '@/components/BannerButton'
    import BannerButtons from '@/components/BannerButtons'
    import ResumeSkills from '@/components/ResumeSkills'
    import ResumeParagraph from '@/components/ResumeParagraph'

    export default {
        metaInfo: { title: 'Resume' },
        components: {
            BannerButtons,
            BannerButton,
            ResumeSkills,
            ResumeParagraph
        },
        computed: {
            skills() {
                return {
                    'Languages & Technologies': [
                        {skill: 'PHP 7+',       year: 2015},
                        {skill: 'PHP 5.3+',     year: 2014},
                        {skill: 'JavaScript 5', year: 2013},
                        {skill: 'JavaScript 6', year: 2015},
                        {skill: 'MySQL',        year: 2012},
                        {skill: 'MSSQL',        year: 2013},
                        {skill: 'Sqlite',       year: 2017},
                        {skill: 'Eloquent',     year: 2014},
                        {skill: 'jQuery',       year: 2014},
                        {skill: 'NodeJS',       year: 2015},
                        {skill: 'Style CI',     year: 2017},
                        {skill: 'Travis CI',    year: 2017},
                        {skill: 'Blade',        year: 2014},
                        {skill: 'Sass',         year: 2015},
                        {skill: 'HTML 5',       year: 2014},
                        {skill: 'CSS 3',        year: 2014}
                    ],
                    'Paradigms & Principles': [
                        {skill: 'Caching',      year: 2015},
                        {skill: 'Optimization', year: 2016},
                        {skill: 'NoSQL',        year: 2017},
                        {skill: 'Memoize',      year: 2019},
                        {skill: 'SOLID',        year: 2015},
                        {skill: 'CI/CD',        year: 2017},
                        {skill: 'APIs',         year: 2015},
                        {skill: 'MVC',          year: 2014},
                        {skill: 'RESTful',      year: 2014},
                        {skill: 'CRUD',         year: 2013},
                        {skill: 'KISS',         year: 2014},
                        {skill: 'DRY',          year: 2012},
                        {skill: 'Delegation',   year: 2017},
                        {skill: 'TDD',          year: 2017},
                        {skill: 'LAMP',         year: 2014},
                        {skill: 'WAMP',         year: 2014},
                    ],
                    'Tools & Services': [
                        {skill: 'Git',        year: 2012},
                        {skill: 'GitHub',     year: 2012},
                        {skill: 'Bitbucket',  year: 2012},
                        {skill: 'SourceTree', year: 2012},
                        {skill: 'Composer',   year: 2014},
                        {skill: 'NPM',        year: 2015},
                        {skill: 'AWS',        year: 2017},
                        {skill: 'JIRA',       year: 2017},
                        {skill: 'Stripe',     year: 2015},
                        {skill: 'Redis',      year: 2017},
                        {skill: 'Mailgun',    year: 2015},
                        {skill: 'Twilio',     year: 2016},
                        {skill: 'PHP Storm',  year: 2017},
                        {skill: 'VS Code',    year: 2017},
                        {skill: 'Sublime',    year: 2014},
                        {skill: 'Vim',        year: 2012},
                    ],
                    'Frameworks & Standards': [
                        {skill: 'Laravel 6.x+', year: 2019},
                        {skill: 'Laravel 5.5',  year: 2017},
                        {skill: 'Laravel 5.1',  year: 2015},
                        {skill: 'Laravel 4.2',  year: 2014},
                        {skill: 'Lumen',        year: 2016},
                        {skill: 'Nova',         year: 2019},
                        {skill: 'Dusk',         year: 2018},
                        {skill: 'Telescope',    year: 2019},
                        {skill: 'Vue',          year: 2016},
                        {skill: 'Tailwind',     year: 2018},
                        {skill: 'Bootstrap 3',  year: 2014},
                        {skill: 'Bootstrap 4',  year: 2018},
                        {skill: 'PCI',          year: 2016},
                        {skill: 'PSR-12',       year: 2019},
                        {skill: 'Socialite',    year: 2019},
                        {skill: 'SSO',          year: 2019},
                    ]
                }
            }
        }
    }
</script>