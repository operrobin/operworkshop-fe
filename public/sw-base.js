/**
 * @link https://shareurcodes.com/blog/how-to-easily-convert-your-existing-laravel-application-into-a-progressive-web-app-by-using-workbox
 */

importScripts(
    'https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js'
);

/**
 * @link https://stackoverflow.com/a/66120107/9614906
 */
workbox.precaching.precacheAndRoute(self.__WB_MANIFEST);