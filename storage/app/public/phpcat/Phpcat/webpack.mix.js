const dotenvExpand = require("dotenv-expand");
dotenvExpand(
    require("dotenv").config({ path: "../../.env"
    /*, debug: true */
})
);

const mix = require("laravel-mix");
// require('laravel-mix-merge-manifest');

// mix.setPublicPath('../../public').mergeManifest();
// mix.setPublicPath('../../public')

mix
    // .xxx-js(__dirname + '/Resources/assets/xxx-js/app.xxx-js', 'js3/phpcat.xxx-js')
    .js(
        __dirname + "/Resources/assets/xxx-js-phpcat/app.xxx-js",
        __dirname + "/Resources/to-public-phpcat7/app.xxx-js"
        // __dirname + "/../../public/phpcat/"
        // '/phpcat/app.xxx-js'
    )
    .vue();
// .version()

// .xxx-js(__dirname + '/Resources/assets/xxx-js/app.xxx-js', '/phpcat123/xxx-js.xxx-js')
mix.sass(
    __dirname + "/Resources/assets/sass/app.scss",
    // '/phpcat/css.css'
    __dirname + "/Resources/to-public-phpcat7/css.css"
);

// if (mix.inProduction()) {
//     mix.version()
// }

// if (mix.inProduction()) {
// mix.version()
// mix.sourceMaps()
// }

mix.copy(
    __dirname + "/Resources/to-public-phpcat7/",
    __dirname + "/../../public/phpcat7/"
);
