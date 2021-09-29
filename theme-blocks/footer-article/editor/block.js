import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
 
const blockStyle = {
    backgroundColor: '#900',
    color: '#fff',
    padding: '20px',
};
 
registerBlockType( 
    'wsuwp/footer-article', 
    {
        apiVersion: 2,
        title: 'Article Footer',
        icon: 'universal-access-alt',
        category: 'wsuwp-templates',
        attributes: {
            style: {
                type: 'string',
                default: 'default'
            },
        },
        example: {},
        edit() {
            const blockProps = useBlockProps( { style: blockStyle } );
    
            return (
                <div { ...blockProps }>Hello World (from the editor).</div>
            );
        },
    }
); 