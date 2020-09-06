const path = require("path");
const webpack = require('webpack');
const devMode = process.env.NODE_ENV !== "production";
const TerserPlugin = require('terser-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');

const paths = {
    main: {
        src: `src/`,
        dest: `dist/`
    },
    scripts: {
        src: `src/js/**/*.js`,
        srcMain: `src/js/`,
        dest: `dist/js`,
    },
};

module.exports = {

    mode: devMode ? "development" : "production",

    // stats: 'minimal',

    entry: {
        main: `./${paths.main.src}index.js`,

        component_contact_maps: `./${paths.main.src}components/contact-maps/contact-maps.js`,

        block_benefits: `./${paths.main.src}blocks/benefits/block-benefits.js`,
        block_contact_maps: `./${paths.main.src}blocks/contact-maps/block-contact-maps.js`,
        block_offer: `./${paths.main.src}blocks/offer/block-offer.js`,
        block_projects_categories: `./${paths.main.src}blocks/project-categories/block-projects-categories.js`,
        block_about_us: `./${paths.main.src}blocks/about-us/block-about-us.js`,
        block_testimonials: `./${paths.main.src}blocks/testimonials/block-testimonials.js`,
        block_logos: `./${paths.main.src}blocks/logos/block-logos.js`,
        block_contact_for_more: `./${paths.main.src}blocks/contact-for-more/block-contact-for-more.js`,
        block_blog: `./${paths.main.src}blocks/blog/block-blog.js`,
        block_offer_cta: `./${paths.main.src}blocks/offer-cta/block-offer-cta.js`,
        block_description: `./${paths.main.src}blocks/description/block-description.js`,
        block_projects: `./${paths.main.src}blocks/projects/block-projects.js`,
        block_board: `./${paths.main.src}blocks/board/block-board.js`,
        block_team: `./${paths.main.src}blocks/team/block-team.js`,
        block_history: `./${paths.main.src}blocks/history/block-history.js`,
        block_video: `./${paths.main.src}blocks/video/block-video.js`,
        block_page_submenu: `./${paths.main.src}blocks/page-submenu/block-page-submenu.js`

    },

    output: {
        publicPath: `${paths.main.dest}`,
        path: path.resolve(__dirname, `${paths.main.dest}`),
        filename: '[name].bundle.js',
    },

    optimization: {
        minimizer: [
            new TerserPlugin(),
            new OptimizeCSSAssetsPlugin()
        ]
    },

    plugins: [
        new CleanWebpackPlugin(),
        new MiniCssExtractPlugin({
            filename: "[name].css",
        }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery'
        }),
        new BrowserSyncPlugin({ // BrowserSync Configuration
            host: "localhost",
            port: 3000,
            proxy: "http://localhost/sense/",
            files: [
                {
                    match: [
                        "wp-content/themes/sense/**/*.php",
                        "wp-content/themes/sense/src/**/*.js",
                        "wp-content/themes/sense/src/**/*.scss",
                        // "wp-content/themes/sense/src/**/*.{sass,scss}",
                    ],
                    fn: (event, file) => {
                        if (event == 'change') {
                            const bs = require("browser-sync").get("bs-webpack-plugin");
                            if (file.split('.').pop()=='js' || file.split('.').pop()=='php' ) {
                                bs.reload();
                            } else {
                                bs.reload("*.css");
                                bs.notify("Compiling, please wait!");
                            }
                        }
                    }
                }
            ],
            injectCss: true,
            notify: false,
        },
        {
            reload: false,
            name: 'bs-webpack-plugin'
        }),

        new CopyPlugin({
            patterns: [
                {
                    from: path.resolve(__dirname, './src/js/vendors/jquery.min.js'),
                    to: path.resolve(__dirname, './dist/')
                }
            ]
        })

    ],

    performance: {
        hints: false
    },

    module: {
        rules: [
            {
                test: /\.(sa|sc|c)ss$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                    },
                    {
                        loader: "css-loader?url=false"
                    },
                    {
                        loader: "postcss-loader",
                        options: {
                            plugins: function () {
                                return [
                                    require('autoprefixer')
                                ];
                            }
                        }
                    },
                    {
                        loader: "sass-loader"
                    },
                    {
                        loader: "sass-resources-loader",
                        options: {
                            resources: [
                                `./${paths.main.src}/scss/abstracts/_variables.scss`,
                                `./${paths.main.src}/scss/abstracts/_mixins.scss`
                            ]
                        }
                    }
                ]
            }
        ]
    }

};

