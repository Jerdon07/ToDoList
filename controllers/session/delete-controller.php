<?php

use util\Auth;

Auth::logout();

header('location: /');

exit();