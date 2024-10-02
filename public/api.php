<?php
// Lire la luminosité depuis brightness.txt
$brightness = file_get_contents('brightness.txt');
$brightness = max(0, min(255, intval($brightness)));

// Lire l'état LED depuis led_state.txt
$led_state = trim(file_get_contents('led_state.txt'));

list($red, $green, $blue) = explode(',', $led_state);
$red = max(0, min(255, intval($red)));
$green = max(0, min(255, intval($green)));
$blue = max(0, min(255, intval($blue)));
$isPowerOn = ($red > 0 || $green > 0 || $blue > 0);


header('Content-Type: application/json');
echo json_encode(['color' => $led_state, 'bright' => $brightness]);
exit;
