<?php
$title = "G07 Health Department | Jobs";
$description = "Job openings at G07 Health Department.";
$page = "jobs";
$footer_heading = "Apply Today";
$footer_text = '<a href="apply.php">Go to application form</a>';

include(__DIR__ . "/../include/header.inc");
include(__DIR__ . "/../include/nav.inc");

$host = "localhost";
$user = "root";
$password = "";
$dbname = "healthdepartment";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM jobs";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

  <main id="main-content" class="container section">
    <header class="page-header">
      <p class="eyebrow">Career Opportunities</p>
      <h2>Available Positions</h2>
      <p>Explore current openings for forensic and research specialists.</p>
    </header>

    <aside class="job-aside">
      <h2>Application Tips</h2>
      <p>Check the reference number carefully before applying.</p>
      <ul>
        <li>Use a valid email address</li>
        <li>Match your skills to the role</li>
        <li>Submit accurate personal details</li>
      </ul>
    </aside>

    <section class="job-listing">

      <?php while ($row = mysqli_fetch_assoc($result)) { ?>

      <article class="job-card">
        <header>
          <h2><?php echo $row['title']; ?></h2>
          <p class="job-ref">Reference: <?php echo $row['reference_no']; ?></p>
          <p class="job-meta">Salary: <?php echo $row['salary']; ?></p>
          <p class="job-meta">Reports to: <?php echo $row['reports_to']; ?></p>
        </header>

        <section>
          <h3>Short Description</h3>
          <p>
            <?php echo $row['short_description']; ?>
          </p>
        </section>

        <section>
          <h3>Key Responsibilities</h3>
          <ol>
            <?php $responsibilities = explode("|", $row['responsibilities']); 
            foreach ($responsibilities as $item) { echo "<li>$item</li>"; } ?>
          </ol>
        </section>

        <section>
          <h3>Requirements</h3>
          <h4>Essential</h4>
          <ul>
            <?php $essential = explode("|", $row['essential_requirements']);
            foreach ($essential as $item) { echo "<li>$item</li>"; } ?>
          </ul>
          <h4>Preferable</h4>
          <ul>
            <?php $preferable = explode("|", $row['preferable_requirements']); 
            foreach ($preferable as $item) { echo "<li>$item</li>"; } ?>
          </ul>
        </section>

        <a href="apply.php?ref=<?php echo $row['reference_no']; ?>" class="button"> Apply Now </a>
      </article>

      <?php } ?>

    </section>
  </main>
<?php include(__DIR__ . "/../include/footer.inc"); ?>
