(function(blocks,blockEditor, element){
    var el = element.createElement;
    blocks.registerBlockType(
        'gutenberg-examples/demo-2-again',{
            title: 'demo-02-again',
            category: 'design',
            icon: 'smiley',
            edit: function(){
                const greenBackground = {
                    backgroundColor: 'green',
                    color: '#fff',
                    padding: '20px'
                }
                var blockProps = blockEditor.useBlockProps({
                    style: greenBackground,
                });

                return el(
                    'p',
                    blockProps,
                    'hello world, in background green edit'
                )
            },  
            save: function(){   
                const redBackground = {
                    backgroundColor: 'red',
                    color: '#fff',
                    padding: '20px',
                }
                const blockProps = blockEditor.useBlockProps({
                    style: redBackground
                });
                return el(
                    'p',
                    {},
                    'hello world, in background red save'
                )
            }
        }
    )
})(window.wp.blocks, window.wp.blockEditor, window.wp.element)