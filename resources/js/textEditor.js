"use strict";

// editor
import "tinymce/tinymce";
import "tinymce/skins/ui/oxide/skin.min.css";
import "tinymce/skins/content/default/content.min.css";
import "tinymce/skins/content/default/content.css";
import "tinymce/icons/default/icons";
import "tinymce/themes/silver/theme";
import "tinymce/models/dom/model";

window.addEventListener("DOMContentLoaded", () => {
    tinymce.init({
        selector: "textarea#content",

        /* TinyMCE configuration options */
        skin: false,
        content_css: false,
        height: "800px",
        content_style: `
            body {
                background: #fff;
            }
        
            @media (min-width: 840px) {
                html {
                    background: #eceef4;
                    min-height: 100%;
                    padding: 0 .5rem;
                }

                body {
                    background-color: #fff;
                    box-shadow: 0 0 4px rgba(0, 0, 0, .15);
                    box-sizing: border-box;
                    margin: 1rem auto 0;
                    max-width: 820px;
                    min-height: calc(100vh - 1rem);
                    padding:4rem 6rem 6rem 6rem;
                }
            }
        `,
    });
});
