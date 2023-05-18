<?php include 'includes/header.php'; ?>
<form role="form" enctype="multipart/form-data" method="post" action="register.php">
    <div class="form-group">
        <label>Name*</label>
        <input type="text" class="form-control"
               name="name" placeholder="Enter Your Name">
    </div> <!-- End Name -->

    <div class="form-group">
        <label>Email Address*</label>
        <input type="email" class="form-control"
               name="email" placeholder="Enter Your Email Address">
    </div><!-- End Email -->

    <div class="form-group">
        <label>Choose Username*</label>
        <input type="text" class="form-control"
               name="username" placeholder="Create A Username">
    </div><!-- End Username -->

    <div class="form-group">
        <label>Password*</label>
        <input type="password" class="form-control"
               name="password" placeholder="Enter A Password">
    </div><!-- End Password-->

    <div class="form-group">
        <label>Confirm Password*</label>
        <input type="password" class="form-control"
               name="password2" placeholder="Enter Password Again">
    </div><!-- End Confirm Pass-->

    <div class="form-group">
        <label>Upload Avatar</label>
        <input type="file" name="avatar">
        <p class="help-block"></p>
    </div><!-- End Avatar-->

    <div class="form-group">
        <label>About Me</label>
        <textarea id="about" rows="6" cols="80" class="form-control"
                  name="about" placeholder="Tell us about yourself (Optional)">

                            </textarea>
    </div><!-- End About-->

    <input name="register" type="submit" class="btn btn-default" value="Register" />
</form>
<?php include 'includes/footer.php'; ?>

