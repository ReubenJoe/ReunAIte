<?php include 'utils/nav.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReunAite</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/footer_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

  <!-- Home Section Starts -->
  <section class="home" id="home">
    <h1 class="banner">
    keeping open a window of hope
    </h1>
    <h3 class="slogan">Locate your long lost loved ones</h3>
    <div class="home_button">
    <?php if (isset($_SESSION['username']))
    {
      echo '
      <a href="find.php"><button>Search</button></a>
      <a href="report.php"><button>Report</button></a>
      ';
    }
    else{
      echo '
      <a href="user-verification/login.php"><button>Search</button></a>
      <a href="user-verification/login.php"><button>Report</button></a>
      ';
    }
  ?>
    </div>

<style>
  #symptoms{
  list-style: url('img/2.png');
  padding-left: 1rem;
}
</style>
    <div class="wave wave1"></div>
    <div class="wave wave2"></div>
    <div class="wave wave3"></div>

    <div class="fas fa-cog nut1"></div>
    <div class="fas fa-cog nut2"></div>
  </section>
<!-- Home Section Ends -->
<!-- Categories Section starts -->
<!-- <section class="category" id="category">
  <h1 class="section_heading">Category</h1>
  <div class="card_container">
    <div class="card_box">
        <div class="card_icon">01</div>
        <div class="card_content">
            <h3>Category Name</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat maxime doloremque voluptatibus earum asperiores quo reprehenderit distinctio, adipisci mollitia numquam.</p>
            <a href="#">Read More</a>
        </div>
    </div>
    <div class="card_box">
        <div class="card_icon">02</div>
        <div class="card_content">
            <h3>Category Name</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat maxime doloremque voluptatibus earum asperiores quo reprehenderit distinctio, adipisci mollitia numquam.</p>
            <a href="#">Read More</a>
        </div>
    </div>
    <div class="card_box">
        <div class="card_icon">03</div>
        <div class="card_content">
            <h3>Category Name</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat maxime doloremque voluptatibus earum asperiores quo reprehenderit distinctio, adipisci mollitia numquam.</p>
            <a href="#">Read More</a>
        </div>
    </div>
</div>
</section> -->
<!-- Categories Section ends -->
<!-- About section starts -->
<section id="about" class="about">
  <h1 class="section_heading">About Us</h1>
<div class="section_row">
  <div class="section_content">
    <h3>At ReunAite, we strive to bring back your lost loved ones</h3>
    <p>ReunAite is a specialized platform which helps users to locate their loved ones.</p>
    <a href="#"><button class="section_button">Read More</button></a>
  </div>
  <div class="image">
    <img src="img/about-image.svg">
  </div>
</div>
</section>
<!-- About section ends -->
<!-- Service section starts -->
<section class="service" id="service">
  <h1 class="section_heading">Our Services</h1>
  <div class="section_row">
    <div class="image">
      <img src="img/service img1.svg">
    </div>
    <div class="section_content">
      <h3>Algorithmic Accuracy</h3>
      <p>In our algorithm, firstly we try to detect the faces in the images sent by the guardian and the reportee following which we use vgg Face algorithm which has an accuracy of 89.28% on using cosine similarity as a parameter.</p>
      <a href="#"><button class="section_button">Read More</button></a>
    </div>
  </div>
  <div class="section_row">
    <div class="section_content">
      <h3>Guardian Friendly</h3>
      <p>The user can create an account with us by filling his details in the find section along with uploading an image of his lost one.</p>
      <a href="#"><button class="section_button">Read More</button></a>
    </div>
    <div class="image">
      <img src="img/service img2.svg">
    </div>
  </div>
  <div class="section_row">
    <div class="image">
      <img src="img/service img3.svg">
    </div>
    <div class="section_content">
      <h3>Reportee Friendly</h3>
      <p>You can proceed to the report section where you could mention all the details of the suspected patient and upload his/her photograph to be matched with any of the images present in our records.</p>
      <a href="#"><button class="section_button">Read More</button></a>
    </div>
  </div>
  <!-- <div class="section_row">
    <div class="section_content">
      <h3>Web Hosting</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam voluptate animi sunt unde blanditiis, hic consectetur praesentium labore qui fuga incidunt ea aspernatur ipsam, suscipit, inventore molestiae deleniti alias. Sunt?</p>
      <a href="#"><button class="section_button">Read More</button></a>
    </div>
    <div class="image">
      <img src="img/service img4.svg">
    </div>
  </div>
  <div class="section_row">
    <div class="image">
      <img src="img/service img5.svg">
    </div>
    <div class="section_content">
      <h3>SEO Friendly</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam voluptate animi sunt unde blanditiis, hic consectetur praesentium labore qui fuga incidunt ea aspernatur ipsam, suscipit, inventore molestiae deleniti alias. Sunt?</p>
      <a href="#"><button class="section_button">Read More</button></a>
    </div>
  </div>
  <div class="section_row">
    <div class="section_content">
      <h3>Graphic Design</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam voluptate animi sunt unde blanditiis, hic consectetur praesentium labore qui fuga incidunt ea aspernatur ipsam, suscipit, inventore molestiae deleniti alias. Sunt?</p>
      <a href="#"><button class="section_button">Read More</button></a>
    </div>
    <div class="image">
      <img src="img/service img6.svg">
    </div>
  </div> -->
</section>
<!-- Service section ends -->
<!-- Team section starts -->
<section class="team" id="team">
  <h1 class="section_heading">Our Team</h1>
  <div class="section_row">
    <div class="profile_card">
      <div class="image">
        <img src="img/user.jpg" alt="">
      </div>
      <div class="info">
        <h3>Anshuman Mohanty</h3>
        <span>Team Lead</span>
        <div class="icons">
          <a href="#" class="fab fa-facebook-f"></a>
          <a href="#" class="fab fa-instagram"></a>
          <a href="#" class="fab fa-snapchat-ghost"></a>
        </div>
      </div>
    </div>
    <div class="profile_card">
      <div class="image">
        <img src="img/user.jpg" alt="">
      </div>
      <div class="info">
        <h3>Reuben Joseph</h3>
        <span>Creative Head</span>
        <div class="icons">
          <a href="#" class="fab fa-facebook-f"></a>
          <a href="#" class="fab fa-instagram"></a>
          <a href="#" class="fab fa-snapchat-ghost"></a>
        </div>
      </div>
    </div>
    <div class="profile_card">
      <div class="image">
        <img src="iuser.jpg" alt="">
      </div>
      <div class="info">
        <h3>Soumyae Tyagi</h3>
        <span>Developer</span>
        <div class="icons">
          <a href="#" class="fab fa-facebook-f"></a>
          <a href="#" class="fab fa-instagram"></a>
          <a href="#" class="fab fa-snapchat-ghost"></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Team section ends -->
<!-- Contact section starts -->
<section class="contact" id="contact">
  <h1 class="section_heading">Contact Us</h1>
  <div class="section_row">
    <div class="image">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3890.040785878598!2d80.15123961464377!3d12.8406409909419!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5259af8e491f67%3A0x944b42131b757d2d!2sVellore%20Institute%20of%20Technology%20-%20VIT%20Chennai!5e0!3m2!1sen!2ssg!4v1620716324905!5m2!1sen!2ssg" width="auto" height="auto" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <div class="form-container">
      <form action="">
        <div class="inputBox">
          <input type="text" name="" id="" placeholder="First name">
          <input type="text" name="" id="" placeholder="Last name">
        </div>
        <input type="email" name="" id="" placeholder="email">
        <textarea name="" id="" cols="30" rows="10" placeholder="message"></textarea>
        <input type="submit" value="Send">
      </form>
    </div>
  </div>
</section>
<!-- contact section ends -->
<!-- faq section starts -->
<section class="faq" id="faq">
  <h1 class="section_heading">FAQ</h1>
  <div class="section_row"> 
  <div class="image">
    <img src="img/faq-image.svg" alt="">
  </div> 
    <div class="accordion-container">
      <div class="accordion">
        <div class="accordion-header">
          <span>+</span>
          <h3>How do i verify my email ID?</h3>
        </div>
        <div class="accordion-body">
        <p>On signing up with you domain email ID, an email verification link will be sent to the user's mail ID. On clicking the link in mail, the user is redirected to confirmation link from where he/she can proceed to the website</p>
        </div>
      </div>
      <div class="accordion">
        <div class="accordion-header">
          <span>+</span>
          <h3>How to retrieve my password after forgetting?</h3>
        </div>
        <div class="accordion-body">
        <p>On the login page, the users can view an option of forgot password where they could follow the same procedure of email verification and on clicking the verification link, the users can enter and confirm their new password</p>
        </div>
      </div>
      <div class="accordion">
        <div class="accordion-header">
          <span>+</span>
          <h3>How do I identify an Alzheimer's patient?</h3>
        </div>
        <div class="accordion-body">
          <p>
          <ul id="symptoms">
            <li>People who seem to be confused.</li>
            <li>People who wander around the same place for a longer time without any motive.
            </li>
            <li>People who tend to have difficulty in balancing themselves, trip over while
                walking etc.</li>
            <li>People who tend to show an impulsive behavior.</li>
            <li>People who have difficulty in communicating words, expressing themselves.</li>
        </ul>
          </p>
        </div>
      </div>
      <div class="accordion">
        <div class="accordion-header">
          <span>+</span>
          <h3>How do I report my missing family relatives?</h3>
        </div>
        <div class="accordion-body">
          <p>You can create an account with us by filling you details in the find section along with uploading an image of your lost ones</p>
        </div>
      </div>
      <div class="accordion">
        <div class="accordion-header">
          <span>+</span>
          <h3>How do I report a missing person?</h3>
        </div>
        <div class="accordion-body">
          <p>You can proceed to the report section where you could mention all the details of the suspected patient and upload his/her photograph to be matched with any of the images present in our records.</p>
        </div>
      </div>
    </div>
</div>
</section>
<!-- faq section ends -->
<?php include 'utils/footer.php' ?>
 
  <script>
    window.addEventListener('scroll', function(){
      let nav = document.querySelector('nav');
      let windowPosition = window.scrollY > 10;
      nav.classList.toggle('scrolling-active', windowPosition);
    })
  </script>
  <script>
    $(document).ready(function(){
      $('.accordion-header').click(function(){
        $('.accordion .accordion-body').slideUp();
        $(this).next('.accordion-body').slideDown();
        $('.accordion .accordion-header span').text('+');
        $(this).children('span').text('-');
      });
    });
  </script>
</body>
</html>
