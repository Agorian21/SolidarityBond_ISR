<header>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col mr-0" href="#">
        Solidarity Bond - Reims (51)
        <?php include('../PHP/manage/headerVerifyByStatus.php'); ?>
        </a>
            
        <tr class="navbar-nav col">
            <th class="nav-item text-nowrap">
                <?php include('../PHP/manage/headerModifySiteIfConnected.php'); ?>
            </th>
        </tr>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="portal.php">
                                <span data-feather="home"></span>
                                Accueil
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php">
                                <span data-feather="file"></span>
                                Articles
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="events.php">
                                <span data-feather="shopping-cart"></span>
                                Evènements
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>