<?php
$title = "G07 Health Department | Apply";
$description = "Apply for jobs at G07 Health Department.";
$page = "apply";
$footer_heading = "Notice";
$footer_text = "Review job reference number before submitting.";

include(__DIR__ . "/../include/header.inc");
include(__DIR__ . "/../include/nav.inc");
?>

<main id="main-content" class="container section">

    <header class="page-header">
        <p class="eyebrow">Application Form</p>
        <h2>Apply for a Position</h2>
        <p class="required-note">
            All fields are required except the Other Skills textarea.
        </p>
    </header>

    <form action="process_eoi.php" method="post" novalidate>

        <div class="form-grid">

            <div>
                <label for="jobref">Job Reference Number</label>
                <input type="text" id="jobref" name="jobref">
            </div>

            <div>
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname">
            </div>

            <div>
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname">
            </div>

            <div>
                <label for="dob">Date of Birth</label>
                <input type="text" id="dob" name="dob" placeholder="dd/mm/yyyy">
            </div>

            <fieldset>
                <legend>Gender</legend>

                <label>
                    <input type="radio" name="gender" value="male">
                    Male
                </label>

                <label>
                    <input type="radio" name="gender" value="female">
                    Female
                </label>

                <label>
                    <input type="radio" name="gender" value="other">
                    Other
                </label>
            </fieldset>

            <div>
                <label for="street">Street Address</label>
                <input type="text" id="street" name="street">
            </div>

            <div>
                <label for="suburb">Suburb/Town</label>
                <input type="text" id="suburb" name="suburb">
            </div>

            <div>
                <label for="state">State</label>
                <select id="state" name="state">
                    <option value="">Please Select</option>
                    <option value="VIC">VIC</option>
                    <option value="NSW">NSW</option>
                    <option value="QLD">QLD</option>
                    <option value="NT">NT</option>
                    <option value="WA">WA</option>
                    <option value="SA">SA</option>
                    <option value="TAS">TAS</option>
                    <option value="ACT">ACT</option>
                </select>
            </div>

            <div>
                <label for="postcode">Postcode</label>
                <input type="text" id="postcode" name="postcode">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="text" id="email" name="email">
            </div>

            <div>
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone">
            </div>

            <div>
                <label for="position">Available Position</label>
                <select id="position" name="position">
                    <option value="">Please Select</option>
                    <option value="forensic_analyst">Forensic Research Officer</option>
                    <option value="lab_technician">Public Health Research Analyst</option>
                </select>
            </div>

            <fieldset>
                <legend>Skills</legend>

                <label>
                    <input type="checkbox" name="skills[]" value="laboratory">
                    Laboratory Analysis
                </label>

                <label>
                    <input type="checkbox" name="skills[]" value="research">
                    Research Writing
                </label>

                <label>
                    <input type="checkbox" name="skills[]" value="data">
                    Data Analysis
                </label>

                <label>
                    <input type="checkbox" name="skills[]" value="communication">
                    Communication
                </label>
            </fieldset>

            <div class="full-width">
                <label for="otherskills">Other Skills</label>
                <textarea id="otherskills" name="otherskills" rows="5"></textarea>
            </div>

        </div>

        <div class="form-actions">
            <button type="submit" class="button">Submit Application</button>
            <button type="reset" class="button button-secondary">Reset Form</button>
        </div>

    </form>

</main>

<?php include(__DIR__ . "/../include/footer.inc"); ?>