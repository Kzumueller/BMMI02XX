# German / Latin to Votox Translator

Study project to translate German and Latin into VOTOX, a phonetic, syllabic alphabet used by 
WordBuilder, a software used to produce realistic renderings of vocal performances 
without actually having to hire singers.  

## Installation

Since this project uses Symfony and various parts of its ecosystem, installation is fairly simple:

- Clone the repository
- Create an arbitrarily named database, maybe even with a dedicated user
- Execute the SQL statements found in `/assets/database` to create the necessary tables
- Create an `.env.local` file (or an appropriate alternative as per Symfony's documentation)
- Add a URL for a database connection to said file in the form of `DATABASE_URL="mysql://USER:PASSWORD@HOST:3306/DATABASE_NAME"`
- Make sure build tools have permission to create directories beneath your project root
- Run `composer update` or `composer install` and `yarn install` to set up dependencies
- Run `yarn encore dev` to build assets and make them available publicly (under `public/build`)
- Set up an HTTP server like Apache2 or Nginx the execute the application, 
I don't know about the latter but an Apache VHost might look like this:

```apacheconfig
<VirtualHost *:80>
        ServerName votox.local

        # the directory 'public' needs to be the DocumentRoot to properly load assets
        DocumentRoot "path/to/projectroot/public"

        <Directory "path/to/projectroot/public">
                Options FollowSymLinks
                AllowOverride All
                Require all granted
				
                # This line is especially important since this file fires up the actual application
                # which then does all the routing for backend controlles
                FallbackResource /index.php
        </Directory>
</VirtualHost>
```

## Getting in on the fun

After having installed the application, use your favourite browser (unless that browser is Internet Explorer)
and navigate to `yourChosenDomain.tld/votox/translations`, type in or paste a text you'd like to be converted to VOTOX
and hit the button matching the language of your text.

## Inner workings

You might have noticed that upon clicking a button, the page is not reloaded but the translation still magically appears out of thin air.
This is due to the mysterious power of Asynchronous JavaScript and XML - better known as AJAX and sometimes referred to as "that thing that made our projects to complicated 
that after years of programming I actually have to learn something new and I don't like it" - which is used to transport
the potentially heavy payloads involved in translating texts without the need to refresh the whole page every time a translation is requested.

## Sample output
The following images show the application being used to translate fairly 
well-known texts in everyone's favourite languages: German and Latin

### German
![if this image can't be displayed, check out the /screenshots directory](./screenshots/OdeToJoy.png "Goethe's Ode to Joy")


![if this image can't be displayed, check out the /screenshots directory](./screenshots/Art1.png "Article 1 of Germany's Constitution")

### Latin
![if this image can't be displayed, check out the /screenshots directory](./screenshots/PaterNoster.png "The prayer that led Europe from the thriving societies of Antiquity to the Dark Ages")  

  
![if this image can't be displayed, check out the /screenshots directory](./screenshots/SephirothsTheme.png "From the original soundtrack of Final Fantasy 7, Theme song dedicated to Sephiroth who is the main antagonist and just plain awesome")