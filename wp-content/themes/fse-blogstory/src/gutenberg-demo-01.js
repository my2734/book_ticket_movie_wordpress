( function ( blocks, element ) {
    var el = element.createElement;

    blocks.registerBlockType( 'gutenberg-examples/demo-01', {
        title: 'Demo 01',
        icon: 'smiley',
        category: 'common',
        editorStyle: './custom_style.css',
        edit: function ( props ) {
            return el(
                'p',
                {},
                'Hello World (from the editor, in green).'
            );
        },
        save: function () {
            return el(
                'p',
                {},
                'Hello World (from the frontend, in red).'
            );
        },
    } );
} )( window.wp.blocks, window.wp.element);