<?php

declare(strict_types=1);
date_default_timezone_set("Asia/Kolkata");

require_once __DIR__ . "/../utils/functions/abort.php";
require_once __DIR__ . "/../utils/functions/debug.php";

require_once __DIR__ . "/../services/authService.php";
require_once __DIR__ . "/../services/OTPService.php";
require_once __DIR__ . "/../services/mailService.php";

require_once __DIR__ . "/../utils/handlers/sendResponse.php";
require_once __DIR__ . "/../utils/handlers/hashPassword.php";

require_once __DIR__ . "/../models/connections/dbConnection.php";
require_once __DIR__ . "/../models/authModel.php";

session_start();

require_once __DIR__ . "/../routes/router.php"; 