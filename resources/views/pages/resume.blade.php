@extends('app')

@section('title')
	Tyler Reed | Resume
@endsection

@section('head')
	<link rel="stylesheet" href="/media/css/resume.css">

	<script>
		function resizeLabels()
		{
			if(window.innerWidth < 1337 && window.innerWidth > 991)
			{
				// Determine all of the Labels
				var labels = $(".label");

				// Shorten all of the Labels
				for(var i = 0; i < labels.length; i++)
					labels[i].textContent = labels[i].textContent.replace("Years", "Y").replace("Year", "Y");
			}
			else
			{
				// Determine all of the Labels
				var labels = $(".label");

				// Lengthen all of the Labels
				for(var i = 0; i < labels.length; i++)
					labels[i].textContent = labels[i].textContent.replace("Y", "Years").replace("sears", "s").replace("1 Years", "1 Year").replace("rear", "r");
			}
		}

		// Alter the Labels within a certain Window Width
		jQuery(window).on(
		{
			"resize": function()
			{
				resizeLabels();
			}
		});
	</script>

@endsection

@section('content')
	<div class="container-fluid">
		<!-- Name -->
		<div class="row">
			<div class="col-md-12">
				<center>
					<h1>Tyler Reed</h1>
				</center>
			</div>
		</div>

		<!-- Phone Number -->
		<div class="row">
			<div class="col-md-12">
				<center>
					<div class="compact">
						<p>469.230.9970 | Dallas, TX</p>
					</div>
				</center>
				</div>
		</div>

		<!-- Links -->
		<br>
		<div class="row compact">
			<center>
				<div class="col-md-2 col-md-offset-1 one-line"><p>Email: <a href="mailto:tylernathanreed@gmail.com">tylernathanreed@gmail.com</a></p></div>
				<div class="col-md-2 one-line"><p>Website: <a href="www.tylernathanreed.com">www.tylernathanreed.com</a></p></div>
				<div class="col-md-3 one-line"><p>Linked In: <a href="www.linkedin.com/in/tylernathanreed">www.linkedin.com/in/tylernathanreed</a></p></div>
				<div class="col-md-3 one-line"><p>GitHub: <a href="www.github.com/tylernathanreed">www.github.com/tylernathanreed</a></p></div>
			</center>
		</div>

		<hr>

		<!-- Objective & Strengths -->
		<div class="row">
			<!-- Objective -->
			<div class="col-md-1">
				<h2>Objective</h2>
			</div>
			<div class="col-md-5">
				<p>
					To secure a position where I can efficiently contribute my skills and abilities for the growth of the organization and build my professional career, as well as learn new skills to expand my abilities.
				</p>
			</div>

			<!-- Strengths -->
			<div class="col-md-1">
				<h2>Strengths</h2>
			</div>
			<div class="col-md-5">
				<p>I always prioritize design and documentation first. My other personal strengths include Databases and Algorithms. I focus on simplicity, consistency, and presentation on all aspects of my work.</p>
			</div>
		</div>

		<!-- Skills & Education -->
		<div class="row">
			<!-- Skills -->
			<div class="col-md-6 col-sm-6">
				<center>
					<hr>
					<h2>Skills</h2>
					<hr>
				</center>

				<div class="row">
					<!-- Languages / Standards -->
					<div class="col-md-6">
						<h3>Languages / Standards</h3>

						<u>Proficient:</u>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-7 text-small">C/C++</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-success label-as-badge">5 Years</span></div>

							<div class="col-md-3 col-sm-3 col-xs-7 text-small">C#/.Net</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-primary label-as-badge">3 Years</span></div>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-7 text-small">Java</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-primary label-as-badge">4 Years</span></div>

							<div class="col-md-3 col-sm-3 col-xs-7 text-small">PHP</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-primary label-as-badge">3 Years</span></div>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-7 text-small">SQL</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-primary label-as-badge">3 Years</span></div>

							<div class="col-md-3 col-sm-3 col-xs-7 text-small">GML</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-success label-as-badge">7 Years</span></div>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-7 text-small one-line">HTML 4/5</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-success label-as-badge">8 Years</span></div>

							<div class="col-md-3 col-sm-3 col-xs-7 text-small one-line">CSS 2/3</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-success label-as-badge">7 Years</span></div>
						</div>

						<br>
						<u>Used:</u>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-7 text-small">JavaScript</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-primary label-as-badge">3 Years</span></div>

							<div class="col-md-3 col-sm-3 col-xs-7 text-small">Bootstrap</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-danger label-as-badge">1 Year</span></div>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-7 text-small">jQuery</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-danger label-as-badge">1 Year</span></div>

							<div class="col-md-3 col-sm-3 col-xs-7 text-small">JSON</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-primary label-as-badge">3 Years</span></div>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-7 text-small">RESTful</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-danger label-as-badge">1 Year</span></div>

							<div class="col-md-3 col-sm-3 col-xs-7 text-small">VBA</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-primary label-as-badge">4 Years</span></div>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-7 text-small one-line">Drupal 7</div>
 							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-danger label-as-badge">1 Year</span></div>

							<div class="col-md-3 col-sm-3 col-xs-7 text-small one-line">Solr 4</div>
 							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-danger label-as-badge">1 Year</span></div>
						</div>
						<br>
					</div>

					<!-- Development Tools -->
					<div class="col-md-6">
						<h3>Development Tools</h3>
						<u>IDEs / Text Editors:</u>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-7 text-small">Notepad</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-success label-as-badge">9 Years</span></div>

							<div class="col-md-3 col-sm-3 col-xs-7 text-small">Notepad++</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-success label-as-badge">5 Years</span></div>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-7 text-small">Sublime</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-warning label-as-badge">2 Years</span></div>

							<div class="col-md-3 col-sm-3 col-xs-7 text-small">Vim</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-primary label-as-badge">3 Years</span></div>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-7 text-small one-line">VS 2008+</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-success label-as-badge">5 Years</span></div>

							<div class="col-md-3 col-sm-3 col-xs-7 text-small">Eclipse</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-success label-as-badge">5 Years</span></div>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-7 text-small">Netbeans</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-warning label-as-badge">2 Years</span></div>

							<div class="col-md-3 col-sm-3 col-xs-7 text-small one-line">GM: Studio</div>
							<div class="col-md-3 col-sm-3 col-xs-5"><span class="label label-success label-as-badge">7 Years</span></div>
						</div>

						<u>Software Tools:</u>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6 text-small one-line">SQL Server 2008+</div>
							<div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-1"><span class="label label-primary label-as-badge">3 Years</span></div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6 text-small">PHPMyAdmin</div>
							<div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-1"><span class="label label-primary label-as-badge">4 Years</span></div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6 text-small one-line">Dreamweaver CS3+</div>
							<div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-1"><span class="label label-primary label-as-badge">4 Years</span></div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6 text-small">WAMP</div>
							<div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-1"><span class="label label-primary label-as-badge">4 Years</span></div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6 text-small one-line">Git &amp; Source Tree</div>
							<div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-1"><span class="label label-primary label-as-badge">4 Years</span></div>
						</div>
					</div>
				</div>
			</div>

			<!-- Education -->
			<div class="col-md-6 col-sm-6">
				<center>
					<hr>
					<h2>Education</h2>
					<hr>
				</center>

				<div class="row">
					<div class="col-md-6">
						<h3>University of Texas at Dallas</h3>
						<p>
							BS Computer Science<br>
							Awarded: Summer 2015<br>
						</p>
					</div>

					<div class="col-md-6">
						<h3>Richland Colliegiate High School</h3>
						<p>
							AS Science<br>
							Awarded: May 2011<br>
						</p>
					</div>
				</div>

				<p><b>Cumulative GPA:</b> 2.999</p>
			</div>
		</div>

		<!-- Internships & Certifications -->
		<div class="row">
			<!-- Internships -->
			<div class="col-md-6 col-sm-6">
				<center>
					<hr>
					<h2>Internships</h2>
					<hr>
				</center>

				<div class="row">
					<div class="col-md-12">
						<h3><a href="http://www.epimedpain.com/">Epimed International</a></h3>				
						<p>
							Contract Programmer | Backend Designer<br>
						</p>
						<hr class="break-small">
						<b>Work Experience:</b>
						<span>Tasked with replacing an analog paper system with a digital one. The implementation yeilded a mobile-ready website using the Laravel 4 framework backed with an agnostic database.</span><br>
						<span class="text-small">Fall 2014</span><br>
						<p></p>
					</div>
				</div>
			</div>

			<!-- Certifications -->
			<div class="col-md-6 col-sm-6">
				<center>
					<hr>
					<h2 style="">Certifications</h2>
					<hr>
				</center>

				<div class="row">
					<div class="col-md-12">
						<h3>Microsoft Technology Associate</h3>
						<p>
							Given for the ability to understand and explain fundamental concepts of Software Development<br>
							<span class="text-small">Summer 2014</span><br>
						</p>
					</div>
				</div>
			</div>
		</div>

		<!-- Work Experience & Activities -->
		<div class="row">
			<!-- Work Experience -->
			<div class="col-md-6 col-sm-6">
				<center>
					<hr>
					<h2>Work Experience</h2>
					<hr>
				</center>

				<div class="row">
					<!-- ATEC STEAM Camp | UTD -->
					<div class="col-md-6">
						<h3><a href="http://www.utdallas.edu/atec/summercamps/">ATEC STEAM Camp | UTD</a></h3>				
						<p>
							Game Design/Development Teaching Assistant<br>
						</p>
						<hr class="break-small">
						<b>Work Experience:</b>
						Taught High School Students how to program and design games using Game Maker Software.<br>
						<span class="text-small">Summer 2013</span><br>
						<p></p>
					</div>

					<!-- CS STEAM Camp | UTD -->
					<div class="col-md-6">
						<h3><a href="http://www.utdallas.edu/k12/summer/">CS STEAM Camp | UTD</a></h3>
						<p>
							Game Design/Development Teacher<br>
						</p>
						<hr class="break-small">
						<b>Work Experience:</b>
						Taught K-12 Students how to program and design games using Game Maker Software. Created the curriculum.<br>
						<span class="text-small">Summer 2014</span><br>
						<p></p>
					</div>

					<!-- GM: Studio / CS Private Tutor -->
					<div class="col-md-6">
						<h3><a href="https://www.yoyogames.com/studio">GM: Studio</a> / CS Private Tutor</h3>
						<p>
							Private Tutor for Game Maker: Studio and/or other Computer Science topics<br>
						</p>
						<hr class="break-small">
						<b>Work Experience:</b>
						Taught Students various Computer Science concepts by using a goal-oriented curriculum that was dynamically adjusted for each student's needs.<br>
						<span class="text-small">Fall 2014 - Spring 2015</span><br>
						<p></p>
					</div>
	
					<!-- Bible.org -->
					<div class="col-md-6">
						<h3><a href="http://www.bible.org">Bible.org</a></h3>
						<p>
							Backend Drupal Developer for Solr Search &amp; Full-Stack Web Developer<br>
						</p>
						<hr class="break-small">
						<b>Work Experience:</b>
						Learned the Drupal 7 Framework and Apache Solr Search. Learned to work in a professional environment with deadlines that effect real people. Also built <a href="http://churchdiscipleship.org">churchdiscipleship.org</a> from scratch using the Laravel 5.2 Framework as the sole programmer.<br>
						<span class="text-small">Spring 2015 - Current</span><br>
					</div>
				</div>
			</div>

			<!-- Activities -->
			<div class="col-md-6 col-sm-6">
				<center>
					<hr>
					<h2>Activities</h2>
					<hr>
				</center>

				<div class="row">
					<!-- Community Moderator -->
					<div class="col-md-6">
						<h3>Community Moderator</h3>				
						<p>
							<b>Learning Experience:</b>
							Learned Agile and Peer Programming, as well as how to use Source Control tools such as GitHub. Community members (self included) program/modify games using a wide spectrum of languages and tools.<br>
							<span class="text-small">2009 - Present</span><br>
						</p>
					</div>

					<!-- Bridge Builder Academy -->
					<div class="col-md-6">
						<h3>Bridge Builder Academy</h3>	
						<p>
							<b>Learning Experience:</b>
							Worked with students who had learning disabilities. Played, tested, and created various board games. Learning Gaming Mechanics, Game Design, and how to communicate effectively.<br>
							<span class="text-small">2010-2012</span><br>
							<span class="text-small">100+ Hours of Volunteer Work</span><br>
						</p>
					</div>

					<!-- Habitat for Humanity -->
					<div class="col-md-6">
						<h3>Habitat for Humanity</h3>
						<p>
							<b>Learning Experience:</b>
								Worked in large groups to help construct homes for those in need. Learned the value of teamwork. Basic project planning and outlining were observed.<br>
							<span class="text-small">2009-2011</span><br>
							<span class="text-small">60 Hours of Volunteer Work</span><br>
						</p>
					</div>
				</div>
			</div>
		</div>

		<!-- Academic Projects & Personal Projects -->
		<div class="row">
			<!-- Academic Projects -->
			<div class="col-md-6 col-sm-6">
				<center>
					<hr>
					<h2>Academic Projects</h2>
					<hr>
				</center>

				<div class="row">
					<!-- Java | Constraint Satisfaction -->
					<div class="col-md-6">
						<h3><a href="https://github.com/tylernathanreed/Academic-Projects/tree/master/Java/Constraint%20Satisfaction">Java | Constraint Satisfaction</a></h3>
						<p>
							Determines a solution to a generalized Constraint Satisfaction Problem <i>(Sudoku, Map Coloring, etc.)</i>. Given Constraint and Domain Files, the problem is solved using various heuristics and consistency procedures.<br>
							<span class="text-small">Spring 2014</span><br>
						</p>
					</div>

					<!-- Java | Knowledge Representation -->
					<div class="col-md-6">
						<h3><a href="https://github.com/tylernathanreed/Academic-Projects/tree/master/Java/Knowledge%20Representation">Java | Knowledge Representation</a></h3>
						<p>
							Derives new information from a predefined set of information represented as Clauses. The program accepts an initial Knowledge Base with a Test Case, and derives whether or not the cased is true. Takes a Multi-Threaded approach to utilize the Independent nature of the Resolution Rule.<br>
							<span class="text-small">Spring 2014</span><br>
						</p>
					</div>

					<!-- C++ | Internet Simulation w/ OSI Layers -->
					<div class="col-md-6">
						<h3><a href="https://github.com/tylernathanreed/Academic-Projects/tree/master/C%20%26%20C%2B%2B/Internet%20Simulation">C++ | Internet Simulation w/ OSI Layers</a></h3>
						<p>
							Simulates a simple Network by having a Process corresponding to a Node in the Network using files as network channels. The project was structured to realistically match an actual Network where Nodes use different OSI Layers communicate.<br>
							<span class="text-small">Spring 2014</span><br>
						</p>
					</div>

					<!-- C#/.NET Contact Manager -->
					<div class="col-md-6">
						<h3><a href="https://github.com/tylernathanreed/Academic-Projects/tree/master/C%23%20%26%20.NET">C#/.NET | Contact Mananger</a></h3>
						<p>
							This interface allowed a User to keep track of various Contact Information by storing data in a SQL Database. The User could add, modify, and delete Contacts, Addresses, Phone Numbers, and many other attributes using stored procedures.<br>
							<span class="text-small">Spring 2013</span><br>
						</p>
					</div>
				</div>
			</div>

			<!-- Personal Projects -->
			<div class="col-md-6 col-sm-6">
				<center>
					<hr>
					<h2>Personal Projects</h2>
					<hr>
				</center>

				<div class="row">
					<!-- Game of Life Variation -->
					<div class="col-md-6">
						<h3><a href="http://steamcommunity.com/sharedfiles/filedetails/?id=101220664">Game of Life Variation</a></h3>
						<p>
							This variation of John Conway's Game of Life added a color mechanic in which the next generation of cells took an average color scheme from the parent cells. This gave the patterns of the game more depth.<br>
							<span class="text-small">2012 - 2013</span><br>
						</p>
					</div>

					<!-- Physics Sandbox -->
					<div class="col-md-6">
						<h3><a href="http://steamcommunity.com/sharedfiles/filedetails/?id=131654659">Physics Sandbox</a></h3>
						<p>
							This Sandbox style gadget tested the my knowledge in Physics by implementing Rectangular, Elliptical, and Polygonal collision in a 2-D Environment. Various forces such as Friction, Gravity, and Restitution were applied.<br>
							<span class="text-small">2012 - 2013</span><br>
					</p></div>

					<!-- Roadblock Game "Gravitron" -->
					<div class="col-md-6">
						<h3><a href="https://dl.dropboxusercontent.com/u/22054931/Games/gravitron.exe">Roadblock Game "Gravitron"</a></h3>
						<p>
							Designed to exploit the puzzle mechanics of Roadblock themed games. Currently features 50 Levels, storing them in an encrypted binary format (100 Levels is about 40 KB). Users may create, load, and save their own levels.<br>
							<span class="text-small">2010 - Present</span><br>
						</p>
					</div>

					<!-- Pac-man Recreation -->
					<div class="col-md-6">
						<h3>Pac-man Recreation</h3>
						<p>
							Redesigned the original Pac-man Arcade Game using the original logic found within the code. This was done to see what measures developers had to take when process time and memory were extremely limited.<br>
							<span class="text-small">2014 - Present</span><br>
						</p>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<footer>
			<div class="row">
				<div class="col-md-12">
					<hr>
					<center>
						References available upon request
					</center>
					<br>
				</div>
			</div>
		</footer>
	</div>
	<script>resizeLabels();</script>

@endsection
