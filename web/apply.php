<?php
$title = "G07 Health Department | Apply";
$description = "Apply for jobs at G07 Health Department.";
$page = "apply";
$footer_heading = "Notice";
$footer_text = "Review job reference number before submitting.";

include(__DIR__ . "/../include/header.inc");
include(__DIR__ . "/../include/nav.inc");
?>
  <!-- MAIN CONTENT -->
  <main id="main-content" class="container section">

    <header class="page-header">
      <p class="eyebrow">Application Form</p>
      <h2>Apply for a Position</h2>
      <p class="required-note">
        All fields are required except the Other Skills textarea.
      </p>
    </header>

    <!-- FORM -->
    <form action="formtest.php" method="post" class="application-form">

      <div class="form-grid">

        <div>
          <label for="jobref">Job reference number</label>
          <input type="text" id="jobref" name="jobref" required pattern="[A-Za-z0-9]{5}" maxlength="5">
        </div>

        <div>
          <label for="firstname">First name</label>
          <input type="text" id="firstname" name="firstname" required pattern="[A-Za-z]{1,20}" maxlength="20">
        </div>

        <div>
          <label for="lastname">Last name</label>
          <input type="text" id="lastname" name="lastname" required pattern="[A-Za-z]{1,20}" maxlength="20">
        </div>

        <div>
          <label for="dob">Date of birth</label>
          <input type="text" id="dob" name="dob" required
            pattern="(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[0-2])/[0-9]{4}"
            placeholder="dd/mm/yyyy">
        </div>

        <fieldset>
          <legend>Gender</legend>
          <label><input type="radio" name="gender" value="male" required> Male</label>
          <label><input type="radio" name="gender" value="female"> Female</label>
          <label><input type="radio" name="gender" value="other"> Other</label>
        </fieldset>

        <div>
          <label for="street">Street address</label>
          <input type="text" id="street" name="street" required maxlength="40">
        </div>

        <div>
          <label for="suburb">Suburb/Town</label>
          <input type="text" id="suburb" name="suburb" required maxlength="40">
        </div>

        <div>
          <label for="state">State</label>
          <select id="state" name="state" required>
            <option value="" disabled selected>Please select</option>
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
          <input type="text" id="postcode" name="postcode" required pattern="[0-9]{4}" maxlength="4">
        </div>

        <div>
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>

        <div>
          <label for="phone">Phone number</label>
          <input type="text" id="phone" name="phone" required pattern="[0-9]{8,12}">
        </div>

        <div>
          <label for="position">Available position</label>
          <select id="position" name="position" required>
            <option value="" disabled selected>Please select</option>
            <option value="forensic_analyst">Forensic Research Officer</option>
            <option value="lab_technician">Public Health Research Analyst</option>
          </select>
        </div>

        <fieldset>
          <legend>Skill list</legend>
          <label><input type="checkbox" name="skills[]" value="laboratory" required> Laboratory analysis</label>
          <label><input type="checkbox" name="skills[]" value="research"> Research writing</label>
          <label><input type="checkbox" name="skills[]" value="data"> Data analysis</label>
          <label><input type="checkbox" name="skills[]" value="communication"> Other skills...</label>
        </fieldset>

        <div class="full-width">
          <label for="otherskills">Other skills</label>
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
