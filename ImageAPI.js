import { createApi } from 'unsplash-js';
import nodeFetch from 'node-fetch';
import fs from "fs"
import { resolveObjectURL } from 'buffer';
const unsplash = createApi({
  accessKey: 'zZMwU32bQREonhyoSwI58ji0C7wZesdbpTBURWoFqRw',
  fetch: nodeFetch,
});



function initPromise(search) {
    return new Promise(function(res,rej) {
        const imageData = unsplash.search.getPhotos({
            query: search,
            page: 1,
            perPage: 1,
          });
          res(imageData)
    })
}

async function fetchImage(search, number) {
    const fetchedData = await initPromise(search)
    const imageLink = fetchedData.response.results[number].urls.raw

    return(imageLink)
}

async function main() {
    const imageLink = await fetchImage('pemis', 0)
    console.log(imageLink)
}

main()



