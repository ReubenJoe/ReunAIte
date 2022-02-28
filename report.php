<?php include 'utils/nav.php'; 

//include 'delete_question.php';

?>
<br><br><br>

<?php if(count($error_report)>0): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php foreach($error_report as $error): ?>
    <li><?php echo $error; ?></li>
    <?php endforeach; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif;?>

<?php if(isset($_SESSION['error_find_correct'])): ?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $_SESSION['error_find_correct'] ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php 
    // sleep(5);
    unset($_SESSION['error_find_correct']); ?>
<?php endif;?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="css/style_userverify.css">
<link rel="stylesheet" href="css/style_nav_pages.css">
<link rel="stylesheet" href="css/form_style.css">
<title>Report missing person</title>

<br><br><br>

<style>
/* ----------------------- ask question form------------------------- */
a:hover {
    color: white;
}

/* textarea{
    width: 100%;
    padding: 10px 20px;
    outline: none;
    font-weight: 400;
    border: 1px solid #607d8b;
    font-size: 16px;
    letter-spacing: 1px;
    color: #607d8b;
    background: transparent;
    border-radius: 30px;
    margin-bottom: 5px;
    resize: none;
} */
/* h2{
    color: #607d8b;
    font-weight: 600;
    font-size: 1.5em;
    text-transform: uppercase;
    margin-bottom: 20px;
    border-bottom: 4px solid #ff4584;
    display: inline-block;
    letter-spacing: 1px;
} */

.contentBx {
    margin-top: 13rem;
}

.contentBx .formBx .inputBx input[type="submit"] {
    margin-bottom: 10rem;
}

@media (max-width: 768px) {
    .contentBx {
        margin-top: 0rem;
    }

    .contentBx .formBx .inputBx input[type="submit"] {
        margin-bottom: 0rem;
    }
}


/* --------------------- Scroll Bar-------------------------- */
::-webkit-scrollbar {
    width: 7px;
    height: 10px;
}

::-webkit-scrollbar-track {
    background: transparent;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: rgba(255, 69, 131, 0.7);
    border-radius: 10px;
}

::-webkit-scrollbar-button {
    width: 10px;
    height: 20px;
}
</style>
</head>

<body class="bg-light">
    <div class="container my-4 col-lg-9">
        <div class="bg-dark p-5 rounded m-3">
            <h1 class="display-4 text-light">Report a Person</h1>
            <p class="lead text-light">The forum allows you to report a request of a person who might be suffering from Alzheimer's and is gone missing. You could do so by filling the given form</p>
            <hr class="my-4 text-light" style="height: 2px; background-color:#ffffff ;">
            <p class="text-light">Kindly read this form and fill it carefully. Upload a clear image in the image upload section which would help
            our algorithm to process. All these details would help the guardian to confirm the patient. You can view the guardian details once he/she confirms the missing person.
            </p>
            <a href="#Report">
                <button type="button" class="btn btn-light" id="readMore">Read More</button>
            </a>

        </div>
    </div>
    <div class="contentBx" id="Report">
        <div class="formBx">
            <h2>Report a finding</h2>
            <form action="<?php $_SERVER['REQUEST_URI']?>" method="POST" enctype="multipart/form-data">
                <div class="inputBx">
                    <span>Enter your name <span class="astrisk">*</span></span>
                    <input type="text" name="suspected_missing" id="suspected_missing" value="<?php echo $_SESSION['username']?>" readonly>
                </div>
                <div class="inputBx">
                    <span>Enter your email <span class="astrisk">*</span></span>
                    <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']?>" readonly>
                </div>
                <div class="inputBx">
                    <span>Enter your phone number <span class="astrisk">*</span></span>
                    <input type="number" name="Phone" pattern="[7-9]{1}[0-9]{9}" required>
                </div>
                <div class="location_row">

                    <div class="inputBx-loc">
                        <span>Latitude <span class="astrisk">*</span></span>
                        <input type="text" name="latitude" id="latitude" required>
                    </div>
                    <div class="inputBx-loc">
                        <span>Longitude <span class="astrisk">*</span></span>
                        <input type="text" name="longitude" id="longitude" required>
                    </div>
                    <div class="inputBx-loc">
                        <button type="button" class="loc-btn" title="click to get your current location" onclick="getLocation()"><i
                                class="fas fa-map-marker-alt"></i></button>
                    </div>
                </div>
                <script>
                var lat = document.getElementById("latitude");
                var long = document.getElementById("longitude");

                function getLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition);
                    } else {}
                }

                function showPosition(position) {
                    lat.value = position.coords.latitude;
                    long.value = position.coords.longitude;
                }
                </script>

                <div class="inputBx">
                    <span>Approx age group of the found person</span>
                    <Select name="age_group">
                        <option selected class="selected"></option>
                        <option>Child (0 - 14 years) </option>
                        <option>Youth (15 - 24 years)</option>
                        <option>Adults (25 - 64 years)</option>
                        <option>Seniors (65 years and over)</option>
                    </Select>
                </div>
                <div class="inputBx">
                    <span>Select Gender of the found person</span>
                    <Select name='gender'>
                        <option selected class="selected"></option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>
                    </Select>
                </div>
                <div class="btn-container">
                    <span>Upload image file of the found person <span class="astrisk">*</span></span>
                    <input type="file" id="person_image" name="person_image" class="upload-box">
                </div>
                <div class="inputBx">
                    <input type="submit" name="Report" id="Report" value="Report" onclick="top()">
                </div>

        </div>
    </div>



    <?php include 'utils/footer.php' ?>
    <!-- <input type="number" name="latitude" id="latitude" />
    <input type="number" name="longitude" id="longitude" />
    <button onclick="getLocation()">Try It</button> -->
    <script>
    // var x = document.getElementById("demo");
    // var lat = document.getElementById("latitude");
    // var long = document.getElementById("longitude");

    // function getLocation() {
    //     if (navigator.geolocation) {
    //         navigator.geolocation.getCurrentPosition(showPosition);
    //     } else {
    //         x.innerHTML = "Geolocation is not supported by this browser.";
    //         alert("bye");
    //     }
    // }

    // function showPosition(position) {
    //     alert(position.coords.latitude);
    //     //   x.innerHTML = "Latitude: " + position.coords.latitude + 
    //     //   "<br>Longitude: " + position.coords.longitude;
    //     lat.value = position.coords.latitude;
    //     long.value = position.coords.longitude;
    // }
    </script>

</body>
<script>
function top() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>



<!-- Option 1: Bootstrap Bundle with Popper -->
<!--for alert-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>