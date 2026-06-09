<?php
$title = "G07 Health Department | About";
$description = "About the team behind G07 Health Department website.";
$page = "about";
$footer_heading = "Team Note";
$footer_text = "G07 first website project";

include("../include/header.inc");
include("../include/nav.inc");
?>

  <main id="main-content" class="container section">
    <header class="page-header">
      <p class="eyebrow">Team Profile</p>
      <h2>About Our Group</h2>
      <p>Meet the group behind this recruitment website project.</p>
    </header>

    <section class="card">
      <h3>Group Name</h3>
      <h2>
        <p style="color: #527267"><strong>The Creative Coders</strong> </p>
      </h2>

      <h3>Class Day/Time</h3>
      <ul>
        <li><strong>Monday</strong>
          <ul>
            <li>12:00 - 2:00 PM Computer Systems (Lecture)</li>
            <li>4:00 - 6:00 PM Introduction to Programming (Lecture)</li>
          </ul>
        </li>

        <li><strong>Tuesday</strong>
          <ul>
            <li>8:00 - 10:00 AM Mathematics (Lecture)</li>
            <li>12:00 - 2:00 PM Programming (Practical)</li>
            <li>2:00 - 4:00 PM Web Technology (Lecture)</li>
          </ul>
        </li>

        <li><strong>Wednesday</strong>
          <ul>
            <li>8:00 - 10:00 AM Web Technology (Practical)</li>
            <li>10:00 - 12:00 PM Computer Systems (Practical)</li>
          </ul>
        </li>

        <li><strong>Thursday</strong>
          <ul>
            <li>3:00 - 6:00 PM Networking (Practical)</li>
          </ul>
        </li>

        <li><strong>Friday</strong>
          <ul>
            <li>8:00 - 10:00 AM Mathematics (Lecture & Tutorial)</li>
            <li>11:00 - 1:00 PM Networking (Lecture)</li>
          </ul>
        </li>
      </ul>
    </section>

    <section class="about-layout">
      <article class="card">
        <h3>Member Contributions</h3>
        <dl>
          <dt>Arkar Min <span class="student-id">| ID: 106399241</span></dt>
          <dd>Created about page structure and part of css.</dd>
          <dd>Favourite Language : Chinese</dd>

          <dt>Dylan Yang Cheng Jun<span class="student-id">| ID: 106417716</span></dt>
          <dd>Prepared job descriptions and part of jira management.</dd>
          <dd>Favourite Language : English</dd>

          <dt>Chan Myae Oo <span class="student-id">| ID: 106399209</span></dt>
          <dd>Designed application page, part of jira management, and final review.</dd>
          <dd>Favourite Language : Japanese</dd>

          <dt>Min Myat Thura<span class="student-id">| ID: 106399267</span></dt>
          <dd>Designed home page, accessibility checks, and part of css.</dd>
          <dd>Favourite Language : Burmese (Myanmar)</dd>
        </dl>

      </article>

      <article class="card">
        <figure class="team-figure">
          <img src="../images/group-photo.jpg" alt="Group photo of The Creative Coders" class="team-photo">
          <figcaption>Group photo of The Creative Coders.</figcaption>
        </figure>
      </article>
    </section>

    <section class="section">
      <table class="fun-table">
        <caption>
          <h3>Fun Facts About Our Team</h3>
        </caption>
        <thead>
          <tr>
            <th scope="col">Member</th>
            <th scope="col">Dream Job</th>
            <th scope="col">Coding Snack</th>
            <th scope="col">Hometown</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Arkar Min</td>
            <td>Data Scientist/ Analyst</td>
            <td>Cookies</td>
            <td>Taunggyi</td>
          </tr>
          <tr>
            <td>Chan Myae Oo</td>
            <td>Network Engineer</td>
            <td>Chips</td>
            <td>Yangon</td>
          </tr>
          <tr>
            <td>Min Myat Thura</td>
            <td>Network Engineer</td>
            <td>Fruit</td>
            <td>Yangon</td>
          </tr>
          <tr>
            <td>Dylan Yang Cheng Jun</td>
            <td>Network Engineer</td>
            <td>Sandwich</td>
            <td>Petaling Jaya</td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>

<?php include("../include/footer.inc"); ?>