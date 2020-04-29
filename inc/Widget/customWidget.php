<?php

/**
 * @package  ShayaNNN
 */

namespace Inc\Widget;

use WP_Widget;

class customWidget extends WP_Widget
{

  function __construct()
  {

    parent::__construct(
      'plugin-slider-widget-multiple',  // Base ID
      'Plugin Slider Widget Multiple'   // Name
    );
  }

  public function widget($args, $instance)
  {

    $image_uri[0] = !empty($instance["image_uri_0"]) ? $instance["image_uri_0"] : esc_html__('', 'arcade');
    $image_uri[1] = !empty($instance["image_uri_1"]) ? $instance["image_uri_1"] : esc_html__('', 'arcade');
    $image_uri[2] = !empty($instance["image_uri_2"]) ? $instance["image_uri_2"] : esc_html__('', 'arcade');
    $image_uri[3] = !empty($instance["image_uri_3"]) ? $instance["image_uri_3"] : esc_html__('', 'arcade');
    $image_uri[4] = !empty($instance["image_uri_4"]) ? $instance["image_uri_4"] : esc_html__('', 'arcade');
    $image_uri[5] = !empty($instance["image_uri_5"]) ? $instance["image_uri_5"] : esc_html__('', 'arcade');



    echo '<div id="bootstrapCarouselIndicatorcustomplugin" class="carousel slide bg-default w-100" data-ride="carousel">';

    // echo ' <ol class="carousel-indicators p-0 mx-auto">
    //           <li data-target="#bootstrapCarouselIndicatorcustomplugin" data-slide-to="0" class="active"></li>
    //           <li data-target="#bootstrapCarouselIndicatorcustomplugin" data-slide-to="1"></li>
    //           <li data-target="#bootstrapCarouselIndicatorcustomplugin" data-slide-to="2"></li>
    //         </ol>';

    echo '<div class="carousel-inner">';

    $i = 0;
    while ($image_uri[$i]) {
      if ($i == 0) {
        echo '<div class="carousel-item active">';
      } else {
        echo '<div class="carousel-item ">';
      }
      echo '<img class="d-block w-100" src="' . $image_uri[$i] . '" alt="' . $i . '">';
      echo '  </div>';
      $i++;
    }

    echo '</div>';

    echo '<a class="carousel-control-prev" href="#bootstrapCarouselIndicatorcustomplugin" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#bootstrapCarouselIndicatorcustomplugin" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>';


    echo '</div><hr/>';
  }

  public function form($instance)
  {



    $image_uri[0] = !empty($instance["image_uri_0"]) ? $instance["image_uri_0"] : esc_html__('', 'arcade');
    $image_uri[1] = !empty($instance["image_uri_1"]) ? $instance["image_uri_1"] : esc_html__('', 'arcade');
    $image_uri[2] = !empty($instance["image_uri_2"]) ? $instance["image_uri_2"] : esc_html__('', 'arcade');
    $image_uri[3] = !empty($instance["image_uri_3"]) ? $instance["image_uri_3"] : esc_html__('', 'arcade');
    $image_uri[4] = !empty($instance["image_uri_4"]) ? $instance["image_uri_4"] : esc_html__('', 'arcade');
    $image_uri[5] = !empty($instance["image_uri_5"]) ? $instance["image_uri_5"] : esc_html__('', 'arcade');


    echo '<a href="#" class="button button-primary js_custom_upload_media_multiple" style="margin-top:5px;">Upload Image</a>';

    for ($i = 0; $i < 6; $i++) {
      echo '<img class="js_custom_upload_media_multiple js_custom_upload_media_multiple_img_' . $i . '"  src="';
      echo $image_uri[$i];
      echo '" style="max-width:95%;display:block;cursor:pointer;" />';
      echo '<input type="text" id="' . $this->get_field_id("image_uri_" . $i) . '" name="' . $this->get_field_name("image_uri_" . $i) . '" class="form-control js_custom_upload_media__multiple_input_' . $i . '" value="' . $image_uri[$i] . '"/>';
    }
  }

  public function update($new_instance, $old_instance)
  {


    $instance["image_uri_0"] = $new_instance["image_uri_0"] ? $new_instance["image_uri_0"] : '';
    $instance["image_uri_1"] = $new_instance["image_uri_1"] ? $new_instance["image_uri_1"] : '';
    $instance["image_uri_2"] = $new_instance["image_uri_2"] ? $new_instance["image_uri_2"] : '';
    $instance["image_uri_3"] = $new_instance["image_uri_3"] ? $new_instance["image_uri_3"] : '';
    $instance["image_uri_4"] = $new_instance["image_uri_4"] ? $new_instance["image_uri_4"] : '';
    $instance["image_uri_5"] = $new_instance["image_uri_5"] ? $new_instance["image_uri_5"] : '';


    return $instance;
  }
}
