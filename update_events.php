<?php
include 'db_connect.php';

// Clear old events
$pdo->exec('TRUNCATE TABLE events');

// Insert new 2026 events
$sql = "INSERT INTO events (title, date, time, venue, description, image) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);

$events = [
    [
        'PATEL SAMAJ ANNUAL GENERAL MEETING - 2026',
        '2026-01-24',
        '1:30 PM PST - 4:00 PM',
        'Fleetwood Community Center, 15996 84th Ave, Surrey, BC',
        "WE INVITE ALL PATELS / GUJARATIS WITH RSVP.\n\nYOUR VIEW AND VOTE BOTH MATTERS A LOT TO BUILD UNITE GUJARATI COMMUNITY IN 2026.\n\nRSVP NOW.",
        'agm2026.png'
    ],
    [
        'SHRI SATYANARAYAN PUJA',
        '2026-03-15',
        '10:30 AM PST - 2:00 PM',
        'The Royal King Banquets Hall, 8158 - 128 Street, Payal Business Center, Surrey',
        "WE INVITE ALL PATELS / GUJARATIS WITH RSVP.\nITS FREE EVENT! JOIN FOR THIS DIVINE CAUSE.\n\nLETS BUILD UNITE GUJARATI SAMAJ IN 2026.\n\nRSVP NOW.",
        'puja2026.png'
    ],
    [
        'PATEL SAMAJ SEMINAR ON MENOPAUSE',
        '2026-06-01',
        'TBA',
        'TBA',
        "EDUCATION SEMINAR ON MENOPAUSE AND PELVIC PHYSIO.\nWE WILL INVITE ALL LADIES. INVITE IS ON YOUR WAY.\n\nWE WILL OPEN REGISTRATION SOON! (Exact July/June dates to be announced).",
        'menopause.png'
    ],
    [
        'PATEL SAMAJ LADIES BADMINTON',
        '2026-06-15',
        'TBA',
        'TBA',
        "LADIES BADMINTON TOURNAMENT.\nWE WILL INVITE ALL LADIES. INVITE IS ON YOUR WAY.\n\nWE WILL OPEN REGISTRATION SOON! (Exact July/June dates to be announced).",
        'badminton.png'
    ],
    [
        'PATEL SAMAJ GOSSIP PARTY',
        '2026-09-01',
        'TBA',
        'TBA',
        "PATEL SAMAJ LADIES GOSSIP PARTY.\nWE WILL INVITE ALL LADIES. INVITE IS ON YOUR WAY.\n\nWE WILL OPEN REGISTRATION SOON! (Dates to be announced in September).",
        'gossip.png'
    ]
];

foreach ($events as $e) {
    $stmt->execute($e);
}

echo "Database updated successfully!";
?>
