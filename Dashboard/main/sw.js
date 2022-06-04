// console.log("Service Worker is running");
importScripts(
    "https://storage.googleapis.com/workbox-cdn/releases/6.4.1/workbox-sw.js"
  );
  
  workbox.routing.registerRoute(
      ({request}) => request.destination === 'img',
      new workbox.strategies.NetworkFirst()
      );
  
  // caches.open(cacheName).then((cache) => {
  //   return cache.addAll(assets);
  // });
  
  //install service worker
  self.addEventListener("install", function (event) {
    console.log("Service Worker: Installed");
  });
  
  //activate event
  self.addEventListener("activate", function (event) {
    console.log("Service Worker has been Activated");
    //   return self.clients.claim();
  });
  
  //fetches event
  self.addEventListener("fetch", function (event) {
    console.log(event);
    event.respondWith(fetch(event.request));
  });
  