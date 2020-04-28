@extends('static.ar.design')

@section('title')
    مرحبآ
@endsection

@push('styles')
    <style>
        .s-data h2, p {
            text-align: right !important;
        }
    </style>
@endpush

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
                    <div class="hero-content reveal text-right">
                        <div class="cd-intro">
                            <h1 class="hero__title h2-font font-w--700 mb-2 cd-headline letters scale">
                                قم بإدرة فريقك وموارده بسهولة وبأمان وبسرعة
                            </h1>
                        </div>

                        <p class="hero__description text-color--700 opacity--70 font-size--20 mb-4 mb-lg-5 pr-xl-5">
                            XMentee هو نظام إدارة عبر الإنترنت تم إنشاؤه للفرق المتقدمة ، إذا كنت مدربًا ، يمكنك إدارة فريقك بسهولة باستخدام XMentee
                        </p>
                        <!-- end of text content -->

                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                            <a href="{{route('bands.request')}}" class="btn btn-hover--3d btn-bg--primary btn-size--lg mr-2">
                                <span class="btn__text">اضف مجموعتك الى XMentee الأن</span>
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
                        هل أنت مدرس أو مدرب أو مدير فريق ؟
                    </h2>
                    <p>
                        هنا يمكنك إدارة مجموعتك بسهولة ، XMentee ستجعل حياتك سهلة وستهتم بمعظم عملك!
                </div>
            </div>
            <!-- end of section title row -->
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto mb-3">
                    <div class="text-center">
                            <span class="icon--xl bg-color--primary rounded--full color--white mb-2">
                                <i class="fa fa-users"></i>
                            </span>
                        <h3 class="font-size--26 font-w--700">اجمع فريقك</h3>
                        <hr class="bg-color--primary border--none mx-auto mb-3 jsElement" data-height="3" data-width="80">
                        <p>
                            XMentee لديها نظام التذاكر لهذه النقطة. اجمع أعضاء فريقك واجعلهم ينضمون إلى فريقك / مجموعتك التي أنشأتها من قبل في <b> XMentee </b>
                        </p>
                    </div>
                    <!-- end of single feature -->
                </div>
                <!-- end of row -->
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto mb-3">
                    <div class="text-center">
                            <span class="icon--xl bg-color--primary rounded--full color--white mb-2">
                                <i class="fa fa-tasks"></i>
                            </span>
                        <h3 class="font-size--26 font-w--700">قم بإدارة مجموعتك</h3>
                        <hr class="bg-color--primary border--none mx-auto mb-3 jsElement" data-height="3" data-width="80">
                        <p>
                            أنت حر في تخصيص وإدارة إعدادات مجموعتك والأعضاء ومجموعات الأعضاء والمهام والدروس والمنشورات والمدفوعات والمزيد.
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
                        <h3 class="font-size--26 font-w--700">إحمى موارد فريقك</h3>
                        <hr class="bg-color--primary border--none mx-auto mb-3 jsElement" data-height="3" data-width="80">
                        <p>يمكن الوصول إلى جميع موارد فريقك من قبل أعضاء الفريق فقط وأنت المدرب ولا يمكن لأي شخص آخر الوصول إليها.</p>
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

        <div class="s-data position-relative mb-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row-reverse align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <div class="mb-3 mb-md-5">
                            <h2 class="mb-2 h3-font mb-md-3 font-w--700">
                                نظام التذاكر
                            </h2>
                            <p>
                                للتأكد من دعوة المستخدم الذي يريد الانضمام إلى فريقك / مجموعتك من قِبل المدرب ، لدى XMentee نظام تذاكر تم إنشاؤه لهذه النقطة.
                                <br>
                                برجاء زيارة
                                <a class="badge badge-sm badge-light" href="{{route('faq')}}">كيف يعمل نظام التذاكر</a>
                                لمعلومات إضافيه
                            </p>
                        </div>
                        <!-- end of content -->

                        <div class="row text-md-left justify-content-center">
                            <div class="col-12 col-sm-6 d-flex flex-column flex-md-row mb-4">
                                <span class="icon--3x mr-md-2 mb-1 mb-md-0 color--white"><i class="icon icon-touch-id"></i></span>
                                <div>
                                    <h3 class="h5-font font-w--700 mb-sm-1">مدرب</h3>
                                    <p>تذكرة فقط لمدربين المجموعة .</p>
                                </div>
                            </div>
                            <!-- end of single iteam -->
                            <div class="col-12 col-sm-6 d-flex flex-column flex-md-row mb-4">
                                <span class="icon--3x mr-md-2 mb-1 mb-md-0 color--white"><i class="icon icon-arrow-right"></i></span>
                                <div>
                                    <h3 class="h5-font font-w--700 mb-sm-1">طالب نوع 1</h3>
                                    <p>تذكرة تم توزيعها بواسطة مدربين المجموعة</p>
                                </div>
                            </div>
                            <!-- end of single iteam -->
                            <div class="col-12 col-sm-6 d-flex flex-column flex-md-row mb-4">
                                <span class="icon--3x mr-md-2 mb-1 mb-md-0 color--white"><i class="icon icon-search"></i></span>
                                <div>
                                    <h3 class="h5-font font-w--700 mb-sm-1">طالب نوع 2</h3>
                                    <p>تذكرة مطلوبة من قبل أي مستخدم</p>
                                </div>
                            </div>
                            <!-- end of single iteam -->
                            <div class="col-12 col-sm-6 d-flex flex-column flex-md-row mb-4">
                                <span class="icon--3x mr-md-2 mb-1 mb-md-0 color--white"><i class="icon icon-link-broken"></i></span>
                                <div>
                                    <h3 class="h5-font font-w--700 mb-sm-1">مقابلات أو أسئلة اونلاين </h3>
                                    <p>قم بإجراء مقابلات أو أسئلة لطلابك قبل الانضمام إلى مجموعتك</p>
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

        <div class="s-data position-relative mb-xl-10 pb-7 py-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <h2 class="mb-3 h3-font font-w--700">
                            الفئات
                        </h2>
                        <p class="opacity--80">
                            يتيح <b> XMentee </b>
                            إنشاء أكثر من فئة لمجموعتك. هذا سوف يساعد على تصنيف الدروس ، المشاركات.
                            على سبيل المثال ، تهتم مجموعتك بالتسويق حتى تتمكن من إنشاء هذا كفئة ثم
                            يمكن لأي عضو من أعضاء فريقك إضافة منشور في هذه الفئة ، كما يمكنك إضافة دروسك في هذه الفئة.
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

        <div class="s-data position-relative mb-xl-10 py-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row-reverse align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <div class="mb-3 mb-md-5">
                            <h2 class="mb-2 h3-font mb-md-3 font-w--700">
                                المشاركات
                            </h2>
                            <p>
                                يمكن لأي عضو من أعضاء فريقك نشر منشورات من نوع الأسئلة والمشورة والمعلومات وغيرها. هذا سوف يساعد الطلاب بجعلهم يتمتعون بوصول سريع للوظائف ،
                                كما يمكن لجميع الطلاب التفاعل مع المنشورات ، ويمكنهم التقييم والاشتراك والتعليق والمزيد.
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

        <div class="s-data position-relative mb-xl-10 pb-7 py-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <h2 class="mb-3 h3-font font-w--700">
                            نظام النقاط
                        </h2>
                        <p class="opacity--80">
                            يحتوى  <b>XMentee</b>
                            على نظام نقاط. بمجرد أن ينشر أحدهم مشاركة ما على سبيل المثال ، سيتلقى بعض النقاط.
                            ليس فقط عند نشر المشاركات ، ولكن أيضًا عند التعليق وحل المهام والتعليق والمزيد.
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

        <div class="s-data position-relative mb-xl-10 py-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row-reverse align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <div class="mb-3 mb-md-5">
                            <h2 class="mb-2 h3-font mb-md-3 font-w--700">
                                الدروس
                            </h2>
                            <p>
                                يمكن لأي مدرب في فريقك نشر درس لتسهيل وصول الطلاب عبر
                                هذه المنصة. يمكنك تحميل الدرس الخاص بك إلى <b> XMentee </b>  بسهولة بالغة وسيحصل الطلاب على إشعار
                                حول الدرس بمجرد تحميله.
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

        <div class="s-data position-relative mb-xl-10 pb-7 py-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <h2 class="mb-3 h3-font font-w--700">
                            المجموعات
                        </h2>
                        <p class="opacity--80">
                            يمكنك تعيين مجموعة من الأعضاء في فريقك. هذا سوف يساعد في تعيين مهام إلى
                            مجموعة / مجموعات. أيضا نظام النقاط سوف يتغير قليلا. بمجرد حصول أحد أعضاء المجموعة على بعض النقاط ، فإن أعضاء المجموعة / المجموعات أيضًا
                            سوف تستفيد من هذا. بالطبع يمكنك إضافة أي عضو في أكثر من مجموعة.
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

        <div class="s-data position-relative mb-xl-10 py-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row-reverse align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <div class="mb-3 mb-md-5">
                            <h2 class="mb-2 h3-font mb-md-3 font-w--700">
                                المهام
                            </h2>
                            <p>
                                <b> المهام </b> ميزة مفيدة للغاية. يساعدك <b> XMentee </b> في تعيين مهمة
                                إلى أي عضو / أعضاء في فريقك أو أي مجموعة / مجموعات في فريقك.
                                يمكنهم حلها وسوف تتلقى إشعارًا وبعد ذلك يمكنك تصحيح هذه المهمة.
                                سيحصل الطلاب على نقاط إذا حددت المهمة على انها محلولة بشكل صحيح.
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

        <div class="s-data position-relative mb-xl-10 pb-7 py-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <h2 class="mb-3 h3-font font-w--700">
                            الإحصائيات
                        </h2>
                        <p class="opacity--80">
                            سيقدم <b> XMentee </b> تقريرًا كاملاً وإحصائيات حول المستخدمين والمهام والمدفوعات والمعلومات حول
                            جميع الميزات التي يتضمنها <b> XMentee </b>.
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

        <div class="s-data position-relative mb-xl-10 py-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row-reverse align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <div class="mb-3 mb-md-5">
                            <h2 class="mb-2 h3-font mb-md-3 font-w--700">
                                المدفوعات
                            </h2>
                            <p>
                                ذا قمت بتقديم دروس مدفوعة ، فيمكنك إضافة دفعة لأي طالب في فريقك.
                                سيتلقى الطالب إشعارًا بالدفع بمجرد تعيينه له.
                                يمكنك تخصيص مبلغ الدفعة لكل طالب ،
                                كما يمكنك تنبيه الطلاب الذين لم يدفعوا قبل الموعد النهائي. كما يمكنك إضافة المدفوعات التي
                                قد دفعت بالفعل من قبل.
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

        <div class="s-data position-relative mb-xl-10 pb-7 py-xl-10">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left">
                        <div class="mb-3 mb-md-5">
                            <h2 class="mb-2 h3-font mb-md-3 font-w--700">
                                الدفعات
                            </h2>
                            <p>
                                يمكنك إنشاء دفعات غير محدودة. فقط قم بتعيين الدفعة المفتوحة التي ستتلقى الأعضاء الجدد
                                وسيتم تعيينهم لذلك.
                                سيساعدك ذلك في حالة وجود أكثر من دفعة واحدة وتريد الحصول على إحصائيات حول كل دفعة.
                                سيتمكن الطلاب في جميع المجموعات من الوصول إلى جميع مشاركات الفريق <b> لكن </b> سيتم الوصول إلى الدروس من خلال
                                أعضاء دفعة فقط.
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
                        <h3 class="h5-font font-w--700 mb-1">منظم</h3>
                        <p class="font-size--16">سيتم تنظيم موارد فريقك بدرجة عالية.</p>
                    </div>
                    <!-- end of card -->
                </div>
                <!-- end if single iteam col -->
                <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
                    <div class="card border--none bg-white text-center box-shadow--4 py-4 px-2 d-flex align-items-center card-hover--shadow-3d">
                        <span class="icon--lg color--primary bg-color--primary-opacity--10 rounded--full mb-2"> <i class="fa fa-link"></i></span>
                        <h3 class="h5-font font-w--700 mb-1">متصلا للغاية</h3>
                        <p class="font-size--16">
                            سوف تكون متصلا جدا بطلابك ، أيضا
                            طلابك متواصلون معك بك وبأصدقائهم.
                        </p>
                    </div>
                    <!-- end of card -->
                </div>
                <!-- end if single iteam col -->
                <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
                    <div class="card border--none bg-white text-center box-shadow--4 py-4 px-2 d-flex align-items-center card-hover--shadow-3d">
                        <span class="icon--lg color--primary bg-color--primary-opacity--10 rounded--full mb-2"><i class="fa fa-lock"></i></span>
                        <h3 class="h5-font font-w--700 mb-1">آمن</h3>
                        <p class="font-size--16">موارد الفريق ستكون آمنة. لا يمكن لأي شخص خارج فريقك الوصول إليه.</p>
                    </div>
                    <!-- end of card -->
                </div>
                <!-- end if single iteam col -->
                <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
                    <div class="card border--none bg-white text-center box-shadow--4 py-4 px-2 d-flex align-items-center card-hover--shadow-3d">
                        <span class="icon--lg color--primary bg-color--primary-opacity--10 rounded--full mb-2"><i class="fa fa-user-clock"></i></span>
                        <h3 class="h5-font font-w--700 mb-1">موفر للوقت</h3>
                        <p class="font-size--16">
                            سيوفر وقتك وعملك التقليدي.
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
                            <span class="color--primary">هل أنت مهتم بالانضمام؟</span>
                            <br> نحن نقبل فقط الفرق / المجموعات المتقدمة.</h2>
                        <p class="mb-4 mb-lg-7 px-lg-6">
                            <b> XMentee </b> مصمم للفرق المتقدمة. وهذا يعني أنك تقدم تدريبًا متقدمًا لطلابك.
                            لذلك لا يوجد مكان للفرق أو الدورات التقليدية.
                            إذا كنت ترى أن لديك فريقًا متقدمًا فلا تتردد في طلب إضافة فريقك إلى XMentee ، فما عليك سوى إرسال النموذج وتقديم معلومات مفصلة بالكامل
                            حول فريقك ، ثم سنراجع طلبك ونتخذ إجراءً.
                            بمجرد قبولك ، ستتلقى رسالة إلى بريدك إلكتروني منا تحتوي على تذكرة من النوع [مدرب] ، يمكنك تسجيل حساب
                            من خلال ذلك ، وسوف ننشأ فريقك تلقائيا وتعيينك كمدرب.
                        </p>
                        <a class="btn btn-bg--primary lightbox reveal" href="{{route('bands.request')}}">
                            <span class="btn__text"><i class="fa fa-user-plus mr-1 font-size--30"></i>إرسال طلب إنشاء مجموعة</span>
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
                    <h2 class="mb-2 font-size--40 font-w--700">أحدث الفرق المنضمة إلى <b>XMentee</b></h2>
                    <p>
                        <b> XMentee </b> هو مشروع جديد يحتوي على عدد صغير فقط من المجموعات المتقدمة ، ولكن السبب الرئيسي
                        لوجود هذا المشروع هو مساعدة الفرق المتقدمة لجعل حياتهم التعليمية اسهل.
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
                        كن الفريق المنضم التالي
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
