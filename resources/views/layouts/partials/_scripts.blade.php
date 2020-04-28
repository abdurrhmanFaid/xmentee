<!-- Scripts  -->
<script src="{{theme('js', 'jquery.min.js')}}"></script>
<script src="{{theme('js', 'bootstrap.bundle.min.js')}}"></script>
<script src="{{theme('js', 'metisMenu.min.js')}}"></script>
<script src="{{theme('js', 'waves.min.js')}}"></script>
<script src="{{theme('js', 'jquery.slimscroll.min.js')}}"></script>
@stack('scripts')
<script src="/js/lang.js"></script>

@auth
    @if(($user = auth()->user())->isSuperAdmin())
        <script src="/js/admin.js"></script>
    @elseif($user->isInstructor() && !$user->isSuperAdmin())
        <script src="/js/instructor.js"></script>
    @else
        <script src="/js/student.js"></script>
    @endif
@else
    <script src="/js/guest.js"></script>
@endauth

<script src="{{theme('js', 'app.js')}}"></script>
