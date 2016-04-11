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

Finally, ensure you do not have a `<title>` or any `<meta>` tags in the header of the page.

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

If you would like the post preview on the "view all posts" page to have more or less words than 50 you will need to edit the following line to suit your needs
`$less_words = implode(' ', array_slice(explode(' ', $file), 0, 50));`

And finally there's the SEO bit. Anyone who's worried about SEO, who can read PHP and sees how this will work, will probably be thinking that the `<title>` tag and `<meta>` description are not going to be accessible. However, you will notice the following
```
<title>My Example News Page - This section needs editing</title>
<meta name="description" content="This is an example news page. This section needs editing">
```
Edit these for the default page, and then for each news post, ensure you put the following in. As of HTML5 these 2 elements are able to be used in the body, and work as they would in the head.

Remember this is assuming that the directory you are saving the news items is in the same folder as the `news.php` file itself.

### 3: Writing posts
Unless you have a specific markup you want to follow, the `txt-to-html.html` file will be able to suffice for your needs.
Before we continue, to use this file you will need Javascript enabled in your browser. As for browser support I have not tested in IE, and I do not intend to. If it doesn't work in Internet Explorer 11, then feel free to tell me, and I will fix this. However, if you are using IE10 or less, then I offer no support.

To write your post load `txt-to-html.html` in the browser of your choosing, and write your news post in the *left* large text area. You can use the panel on the right side of the screen to aid you with styling, for example if you want bold text, or to link somewhere. Note for web-developers: If you are thinking of using this for your business and having non-tech savvy users writing posts, you may want to edit the markdown styling, and have the buttons show/hide depending on what stage people are at
When you are finished writing press the `Preview` button. This will allow you to see what your blog post is like.
Press the `Confirm` button if you are happy with the output below. Be aware the styling may be different to your actual post, so it may be an idea to include all typography styles, as well any other changes which may affect the post, just so you can truly see how it looks.
Now you are done. Press the `Download` button to give you the file ready to upload to the website's server. Or, if your browser/network doesn't allow downloading of files, copy the contents of the second large text area, and paste it into a fresh php file (or a `.txt` file, and then change the extension to `.php`) 

If downloading a file you will notice it downloads a filename that looks like `20160311-Example-Title.php` and this is to ensure ordering is correct for your news posts. What those numbers are at the start is the date when you press download in the format YYYY/MM/DD. If you don't mind them appearing in alphabetical order/reverse alphabetical order then feel free to remove the date at the start of the post.
Note for web-developers: You could use this value on the `news.php` page to display post age/upload date, or if you work in a time sensitive industry, e.g. you are using it on an ecommerce page and using it to notify users of promotional offers, you could use a date difference to add a warning to posts that are over a month old stating they are outdated, and the offer may no longer apply.

### 4: Reasoning
There are certain features in here which may make people wonder why they are there, and others which some people may expect that aren't here, let's talk about a few of them.

###### Why are you using include, they are insecure
They are _potentially_ insecure. This is down to how you handle it. If you are allowing anyone to upload files, then it's insecure. Otherwise, this system is as secure as the server it is hosted on.

###### Why are you using X function over Y
There's a few functions used which may seem a little backwards to people, and it's either because it's the only function I knew of which did what I needed it to do, or that the alternatives had some issues (such as the strip_tags being used, as alternatives removing the space from the post preview)

###### Why are you using PHP and not Javascript/Python/another potential language
Javascript is clientside, and can be disabled by the user. You want people to see what you have written, right? As for PHP over other server languages, it's because it's the only one I know. Sorry about that.

### 5: FAQs
###### Q: Why use this over Wordpress, Joomla, Druple, etc.?
A: There is no reason. If you are setting up a new site, and have no HTML experience other CMS systems are perfect for you. However, if you have a hand-built website or you would much rather use a HTML template/hand-built site, then this is the perfect way to keep a simple new post system in check, without having to change links every time you add a new post.

###### Q: Will there be a system to upload files without having to go through FTP?
A: Yes, currently figuring out how to add some security though. As much as I would like to submit the system, I would also prefer to not potentially compromise security for users who are just copy/pasting without understanding the basics of the code.

###### Q: Will there be a comments system?
Most likely, again, it will not be submitted without at least some form of security included.

###### Q: Will there be a full page system?
Unlikely but not impossible. It is likely to happen, however, it won't be a fancy editor like other CMSs have, and will probably a template page. 
