<?php
// Fonction pour obtenir les adresses MAC des interfaces réseau
function get_network_interfaces()
{
    $interfaces = [];
    foreach (array_filter(preg_grep('/^(en|eth|wlan)/', array_keys(net_get_interfaces()))) as $interface) {
        $mac = net_get_interface_link_mac($interface);
        if ($mac !== false) {
            $interfaces[] = [
                'name' => $interface,
                'mac' => $mac
            ];
        }
    }
    return $interfaces;
}

// Fonction pour envoyer un paquet WOL
function send_wake_on_lan($mac_address)
{
    $broadcast_address = '255.255.255.255';
    $port = 9;
    $mac_string = str_replace(':', '', $mac_address);
    $mac_hex = hex_esc($mac_string);
    $packet = str_repeat("\xFF", 6) . pack('H*', $mac_hex);
    $socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    if ($socket === false) {
        echo "Erreur lors de la création du socket : " . socket_strerror(socket_last_error()) . "\n";
        return;
    }
    $result = socket_set_option($socket, SOL_SOCKET, SO_BROADCAST, true);
    if ($result === false) {
        echo "Erreur lors de la configuration du socket : " . socket_strerror(socket_last_error()) . "\n";
        socket_close($socket);
        return;
    }
    $bytes_sent = socket_sendto($socket, $packet, strlen($packet), 0, $broadcast_address, $port);
    if ($bytes_sent === false) {
        echo "Erreur lors de l'envoi du paquet : " . socket_strerror(socket_last_error()) . "\n";
    } else {
        echo "Paquet Wake-on-LAN envoyé à $mac_address\n";
    }
    socket_close($socket);
}

// Obtenir les interfaces réseau
$interfaces = get_network_interfaces();

// Afficher les interfaces
echo "Interfaces réseau détectées :\n";
if (empty($interfaces)) {
    echo "Aucune interface réseau détectée.\n";
} else {
    foreach ($interfaces as $interface) {
        echo "- {$interface['name']} (MAC: {$interface['mac']})\n";
    }
}

// Demander à l'utilisateur l'action à effectuer
$action = readline("Entrez 'wake' pour allumer un périphérique ou 'sleep' pour l'éteindre : ");
$mac_address = readline("Entrez l'adresse MAC du périphérique : ");

// Effectuer l'action demandée
if ($action === 'wake') {
    send_wake_on_lan($mac_address);
} elseif ($action === 'sleep') {
    // Aucune action n'est implémentée pour éteindre un périphérique
    echo "Désolé, l'option d'extinction n'est pas implémentée dans ce script.\n";
} else {
    echo "Action invalide.\n";
}

// Fonction d'échappement des caractères hexadécimaux
function hex_esc($str)
{
    return preg_replace_callback('/(.)|(..)/', function ($matches) {
        return strlen($matches[1]) === 1 ? sprintf('\\x%02x', ord($matches[1])) : sprintf('\\x%s', $matches[2]);
    }, $str);
}