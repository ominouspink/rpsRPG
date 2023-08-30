<?php

//search for a free defender spot
$defendSESH = "SELECT * FROM `sessions` WHERE `defender` IS NULL AND `attacker` IS NOT NULL;";

//search for a free attacker spot
$defendSESH = "SELECT * FROM `sessions` WHERE `defender` IS NOT NULL AND `attacker` IS NULL;";
