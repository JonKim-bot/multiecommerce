// Import and configure the Firebase SDK
// These scripts are made available when the app is served or deployed on Firebase Hosting
// If you do not serve/host your project using Firebase Hosting see https://firebase.google.com/docs/web/setup
// importScripts('/__/firebase/8.6.8/firebase-app.js');
// importScripts('/__/firebase/8.6.8/firebase-messaging.js');
// importScripts('/__/firebase/init.js');


importScripts('https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.6.8/firebase-messaging.js');
/**
 * Here is is the code snippet to initialize Firebase Messaging in the Service
 * Worker when your app is not hosted on Firebase Hosting.
 // Give the service worker access to Firebase Messaging.
 // Note that you can only use Firebase Messaging here. Other Firebase libraries
 // are not available in the service worker.
 // Initialize the Firebase app in the service worker by passing in
 // your app's Firebase config object.
 // https://firebase.google.com/docs/web/setup#config-object
 // Retrieve an instance of Firebase Messaging so that it can handle background
 // messages.
 **/


// If you would like to customize notifications that are received in the
// background (Web app is closed or not in browser focus) then you should
// implement this optional method.
// Keep in mind that FCM will still show notification messages automatically 
// and you should use data messages for custom notifications.
// For more info see: 
firebase.initializeApp({
  apiKey: "AIzaSyBfcy3lzRMXrZl-EPwE7EpF-LCORxl2vcY",
  authDomain: "emenu-b486e.firebaseapp.com",
  projectId: "emenu-b486e",
  storageBucket: "emenu-b486e.appspot.com",
  messagingSenderId: "646319887179",
  appId: "1:646319887179:web:ec2ee0ae02ed7e91f18ece",
  measurementId: "G-RJ543W8VW1"
});
const messaging = firebase.messaging();
// https://firebase.google.com/docs/cloud-messaging/concept-options
messaging.onBackgroundMessage(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  const notificationTitle = 'Background Message Title';
  const notificationOptions = {
    body: 'Background Message body.',
    icon: '/firebase-logo.png'
  };

  self.registration.showNotification(notificationTitle,
    notificationOptions);
});