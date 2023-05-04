"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[401],{8544:(t,e,a)=>{a.d(e,{Z:()=>i});const s={props:{link:String,inertia:{type:Boolean,default:!1}}};const i=(0,a(1900).Z)(s,(function(){var t=this,e=t._self._c;return e("div",{staticClass:"d-flex flex-column h-100"},[e("p",{staticClass:"lead flex-1"},[t._t("default")],2),t._v(" "),e("div",{staticClass:"text-center mt-3"},[e(t.inertia?"inertia-link":"a",{tag:"component",staticClass:"btn btn-xl btn-outline-light text-nowrap w-75",attrs:{href:t.link}},[t._t("button")],2)],1)])}),[],!1,null,null,null).exports},4802:(t,e,a)=>{a.d(e,{Z:()=>i});const s={props:{slots:Number}};const i=(0,a(1900).Z)(s,(function(){var t=this,e=t._self._c;return e("section",{staticClass:"page-section bg-primary text-white mb-0 leading-normal"},[e("div",{staticClass:"container"},[e("h2",{staticClass:"page-section-heading text-center text-uppercase text-white"},[t._t("heading")],2),t._v(" "),t._m(0),t._v(" "),e("div",{staticClass:"row justify-content-center"},t._l(t.slots,(function(a){return e("div",{key:a,staticClass:"col-lg-4 mb-16",staticStyle:{"max-width":"400px"}},[t._t("button-".concat(a))],2)})),0)])])}),[function(){var t=this,e=t._self._c;return e("div",{staticClass:"divider-custom divider-light"},[e("div",{staticClass:"divider-custom-line"}),t._v(" "),e("div",{staticClass:"divider-custom-icon"},[e("i",{staticClass:"fas fa-star"})]),t._v(" "),e("div",{staticClass:"divider-custom-line"})])}],!1,null,null,null).exports},4401:(t,e,a)=>{a.r(e),a.d(e,{default:()=>m});a(6486);var s=a(8544),i=a(4802);const l={props:{groups:Object},methods:{_chunk:function(t,e){return _.chunk(t,e)},age:function(t){return Math.max((new Date).getFullYear()-t,0)+((new Date).getMonth()>=5?1:0)},calc:function(t){for(var e=this.legend,a=0;a<e.length;a++){var s=e[a];if(null==s.min&&t<=s.max)return s.color;if(null==s.max&&t>=s.min)return s.color;if(s.min&&s.max&&t>=s.min&&t<=s.max)return s.color}return"black"},legendValue:function(t){return null==t.min?"< ".concat(t.max+1," year")+(0!=t.max?"s":""):null==t.max?"".concat(t.min,"+ years"):"".concat(t.min," - ").concat(t.max," years")}},computed:{legend:function(){return[{color:"blue",min:6,max:null},{color:"green",min:3,max:5},{color:"yellow",min:1,max:2},{color:"red",min:null,max:0}]}}};var r=a(1900);const n=(0,r.Z)(l,(function(){var t=this,e=t._self._c;return e("section",{staticClass:"mb-6"},[e("h2",{staticClass:"text-center"},[t._v("Programming Skills")]),t._v(" "),e("div",{staticClass:"row"},t._l(t.groups,(function(a,s){return e("div",{key:s,staticClass:"col-md-6"},[e("h3",{staticClass:"text-center mb-3"},[t._v(t._s(s))]),t._v(" "),e("table",{staticClass:"text-center mx-auto mb-4 w-100 table-fixed"},[e("tbody",t._l(t._chunk(a,4),(function(a){return e("tr",t._l(a,(function(a){return e("td",{class:"bg-".concat(t.calc(t.age(a.year))," text-white py-1")},[t._v("\n                            "+t._s(a.skill)+"\n                        ")])})),0)})),0)])])})),0),t._v(" "),e("div",{staticClass:"skill-legend"},t._l(t.legend,(function(a){return e("div",{key:a.color,staticClass:"skill-legend-item"},[e("div",{class:"skill-legend-key bg-".concat(a.color)}),t._v(" "),e("span",{staticClass:"skill-legend-value"},[t._v("\n                "+t._s(t.legendValue(a))+"\n            ")])])})),0)])}),[],!1,null,null,null).exports;const o={props:{title:String,subtitle:String,link:String,content:String,footer:String,meta:String,aside:String}};const c=(0,r.Z)(o,(function(){var t=this,e=t._self._c;return e("div",{staticClass:"col-md-6"},[e("div",{staticClass:"mx-auto mb-6 last-2:mb-0",staticStyle:{"max-width":"400px"}},[e("h3",{staticClass:"mb-1",attrs:{role:t.link?"link":null}},[t.link?e("a",{attrs:{target:"_blank",href:t.link}},[e("div",{staticClass:"heading-title",domProps:{innerHTML:t._s(t.title)}})]):e("div",{staticClass:"heading-title",domProps:{innerHTML:t._s(t.title)}})]),t._v(" "),t.subtitle?e("small",{staticClass:"text-gray",domProps:{innerHTML:t._s(t.subtitle)}}):t._e(),t._v(" "),e("p",{staticClass:"mt-2",domProps:{innerHTML:t._s(t.content)}}),t._v(" "),t.footer?e("p",{staticClass:"small mt-2",domProps:{innerHTML:t._s(t.footer)}}):t._e(),t._v(" "),t.meta?e("small",{staticClass:"block mt-3"},[e("span",{domProps:{innerHTML:t._s(t.meta)}}),t._v(" "),t.aside?e("span",{staticClass:"float-right",domProps:{innerHTML:t._s(t.aside)}}):t._e()]):t._e()])])}),[],!1,null,null,null).exports,u={metaInfo:{title:"Resume"},components:{BannerButtons:i.Z,BannerButton:s.Z,ResumeSkills:n,ResumeParagraph:c},computed:{skills:function(){return{"Languages & Frameworks":[{skill:"PHP",year:2014},{skill:"JavaScript",year:2013},{skill:"HTML/CSS",year:2014},{skill:"jQuery",year:2014},{skill:"MySQL",year:2012},{skill:"MSSQL",year:2013},{skill:"Sqlite",year:2017},{skill:"NodeJS",year:2015},{skill:"Laravel",year:2014},{skill:"Lumen",year:2016},{skill:"Nova",year:2019},{skill:"Dusk",year:2018},{skill:"Octane",year:2021},{skill:"Vue",year:2016},{skill:"Tailwind",year:2018},{skill:"Bootstrap",year:2014}],"Patterns & Principles":[{skill:"TDD",year:2017},{skill:"BDD",year:2021},{skill:"SOLID",year:2015},{skill:"CI/CD",year:2017},{skill:"Microservices",year:2018},{skill:"APIs",year:2015},{skill:"MVC",year:2014},{skill:"DRY",year:2012},{skill:"Parallelization",year:2014},{skill:"Strangler",year:2016},{skill:"Delegation",year:2017},{skill:"Strategy",year:2016},{skill:"Feature Flags",year:2021},{skill:"Singleton",year:2016},{skill:"Optimization",year:2016},{skill:"Layering",year:2016}],"Tools & Services":[{skill:"Git",year:2012},{skill:"GitHub",year:2012},{skill:"Bitbucket",year:2012},{skill:"SourceTree",year:2012},{skill:"Composer",year:2014},{skill:"NPM",year:2015},{skill:"AWS",year:2017},{skill:"JIRA",year:2017},{skill:"Stripe",year:2015},{skill:"Redis",year:2017},{skill:"Mailgun",year:2015},{skill:"Twilio",year:2016},{skill:"Docker",year:2021},{skill:"Forge",year:2021},{skill:"Sail",year:2021},{skill:"Sendgrid",year:2020}],"Processes & Responsibilities":[{skill:"Agile",year:2016},{skill:"Scrum",year:2016},{skill:"Kanban",year:2016},{skill:"GitFlow",year:2020},{skill:"QA Automation",year:2018},{skill:"LEAN",year:2020},{skill:"VCS",year:2012},{skill:"Waterfall",year:2012},{skill:"Scrum Master",year:2021},{skill:"Estimation",year:2012},{skill:"Architect",year:2018},{skill:"Training",year:2016},{skill:"Code Review",year:2016},{skill:"Dev Lead",year:2018},{skill:"Senior Dev",year:2016},{skill:"Full Stack",year:2015}]}}}};const m=(0,r.Z)(u,(function(){var t=this,e=t._self._c;return e("div",[e("div",{staticClass:"container bg-white shadow-md font-serif overflow-auto pt-3 mt-4 mb-4",staticStyle:{"max-width":"800px"}},[e("article",{staticClass:"px-4"},[t._m(0),t._v(" "),t._m(1),t._v(" "),t._m(2),t._v(" "),t._m(3),t._v(" "),e("resume-skills",{attrs:{groups:t.skills}}),t._v(" "),e("section",{staticClass:"mb-6"},[e("h2",{staticClass:"text-center mb-3"},[t._v("Education & Certifications")]),t._v(" "),e("div",{staticClass:"row"},[e("resume-paragraph",{attrs:{title:"University of Texas at Dallas",link:"http://www.utdallas.edu/",content:"Bachelors in Computer Science",footer:"<b>Courses:</b> Algorithms, AI, Prob & Stats, Security, Networking, OS, Discrete Math",meta:"Awarded: August 2015"}}),t._v(" "),e("resume-paragraph",{attrs:{title:"Richland Collegiate High School",link:"http://richlandcollege.edu/rchs/",content:"Associates in Science",footer:"<b>Courses:</b> C/C++",meta:"Awarded: May 2011"}}),t._v(" "),e("resume-paragraph",{attrs:{title:"Microsoft Technology Associate",link:"https://www.microsoft.com/en-us/learning/mta-certification.aspx",content:"Awarded for the ability to understand and explain fundamental concepts of Software Development.",footer:"<b>Tech:</b> Database, Development, IT Infrastructure",meta:"Awarded: June 2014"}})],1)]),t._v(" "),e("section",{staticClass:"mb-6"},[e("h2",{staticClass:"text-center mb-3"},[t._v("Employment & Internships")]),t._v(" "),e("div",{staticClass:"row"},[e("resume-paragraph",{attrs:{title:"PWCC Marketplace",subtitle:"Lead Sr. Software Developer",link:"https://www.pwccmarketplace.com/",content:"Built a robust auction platform. Broke up a monolithic code base into scalable microservices that used event streaming. Lead multiple teams, including offshore.",footer:"<b>Skills:</b> Laravel 7.x - 9.x, PHP 8.1, JavaScript, MySql, Vue, Twilio, SendGrid, Laravel Octane, Node.js, Java, Microservices, Redis",meta:"April 2021 - April 2023"}}),t._v(" "),e("resume-paragraph",{attrs:{title:"Transworld Systems Inc.",subtitle:"Senior Software Developer",link:"https://www.tsico.com/",content:"Continued developing software from Halo Co. Responsibilities expanded into leading a team on optimization, bulk imports, data extraction, and more.",footer:"<b>Skills:</b> Laravel 5.1 - 6.x, PHP 7.2, JavaScript, MSSQL, SSO, Tailwind, Unit Testing, JIRA, NPM, NoSQL",meta:"March 2018 - April 2021"}}),t._v(" "),e("resume-paragraph",{attrs:{title:"Halo Companies Inc.",subtitle:"Senior Software Developer",link:"http://www.haloco.com/",content:"Built a loan servicing software and borrower portal using the Laravel 5.1 Framework. Built architectures such as notifications, nightlies, and payments.",footer:"<b>Skills:</b> Laravel 5.1, PHP 5.3, PHP 7.1, JavaScript, MSSQL, Mailgun, Twilio, Queues, PCI, Bootstrap, APIs, AWS",meta:"June 2016 - March 2018"}}),t._v(" "),e("resume-paragraph",{attrs:{title:"Bible.org",subtitle:"Full-Stack Web Developer",link:"http://www.bible.org/",content:"Built a custom site from scratch using the Laravel 5.1 and then 5.2 Framework. Used a mobile-first design, and operated using TDD.",footer:"<b>Skills:</b> Laravel 5.1, Laravel 5.2, PHP 5.3, JavaScript, Stripe, MySQL, Bootstrap, TDD, WAMP",meta:"January 2015 - May 2016"}}),t._v(" "),e("resume-paragraph",{attrs:{title:"Epimed International",subtitle:"Contract Programmer | Backend Designer",link:"http://www.epimedpain.com/",content:"Replaced an analog paper system with a digital one. The implementation yielded a mobile-ready application using the Laravel 4 framework.",footer:"<b>Skills:</b> Laravel 4.2, PHP 5.3, JavaScript, MySQL, Bootstrap, Git, SourceTree, Composer, LAMP",meta:"September 2014 - December 2014"}}),t._v(" "),e("resume-paragraph",{attrs:{title:"STEAM Camp | UTD",subtitle:"Game Design Professor",link:"http://www.utdallas.edu/k12/summer/",content:"Taught K-12 Students how to program and design games in an Agile environment using Game Maker Software. Created the curriculum.",footer:"<b>Skills:</b> Communication, Leadership, Teaching, Flexibility, Documentation, SOLID, MVC, OOP, DRY, KISS",meta:"June 2013 - August 2013, June 2014 - August 2014"}})],1)]),t._v(" "),e("section",{staticClass:"mb-6"},[e("h2",{staticClass:"text-center mb-3"},[t._v("Projects & Websites")]),t._v(" "),e("div",{staticClass:"row"},[e("resume-paragraph",{attrs:{title:"Laravel | Personal Website",link:"http://www.tylernathanreed.com/",content:"My personal website, home to all of my various projects, packages, and other programming toys. Always uses latest software and principals.",footer:"<b>Skills:</b> Laravel 5.1 to 8.x, Tailwind, Composer, NPM, Yarn",meta:"November 2014 - Current"}}),t._v(" "),e("resume-paragraph",{attrs:{title:"Laravel | One Time Secrets",link:"https://onetime.tylernathanreed.com",content:"A small passion project that throws everything I know about performance into one project. Page speeds are as low as ~1.8 <i>milliseconds</i>.",footer:"<b>Skills:</b> Laravel 8.x, Laravel Octane",meta:"April 2021"}}),t._v(" "),e("resume-paragraph",{attrs:{title:"Laravel | Relation Joins",link:"https://github.com/tylernathanreed/laravel-relation-joins",content:"Created a composer package adds the ability to join on a relationship by name. Currently has over 250k downloads. Supports latest Laravel & PHP versions.",footer:"<b>Skills:</b> Laravel, Composer, GitHub Actions, Style CI, Code Coverage",meta:"August 2019 - Current"}}),t._v(" "),e("resume-paragraph",{attrs:{title:"Laravel Nova | Jinora",link:"https://github.com/tylernathanreed/jira-nova",content:"Built to get developers out of deadline hell by forecasting expected completion times and raising flags weeks in advance of a missed commitment.",footer:"<b>Skills:</b> Nova, JIRA, Statistics, Data Visualization, Caching",meta:"March 2019 - December 2020"}})],1)]),t._v(" "),e("section",{staticClass:"mb-6"},[e("h2",{staticClass:"text-center mb-3"},[t._v("Activities & Services")]),t._v(" "),e("div",{staticClass:"row"},[e("resume-paragraph",{attrs:{title:"r/laravel Moderator",link:"https://www.reddit.com/r/laravel/",content:"Actively maintained the Laravel subreddit as an official Moderator, and stayed on top of latest trends. Informed community of new releases and products.",footer:"<b>Skills:</b> Leadership, Content Management, Ban Hammering",meta:"November 2022 - Current"}}),t._v(" "),e("resume-paragraph",{attrs:{title:"Community Moderator",content:"Learned Agile-Programming, Version Control Systems, and programmed games using a wide spectrum of languages and tools.",footer:"<b>Skills:</b> Leadership, Project Management, Git, Bitbucket",meta:"August 2014 - August 2018"}})],1)]),t._v(" "),t._m(4)],1)]),t._v(" "),e("banner-buttons",{attrs:{slots:3},scopedSlots:t._u([{key:"heading",fn:function(){return[t._v("\n            For the Road\n        ")]},proxy:!0},{key:"button-1",fn:function(){return[e("banner-button",{attrs:{link:"https://bit.ly/treed-resume-2023"},scopedSlots:t._u([{key:"button",fn:function(){return[e("i",{staticClass:"fab fa-google-drive mr-2"}),t._v(" Google Docs\n                ")]},proxy:!0}])},[t._v("\n                If you need an electronic copy that you can save and modify as needed, please refer to my Resume listed on Google Docs.\n            ")])]},proxy:!0},{key:"button-2",fn:function(){return[e("banner-button",{attrs:{link:"/files/Resume - 2023.pdf"},scopedSlots:t._u([{key:"button",fn:function(){return[e("i",{staticClass:"far fa-file-pdf mr-2"}),t._v(" Download PDF\n                ")]},proxy:!0}])},[t._v("\n                If you need a printed copy to take with you, please download the PDF version of my Resume.\n            ")])]},proxy:!0},{key:"button-3",fn:function(){return[e("banner-button",{attrs:{link:"/files/Resume - 2023.docx"},scopedSlots:t._u([{key:"button",fn:function(){return[e("i",{staticClass:"far fa-file-word mr-2"}),t._v(" Download Word\n                ")]},proxy:!0}])},[t._v("\n                Don't want to convert the Google Doc to a Word Doc yourself? Download this version of my Resume.\n            ")])]},proxy:!0}])})],1)}),[function(){var t=this._self._c;return t("section",[t("h1",{staticClass:"text-center"},[this._v("Tyler Reed")])])},function(){var t=this._self._c;return t("section",{staticClass:"mb-4"},[t("small",{staticClass:"d-block text-center"},[this._v("\n                    469.230.9970 | Dallas, TX\n                ")])])},function(){var t=this,e=t._self._c;return e("section",{staticClass:"text-center mb-3 md:mb-6"},[e("div",{staticClass:"row"},[e("div",{staticClass:"col-md-6"},[e("div",{staticClass:"mb-3"},[e("span",[t._v("Email:")]),t._v(" "),e("a",{attrs:{href:"mailto:tylernathanreed@gmail.com"}},[t._v("tylernathanreed@gmail.com")])])]),t._v(" "),e("div",{staticClass:"col-md-6"},[e("div",{staticClass:"mb-3"},[e("span",[t._v("Website:")]),t._v(" "),e("a",{attrs:{href:"//www.tylernathanreed.com"}},[t._v("www.tylernathanreed.com")])])]),t._v(" "),e("div",{staticClass:"col-md-6"},[e("div",{staticClass:"mb-3"},[e("span",[t._v("Linked In:")]),t._v(" "),e("a",{attrs:{href:"//www.linkedin.com/in/tylernathanreed"}},[t._v("www.linkedin.com/in/tylernathanreed")])])]),t._v(" "),e("div",{staticClass:"col-md-6"},[e("div",{staticClass:"mb-3"},[e("span",[t._v("GitHub:")]),t._v(" "),e("a",{attrs:{href:"//www.github.com/tylernathanreed"}},[t._v("www.github.com/tylernathanreed")])])])])])},function(){var t=this,e=t._self._c;return e("section",{staticClass:"row mb-6"},[e("h2",{staticClass:"col-md-3 leading-loose mb-0 text-center"},[t._v("Objective")]),t._v(" "),e("p",{staticClass:"col-md-9"},[t._v("\n                    To secure a position where I can efficiently contribute my skills and abilities for the growth of the organization and build my professional career, as well as learn new skills to expand my abilities.\n                ")])])},function(){var t=this._self._c;return t("div",{staticClass:"mb-6"},[t("div",{staticClass:"text-center"},[this._v("\n                    References available upon request\n                ")])])}],!1,null,null,null).exports}}]);
//# sourceMappingURL=401.js.map?id=e2cb8f36b44187b8