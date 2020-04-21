const path = require('path');
const fs = require('fs');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const webpack = require("webpack");
const autoprefixer = require("autoprefixer");
const _ = require('underscore');
const EventHooksPlugin = require('event-hooks-webpack-plugin');
const getLogger = require('webpack-log');
const log = getLogger({ name: 'webpack-batman' });
module.exports = {
    mode: 'development',
    entry: {
        header: "./src/js/header.js",
        footer: "./src/js/footer.js",
        home: "./src/js/home.js",
        blog: "./src/js/blog.js",
        sobre_nos: "./src/js/sobre_nos.js",
        destinos: "./src/js/destinos.js",
    },
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: "[name].min.js"
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /(node_modules)/,
                use: {
                    loader: 'babel-loader'
                }
            },
            {
                test: /\.scss$/,
                use: [MiniCssExtractPlugin.loader, 'css-loader','postcss-loader', 'sass-loader']
            }
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: '[name].min.css'
        }),
        new webpack.LoaderOptionsPlugin({
            options: {
                postcss: [
                    autoprefixer()
                ]
            }
        }),
        new EventHooksPlugin({
            'done': () => {
                const publicDir = __dirname + '/dist';
                const files     = fs.readdirSync(publicDir);

                _.each(files, file => {
                    if(file === 'header.min.js' || file === 'home.min.js')
                        fs.unlinkSync(publicDir+'/'+file);
                });
            }
        })
    ]
}