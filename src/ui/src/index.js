import './index.css';
import '@babel/polyfill';
import React from "react";
import ReactDOM from "react-dom";
import { BrowserRouter as Router } from "react-router-dom";

import Auth0ProviderWithHistory from "./auth/auth0-provider"
import App from './containers/App';

ReactDOM.render(
    <Router>
        <Auth0ProviderWithHistory>
            <App />
        </Auth0ProviderWithHistory>
    </Router>,
    document.getElementById("root")
);