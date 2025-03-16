(function() {
    tinymce.create('tinymce.plugins.design_button', {
        init : function(ed, url) {
            ed.addButton('design_button', {
                title : 'Design Button',
                image : url + '/Cool-Button-icon.png', // specify the image file
                onclick : function() {
                    ed.selection.setContent('<button>' + ed.selection.getContent() + '</button>');
                },
                classes: 'wpst-design-button' // Add your custom class
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('design_button', tinymce.plugins.design_button);
})();
