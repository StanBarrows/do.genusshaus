<script src="https://ucarecdn.com/libs/widget/3.2.1/uploadcare.full.min.js" charset="utf-8"></script>

<script>
    UPLOADCARE_PUBLIC_KEY = '{{ config('uploadcare.public_key') }}';

    UPLOADCARE_LOCALE = '{{ App::getLocale() }}';

    UPLOADCARE_CLEARABLE = '{{ config('uploadcare.clearable') }}';
    UPLOADCARE_IMAGES_ONLY = '{{ config('uploadcare.imagesOnly') }}';
    UPLOADCARE_DO_NOT_STORE = '{{ config('uploadcare.doNotStore') }}';

    UPLOADCARE_TABS = '{{ config('uploadcare.tabs') }}';
    UPLOADCARE_CROP = '{{ config('uploadcare.crop') }}';
    UPLOADCARE_IMAGE_SHRINK = '{{ config('uploadcare.imageShrink') }}';
</script>

