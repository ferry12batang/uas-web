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

$db->update('invoices', ['status' => $id], "id = {$id}");

$loans = $db->getConnection()->prepare("SELECT invoices.*, loans.id as loan_id FROM invoices JOIN loans ON loans.id = invoices.loan WHERE invoices.id = ?");
$loans->bind_param('s', $id);
$loans->execute();
$loansData = $loans->get_result()->fetch_all(MYSQLI_ASSOC);
$loans->free_result();

$db->update('loans', ['status' => "back"], "id = {$loansData[0]['loan_id']}");

redirect(base_url("/"));