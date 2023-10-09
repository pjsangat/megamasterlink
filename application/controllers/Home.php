<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
    public function index(){

        // PAGE HEAD PROCESSING
        $this->load->view('components/header', array(
            'title' => 'Home',
            'description' => 'Reliable Engineering Services.',
            'url' => url_ending_trailing_slash(BASE_URL),
            'keywords' => '',
            'meta' => array(
                'title' => 'Home',
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
                DOF_COMPILED_ASSETS_PATH . 'css/pages/home'
            )
        ));

        // PAGE CONTENT PROCESSING
        $this->load->view('components/navigation_bar');
        $this->load->view('pages/home');
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
                script_compressed_extension(DOF_ASSETS_URL . 'js/components/global.min.js'),
                script_compressed_extension(DOF_ASSETS_URL . '../src/js/plugins/jquery.validation.min.js'),
                script_compressed_extension(DOF_ASSETS_URL . 'js/components/owl_carousel.min.js'),
                script_compressed_extension(DOF_ASSETS_URL . 'js/pages/home.min.js')
            )
        ));
    }
    
    public function request_quotation(){

        $data = [];
        $data['success'] = 0;
        $data['message'] = 'Something went wrong. Please try again later.';
        if (!$this->input->is_ajax_request()) {
            exit('Error');
        }else{
            if($this->input->post()){
                $error = [];

                // $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
                // $userIp=$this->input->ip_address();
     
                // $secret = $this->config->item('google_secret');
                // $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;

                // $captchaResponse = curl_data($url);
                // if ($captchaResponse['success']) {
                    $this->load->library('form_validation');

                    $this->form_validation->set_rules('Name', 'Name', 'required');
                    $this->form_validation->set_rules('Email', 'Email', 'required');
                    $this->form_validation->set_rules('Phone', 'Phone', 'required');
                    $this->form_validation->set_rules('Subject', 'Subject', 'required');
                    $this->form_validation->set_rules('Message', 'Message', 'required');

                    if ($this->form_validation->run() == FALSE){
                        $errArr = $this->form_validation->error_array();
                        foreach($errArr as $err){
                            array_push($error, $err);
                        }
                    }else{
                        $config['protocol'] = "smtp";
                        $config['smtp_host'] = "fmt11.web.com.ph";
                        $config['smtp_port'] = "587";
                        $config['smtp_user'] = "do-not-reply-megamaster@megamasterlink.com.ph";
                        $config['smtp_pass'] = "UUaqS}Ny-L5d";

                        $message = $this->input->post('Message');
                        $config['mailtype'] = "html";

                        $this->load->library('email', $config);
                        $this->email->set_newline("\r\n");
                        $this->email->from($this->input->post('Email'), $this->input->post('Name'));
                        $this->email->to('sales@megamasterlink.com.ph');
                        $this->email->bcc('rab@megamasterlink.com.ph');
                        // $this->email->bcc('pjsanga@gmail.com');
                        $this->email->subject($this->input->post('Subject'));
                        $this->email->message($message);

                        if($this->email->send()){
                            $data['success'] = 1;
                            $data['message'] = 'Thank you for contacting us. One of our representatives will accommodate you shortly.';
                        }else{
                            $data['success'] = 0;
                            $data['message'] = 'Oops. Something went wrong. Please try again later.';
                        }

                    }
                // }else{
                //     $error[] = 'Invalid Captcha';
                // }


                if(!empty($error)){
                    $data['error'] = $error;
                    $data['success'] = 0;
                    $data['message'] = 'Please see the following errors below.';
                }
            }else{
                exit('Error');

            }
        }


        echo json_encode($data);
        exit();
    }
}
