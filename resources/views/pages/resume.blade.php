@extends('layouts.app')

@section('title')
	Tyler Reed | Resume
@endsection

@push('head')
	<style>
		body {
			background-color: #eee;
		}

		section .row .col-md-6:last-child .last-2\:mb-0 {
		    margin-bottom: 0;
		}

		@media(min-width: 768px) {
			section .row .col-md-6:nth-last-child(2):nth-child(odd) .last-2\:mb-0 {
			    margin-bottom: 0;
			}
		}
	</style>
@endpush

@section('content')

	<article class="container px-4 mx-auto font-serif bg-white overflow-auto shadow-md" style="max-width: 800px">
		<!-- Name -->
		<section>
			<h1 class="text-center">Tyler Reed</h1>
		</section>

		<!-- Phone Number -->
		<section class="mb-4">
			<small class="block text-center">
				469.230.9970 | Dallas, TX
			</small>
		</section>

		<!-- Links -->
		<section class="text-center mb-3 md:mb-6">
			<div class="row">
				<div class="col-md-6">
					<div class="mb-3 last-2:mb-0">
						<span>Email:</span>
						<a href="mailto:tylernathanreed@gmail.com">tylernathanreed@gmail.com</a>
					</div>
				</div>

				<div class="col-md-6">
					<div class="mb-3 last-2:mb-0">
						<span>Website:</span>
						<a href="//www.tylernathanreed.com">www.tylernathanreed.com</a>
					</div>
				</div>

				<div class="col-md-6">
					<div class="mb-3 last-2:mb-0">
						<span>Linked In:</span>
						<a href="//www.linkedin.com/in/tylernathanreed">www.linkedin.com/in/tylernathanreed</a>
					</div>
				</div>

				<div class="col-md-6">
					<div class="mb-3 last-2:mb-0">
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

		<!-- Skills -->
		@include('partials.skills', [
			'groups' => [
				'Languages & Technologies' => [
					'PHP 7+' => 2015,
					'PHP 5.3+' => 2014,
					'JavaScript 5' => 2013,
					'JavaScript 6' => 2015,
					'MySQL' => 2012,
					'MSSQL' => 2013,
					'Sqlite' => 2017,
					'Eloquent' => 2014,
					'jQuery' => 2014,
					'NodeJS' => 2015,
					'Style CI' => 2017,
					'Travis CI' => 2017,
					'Blade' => 2014,
					'Sass' => 2015,
					'HTML 5' => 2014,
					'CSS 3' => 2014
				],
				'Paradigms & Principles' => [
					'Caching' => 2015,
					'SOLID' => 2016,
					'NoSQL' => 2017,
					'Memoize' => 2019,
					'OOP' => 2011,
					'APIs' => 2015,
					'ORM' => 2014,
					'MVC' => 2014,
					'RESTful' => 2014,
					'CRUD' => 2013,
					'TDD' => 2017,
					'DRY' => 2012,
					'Unit Testing' => 2016,
					'KISS' => 2013,
					'LAMP' => 2014,
					'WAMP' => 2014,
				],
				'Tools & Services' => [
					'Git' => 2012,
					'GitHub' => 2012,
					'Bitbucket' => 2012,
					'SourceTree' => 2012,
					'Composer' => 2014,
					'NPM' => 2015,
					'Yarn' => 2016,
					'SVN' => 2016,
					'Stripe' => 2015,
					'Redis' => 2017,
					'Mailgun' => 2015,
					'Twilio' => 2016,
					'AWS' => 2017,
					'JIRA' => 2017,
					'Sublime' => 2014,
					'Vim' => 2012,
				],
				'Frameworks & Standards' => [
					'Laravel 5.6+' => 2018,
					'Laravel 5.5' => 2017,
					'Laravel 5.1' => 2015,
					'Laravel 4.2' => 2014,
					'Lumen' => 2016,
					'Nova' => 2018,
					'Dusk' => 2017,
					'Telescope' => 2018,
					'Vue' => 2016,
					'Tailwind' => 2018,
					'Bootstrap 3' => 2014,
					'Bootstrap 4' => 2018,
					'PCI' => 2016,
					'PSR-2' => 2016,
					'JWT' => 2019,
					'SSO' => 2019,
				]
			]
		])

		<!-- Education & Certifications -->
		<section class="mb-6">
			<h2 class="text-center">Education &amp; Certifications</h2>

			<div class="row">
				{!! Form::paragraph([
					'title' => 'University of Texas at Dallas',
					'link' => 'http://www.utdallas.edu/',
					'content' => 'Bachelors in Computer Science',
					'footer' => '<b>Courses:</b> Algorithms, AI, Prob &amp; Stats, Security, Networking, OS, Discrete Math',
					'meta' => 'Awarded: August 2015'
				]) !!}

				{!! Form::paragraph([
					'title' => 'Richland Colliegiate High School',
					'link' => 'http://richlandcollege.edu/rchs/',
					'content' => 'Associates in Science',
					'footer' => '<b>Courses:</b> C/C++',
					'meta' => 'Awarded: May 2011'
				]) !!}

				{!! Form::paragraph([
					'title' => 'Microsoft Technology Associate',
					'link' => 'https://www.microsoft.com/en-us/learning/mta-certification.aspx',
					'content' => 'Given for the ability to understand and explain fundamental concepts of Software Development.',
					'footer' => '<b>Tech:</b> Database, Development, IT Infrastructure',
					'meta' => 'Awarded: June 2014'
				]) !!}
			</div>
		</section>

		<!-- Employment & Internships -->
		<section class="mb-6">
			<h2 class="text-center">Employment &amp; Internships</h2>

			<div class="row">
				{!! Form::paragraph([
					'title' => 'Transworld Systems Inc.',
					'subtitle' => 'Senior Software Developer',
					'link' => 'https://www.tsico.com/',
					'content' => 'Continued developing software from Halo Co. Responsibilities expanded to include SQL optimization, imports, load balancing, and automated testing.',
					'footer' => '<b>Skills:</b> Laravel 5.1, Laravel 5.5, PHP 7.1, JavaScript, MSSQL, JWT, SSO, Tailwind, Unit Testing, JIRA, NPM, NoSQL',
					'meta' => 'March 2018 - <b>Current</b>'
				]) !!}

				{!! Form::paragraph([
					'title' => 'Halo Companies Inc.',
					'subtitle' => 'Senior Software Developer',
					'link' => 'http://www.haloco.com/',
					'content' => 'Built a loan servicing software and borrower portal using the Laravel 5.1 Framework. Built architectures such as notifications, nightlies, and payments.',
					'footer' => '<b>Skills:</b> Laravel 5.1, PHP 5.3, PHP 7.1, JavaScript, MSSQL, Mailgun, Twilio, Queues, PCI, Bootstrap, APIs, AWS',
					'meta' => 'June 2016 - March 2018'
				]) !!}

				{!! Form::paragraph([
					'title' => 'Bible.org',
					'subtitle' => 'Full-Stack Web Developer',
					'link' => 'http://www.bible.org/',
					'content' => 'Built a custom site from scratch using the Laravel 5.1 and then 5.2 Framework. Used a mobile-first design, and operated using TDD.',
					'footer' => '<b>Skills:</b> Laravel 5.1, Laravel 5.2, PHP 5.3, JavaScript, Stripe, MySQL, Bootstrap, TDD, WAMP',
					'meta' => 'January 2015 - May 2016'
				]) !!}

				{!! Form::paragraph([
					'title' => 'Epimed International',
					'subtitle' => 'Contract Programmer | Backend Designer',
					'link' => 'http://www.epimedpain.com/',
					'content' => 'Replaced an analog paper system with a digital one. The implementation yielded a mobile-ready application using the Laravel 4 framework.',
					'footer' => '<b>Skills:</b> Laravel 4.2, PHP 5.3, JavaScript, MySQL, Bootstrap, Git, SourceTree, Composer, LAMP',
					'meta' => 'September 2014 - December 2014'
				]) !!}

				{!! Form::paragraph([
					'title' => 'STEAM Camp | UTD',
					'subtitle' => 'Game Design Professor',
					'link' => 'http://www.utdallas.edu/k12/summer/',
					'content' => 'Taught K-12 Students how to program and design games in an Agile environment using Game Maker Software. Created the curriculum.',
					'footer' => '<b>Skills:</b> Communication, Leadership, Teaching, Flexibility, Documentation, SOLID, MVC, OOP, DRY, KISS',
					'meta' => 'June 2013 - August, June 2014 - August 2014'
				]) !!}

				{!! Form::paragraph([
					'title' => 'GM: Studio / CS Private Tutor',
					'subtitle' => 'Private Tutor for GM: Studio and other CS topics',
					'link' => 'https://www.yoyogames.com/studio',
					'content' => 'Taught Students various CS concepts by using a goal-oriented curriculum that was dynamically adjusted for each student\'s needs.',
					'footer' => '<b>Skills:</b> Communication, Teaching, Modularity, Documentation, SOLID, OOP, DRY, KISS',
					'meta' => 'August 2014 - January 2015'
				]) !!}
			</div>
		</section>

		<!-- Projects & Websites -->
		<section class="mb-6">
			<h2 class="text-center">Projects &amp; Websites</h2>

			<div class="row">
				{!! Form::paragraph([
					'title' => 'Laravel | Personal Website',
					'link' => 'http://www.tylernathanreed.com/',
					'content' => 'My personal website, home to all of my various projects, packages, and other programming toys. Always uses latest software and principals.',
					'footer' => '<b>Skills:</b> Laravel 5.1 to 5.8, Tailwind, Composer, NPM, Yarn',
					'meta' => 'November 2014 - Current'
				]) !!}

				{!! Form::paragraph([
					'title' => 'C++ | Internet Simulation',
					'link' => 'https://github.com/tylernathanreed/Academic-Projects/tree/master/C%20%26%20C%2B%2B/Internet%20Simulation',
					'content' => 'Simulates a network by having files as network channels. Realistically matches an actual network where nodes use different OSI Layers.',
					'footer' => '<b>Skills:</b> Modularity, SRP, C/C++, Vim, Software Design',
					'meta' => 'May 2014'
				]) !!}

				{!! Form::paragraph([
					'title' => 'Java | Constraint Satisfaction',
					'link' => 'https://github.com/tylernathanreed/Academic-Projects/tree/master/Java/Constraint%20Satisfaction',
					'content' => 'Solves a generalized Constraint Satisfaction Problem. The problem is solved using various heuristics and consistency procedures.',
					'footer' => '<b>Skills:</b> Java, Eclipse, AI, Abstraction, Discrete Logic',
					'meta' => 'February 2014 - March 2014'
				]) !!}

				{!! Form::paragraph([
					'title' => 'C# | Contact Manager',
					'link' => 'https://github.com/tylernathanreed/Academic-Projects/tree/master/C%23%20%26%20.NET',
					'content' => 'Kept track of various contacts by storing data in a SQL Database. Stored procedures were used to manage addresses, phone numbers, etc.',
					'footer' => '<b>Skills:</b> C#, MSSQL, Waterfall, SRS, Visual Studio',
					'meta' => 'September 2013 - December 2013'
				]) !!}

				{{--
				{!! Form::paragraph([
					'title' => 'GML | Physics Sandbox',
					'link' => 'http://steamcommunity.com/sharedfiles/filedetails/?id=131654659',
					'content' => 'A sandbox-style gadget implementing Box2D physics. Included concave collisions and kinematic forces.',
					'footer' => '<b>Skills:</b> GML, Box2D, Game Design, Physics',
					'meta' => 'November 2012 -  April 2013'
				]) !!}

				{!! Form::paragraph([
					'title' => 'JS | Game Engine',
					'content' => 'A 2D Canvas driven HTML5 platform providing object-based instances with an event-driven framework.',
					'footer' => '<b>Skills:</b> JavaScript ES6, SOLID, Game Design',
					'meta' => 'March 2016 - February 2017'
				]) !!}
				--}}
			</div>
		</section>

		<!-- Activities & Services -->
		<section class="mb-6">
			<h2 class="text-center">Activities &amp; Services</h2>

			<div class="row">
				{!! Form::paragraph([
					'title' => 'Community Moderator',
					'content' => 'Learned Agile-Programming, Version Control Systems, and programmed games using a wide spectrum of languages and tools.',
					'footer' => '<b>Skills:</b> Leadership, Project Management, Git, Bitbucket',
					'meta' => 'August 2014 - <b>Current</b>'
				]) !!}

				{!! Form::paragraph([
					'title' => 'Habitat for Humanity',
					'link' => 'http://www.habitat.org/',
					'content' => 'Worked in large groups to construct homes for those in need. Learned the value of teamwork. Project planning was observed.',
					'footer' => '<b>Skills:</b> Leadership, Teamwork',
					'meta' => 'August 2010 - May 2012',
					'aside' => '60 Hours of Volunteer Work'
				]) !!}
			</div>
		</section>

		<!-- Footer -->
		<footer class="mb-6">
			<div class="text-center">
				References available upon request
			</div>

			<hr class="my-6">

			<div class="row">
				<div class="col-md-6 text-center">
					<a target="_blank" href="http://bit.ly/treed-resume-2019" class="btn btn-blue btn-lg">View on Google Docs</a>
				</div>
				<div class="col-md-6 text-center mt-6 md:mt-0">
					<a target="_blank" href="{{ url('files/Resume - 2019.pdf') }}" class="btn btn-blue btn-lg">Download as PDF</a>
				</div>
			</div>
		</footer>
	</article>

@endsection
