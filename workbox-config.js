/**
 * @link https://shareurcodes.com/blog/how-to-easily-convert-your-existing-laravel-application-into-a-progressive-web-app-by-using-workbox
 */

module.exports = {
    globDirectory: 'public/',
    globPatterns: ['**/*.{js,css,png,jpg}','/pwa/offline.html'],
    swSrc: 'public/sw-base.js',
    swDest: 'public/service-worker.js',
    globIgnores: [
      '../workbox-cli-config.js',
      'photos/**'
    ]
};