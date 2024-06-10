import { ourColors, borderColors } from "../inc/ourColors"
import { link } from "@wordpress/icons"
import { ToolbarGroup, ToolbarButton, Popover, Button, PanelBody, PanelRow, ColorPalette } from "@wordpress/components"
import { RichText, InspectorControls, BlockControls, __experimentalLinkControl as LinkControl, getColorObjectByColorValue } from "@wordpress/block-editor"
import { registerBlockType } from "@wordpress/blocks"
import { useState } from "@wordpress/element"

registerBlockType("ourblocktheme/genericbutton", {
    title: "Generic Button",
    icon: "button",
    category: "kafco-blocks",
    supports: {
        align: ["full"]
    },
    attributes: {
        text: { type: "string", default: "Read more" },
        linkObject: { type: "object", default: { url: "" } },
        colorName: { type: "string", default: "green" },
        borderColor: { type: "string", default: "transparent" }
    },
    edit: EditComponent,
    save: SaveComponent
})

function EditComponent(props) {
    const [isLinkPickerVisible, setIsLinkPickerVisible] = useState(false)

    function handleTextChange(x) {
        props.setAttributes({ text: x })
    }

    function buttonHandler() {
        setIsLinkPickerVisible(prev => !prev)
    }

    function handleLinkChange(newLink) {
        props.setAttributes({ linkObject: newLink })
    }

    const currentColorValue = ourColors.filter(color => {
        return color.name == props.attributes.colorName
    })[0].color

    function handleColorChange(colorCode) {
        const { name } = getColorObjectByColorValue(ourColors, colorCode)
        props.setAttributes({ colorName: name })
    }
    function handleBorderColorChange(color) {
        const { name } = getColorObjectByColorValue(borderColors, color)
        props.setAttributes({ borderColor: name });
    }


    return (
        <>
            <BlockControls>
                <ToolbarGroup>
                    <ToolbarButton onClick={buttonHandler} icon={link} />
                </ToolbarGroup>
            </BlockControls>
            <InspectorControls>
                <PanelBody title="Color" initialOpen={true}>
                    <PanelRow>
                        <ColorPalette disableCustomColors={true} clearable={false} colors={ourColors} value={currentColorValue} onChange={handleColorChange} />
                    </PanelRow>
                </PanelBody>
                <PanelBody title="Border Color" initialOpen={true}>
                    <PanelRow>
                        <ColorPalette disableCustomColors={true} clearable={false} colors={borderColors} value={props.attributes.borderColor} onChange={handleBorderColorChange} />
                    </PanelRow>
                </PanelBody>
            </InspectorControls>
            <div className="read-more-line" >
                <RichText allowedFormats={[]} tagName="a" className={`btn border--${props.attributes.borderColor} btn--${props.attributes.colorName}`} value={props.attributes.text} onChange={handleTextChange} />
            </div>
            {isLinkPickerVisible && (
                <Popover position="middle center">
                    <LinkControl settings={[]} value={props.attributes.linkObject} onChange={handleLinkChange} />
                    <Button variant="primary" onClick={() => setIsLinkPickerVisible(false)} style={{ display: "block", width: "100%" }}>
                        Confirm Link
                    </Button>
                </Popover>
            )}
        </>
    )
}

function SaveComponent(props) {
    return (
        <div className="read-more-line" >
            <a href={props.attributes.linkObject.url} className={` btn  btn--${props.attributes.colorName} border--${props.attributes.borderColor}`}>
                {props.attributes.text}
            </a>
        </div >
    )
}
