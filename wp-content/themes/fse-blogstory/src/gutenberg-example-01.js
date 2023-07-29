(function (blocks, element, blockEditor) {
    var el = element.createElement;

    blocks.registerBlockType('gutenberg-examples/example-11', {
        title: 'Example 11',
        icon: 'smiley',
        category: 'common',
        edit: function (props) {
            // var blockProps = useBlockProps();
            // function onChangeBgColor(hexColor){
            //     props.setAttributes({
            //         bg_color: hexColor
            //     })
            // }
            // function onChangeTextColor(hexColor){
            //     props.setAttributes({
            //         text_color: hexColor
            //     })
            // }
            return el(
                'p',
                {
                    style: {
                        color: 'white',
                        fontSize: '20px',
                    },
                },
                'Hello World (from the editor, in green).'
            );
        },
        save: function (props) {
            // var blockProps = useBlockProps.save();
            return el(
                'p',
                {
                    style: {
                        color: 'white',
                        fontSize: '20px',
                    },
                },
                'Hello World (from the saved, in green).'
            );
        },
    });
})(window.wp.blocks, window.wp.element, window.wp.blockEditor);