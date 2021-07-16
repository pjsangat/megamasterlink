<header id="mml-header">
    <div class="content">
        <div class="mml-header">
            <a href="<?php echo BASE_URL; ?>">
                <div id="mml-logo">
                    <img src="<?php echo DOF_IMG_URL . 'logo.png'; ?>" alt="MML Logo">
                    <div class="header-logo-text">
                        <h1>MEGA MASTERLINK</h1>
                        <h4>FABRICATOR AND ELECTRICAL SERVICES CORPORATION</h4>
                    </div>
                </div>
            </a>
            
            <nav class="navbar">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <ul class="navbar-collapse">
                    <li>
                        <a href="<?php echo BASE_URL; ?>" <?php echo ( $this->uri->segment(1) == '' ? 'class="active"' : '') ; ?>>HOME</a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL . 'about'; ?>" <?php echo ( $this->uri->segment(1) == 'about' ? 'class="active"' : '') ; ?>>ABOUT US</a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL . 'services'; ?>" <?php echo ( $this->uri->segment(1) == 'services' ? 'class="active"' : '') ; ?>>SERVICES</a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL . 'careers'; ?>" <?php echo ( $this->uri->segment(1) == 'careers' ? 'class="active"' : '') ; ?>>CAREERS</a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL . 'contact'; ?>" <?php echo ( $this->uri->segment(1) == 'contact' ? 'class="active"' : '') ; ?>>CONTACT</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header> 