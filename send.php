<?php
// Simple PHP mail handler. For production, Jason should replace mail() with authenticated SMTP/API delivery.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: /'); exit; }
if (!empty($_POST['website'] ?? '')) { http_response_code(204); exit; }
function clean($v){ return trim(str_replace(["\r","\n"], ' ', $v ?? '')); }
$name=clean($_POST['name']??''); $business=clean($_POST['business']??''); $email=clean($_POST['email']??''); $phone=clean($_POST['phone']??''); $interest=clean($_POST['interest']??''); $message=trim($_POST['message']??'');
if (!$name || !filter_var($email,FILTER_VALIDATE_EMAIL) || !$phone) { http_response_code(400); exit('Please complete the required fields.'); }
$to='keith@thekeithhopkins.com';
$subject='NEW MACHINE BASE AI LEAD - '.$name;
$body="NEW MACHINE BASE AI INQUIRY\n\nName: $name\nBusiness: $business\nEmail: $email\nPhone: $phone\nInterest: $interest\n\nMessage:\n$message\n";
$headers="From: Machine Base AI <leads@machinebaseai.com>\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8\r\n";
$ok=mail($to,$subject,$body,$headers);
if($ok){ header('Location: thank-you.html'); exit; }
http_response_code(500); echo 'We could not send your request. Please use the Call or WhatsApp button.';
?>
