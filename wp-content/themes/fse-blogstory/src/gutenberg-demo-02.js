( function ( blocks, element, blockEditor ) {
    var el = element.createElement;

    blocks.registerBlockType( 'gutenberg-examples/demo-02', {
        title: "demo-02",
        category: 'design',
        icon: 'smiley',
        edit: function ( props ) {
            const greenBackground = {
                backgroundColor: '#090',
                color: '#fff',
                padding: '20px',
            };
            const blockProps = blockEditor.useBlockProps( {
                style: greenBackground,
            } );
            return el(
                'p',
                blockProps,
                'Hello World (from the editor, in green).'
            );
        },
        save: function () {
            const redBackground = {
                backgroundColor: 'red',
                color: '#fff',
                padding: '20px',
            };
            const blockProps = blockEditor.useBlockProps.save( {
                style: redBackground,
            } );
            return el(
                'p',
                blockProps,
                'Hello World (from the frontend, in red).'
            );
        },
    } );
} )( window.wp.blocks, window.wp.element, window.wp.blockEditor );