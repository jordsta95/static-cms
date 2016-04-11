# Static CMS
This is not meant to replace CMS systems, but can simply be implemented into a static HTML website to allow news posts, as well as display all posts that are included.

To use this you should have:
* PHP running on your server
* Access to your site's FTP
* Knowledge of writing in HTML (the txt-to-html.html file can do basic news posts, if that is all you need)

You should ideally have:
* Basic understanding of PHP; although if you don't want to do anything too fancy then this doesn't matter
* Basic understanding of CSS; only needed if you want a more unique layout than the default layout
* Safety precautions in place; e.g. no user generated content, only specifically what _you_ add
 
## Contents
### 1: What's included in the repo
### 2: Setting up the news script
#### 2.1: Pre-requisites
#### 2.2: Implementation
### 3: Writing posts
### 4: Reasoning
### 5: FAQs

### 1: What's included in the repo
Included in this repo you will find 3 files, exlcuding the gitignore and readme files.
* `txt-to-html.html`
* `script.php`
* `news.php`

The `script.php` file is for simple copy and paste purposes and has no other uses.
The `txt-to-html.html` file is for writing news posts, for users who do not know HTML and want a simple system to write their posts - this file includes a markdown on the right hand side of the screen for reference to the codes needed to write the html. Tech-savvy users can change the markdown for should they be implementing this system for less savvy users.
The `news.php` file is why we're all here. The simple script that makes the magic happen

### 2: Setting up the news script
#### 2.1: Pre-requisites
Before you continue following this tutorial you will need to ensure you have created a directory on your server, for the example new.php file the directory used is `uploads/` so to navigate to an example file would be `uploads/example.php`. However, to ensure navigation to pages is not possible, it is advised to not have these files stored in the publichtml folder. It isn't an issue if they are there, it just means that people may be able to navigate to a plaintext page.

Depending on how you want the "view all posts" part of the page to look, you may want to do some CSS work to give the posts a border, background, line up in rows of more than 2, etc.

#### 2.2: Implementation
Before you begin you need to make sure you have a PHP file and not an HTML file. If the page you are trying to edit ends in `.html` or `.htm` change the extension to `.php`. Don't worry, this won't break the site!

Now you have your `.php` file you need to decide where you want to have your news appear. Keep in mind this section will be where both the main "view all news" and the news post itself will appear, so choose a large area. If you want more things to appear on the page with the "view all news" part, then this is possible. But it can't be included outside of the php script you are about to add.

Next, copy the contents of the `script.php` files into the area defined above and add the following 2 lines of code to your CSS file/`<style>` tags in the head:
```
.newsbox{width:48%; display:inline-block; vertical-align:top; padding:1%;}
@media only screen and (max-width: 580px) {.newsbox{width:100%; display:block;}}
```

If you want to change the look of the boxes on the "view all posts" page, or where they become full width, this is where you will want to edit it.

And the last thing you need to do is change a few little details to match the site you are on.
The most important is to make sure the file destination matches your file destination
```
$page = "uploads/" . $getPage . ".php";
$directory = 'uploads/';
```
The there's the link changing
`$url = "http://example.com/news.php?" . $query;`
You will need to change the url from `example.com/news.php` to whatever the url is in your browser to get to the news page.
And finally there's the SEO bit. Anyone who's worried about SEO, who can read PHP and sees how this will work, will probably be thinking that the `<title>` tag and `<meta>` description are not going to be accessible. However, you will notice the following
```
<title>My Example News Page - This section needs editing</title>
<meta name="description" content="This is an example news page. This section needs editing">
```
Edit these for the default page, and then for each news post, ensure you put the following in. As of HTML5 these 2 elements are able to be used in the body, and work as they would in the head.

Remember this is assuming that the directory you are saving the news items is in the same folder as the `news.php` file itself.

### 3: Writing posts
To come!

### 4: Reasoning
To come!

### 5: FAQs
To come


