<script>
    $('.summernote-blog').summernote({
        height: 500,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ["fullscreen", "codeview", "help"]],
        ],

        onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable);
        }

    });

    function sendFile(file, editor, welEditable) {
        data = new FormData();
        data.append("file", file);
        $.ajax({
            data: data,
            type: "POST",
            url: "<?php echo base_url() ?>blog/upload_image",
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                editor.insertImage(welEditable, url);
            }
        });
    }
</script>