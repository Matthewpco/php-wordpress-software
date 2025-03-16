<?php

function wpst_enqueue_codemirror() {
    $cm_url = 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.58.3/';
    wp_enqueue_style('codemirror-css', $cm_url . 'codemirror.min.css');
    wp_enqueue_script('codemirror-js', $cm_url . 'codemirror.min.js', array(), false, true);
    wp_enqueue_script('codemirror-mode-js', $cm_url . 'mode/javascript/javascript.min.js', array('codemirror-js'), false, true);
}
add_action('admin_enqueue_scripts', 'wpst_enqueue_codemirror');

function wpst_admin_footer() {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            let headerScriptTextarea = document.querySelector('textarea[name="wpst_header_script"]');
            let bodyScriptTextarea = document.querySelector('textarea[name="wpst_body_script"]');
            let footerScriptTextarea = document.querySelector('textarea[name="wpst_footer_script"]');

            let cssTextarea = document.querySelector('textarea[name="wpst_css"]');
            

            if(cssTextarea) {

                let editorOptions = {
                    lineNumbers: true, // Show line numbers on the left side of the editor
                    mode: 'css',       // Set the language mode to CSS
                    theme: 'default',  // Set the default theme; change this if you have other themes available
                    autoCloseBrackets: true,
                    matchBrackets: true,
                    styleActiveLine: true,
                    showCursorWhenSelecting: true,
                    lineWrapping: true,// Lines will wrap instead of extending horizontally
                    tabSize: 4,
                    indentUnit: 4
                };
                let cssEditor = CodeMirror.fromTextArea(cssTextarea, editorOptions);
                cssEditor.getWrapperElement().style.minHeight = '70vh'; // Set the minimum height
                
            }

            if(headerScriptTextarea && bodyScriptTextarea && footerScriptTextarea) {

                let editorOptions = {
                    lineNumbers: true,
                    mode: 'javascript',
                    theme: 'default',
                    readOnly: false,
                    lineWrapping: true,
                    indentUnit: 4
                };

                let headerEditor = CodeMirror.fromTextArea(headerScriptTextarea, editorOptions);
                let bodyEditor = CodeMirror.fromTextArea(bodyScriptTextarea, editorOptions);
                let footerEditor = CodeMirror.fromTextArea(footerScriptTextarea, editorOptions);
            }
            
    });
    </script>
    <?php
}
add_action('admin_footer', 'wpst_admin_footer');
