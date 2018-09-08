<?php

    include "config/config.php";
    include "assets/back_end/php/Project.php";

$project = new Project($config['banco']);

$project->downloadData();