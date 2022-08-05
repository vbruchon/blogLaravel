const API_URL = "http://adminer.local/?username=vivian&db=bloglaravel";

fetch(API_URL)
    .then(response => response.json())
    .then(blogs => {
        console.log(blogs);
        createFeed(blogs);
    });
