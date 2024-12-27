<?php
// generate_qr.php
<?php
include('phpqrcode/qrlib.php');

$sessions = [
    'opening_remarks' => 'Opening Remarks - 09:00 AM',
    'ai_healthcare' => 'AI in Healthcare - 10:00 AM',
    'future_technology' => 'Keynote: Future of Technology - 11:30 AM'
];

foreach ($sessions as $key => $value) {
    QRcode::png($key, "qrcodes/$key.png");
}
?>