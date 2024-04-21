<template>
    <div>
        <div class="container bg-white shadow-md font-serif overflow-auto px-md-4 py-4 my-4" style="max-width: 800px">
            <article class="px-4 d-flex flex-column gap-4">
                <header class="d-flex flex-column gap-2">
                    <!-- Name -->
                    <section>
                        <h1 class="fs-3 fw-bold text-center mb-0">Tyler Reed</h1>
                    </section>

                    <!-- Phone Number -->
                    <section>
                        <small class="d-block text-center">
                            Lead Software Engineer | 469.230.9970 | Dallas, TX
                        </small>
                    </section>

                    <!-- Links -->
                    <section class="text-center">
                        <div class="row align-items-center justify-content-center">
                            <div v-for="link in links" :key="link.name" class="col-md-6 col-12">
                                <h5 class="mb-0">
                                    <small class="text-black text-start w-100">
                                        <span>{{ link.name }}:</span>
                                        <a :href="link.href" class="text-decoration-none" v-text="link.label"></a>
                                    </small>
                                </h5>
                            </div>
                        </div>
                    </section>
                </header>

                <!-- Objective -->
                <section class="row">
                    <div class="col-md-3 d-flex align-items-center justify-content-center">
                        <h2 class="leading-loose mb-0 fs-4 fw-bold">Objective</h2>
                    </div>
                    <div class="col-md-9">
                        To secure a position where I can efficiently contribute my skills and abilities for the growth
                        of the organization and build my professional career, as well as learn new skills to expand my
                        abilities.
                    </div>
                </section>

                <!-- Summary -->
                <section class="row">
                    <div class="col-md-3 d-flex align-items-center justify-content-center">
                        <h2 class="leading-loose mb-0 fs-4 fw-bold">Summary</h2>
                    </div>
                    <div class="col-md-9">
                        Results-driven software engineer with a strong background in leadership and team management, and
                        guiding cross-functional teams to success. Proven track record of transforming legacy systems
                        into modern, scalable platforms.
                    </div>
                </section>

                <resume-skills :skills="skills" />
                <resume-section title="Professional Experience" :items="experience" />
                <resume-section title="Projects & Websites" :items="projects" />
                <resume-section title="Education & Certifications" :items="education" />
                <resume-section title="Activities & Services" :items="activities" />

                <!--
                <resume-paragraph
                    title="C++ | Internet Simulation"
                    link="https://github.com/tylernathanreed/Academic-Projects/tree/master/C%20%26%20C%2B%2B/Internet%20Simulation"
                    content="Simulates a network by having files as network channels. Realistically matches an actual network where nodes use different OSI Layers."
                    footer="<b>Skills:</b> Modularity, SRP, C/C++, Vim, Software Design"
                    meta="May 2014"
                />
                <resume-paragraph
                    title="C# | Contact Manager"
                    link="https://github.com/tylernathanreed/Academic-Projects/tree/master/C%23%20%26%20.NET"
                    content="Kept track of various contacts by storing data in a SQL Database. Stored procedures were used to manage addresses, phone numbers, etc."
                    footer="<b>Skills:</b> C#, MSSQL, Waterfall, SRS, Visual Studio"
                    meta="September 2013 - December 2013"
                />
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

                <!-- Footer -->
                <div class="mb-6">
                    <div class="text-center">
                        References available upon request
                    </div>
                </div>
            </article>
        </div>

        <!-- For the Road Section -->
        <banner-buttons :slots="3">
            <template v-slot:heading>
                For the Road
            </template>

            <template v-slot:button-1>
                <banner-button link="https://bit.ly/treed-resume-2024">
                    <template v-slot:button>
                        <i class="fab fa-google-drive mr-2"></i> Google Docs
                    </template>
                    If you need an electronic copy that you can save and modify as needed, please refer to my Resume
                    listed
                    on Google Docs.
                </banner-button>
            </template>

            <template v-slot:button-2>
                <banner-button link="/files/Resume - 2024.pdf">
                    <template v-slot:button>
                        <i class="far fa-file-pdf mr-2"></i> Download PDF
                    </template>
                    If you need a printed copy to take with you, please download the PDF version of my Resume.
                </banner-button>
            </template>

            <template v-slot:button-3>
                <banner-button link="/files/Resume - 2024.docx">
                    <template v-slot:button>
                        <i class="far fa-file-word mr-2"></i> Download Word
                    </template>
                    Don't want to convert the Google Doc to a Word Doc yourself? Download this version of my Resume.
                </banner-button>
            </template>
        </banner-buttons>
    </div>
</template>

<script>
import _ from 'lodash';
import BannerButton from '@/components/BannerButton';
import BannerButtons from '@/components/BannerButtons';
import ResumeSkills from '@/components/ResumeSkills';
import ResumeParagraph from '@/components/ResumeParagraph';
import ResumeSection from '@/components/ResumeSection';

export default {
    metaInfo: { title: 'Resume' },
    components: {
        BannerButtons,
        BannerButton,
        ResumeSkills,
        ResumeParagraph,
        ResumeSection
    },
    computed: {
        links() {
            return [
                {
                    'name': 'Email',
                    'icon': 'far fa-envelope',
                    'href': 'mailto:tylernathanreed@gmail.com',
                    'label': 'tylernathanreed@gmail.com'
                },
                {
                    'name': 'Website',
                    'icon': 'fas fa-globe',
                    'href': 'https://www.tylernathanreed.com',
                    'label': 'tylernathanreed.com'
                },
                {
                    'name': 'Linked In',
                    'icon': 'fab fa-linkedin',
                    'href': 'https://www.linkedin.com/in/tylernathanreed',
                    'label': 'linkedin.com/in/tylernathanreed'
                },
                {
                    'name': 'GitHub',
                    'icon': 'fab fa-github',
                    'href': 'https://www.github.com/tylernathanreed',
                    'label': 'github.com/tylernathanreed'
                },
            ];
        },
        experience() {
            return [
                {
                    title: 'Senior Software Engineer',
                    company: 'Eagle Metal Products',
                    url: 'https://eaglemetal.com/',
                    logo: 'eagle-metal',
                    type: 'Full Time',
                    start: 'May 2023',
                    end: null,
                    location: 'Mabank, TX',
                    commute: 'Hybrid',
                    description: [
                        'Improved team efficiency with best practices and project management insights.',
                        'Specialized in software agility, and increased the velocity of the team.',
                        'Created a platform for the team to share new ideas and be more proactive.',
                        'Boosted team cohesiveness with better reviews, peer coding, social events.',
                        'Modernized a legacy monolith admin panel to use PHP 8.3 & Laravel 10.',
                        'Migrated from Foundation to Tailwind, and jQuery to Vue.',
                    ],
                    skills: [
                        'Team Leadership',
                        'Software Architecture',
                        'Docker Containerization',
                        'Workforce Optimization',
                        'Data Analysis',
                    ]
                },
                {
                    title: 'Lead Software Engineer',
                    company: 'PWCC Marketplace',
                    url: 'https://www.pwccmarketplace.com/',
                    logo: 'pwcc',
                    type: 'Full Time',
                    start: 'Apr 2021',
                    end: 'May 2023',
                    location: 'Tigard, OR',
                    commute: 'Remote',
                    description: [
                        'Led multiple teams, including offshore, in project scope, timing, and delivery.',
                        'Built a robust auction platform using Laravel 9, Java, Node.js, and MariaDB.',
                        'Broke up monolithic software into scalable microservices with event streaming.',
                        'Leveraged AI and ML technologies to boost staff performance by over 600%.',
                        'Saved the company; designed and delivered an auction platform in 11 weeks.',
                        'Specialized in software stability, and reduced friction in software releases.',
                        'Advocated for team health, held leadership accountable for toxic practices, and promoted healthier approaches to our workflow.',

                    ],
                    skills: [
                        'Project Management',
                        'Microservices',
                        'Team Leadership',
                        'Mobile & REST APIs',
                        'Software Architecture',
                        'Workforce Optimization',
                        'Software Optimization',
                    ]
                },
                {
                    title: 'Senior Software Engineer',
                    company: 'TSI - Transworld Systems Inc.',
                    url: 'https://www.tsico.com/',
                    logo: 'tsi',
                    type: 'Full Time',
                    start: 'Mar 2018',
                    end: 'Apr 2021',
                    location: 'Dallas, TX',
                    commute: 'Hybrid',
                    description: [
                        'Led a team of developers to expand complex modules that I architected, including Notifications, Reports, Payments, Batch Processing, APIs, and more.',
                        'Absorbed from Halo Co and upgraded loan servicing software to Laravel 6.',
                        'Boosted the performance of the application using advanced MS SQL techniques, Redis caching, parallelization, and more.',
                        'Worked directly with stakeholders to obtain requirements and action items.',
                        'Spearheaded several projects and delivered projections on completion dates.',
                        'Advocated for team health, and helped others achieve successful careers.',
                    ],
                    skills: [
                        'Project Management',
                        'Team Leadership',
                        'Software Architecture',
                        'Data Analysis',
                        'Automated Notifications',
                        'Multi-Tenant Management',
                        'Cyber Security',
                    ]
                },
                {
                    title: 'Senior Software Engineer',
                    company: 'Halo Companies Inc.',
                    url: 'http://www.haloco.com/',
                    logo: 'haloco',
                    type: 'Full Time',
                    start: 'Jun 2016',
                    end: 'Mar 2018',
                    location: 'Dallas, TX',
                    commute: 'On-site',
                    description: [
                        'Designed and maintained complex student loan servicing software in Laravel 5.',
                        'Created several robust architectures, including Notifications, Reports, and APIs.',
                        'Optimized our nightly cron processes to run an order of magnitude faster.',
                        'Advocated for the advancement and growth of team members.',
                        'Trained and mentored the team on better software practices.',
                    ],
                    skills: [
                        'Leadership',
                        'Software Design',
                        'Data Analysis',
                        'AWS Cloud Computing',
                    ]
                },
                {
                    title: 'Full Stack Developer',
                    company: 'Bible.org',
                    url: 'http://bible.org',
                    logo: 'bible-org',
                    type: 'Full Time',
                    start: 'Jan 2015',
                    end: 'Mar 2016',
                    location: 'Richardson, TX',
                    commute: 'Hybrid',
                    description: [
                        'Designed and implemented a social website for outreach and communion.',
                        'Built a mobile-first website using Laravel 5, Bootstrap, and jQuery.',
                        'Documented software vision and operated using TDD.',
                        'Enhanced main site search using Solr and data analysis.',
                    ],
                    skills: [
                        'Software Design',
                        'Automated Testing',
                        'Tenacious Work Ethic',
                    ]
                },
                {
                    title: 'Software Engineer',
                    company: 'Epimed International',
                    url: 'http://www.epimedpain.com/',
                    logo: 'epimed',
                    type: 'Contract',
                    start: 'Sep 2014',
                    end: 'Dec 2014',
                    location: 'Farmers Branch, TX',
                    commute: 'Remote',
                    description: [
                        'Built an internal admin panel to replace the existing analog on-paper solution.',
                        'Developed a mobile - first website using Laravel 4, Bootstrap, and MySQL.',
                        'Led a team of three developers.',
                    ],
                    skills: [
                        'Team Leadership',
                        'Database Design',
                    ]
                },
                {
                    title: 'Game Design Instructor',
                    company: 'University of Texas at Dallas',
                    url: 'https://k12.utdallas.edu/',
                    logo: 'game-maker-studio',
                    type: 'Contract',
                    start: 'Jun 2013',
                    end: 'Jan 2015',
                    location: 'Richardson, TX',
                    commute: 'On-site',
                    description: [
                        'Taught K-12 students how to program/design games with my own curriculum.',
                        'Developed several 2D games using Game Maker Studio.',
                    ],
                    skills: [
                        'Teaching',
                    ]
                }
            ];
        },
        projects() {
            return [
                {
                    title: 'Laravel Relation Joins',
                    company: 'reedware/laravel-relation-joins',
                    url: 'https://packagist.org/packages/reedware/laravel-relation-joins',
                    logo: 'laravel-relation-joins',
                    type: 'Software Package',
                    start: 'Aug 2019',
                    end: null,
                    location: 'GitHub & Packagist',
                    commute: 'Remote',
                    description: [
                        'Composer package that adds the ability to join on a relation by name.',
                        'Over 500,000 downloads. Supports latest Laravel & PHP versions.',
                    ],
                    skills: [
                        'GitHub Actions & CI/CD',
                    ]
                },
                {
                    title: 'One Time Secrets',
                    company: 'onetime.tylernathanreed.com',
                    url: 'https://onetime.tylernathanreed.com',
                    logo: 'onetime-secrets',
                    type: 'Website',
                    start: 'Apr 2021',
                    end: null,
                    location: 'AWS & Laravel Forge',
                    commute: 'Remote',
                    description: [
                        'Website that throws everything I know about performance into one project.',
                        'Page speeds are as low as ~1.8 milliseconds.',
                    ],
                    skills: [
                        'Laravel Octane & Swoole',
                    ]
                },
                {
                    title: 'Jinora',
                    company: 'TSI Admin Panel',
                    url: null,
                    logo: 'jinora',
                    type: 'Website',
                    start: 'May 2019',
                    end: 'Apr 2021',
                    location: 'Raspberry PI & Laravel Sail',
                    commute: 'Hybrid',
                    description: [
                        'Laravel Nova Admin Panel sourced using Jira API.',
                        'Got developers out of deadline hell by forecasting velocity.',
                    ],
                    skills: [
                        'Project Management',
                    ]
                },
            ];
        },
        education() {
            return [
                {
                    title: 'Bachelors in Computer Science',
                    company: 'University of Texas at Dallas',
                    url: 'http://www.utdallas.edu/',
                    logo: 'utdallas',
                    type: 'Full Time',
                    end: 'Aug 2015',
                    location: 'Dallas, TX',
                    commute: 'On-site',
                },
                {
                    title: 'Associates in Science',
                    company: 'Richland Collegiate High School',
                    url: 'http://richlandcollege.edu/rchs/',
                    logo: 'rchs',
                    type: 'Full Time',
                    end: 'May 2011',
                    location: 'Richardson, TX',
                    commute: 'On-site',
                },
                {
                    title: 'Microsoft Technology Associate',
                    company: 'Microsoft',
                    url: 'https://support.microsoft.com/en-us/topic/earn-a-microsoft-technology-associate-mta-certification-357215d0-31ce-0620-feba-1bb60165b770',
                    logo: 'mta',
                    end: 'Jun 2014',
                    location: 'Online',
                    commute: 'Remote',
                }
            ];
        },
        activities() {
            return [
                {
                    title: 'Moderator',
                    company: 'r/laravel',
                    url: 'https://www.reddit.com/r/laravel/',
                    logo: 'r-laravel',
                    type: 'Volunteer',
                    start: 'Nov 2022',
                    location: 'Online',
                    commute: 'Remote',
                    description: [
                        'Actively maintained the Laravel subreddit.',
                        'Stayed on top of the latest trends.',
                    ],
                },
                {
                    title: 'Moderator',
                    company: 'scatteredspace.com',
                    url: 'http://scatteredspace.com',
                    logo: 'scattered-space',
                    type: 'Volunteer',
                    start: 'Aug 2014',
                    end: 'Aug 2018',
                    location: 'Online',
                    commute: 'Remote',
                    description: [
                        'Led game modding community.',
                        'Programmed games using various languages.',
                    ],
                },
            ];
        },
        skills() {
            return [
                { skill: 'Project Management', year: 2018 },
                { skill: 'Microservices', year: 2018 },
                { skill: 'Workforce Optimization', year: 2021 },
                { skill: 'APIs', year: 2015 },
                { skill: 'Agile', year: 2016 },
                { skill: 'Laravel', year: 2014 },
                { skill: 'Team Leadership', year: 2014 },
                { skill: 'Distributed Systems', year: 2016 },
                { skill: 'Software Optimization', year: 2016 },
                { skill: 'Artificial Intelligence', year: 2015 },
                { skill: 'Software Design', year: 2015 },
                { skill: 'Vue', year: 2016 },
                { skill: 'Training & Mentoring', year: 2016 },
                { skill: 'Containerization', year: 2021 },
                { skill: 'Software Architecture', year: 2018 },
                { skill: 'Machine Learning', year: 2021 },
                { skill: 'Notifications', year: 2016 },
                { skill: 'Tailwind', year: 2018 },
                { skill: 'Technical Communication', year: 2015 },
                { skill: 'CI/CD', year: 2017 },
                { skill: 'Relational Databases', year: 2015 },
                { skill: 'Payment Processing', year: 2015 },
                { skill: 'Automated Testing', year: 2018 },
                { skill: 'AWS', year: 2017 },

                // { skill: 'BDD', year: 2021 },
                // { skill: 'Bitbucket', year: 2012 },
                // { skill: 'Bootstrap 3',  year: 2014},
                // { skill: 'Bootstrap 4',  year: 2018},
                // { skill: 'Bootstrap', year: 2014 },
                // { skill: 'CRUD',            year: 2013},
                // { skill: 'Caching',        year: 2015},
                // { skill: 'Code Review', year: 2016 },
                // { skill: 'Composer', year: 2014 },
                // { skill: 'DRY', year: 2012 },
                // { skill: 'Delegation', year: 2017 },
                // { skill: 'Dev Lead', year: 2018 },
                // { skill: 'Docker', year: 2021 },
                // { skill: 'Dusk',         year: 2018},
                // { skill: 'Estimation', year: 2012 },
                // { skill: 'Feature Flags', year: 2021 },
                // { skill: 'Forge', year: 2021 },
                // { skill: 'Full Stack', year: 2015 },
                // { skill: 'Git', year: 2012 },
                // { skill: 'GitFlow', year: 2020 },
                // { skill: 'GitHub', year: 2012 },
                // { skill: 'HTML/CSS', year: 2014 },
                // { skill: 'JIRA', year: 2017 },
                // { skill: 'JavaScript', year: 2013 },
                // { skill: 'KISS',            year: 2014},
                // { skill: 'Kanban', year: 2016 },
                // { skill: 'LAMP',            year: 2014},
                // { skill: 'LEAN', year: 2020 },
                // { skill: 'Laravel 4.2',  year: 2014},
                // { skill: 'Laravel 5.1',  year: 2015},
                // { skill: 'Laravel 5.5',  year: 2017},
                // { skill: 'Laravel 6.x+', year: 2019},
                // { skill: 'Layering', year: 2016 },
                // { skill: 'Lumen',        year: 2016},
                // { skill: 'Lumen', year: 2016 },
                // { skill: 'MSSQL', year: 2013 },
                // { skill: 'MVC', year: 2014 },
                // { skill: 'Mailgun', year: 2015 },
                // { skill: 'Memoize',         year: 2019},
                // { skill: 'MySQL', year: 2012 },
                // { skill: 'NPM', year: 2015 },
                // { skill: 'NoSQL',           year: 2017},
                // { skill: 'NodeJS', year: 2015 },
                // { skill: 'Nova',         year: 2019},
                // { skill: 'Octane', year: 2021 },
                // { skill: 'PCI',          year: 2016},
                // { skill: 'PHP', year: 2014 },
                // { skill: 'PSR-12',       year: 2019},
                // { skill: 'Parallelization', year: 2014 },
                // { skill: 'RESTful',         year: 2014},
                // { skill: 'Redis', year: 2017 },
                // { skill: 'SOLID', year: 2015 },
                // { skill: 'SSO',          year: 2019},
                // { skill: 'Sail', year: 2021 },
                // { skill: 'Sass',         year: 2015},
                // { skill: 'Scrum Master', year: 2021 },
                // { skill: 'Scrum', year: 2016 },
                // { skill: 'Sendgrid', year: 2020 },
                // { skill: 'Senior Dev', year: 2016 },
                // { skill: 'Singleton', year: 2016 },
                // { skill: 'Socialite',    year: 2019},
                // { skill: 'SourceTree', year: 2012 },
                // { skill: 'Sqlite', year: 2017 },
                // { skill: 'Strangler', year: 2016 },
                // { skill: 'Strategy', year: 2016 },
                // { skill: 'Stripe', year: 2015 },
                // { skill: 'Style CI',     year: 2017},
                // { skill: 'TDD', year: 2017 },
                // { skill: 'Tailwind',     year: 2018},
                // { skill: 'Telescope',    year: 2019},
                // { skill: 'Travis CI',    year: 2017},
                // { skill: 'Twilio', year: 2016 },
                // { skill: 'VCS', year: 2012 },
                // { skill: 'WAMP',            year: 2014},
                // { skill: 'Waterfall', year: 2012 },
                // { skill: 'jQuery', year: 2014 },
            ]
        }
    }
}
</script>
