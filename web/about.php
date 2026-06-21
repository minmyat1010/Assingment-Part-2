<?php
$title = "G07 Health Department | About";
$description = "About the team behind G07 Health Department website.";
$page = "about";
$footer_heading = "Team Note";
$footer_text = "G07 website project";

require_once("../include/settings.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM about_members";
$result = mysqli_query($conn, $query);

include(__DIR__ . "/../include/header.inc");
include(__DIR__ . "/../include/nav.inc");
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
            <p style="color: #527267"><strong>The Creative Coders</strong></p>
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

            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <dl>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <dt>
                            <?php echo htmlspecialchars($row['student_name']); ?>
                            <span class="student-id">
                                | ID: <?php echo htmlspecialchars($row['student_number']); ?>
                            </span>
                        </dt>

                        <dd>
                            <strong>Project 1:</strong>
                            <?php echo htmlspecialchars($row['project1_contribution']); ?>
                        </dd>

                        <dd>
                            <strong>Project 2:</strong>
                            <?php echo htmlspecialchars($row['project2_contribution']); ?>
                        </dd>

                        <dd>
                            <strong>Favourite Language:</strong>
                            <?php echo htmlspecialchars($row['favourite_language']); ?>
                        </dd>

                        <br>
                    <?php endwhile; ?>
                </dl>
            <?php else: ?>
                <p>No member information available.</p>
            <?php endif; ?>
        </article>

        <article class="card">
            <figure class="team-figure">
                <img src="../images/group-photo.jpg"
                     alt="Group photo of The Creative Coders"
                     class="team-photo">
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
                    <td>Data Scientist / Analyst</td>
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

<?php
if ($result) {
    mysqli_free_result($result);
}

mysqli_close($conn);

include(__DIR__ . "/../include/footer.inc");
?>