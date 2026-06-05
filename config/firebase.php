<?php

return [
    'project_id' => env('FIREBASE_PROJECT_ID', 'betogram-project'),
    'api_key' => env('FIREBASE_API_KEY', ''),
    'auth_domain' => env('FIREBASE_AUTH_DOMAIN', 'betogram-project.firebaseapp.com'),
    'database_url' => env('FIREBASE_DATABASE_URL', 'https://betogram-project.firebaseio.com'),
    'storage_bucket' => env('FIREBASE_STORAGE_BUCKET', 'betogram-project.appspot.com'),
    'messaging_sender_id' => env('FIREBASE_MESSAGING_SENDER_ID', ''),
    'app_id' => env('FIREBASE_APP_ID', ''),
    
    // For server-side Firebase Admin SDK (optional)
    'credentials_file' => storage_path('firebase/credentials.json'),
];
?>
