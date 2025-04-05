<?php require_once('inc/header.php') ?>

<style>
    body {
        background-image: url('uploads/2.jpg'); /* المسار الصحيح للصورة */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.9); /* شفافية بسيطة */
        border-radius: 10px;
        max-width: 450px; /* تحديد عرض أقصى للنموذج */
        margin: auto; /* لضبط النموذج في وسط الصفحة */
    }

    label sub {
        color: red;
    }

    .form-control-lg {
        padding: 0.75rem 1.25rem; /* تعديل المسافات الداخلية */
    }

    .form-group {
        margin-bottom: 1rem; /* تقليص المسافة بين العناصر */
    }

    .btn-block {
        margin-bottom: 0.5rem; /* تقليص المسافة بين الأزرار */
    }
</style>  


<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card bg-light mt-5">
            <div class="card-header text-center">
                <h2>Create Account</h2>
                <p>Please fill out this form to register with us</p>
            </div>

            <div class="card-body">
                <form method="post" action="<?php echo base_url; ?>Register/handelRegister">
                    <div class="form-group">
                        <label for="name">Name<sub>*</sub></label>
                        <input type="text" name="firstname" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="">
                    </div>

                    <div class="form-group">
                        <label for="middlename">Middlename<sub>*</sub></label>
                        <input type="text" name="middlename" class="form-control form-control-lg" value="">
                    </div>

                    <div class="form-group">
                        <label for="lastname">Lastname<sub>*</sub></label>
                        <input type="text" name="lastname" class="form-control form-control-lg" value="">
                    </div>

                    <div class="form-group">
                        <label for="username">Username<sub>*</sub></label>
                        <input type="text" name="username" class="form-control form-control-lg" value="">
                    </div>

                    <div class="form-group">
                        <label for="password">Password<sub>*</sub></label>
                        <input type="password" name="password" class="form-control form-control-lg" value="">
                    </div>

                    <div class="form-group mt-4">
                        <div class="row">
                            <div class="col">
                                <input type="submit" class="btn btn-success btn-block" value="Register">
                            </div>
                            <div class="col">
                                <a href="<?php echo base_url; ?>users/login" class="btn btn-light btn-block">Already have an account? Login</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

      
    </div>
</div>

<?php require_once('inc/footer.php') ?>
