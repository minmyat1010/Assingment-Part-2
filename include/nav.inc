<nav aria-label="Main navigation">
        <ul class="nav-menu">
          <li><a href="index.php" <?php if ($page == "home") echo 'aria-current="page"'; ?>>Home</a></li>
          <li><a href="jobs.php" <?php if ($page == "jobs") echo 'aria-current="page"'; ?>>Jobs</a></li>
          <li><a href="apply.php" <?php if ($page == "apply") echo 'aria-current="page"'; ?>>Apply</a></li>
          <li><a href="about.php" <?php if ($page == "about") echo 'aria-current="page"'; ?>>About</a></li>
        </ul>
      </nav>
    </div>
  </header>