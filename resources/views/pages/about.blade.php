@extends('layouts.page', [
    'stickyNav' => true
])

@section('page.content')

    <!-- Jumbotron -->
    <header class="masthead bg-primary text-white">
        <div class="container d-flex flex-column align-items-center justify-content-center">

            <!-- Jumbotron Heading -->
            <h1 class="masthead-heading text-center mb-0">Behind the Scenes</h1>

            <!-- Icon Divider -->
            <div class="divider-custom divider-light text-center">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <!-- Jumbotron Content -->
            <div class="d-flex flex-column flex-sm-row align-items-center w-100">

                <!-- Jumbotron Avatar Image -->
                <img class="masthead-avatar-lg mr-4" src="{{ url('images/avatar.jpg') }}" alt="Avatar">

                <!-- Jumbotron Subheading -->
                <div class="flex-1 masthead-subheading font-weight-light mb-0 ml-4 mt-4 mt-sm-0">
                    The great qualities of a software developer are not limited to programming.
                    Programming is a lifestyle for me, and I've learned a number of lessons over the years that apply to more than just code.
                </div>

            </div>
        </div>
    </header>

    <!-- Portfolio Section -->
    <section class="page-section portfolio">
        <div class="container">

            <!-- Portfolio Section Heading -->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Star Qualities</h2>

            <!-- Icon Divider -->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <!-- Portfolio Grid Items -->
            <div class="row justify-content-center">

                <?php $qualities = [
                    'virtuous'   => ['name' => 'Be Virtuous',     'icon' => 'fas fa-coins',      'color' => 'yellow', 'description' => 'The three greatest virtues are laziness, impatience, and hubris'],
                    'righteous'  => ['name' => 'Be Righteous',    'icon' => 'fas fa-check',      'color' => 'green',  'description' => 'Be justified in your actions, and accept when you\'re wrong'],
                    'committed'  => ['name' => 'Be Committed',    'icon' => 'far fa-handshake',  'color' => 'cyan',   'description' => 'Get the job done, and put in the time to do it'],
                    'initiative' => ['name' => 'Show Initiative', 'icon' => 'fas fa-running',    'color' => 'gray',   'description' => 'Do what needs to be done, don\'t wait to be told'],
                    'leadership' => ['name' => 'Show Leadership', 'icon' => 'fas fa-users',      'color' => 'purple', 'description' => 'Lead by example, and teach others the lessons you\'ve learned'],
                    'integrity'  => ['name' => 'Show Integrity',  'icon' => 'fas fa-shield-alt', 'color' => 'red',    'description' => 'Be the rock for your team, and stand your ground on ethical issues']
                ]; ?>

                @foreach($qualities as $key => $info)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolio-modal-{{ $key }}">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white">Read More</div>
                            </div>
                            <div class="d-flex align-items-center p-2">
                                <div class="portfolio-item-icon {{ $info['icon'] }} bg-{{ $info['color'] }} text-white p-2"></div>
                                <div class="ml-3 mr-3">
                                    <div>{{ $info['name'] }}</div>
                                    <small class="text-muted text-xs">{{ $info['description'] }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center">
                Click on any item to view how I demonstrate these qualities in the workplace
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="page-section portfolio bg-primary">
        <div class="container">

            <!-- Portfolio Section Heading -->
            <h2 class="page-section-heading text-center text-uppercase text-white mb-0">Best Practices</h2>

            <!-- Icon Divider -->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <!-- Portfolio Grid Items -->
            <div class="row justify-content-center">

                <?php $practices = [
                    'solid' => [
                        'name' => 'S.O.L.I.D.',
                        'icon' => 'fas fa-cubes',
                        'color' => 'green',
                        'thumbnail' => null,
                        'description' => 'The SOLID design principles help make software more understandable, flexible, and maintainable.'
                    ],
                    'dry' => [
                        'name' => 'Don\'t Repeat Yourself',
                        'icon' => 'fas fa-retweet',
                        'color' => 'red',
                        'thumbnail' => null,
                        'description' => 'DRY comes in many forms, and can quickly become a plague if not taken seriously.'
                    ],
                    'deeper' => [
                        'name' => 'Let\'s Go Deeper',
                        'icon' => 'fab fa-superpowers',
                        'color' => 'purple',
                        'thumbnail' => null,
                        'description' => 'Don\'t bore or confuse the reader with unnecessary details. Give them the choice to go down the rabbit hole.'
                    ],
                    'tire' => [
                        'name' => 'Resolve Tire Swing Problems',
                        'icon' => 'fas fa-cog',
                        'color' => 'gray',
                        'thumbnail' => url('images/tireswing_thumbnail.png'),
                        'description' => 'The job of a software developer is to deliver what the client needs, which isn\'t always what they asked for.'
                    ],
                    'future' => [
                        'name' => 'Work for the Future',
                        'icon' => 'fas fa-brain',
                        'color' => 'pink',
                        'thumbnail' => null,
                        'description' => 'Identify and trust early warnings for future problems. Resolve them before they magnify.'
                    ],
                    'plane' => [
                        'name' => 'Build the Plane as you Fly',
                        'icon' => 'fas fa-plane',
                        'color' => 'orange',
                        'thumbnail' => null,
                        'description' => 'The time to build the perfect system isn\'t often available. Start small, and scale up.'
                    ]
                ]; ?>

                @foreach($practices as $key => $info)
                    <div class="col-md-12 mb-4">
                        <div class="portfolio-item bg-white mx-auto w-100" data-toggle="modal" data-target="#portfolio-modal-{{ $key }}">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white">Read More</div>
                            </div>
                            <div class="d-flex align-items-center p-2">
                                <div class="portfolio-item-icon {{ $info['icon'] }} bg-{{ $info['color'] }} text-white p-2">
                                    <img class="img-fluid" src="{{ url("images/ecosystem/{$key}.min.svg") }}" alt="{{ $info['name'] }}" />
                                </div>
                                <div class="ml-3 mr-3 flex-1">
                                    <div>{{ $info['name'] }}</div>
                                    <small class="text-muted text-xs">{{ $info['description'] }}</small>
                                </div>
                                @if(!empty($info['thumbnail']))
                                    <div class="portfolio-item-icon d-none d-sm-block">
                                        <img class="img-fluid" src="{{ $info['thumbnail'] }}" alt="thumbnail" />
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center text-white">
                Click on any item to view examples of how I follow these patterns
            </div>
        </div>
    </section>

    <!-- Star Qualities Modals -->
    @component('components.portfolio-modal', ['key' => 'virtuous', 'source' => $qualities])
        <p>
            There are <b>three great virtues of a programmer</b>: Laziness, Impatience, and Hubris.
        </p>

        <p>
            <b>Laziness</b> is the quality that makes you go to great effort to reduce overall energy expenditure.
            It makes you write labor-savor programs that other people will find useful,
            and document what you wrote so you don't have to answer so many questions about it.
        </p>

        <p>
            <b>Impatience</b> is the anger you feel when the computer is being lazy.
            This makes you write programs that don't just react to your needs, but actually anticipate them.
            This quality also drives you to write more efficient code, so that you don't have to wait
            around for the program to finish.
        </p>

        <p>
            <b>Hubris</b> is the quality that makes you write (and maintain) programs that other people
            won't want to say bad things about. It drives you to be confident in your code, and steer
            it towards success.
        </p>
    @endcomponent

    @component('components.portfolio-modal', ['key' => 'righteous', 'source' => $qualities])
        <p>
            The term "righteous" isn't limited to just religious context;
            being righteous can also mean "being just or rightful".
            Under this context, I strive to always be correct.
        </p>

        <p>
            Now this doesn't mean that I think I'm always right.
            In fact, I'm often ecstatic when I'm proven wrong, as it means I've learned something.
            But this does mean that I'm willing to put my opinion out there, and I have justification to stand my ground.
        </p>

        <p>
            Being righteous causes me to be a leading voice in the room.
            I won't sit idly by if I think someone is doing something the wrong way.
            I also won't force them to do things my way; as that isn't the pursuit of righteousness.
            I instead compare our approaches to evaluate the pros and cons, and often conclude with a compromise
            that accomplishes the objective that was needed, and the solution is implemented in a correct manner.
        </p>
    @endcomponent

    @component('components.portfolio-modal', ['key' => 'committed', 'source' => $qualities])
        <p>
            I program because I enjoy it. I don't work just for the paycheck, and when I'm on the job, I stay focused.
            My approach towards work isn't "work a solid 8 hours, then leave as soon as possible".
            I prefer to show up, identify the tasks for the day, and stay until those tasks are completed,
            or the commitments are changed.
        </p>

        <p>
            I have participated in a number of production launches, where late hours and weekends were required.
            Given that the commitment was made well in advance, I understood the expectation, and didn't hesitate
            to stay late and get the job done.
        </p>

        <p>
            However, I am committed to more than just my job. I'm also committed to my family.
            Commitment goes both ways in this regard, as if the expectation is known and planned,
            I'm willing to jump right in. If my occupation is respectful of my time, then I'm
            willing to put in however much work is needed to get the job done.
        </p>
    @endcomponent

    @component('components.portfolio-modal', ['key' => 'initiative', 'source' => $qualities])
        <p>
            Several of the business I've worked for tend to not make refactoring, optimization, or security a high priority.
            In an environment where requirements are constantly changing, keeping all of these problems in mind is a must.
            After I've handled my immediate priorities, I prefer to work on tackling these types of issues.
        </p>
        <p>
            I've led a number of performance enhancements and framework upgrades of my own volition.
            Software I've worked on in the past were benefited by significantly faster speeds,
            better security ratings, and enhanced flexibility for upcoming requirements.
        </p>
        <p>
            There's a constant balance between fighting for these types of "health" improvement issues
            and developing the next feature for a client. I won't lie, there has been more than one
            occasion where we had a data breach that would have been prevented by one of my suggestions,
            but it wasn't prioritized in time.
        </p>
        <p>
            It's important to hold your head high, and show initiative of these types of issues.
            If no one on the team focuses on these problems, you'll end up in a world of hurt
            two or three years down the line when you get blind-sided by major problems like
            data breaches or daily performance issues.
        </p>
    @endcomponent

    @component('components.portfolio-modal', ['key' => 'leadership', 'source' => $qualities])
        <p>
            There's always room for improvement, both in myself, and in others.
            I do my best to teach others the lessons I learned the hard way, so that they don't have to.
            I also try to be equally receptive when someone else is doing the same for me.
        </p>
        <p>
            I prefer to lead by example by writing better requirements, writing better code,
            explaining difficult concepts, and more. I make sure that my voice is heard when
            needed, and I'm also careful to not overstep my role.
        </p>
        <p>
            I was never the kid in a group project to sit idly by and let others do the work.
            I prefer to take the reigns and lead us to a successful future. I also ensure
            that other work can the delegated as needed to ensure that I don't become a
            bottleneck for any project at hand.
        </p>
    @endcomponent

    @component('components.portfolio-modal', ['key' => 'integrity', 'source' => $qualities])
        <p>
            While programming is what I'm paid for, it's still a job, and there's still the daily
            quarrels of life. Whether it be standing up for a proper work/life balance, or stepping
            in for those who can't stand up for themselves, I do my best to ensure that our work
            environment is treating everyone fairly.
        </p>
        <p>
            Smaller examples of this include being mindful of religious holidays, or knowing
            the dietary restrictions of my coworkers when ordering lunch (there's actually been more
            than one occasion where multiple coworkers couldn't eat the food that management
            brought in during lunch to keep us working).
        </p>
        <p>
            More in-scope examples include standing my ground on security issues.
            There have been more times than I remember when management or a client wanted a feature
            to "enhance" either user experience or their own experience that came with a
            significant security risk. It can be hard sometimes to say "no" to your boss,
            but I often justify it with the safety and security of the company.
        </p>
    @endcomponent

    <!-- Best Practices Modals -->
    @component('components.portfolio-modal', ['key' => 'solid', 'source' => $practices])
        <p>
            A lot of programmers claim to know and follow the SOLID principles, but I've learned that many of those claims are false.
            Several programmers I've trained initially thought that they knew these principles, but they failed to describe them correctly,
            they failed to identify them correctly, and they failed to implement them correctly.
        </p>
        <p>
            The Laravel framework has countless examples of SOLID programming.
            One of the most tried and true examples that demonstrates each SOLID principle is the "manager-service" pattern.
            Here's how it works:
            <ul>
                <li><b><u>Single Responsibility</u>:</b> Use a dedicated object for each driver implementation (e.g. Auth, Storage, Cache, etc.).</li>
                <li><b><u>Open-Closed Principle</u>:</b> Allow overriding and implementing new drivers on the manager (e.g. Auth::extend).</li>
                <li><b><u>Liskov Substitution Principle</u>:</b> Each driver implements the same interface and ensures a common contract.</li>
                <li><b><u>Interface Segregation Principle</u>:</b> Drivers may implement additional optional specific interfaces (e.g. StatefulGuard, SupportsBasicAuth, etc.).</li>
                <li><b><u>Dependency Inversion Principle</u>:</b> Each driver (and the even manager itself) leverage dependency injection through Laravel's IoC Container.</li>
            </ul>
        </p>
        <p>
            By understanding how Laravel makes use of the SOLID principles, you'll realize why Laravel is the best PHP framework out there.
            I've used a number of PHP frameworks in the past, but none of them are as scalable, maintainable, and modular as Laravel.
        </p>
    @endcomponent

    @component('components.portfolio-modal', ['key' => 'dry', 'source' => $practices])
        <p>
            "Don't Repeat Yourself", or "DRY", is another design pattern that I've seen programmers violate time and time again,
            despite knowing about this principle. DRY problems come in many forms.
            Here is a breakdown of the common violations that I see, and what their solutions should be:
        </p>
        <p>
            <b>1)</b> Copy, Paste, Tweak
            <br><br>
            Whether it's models, views, controllers, or another complex class, I often see developers needing to stand up functionality
            that is similar to existing functionality. Their first approach is typically to copy the entire class or architecture,
            then proceed to paste and rename it under a different namespace or class name, and lastly make the small handful of changes that
            they needed.
            <br><br>
            This results in having two strikingly similar processes, but they don't actually <i>share</i> this functionality
            at a definitional level. The proper approach would have been to abstract the existing implementation, then define the existing
            implementation as just one of the concrete mechanisms, and lastly describe their new functionality as a second concrete implementation.
        </p>
        <p>
            <b>2)</b> Different Implementations for each Use Case
            <br><br>
            In some of the financially focused applications I've worked on, we've naturally had several financial calculations.
            Some of these calculations were rather complex, and could be broken down into smaller pieces. However, instead of
            giving each piece its own calculation, you'd see the complex calculations internally calculate the smaller components
            by hand, rather than delegating the calculation to a function that could be shared by the larger calculations.
            <br><br>
            The justification for this is usually, "I only need a specific part of the smaller calculation, so I just put it in there".
            This is a very bad idea. You'll eventually end up with a gray definition of some of the smaller building blocks in your
            application, and some of these "specific calculations" could actually be <i>wrong</i>. What's worse, is that diagnosing
            the issue is made even harder, as you don't really have a source of truth anymore.
        </p>
    @endcomponent

    @component('components.portfolio-modal', ['key' => 'deeper', 'source' => $practices])
        <p>
            Let's Go Deeper is a design pattern I came up with, and honestly it applies to more than just code.
            The idea behind LGP is that you design your code (or thought process) at a high level end-to-end,
            and allow diving deeper into specific aspects at the readers discretion.
            This helps give the reader a broad overview, and doesn't bore them with specifics.
            Additionally, if they need specifics, they have an easy time choosing with avenues to explore.
            When done correctly, your source code often looks like a "Choose Your own Adventure" book,
            and the entry point is just a chapter outline.
        </p>
        <p>
            Here's an example of LGP when applied to business requirements:
        </p>
        <p>
            <b>1)</b> Objective
            <br><br>
            The objective should be an elevator pitch, and is ideally one or two sentences.
            You want to explain what it is you're trying to do, but not go into <i>how</i>
            you're going to do it. The objective is intended for a manager or someone wanting
            to understand the purpose of a task.
            <br><br>
            <u>Example</u>:
            <br>
            The objective of this task is to build an amortization schedule and display the results to the client.
        </p>
        <p>
            <b>2)</b> Design Notes
            <br><br>
            The next step deeper is explaining the business requirements.
            Mentions to other knowledge bases might happen here, but nothing that resembles pseudo-code
            or actual code. Ideally anyone with a moderate attention span should be able to read
            and understand the high-level implementation of the issue without needing to be technical.
            Ideally, this is what a Sr. Developer should expect from a Business Analyst.
            <br><br>
            <u>Example</u>:
            <br>
            We need to build a month-by-month amortization schedule breakdown, which includes an amortized payment amount
            (this is the regular/constant monthly payment), how many times that payment will be made, as well as the
            final payment amount (as it may be different). You can find the formula for calculation amortization schedules
            <a href="https://en.wikipedia.org/wiki/Amortization_calculator" target="_blank">here</a>.
            You'll need to simulate each individual payment and provide a principal/interest breakdown,
            and display the results in a table (use "#", "PRIN", "INT", "PMT", and "Total" as your column headers).
        </p>
        <p>
            <b>3)</b> Technical Notes
            <br><br>
            The next step even deeper is explaining the technical aspects.
            We've already covered the purpose and general approach to this issue,
            but there are likely technical (e.g. programming) aspects that may need to be explained.
            In practice, these are useful when a Sr. Developer is handing off a task to a Jr. Developer.
            <br><br>
            <u>Example</u>:
            <br>
            You'll need to create a form prompting for "Interest Rate" (<code>$r</code>), "Total No. of Payments" (<code>$n</code>),
            and "Present Value" (<code>$pv</code>). Include a tool-tip next to "Present Value" explaining that this is the original
            loan amount. Here's the calculation for the regular payment: <code>$pmt = $pv * ($r * ((1 + $r) ^ $n)) / (((1 + $r) ^ $n) - 1)</code>.
            Since you need to simulate the payment schedule, start by initialize some variables that we'll need to keep track of.
            This includes the current principal (<code>$prin = $pv</code>), the current interest (<code>$int = 0</code>),
            and the running breakdown (<code>$breakdown = []</code>).
            We accrue interest <i>after</i> the payment, so make sure you deduct the payment first.
            Within each iteration of the loop (assuming <code>$i</code> is the iterator), you'll need to calculate the following:
            <ul>
                <li>Interest Payment (<code>$breakdown[$i]['int'] = $int</code>)</li>
                <li>Remaining Payment (<code>$rem = $pmt - $int</code>)</li>
                <li>Principal Payment (<code>$breakdown[$i]['prin'] = $rem</code>)</li>
                <li>Current Principal (<code>$prin -= $rem</code>)</li>
                <li>Monthly Interest (<code>$mi = $prin * $r / 12</code>)</li>
                <li>Current Interest (<code>$int += $mi</code>)</li>
            </ul>
            With that solved, you'll need to simulate each payment in a loop (up to <code>$n</code> times),
            where you'll need to calculation the monthly interest <code>$mi = $r / 12 * $pv</code>
        </p>
    @endcomponent

    @component('components.portfolio-modal', ['key' => 'tire', 'source' => $practices])
        <p>
            The importance of technical communication is best summed up by this comic:
            <img src="{{ url('images/tireswing_full.png') }}" class="w-100"/>
        </p>
        <p>
            While it's funny, it's only funny because of the truth behind it.
            As a software developer, I see it as my responsibility to deliver what the customer really needed,
            not what they may have asked for, or what other people have described.
            It's important to listen to all viewpoints on the matter, and formulate an educated solution.
        </p>
        <p>
            I have run into countless examples of "tire swing" problems, where I've been asked to implement
            a specific feature, despite the fact that the feature won't solve the underlying problem.
            I've learned to ask "why", and walk my way back to the original requirements, while also
            keeping the suggestions that were initially presented.
            More often than not, I provide a slightly modified solution that makes everyone happier.
        </p>
    @endcomponent

    @component('components.portfolio-modal', ['key' => 'future', 'source' => $practices])
        <p>
            While the problems of today certainly need attention, you cannot dedicate your entire focus to them.
            I have unfortunately seen too many companies enter an endless "fire-fighting" mode, and struggle to
            actually get on top of problems. What's worse, is that there were early warnings for many of these
            issues, and they were ignored to work on the "problem at hand". I'm not saying you shouldn't focus
            on today's problems, just ensure that your <i>entire</i> focus isn't dedicated towards them.
        </p>
        <p>
            Once you're in an endless fire-fight of data problems, code defects, and performance issues, it can be
            difficult figure out how you got there. Unfortunately, if you find yourself in that situation, it can be
            even more difficult to get out it. Ideally, the team's capacity needs to increase, but under poor management,
            you're more likely to see workforce reduction or people quitting.
        </p>
        <p>
            Whether it be forecasting completion dates to measure against deadlines, running "health check" recons
            again your database to identify core issues, or having the foresight as a developer to plan for upcoming
            features, there are a number of ways to protect against the problems of the future. It's incredibly important
            to give these problems the attention they deserve. While they may not immediately effect you now, they'll
            definitely effect you in the future. If you treat warnings of future problems like many people treat global warming,
            the world will end up on fire, and you'll be left in confusion while the forecasters of the world say "I told you so".
        </p>
        <p>
            I've unfortunately seen this situation in more than one company I've worked at, and it always stemmed from
            management not appealing to the warnings of the developers or analysts. Even if they did listen, it was
            often too little too late, and one or more team members had already left due to being overworked.
            Not all management is like that, and the ones that trust their team members are the ones that triumph
            over smaller obstacles before they become too big to handle.
        </p>
    @endcomponent

    @component('components.portfolio-modal', ['key' => 'plane', 'source' => $practices])
        <p>
            Often when I'm asked to support a certain feature, I have an ideal architecture in mind.
            Unfortunately, we don't often have time to build the ideal architecture, as the client needs results fast.
            This is when the utopian architecture has to be split into phases, but done so in such a way that the end
            of each phase is stable, and the amount of rewriting in subsequent phases is minimized.
        </p>
        <p>
            All of the patterns mentioned already play a significant role in this. By building SOLID code with
            singular points of failure (DRY), tapering off the complex parts architecture (Let's Go Deeper) in ways
            that can be expanded later (Work for the Future), you deliver a minimally viable production quickly,
            but still ultimately provide the client what they really need (Tire Swing).
        </p>
        <p>
            The mentality behind "Build the Plane as you Fly" pairs incredibly well with the Agile process.
            You can quite easily break up the individual steps into sprints, and start estimating when the client
            will be able to initially use the product, as well as when the product is holistically finished.
        </p>
        <p>
            An additional benefit of this design pattern is that it avoids over architecting in the code.
            There are times where the perfect solution initially dreamt up is far more capable than what
            the client ever needed. For example, after breaking up the solution into five phases, you
            may discover that while the first phase was ready in week, the second in a month, and the
            third in a quarter, the fourth and fifth phases were actually unnecessary. You can always
            keep your design notes in case the additional phases are needed, but you don't have to
            spend development time on them.
        </p>

    @endcomponent

@endsection