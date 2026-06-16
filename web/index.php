<?php
$title = "G07 Health Department | Home";
$description = "G07 Health Department recruitment website for forensic and research experts.";
$page = "home";
$footer_heading = "Credits";
$footer_text = "WHO, Health Gov AU, CDC, Forensic Regulator UK, ChatGPT";

include(__DIR__ . "/../include/header.inc");
include(__DIR__ . "/../include/nav.inc");
?>

  <main id="main-content">
    <section class="hero">
      <div class="hero-slider" aria-label="Featured health and forensic images">
        <div class="slides-track">
          <div class="slide slide-one"></div>
          <div class="slide slide-two"></div>
          <div class="slide slide-three"></div>
        </div>
        <div class="hero-overlay">
          <p class="hero-note">Recruitment Portal</p>
          <h2>Build a safer and healthier future with us</h2>
          <p>
            We are looking for professionals in forensic science, public health research,
            laboratory analysis, and evidence-based investigation.
          </p>
          <div class="hero-actions">
            <a class="button" href="jobs.php">View Positions</a>
            <a class="button button-secondary" href="apply.php">Apply Now</a>
          </div>
        </div>
      </div>
    </section>

    <section class="section container">
      <div class="two-column">
        <article class="card">
          <h2>Who We Are</h2>
          <p>
            G07 Health Department supports public health, forensic services, and scientific
            research. Our work helps communities through laboratory testing, health data
            analysis, and evidence-based decision making.
          </p>
          <p>
            We value teamwork, ethics, accuracy, accessibility, and innovation in every project.
          </p>
        </article>

        <article class="card">
          <h2>Why Join Us</h2>
          <ul class="feature-list">
            <li>Work on meaningful health and forensic projects</li>
            <li>Collaborate with skilled researchers and analysts</li>
            <li>Grow through mentoring and professional development</li>
            <li>Support community wellbeing through science</li>
          </ul>
        </article>
      </div>
    </section>

    <section class="section section-soft">
      <div class="container">
        <h2 class="section-title">Our Focus Areas</h2>
        <div class="grid-three">
          <article class="card">
            <h3>Forensic Investigation</h3>
            <p>Support reliable evidence handling, laboratory processes, and case reporting.</p>
          </article>
          <article class="card">
            <h3>Medical Research</h3>
            <p>Contribute to public health studies, clinical data review, and research planning.</p>
          </article>
          <article class="card">
            <h3>Community Health</h3>
            <p>Help improve health services using data, analysis, and scientific recommendations.</p>
          </article>
        </div>
      </div>
    </section>
  </main>

  <?php include(__DIR__ . "/../include/footer.inc"); ?>

