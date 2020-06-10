<!--Main Navigation (Website POV Entreprise)-->
<header>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark indigo">

      <!-- Additional container -->
      <div class="container">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="index.php">Solidarity Bond - Reims (51)</a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
          aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

          <!-- Links -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Accueil
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <?php include("../PHP/manage/headerModifySiteIfConnected.php"); ?>
          </ul>
          <!-- Links -->
          
        </div>
        <!-- Collapsible content -->

      </div>
      <!-- Additional container -->

    </nav>
    <!--/.Navbar-->

</header>
<!--Main Navigation-->