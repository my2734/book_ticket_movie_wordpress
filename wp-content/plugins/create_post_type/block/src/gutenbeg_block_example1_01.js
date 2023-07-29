( function ( blocks, element, blockEditor ) {
    var el = element.createElement;

    blocks.registerBlockType( 'gutenberg-examples/example1-01', {
        title: 'Example1 01',
        icon: 'smiley',
        category: 'common',
        edit: function ( props ) {
            return el(
                'p',
                {},
                "Hello ca nha yeu"
            )
        },
        save: function () {
            return el(
                'p',
                {
                    style: {
                        color: 'red',
                    }
                },
                'Hello World (from the frontend, in red).'
            );
        },
    } );
} )( window.wp.blocks, window.wp.element, window.wp.blockEditor );