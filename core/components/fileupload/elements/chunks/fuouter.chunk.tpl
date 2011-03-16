<div class="fu-outer">
    <form enctype="multipart/form-data" action="[[~[[*id]]]]" method="post">
        <input type="hidden" name="formid" value="[[+fileupload.formid]]" />
        <!-- MAX_FILE_SIZE must precede the file input field -->
        <input type="hidden" name="MAX_FILE_SIZE" value="[[+fileupload.maxsize]]" />
        [[+fu-inner]]

    <p>Note: Only files with the following extensions will be accepted ([[+fileupload.extensions]])</p>
    <input type="submit" value="[[+fu_upload_button_caption]]" />
    </form>
</div>
