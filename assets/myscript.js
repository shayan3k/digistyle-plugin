import("../node_modules/bootstrap/dist/js/bootstrap.js");

jQuery(function ($) {
  /*
   * Select/Upload image(s) event just for single img
   */
  $("body").on("click", ".js_custom_upload_media_hero", function (e) {
    e.preventDefault();

    e.target.setAttribute("src", "");
    e.target.nextElementSibling.setAttribute("value", "");

    var button = $(this),
      custom_uploader = wp
        .media({
          title: "Insert image",
          library: {
            // uncomment the next line if you want to attach image to the current post
            // uploadedTo : wp.media.view.settings.post.id,
            type: "image",
          },
          button: {
            text: "Use this image", // button label text
          },
          multiple: false, // for multiple image selection set to true
        })
        .on("select", function () {
          // it also has "open" and "close" events
          var attachment = custom_uploader
            .state()
            .get("selection")
            .first()
            .toJSON();

          // $(button)
          //   .removeClass("button")
          //   .html(
          //     '<img class="js_custom_upload_media" src="' +
          //       attachment.url +
          //       '" style="max-width:95%;display:block;" />'
          //   )
          //   .next()
          //   .val(attachment.id)
          //   .next()
          //   .show();

          console.log(e.target);

          e.target.setAttribute("src", attachment.url);
          e.target.nextElementSibling.setAttribute("value", attachment.url);
        })
        .open();
  });

  $("body").on("click", "#js-set-product-image", function (e) {
    e.preventDefault();
    console.log("clicked");
    var button = $(this),
      custom_uploader = wp
        .media({
          title: "Insert image",
          library: {
            // uncomment the next line if you want to attach image to the current post
            // uploadedTo : wp.media.view.settings.post.id,
            type: "image",
          },
          button: {
            text: "Use this image", // button label text
          },
          multiple: true, // for multiple image selection set to true
        })
        .on("select", function () {
          // it also has "open" and "close" events
          var attachments = custom_uploader
            .state()
            .get("selection")
            .map(function (attachments) {
              attachments.toJSON();
              return attachments;
            });

          console.log(attachments);

          //reset all fields
          for (i = 0; i < 8; i++) {
            $("#js-product_image_" + i).attr("src", "");
            $("#js_upload_image_id_" + i).val("");
          }

          // set input and img values
          attachments.map(function (attachment, index) {
            $("#js-product_image_" + index).attr(
              "src",
              attachment.attributes.url
            );
            $("#js-upload_image_id_" + index).val(attachment.attributes.url);
          });

          //     //sample function 1: add image preview
          //     $('#myplugin-placeholder').after(
          //         '<div class="myplugin-image-preview"><img src="' +
          //         attachments[i].attributes.url + '" ></div>'
          //         );

          //     //sample function 2: add hidden input for each image
          //     $('#myplugin-placeholder').after(
          //         '<input id="myplugin-image-input' +
          //         attachments[i].id '" type="hidden"
          //         name="myplugin_attachment_id_array[]"  value="' +
          //         attachments[i].id + '">'
          //         );

          // $(".js_custom_upload_media-img").attr("src", attachment.url);
          // $(".js_custom_upload_media_input").val(attachment.url);
        })
        .open();
  });
});
