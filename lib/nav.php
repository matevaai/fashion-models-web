    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Fashion Models</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li<?php echo $currentPage == 'models' ? ' class="active"' : '' ?>><a href="index.php">Models</a></li>
            <li<?php echo $currentPage == 'about' ? ' class="active"' : '' ?>><a href="about.php">About</a></li>
            <li<?php echo $currentPage == 'contact' ? ' class="active"' : '' ?>><a href="contact.php">Contact</a></li>
            <li<?php echo $currentPage == 'admin' ? ' class="active"' : '' ?>><a href="admin.php">Admin</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>