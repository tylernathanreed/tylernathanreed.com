@extends('layouts.app')

@section('title')
	Tyler Reed | Resume
@endsection

@section('head')
	<style>
		.resume { margin-bottom: 2em; }
		.resume section { margin-bottom: 2em; }
		h1 { font-size: 30px; }
		h2 { font-size: 26px; }
		h3 { font-size: 20px; }
	</style>
@endsection

@section('content')
	<article class="resume container" style="max-width: 800px">
		<!-- Name -->
		<section id="name" class="--no-margin-bottom">
			<h1 class="--centered">Tyler Reed</h1>
		</section>

		<!-- Phone Number -->
		<section id="phone-number" class="--no-margin-bottom-md">
			<small class="--centered --block">
				469.230.9970 | Dallas, TX
			</small>
		</section>

		<!-- Links -->
		<section id="links" class="row --centered">
			<p class="col-md-6">Email: <a href="mailto:tylernathanreed@gmail.com">tylernathanreed@gmail.com</a></p>
			<p class="col-md-6">Website: <a href="www.tylernathanreed.com">www.tylernathanreed.com</a></p>
			<p class="col-md-6">Linked In: <a href="www.linkedin.com/in/tylernathanreed">www.linkedin.com/in/tylernathanreed</a></p>
			<p class="col-md-6">GitHub: <a href="www.github.com/tylernathanreed">www.github.com/tylernathanreed</a></p>
		</section>

		<!-- Objective -->
		<section id="objective" class="row">
			<h2 class="col-md-3 --no-margin" style="line-height: 2em">Objective</h2>
			<p class="col-md-9">
				To secure a position where I can efficiently contribute my skills and abilities for the growth of the organization and build my professional career, as well as learn new skills to expand my abilities.
			</p>
		</section>

		<!-- Strengths -->
		<section id="strengths" class="row">
			<h2 class="col-md-3 --no-margin" style="line-height: 2em">Strengths</h2>
			<p class="col-md-9">
				I always prioritize design and documentation first. My other personal strengths include Databases and Algorithms. I focus on simplicity, consistency, and presentation on all aspects of my work.
			</p>
		</section>

		<!-- Skills -->
		<section id="skills">
			<h2 class="--centered">Skills</h2>

			<!-- Languages / Paradigms & Principals -->
			<div class="row">
				<!-- Languages -->
				<div class="col-md-6 col-sm-12">
					<h3 class="--centered --no-margin-top">Languages</h3>

					<table class="table skills">
						<tbody>
							<tr>
								{!! Form::skill('PHP', 5) !!}
								{!! Form::skill('SQL', 5) !!}
							</tr>
							<tr>
								{!! Form::skill('JavaScript', 3) !!}
								{!! Form::skill('jQuery', 2) !!}
							</tr>
							<tr>
								{!! Form::skill('Blade', 3) !!}
								{!! Form::skill('Sass', 3) !!}
							</tr>
							<tr>
								{!! Form::skill('HTML 4/5', 8) !!}
								{!! Form::skill('CSS 2/3', 7) !!}
							</tr>
						</tbody>
					</table>
				</div>

				<!-- Paradigms & Principals -->
				<div class="col-md-6 col-sm-12">
					<h3 class="--centered --no-margin-top-md">Paradigms &amp; Principals</h3>

					<table class="table skills">
						<tbody>
							<tr>
								{!! Form::skill('OOP', 8) !!}
								{!! Form::skill('RDB', 5) !!}
							</tr>
							<tr>
								{!! Form::skill('SOLID', 6) !!}
								{!! Form::skill('MVC', 4) !!}
							</tr>
							<tr>
								{!! Form::skill('RESTful', 4) !!}
								{!! Form::skill('CRUD', 4) !!}
							</tr>
							<tr>
								{!! Form::skill('TDD', 4) !!}
								{!! Form::skill('DRY', 4) !!}
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<!-- Tools & Services / Frameworks & Standards -->
			<div class="row">
				<!-- Tools & Services -->
				<div class="col-md-6 col-sm-12">
					<h3 class="--centered">Tools &amp; Services</h3>

					<table class="table skills">
						<tbody>
							<tr>
								{!! Form::skill('Git', 6) !!}
								{!! Form::skill('WAMP', 6) !!}
							</tr>
							<tr>
								{!! Form::skill('Vim', 4) !!}
								{!! Form::skill('Composer', 4) !!}
							</tr>
							<tr>
								{!! Form::skill('Bootstrap', 3) !!}
								{!! Form::skill('Unix', 4) !!}
							</tr>
							<tr>
								{!! Form::skill('SourceTree', 3) !!}
								{!! Form::skill('Sublime', 3) !!}
							</tr>
						</tbody>
					</table>
				</div>

				<!-- Frameworks & Standards -->
				<div class="col-md-6 col-sm-12">
					<h3 class="--centered">Frameworks &amp; Standards</h3>

					<table class="table skills">
						<tbody>
							<tr>
								{!! Form::skill('Laravel', 4) !!}
								{!! Form::skill('JSON', 4) !!}
							</tr>
							<tr>
								{!! Form::skill('AJAX', 3) !!}
								{!! Form::skill('Regex', 4) !!}
							</tr>
							<tr>
								{!! Form::skill('XHTML', 2) !!}
								{!! Form::skill('YAML', 2) !!}
							</tr>
							<tr>
								{!! Form::skill('PJAX', 2) !!}
								{!! Form::skill('Comments', 7) !!}
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>

		<!-- Education & Certifications -->
		<section id="education">
			<h2 class="--centered">Education &amp; Certifications</h2>

			<div class="row">
				{!! Form::paragraph([
					'title' => 'University of Texas at Dallas',
					'link' => 'http://www.utdallas.edu/',
					'content' => 'Bachelors in Computer Science',
					'meta' => 'Awarded: August 2015'
				]) !!}

				{!! Form::paragraph([
					'title' => 'Richland Colliegiate High School',
					'link' => 'http://richlandcollege.edu/rchs/',
					'content' => 'Associates in Science',
					'meta' => 'Awarded: May 2011'
				]) !!}

				{!! Form::paragraph([
					'title' => 'Microsoft Technology Associate',
					'link' => 'https://www.microsoft.com/en-us/learning/mta-certification.aspx',
					'content' => 'Given for the ability to understand and explain fundamental concepts of Software Development.',
					'meta' => 'Awarded: June 2014'
				]) !!}
			</div>
		</section>

		<!-- Employment & Internships -->
		<section id="employment">
			<h2 class="--centered">Employment &amp; Internships</h2>

			<div class="row">
				{!! Form::paragraph([
					'title' => 'Bible.org',
					'subtitle' => 'Full-Stack Web Developer',
					'link' => 'http://www.bible.org/',
					'content' => 'Built a custom site from scratch using the Laravel 5.2 Framework. Used a mobile-first design, and operated using TDD.',
					'meta' => 'Spring 2015 - <b>Current</b>'
				]) !!}

				{!! Form::paragraph([
					'title' => 'Epimed International',
					'subtitle' => 'Contract Programmer | Backend Designer',
					'link' => 'http://www.epimedpain.com/',
					'content' => 'Replaced an analog paper system with a digital one. The implementation yielded a mobile-ready application using the Laravel 4 framework.',
					'meta' => 'September 2014 - December 2014'
				]) !!}

				{!! Form::paragraph([
					'title' => 'STEAM Camp | UTD',
					'subtitle' => 'Game Design Professor',
					'link' => 'http://www.utdallas.edu/k12/summer/',
					'content' => 'Taught K-12 Students how to program and design games using Game Maker Software. Created the curriculum.',
					'meta' => 'June 2013 - August, June 2014 - August 2014'
				]) !!}

				{!! Form::paragraph([
					'title' => 'GM: Studio / CS Private Tutor',
					'subtitle' => 'Private Tutor for GM: Studio and other CS topics',
					'link' => 'https://www.yoyogames.com/studio',
					'content' => 'Taught Students various CS concepts by using a goal-oriented curriculum that was dynamically adjusted for each student\'s needs.',
					'meta' => 'August 2014 - January 2015'
				]) !!}
			</div>
		</section>

		<!-- Projects & Websites -->
		<section id="projects">
			<h2 class="--centered">Projects &amp; Websites</h2>

			<div class="row">
				{!! Form::paragraph([
					'title' => 'Laravel | Personal Website',
					'link' => 'http://www.tylernathanreed.com/',
					'content' => 'My personal website, home to all of my various projects, packages, and other programming toys. Always uses latest software and principals.',
					'meta' => 'November 2014 - Current'
				]) !!}

				{!! Form::paragraph([
					'title' => 'C++ | Internet Simulation w/ OSI Layers',
					'link' => 'https://github.com/tylernathanreed/Academic-Projects/tree/master/C%20%26%20C%2B%2B/Internet%20Simulation',
					'content' => 'Simulates a network by having files as network channels. Realistically matches an actual network where nodes use different OSI Layers.',
					'meta' => 'May 2014'
				]) !!}

				{!! Form::paragraph([
					'title' => 'Java | Constraint Satisfaction',
					'link' => 'https://github.com/tylernathanreed/Academic-Projects/tree/master/Java/Constraint%20Satisfaction',
					'content' => 'Solves a generalized Constraint Satisfaction Problem. The problem is solved using various heuristics and consistency procedures.',
					'meta' => 'February 2014 - March 2014'
				]) !!}

				{!! Form::paragraph([
					'title' => 'C# | Contact Manager',
					'link' => 'https://github.com/tylernathanreed/Academic-Projects/tree/master/C%23%20%26%20.NET',
					'content' => 'Kept track of various contacts by storing data in a SQL Database. Stored procedures were used to manage addresses, phone numbers, etc.',
					'meta' => 'September 2013 - December 2013'
				]) !!}

				{!! Form::paragraph([
					'title' => 'GML | Physics Sandbox',
					'link' => 'http://steamcommunity.com/sharedfiles/filedetails/?id=131654659',
					'content' => 'A sandbox-style gadget implementing Box2D physics. Included concave mesh collision handling and kinematic forces.',
					'meta' => 'November 2012 -  April 2013'
				]) !!}

				{!! Form::paragraph([
					'title' => 'JS | Game Engine',
					'content' => 'A 2D Canvas driven HTML5 platform providing object-based instances with an event-driven framework.',
					'meta' => 'March 2016 - <b>Current</b>'
				]) !!}
			</div>
		</section>

		<!-- Activities & Services -->
		<section id="activities">
			<h2 class="--centered">Activities &amp; Services</h2>

			<div class="row">
				{!! Form::paragraph([
					'title' => 'Community Moderator',
					'content' => 'Learned Agile-Programming, Version Control Systems, and programmed games using a wide spectrum of languages and tools.',
					'meta' => 'August 2014 - <b>Current</b>'
				]) !!}

				{!! Form::paragraph([
					'title' => 'Habitat for Humanity',
					'link' => 'http://www.habitat.org/',
					'content' => 'Worked in large groups to construct homes for those in need. Learned the value of teamwork. Project planning was observed.',
					'meta' => 'August 2010 - May 2012',
					'aside' => '60 Hours of Volunteer Work'
				]) !!}
			</div>
		</section>

		<!-- Footer -->
		<footer id="footer">
			<div class="row">
				<div class="col-md-12 --centered">
					References available upon request
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12 --centered">
					<a target="_blank" href="\media\pdf\Resume - Tyler Reed.pdf" class="btn btn-primary btn-lg">Download as PDF</a>
				</div>
			</div>
		</footer>
	</article>

@endsection
