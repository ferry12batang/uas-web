<?php

require_once __DIR__ . '/inc/include.php';

if (!$auth->getUser()) {
  redirect(base_url('/auth/login'));
}

$user = $auth->getUser();

if(!$request->get('id')) {
  redirect("/loan");
}

$id = $request->get('id');

$laptop = $db->getConnection()->prepare("SELECT * FROM laptops WHERE id = ?");
$laptop->bind_param("s", $id);
$laptop->execute();
$laptopData = $laptop->get_result();

if(!$laptopData->num_rows) redirect(base_url('loan'));

$laptopResult = $laptopData->fetch_assoc();

$dbLoan = $db->insert('loans', [
  'laptop' => $id,
  'customer' => $user['id'],
  'start' => date('Y-m-d H:i:s', strtotime('now')),
  'end' => date('Y-m-d H:i:s', strtotime('+7 days')),
]);
sleep(3);
$dbInvoice = $db->insert('invoices', [
  'loan' => $dbLoan['id'],
  'customer' => $user['id'],
  'total' => $laptopResult['price'],
]);
sleep(3);

$laptop = $db->getConnection()->prepare("UPDATE laptops SET ready = 0 WHERE id = ?");
$laptop->bind_param("s", $id);
$laptop->execute();
$laptopData = $laptop->get_result();

redirect(base_url("/borrow"));