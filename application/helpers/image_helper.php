<?php

if (! function_exists('image_orientation_filename')) {

    /**
     * The Image Orientation Filename Helper.
     * 
     * Available Sizes:
     * 
     * For Image Orientation = 0
     *   0 = 120x90
     *   1 = 240x180
     *   2 = 320x240
     *   3 = 480x360
     *   4 = 640x480
     *   5 = 900x675
     *   6 = 1400x1050
     * 
     * For Image Orientation = 1
     *   0 = 160x90
     *   1 = 320x180
     *   2 = 427x420
     *   3 = 640x360
     *   4 = 856x480
     *   5 = 1200x675
     *   6 = 1867x1050
     * 
     * For Reference: http://km.gmanmi.com/display/SPE/SP+DepEdTV+Website+-+Server+Details
     * 
     * For Config Setup: application/config/image.php
     * 
     * @param string $orientation  The image orientation set on the CMS.
     * @param string $filename     The image file name.
     * @param string $size         The chosen size for the image.
     * 
     * @return string
     */
    function image_orientation_filename($orientation, $filename, $size) 
    {
        $CI = &get_instance();

        $CI->load->config('image');

        $imageConfig = $CI->config->item('image_config');

        return $imageConfig['orientation_sizes'][$orientation][$size] . $filename;
    }
}
