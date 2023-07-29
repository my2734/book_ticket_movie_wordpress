(function (blocks, blockEditor, element) {
    var el = element.createElement;
    var RichText = blockEditor.RichText;
    var useBlockProps = blockEditor.useBlockProps;

    blocks.registerBlockType('gutenberg-examples/example-15', {
        apiVersion: 3,
        title: 'Example: Basic with block supports 15',
        icon: 'universal-access-alt',
        category: 'design',
        supports: {
            "color": {
                "text": true,
                "background": true,
                "link": true
            }
        },
        attributes: {
            content: {
                type: 'string',
                source: 'html',
                selector: 'p',
            },
        },
        example: {
            attributes: {
                content: 'Hello World',
            },
        },
        edit: function (props) {
            var blockProps = useBlockProps();
            var content = props.attributes.content;
            function onChangeContent(newContent) {
                props.setAttributes({ content: newContent });
            }

            return el(
                'p',
                // Object.assign( blockProps, {
                //     tagName: 'p',
                //     onChange: onChangeContent,
                //     value: content,
                // } ),
                {},
                JSON.stringify('hello ca nha yeu')
            );
        },
        save: props => {
            return null;
        }
    });
})(window.wp.blocks, window.wp.blockEditor, window.wp.element);