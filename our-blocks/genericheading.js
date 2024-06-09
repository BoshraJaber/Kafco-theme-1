import { textColors } from "../../merged-theme/inc/ourColors"
import { ToolbarGroup, ToolbarButton, PanelBody, PanelRow, ColorPalette } from "@wordpress/components"
import { RichText, InspectorControls, BlockControls, __experimentalLinkControl as LinkControl, getColorObjectByColorValue } from "@wordpress/block-editor"
import { registerBlockType } from "@wordpress/blocks"

registerBlockType("ourblocktheme/genericheading", {
  title: "Generic Heading",
  category: "kafco-blocks",
  supports: {
    align: ["full"]
  },
  attributes: {
    text: { type: "string" },
    size: { type: "string", default: "large" },
    textColor: { type: "string", default: "white" }
  },
  edit: EditComponent,
  save: SaveComponent
})

function EditComponent(props) {
  function handleTextChange(x) {
    props.setAttributes({ text: x })
  }
  // const currentColorValue = textColor.filter(color => {
  //   return color.name == props.attributes.textColor
  // })[0].color

  function handleColorChange(colorCode) {
    const { name } = getColorObjectByColorValue(textColors, colorCode)
    props.setAttributes({ textColor: name })
  }

  return (
    <>
      <BlockControls>
        <ToolbarGroup>
          <ToolbarButton isPressed={props.attributes.size === "large"} onClick={() => props.setAttributes({ size: "large" })}>
            Section Title
          </ToolbarButton>
          <ToolbarButton isPressed={props.attributes.size === "medium"} onClick={() => props.setAttributes({ size: "medium" })}>
            Card Title
          </ToolbarButton>
          <ToolbarButton isPressed={props.attributes.size === "small"} onClick={() => props.setAttributes({ size: "small" })}>
            Paragraph
          </ToolbarButton>
        </ToolbarGroup>
      </BlockControls>

      <InspectorControls>
        <PanelBody title="Text Color" initialOpen={true}>
          <PanelRow>
            <ColorPalette disableCustomColors={true} clearable={false} colors={textColors} value={props.attributes.textColor} onChange={handleColorChange} />
          </PanelRow>
        </PanelBody>
      </InspectorControls>

      <RichText tagName="h2" className={`headline headline--${props.attributes.size} text--${props.attributes.textColor}`} value={props.attributes.text} onChange={handleTextChange} />
    </>
  )
}

function SaveComponent(props) {
  function createTagName() {
    switch (props.attributes.size) {
      case "large":
        return "h2"
      case "medium":
        return "h3"
      case "small":
        return "p"
    }
  }

  return <RichText.Content tagName={createTagName()} value={props.attributes.text} className={`headline headline--${props.attributes.size}   text--${props.attributes.textColor}`} />
}
