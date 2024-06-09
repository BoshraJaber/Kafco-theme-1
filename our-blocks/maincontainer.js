import { InnerBlocks } from "@wordpress/block-editor"
import { registerBlockType } from "@wordpress/blocks"

registerBlockType("ourblocktheme/maincontainer", {
  title: "Main Container",
  category: "kafco-blocks",
  supports: {
    align: ["full"]
  },
  attributes: {
    align: { type: "string", default: "full" }
  },
  edit: EditComponent,
  save: SaveComponent
})

function EditComponent(props) {
  return (
    <>
      <div className="main-container">
        <div className="inner-main-container">
          <InnerBlocks />
        </div>
      </div>
    </>
  )
}

function SaveComponent() {
  return <InnerBlocks.Content />
}
