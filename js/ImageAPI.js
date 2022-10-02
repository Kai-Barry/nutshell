import { createApi } from 'unsplash-js';
import nodeFetch from 'node-fetch';
const unsplash = createApi({
  accessKey: 'zZMwU32bQREonhyoSwI58ji0C7wZesdbpTBURWoFqRw',
  fetch: nodeFetch,
});



function initPromise(search, number) {
    return new Promise(function(res,rej) {
        const imageData = unsplash.search.getPhotos({
            query: search,
            page: 1,
            perPage: number + 1,
          });
          res(imageData)
    })
}

// Search: search term e.g. dinosaur
// Index: Index of the photo, first photo on page is 0, 2nd is 1, etc.
// This is so you actually get different images each time
async function fetchImage(search, index) {
    const fetchedData = await initPromise(search, index)
    const imageLink = fetchedData.response.results[number].urls.raw

    return(imageLink)
}
