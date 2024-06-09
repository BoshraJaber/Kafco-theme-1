import { textColors } from "../inc/ourColors";
import { ToolbarGroup, ToolbarButton, PanelBody, PanelRow, ColorPalette, SelectControl } from "@wordpress/components";
import { RichText, InspectorControls, BlockControls, __experimentalLinkControl as LinkControl, getColorObjectByColorValue } from "@wordpress/block-editor";
import { registerBlockType } from "@wordpress/blocks";

registerBlockType("ourblocktheme/kafcotext", {
    title: "Kafco Text",
    category: "kafco-blocks",
    icon: "media-text",
    attributes: {
        text: { type: "string" },
        size: { type: "string", default: "a" },
        textColor: { type: "string", default: "white" },
        lineHeight: { type: "string" }
    },
    edit: EditComponent,
    save: SaveComponent
})

function EditComponent(props) {
    function handleTextChange(x) {
        props.setAttributes({ text: x })
    }

    function handleColorChange(colorCode) {
        const { name } = getColorObjectByColorValue(textColors, colorCode)
        props.setAttributes({ textColor: name })
    }
    function handleTextSize(newValue) {
        props.setAttributes({ size: newValue });
    }

    return (
        <>


            <InspectorControls>
                <PanelBody title="Text Color" initialOpen={true}>
                    <PanelRow>
                        <ColorPalette disableCustomColors={true} clearable={false} colors={textColors} value={props.attributes.textColor} onChange={handleColorChange} />
                    </PanelRow>
                </PanelBody>
                <PanelBody title="Text Size" initialOpen={true}>
                    <PanelRow>
                        <SelectControl
                            label="select size"
                            value={props.attributes.size}
                            options={[
                                { value: 'xs', label: 'XS' },
                                { value: 's', label: 'S' },
                                { value: 'm', label: 'M' },
                                { value: 'l', label: 'L' },
                                { value: 'xl', label: 'XL' },
                            ]}
                            onChange={handleTextSize}
                        />
                    </PanelRow>
                </PanelBody>
            </InspectorControls>


            <RichText tagName="p" className={`text-size--${props.attributes.size}  text--${props.attributes.textColor}`} value={props.attributes.text} onChange={handleTextChange} />
        </>
    )
}

function SaveComponent(props) {
    return <RichText.Content tagName="p" value={props.attributes.text} className={`text--${props.attributes.size}   text--${props.attributes.textColor}`} />;

}

