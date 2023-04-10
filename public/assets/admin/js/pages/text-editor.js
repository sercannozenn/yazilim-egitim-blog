$(document).ready(function () {
    "use strict";
    // Define function to open filemanager window
    var lfm = function (options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function (context) {
        var ui = $.summernote.ui;
        var button = ui.button({
            contents: '<i class="note-icon-picture"></i> ',
            tooltip: 'Insert image with filemanager',
            click: function () {

                lfm({type: 'image', prefix: '/admin/filemanager'}, function (lfmItems, path) {
                    lfmItems.forEach(function (lfmItem) {
                        context.invoke('insertImage', lfmItem.url);
                    });
                });

            }
        });
        return button.render();
    };

    // Initialize summernote with LFM button in the popover button group
    // Please note that you can add this button to any other button group you'd like
    $('#summernote').summernote({
        // toolbar: [
        //     ['popovers', ['lfm']],
        // ],
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'lfm']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        buttons: {
            lfm: LFMButton
        },
        height: 400
    })

    $('#header_text').summernote({
        // toolbar: [
        //     ['popovers', ['lfm']],
        // ],
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        buttons: {
            lfm: LFMButton
        },
        height: 100
    })

    $('#footer_text').summernote({
        // toolbar: [
        //     ['popovers', ['lfm']],
        // ],
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        buttons: {
            lfm: LFMButton
        },
        height: 100
    })

    $('#about').summernote({
        // toolbar: [
        //     ['popovers', ['lfm']],
        // ],
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        buttons: {
            lfm: LFMButton
        },
        height: 100
    })

    $('#custom_content').summernote({
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'lfm']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        buttons: {
            lfm: LFMButton
        },
        height: 100
    })
});
