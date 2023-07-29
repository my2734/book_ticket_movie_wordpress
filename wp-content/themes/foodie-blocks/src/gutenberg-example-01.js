// (function (blocks, element, blockEditor) {
//     var el = element.createElement;
//     var useBlockProps = blockEditor.useBlockProps;

//     blocks.registerBlockType('gutenberg-examples/example-01', {
//         title: 'Example 03',
//         icon: 'smiley',
//         category: 'common',
//         edit: function (props) {
//             return el(
//                 'p',
//                 {},
//                 'Hello World (from the editor, in green).'
//             );
//         },
//         save: function (props) {
//             // var blockProps = useBlockProps();
//             return el(
//                 'p',
//                 {},
//                 'Hello World (from the editor, in green).'
//             );
//         },
//     });
// })(window.wp.blocks, window.wp.element, window.wp.blockEditor);