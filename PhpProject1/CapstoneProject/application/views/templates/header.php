<?php

?>

<html>
    <head>
        <title>Capstone Project</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">SecurityCamera</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url()?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                 
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url()?>about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url()?>users/login">Login</a>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url()?>users/register">Register</a>
                    </li>
                </ul>
<!--                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>-->
            </div>
        </nav>
        
        <div class="container">
             <!--flash messages-->
             <?php if($this->session->flashdata('user_registered')):?>
                <?php echo '<p class="alert alert-success" >'.$this->session->flashdata('user_registered').'</P>';?>
             <?php endif; ?>
             <?php if($this->session->flashdata('user_loggedIn')):?>
                <?php echo '<p class="alert alert-success" >'.$this->session->flashdata('user_loggedIn').'</P>';?>
             <?php endif; ?>
               <?php if($this->session->flashdata('login_failed')):?>
               <?php echo '<p class="alert alert-danger" >'.$this->session->flashdata('login_failed').'</P>';?>
             <?php endif; ?>