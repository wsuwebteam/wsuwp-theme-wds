import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
 
const blockStyle = {
    backgroundColor: '#900',
    color: '#fff',
    padding: '20px',
};
 
registerBlockType( 
    'wsuwp/article-meta-byline', 
    {
        apiVersion: 2,
        title: 'Article Byline',
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