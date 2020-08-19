<script src="{{ asset('/assets/admin/ckeditor/ckeditor.js')}}"></script> 
    <script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    </script>
    <script>
        $(document).ready(function(){
            // config CKS Editor With Laravel/FileManager
            CKEDITOR.replace('content', options, {
                height: 500,
            });
        })
    </script> 