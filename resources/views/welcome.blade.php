@extends('design')

@section('title')
    Welcome
@endsection

@section('content')
    <!-- =========== Start of Hero ============ -->
    <section class="hero hero--full hero--v11 bg-color--primary-light--1 d-flex align-items-center ">
        <div class="svg-shape--top w-100">
            <img src="/theme0/img/layout/wave-8.svg" class="svg fill--white">
        </div>
        <!-- end of whole area svg bg -->
        <div class="svg-shape--top">
            <img src="/theme0/img/layout/wave-9.svg" class="svg fill-primary-light--1">
        </div>
        <!-- end of top right mini svg shape -->
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-12 col-md-10 col-lg-7 mx-auto mx-lg-0 text-center text-lg-left z-index2">
                    <div class="hero-content reveal">
                        <div class="cd-intro">
                            <h1 class="hero__title h2-font font-w--700 mb-2 cd-headline letters scale">
                                Manage your team and its resources
                                <span class="cd-words-wrapper color--primary">
                                    <b class="is-visible">Easily</b>
                                    <b>Regularly</b>
                                    <b>Securely</b>
                                    <b>Fastly</b>
                                </span>
                            </h1>
                        </div>

                        <p class="hero__description text-color--700 opacity--70 font-size--20 mb-4 mb-lg-5 pr-xl-5">{{site('description')}}</p>
                        <!-- end of text content -->

                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                            <a href="{{route('bands.request')}}" class="btn btn-hover--3d btn-bg--primary btn-size--lg mr-2">
                                <span class="btn__text">Add your Group to XMentee now</span>
                            </a>
                        </div>
                        <!-- end of button -->
                    </div>
                    <!-- end of content -->
                </div>
                <!-- end of col -->
                <div class="col-12 col-lg-6 mt-6 mt-lg-0 mb-3 mb-lg-0 pl-lg-7 pb-lg-3 pos-abs-lg-vertical-center pos-right hero__image">
                    <picture><img src="/theme0/img/w1.jpg" class="img-fluid reveal"></picture>
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
    </section>
    <!-- =========== End of Hero ============ -->

    <!-- =========== Start of Core Feautes ============ -->
    <section class="py-4 pb-lg-10">
        <div class="section-overlap bg-color--primary-light--1 pos-abs-top jsElement" data-height="360"></div>
        <!-- end of section overlap bg -->

        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-9 col-lg-6 mb-4 mb-lg-7 mx-auto text-center reveal">
                    <h2 class="mb-2 font-size--40 font-w--700">
                        Are you an Instructor or team manager or teacher ?
                    </h2>
                    <p>In here you can manage your group easily, <b class="color-primary">XMentee</b> will make your life easy and it will take care of most of your work!</p>
                </div>
            </div>
            <!-- end of section title row -->
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto mb-3">
                    <div class="text-center">
                            <span class="icon--xl bg-color--primary rounded--full color--white mb-2">
                                <i class="fa fa-users"></i>
                            </span>
                        <h3 class="font-size--26 font-w--700">Collect Your Team</h3>
                        <hr class="bg-color--primary border--none mx-auto mb-3 jsElement" data-height="3" data-width="80">
                        <p>
                            XMentee has Tickets System For this point.
                            Collect your team members and make them join your team/group which you have created before in <b>XMentee</b></p>
                    </div>
                    <!-- end of single feature -->
                </div>
                <!-- end of row -->
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto mb-3">
                    <div class="text-center">
                            <span class="icon--xl bg-color--primary rounded--full color--white mb-2">
                                <i class="fa fa-tasks"></i>
                            </span>
                        <h3 class="font-size--26 font-w--700">Manage Your Group</h3>
                        <hr class="bg-color--primary border--none mx-auto mb-3 jsElement" data-height="3" data-width="80">
                        <p>
                            You are free to do customize & managing your group settings, members, groups of members, tasks, lessons, posts, payments and more.
                        </p>
                    </div>
                    <!-- end of single feature -->
                </div>
                <!-- end of row -->
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto mb-3">
                    <div class="text-center">
                            <span class="icon--xl bg-color--primary rounded--full color--white mb-2">
                                <i class="fa fa-lock"></i>
                            </span>
                        <h3 class="font-size--26 font-w--700">Protect your team resources</h3>
                        <hr class="bg-color--primary border--none mx-auto mb-3 jsElement" data-height="3" data-width="80">
                        <p>All of your team resources can accessed by team members only and you the instructor and no one else can access it.</p>
                    </div>
                    <!-- end of single feature -->
                </div>
                <!-- end of row -->
            </div>
        </div>
    </section>
    <!-- =========== End of Core Feautes ============ -->

    <!-- =========== Start of Content Blocks ============ -->
    <section class="space bg-color--primary mx-xl-5">
        <div class="svg-shape--top w-100 z-index1">
            <img src="/theme0/img/layout/braces.svg" class="svg w-100 fill--white">
        </div>
        <!-- end of top braces svg shape -->
        <div class="svg-shape--top opacity--05">
            <img src="/theme0/img/layout/wave-11.svg" class="svg fill--white">
        </div>
        <!-- end of top right mini svg shape -->
        <div class="svg-shape opacity--05">
            <img src="/theme0/img/layout/wave-10.svg" class="svg fill--white">
        </div>
        <!-- end of top right mini svg shape -->

        <div class="position-relative mb-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row-reverse align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <div class="mb-3 mb-md-5">
                            <h2 class="mb-2 h3-font mb-md-3 font-w--700">
                                TICKETS SYSTEM
                            </h2>
                            <p>
                                To check that the user who want to join your team/group is invited by you the instructor, <b>XMentee</b>
                                have a tickets system created for this point.
                                <br>
                                Please visit <a class="badge badge-sm badge-light" href="https://www.xmentee.com/faq">How tickets system works</a> For more information.
                            </p>
                        </div>
                        <!-- end of content -->

                        <div class="row text-md-left justify-content-center">
                            <div class="col-12 col-sm-6 d-flex flex-column flex-md-row mb-4">
                                <span class="icon--3x mr-md-2 mb-1 mb-md-0 color--white"><i class="icon icon-touch-id"></i></span>
                                <div>
                                    <h3 class="h5-font font-w--700 mb-sm-1">Instructor</h3>
                                    <p>Ticket only for group instructors.</p>
                                </div>
                            </div>
                            <!-- end of single iteam -->
                            <div class="col-12 col-sm-6 d-flex flex-column flex-md-row mb-4">
                                <span class="icon--3x mr-md-2 mb-1 mb-md-0 color--white"><i class="icon icon-arrow-right"></i></span>
                                <div>
                                    <h3 class="h5-font font-w--700 mb-sm-1">Student type 1</h3>
                                    <p>A Ticket that Distributed by group instructors</p>
                                </div>
                            </div>
                            <!-- end of single iteam -->
                            <div class="col-12 col-sm-6 d-flex flex-column flex-md-row mb-4">
                                <span class="icon--3x mr-md-2 mb-1 mb-md-0 color--white"><i class="icon icon-search"></i></span>
                                <div>
                                    <h3 class="h5-font font-w--700 mb-sm-1">Student type 2</h3>
                                    <p>A ticket that Requested by any user</p>
                                </div>
                            </div>
                            <!-- end of single iteam -->
                            <div class="col-12 col-sm-6 d-flex flex-column flex-md-row mb-4">
                                <span class="icon--3x mr-md-2 mb-1 mb-md-0 color--white"><i class="icon icon-link-broken"></i></span>
                                <div>
                                    <h3 class="h5-font font-w--700 mb-sm-1">Online Interviews</h3>
                                    <p>Make an online interviews for your students before joining your group</p>
                                </div>
                            </div>
                            <!-- end of single iteam -->
                        </div>
                        <!-- end of points row -->
                    </div>
                    <!-- end of content col -->
                    <div class="col-12 col-lg-6 mb-3 mb-lg-0 pos-abs-lg-vertical-center pos-left text-lg-right pr-lg-10">
                        <picture><img src="/theme0/img/ticket.png" class="img-fluid reveal"></picture>
                    </div>
                    <!-- enf of image col -->
                </div>
                <!-- end of content block-1 row -->
            </div>
            <!-- end of content block 1 container -->
        </div>
        <!--== end of content block 1 ==-->

        <div class="position-relative mb-xl-10 pb-7 py-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <h2 class="mb-3 h3-font font-w--700">
                            CATEGORIES
                        </h2>
                        <p class="opacity--80">
                            <b>XMentee</b> allows creating more than one category for your group. This will help with categorizing lessons, posts.
                            For example Your group are interested in Marketing so you can create this as a category and then
                            any member of you team can add a post in this category, Also you can add your lessons in this category.
                        </p>
                        <!-- end of content col -->
                    </div>
                    <div class="col-12 col-lg-6 mt-5 mt-lg-0 mb-3 mb-lg-0 pl-lg-10 pos-abs-lg-vertical-center pos-right text-lg-left">
                        <picture><img src="/theme0/img/categories.png" class="img-fluid reveal"></picture>
                    </div>
                    <!-- enf of image col -->
                </div>
                <!-- end of content block 2 row -->
            </div>
            <!-- end of content block 2 container -->
        </div>
        <!--== end of content block 2 ==-->

        <div class="position-relative mb-xl-10 py-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row-reverse align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <div class="mb-3 mb-md-5">
                            <h2 class="mb-2 h3-font mb-md-3 font-w--700">
                                POSTS
                            </h2>
                            <p>
                                Any member of your team can publish posts of type question, advice, information and others. This will help students by make them have fast access for posts, also all students can interact with posts, they can rate, subscribe, comment and more.
                            </p>
                        </div>
                        <!-- end of content -->
                    </div>
                    <!-- end of content col -->
                    <div class="col-12 col-lg-6 mb-3 mb-lg-0 pos-abs-lg-vertical-center pos-left text-lg-right pr-lg-10">
                        <picture><img src="/theme0/img/posts.png" class="img-fluid reveal"></picture>
                    </div>
                    <!-- enf of image col -->
                </div>
                <!-- end of content block-1 row -->
            </div>
            <!-- end of content block 1 container -->
        </div>
        <!--== end of content block 3 ==-->

        <div class="position-relative mb-xl-10 pb-7 py-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <h2 class="mb-3 h3-font font-w--700">
                            POINTS
                        </h2>
                        <p class="opacity--80">
                            <b>XMentee</b> has points system. Once any one publish a post for example he will receive some points because of his action.
                            Not only when publishing a posts, but also when commenting, solving tasks, commenting, and more.
                        </p>
                        <!-- end of content col -->
                    </div>
                    <div class="col-12 col-lg-6 mt-5 mt-lg-0 mb-3 mb-lg-0 pl-lg-10 pos-abs-lg-vertical-center pos-right text-lg-left">
                        <picture><img src="/theme0/img/points.png" class="img-fluid reveal"></picture>
                    </div>
                    <!-- enf of image col -->
                </div>
                <!-- end of content block 3 row -->
            </div>
            <!-- end of content block 3 container -->
        </div>
        <!--== end of content block 4 ==-->

        <div class="position-relative mb-xl-10 py-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row-reverse align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <div class="mb-3 mb-md-5">
                            <h2 class="mb-2 h3-font mb-md-3 font-w--700">
                                LESSONS
                            </h2>
                            <p>
                                Any instructor in your team can publish a lesson to make it easy to access by students via
                                this platform. You can upload your lesson to <b>XMentee</b> very easy and students will receive a notification
                                about your lesson once you uploaded it.
                            </p>
                        </div>
                        <!-- end of content -->
                    </div>
                    <!-- end of content col -->
                    <div class="col-12 col-lg-6 mb-3 mb-lg-0 pos-abs-lg-vertical-center pos-left text-lg-right pr-lg-10">
                        <picture><img src="/theme0/img/lessons.png" class="img-fluid reveal"></picture>
                    </div>
                    <!-- enf of image col -->
                </div>
                <!-- end of content block-1 row -->
            </div>
            <!-- end of content block 1 container -->
        </div>
        <!--== end of content block 5 ==-->

        <div class="position-relative mb-xl-10 pb-7 py-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <h2 class="mb-3 h3-font font-w--700">
                            GROUPS
                        </h2>
                        <p class="opacity--80">
                            You can set a group of members in your team. This will help in assigning a tasks for a specific
                            group/groups. Also points system will change a little bit. Once one of the group members has receive some points, his group/groups members also
                            will benefit from this. Of course you can add any member in more than one group.
                        </p>
                        <!-- end of content col -->
                    </div>
                    <div class="col-12 col-lg-6 mt-5 mt-lg-0 mb-3 mb-lg-0 pl-lg-10 pos-abs-lg-vertical-center pos-right text-lg-left">
                        <picture><img src="/theme0/img/groups.png" class="img-fluid reveal"></picture>
                    </div>
                    <!-- enf of image col -->
                </div>
                <!-- end of content block 3 row -->
            </div>
            <!-- end of content block 3 container -->
        </div>
        <!--== end of content block 6 ==-->

        <div class="position-relative mb-xl-10 py-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row-reverse align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <div class="mb-3 mb-md-5">
                            <h2 class="mb-2 h3-font mb-md-3 font-w--700">
                                TASKS
                            </h2>
                            <p>
                                <b>TASKS</b> is very useful feature. <b>XMentee</b> helps you to assign a task
                                to any member/members in your team or any group/groups in your team.
                                They can solve it and you will receive a notification and then you can mark this task.
                                Students will receive a points if you marked the task as solved.
                            </p>
                        </div>
                        <!-- end of content -->
                    </div>
                    <!-- end of content col -->
                    <div class="col-12 col-lg-6 mb-3 mb-lg-0 pos-abs-lg-vertical-center pos-left text-lg-right pr-lg-10">
                        <picture><img src="/theme0/img/tasks.png" class="img-fluid reveal"></picture>
                    </div>
                    <!-- enf of image col -->
                </div>
                <!-- end of content block-7 row -->
            </div>
            <!-- end of content block 7 container -->
        </div>
        <!--== end of content block 7 ==-->

        <div class="position-relative mb-xl-10 pb-7 py-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <h2 class="mb-3 h3-font font-w--700">
                            STATISTICS
                        </h2>
                        <p class="opacity--80">
                            <b>XMentee</b> will provide a full report, statistics about users, tasks, payments and information about
                            all the entire features which <b>XMentee</b> includes.
                        </p>
                        <!-- end of content col -->
                    </div>
                    <div class="col-12 col-lg-6 mt-5 mt-lg-0 mb-3 mb-lg-0 pl-lg-10 pos-abs-lg-vertical-center pos-right text-lg-left">
                        <picture><img src="/theme0/img/statistics.png" class="img-fluid reveal"></picture>
                    </div>
                    <!-- enf of image col -->
                </div>
                <!-- end of content block 8 row -->
            </div>
            <!-- end of content block 8 container -->
        </div>
        <!--== end of content block 8 ==-->

        <div class="position-relative mb-xl-10 py-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row-reverse align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <div class="mb-3 mb-md-5">
                            <h2 class="mb-2 h3-font mb-md-3 font-w--700">
                                PAYMENTS
                            </h2>
                            <p>
                                If you provide a paid lessons you can add a payment for any student in your team.
                                Student will receive a notification about the payment once  the it assigned to him.
                                You can customize payment amount for every single student,
                                also you can alarm students who have not paid before the deadline. Also you can add payments which
                                have already paid before.
                            </p>
                        </div>
                        <!-- end of content -->
                    </div>
                    <!-- end of content col -->
                    <div class="col-12 col-lg-6 mb-3 mb-lg-0 pos-abs-lg-vertical-center pos-left text-lg-right pr-lg-10">
                        <picture><img src="/theme0/img/payments.png" class="img-fluid reveal"></picture>
                    </div>
                    <!-- enf of image col -->
                </div>
                <!-- end of content block-9 row -->
            </div>
            <!-- end of content block 9 container -->
        </div>
        <!--== end of content block 9 ==-->

        <div class="position-relative mb-xl-10 pb-7 py-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <div class="mb-3 mb-md-5">
                            <h2 class="mb-2 h3-font mb-md-3 font-w--700">
                                BATCHES
                            </h2>
                            <p>
                                You can create unlimited batches. Just assign the opened batch that will receive the newly members
                                and they will be assigned to the it.
                                This will help you in case you have more than one batch and you want to get statistics about every batch.
                                Students in all batches will have access to all team posts <b> But </b> Lessons will be accessed Through
                                batch members only.
                            </p>
                        </div>
                        <!-- end of content -->
                    </div>
                    <!-- end of content col -->
                    <div class="col-12 col-lg-6 mt-5 mt-lg-0 mb-3 mb-lg-0 pl-lg-10 pos-abs-lg-vertical-center pos-right text-lg-left">
                        <picture><img src="/theme0/img/batches.png" class="img-fluid reveal"></picture>
                    </div>
                    <!-- enf of image col -->
                </div>
                <!-- end of content block-10 row -->
            </div>
            <!-- end of content block 10 container -->
        </div>
        <!--== end of content block 10 ==-->
    </section>
    <!-- =========== Start of Content Blocks ============ -->

    <!-- =========== Start of Features ============ -->
    <section class="space--bottom jsElement" data-pull="-60">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
                    <div class="card border--none bg-white text-center box-shadow--4 py-4 px-2 d-flex align-items-center card-hover--shadow-3d">
                        <span class="icon--lg color--primary bg-color--primary-opacity--10 rounded--full mb-2"> <i class="fa fa-list-alt"></i> </span>
                        <h3 class="h5-font font-w--700 mb-1">Organized</h3>
                        <p class="font-size--16">Your team resources will be highly organized.</p>
                    </div>
                    <!-- end of card -->
                </div>
                <!-- end if single iteam col -->
                <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
                    <div class="card border--none bg-white text-center box-shadow--4 py-4 px-2 d-flex align-items-center card-hover--shadow-3d">
                        <span class="icon--lg color--primary bg-color--primary-opacity--10 rounded--full mb-2"> <i class="fa fa-link"></i></span>
                        <h3 class="h5-font font-w--700 mb-1">Highly Connected</h3>
                        <p class="font-size--16">
                            You will be very connected to your students, also
                            Your students will be connected to you and their friends.
                        </p>
                    </div>
                    <!-- end of card -->
                </div>
                <!-- end if single iteam col -->
                <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
                    <div class="card border--none bg-white text-center box-shadow--4 py-4 px-2 d-flex align-items-center card-hover--shadow-3d">
                        <span class="icon--lg color--primary bg-color--primary-opacity--10 rounded--full mb-2"><i class="fa fa-lock"></i></span>
                        <h3 class="h5-font font-w--700 mb-1">Secure</h3>
                        <p class="font-size--16">You team resources will be secure. No one outside your team can access it.</p>
                    </div>
                    <!-- end of card -->
                </div>
                <!-- end if single iteam col -->
                <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
                    <div class="card border--none bg-white text-center box-shadow--4 py-4 px-2 d-flex align-items-center card-hover--shadow-3d">
                        <span class="icon--lg color--primary bg-color--primary-opacity--10 rounded--full mb-2"><i class="fa fa-user-clock"></i></span>
                        <h3 class="h5-font font-w--700 mb-1">Time Saver</h3>
                        <p class="font-size--16">
                            It will save your time and your traditional work.
                        </p>
                    </div>
                    <!-- end of card -->
                </div>
                <!-- end if single iteam col -->
            </div>
        </div>
    </section>
    <!-- =========== End of Features ============ -->

    <!-- =========== Start of Content Block Big ============ -->
    <section>
        <div class="svg-shape--top w-100 z-index1">
            <img src="/theme0/img/layout/braces.svg" class="svg w-100 fill--white">
        </div>
        <!-- end of top braces svg shape -->
        <div class=" bg-color--primary-light--1 space--top position-relative z-index2">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 mx-auto text-center reveal">
                        <h2 class="mb-3 font-size--40 font-w--700">
                            <span class="color--primary">Interested in joining ? </span>
                            <br> We only accept advanced teams/groups.</h2>
                        <p class="mb-4 mb-lg-7 px-lg-6">
                            <b>XMentee</b> designed for advanced teams. Meaning that you are providing an advanced training for your students.
                            So there is not place for traditional teams or courses.
                            If you see that you have an advanced team feel free to request to add your team to XMentee, Just submit the form and provide a fully detailed information
                            about your team then we will review your request and take an action.
                            Once you accepted you will receive an email from us with a ticket of type [instructor], You can register an account
                            through it and it will automatically generate your team and assign you as an instructor.
                        </p>
                        <a class="btn btn-bg--primary lightbox reveal" href="{{route('bands.request')}}">
                            <span class="btn__text"><i class="fa fa-user-plus mr-1 font-size--30"></i>Submit a group creation request</span>
                        </a>
                    </div>
                </div>
                <!-- end of section title row -->
            </div>
        </div>
        <!-- end of text content -->

        <div class="text-center position-relative space--bottom space--top--2 jsElement" data-pull="-40">
            <div class="svg-shape--top w-100 z-index1">
                <img src="/theme0/img/layout/wave-12.svg" class="svg fill-primary-light--1 w-100">
            </div>
            <!-- end of top braces svg shape -->
            <picture class="position-relative"><img class="img-fluid" src="/theme0/img/illustration-18.png" alt=""></picture>
        </div>
        <!-- end of image -->
    </section>
    <!-- =========== End of Content Block Big ============ -->

    <!-- =========== Start of Social Buttons ============ -->
    <section class="bg-color--primary-light--1 pt-6 pb-7 pb-lg-10">
        <div class="container">
            <div class="row">
                <div class="col-12 mx-auto text-center">
                    <h2 class="mb-2 font-size--40 font-w--700">Latest joined teams</h2>
                    <p>
                        <b>XMentee</b> is a new project with just a small count of advanced groups, but the main
                        reason this project exists is to help advanced teams to make their education life easy.
                    </p>
                    <br>
                    <div class="icon-fill--wide text-center d-lg-flex justify-content-lg-center flex-wrap reveal">
                        @foreach(\App\Models\Band::latest()->limit(4)->get(['name']) as $band)
                            <span class="t-icon box-shadow--5 rounded--05 m-1 btn-hover--primary">
                                <span class="t-icon__brand-icon h4-font color--primary"><i class="fa fa-users"></i></span>
                                <span class="t-icon__brand-name h5-font font-w--500 text-color--700">{{$band->name}}</span>
                            </span>
                        @endforeach
                    </div>
                    <hr>
                    <!-- end of icon group -->
                    <a class="btn btn-size--sm btn-hover--splash color--info btn-bg--success--05 btn-success" href="{{route('bands.request')}}">
                        Be the next joined team
                    </a>
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </section>
    <!-- =========== End of Social Buttons ============ -->
@endsection
