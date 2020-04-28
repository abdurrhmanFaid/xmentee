@extends('design')

@section('title')
FAQ
@endsection

@section('content')
    <!-- =========== Start of Body ============ -->
    <section class="space bg-color--primary-light--1">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-md-5 col-lg-4 sidebar">
                    <div class="sticky-top mb-4 z-index1">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action font-size--18" data-scroll-nav="1"><span>Getting Started</span></a>
                            <a href="#" class="list-group-item list-group-item-action font-size--18" data-scroll-nav="2"><span>Pricing</span></a>
                        </div>
                    </div>
                </div>
                <!-- end of sidebar -->
                <div class="col-12 col-md-7">
                    <div class="article-entry accordion accordion--v2 remove-space--bottom" id="accordion1">
                        <div class="mb-6" data-scroll-index="1">
                            <h2 class="headline font-size--30 font-w--600 mb-4">Getting Started</h2>
                            <div class="card mb-1">
                                <button class="btn btn-header btn-link collapsed bg-white" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                    <span class="font-size--18 text-color--700 font-w--500">What is tickets system ? </span>
                                    <i class="icon icon-up-arrow"></i>
                                </button>
                                <div id="collapse1" class="collapse show" data-parent="#accordion1">
                                    <div class="card-body bg-white pl-3">
                                        <p>Every group has 3 kind of tickets</p>
                                        <ul>
                                            <li>
                                                1) Student ticket (not distributed by group) and it called requested ticket
                                            </li>
                                            <li>
                                                2) Student ticket (distributed by group) and it called unrequested ticket
                                            </li>
                                            <li>
                                                3) Instructor ticket
                                            </li>
                                        </ul>
                                        <h4 id="student-ticket-requested-">Student ticket (Requested)</h4>
                                        <ul>
                                            <li>Any user can request a ticket from available groups/teams and it status will be set to reviewing
                                                until the group instructors approve it
                                            </li>
                                            <li>Student who has approved ticket can register through it</li>
                                            <li>Team instructors can mark ticket status as <code>reviewing</code> or <code>approved</code> or <code>rejected</code> or they can remove it</li>
                                        </ul>
                                        <h4 id="student-ticket-un-requested-">Student ticket (Un-Requested)</h4>
                                        <ul>
                                            <li>Group Will have Two types tickets one for instructor ticket below, and the other one for student</li>
                                            <li>This ticket cannot be remove but it can updated only</li>
                                            <li>This ticket always has type of <code>approved</code></li>
                                            <li>Anyone use this ticket when registering, he will be join to group students</li>
                                            <li>It can has a usage limitation.</li>
                                        </ul>
                                        <h4 id="instructor-ticket">Instructor ticket</h4>
                                        <ul>
                                            <li>Anyone use this ticket when registering, he will be join to group instructors</li>
                                            <li>This ticket always has type of <code>approved</code></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end of single accordion-->
                            <div class="card mb-1">
                                <button class="btn btn-header btn-link bg-white" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                    <span class="font-size--18 text-color--700 font-w--500">How to submit a creation group request?</span>
                                    <i class="icon icon-up-arrow"></i>
                                </button>
                                <div id="collapse2" class="collapse" data-parent="#accordion1">
                                    <div class="card-body bg-white pl-3">
                                        <ul>
                                            <li class="mb-3">Visit <a href="{{route('bands.request')}}">This link</a>  and provide your <code>group/team name</code> and some other details.
                                            </li>
                                            <li class="mb-3">XMentee will review your request and approve or refuse it.</li>
                                            <li class="mb-3">If your request marked as approved you will receive an email from us which contains all details you need to start.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end of single accordion-->
                        </div>
                        <!-- end of Single group of accordions -->

                        <div class="mb-6" data-scroll-index="2">
                            <h2 class="headline font-size--30 font-w--600 mb-4">Pricing</h2>
                            <div class="card mb-1">
                                <button class="btn btn-header btn-link collapsed bg-white" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    <span class="font-size--18 text-color--700 font-w--500">How much does it cost ?</span>
                                    <i class="icon icon-up-arrow"></i>
                                </button>
                                <div id="collapse4" class="collapse" data-parent="#accordion1">
                                    <div class="card-body bg-white pl-3">
                                        <p>We will email you with all payment details if your group was approved to join to <b>XMenee</b.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of single accordion-->
                            <div class="card mb-1">
                                <button class="btn btn-header btn-link collapsed bg-white" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                    <span class="font-size--18 text-color--700 font-w--500">Can i join if i have a problem with the service price ?</span>
                                    <i class="icon icon-up-arrow"></i>
                                </button>
                                <div id="collapse5" class="collapse" data-parent="#accordion1">
                                    <div class="card-body bg-white pl-3">
                                        <p>Yes, Just submit the group creation request first and us know that after emailing you</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of Single group of accordions -->
                    </div>
                    <!-- end of FAQ row -->
                </div>
                <!-- end of accordions area col -->
            </div>
            <!-- end of accordions area row -->
        </div>
        <!-- end of container -->
    </section>
@endsection
