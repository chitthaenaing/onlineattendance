
<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">

                <li class="sidebar-brand">
                    <a href="#" id="title">
                       Admin Panel
                    </a>
                </li>
                <li>
                  <a href="adminhome.php">Dashboard</a>
                </li>
                <li>
                    <a href="userAccounts.php">Account Managment</a>
                </li>
                <li>
                    <a href="batchManagement.php">Batch Management</a>
                </li>
                <li>
                    <a href="subjectmanagement.php">Subject Management</a>
                </li>

                <li>
                    <a href="studentManagement.php">Student Management</a>
                </li>
                <li>
                    <a href="report.php" >Report</a>
                </li>
                <li>
                    <a href="logout.php">Log Out</a>
                </li>

              <p id="admininfo">Admin Name: <span><?= $_SESSION['username']; ?></span></p>



            </ul>
</nav>
<script type="text/javascript">
$(document).ready(function () {

  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();
    });

    function hamburger_cross() {

      if (isClosed == true) {
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }

  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });

 
});

</script>