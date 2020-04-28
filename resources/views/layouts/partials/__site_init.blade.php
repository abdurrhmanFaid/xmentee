<script>
    @php
        $user = auth()->user();
    @endphp
    window.Init = {!! json_encode([
                'appName' => site('name'),
                'locale' => currentLocale(),
                'dir' => currentDir(),
                'userId' => $user ? $user->id : null,
                'username' => $user ? $user->username : null,
                'userType' => $user ? ! $user->ownsAnyBand() ? 'student' : 'instructor' : null,
                'userPoints' => $user ? $user->getPoints() : 0,
            ]) !!}
</script>
