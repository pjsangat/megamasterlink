<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">

	<style>
		#login { padding-top: 150px; }
        #login input { border:0 0 1px 0; border-radius: 0; }
        
        form{
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgb(0 0 0 / 20%), 0 5px 5px 0 rgb(0 0 0 / 24%);
        }
        form input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }
        form button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #363636;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }
	</style>
</head>
<body>
      <section id="login">	
            <div class="continer">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <h3 style=" color:red !important; font-family: camberia;"><?php echo $this->session->flashdata('msg');?></h3>
                        <p style="color:red;"><?php echo validation_errors(); ?></p>
                        
                        <form method="POST" action="<?php echo base_url('login/authenticate');?>">
                            <div class="mb-4" style="margin-bottom: 20px; text-align: left;">
                                <img src="<?php echo DOF_IMG_URL . 'logo.png';?>" alt="" style="width: 70px;float: left;">
                                <h1 style="font-family: sans-serif;float: left;margin-left: 20px;">Mega Masterlink</h1>
                                <div style="clear:both;"></div>
                            </div>

                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('field name');?>"  required/>
                            </div>
                            <div class="form-group">
                                <input type="password" name="pwd" class="form-control" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </section>
</body>
</html>