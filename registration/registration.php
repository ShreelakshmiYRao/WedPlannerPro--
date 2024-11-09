<?php
   include('../action.php');
   if (!isset($_SESSION['uid'])) {
       header('location:../index.php');
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wedding Registration</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Registration</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Name" required />
                        </div>
                         <div class="form-group">
                            <input type="text" class="form-input" name="dname" id="gname" placeholder="Groom Name" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="dlname" id="bname" placeholder="Bride Name" required/>
                        </div>
                         <div class="form-group">
                            <input type="text" class="form-input" name="pno" id="pno" placeholder="Number of person (Enter only numbers)" required/>
                        </div>
                        <div class="form-group">
                          <h3 class="form-input"> Wedding Date: &nbsp   &nbsp <input type="date" name="date" id="wedding-date" required=""></h3>  
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                        <input type="submit" name="submit" id="submit-btn" class="form-submit" value="Submit"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>


    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        document.getElementById('wedding-date').addEventListener('change', function(event) {
            var selectedDate = new Date(this.value);
            var currentDate = new Date();

            if (selectedDate < currentDate) {
                alert("Please select a future date for the wedding.");
                this.value = ''; 
            }
        });


        document.getElementById('submit-btn').addEventListener('click', function(event) {
            var agreeCheckbox = document.getElementById('agree-term');

            if (!agreeCheckbox.checked) {
                alert("Please agree to the terms and conditions.");
                event.preventDefault(); // Prevent form submission
            }
        });

        document.getElementById('pno').addEventListener('input', function(event) {
                    this.value = this.value.replace(/[^0-9]/g, ''); 
                });


</script>
</body>
</html>