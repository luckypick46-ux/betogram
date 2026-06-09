<?php
$apiKey = 'AIzaSyAMU7CywBjtFq6-1ZRoj0M9gL_o6-dIsYY';
$uniq = time();
$email = "testuser+{$uniq}@example.com";
$password = 'TestPass123!';

function curl_post_json($url, $data) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    // For local testing on Windows without CA bundle
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    $res = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);
    if ($err) {
        echo "CURL error: $err\n";
        return false;
    }
    return $res;
}

function curl_post_form($url, $data) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    // For local testing on Windows without CA bundle
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    $res = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);
    if ($err) {
        echo "CURL error: $err\n";
        return false;
    }
    return $res;
}

echo "Creating Firebase user: $email\n";
$signUpUrl = "https://identitytoolkit.googleapis.com/v1/accounts:signUp?key={$apiKey}";
$payload = ['email' => $email, 'password' => $password, 'returnSecureToken' => true];
$res = curl_post_json($signUpUrl, $payload);
if (!$res) { exit(1); }
$decoded = json_decode($res, true);
if (empty($decoded['idToken'])) {
    echo "Firebase signUp failed: $res\n";
    exit(1);
}
$idToken = $decoded['idToken'];
echo "Got idToken\n";

// Call local firebase-register
$localRegisterUrl = 'http://127.0.0.1:8000/firebase-register';
$form = [
    'idToken' => $idToken,
    'name' => 'Test User',
    'user_name' => 'testuser',
    'email' => $email,
    'age_group' => '21-25',
    'password' => $password,
    'gender' => 'Male',
    'currency' => 'GBP',
    'country' => '',
    'city' => '',
    'country_code' => '',
    'contact_no' => ''
];
$reg = curl_post_form($localRegisterUrl, $form);
echo "firebase-register response: $reg\n";

// Now sign in via Firebase to get fresh idToken
$signInUrl = "https://identitytoolkit.googleapis.com/v1/accounts:signInWithPassword?key={$apiKey}";
$payload2 = ['email' => $email, 'password' => $password, 'returnSecureToken' => true];
$res2 = curl_post_json($signInUrl, $payload2);
$dec2 = json_decode($res2, true);
if (empty($dec2['idToken'])) { echo "SignIn failed: $res2\n"; exit(1); }
$idToken2 = $dec2['idToken'];
$loginRes = curl_post_form('http://127.0.0.1:8000/firebase-login', ['idToken' => $idToken2]);
echo "firebase-login response: $loginRes\n";

// Clean up: optional - delete the created Firebase user using admin API requires service account; skipping.
?>