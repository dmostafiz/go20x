require('./bootstrap');

import React from 'react';
import { render } from 'react-dom';
import { createInertiaApp } from '@inertiajs/inertia-react';
import { InertiaProgress } from '@inertiajs/progress';

import CssBaseline from "@material-ui/core/CssBaseline";
import { ThemeProvider } from "@material-ui/core/styles";

import theme from "../../Argon/Assets/theme/theme.js";
import "@fortawesome/fontawesome-free/css/all.min.css";

import "flagpack/dist/flagpack.css"

// import ;
// import "../../Argon/Assets/scss/argon-dashboard-react.scss";


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}`),
    setup({ el, App, props }) {

        const urlArr = props.initialPage.url
        console.log('Main Props: ', urlArr)

        const template = (props.initialPage.url.startsWith('/user') || props.initialPage.url.startsWith('/admin'))
            ? <ThemeProvider theme={theme}>
                <CssBaseline />
                <App {...props} />
            </ThemeProvider>
            : <App {...props} />


        return render(template, el);


    },
});

InertiaProgress.init({ color: 'red' });
