# Compass Boilerplate

This is a boilerplate I created for my Compass/Susy projects.
Feel free to use it in your own projects.

## Requirements

The boilerplate has a number of system requirements. You need:

* [Sass](http://sass-lang.com/) (of course)
* [Compass](http://compass-style.org/) (self-explanatory)
* [Susy](http://susy.oddbird.net/)
* [Compass Animate](https://github.com/ericam/compass-animate)

The last two requirements are more or less optional (but recommended).
If you don't want them (e.g. because you use another grid framework or don't need
any predefined CSS keyframe animations), just remove them from `compass/config.rb`,
`compass/config-production.rb` and `compass/sass/style.scss`.


## File structure

The boilerplate contains a couple of files and folders:

    .htaccess
    compass/
        sass/
            defs/
                _font-defs.scss
                _grid-defs.scss
            media/
                _all.scss
                _print.scss
                _screen.scss
            mixins/
                _general.scss
            _debug.scss
            _helpers.scss
            _normalize.scss
            legacy-ie.scss
            style.scss
        config-production.rb
        config.rb
    css/
    fonts/
    images/
    javascript/

### .htaccess
This is not really part of the Compass project but since I often need the same .htaccess
definitions again and again, I included it.

### compass/
This is the main Compass project folder which contains all your source files.

### compass/sass/
The folder for your Sass sources, grouped in sub folders.

### compass/sass/defs/
This folder contains general variable definitions, e.g. for font sizes, font families,
Susy grid dimensions etc.

By default there are the partials `_font-defs.scss` for font definitions and webfont inclusion
and `_grid-defs.scss` for the Susy default configuration.

### compass/sass/media/
Here are the individual style sheets for the different media types located.

This folder contains the files `_all.scss` for media-independent styles, `_print.scss`
for print styles and `_screen.scss` for screen styles. More media types may be
included if need be.

### compass/sass/mixins/
Here you can put your mixin definitions. Currently there is only one file called `_general.scss`
which contains basic layout helper mixins.

### compass/sass/_debug.scss
This is a debug style sheet which contains some helpful styles for debugging your layout.
This partial is only there for development purposes and should not be included in the
production style sheets.

### compass/sass/_helpers.scss
This file contains general CSS helper classes which are often needed such as styles for containing
floats or hiding content. `_helpers.scss` is mainly derived from the H5BP main.css (h5bp.com).

### compass/sass/_normalize.scss
The CSS in this file is basically a customized version of the H5BP normalize.css.
I deleted or modified a few rules, optimized the general CSS for usage with Sass and Compass
and added some definitions for establishing vertical rhythm (see http://24ways.org/2006/compose-to-a-vertical-rhythm/).

### compass/sass/legacy-ie.scss
Guess what... that file contains fixes for nasty Internet Exploders.

### compass/sass/style.scss
This is the main style sheet. Generally this is only used to include all the other files and does
not contain any CSS itself.

### compass/config-production.rb
The Compass configuration file for exporting the CSS for use on the production server.

### compass/config.rb
Yet another config file for your Compass project. The only difference is that this is the default one
used during development on your local system. There are two config files so you can adjust the
export settings and folder paths in each one of them to match your local development
environment and the production environment. So once you set up both config files, you can
easily export your style sheets either for development or your live server.

### css, css-prod, fonts, images, javascript
These folders are empty by default.

`css` is the export folder for the generated development style sheets and `css-prod` for the
production style sheets. `fonts` is there to contain your webfonts, `images` is for
images used in your CSS (what else) and `javascript` is there for your Brainfuck source files.
