
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
    require('admin-lte');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');
console.log(token.content);
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo'

window.Pusher = require('pusher-js');

window.Base_URL = document.head.querySelector('meta[name="base-url"]').content;

window.Echo = new Echo({
    authEndpoint : Base_URL+'/api/broadcasting/auth',
    broadcaster: 'pusher',
    auth: {
        headers: {
            'Accept': 'application/json', 
            'Authorization': 'Bearer ' + "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijc1NjE4ZjI2NDJhMGU1ZTYwMTFmMzc2NDg0N2U2NzdiZmJkZDYyM2QzMmJkZWU1OWQ0OGU5ZWFlNDhmMGE1MjdjMWNlYTA2NGI0MGEyOTBhIn0.eyJhdWQiOiIyIiwianRpIjoiNzU2MThmMjY0MmEwZTVlNjAxMWYzNzY0ODQ3ZTY3N2JmYmRkNjIzZDMyYmRlZTU5ZDQ4ZTllYWU0OGYwYTUyN2MxY2VhMDY0YjQwYTI5MGEiLCJpYXQiOjE1Njk2NTM4NTgsIm5iZiI6MTU2OTY1Mzg1OCwiZXhwIjoxNjAxMjc2MjU4LCJzdWIiOiIxIiwic2NvcGVzIjpbIioiXX0.elSLNXgBIwlLwir1QxutSp8rVYEkXNdo_CSSfiU-zK5M7dZojBF4f60FLWxmyU-RyfdX1GXOca0l3ORdn6ZAclxKfhDTKwCjCqxrrbzpPEaS-QfOSO4QDed69iRhLfB-E2XZTjuinqwmpSQdb3MxtlsTe-8LXoU3RzAOlcK4R9gUUQg5CqNkLHssS7T48eSovJvy4QU16RpoFRD2o9BV5cI94n8RMfuEWtDkKjFEnWPMo-hRiLYKX3l6em_KpR3y-tfLf87HRFaoQWGOLuL02Y7mF0oo0kdqrdNi8CG3e-DecZYa2wEVF66so6ioecN-qjYCnBJ3twWD2uJGfYBO15Zrc6CItJVKYelqiLd2jQ7qo2OBufTS38dyam7e5vk6uUWdZKnBzVof-lXxVehaKGi7BDVckpXDAY8PPS3Gqy7EY9dFxMMbOYn4UGwoiyz4XS54M__QjRl45KWEhJo1nRkzI1xBAbGdg1nmst_wWIAIZ9XeNSNr9HD14wG1N0IakGmW-m8CvGIeAHxt7RxR4YChvwf2O6-oOyBXOyu8Pae4Drne2_SPuBtMWKDzuSFsPCoFP8JQ3Axf5jnLqZEo1SiaZNGSp_A9bmUP28wzh1eRg4oNggz3Tryz_q1p6IhavT9-toKHQyY1okptj5YK6nTtwMf4RMXRdP7QP56076g"
        }
    },

    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true,
    
});
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true,
//     forceTLS: true
// });
