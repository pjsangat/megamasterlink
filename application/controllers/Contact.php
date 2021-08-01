<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller 
{
    public function index(){

        // PAGE HEAD PROCESSING
        $this->load->view('components/header', array(
            'title' => 'Contact Us',
            'description' => 'Reliable Engineering Services.',
            'url' => url_ending_trailing_slash(BASE_URL . 'contact'),
            'keywords' => '',
            'meta' => array(
                'title' => 'Contact Us',
                'description' => 'Reliable Engineering Services.',
                'image' => DOF_IMG_URL . 'og-image.png'
            ),
            'styles' => array(
                'plugins/font_awesome',
                DOF_COMPILED_ASSETS_PATH . 'css/components/bootstrap',
                DOF_COMPILED_ASSETS_PATH . 'css/components/bootstrap-main',
                DOF_COMPILED_ASSETS_PATH . 'css/components/icons',
                DOF_COMPILED_ASSETS_PATH . 'css/components/custom_icons',
                DOF_COMPILED_ASSETS_PATH . 'css/components/global',
                DOF_COMPILED_ASSETS_PATH . 'css/components/animations',
                DOF_COMPILED_ASSETS_PATH . 'css/components/owl_carousel',
                DOF_COMPILED_ASSETS_PATH . 'css/components/navigation_bar',
                DOF_COMPILED_ASSETS_PATH . 'css/components/typehead',
                DOF_COMPILED_ASSETS_PATH . 'css/components/footer',
                DOF_COMPILED_ASSETS_PATH . 'css/pages/contact'
            )
        ));

        // PAGE CONTENT PROCESSING
        $this->load->view('components/navigation_bar');
        $this->load->view('pages/contact');
        $this->load->view('components/footer');
        
        $this->load->view('components/scripts_render', array(
            'scripts' => array(
                // '//www.googletagmanager.com/gtag/js?id=' . DOF_GA_ID,
                // script_compressed_extension(DOF_ASSETS_URL . 'js/components/gtag.min.js'),
                'https://code.jquery.com/jquery-3.5.1.min.js' => array(
                    'integrity' => 'sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=',
                    'crossorigin' => 'anonymous'
                ),
                'https://www.google.com/recaptcha/api.js',
                script_compressed_extension(DOF_ASSETS_URL . '../src/js/plugins/jquery.validation.min.js'),
                script_compressed_extension(DOF_ASSETS_URL . 'js/components/global.min.js'),
                script_compressed_extension(DOF_ASSETS_URL . 'js/pages/contact.min.js')
            )
        ));
	}
}