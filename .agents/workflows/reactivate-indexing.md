---
description: How to Reactivate Search Engine Indexing
---

To reactivate search engine indexing for the Ejlals Academy website, you will need to remove the three layers of "no index" protection. Follow these steps when you are ready to make the site public to search engines like Google.

## 1. Allow Crawling in `robots.txt`

Open the `public/robots.txt` file and remove the `/` from the `Disallow` directive, so that search engines are permitted to crawl the entire site.

Change it back to look exactly like this:
```txt
User-agent: *
Disallow:
```

## 2. Remove the Global Middleware 

The global middleware currently sends an `X-Robots-Tag: noindex, nofollow` HTTP header on every single request. You will need to stop registering this middleware to allow indexing.

Open `bootstrap/app.php` and remove (or comment out) the line that appends the `NoIndexMiddleware` inside the `withMiddleware` closure:

```diff
     ->withMiddleware(function (Middleware $middleware): void {
-        $middleware->append(\App\Http\Middleware\NoIndexMiddleware::class);
     })
```

## 3. Remove the HTML Meta Tag

Finally, you will need to remove the HTML meta tag that explicitly tells search engines not to index the pages rendered by your Blade layouts.

Open `resources/views/layouts/app.blade.php` and completely remove the following `<meta>` tag from the `<head>` section (around line 6):

```diff
-        <meta name="robots" content="noindex, nofollow">
```

Once you have completed these 3 steps and saved the files, the site logic will be fully reverted and it will become immediately indexable by search engines!
