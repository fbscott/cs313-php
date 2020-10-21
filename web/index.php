<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/foundation.min.css"> -->
  <link rel="stylesheet" href="./assets/css/_reset.css">
  <link rel="stylesheet" href="./assets/css/_base.css">
  <link rel="stylesheet" href="./assets/css/_grid.css">
  <link rel="stylesheet" href="./assets/css/prove_02.css">
  <title>Scott Currell's Homepage</title>
</head>
<body>
  <div id="page-container">
    <div id="content-wrapper">

      <header>
        <div class="row">
          <div class="column medium-4 medium-offset-4 end">
            <img class="profile" src="./assets/img/profile_edit.png" width="813" height="813" alt="Scott Currell profile photo">
          </div>
        </div>

        <div class="row">
          <div class="column">
            <h1 class="text-center">Scott Currell</h1>
            <h2 class="text-center">UX Designer / UI Developer</h2>
          </div>
        </div>

        <nav>
          <ul>
            <li><a href="./assignments.html" target="_blank">Course Assignments</a></li>
            <li><a href="https://github.com/fbscott/cs313-php" target="_blank">My GitHub Repo</a></li>
            <li><a href="javascript:void(0);">Placeholder Link</a></li>
          </ul>
        </nav>
      </header>

      <div class="row">
        <article class="columns large-9 margin-medium">
          <h2>Article</h2>
          <p>Hello!</p>
          <p>My name is Scott Currell. I live in Brighton, CO with my beautiful wife and two daughters. I'm a Software Engineering major at BYU-I and currently work as a User Interface developer for a local bank in my community.</p>
          <p>Right now, I'm into grilling and smoking meats. I've made several amazing meals over the summer and am looking forward to Thanksgiving (ths Super Bowl of smoking).</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at lacus rhoncus, tempus erat nec, malesuada justo. Vestibulum semper elit vel iaculis vehicula. Fusce quis malesuada massa. Vivamus eget luctus orci, ac fringilla urna. Fusce dignissim pulvinar nisl, eget convallis neque suscipit quis. Nulla ultrices metus sed mauris sollicitudin, id pulvinar lacus lobortis. Quisque eros lacus, pulvinar ut hendrerit eu, malesuada sit amet ante. Morbi nec libero tempor, finibus mauris sit amet, eleifend ligula. In at lacus in quam volutpat pellentesque. Curabitur fermentum gravida sem at mattis. Nam a ornare lorem. Donec maximus nisl et elementum convallis. Pellentesque mattis id nisl sit amet euismod.</p>
        </article>
        <aside class="columns large-3 margin-medium">
          <h2>Aside</h2>
          <ul class="navigation-secondary">
            Useful Resources
            <li>
              <a href="https://codepen.io/" target="_blank">codepen.io <span class="caret"><span>Go</span> &raquo;</span></a>
            </li>
            <li>
              <a href="https://developer.mozilla.org/en-US/" target="_blank">developer.mozilla.org <span class="caret"><span>Go</span> &raquo;</span></a>
            </li>
            <li>
              <a href="https://github.com/" target="_blank">github.com <span class="caret"><span>Go</span> &raquo;</span></a>
            </li>
            <li>
              <a href="https://jsfiddle.net/" target="_blank">jsfiddle.net <span class="caret"><span>Go</span> &raquo;</span></a>
            </li>
            <li>
              <a href="https://jquery.com/" target="_blank">jquery.com <span class="caret"><span>Go</span> &raquo;</span></a>
            </li>
            <li>
              <a href="https://stackoverflow.com/" target="_blank">stackoverflow.com <span class="caret"><span>Go</span> &raquo;</span></a>
            </li>
            <li>
              <a href="https://www.w3schools.com/" target="_blank">w3schools.com <span class="caret"><span>Go</span> &raquo;</span></a>
            </li>
          </ul>
        </aside>
      </div>

    </div><!-- end #content-wrapper -->

    <footer>
      <div class="row">
        <div class="column">
          <p class="text-center">
            <?php echo "Copyright &copy; " .  date("Y") . " Scott Currell"; ?>
          </p>
        </div>
      </div>
    </footer>

  </div><!-- end #page-container -->
</body>
</html>
