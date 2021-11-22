jQuery(document).ready(function () {
    function isBase64(str) {
        if (str ==='' || str.trim() ===''){ return false; }
        try {
            return btoa(atob(str)) == str;
        } catch (err) {
            return false;
        }
    }

    jQuery(".abiroot_html").each(function (i, obj) {
        let id = jQuery(this).attr("id");
        let selectorString = "#" + id + " input";
        var tmce = tinymce.init({
            selector: selectorString,
            plugins: 'lists wordpress',
            // toolbar: 'numlist bullist',
            setup: function (editor) {
                editor.on('Change', function (e) {
                    console.log(editor.getContent());
                    jQuery(selectorString).val(btoa(editor.getContent()));
                });

                editor.on('init', function (e) {
                    try {
                        let editorContent = editor.getContent();
                        editorContent = jQuery(editorContent).text();
                        if(isBase64(editorContent)){
                            editorContent = atob(editorContent);
                        }
                        editor.setContent(editorContent);
                    } catch(e) {
                        console.log("String not valid base64");
                    }
                });
            }
        });

    });


});
