<script>
    UPLOADCARE_PUBLIC_KEY  = "{{config('services.uploadcare.key')}}";
    UPLOADCARE_LOCALE = "{{auth()->user()->locale()}}";
    UPLOADCARE_LIVE = false;
    UPLOADCARE_CLEARABLE = true;
</script>

<script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js" charset="utf-8"></script>
