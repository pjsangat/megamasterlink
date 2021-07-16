<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller 
{
    public function re_route()
    {
        redirect('notfound', 'location', 301);
    }

    public function index()
	{
        // PAGE HEAD PROCESSING
        $this->load->view('components/header', array(
            'title' => 'Not Found',
            'description' => 'Sorry we can\'t find the page you\'re looking for.',
            'url' => url_ending_trailing_slash(BASE_URL),
            'keywords' => 'notfound, page not available',
            'meta' => array(
                'title' => 'Not Found',
                'description' => 'Sorry we can\'t find the page you\'re looking for.',
                'image' => ''
            ),
            'styles' => array(
                'plugins/font_awesome',
                DOF_COMPILED_ASSETS_PATH . 'css/components/bootstrap',
                DOF_COMPILED_ASSETS_PATH . 'css/components/bootstrap-main',
                DOF_COMPILED_ASSETS_PATH . 'css/components/global',
                DOF_COMPILED_ASSETS_PATH . 'css/pages/notfound',
                DOF_COMPILED_ASSETS_PATH . 'css/components/left-panel',
                DOF_COMPILED_ASSETS_PATH . 'css/components/footer',
                DOF_COMPILED_ASSETS_PATH . 'css/pages/home'
            )
        ));

        // PAGE LOWER PART PROCESSING
        $this->load->view('components/scripts_render', array(
            'scripts' => array(
                '//www.googletagmanager.com/gtag/js?id=' . DOF_GA_ID,
                script_compressed_extension(DOF_ASSETS_URL . 'js/components/gtag.min.js'),
                'https://code.jquery.com/jquery-3.5.1.min.js' => array(
                    'integrity' => 'sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=',
                    'crossorigin' => 'anonymous'
                ),
                script_compressed_extension(DOF_ASSETS_URL . 'js/components/fonts.min.js'),
                script_compressed_extension(DOF_ASSETS_URL . 'js/components/global.min.js'),
                script_compressed_extension(DOF_ASSETS_URL . 'js/pages/notfound.min.js')
            )
        ));
	}
}
