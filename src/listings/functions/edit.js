import { __ } from '@wordpress/i18n';
import {
    useBlockProps,
    RichText,
    AlignmentToolbar,
    BlockControls,
    InspectorControls
} from '@wordpress/block-editor';
import { 
    Placeholder, 
    PanelBody, 
    RangeControl, 
    SelectControl,
    CheckboxControl,
    Button
} from '@wordpress/components';

const { serverSideRender: ServerSideRender } = wp;

export default function Edit ( props ){
    const { className, attributes, setAttributes } = props;
    const blockProps = useBlockProps();

    function updateSelectedTheme( val ) {
        props.setAttributes( { selected_theme: val } );
    }
    function updateNoPost( val ) {
        props.setAttributes( { posts_per_page: val } );
    }
    function updateFeaturedOnly( val ) {
        props.setAttributes( { featured_only: val } );
    }

    return (
        <div { ...blockProps }>
            <InspectorControls>
                <PanelBody
                    title={ __('Listings Settings') }
                    initialOpen={ true }
                    className="aios-block-container"
                >
                    <fieldset className="aios-form-group">
                        <div class="aios-block-col">
                            <legend for="selectedTheme">
                                { __( 'Select Theme:', 'aios-listings' ) }
                            </legend>
                        </div>
                        <div class="aios-block-col">
                            <SelectControl
                                className="aios-form-control"
                                name="selectedTheme"
                                id="selectedTheme"
                                value={ attributes.selected_theme }
                                options={ [
                                    { label: 'Classic', value: 'classic' },
                                    { label: 'Default', value: 'default' },
                                ] }
                                onChange={ ( val ) => updateSelectedTheme(val) }
                            />
                        </div>
                    </fieldset>
                    <fieldset className="aios-form-group">
                        <div class="aios-block-col">
                            <legend for="numberOfPost">
                                { __( 'Number of Post:', 'aios-listings' ) }
                            </legend>
                        </div>
                        <div class="aios-block-col">
                            <RangeControl
                                value={ attributes.posts_per_page }
                                className="aios-form-control"
                                name="numberOfPost"
                                id="numberOfPost"
                                min={ 1 }
                                max={ 10 }
                                onChange={ ( val ) => updateNoPost(val) }
                            />
                        </div>
                    </fieldset>
                    <fieldset className="aios-form-group aios-checkbox">
                        <div class="aios-block-col">
                            <legend for="numberOfPost">
                                { __( 'Featured Only?', 'aios-listings' ) }
                            </legend>
                        </div>
                        <div class="aios-block-col">
                            <CheckboxControl
                                name="featuredOnly"
                                id="featuredOnly"                               
                                className="aios-form-control"
                                checked={ attributes.featured_only }                        
                                onChange={ ( val ) => updateFeaturedOnly(val) }
                            />
                        </div>
                    </fieldset>
                </PanelBody>
            </InspectorControls>

            <div class="aios-block-preview">
                <ServerSideRender 
                    block="agentimage/aios-listing-block"
                    attributes={ props.attributes }
                />
            </div>

        </div>
    );
}